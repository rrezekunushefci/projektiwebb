<?php
require_once('DB_connection.php');

class Products extends dbConnect
{
    private $id;
    private $name;
    private $price;
    private $description;
    private $created_at;
    protected $dbconn;
    public function __construct(
        $id = '',
        $name = '',
        $price = '',
        $description = '',
        $created_at = ''
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->created_at = $created_at;
        $this->dbconn = $this->connectDB();
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getPrice()
    {
        $this->price;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }
    public function getCreated_at()
    {
        return $this->created_at;
    }
    public function Datainsertion()
    {
        try {
            $this->dbconn = $this->connectDB();

            $sql = "INSERT INTO Products (name,price,description,created_at) VALUES (?,?,?,?)";
            $stm = $this->dbconn->prepare($sql);

            $stm->execute([$this->name, $this->price, $this->description, $this->created_at]);

            echo "<script>
                alert('Te dhenat tuaja u regjistruan me sukses');
                document.location='admindash.php';
                </script>";
        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
        }
    }

    public function ReadData()
    {
        $sql = 'SELECT * FROM Products';
        $stm = $this->dbconn->prepare($sql);
        $stm->execute();
        $rezultati = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $rezultati;
    }

    public function ReadDatafromId($id)
    {
        $sql = 'SELECT * FROM Products where id=:id';
        $stm = $this->dbconn->prepare($sql);
        $stm->execute([':id' => $this->id = $id]);
        $rezultati = $stm->fetch(PDO::FETCH_ASSOC);
        return $rezultati;
    }

    public function UpdateData()
    {
        $sql = 'UPDATE Products SET name=?, price=?, description=?, created_at=? where id=?';
        $stm = $this->dbconn->prepare($sql);
        $stm->execute([$this->name, $this->price, $this->description, $this->created_at, $this->id]);
    }
    public function DeleteData($id)
    {
        $sql = "DELETE FROM Products WHERE id=:id";
        $stm = $this->dbconn->prepare($sql);
        $stm->bindParam(':id', $id);
        $stm->execute();
        if ($stm == true) {
            echo "<script>
                alert('Te dhenat u fshine me sukses');
                document.location='admindash.php';
                </script>";
        } else {
            return false;
        }
    }
}