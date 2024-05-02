<?php
session_start();

    // verifica se os dados vem em branco ou sem preencher os campos
    if( $_POST['usuario'] == "" || $_POST['senha'] == ""  ){
        header('Location: http://localhost/www/projeto1/index.php?erro=true');
    }

    // verfica se o usuário ou senha estão corretos
    if(isset($_POST['usuario'], $_POST['senha'])){
        if($_POST['usuario'] == 'admin' && $_POST['senha'] == 'admin'){ // compara valodres recebidos com banco
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['senha'] = $_POST['senha'];

            header('Location: http://localhost/www/projeto1/logado.php');
        }else{
            header('Location: http://localhost/www/projeto1/index.php?erro=true');
        }
    }
    /*** Valida 2
        session_start();

        if(isset($_SESSION['email'])) {
            var_dump($_SESSION['email']);
        }
        echo "<hr />";
        if(isset($_SESSION['senha'])) {
            var_dump($_SESSION['senha']);
        }
    */

    /*** Valida 1
     $email = $_POST['email'];
     $senha = $_POST['senha'];
    if( $email == "admin@gmail.com" && $senha == "123456" ){

        header('Location: http://localhost/www/projeto1/logado.php');
    }else{
        echo "Usuário ou senha inválidos";
    }
    */
?>