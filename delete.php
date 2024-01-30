<?php
require_once('produktet.php');
$dhena = new Products();
if (isset($_GET['id'])) {
    $myID = $_GET['id'];
    $dhena->DeleteData($myID);
}
