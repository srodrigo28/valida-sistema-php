<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header('Location: http://localhost/www/projeto1/index.php?erro=true');
    exit();
}
?>