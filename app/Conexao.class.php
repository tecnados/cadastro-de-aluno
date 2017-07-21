<?php

/**
 * Description of Connect
 *
 * @author Gledson
 */
class Conexao {

    private $host;
    private $username;
    private $password;
    private $database;
    private static $pdo;

    public function __construct() {
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->database = 'cfcsystem';
    }

    public function connect() {
        try {
            if (is_null(self::$pdo)) {
                self::$pdo = new PDO("mysql:host=" . $this->host . ":dbname=" . $this->database, $this->username, $this->password);
            }
            return self::$pdo;
        } catch (PDOException $ex) {
            
        }
    }

}
