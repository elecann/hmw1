<?php

require_once 'dbconfig.php';
session_start();

if(!empty($_POST['nickname']) && !empty($_POST['nome']) && !empty($_POST['cognome']) && !empty($_POST['email']) && !empty($_POST['password']))
{
    $error = array();
    $conn=mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name'])or die(mysqli_error($conn));
    #unickname
    
     if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['nickname'])){
        $error[]="Nickname non valido";
     }
    else {
        $nickname = $_POST["nickname"];
        $query = "SELECT * FROM utenti WHERE nickname=''.$nickname''";
        $ris=mysqli_query($conn, $query);
        if(!empty($ris)){
            $error[]= "Nickname già in uso";
        }
    }


if(!preg_match('/^[a-zA-Z0-9_]{8,15}$/',$_POST["password"])){
    $error[]= "La password non contiene: <br>";#."-Lettere maiuscole";#.<br>."Caratteri speciali".<br>."Numeri";
}
if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    $error[]= "Email non valida";


}
if (count($error)==0 ){
    $nome= mysqli_real_escape_string($conn,$_POST['nome']);
    $cognome= mysqli_real_escape_string($conn, $_POST['cognome']);
    $nickname= mysqli_real_escape_string($conn, $_POST['nickname']);
    $password= mysqli_real_escape_string($conn, $_POST['password']);
    //$password = password_hash($password, PASSWORD_BCRYPT);
    $email= mysqli_real_escape_string($conn, $_POST['email']);

    $query="INSERT INTO utenti(nickname, nome, cognome, email, password) VALUES('$nickname', '$nome', '$cognome', '$email', '$password')";

    if(mysqli_query($conn, $query)){
        $_SESSION['nickname']=$_POST['nickname'];
        $_SESSION['user_id']=mysqli_insert_id($conn);
        
        mysqli_close($conn);
        header('Location: home.php');
        exit;
    }

        mysqli_close($conn);
}
    else if (isset($_POST["username"])) {
        $error = array("Riempi tutti i campi");
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">
        <link rel='stylesheet' href='hmw.css'>
        <script src="hmw.js" defer="true"></script>
        <title>Iscrizione</title>
    </head>
    <header>
        
    </header>

    <body>
        
        <div id = "overlay"> </div>
        <main>
             <form name='form' method="post">
                <p class='nome'>
                    <label> Nome<input type="text" name="nome"<?php if(isset($_POST["nome"])){echo "value=".$_POST["nome"];} ?> ></label>
                    <span> Formato non valido </span>
                </p>
                <p class='cognome'>
                    <label> Cognome<input type="text" name="cognome" <?php if(isset($_POST["cognome"])){echo "value=".$_POST["cognome"];} ?> ></label>  
                    <span> Formato non valido </span>
                </p>
                <p class='nickname'>
                    <label> Nickname<input type="text" name="nickname" <?php if(isset($_POST["nickname"])){echo "value=".$_POST["nickname"];} ?>></label>  
                    <span>Nome utente non disponibile</span> 
                </p>
                <p class='email'>
                    <label> Email<input type="text" name="email"  <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>></label>
                    <span>Indirizzo email non valido</span>
                </p>
                <p class='password'>
                    <label> Password<input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required> </label>
                    <div id="messaggio">
                        <h3>La password deve contenere:</h3>
                        <p id="lettere" class="invalid">A <b> minuscole</b></p>
                        <p id="maiuscole" class="invalid">A <b> maiuscole</b></p>
                        <p id="numeri" class="invalid">A <b>numeri</b></p>
                    </div>
                </p>

                <p> <label>&nbsp;<input type="submit" name="invia" value="Next step"></label></p>

                <?php
              
                // if(isset($error))  {
                  
                //     for( $i =0; $i<5; $i++){
                //     echo "<p class='errore'>";
                //     echo $error[i];
                //     echo "</p>";
                //     }
                // }
              
            ?>
            
            <div class='login'>
                Se hai già un account effettua il <a href="login.php"> Login </a>
            </div>
        
             </form>
     </main>
     
    </body>


</html>