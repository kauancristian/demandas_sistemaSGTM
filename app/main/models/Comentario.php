<?php

require_once __DIR__ . "/../config/Database.php";

class Comentario extends Database {

    const STATUS_OK = 1;
    const STATUS_ERROR = 2;

    private string $table3;

    public function __construct() {
        parent::__construct();
        $table = require __DIR__ . "/../../.env/tables.php";
        // Usaremos a próxima posição (4) se existir, senão 'comentarios'
        $this->table3 = $table['sistema_de_demandas'][4] ?? 'comentarios';
    }

    public function criarComentario(int $id_secao, int $id_usuario, string $assunto, string $descricao): ?int {
        try {
            $assunto = trim($assunto) ?: 'Sem assunto';
            $descricao = trim($descricao) ?: '';

            $sql = "INSERT INTO {$this->table3} (id_secao, id_usuario, assunto, descricao, criado_em) VALUES (:id_secao, :id_usuario, :assunto, :descricao, NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id_secao', $id_secao, PDO::PARAM_INT);
            $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->bindValue(':assunto', $assunto);
            $stmt->bindValue(':descricao', $descricao);

            if (!$stmt->execute()) {
                error_log('Falha ao inserir comentário: ' . json_encode($this->conn->errorInfo()));
                return null;
            }

            return (int)$this->conn->lastInsertId();
        } catch (Exception $e) {
            error_log('Erro ao criar comentário: ' . $e->getMessage());
            return null;
        }
    }

    public function obterComentariosPorSecao(int $id_secao): array {
        try {
            $sql = "SELECT c.id, c.id_secao, c.id_usuario, c.assunto, c.descricao, c.criado_em, u.nome as autor_nome, u.perfil as autor_perfil FROM {$this->table3} c LEFT JOIN usuarios u ON c.id_usuario = u.id WHERE c.id_secao = :id_secao ORDER BY c.criado_em DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id_secao', $id_secao, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (Exception $e) {
            error_log('Erro ao obter comentários: ' . $e->getMessage());
            return [];
        }
    }

    public function deletarComentario(int $id_comentario): bool {
        try {
            $sql = "DELETE FROM {$this->table3} WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id', $id_comentario, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            error_log('Erro ao deletar comentário: ' . $e->getMessage());
            return false;
        }
    }

}

?>
