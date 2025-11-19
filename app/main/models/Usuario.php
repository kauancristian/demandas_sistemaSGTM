<?php

require_once __DIR__ . "/../config/Database.php";

class Usuario extends Database {
    
    public const int STATUS_OK = 1;
    public const int STATUS_INSERT_ERROR = 2;
    public const int STATUS_EXISTS = 3;
    public const int STATUS_EXCEPTION = 4;

    private string $table1;
    private string $table2;
    private string $table3;

    public function __construct() {
        parent::__construct();

        $table = require __DIR__ . "/../../.env/tables.php";

        $this->table1 = $table['sistema_de_demandas'][1] ?? '';
        $this->table2 = $table['sistema_de_demandas'][2] ?? '';
        $this->table3 = $table['sistema_de_demandas'][3] ?? '';

    }

    public function cadastro(string $nome, string $email, string $senha): int {
        try {
            $sqlCheck = "SELECT 1 FROM {$this->table1} WHERE email = :email LIMIT 1";
            $stmtCheck = $this->conn->prepare($sqlCheck);
            $stmtCheck->bindValue(":email", $email);
            $stmtCheck->execute();

            if ($stmtCheck->rowCount() > 0) {
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

    public function login(string $email, string $senha): int {
        try {
            $sql = "SELECT * FROM {$this->table1} WHERE email = :email LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":email", $email);
            $stmt->execute();

            // if ($stmt->rowCount() == 0) {
            //     return self::STATUS_EXISTS;
            // }

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$user) {
                return self::STATUS_EXISTS;
            }

            return self::STATUS_OK;

        } catch (PDOException $e) {
            error_log("PDOException ao fazer login: " . $e->getMessage());
            return self::STATUS_EXCEPTION;
        } catch (Exception $e) {
            error_log("Exception ao fazer login: " . $e->getMessage());
            return self::STATUS_EXCEPTION;
        }
    } 

}