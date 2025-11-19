<?php

require_once __DIR__ . "/../models/Usuario.php";

$action = $_POST['action'] ?? '';

if ($action === 'cadastro' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if (empty($nome) || empty($email) || empty($senha)) {
        header("Location: ../views/index.html?erro=campos_vazios");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../views/index.html?erro=email_invalido");
        exit;
    }

    if (strlen($senha) < 6) {
        header("Location: ../views/index.html?erro=senha_fraca");
        exit;
    }

    try {
        $usuario = new Usuario();
        $usuario->cadastro($nome, $email, $senha);

        switch ($usuario) {
            case Usuario::STATUS_OK:
                header("Location: ../views/index.html?sucesso=cadastro_realizado");
                exit;
            case Usuario::STATUS_EXISTS:
                header("Location: ../views/index.html?erro=usuario_existe");
                exit;
            case Usuario::STATUS_INSERT_ERROR:
                header("Location: ../views/index.html?erro=falha_insercao");
                exit;
            case Usuario::STATUS_EXCEPTION:
            default:
                header("Location: ../views/index.html?erro=erro_servidor");
                exit;
        }
    } catch (Exception $e) {
        error_log("Erro ao instanciar Usuario: " . $e->getMessage());
        header("Location: ../views/index.html?erro=erro_servidor");
        exit;
    }
}

// ===== LOGIN =====
if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if (empty($email) || empty($senha)) {
        header("Location: ../views/index.html?erro=campos_vazios");
        exit;
    }

    try {
        $usuario = new Usuario();
        $result = $usuario->login($email, $senha);

        switch ($result) {
            case Usuario::STATUS_OK:
                // Login bem-sucedido, redirecionar para dashboard
                header("Location: ../views/inicio_demandas.html?sucesso=login_realizado");
                exit;
            case Usuario::STATUS_EXISTS:
                header("Location: ../views/index.html?erro=usuario_nao_encontrado");
                exit;
            case Usuario::STATUS_INSERT_ERROR:
                // Reutilizado para senha incorreta no model
                header("Location: ../views/index.html?erro=senha_incorreta");
                exit;
            case Usuario::STATUS_EXCEPTION:
            default:
                header("Location: ../views/index.html?erro=erro_servidor");
                exit;
        }
    } catch (Exception $e) {
        error_log("Erro ao instanciar Usuario: " . $e->getMessage());
        header("Location: ../views/index.html?erro=erro_servidor");
        exit;
    }
}

// Se nenhuma ação válida
header("Location: ../views/index.html?erro=requisicao_invalida");
exit;