<?php
class DB
{
    protected static $instance;
    
    protected $pdo;

    protected $isTransactionRunning = false;
    
    private function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "northwind";

        $this->pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function __destruct()
    {
        $this->pdo->commit();
    }
    
    public static function get() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }

    public function startTransaction(){
        if($this->thisTransactionRunning == true){
            throw new Exception('There is already a Transaction running');
        }else{
        $this->pdo->beginTransaction();
        $this->isTransactionRunning = true;
        }
    }

    public function commitTransaction(){
        $this->pdo->commit();
    }

    public function rollbackTransaction(){
        $this->pdo->rollBack();
    }

    public function query($sql, $params){
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array([
            $params
        ]));
    }

    public function select($sql, $params){
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array([
            $params
        ]));
        return $stmt->fetchAll();
    }
}

$db = DB::get();