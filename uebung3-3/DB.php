<?php

class DB
{
    protected static $instance;

    protected $pdo;

    protected $isTransactionRunning = false;

    private function __construct()
    {
        $servername = "";
        $username = "";
        $password = "";
        $database = "";

        $this->pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function get() {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function startTransaction() {
        if ($this->isTransactionRunning) {
            throw new Exception('There is already a transaction running!');
        }
        $this->pdo->exec('START TRANSACTION');
        $this->isTransactionRunning = true;
    }

    public function rollbackTransaction() {
        $this->pdo->exec('ROLLBACK');
        $this->isTransactionRunning = false;
    }

    public function commitTransaction() {
        $this->pdo->exec('COMMIT');
        $this->isTransactionRunning = false;
    }

    public function query($sql, $params) {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
    }

    public function select($sql, $params) {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);

        return $statement->fetchAll();
    }
}

