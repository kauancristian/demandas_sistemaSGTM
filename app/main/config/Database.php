<?php
//criando as constantes com os dados do banco
define('HOST', 'localhost');
define('DATABASE', 'sistema_de_demandas');
define('USER', 'root');
define('PASSWORD', '');

//criando a class
class connect
{
    //atributos
    protected $connect;

    //metodos especiais
    function __construct()
    {
        $this->connect_database();
    }

    //metodos
    function connect_database()
    {

        try {
            //se conectando com o banco usando PDO
            $this->connect = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);
        } catch (PDOException $e) {
            echo "erro ao se conectar com o banco de dados" . $e->getMessage();
            die();
        }
    }

    function query_fetch_assoc($sql)
    {
        //função para pegar os dados do banco de dados
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}