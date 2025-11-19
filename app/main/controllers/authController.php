<?php

require_once __DIR__ . "/../models/Usuario.php";

// Cadastro
if  ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome']) ?? '';
    $email = trim($_POST['email']) ?? '';
    $senha = trim($_POST['senha']) ?? '';

    if ($nome === '' || $email === '' || $senha === '') {
        header("Location: ../views/index.html?preencher_campos");
        exit;
    }

    $usuario = new Usuario();
    $result = $usuario->cadastro($nome, $email, $senha);

    switch ($result) {
        case 1:
            header("Location: ../views/index.html?cadastro_feito");
            exit();
        case 2:
            header("Location: ../views/index.html?preencher_campos");
            exit();
        case 3:
            header("Location: ../views/index.html?usuario_existe");
            exit();
        default:
            header("Location: ../views/index.html?falha");
            exit();
    }

}

