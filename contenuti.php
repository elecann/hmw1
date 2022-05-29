<?php
require_once 'dbconfig.php';
    session_start();
    if(!isset($_SESSION['nickname'])){
        header("Location: login.php");
        exit;
    }
    $conn=mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    $nickname=$_SESSION['nickname'];

    $query="SELECT foto FROM post where nickname= '$nickname'";

    $salva=mysqli_query($conn, $query);
    if(mysqli_num_rows($salva)>0){
        while($row=mysqli_fetch_assoc($salva)){
            $ris[]=$row;
            
        }
    }
    
    mysqli_close($conn);
    echo json_encode($ris);



?>