<?php
require_once __DIR__ . "/../models/Usuario.php";
require_once __DIR__ . "/../models/Planilha.php";
//require_once __DIR__ . "/../models/Comentario.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = $_GET['action'] ?? '';

    if ($action === 'cadastro') {
        
        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $email = filter_var($email, FILTER_SANITIZE_EMAIL); 
        $senha = $_POST['senha'] ?? '';

        if (empty($nome) || empty($email) || empty($senha)) {
            header("Location: ../index.php?erro=campos_vazios");
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../index.php?erro=email_invalido");
            exit;
        }

        if (strlen($senha) < 6) {
            header("Location: ../index.php?erro=senha_fraca");
            exit;
        }

        try {
            $perfil = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
            $usuario = new Usuario();
            $result = $usuario->cadastro($nome, $email, $senha, $perfil);

            switch ($result) {
                case Usuario::STATUS_OK:
                    header("Location: ../index.php?sucesso=cadastro_realizado");
                    exit;

                case Usuario::STATUS_EXISTS:
                    header("Location: ../index.php?erro=usuario_existe");
                    exit;

                case Usuario::STATUS_INSERT_ERROR:
                    header("Location: ../index.php?erro=falha_insercao");
                    exit;

                case Usuario::STATUS_EXCEPTION:
                default:
                    header("Location: ../index.php?erro=erro_servidor");
                    exit;
            }

        } catch (Exception $e) {
            error_log("Erro ao instanciar Usuario: " . $e->getMessage());
            header("Location: ../index.php?erro=erro_servidor");
            exit;
        }
    }

    else if ($action === 'login') {
        
        $email = trim($_POST['email'] ?? '');
        $senha = trim($_POST['senha'] ?? '');

        if (empty($email) || empty($senha)) {
            header("Location: ../index.php?erro=campos_vazios");
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

                    header("Location: ../views/inicioSecFuncs.php?sucesso=login_realizado");
                    exit;

                case Usuario::STATUS_EXISTS:
                    header("Location: ../index.php?erro=usuario_nao_encontrado");
                    exit;

                case Usuario::STATUS_INSERT_ERROR:
                    header("Location: ../index.php?erro=senha_incorreta");
                    exit;

                case Usuario::STATUS_EXCEPTION:
                default:
                    header("Location: ../index.php?erro=erro_servidor");
                    exit;
            }

        } catch (Exception $e) {
            error_log("Erro ao instanciar Usuario: " . $e->getMessage());
            header("Location: ../index.php?erro=erro_servidor");
            exit;
        }
    }
 
    else if ($action === 'criar_planilha') {
        header('Content-Type: application/json; charset=utf-8');

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
        if (strpos($contentType, 'application/json') !== false) {
            $input = json_decode(file_get_contents('php://input'), true);
            $titulo = trim($input['titulo'] ?? '');
        } else {
            $titulo = trim($_POST['titulo'] ?? '');
        }

        if (empty($titulo)) {
            http_response_code(422);
            echo json_encode(['status' => 'error', 'message' => 'Título é obrigatório']);
            exit;
        }

        if (!isset($_SESSION['id_usuario'])) {
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'Usuário não autenticado']);
            exit;
        }

        try {
            $planilha = new Planilha();
            $result = $planilha->criarPlanilha($titulo, intval($_SESSION['id_usuario']));

            switch ($result) {
                case Planilha::STATUS_OK:
                    http_response_code(201);
                    echo json_encode(['status' => 'ok', 'message' => 'Planilha criada']);
                    exit;

                case Planilha::STATUS_INSERT_ERROR:
                case Planilha::STATUS_EXCEPTION:
                default:
                    http_response_code(500);
                    echo json_encode(['status' => 'error', 'message' => 'Falha ao criar planilha']);
                    exit;
            }
        } catch (Exception $e) {
            error_log('Erro criar_planilha: ' . $e->getMessage());
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Exceção no servidor']);
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
}