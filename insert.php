<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="dashlogin.css" />
    <title>Registartion Form</title>
</head>

<body>
    <div id="formulari">
        <h3>Registration Form</h3>
        <form action='' method="POST">
            <label>Name</label>
            <input type="text" class="inp" name="name" placeholder="Product Name..."
                value="<?php echo isset($_POST['name']) ? $_POST['emri'] : ''; ?>" />
            <label>Price</label>
            <input type="text" class="inp" name="price" placeholder="Product Price..."
                value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''; ?>" />
            <label>Description</label>
            <input type="text" class="inp" name="description" placeholder="Product Description..."
                value="<?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?>" />
            <label>Created_at</label>
            <input type="text" class="inp" name="created_at" placeholder="Created at..."
                value="<?php echo isset($_POST['created_at']) ? $_POST['created_at'] : ''; ?>" />
            <button name='save'>SAVE</button>
        </form>
    </div>
</body>

<?php
require_once('produktet.php');

if (isset($_POST['save'])) {
    $regj = new Products();
    $regj->setName($_POST['name']);
    $regj->setPrice($_POST['price']);
    $regj->setDescription($_POST['description']);
    $regj->setCreated_at($_POST['created_at']);
    $regj->Datainsertion();
}
?>

</html>