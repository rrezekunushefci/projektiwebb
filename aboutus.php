<?php
session_start();
$loggedIn = isset($_SESSION['username']);
$username = $loggedIn ? $_SESSION['username'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="aboutuss.css">
    <link rel="icon" href="logo.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <?php require('inc/header.php'); ?>

        <div class="kontakti">
            <div class="teksti">
                <h3><b>RRETH NESH</b></h3>
                <br>
                <p><a href="Home.php"><b>Discover Mediterranean</b></a> është një udhërrëfyes i specializuar
                    <br> dhe një burim i vlefshëm për të gjithë ata që janë të apasionuar
                    <br> për udhëtimet në vendet e Mesdheut.
                    Ne jemi këtu për t'ju udhëzuar
                    <br>dhe për t'ju ofruar informacionin më të fundit dhe të detajuar
                    <br>mbi destinacionet e bukura të kësaj pjese perlë të botes!</p>
                <br>
                <h3>MISIONI YNE</h3>
                <br>
                <p>
                    Misioni ynë është të krijojmë përvoja të mrekullueshme udhëtimi,
                    <br> për të përcjellë pasionin tonë për kulturën, historinë, ushqimin,
                    <br> dhe pamjet e mahnitshme të Mesdheut nëpërmjet guidave tona të specializuara.
                    <br> <br>Synojmë të jemi burimi juaj i besueshëm për këtë rajon të pasur në histori dhe bukuri
                    natyrore!
                </p>
                <br>
                <h3>CFARE OFROJME NE?</h3>
                <br>
                <p>Ne ofrojmë Guide te personalizuar, ndihmë 24/7,
                    paketa të personalizuara, <br> blog dhe resurse edukative; Informacione dhe këshilla për udhëtimin
                    tuaj,
                    <br> duke iu siguruar autenticitet dhe cilësi në çdo shërbim.</p>
            </div>
            <div class="Ditet">
                <table>
                    <tr>
                        <th>DITET E PUNES</th>
                        <th>ORARI</th>
                    </tr>
                    <tr>
                        <td>E hene</td>
                        <td>9AM-7PM</td>
                    </tr>
                    <tr>
                        <td>E marte</td>
                        <td>9AM-9PM</td>
                    </tr>
                    <tr>
                        <td>E merkure</td>
                        <td>10AM-8PM</td>
                    </tr>
                    <tr>
                        <td>E enjte</td>
                        <td>9AM-4PM</td>
                    </tr>
                    <tr>
                        <td>E premte</td>
                        <td>12AM-7PM</td>
                    </tr>
                    <tr>
                        <td>E shtune</td>
                        <td>10AM-5PM</td>
                    </tr>
                    <tr>
                        <td>E diele</td>
                        <td><span style="color: rgb(145, 0, 0)">MBYLLUR</span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>
</body>

</html>




