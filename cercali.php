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
        <link rel='stylesheet' href='inside.css?v=<?php echo time();?>'>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">
        <script src="cercali.js?v=<?php echo time();?>" defer="true"></script>
  </head>
  <body>

  <header>
  <nav>
                <div class="menu">
                <a href="home.php"> Home </a>
                 <a href="profilo.php"> Profilo </a>
                 <a href="logout.php"> Logout </a>
                
            </div>
        </nav> 

  </header>

<form name='cerca' method='GET' class='cerca'>
    <div id='testo'> 
    <label>Cerca l'utente: <input type='text' name='cerca' class='cerca'></label>
   
     <label>&nbsp;<input type='submit' value="Cerca" class='cerca'></label>
    
</div>
</form>
     
      
     

<div id='nome'>
</div>
	<!-- <form name=visualizza method="GET" id='visualizza'>  
  </form> -->


<section id = 'foto'> 
  
</section> 
 <div class='seleziona'>
   
 </div>
    
</body>
</html>