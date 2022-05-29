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
        
        <link rel='stylesheet' href='profilo.css?v=<?php echo time();?>'>
        <script src="profilo.js?v=<?php echo time();?>" defer="true"></script>
        <title>Profilo</title>

    </head>
    <body>
        <header>
            
            <div id='intestazione'>
                <div id='aria'>
                Area personalizzata
                </div>  
            
                <div class="menu">
            
                 <butt><a href="api.php"> Cerca Prodotti </a></button>
                 <a href="home.php">home</a>
                 <a href="logout.php"> Logout </a>
                
            </div>
        </div>
          
            
        <header>

    
            <section class=foto>
                <h1> <?php echo $_SESSION['nickname']; ?> <h1>
                    <div id='foto'></div>
            </section>
            
            
            <form  method='GET' class='link'>
            
            <label>Inserisci l'URL per la tua immaggine profilo:<input type='text' name='url' class='url'></label>
            <label><input type='submit' class='url' value='Imposta'></label>
            
            </form>
        
           
                <section class='disposizione'>
                
                </section>

                <section id='contenuti'>
                
            </section>
                



    </body>
</html>