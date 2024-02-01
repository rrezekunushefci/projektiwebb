<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="contactt.css">
    <link rel="website icon" href="logo.png" type="png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
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
                        <?php echo $username; ?>
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

    <div class="permbajtja">
        <div class="content-container">
            <form action="#" method="post" onsubmit="return contactFormValidation()" name="contactForm">
                <h3>Kontaktoni me ne</h3>
                <input type="text" id="Emri" name="Emri" placeholder="Emri juaj">
                <input type="text" id="Email" name="Email" placeholder="Email adresa">
                <input type="text" id="Phone" name="Phone" placeholder="Nr.Tel">
                <textarea name="Mesazhhi" id="Mesazhi" rows="4"></textarea>
                <button type="submit">Dergo</button>
            </form>

            <div class="kontakti">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2922.380870197422!2d21.190426575878238!3d42.907007800372334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1354aeb47fb1b2fb%3A0xe7b4d025479a3582!2sZahir%20Pajaziti%2C%20Besian%C3%AB!5e0!3m2!1sen!2s!4v1702152875390!5m2!1sen!2s"
                    width="200" height="100" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>

    <script src="contact.js"></script>
</body>

</html>
