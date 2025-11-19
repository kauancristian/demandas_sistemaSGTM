<?php

require_once __DIR__ . "/../config/Database.php";

class Usuario extends Database {
    
    private string $table1;
    private string $table2;
    private string $table3;

    public function __construct() {
        parent::__construct();

        $table = require __DIR__ . "/../../.env/tables.php";

        $this->table1 = $table['sistema_de_demandas'][1];
        $this->table2 = $table['sistema_de_demandas'][2];
        $this->table3 = $table['sistema_de_demandas'][3];

    }

    public function cadastro(string $nome, string $email, string $senha): int {
        try {
            $stmtCheck = $this->conn->prepare("SELECT * FROM $this->table1 WHERE email = :email");
            $stmtCheck->bindValue(":email", $email);
            $stmtCheck->execute();

            if ($stmtCheck->rowCount() > 0) {
                return 3;
            }

            $hash = password_hash($senha, PASSWORD_DEFAULT);
            $stmtCheck = $this->conn->prepare("INSERT INTO $this->table1 (nome, email, senha) VALUES (:nome, :email, :senha)");
            $stmtCheck->bindValue(":nome", $nome);
            $stmtCheck->bindValue(":email", $email);
            $stmtCheck->bindValue(":senha", $hash);

            if(!$stmtCheck->execute()){
                return 2;
            }

            return 1;
        } catch (Exception $e) {
            error_log("Erro ao cadastrar Usuário: " . $e->getMessage());
            return 0;
        }
    }

    public function login(string $email, string $senha): int {
        try {
            $stmtCheck = $this->conn->prepare("SELECT * FROM $this->table1 WHERE email = :email");
            $stmtCheck->bindValue(":email", $email);
            $stmtCheck->execute();

            if ($stmtCheck->rowCount() == 0) {
                return 3;
            }

            $user = $stmtCheck->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                return 3;
            }

            if (!password_verify($senha, $user['senha'])) {
                return 2;
            }
            
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            
            $_SESSION['id'] = $user['id'];
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['email'] = $user['email'];

            return 1;

        } catch (Exception $e) {
            error_log("Erro ao fazer login: " . $e->getMessage());
            return 0;
        }
    } 

}