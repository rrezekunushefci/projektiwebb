<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "projektiw"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_all = "SELECT * FROM bookings";
$result_all = $conn->query($sql_all);

$sql_recent = "SELECT * FROM bookings ORDER BY booking_date DESC LIMIT 3"; 
$result_recent = $conn->query($sql_recent);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
    <link rel="stylesheet" href="rezervimet.css">
    <link rel="website icon" href="logo.png" type="png">
</head>
<body>
    <header>
        <nav class="navbar">
            <img src="logo.png" class="logo">
            <div class="navbar-links">
                <a href="Tour.php" class="nav-link">TOURS</a>
                <a href="rezervimet.php" class="nav-link">BOOKINGS</a>
                <a href="kontaktet.php" class="nav-link">CONTACT/MESSAGES</a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search...">
            </div>
            <i class='bx bx-bell' style='color:#fff'></i>
        </nav>
    </header>
    <div class="permbajtja">
    <h3>Rezervimet e fundit:</h3>
            <table>
                <tr>
                    <th>Emri</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Vendi</th>
                    <th>Cmimi</th>
                    <th>Data</th>
                </tr>
                <?php
                if ($result_recent->num_rows > 0) {
                    while ($row = $result_recent->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['customer_name'] . "</td>";
                        echo "<td>" . $row['customer_email'] . "</td>";
                        echo "<td>" . $row['customer_phone'] . "</td>";
                        echo "<td>" . $row['product_name'] . "</td>";
                        echo "<td>" . $row['product_price'] . "</td>";
                        echo "<td>" . $row['booking_date'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nuk ka rezervim të regjistruar së fundmi.</td></tr>";
                }
                ?>
            </table>
            <h3>Te gjitha rezervimet:</h3>
            <table>
            <tr>
                    <th>Emri</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Vendi</th>
                    <th>Cmimi</th>
                    <th>Data</th>
                </tr>
                <?php
                if ($result_all->num_rows > 0) {
                    while ($row = $result_all->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['customer_name'] . "</td>";
                        echo "<td>" . $row['customer_email'] . "</td>";
                        echo "<td>" . $row['customer_phone'] . "</td>";
                        echo "<td>" . $row['product_name'] . "</td>";
                        echo "<td>" . $row['product_price'] . "</td>";
                        echo "<td>" . $row['booking_date'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nuk ka rezervim të regjistruar.</td></tr>";
                }
                ?>
            </table>
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