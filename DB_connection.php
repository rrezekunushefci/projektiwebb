<?php
class dbConnect
{
    private $conn = null;
    private $host = 'localhost';
    private $dbname = 'projektiw';
    private $username = 'root';
    private $password = '';

    public function connectDB()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::FETCH_BOUND, PDO::FETCH_BOTH);

            return $this->conn;
        } catch (PDOException $pdoe) {
            die("Nuk mund të lidhej me bazën e të dhënave {$this->dbname} :" . $pdoe->getMessage());
        }
    }
}