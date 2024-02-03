<?php
require_once('users.php');
$dhenat = new users();


if (isset($_GET['id'])) {
    $myId = $_GET['id'];


    $record = $dhenat->ReadDatafromId($myId);

    if (isset($_POST['edit'])) {

        if (isset($_POST['id']) && $myId == $_POST['id']) {
            $dhenat->setUserame($_POST['username']);
            $dhenat->setPassword($_POST['password']);
            $dhenat->setCreated_at($_POST['created_at']);
            $dhenat->setRole($_POST['role']);
            $dhenat->setEmail($_POST['email']);
        

            echo $dhenat->UpdateData();

            echo "
            <script>
                alert('Te dhenat u perditesuan me sukses');
                document.location='admindash.php';
            </script>";
        } else {
            echo "Invalid data submitted.";
        }
    }
} else {
    echo "Invalid request. 'id' is not set.";
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="dashlogin.css" />
    <title>Insert Form</title>
</head>

<body>
    <div id="formulari">
        <h3>Update Data</h3>
        <form method="POST">

            <input type="hidden" name="id" value="<?php echo $myId; ?>">
            <label>Username</label>
            <input type="text" class="inp" name="username" value="<?php if(isset($record)) echo $record['username']; ?>" />
            <label>Password</label>
            <input type="password" class="inp" name="password" value="<?php if(isset($record)) echo $record['password']; ?>" />
            <label>Email</label>
            <input type="email" class="inp" name="email" value="<?php if(isset($record)) echo $record['email']; ?>" />
            <label>Role</label>
            <input type="text" class="inp" name="role" value="<?php if(isset($record)) echo $record['role']; ?>" />
            <button name='edit'>SAVE</button>
        </form>
    </div>
</body>

</html>