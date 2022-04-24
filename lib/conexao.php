<?php
$host = "localhost";
$user = "root";
$pass = "";
$bd = "escola_ead";

$mysqli = new mysqli($host, $user, $pass, $bd);

if($mysqli->connect_errno){
    echo "Connect failed " . $mysqli->connect_error;
    exit();
}