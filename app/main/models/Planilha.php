<?php

require_once __DIR__ . "/../config/Database.php";

class Planilha extends Database {

    const STATUS_OK = 1;
    const STATUS_INSERT_ERROR = 2;
    const STATUS_EXCEPTION = 3;

    private string $table2;
    private string $table3;

    public function __construct() {
        parent::__construct();

        $table = require __DIR__ . "/../../.env/tables.php";

        $this->table2 = $table['sistema_de_demandas'][2] ?? '';
        $this->table3 = $table['sistema_de_demandas'][3] ?? '';

    }

    public function criarPlanilha(string $titulo, int $id_usuario, array $secoes = []): array {
        try {
            // validações básicas
            $titulo = trim($titulo);
            if (empty($titulo) || strlen($titulo) > 200) {
                error_log("Título inválido ao criar planilha");
                return ['status' => self::STATUS_INSERT_ERROR, 'id_planilha' => null];
            }

            $this->conn->beginTransaction();

            $sqlInsert = "INSERT INTO {$this->table2} (titulo, criado_em, id_usuario) VALUES (:titulo, NOW(), :id_usuario)";
            $stmtInsert = $this->conn->prepare($sqlInsert);
            $stmtInsert->bindValue(':titulo', $titulo);
            $stmtInsert->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);

            $sqlInsert = "INSERT INTO {$this->table2} (titulo, criado_em, id_usuario) VALUES (:titulo, NOW(), :id_usuario)";
            $stmtInsert = $this->conn->prepare($sqlInsert);
            $stmtInsert->bindValue(':titulo', $titulo);
            $stmtInsert->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);

            if (!$stmtInsert->execute()) {
                $this->conn->rollBack();
                error_log("Falha ao inserir Planilha. SQLSTATE: " . $this->conn->errorInfo()[0]);
                return ['status' => self::STATUS_INSERT_ERROR, 'id_planilha' => null];
            }

            $id_planilha = (int) $this->conn->lastInsertId();

            if (!empty($secoes) && !empty($this->table3)) {
                $sqlInsert = "INSERT INTO {$this->table3} (id_planilha, titulo, criado_em) VALUES (:id_planilha, :titulo, NOW())";
                $stmtInsert = $this->conn->prepare($sqlInsert);

                foreach ($secoes as $secao) {
                    $tituloSec = '';
                    if (is_array($secao)) {
                        $tituloSec = $secao['titulo'] ?? '';
                    } else {
                        $tituloSec = (string) $secao;
                    }

                    $stmtInsert->bindValue(':id_planilha', $id_planilha, PDO::PARAM_INT);
                    $stmtInsert->bindValue(':titulo', $tituloSec);

                    if (!$stmtInsert->execute()) {
                        $this->conn->rollBack();
                        error_log("Falha ao inserir Seção. SQLSTATE: " . $this->conn->errorInfo()[0]);
                        return ['status' => self::STATUS_INSERT_ERROR, 'id_planilha' => null];
                    }
                }
            }

            $this->conn->commit();
            return ['status' => self::STATUS_OK, 'id_planilha' => $id_planilha];

        } catch (PDOException $e) {
            if ($this->conn && $this->conn->inTransaction()) {
                $this->conn->rollBack();
            }
            error_log("PDOException ao criar Planilha: " . $e->getMessage());
            return ['status' => self::STATUS_EXCEPTION, 'id_planilha' => null];
        } catch (Exception $e) {
            if ($this->conn && $this->conn->inTransaction()) {
                $this->conn->rollBack();
            }
            error_log("Exception ao criar Planilha: " . $e->getMessage());
            return ['status' => self::STATUS_EXCEPTION, 'id_planilha' => null];
        }
    }

    // Retorna todas as planilhas do usuário
    public function obterPlanilhasDoUsuario(int $id_usuario): array {
        try {
            $sql = "SELECT id, titulo, criado_em FROM {$this->table2} WHERE id_usuario = :id_usuario ORDER BY criado_em DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (Exception $e) {
            error_log("Erro ao obter planilhas: " . $e->getMessage());
            return [];
        }
    }

    // Retorna as seções de uma planilha
    public function obterSecoesPlanilha(int $id_planilha): array {
        try {
            $sql = "SELECT id, id_planilha, titulo, criado_em FROM {$this->table3} WHERE id_planilha = :id_planilha ORDER BY criado_em ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id_planilha', $id_planilha, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (Exception $e) {
            error_log("Erro ao obter seções: " . $e->getMessage());
            return [];
        }
    }

    // Retorna uma seção pelo id
    public function obterSecaoPorId(int $id_secao): ?array {
        try {
            $sql = "SELECT id, id_planilha, titulo, criado_em FROM {$this->table3} WHERE id = :id LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id', $id_secao, PDO::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return $res ?: null;
        } catch (Exception $e) {
            error_log("Erro ao obter seção por id: " . $e->getMessage());
            return null;
        }
    }

    // Cria uma seção e retorna o id
    public function criarSecao(int $id_planilha, string $titulo): ?int {
        try {
            $titulo = trim($titulo) ?: 'Sem título';
            $sql = "INSERT INTO {$this->table3} (id_planilha, titulo, criado_em) VALUES (:id_planilha, :titulo, NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id_planilha', $id_planilha, PDO::PARAM_INT);
            $stmt->bindValue(':titulo', $titulo);
            if (!$stmt->execute()) {
                error_log("Falha ao inserir seção: " . $this->conn->errorInfo()[0]);
                return null;
            }
            return (int) $this->conn->lastInsertId();
        } catch (Exception $e) {
            error_log("Erro ao criar seção: " . $e->getMessage());
            return null;
        }
    }

    // Atualiza o título de uma seção
    public function atualizarTituloSecao(int $id_secao, string $novo_titulo): bool {
        try {
            $novo_titulo = trim($novo_titulo) ?: 'Sem título';
            $sql = "UPDATE {$this->table3} SET titulo = :titulo WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':titulo', $novo_titulo);
            $stmt->bindValue(':id', $id_secao, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Erro ao atualizar seção: " . $e->getMessage());
            return false;
        }
    }

    // Deleta uma seção
    public function deletarSecao(int $id_secao): bool {
        try {
            $sql = "DELETE FROM {$this->table3} WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id', $id_secao, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Erro ao deletar seção: " . $e->getMessage());
            return false;
        }
    }

    // Verifica se o usuário é proprietário da planilha
    public function verificarProprietarioPlanilha(int $id_planilha, int $id_usuario): bool {
        try {
            $sql = "SELECT 1 FROM {$this->table2} WHERE id = :id AND id_usuario = :id_usuario LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id', $id_planilha, PDO::PARAM_INT);
            $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->execute();
            return (bool) $stmt->fetch();
        } catch (Exception $e) {
            error_log("Erro ao verificar proprietário: " . $e->getMessage());
            return false;
        }
    }
}

?>
