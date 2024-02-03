<?php
require_once('DB_connection.php');

class users extends dbConnect
{
    private $id;
    private $username;
    private $password;
     private $created_at;
    private $role;
    private $email;
    protected $dbconn;
    public function __construct(
        $id = '',
        $name = '',
        $password = '',
        $created_at = '',
        $role = '',
        $email = '',
    ) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->created_at = $created_at;
        $this->role = $role;
        $this->email = $email;
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
    public function setUserame($username)
    {
        $this->username = $username;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        $this->password;
    }
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }
    public function getCreated_at()
    {
        return $this->created_at;
    
    }
    public function setRole($role)
    {
        $this->role = $role;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function setEmail($email)
    {
        $this->email= $email;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function Datainsertion()
    {
        try {
            $this->dbconn = $this->connectDB();

            $sql = "INSERT INTO users (username,password,created_at,role,email) VALUES (?,?,?,?,?,)";
            $stm = $this->dbconn->prepare($sql);

            $stm->execute([$this->username, $this->password, $this->created_at, $this->role, $this->email]);

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
        $sql = 'SELECT * FROM users';
        $stm = $this->dbconn->prepare($sql);
        $stm->execute();
        $rezultati = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $rezultati;
    }

    public function ReadDatafromId($id)
    {
        $sql = 'SELECT * FROM users where id=:id';
        $stm = $this->dbconn->prepare($sql);
        $stm->execute([':id' => $this->id = $id]);
        $rezultati = $stm->fetch(PDO::FETCH_ASSOC);
        return $rezultati;
    }

    public function UpdateData()
    {
        $sql = 'UPDATE users SET username=?, password=?, created_at=?, role=?, email=? where id=?';
        $stm = $this->dbconn->prepare($sql);
        $stm->execute([$this->username, $this->password, $this->created_at, $this->role, $this->email, $this->id]);
    }
    public function DeleteData($id)
    {
        $sql = "DELETE FROM users WHERE id=:id";
        $stm = $this->dbconn->prepare($sql);
        $stm->bindParam(':id', $id);
        $stm->execute();
        if ($stm == true) {
            echo "<script>
                alert('Perdoruesi  u fshi me sukses');
                document.location='admindash.php';
                </script>";
        } else {
            return false;
        }
    }
}