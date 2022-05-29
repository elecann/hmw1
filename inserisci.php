<?php
require_once 'dbconfig.php';
    session_start();
    if(!isset($_SESSION['nickname'])){
        header("Location: login.php");
        exit;
    }
    
    $conn=mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    //$nickname= mysqli_real_escape_string($conn, $_GET['nickname']);
    $nickname=$_SESSION['nickname'];
    $fot=mysqli_real_escape_string($conn, $_GET['url']);
    
    

    $salva="INSERT INTO post(nickname, foto) VALUES('$nickname', '$fot')";
    mysqli_query($conn, $salva);
    mysqli_close($conn);
   

?>
