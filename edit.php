<?php
require_once('produktet.php');
$dhenat = new Products();


if (isset($_GET['id'])) {
    $myId = $_GET['id'];


    $record = $dhenat->ReadDatafromId($myId);

    if (isset($_POST['edit'])) {

        if (isset($_POST['id']) && $myId == $_POST['id']) {
            $dhenat->setName($_POST['name']);
            $dhenat->setPrice($_POST['price']);
            $dhenat->setDescription($_POST['description']);
            $dhenat->setCreated_at($_POST['created_at']);

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
            <label>Name</label>
            <input type="text" class="inp" name="name" value="<?php echo $record['name']; ?>" />
            <label>Price</label>
            <input type="text" class="inp" name="price" value="<?php echo $record['price']; ?>" />
            <label>Description</label>
            <input type="text" class="inp" name="description" value="<?php echo $record['description']; ?>" />
            <label>Created_at</label>
            <input type="text" class="inp" name="created_at" value="<?php echo $record['created_at']; ?>" />
            <button name='edit'>SAVE</button>
        </form>
    </div>
</body>

</html>