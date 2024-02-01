<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking Form</title>
<style>
/* CSS styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: "Arial", sans-serif;
  background-color: #f4f4f4;
}

.background-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: url(ROVINJ\ 1.1.jpeg);
  filter: blur(4px);
  z-index: -1;
}

#booking-form-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

#booking-form {
  width: 50%;
  background: linear-gradient(135deg, #c9b6d7, #f6cadd);
  border-radius: 15px;
  padding: 20px;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
  transition: box-shadow 0.3s ease;
}

#booking-form:hover {
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
}

label {
  font-size: 18px;
  margin-bottom: 5px;
}

.input-field {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ddd;
  border-radius: 5px;
}

button {
  background-color: #f380b9;
  color: #fff;
  width: 120px;
  height: 40px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.3s ease, color 0.3s ease, transform 0.2s ease;
  font-size: 16px;
  margin-top: 10px;
}

button:hover {
  background-color: #9652c2;
  color: #fff;
  transform: scale(1.05);
}

/* Hide thank you message initially */
.thank-you {
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  padding: 20px;
  background-color: rgba(255, 255, 255, 0.8);
  border-radius: 8px;
  z-index: 1;
}

/* Additional styles for thank you message */
.thank-you h2 {
  font-size: 24px;
  margin-bottom: 10px;
  color: #000;
  font-weight: bold;
}

.thank-you p {
  font-size: 18px;
  color: #000;
  margin-bottom: 15px;
}

.thank-you a {
  display: inline-block;
  text-decoration: none;
  color: #fff;
  background-color: #9652c2;
  padding: 10px 20px;
  border-radius: 8px;
  transition: background-color 0.3s ease;
  margin-top: 10px;
}

.thank-you a:hover {
  background-color: #7d2aa0;
}
</style>
</head>
<body>

<!-- Background Container -->
<div class="background-container"></div>

<!-- Booking Form -->
<div id="booking-form-container">
  <div id="booking-form">
    <h2>Booking Form</h2>
    <form id="bookingForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <input type="hidden" name="product_name" value="Your_Product_Name">
      <input type="hidden" name="product_price" value="Your_Product_Price">
      <label for="customer_name">Name:</label>
      <input type="text" id="customer_name" name="customer_name" class="input-field" required>
      <label for="customer_email">Email:</label>
      <input type="email" id="customer_email" name="customer_email" class="input-field" required>
      <label for="customer_phone">Phone:</label>
      <input type="tel" id="customer_phone" name="customer_phone" class="input-field" required>
      <button type="submit">Submit</button>
    </form>
  </div>
</div>

<!-- Thank you message -->
<div id="thankYouMessage" class="thank-you">
  <h2>Thank you for your booking!</h2>
  <p>We will get in touch with you shortly.</p>
  <a href="tour.php">Back to Tours</a>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var form = document.getElementById("bookingForm");
  var thankYouMessage = document.getElementById("thankYouMessage");

  form.addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission
    form.parentNode.style.display = "none"; // Hide the form container
    thankYouMessage.style.display = "block"; // Show thank you message
  });
});
</script>

</body>
</html>








