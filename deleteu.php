<?php
require_once('users.php');
$dhena = new users();
if (isset($_GET['id'])) {
    $myID = $_GET['id'];
    $dhena->DeleteData($myID);
}
