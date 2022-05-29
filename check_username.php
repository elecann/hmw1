<?php 
    require_once 'dbconfig.php';

    if (!isset($_GET["q"])) {
        echo "Errore";
        exit;
    }

    header('Content-Type: application/json');
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $nickname = mysqli_real_escape_string($conn, $_GET["q"]);
    $query = "SELECT nickname FROM utenti WHERE nickname = '$nickname'";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));
    mysqli_close($conn);
?>