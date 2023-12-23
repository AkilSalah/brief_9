<?php
$servername = "localhost";
$username = "root";
$db = "brief9";
$password = "";

try {
    $con = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

require_once("../models/quizC.php");
$question = new quizz($con);
require_once("../models/reponse.php");
$reponse = new response($con);


?>