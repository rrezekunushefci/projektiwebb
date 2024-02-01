<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $customerName = $_POST['customer_name'];
    $customerEmail = $_POST['customer_email'];
    $customerPhone = $_POST['customer_phone'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projektiw";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the statement
    $stmt = $conn->prepare("INSERT INTO bookings (product_id, product_name, product_price, customer_name, customer_email, customer_phone) VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("isdsss", $productId, $productName, $productPrice, $customerName, $customerEmail, $customerPhone);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "Record inserted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    header("Location: error.php");
    exit();
}
?>





