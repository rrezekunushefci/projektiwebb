<?php
session_start();



class Database
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "projektiw";
    private $connection;

    

    public function __construct()
    {
        $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);

        if ($this->connection === false) {
            die("Gabim në lidhje");
        }

        echo ".";
    }

    public function getConnection()
    {
        return $this->connection;
    }
}

class UserAuthentication
{
    private $database;
    private $resultMessage = '';

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function authenticate()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $sql = "SELECT * FROM users WHERE username=? AND password=?";
            $stmt = mysqli_prepare($this->database->getConnection(), $sql);
            mysqli_stmt_bind_param($stmt, "ss", $username, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            $row = mysqli_fetch_array($result);

            if ($row) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];
                
                if(isset($_POST['username'], $_POST['password'])) 
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                if ($row["role"] == "user") {
                    header("Location: Home.php");
                    exit();
                } elseif ($row["role"] == "admin") {
                    header("Location: admindash.php");
                    exit();
                } else {
                    $this->resultMessage = "Invalid role";
                }
            } else {
                $this->resultMessage = "Wrong Credentials";
            }
        }
    }

    public function getResultMessage()
    {
        return $this->resultMessage;
    }
}

class LoginForm
{
    private $userAuthentication;

    public function __construct(UserAuthentication $userAuthentication)
    {
        $this->userAuthentication = $userAuthentication;
    }

    public function render()
    {
        require('inc/header2.php');
        ?>
        <div class="permbajtja">
            <div class="forma">
                <form action="" name="formfill" onsubmit="return validation()" method="post">
                    <h2>Kycu</h2>
                    <p id="result">
                        <?php echo $this->userAuthentication->getResultMessage(); ?>
                    </p>

                    <div class="inputet">
                        <i class='bx bxs-user'></i>
                        <input type="text" name="username" placeholder="Emri i Perdoruesit" autocomplete="off">
                    </div>
                    <div class="inputet">
                        <i class='bx bxs-lock-alt'></i>
                        <input type="password" name="password" placeholder="Fjalekalimi" autocomplete="off">
                    </div>

                    <div class="butoni">
                        <input type="submit" class="butoni" value="Kycu">
                    </div>
                    <div class="grupi">
                        <span class="teksti-linkut">Nuk keni nje llogari?</span>
                        <span><a href="register.php" class="linku">Regjistrohuni</a></span>
                    </div>
                </form>
            </div>
        </div>
        <script src="loginn.js"></script>
        <link rel="stylesheet" href="login.css">
        <link rel="website icon" href="logo.png" type="png">
        <title>Log In</title>
        
        <?php require('inc/footer.php');
    }
}

$database = new Database();
$userAuthentication = new UserAuthentication($database);
$userAuthentication->authenticate();

$loginForm = new LoginForm($userAuthentication);
$loginForm->render();
?>