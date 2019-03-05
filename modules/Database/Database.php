<?php
class Database {

    private $pdo;

    private function __construct()
    {
        $core = Core::getInstance();
        $db = $core->getConfig('db');

        try {
            $this->pdo = new PDO("mysql:dbname=".$db['dbname'].";host=".$db['dbhost'], $db['dbuser'], $db['dbpass']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo 'Falhou a Conexão com Banco de Dados! ERROR: '.$e->getMessage();
        }
    }

    public static function getInstance()
    {
        static $inst = null;
        if ($inst === null) {
            $inst = new Database();
        }
        return $inst;
    }

    public function query($sql)
    {
        return $this->pdo->query($sql);
    }

    public function prepare($sql)
    {
        return $this->pdo->prepare($sql);
    }

    public function execute($array)
    {
        return $this->pdo->execute($array);
    }
}