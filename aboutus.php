<?php
session_start();
$loggedIn = isset($_SESSION['username']) ? $_SESSION['username'] : '';

$host = "localhost";
$user = "root";
$password = "";
$dbname = "projektiw";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

class SessionManager
{
    public static function getUsername()
    {
        return isset($_SESSION['username']) ? $_SESSION['username'] : '';
    }
}

class AboutUsPage
{
    private $username;
    private $db;

    public function __construct($db)
    {
        $this->username = SessionManager::getUsername();
        $this->db = $db;
    }

    public function generatePage()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>About Us</title>
            <link rel="stylesheet" href="aboutusss.css">

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>

        <body>
            <div class="container">
                <?php

                $loggedIn = isset($_SESSION['username']) ? $_SESSION['username'] : '';
                ?>

                <nav>
                    <img src="logo.png" class="logo">
                    <ul>
                        <li><a href="Home.php">HOME</a></li>
                        <li><a href="Tour.php">TOURS</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                        <li><a href="aboutus.php">ABOUT US</a></li>

                        <?php if ($loggedIn): ?>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $this->username; ?>
                                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="my_bag.php">My Bag</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="logout.php">Logout</a>
                                    </div>
                            </li>
                        <?php else: ?>
                            <li><a href="login.php">LOGIN</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>

                <div class="kontakti">
                    <div class="teksti">

                        <?php

                        $statement = $this->db->query("SELECT * FROM about_us_content");
                        $about_us_content = $statement->fetchAll(PDO::FETCH_ASSOC);


                        foreach ($about_us_content as $row) {
                            echo '<h3><b>' . $row['title'] . '</b></h3>';
                            echo '<p>' . $row['description'] . '</p>';
                        }
                        ?>
                    </div>
                    <div class="Ditet">

                        <?php

                        $statement = $this->db->query("SELECT * FROM working_hours");
                        $working_hours = $statement->fetchAll(PDO::FETCH_ASSOC);


                        echo '<table>';
                        echo '<tr><th>DITET E PUNES</th><th>ORARI</th></tr>';
                        foreach ($working_hours as $row) {
                            echo '<tr><td>' . $row['day'] . '</td><td>' . $row['hours'] . '</td></tr>';
                        }
                        echo '</table>';
                        ?>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>
        <?php
    }
}

$page = new AboutUsPage($db);
$page->generatePage();
?>