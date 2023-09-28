<?php
session_start();
if (!isset($_SESSION['ID'])) {
    header('location: ../index.php');
}
class Database
{


    private $server = "mysql:host=localhost;dbname=fci_db";
    private $username = "root";
    private $password = "";
    private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    protected $conn;

    public function open()
    {
        try {
            $this->conn = new PDO($this->server, $this->username, $this->password);
            return $this->conn;
        } catch (PDOException $e) {
            $msg = "erreur dans +" . $e->getMessage();
            die($msg);
        }
    }

    public function close()
    {
        $this->conn = null;
    }
}

$pdo = new Database();
