<?php
require_once __DIR__ . "/../models/Usuario.php";
require_once __DIR__ . "/../models/Planilha.php";
require_once __DIR__ . "/../models/Comentario.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = $_GET['action'] ?? '';

    if ($action === 'cadastro') {
        
        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $email = filter_var($email, FILTER_SANITIZE_EMAIL); 
        $senha = $_POST['senha'] ?? '';

        if (empty($nome) || empty($email) || empty($senha)) {
            header("Location: ../views/formLogin.php?erro=campos_vazios");
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../views/formLogin.php?erro=email_invalido");
            exit;
        }

        if (strlen($senha) < 6) {
            header("Location: ../views/formLogin.php?erro=senha_fraca");
            exit;
        }

        try {
            $perfil = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
            $usuario = new Usuario();
            $result = $usuario->cadastro($nome, $email, $senha, $perfil);

            switch ($result) {
                case Usuario::STATUS_OK:
                    header("Location: ../views/formLogin.php?sucesso=cadastro_realizado");
                    exit;

                case Usuario::STATUS_EXISTS:
                    header("Location: ../views/formLogin.php?erro=usuario_existe");
                    exit;

                case Usuario::STATUS_INSERT_ERROR:
                    header("Location: ../views/formLogin.php?erro=falha_insercao");
                    exit;

                case Usuario::STATUS_EXCEPTION:
                default:
                    header("Location: ../views/formLogin.php?erro=erro_servidor");
                    exit;
            }

        } catch (Exception $e) {
            error_log("Erro ao instanciar Usuario: " . $e->getMessage());
            header("Location: ../views/formLogin.php?erro=erro_servidor");
            exit;
        }
    }

    else if ($action === 'login') {
        
        $email = trim($_POST['email'] ?? '');
        $senha = trim($_POST['senha'] ?? '');

        if (empty($email) || empty($senha)) {
            header("Location: ../views/formLogin.php?erro=campos_vazios");
            exit;
        }

        try {
            $usuario = new Usuario();
            $result = $usuario->login($email, $senha);

            switch ($result['status']) {

                case Usuario::STATUS_OK:
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    
                    $_SESSION['id_usuario'] = $result['usuario']['id'];
                    $_SESSION['nome'] = $result['usuario']['nome'];
                    $_SESSION['perfil'] = $result['usuario']['perfil']; 

                    header("Location: ../index.php?sucesso=login_realizado");
                    exit;

                case Usuario::STATUS_EXISTS:
                    header("Location: ../views/formLogin.php?erro=usuario_nao_encontrado");
                    exit;

                case Usuario::STATUS_INSERT_ERROR:
                    header("Location: ../views/formLogin.php?erro=senha_incorreta");
                    exit;

                case Usuario::STATUS_EXCEPTION:
                default:
                    header("Location: ../views/formLogin.php?erro=erro_servidor");
                    exit;
            }

        } catch (Exception $e) {
            error_log("Erro ao instanciar Usuario: " . $e->getMessage());
            header("Location: ../views/formLogin.php?erro=erro_servidor");
            exit;
        }
    }

    else if ($action === 'logout') {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../index.php?sucesso=logout");
        exit;
    }

    // ROTAS AJAX / API para Planilhas e Secoes
    else if ($action === 'criar_planilha') {
        if (session_status() === PHP_SESSION_NONE) session_start();
        header('Content-Type: application/json; charset=utf-8');

        $id_usuario = $_SESSION['id_usuario'] ?? null;
        $titulo = trim($_POST['titulo'] ?? '');

        if (!$id_usuario) {
            http_response_code(401);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Usuário não autenticado']);
            exit;
        }

        if (empty($titulo)) {
            http_response_code(400);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Título obrigatório']);
            exit;
        }

        try {
            $planilha = new Planilha();
            $resultado = $planilha->criarPlanilha($titulo, (int)$id_usuario);
            if ($resultado['status'] === Planilha::STATUS_OK) {
                http_response_code(201);
                echo json_encode(['status' => 'sucesso', 'id_planilha' => $resultado['id_planilha']]);
            } else {
                http_response_code(500);
                echo json_encode(['status' => 'erro', 'mensagem' => 'Falha ao criar planilha']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Erro servidor']);
        }
        exit;
    }

    else if ($action === 'obter_planilhas') {
        if (session_status() === PHP_SESSION_NONE) session_start();
        header('Content-Type: application/json; charset=utf-8');

        $id_usuario = $_SESSION['id_usuario'] ?? null;
        if (!$id_usuario) {
            http_response_code(401);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Usuário não autenticado']);
            exit;
        }

        try {
            $planilha = new Planilha();
            $planilhas = $planilha->obterPlanilhasDoUsuario((int)$id_usuario);
            echo json_encode(['status' => 'sucesso', 'planilhas' => $planilhas]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Erro servidor']);
        }
        exit;
    }

    else if ($action === 'criar_secao') {
        if (session_status() === PHP_SESSION_NONE) session_start();
        header('Content-Type: application/json; charset=utf-8');

        $id_usuario = $_SESSION['id_usuario'] ?? null;
        $id_planilha = (int) ($_POST['id_planilha'] ?? 0);
        $titulo = trim($_POST['titulo'] ?? '');

        if (!$id_usuario) {
            http_response_code(401);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Usuário não autenticado']);
            exit;
        }

        if ($id_planilha <= 0) {
            http_response_code(400);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Planilha inválida']);
            exit;
        }

        try {
            $planilha = new Planilha();
            if (!$planilha->verificarProprietarioPlanilha($id_planilha, (int)$id_usuario)) {
                http_response_code(403);
                echo json_encode(['status' => 'erro', 'mensagem' => 'Acesso negado']);
                exit;
            }

            $id_secao = $planilha->criarSecao($id_planilha, $titulo ?: 'Sem título');
            if ($id_secao) {
                echo json_encode(['status' => 'sucesso', 'id_secao' => $id_secao]);
            } else {
                http_response_code(500);
                echo json_encode(['status' => 'erro', 'mensagem' => 'Falha ao criar seção']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Erro servidor']);
        }
        exit;
    }

    else if ($action === 'atualizar_secao') {
        if (session_status() === PHP_SESSION_NONE) session_start();
        header('Content-Type: application/json; charset=utf-8');

        $id_usuario = $_SESSION['id_usuario'] ?? null;
        $id_secao = (int) ($_POST['id_secao'] ?? 0);
        $novo_titulo = trim($_POST['titulo'] ?? '');

        if (!$id_usuario) {
            http_response_code(401);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Usuário não autenticado']);
            exit;
        }

        if ($id_secao <= 0) {
            http_response_code(400);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Seção inválida']);
            exit;
        }

        try {
            $planilha = new Planilha();
            $secao = $planilha->obterSecaoPorId($id_secao);
            if (!$secao) {
                http_response_code(404);
                echo json_encode(['status' => 'erro', 'mensagem' => 'Seção não encontrada']);
                exit;
            }

            if (!$planilha->verificarProprietarioPlanilha((int)$secao['id_planilha'], (int)$id_usuario)) {
                http_response_code(403);
                echo json_encode(['status' => 'erro', 'mensagem' => 'Acesso negado']);
                exit;
            }

            $ok = $planilha->atualizarTituloSecao($id_secao, $novo_titulo ?: 'Sem título');
            if ($ok) echo json_encode(['status' => 'sucesso']);
            else {
                http_response_code(500);
                echo json_encode(['status' => 'erro', 'mensagem' => 'Falha ao atualizar seção']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Erro servidor']);
        }
        exit;
    }

    else if ($action === 'deletar_secao') {
        if (session_status() === PHP_SESSION_NONE) session_start();
        header('Content-Type: application/json; charset=utf-8');

        $id_usuario = $_SESSION['id_usuario'] ?? null;
        $id_secao = (int) ($_POST['id_secao'] ?? 0);

        if (!$id_usuario) {
            http_response_code(401);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Usuário não autenticado']);
            exit;
        }

        if ($id_secao <= 0) {
            http_response_code(400);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Seção inválida']);
            exit;
        }

        try {
            $planilha = new Planilha();
            $secao = $planilha->obterSecaoPorId($id_secao);
            if (!$secao) {
                http_response_code(404);
                echo json_encode(['status' => 'erro', 'mensagem' => 'Seção não encontrada']);
                exit;
            }

            if (!$planilha->verificarProprietarioPlanilha((int)$secao['id_planilha'], (int)$id_usuario)) {
                http_response_code(403);
                echo json_encode(['status' => 'erro', 'mensagem' => 'Acesso negado']);
                exit;
            }

            $ok = $planilha->deletarSecao($id_secao);
            if ($ok) echo json_encode(['status' => 'sucesso']);
            else {
                http_response_code(500);
                echo json_encode(['status' => 'erro', 'mensagem' => 'Falha ao deletar seção']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Erro servidor']);
        }
        exit;
    }

    else if ($action === 'criar_comentario') {
        if (session_status() === PHP_SESSION_NONE) session_start();
        header('Content-Type: application/json; charset=utf-8');

        $id_usuario = $_SESSION['id_usuario'] ?? null;
        $id_secao = (int)($_POST['id_secao'] ?? 0);
        $assunto = trim($_POST['assunto'] ?? '');
        $descricao = trim($_POST['descricao'] ?? '');

        if (!$id_usuario) {
            http_response_code(401);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Usuário não autenticado']);
            exit;
        }

        if ($id_secao <= 0) {
            http_response_code(400);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Seção inválida']);
            exit;
        }

        try {
            $comentario = new Comentario();
            $planilha = new Planilha();
            $sec = $planilha->obterSecaoPorId($id_secao);
            if (!$sec) {
                http_response_code(404);
                echo json_encode(['status' => 'erro', 'mensagem' => 'Seção não encontrada']);
                exit;
            }

            if (!$planilha->verificarProprietarioPlanilha((int)$sec['id_planilha'], (int)$id_usuario)) {
                // permitir comentar mesmo se não for dono? aqui bloqueamos
                http_response_code(403);
                echo json_encode(['status' => 'erro', 'mensagem' => 'Acesso negado']);
                exit;
            }

            $id_coment = $comentario->criarComentario($id_secao, $id_usuario, $assunto, $descricao);
            if ($id_coment) {
                echo json_encode(['status' => 'sucesso', 'id_comentario' => $id_coment]);
            } else {
                http_response_code(500);
                echo json_encode(['status' => 'erro', 'mensagem' => 'Falha ao criar comentário']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Erro servidor']);
        }
        exit;
    }

    else if ($action === 'obter_comentarios') {
        if (session_status() === PHP_SESSION_NONE) session_start();
        header('Content-Type: application/json; charset=utf-8');

        $id_secao = (int)($_GET['id_secao'] ?? 0);
        if ($id_secao <= 0) {
            http_response_code(400);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Seção inválida']);
            exit;
        }

        try {
            $comentario = new Comentario();
            $lista = $comentario->obterComentariosPorSecao($id_secao);
            echo json_encode(['status' => 'sucesso', 'comentarios' => $lista]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Erro servidor']);
        }
        exit;
    }

    else if ($action === 'deletar_comentario') {
        if (session_status() === PHP_SESSION_NONE) session_start();
        header('Content-Type: application/json; charset=utf-8');

        $id_usuario = $_SESSION['id_usuario'] ?? null;
        $id_comentario = (int)($_POST['id_comentario'] ?? 0);

        if (!$id_usuario) {
            http_response_code(401);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Usuário não autenticado']);
            exit;
        }

        if ($id_comentario <= 0) {
            http_response_code(400);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Comentário inválido']);
            exit;
        }

        try {
            $comentario = new Comentario();
            $ok = $comentario->deletarComentario($id_comentario);
            if ($ok) echo json_encode(['status' => 'sucesso']);
            else {
                http_response_code(500);
                echo json_encode(['status' => 'erro', 'mensagem' => 'Falha ao deletar comentário']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['status' => 'erro', 'mensagem' => 'Erro servidor']);
        }
        exit;
    }
}
