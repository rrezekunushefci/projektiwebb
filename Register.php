<?php
session_start();
require('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emri = $_POST['Emri'];
    $email = $_POST['Email'];
    $fjalekalimi = password_hash($_POST['Fjalekalimi'], PASSWORD_DEFAULT);

    $check_existing_username = "SELECT * FROM users WHERE username = '$emri'";
    $result_existing_username = mysqli_query($data, $check_existing_username);

    if (mysqli_num_rows($result_existing_username) > 0) {
        echo "<script>alert('Emri i përdoruesit tashmë ekziston. Ju lutem zgjidhni një emër të ri.');</script>";
        exit();
    }

    $default_role = 'user';

    $sql = "INSERT INTO users (username, email, password, created_at, role) VALUES ('$emri', '$email', '$fjalekalimi', NOW(), '$default_role')";

    if (mysqli_query($data, $sql)) {
        // Close the database connection before setting the session
        mysqli_close($data);

        // Set the session variable
        $_SESSION['username'] = $emri;

        // Display success message and redirect using JavaScript
        echo "<script>alert('Regjistrimi juaj u krye me sukses! Miresevini ne Discover Mediterranean'); window.location.href = 'home.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($data);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Register.css">
    <title>Regjistrohu</title>
    <link rel="website icon" href="logo.png" type="png">
    <script src="register.js"></script>
</head>
<body>
    <?php require('inc/header2.php'); ?>
    <div class="permbajtja">
        <div class="forma">
            <form action="" name="formfill" onsubmit="return validation()" method="post">
                <h2>REGJISTROHU</h2>
                <p id="result"></p>

                <div class="inputet">
                    <i class='bx bxs-user'></i>
                    <input type="text" name="Emri" placeholder="Emri" autocomplete="off" required>
                </div>
                <div class="inputet">
                    <i class='bx bxs-user'></i>
                    <input type="text" name="Email" placeholder="Email Adresa" autocomplete="off" required>
                </div>
                <div class="inputet">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" name="Fjalekalimi" placeholder="Fjalekalimi" autocomplete="off" required>
                </div>

                <div class="inputet">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" name="Konfirmimi" placeholder="Konfirmo Fjalekalimin" autocomplete="off" required>
                </div>
                <div class="butoni">
                    <input type="submit" class="butoni" value="Regjistrohu">
                </div>
                <div class="grupi">
                    <span class="teksti-linkut">Keni një llogari?</span>
                    <span><a href="login.php" class="linku">Kycuni</a></span>
                </div>
            </form>
        </div>
    </div>
    <?php require('inc/footer.php'); ?>



        </div>
    </div>
    <script src="register.js"></script>
</body>
</html>










