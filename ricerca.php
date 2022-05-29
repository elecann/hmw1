<?php
     session_start(); 
      if(!isset($_SESSION['nickname'])){
        header("Location: login.php");
        exit;
  }
  
    //$ricerca= urlncode($_GET["cerca"]);
    //$ris= http_build_query($cerca);
    //echo ($cerca);
    //$stringa=urlencode($cerca);
    $client_id = 'Ap2AYshzm9m4BuT3haUmsnwfzIY3uzB2qJepIzU6XXQ';
    //$secretkey='nueC4bRjaYE4N284jSWbAU94f89Apc7oE7oxk_wwMs4';
    //autization code=i6xotLDmvnEXFkfS9bZCsbnng5zVNNoPLDJsjl52C7w;
    $query = urlencode($_GET["q"]);
    $url = 'https://api.unsplash.com/search/photos?per_page=30&client_id='.$client_id.'&query='.$query;
    
    $curl = curl_init($url);
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    //$ris= http_build_query($result);
    curl_close($curl);
    print_r ($result);

?>