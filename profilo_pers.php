<?php
require_once 'dbconfig.php';
    session_start();
    if(!isset($_SESSION['nickname'])){
        header("Location: login.php");
        exit;
    }
    
    $conn=mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    //$nickname= mysqli_real_escape_string($conn, $_POST['nickname']);
    $nickname=$_SESSION['nickname'];
    $url=mysqli_real_escape_string($conn, $_GET["url"]);

    $query= "UPDATE utenti set url='".$url."' WHERE nickname='".$nickname."'";
    //$query="INSERT INTO utenti (url) values ('".$url."') where nickname='".$nickname"'";
    mysqli_query($conn, $query);
    mysqli_close($conn);
    echo json_encode($url);
    
?>
