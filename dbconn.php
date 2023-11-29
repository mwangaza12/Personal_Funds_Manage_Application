<?php
session_start();
$dbsevername = "localhost";
$dbUsername = "root";
$dbpassword = "";
$dbname = "pfund_db";

$conn = mysqli_connect($dbsevername,$dbUsername,$dbpassword,$dbname);

function check_session() {

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
}

?>