<?php

require_once __DIR__ . "/../config/Database.php";

class Usuario extends Database {
    
    const STATUS_OK = 1;
    const STATUS_INSERT_ERROR = 2;
    const STATUS_INVALID_PASSWORD = 3;
    const STATUS_EXISTS = 4;
    const STATUS_NOT_FOUND = 5;
    const STATUS_EXCEPTION = 6;

    private string $table1;

    public function __construct() {
        parent::__construct();

        $table = require __DIR__ . "/../../.env/tables.php";

        $this->table1 = $table['sistema_de_demandas'][1] ?? '';

    }

    public function cadastro(string $nome, string $email, string $senha): int {
        try {
            $sqlCheck = "SELECT 1 FROM {$this->table1} WHERE email = :email LIMIT 1";
            $stmtCheck = $this->conn->prepare($sqlCheck);
            $stmtCheck->bindValue(":email", $email);
            $stmtCheck->execute();

            if ($stmtCheck->fetch()) {
                return self::STATUS_EXISTS;
            }

            $hash = password_hash($senha, PASSWORD_DEFAULT);
            $sqlInsert = "INSERT INTO {$this->table1} (nome, email, senha) VALUES (:nome, :email, :senha)";
            $stmtInsert = $this->conn->prepare($sqlInsert);
            $stmtInsert->bindValue(":nome", $nome);
            $stmtInsert->bindValue(":email", $email);
            $stmtInsert->bindValue(":senha", $hash);

            if(!$stmtInsert->execute()){
                error_log("Falha ao inserir Usuário. SQLSTATE: " . $this->conn->errorInfo()[0]);
                return self::STATUS_INSERT_ERROR;
            }

            return self::STATUS_OK;
        } catch (PDOException $e) {
            error_log("PDOException ao cadastrar Usuário: " . $e->getMessage());
            return self::STATUS_EXCEPTION;
        } catch (Exception $e) {
            error_log("Exception ao cadastrar Usuário: " . $e->getMessage());
            return self::STATUS_EXCEPTION;
        }
    }

    public function login(string $email, string $senha): array {
        try {
            $sql = "SELECT * FROM {$this->table1} WHERE email = :email LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":email", $email);
            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$usuario) {
                return ['status' => self::STATUS_NOT_FOUND, 'usuario' => null];
            }

            if (!password_verify($senha, $usuario['senha'])) {
                return ['status' => self::STATUS_INVALID_PASSWORD, 'usuario' => null];
            }

            return ['status' => self::STATUS_OK, 'usuario' => $usuario];
            
        } catch (PDOException $e) {
            error_log("PDOException ao fazer login: " . $e->getMessage());
            return ['status' => self::STATUS_EXCEPTION, 'usuario' => null];
        } catch (Exception $e) {
            error_log("Exception ao fazer login: " . $e->getMessage());
            return ['status' => self::STATUS_EXCEPTION, 'usuario' => null];
        }
    } 

}