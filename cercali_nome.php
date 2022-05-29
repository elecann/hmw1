<?php
 require_once 'dbconfig.php';
     session_start();
     if(!isset($_SESSION['nickname'])){
         header("Location: login.php");
         exit;
     }
     $conn=mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    $nick=mysqli_real_escape_string($conn, $_GET["nickname"]);

    $cerca="SELECT nickname, url from utenti where nickname='".$nick."'";
    
            $sa=mysqli_query($conn, $cerca);
            if(mysqli_num_rows($sa)>0){
                while($row=mysqli_fetch_assoc($sa)){
                        $risult[]=$row;
            
                }
            }else{
                $risult="nessun risultato";
            }
    
        mysqli_close($conn);
        echo json_encode($risult);

?>