<?php

class DB
{
    private $type = 'mysql';
    private $Server = 'localhost';
    private $db = 'test';
    private $charset = "utf8mb4";

    private $username = "php";
    private $password = "1234";
    private $conn;

    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];


    public function __construct()
    {
        try {
            $dsn = "$this->type:host=$this->Server;dbname=$this->db;charset=$this->charset";
            $this->conn = new PDO($dsn, $this->username, $this->password, $this->options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
            exit();
        }
    }

    public function insertNaam($naam)
    {
        if ($naam[0] == '') return;
        if ($naam[1] == '') return;
        $sql = "INSERT INTO personen (vnaam, anaam,geslacht,email) VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($naam);
    }

    public function getData()
    {
        $query = "SELECT * from personen";
        $opdracht = $this->conn->query($query);
        return ($opdracht->fetchAll());
    }
}
