<?php
require_once 'dbconfig.php';
    session_start();
    if(isset($_SESSION["nickname"]))
    {
        // Vai alla home
        header("Location: home.php");
        exit;
    }
    // Verifica l'esistenza di dati POST
    if(isset($_POST['nickname']) && isset($_POST['password']))
    {

        $conn=mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
        $nickname= mysqli_real_escape_string($conn, $_POST['nickname']);
        $password= mysqli_real_escape_string($conn, $_POST['password']);
        // Verifica la correttezza delle credenziali
        $query= "SELECT * FROM utenti WHERE nickname='".$nickname."' AND password='".$password."'";
       
        $res=mysqli_query($conn, $query);

        if(mysqli_num_rows($res)>0)
        {
            $_SESSION['nickname']=$_POST["nickname"];
            // Vai alla pagina home.php
            header("Location: home.php");
            exit;
        }
        else
        {
            // Flag di errore
            $errore = true;
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='hmw.css'>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">
        <script src='login.js' defer="true"></script>
        <title>Login</title>
    </head>
    <header>
  
    </header>
    <body>
    <div id = "overlay"> </div>
     
        <main>
            <form name='login'  method='POST'>
                <p>
                    <label>Nickname <input type='text' name='nickname'></label>
                </p>
                <p>
                    <label>Password <input type='password' name='password'></label>
                </p>
                <p>
                    <label>&nbsp;<input type='submit' value="ACCEDI"></label>
                </p>  
                 <?php
            // Verifica la presenza di errori
            if(isset($errore))
            {
                echo "<p class='errore'>";
                echo "Credenziali non valide.";
                echo "</p>";
            }
            ?>
                <div class='login'>
                Non hai un account <a href="hmw.php"> Registrati </a>
            </div>
            </form>
        </main>
    </body>
</html>


