<?php
session_start();

$loggedIn = isset($_SESSION['username']);
$userSession = $loggedIn ? $_SESSION['username'] : '';

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "projektiw";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error) {
    die("Lidhja dështoi: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tours</title>

    <link rel="stylesheet" href="Tour.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" href="logo.png" type="png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <img src="logo.png" class="logo">
        <ul>
            <li><a href="Home.php">HOME</a></li>
            <li><a href="Tour.php">TOURS</a></li>
            <li><a href="contact.php">CONTACT</a></li>
            <li><a href="aboutus.php">ABOUT US</a></li>

            <?php if ($loggedIn): ?>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <?php echo $userSession; ?>
                </a>
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

    <div class="text-container">
        <div class="main-txt">
            <h1><b>PAKETAT E GUIDAVE</b></h1>
        </div>
        <br>

        <div class="row" style="margin-top: 30px;">
            <?php
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              ?>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card h-100">
                    <img src="<?php echo $row['image']; ?>" alt="">
                    <div class="card-body">
                        <h3><?php echo $row['name']; ?></h3>
                        <h5><?php echo $row['description']; ?></h5>

                        <div class="star">
                            <?php
                  $rating = $row['rating'];
                  for ($i = 1; $i <= 5; $i++) {
                      if ($i <= $rating) {
                          echo '<i class="fa-solid fa-star checked"></i>';
                      } else {
                          echo '<i class="fa-solid fa-star"></i>';
                      }
                  }
                  ?>
                        </div>
                        <h6>Cmimi: <strong><?php echo $row['price']; ?></strong></h6>

                        <?php if ($loggedIn): ?>
                        <a href="booking_form.php?id=<?php echo $row['id']; ?>&name=<?php echo urlencode($row['name']); ?>&price=<?php echo $row['price']; ?>"
                            class="btn btn-primary">Book Now</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
          }
      } else {
          echo "Nuk u gjetën rezultate";
      }
      ?>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>
</body>

</html>





