<?php
    session_start();
    if(!isset($_SESSION['nickname'])){
        header("Location: login.php");
        exit;

    }
    

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='home.css'>
        <title>Homepage</title>
     
    </head>
    <header>
    
        
    </header>

    <body>
        
    <div id = "overlay"> </div>
        <main>
             <form>
                <div id="utente">
                Ciao <?php echo $_SESSION['nickname']; ?>
            </div>

            
                <div class="opzioni"><a href="api.php"> Cerca Immagini </a></div>
                <div class="opzioni"><a href="profilo.php"> Profilo </a></div>
                <div class="opzioni"><a href="cercali.php"> Cerca Utente </a></div>
                <div class="opzioni"><a href="logout.php"> Logout </a></div>
                 
                 
                 
            


             </form>
     </main>
     
    </body>


</html>

