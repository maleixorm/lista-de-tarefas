<?php

class Conexao {
    private $host = 'localhost';
    private $dbname = 'php_com_pdo';
    private $user = 'php';
    private $pass = '123456';

    public function connect() {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            return $conn;
        } catch (\PDOException $e) {
            echo '<p>' . $e->getMessage() . '</p>';
        }
    }

}