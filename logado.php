<?php 
    include 'core/permissao.php';
    $nome = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logado</title>
</head>
<body>
    <h1>Logado com sucesso : <?= $nome ?></h1>
    <a href="core/logout.php">Sair</a>
    <a href="./gestor.php">Gerencie Gestores</a>
</body>
</html>