<?php
class Database {
    protected ?PDO $conn = null ;

    protected function __construct() {
        $this->connect();
    }

    public function connect() {
        try {
            $config = require __DIR__ . "/../../.env/config.php";

            $host = $config['local']['sistema_de_demandas']['host'];
            $database = $config['local']['sistema_de_demandas']['banco'];
            $user = $config['local']['sistema_de_demandas']['user'];
            $password = $config['local']['sistema_de_demandas']['senha'];

            $this->conn = new PDO('mysql:host=' . $host . ';dbname=' . $database . ';charset=utf8', $user, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Erro de conexão com banco: " . $e->getMessage());
            $this->conn = null;
            header('location:../views/windows/desconnect.php');
            exit();
        }
    }
}