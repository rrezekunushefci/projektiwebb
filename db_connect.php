<?php
$host="localhost";
$user="root";
$password="";
$db="projektiw";




$data=mysqli_connect($host, $user, $password, $db);



if ($data===false) {
    die("Gabim në lidhje");
}
echo "Lidhja u krye me sukses";
