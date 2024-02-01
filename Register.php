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
<?php require('inc/header.php'); ?>
    <div class="permbajtja">
        <div class="forma">
            <form action="" name="formfill" onsubmit="return validation ()">
                <h2>REGJISTROHU</h2>
                <p id="result"></p>
                <div class="inputet">
                    <i class='bx bxs-user'></i>
                    <input type="text" name="Emri" placeholder="Emri">
                </div>
                <div class="inputet">
                    <i class='bx bxs-user'></i>
                    <input type="text" name="Email" placeholder="Email Adresa">
                </div>
                <div class="inputet">
                    <i class='bx bxs-user'></i>
                    <input type="password" name="Fjalekalimi" placeholder="Fjalekalimi">
                </div>

                <div class="inputet">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" name="Konfirmimi" placeholder="Konfirmo Fjalekalimin">
                </div>
                <div class="butoni">
                    <input type="submit" class="butoni" value="Regjistrohu">
                </div>
                <div class="grupi">
                    <span class="teksti-linkut">Keni nje llogari?</span>
                    <span><a href="login.php" class="linku">Kycuni</a></span>
                </div>
            </form>
        </div>
        <div class="popup" id="popup">
            <ion-icon name="checkmark-circle-outline"></ion-icon>
            <h2>Ju Faleminderit!</h2>
            <p>Regjistrimi juaj ishte i suksesshem.</p>
            <a href="#"><button onclick="closePopup()">OK</button></a>
        </div>
    </div>
    <?php require('inc/footer.php'); ?>



        </div>
    </div>
    
</body>
</html>