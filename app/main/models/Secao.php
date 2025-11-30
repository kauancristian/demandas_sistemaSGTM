<?php

require_once __DIR__ . "/../config/Database.php";

class Secao extends Database {

    const STATUS_OK = 1;
    const STATUS_INSERT_ERROR = 2;
    const STATUS_EXCEPTION = 3;

    private string $table3;

    public function __construct() {
        parent::__construct();

        $table = require __DIR__ . "/../../.env/tables.php";

        $this->table3 = $table['sistema_de_demandas'][3] ?? '';

    }

    public function criarSecao(int $id_planilha, string $titulo): int {
        try {
            $sqlInsert = "INSERT INTO {$this->table3} (id_planilha, titulo, criado_em) VALUES (:id_planilha, :titulo, NOW())";
            $stmtInsert = $this->conn->prepare($sqlInsert);
            $stmtInsert->bindValue(':id_planilha', $id_planilha, PDO::PARAM_INT);
            $stmtInsert->bindValue(':titulo', $titulo);

            if (!$stmtInsert->execute()) {
                error_log("Falha ao inserir Seção. SQLSTATE: " . $this->conn->errorInfo()[0]);
                return self::STATUS_INSERT_ERROR;
            }

            return self::STATUS_OK;
            
        } catch (PDOException $e) {
            error_log("PDOException ao criar Seção: " . $e->getMessage());
            return self::STATUS_EXCEPTION;
        } catch (Exception $e) {
            error_log("Exception ao criar Seção: " . $e->getMessage());
            return self::STATUS_EXCEPTION;
        }
    }

    public function obterUltimaSecao(int $id_planilha): ?int {
        try {
            $sqlSelect = "SELECT id FROM {$this->table3} WHERE id_planilha = :id_planilha ORDER BY criado_em DESC LIMIT 1";
            $stmtSelect = $this->conn->prepare($sqlSelect);
            $stmtSelect->bindValue(':id_planilha', $id_planilha, PDO::PARAM_INT);

            if (!$stmtSelect->execute()) {
                error_log("Falha ao obter última seção. SQLSTATE: " . $this->conn->errorInfo()[0]);
                return null;
            }

            $result = $stmtSelect->fetch();
            return $result ? intval($result['id']) : null;
            
        } catch (PDOException $e) {
            error_log("PDOException ao obter última seção: " . $e->getMessage());
            return null;
        } catch (Exception $e) {
            error_log("Exception ao obter última seção: " . $e->getMessage());
            return null;
        }
    }

    public function obterSecoesPlanilha(int $id_planilha): array {
        try {
            $sqlSelect = "SELECT id, titulo, criado_em FROM {$this->table3} WHERE id_planilha = :id_planilha ORDER BY criado_em DESC";
            $stmtSelect = $this->conn->prepare($sqlSelect);
            $stmtSelect->bindValue(':id_planilha', $id_planilha, PDO::PARAM_INT);

            if (!$stmtSelect->execute()) {
                error_log("Falha ao obter seções. SQLSTATE: " . $this->conn->errorInfo()[0]);
                return [];
            }

            return $stmtSelect->fetchAll();
            
        } catch (PDOException $e) {
            error_log("PDOException ao obter seções: " . $e->getMessage());
            return [];
        } catch (Exception $e) {
            error_log("Exception ao obter seções: " . $e->getMessage());
            return [];
        }
    }
}
