<?php
class Database {
    protected ?PDO $conn = null ;

    protected function __construct() {
        $this->connect();
    }

    public function connect(): void {
        try {
            $config = require __DIR__ . "/../../.env/config.php";

            $host = $config['local']['host'];
            $database = $config['local']['banco'];
            $user = $config['local']['user'];
            $password = $config['local']['senha'];

            $this->conn = new PDO('mysql:host=' . $host . ';dbname=' . $database . ';charset=utf8', $user, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Erro de conexão com banco: " . $e->getMessage());
            $this->conn = null;
        }
    }

    public function getConnection(): PDO {
        return $this->conn;
    }
}