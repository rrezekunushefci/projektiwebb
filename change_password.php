<?php
session_start();



$db = new mysqli('localhost', 'root', '', 'projektiw');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);


}

if(isset($_SESSION['username'])) {
    $currentUsername = $_SESSION['username'];
    echo '<p>Welcome, ' . $currentUsername . '!</p>';
} else {

    header("Location: login.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

   
    $username = $_SESSION['admin_name'];
    $oldPasswordHash = md5($oldPassword); 
    $checkQuery = "SELECT * FROM users WHERE username='$username' AND password='$oldPasswordHash'";
    $checkResult = $db->query($checkQuery);

    if ($checkResult && $checkResult->num_rows > 0) {
       
        if ($newPassword == $confirmPassword) {
           
            $newPasswordHash = md5($newPassword); 
            $updateQuery = "UPDATE users SET password='$newPasswordHash' WHERE username='$username'";
            $db->query($updateQuery);

         
            echo "Fjalëkalimi u ndryshua me sukses!";
        } else {
            
            echo "Fjalëkalimi i ri dhe konfirmimi nuk përputhen!";
        }
    } else {
        
        echo "Fjalëkalimi i vjetër është i pasaktë!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ndrysho Fjalëkalimin</title>
    <link rel="stylesheet" href="changepw.css">
</head>

<body>
   
    <div class="permbajtja">
        <div class="forma">
        <h2>Ndrysho Fjalëkalimin</h2>
        <br>
    <form action="
    <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
     method="post">
        <label for="old_password">Fjalëkalimi i Vjetër:</label><br>
        <input type="password" id="old_password" name="old_password" required><br><br>
        <label for="new_password">Fjalëkalimi i Ri:</label><br>
        <input type="password" id="new_password" name="new_password" required><br><br>
        <label for="confirm_password">Konfirmo Fjalëkalimin e Ri:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        <input type="submit" value="Ndrysho Fjalëkalimin">
</div>
</div>
    </form>
</body>

</html>

<?php $db->close(); ?>

