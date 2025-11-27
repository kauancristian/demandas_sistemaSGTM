<?php

require_once __DIR__ . "/../config/Database.php";

class Planilha extends Database {

    const STATUS_OK = 1;
    const STATUS_INSERT_ERROR = 2;
    const STATUS_EXCEPTION = 3;

    private string $table2;

    public function __construct() {
        parent::__construct();

        $table = require __DIR__ . "/../../.env/tables.php";

        $this->table2 = $table['sistema_de_demandas'][2] ?? '';

    }

    public function criarPlanilha(string $titulo, int $id_usuario): int {
        try {
            $sqlInsert = "INSERT INTO {$this->table2} (titulo, criado_em, id_usuario) VALUES (:titulo, NOW(), :id_usuario)";
            $stmtInsert = $this->conn->prepare($sqlInsert);
            $stmtInsert->bindValue(':titulo', $titulo);
            $stmtInsert->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);

            if (!$stmtInsert->execute()) {
                error_log("Falha ao inserir Planilha. SQLSTATE: " . $this->conn->errorInfo()[0]);
                return self::STATUS_INSERT_ERROR;
            }

            return self::STATUS_OK;
            
        } catch (PDOException $e) {
            error_log("PDOException ao criar Planilha: " . $e->getMessage());
            return self::STATUS_EXCEPTION;
        } catch (Exception $e) {
            error_log("Exception ao criar Planilha: " . $e->getMessage());
            return self::STATUS_EXCEPTION;
        }
    }
}