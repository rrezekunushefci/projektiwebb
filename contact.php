<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="website icon" href="logo.png" type="png">
</head>
<body>
<?php require('inc/header.php'); ?>
    </nav>
    <div class="permbajtja">
        <div class="content-container">
            <form action="#" method="post" onsubmit="return contactFormValidation()" name="contactForm">
                <h3>Kontaktoni me ne</h3>
                <input type="text" id="Emri" name="Emri" placeholder="Emri juaj">
                <input type="text" id="Email" name="Email" placeholder="Email adresa">
                <input type="text" id="Phone" name="Phone" placeholder="Nr.Tel">
                <textarea name="Mesazhhi" id="Mesazhi"  rows="4"></textarea>
                <button type="submit">Dergo</button>

            </form>

            <div class="kontakti">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2922.380870197422!2d21.190426575878238!3d42.907007800372334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1354aeb47fb1b2fb%3A0xe7b4d025479a3582!2sZahir%20Pajaziti%2C%20Besian%C3%AB!5e0!3m2!1sen!2s!4v1702152875390!5m2!1sen!2s" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></iframe>
            </div>
        </div>
    </div>  
    <?php require('inc/footer.php'); ?>
      
      <script src="contact.js"></script>
</body>
</html>