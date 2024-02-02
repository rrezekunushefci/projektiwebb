<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "projektiw"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_all = "SELECT * FROM kontakti";
$result_all = $conn->query($sql_all);

$sql_recent = "SELECT * FROM kontakti ORDER BY data_regjistrimit DESC LIMIT 3"; // Merr 3 rezultatet e fundit të shtuara
$result_recent = $conn->query($sql_recent);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Results</title>
    <link rel="stylesheet" href="kontakti.css">
    <link rel="website icon" href="logo.png" type="png">
</head>
<body>
    <header>
        <nav class="navbar">
            <img src="logo.png" class="logo">
            <div class="navbar-links">
                <a href="Home.php" class="nav-link">TOURS</a>
                <a href="Tour.php" class="nav-link">BOOKINGS</a>
                <a href="aboutus.php" class="nav-link">CONTACT/MESSAGES</a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search...">
            </div>
            <i class='bx bx-bell' style='color:#fff'></i>
        </nav>
    </header>
    
    <div class="permbajtja">
        <div class="content-container">

        <h3>Kontaktet e Shtuara Së Fundmi:</h3>
            <table>
                <tr>
                    <th>Emri</th>
                    <th>Email</th>
                    <th>Nr.Tel</th>
                    <th>Mesazhi</th>
                </tr>
                <?php
                if ($result_recent->num_rows > 0) {
                    while ($row = $result_recent->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['Emri'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
                        echo "<td>" . $row['nrtel'] . "</td>";
                        echo "<td>" . $row['mesazhi'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nuk ka kontakt të regjistruar së fundmi.</td></tr>";
                }
                ?>
            
                <?php
                if ($result_recent->num_rows > 0) {
                    while ($row = $result_recent->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['Emri'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
                        echo "<td>" . $row['nrtel'] . "</td>";
                        echo "<td>" . $row['mesazhi'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nuk ka kontakt të regjistruar së fundmi.</td></tr>";
                }
                ?>
            </table>
            <h3>Kontaktet e regjistruara:</h3>
            <table>
                <tr>
                    <th>Emri</th>
                    <th>Email</th>
                    <th>Nr.Tel</th>
                    <th>Mesazhi</th>
                </tr>
                <?php
                if ($result_all->num_rows > 0) {
                    while ($row = $result_all->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['Emri'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
                        echo "<td>" . $row['nrtel'] . "</td>";
                        echo "<td>" . $row['mesazhi'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nuk ka kontakt të regjistruar.</td></tr>";
                }
                ?>
            </table>
            
           
        </div>
    </div>  

    <footer>
        <div class="icons">
          <img src="iglogo.png" alt="instagram" width="25px" />
          <img src="fblogo.png" alt="facebook" width="25px" />
        </div>
        <div class="copyright">
          &copy;2023 DISCOVER Mediterranenan, të gjitha të drejtat të rezervuara.
        </div>
    </footer>
</body>
</html>

<?php
$conn->close();
?>