<?php
session_start();

if (!isset($_SESSION['loggedin'])) { 
    $_SESSION['msg'] = "You have to log in first"; 
    header('location: login.php'); 
} extract($_SESSION['userData']);

require_once "config.php";
$id = $_SESSION['id'];


    $sql = "UPDATE users SET hintca = 1, points= points - 100 WHERE discord_id =$discord_id";
    // Prepare statement
    $stmt = $link->prepare($sql);
    // execute the query
    $stmt->execute();

    $stmt->close();
    $link->close();
    header('location: dashboard.php');

?>