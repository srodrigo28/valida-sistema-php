<?php
    if(isset($_GET['erro'])){
        $erro = 'É necessário logar para acessar o sistema';
    }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto 1</title>
</head>
<body>
    <h1>Projeto 1</h1>

    <div class="">
        <?php echo $erro ?? '' ?>
    </div>

    <form action="./core/validar_login.php" method="post">
        <input type="text" name="usuario" placeholder="E-mail">
        <input type="password" name="senha" placeholder="senha">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>