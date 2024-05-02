<?php
include './core/conn.php';
// echo "Welcome";

$query_qnt_registros = "SELECT COUNT(id) AS qnt_registros FROM gestor";
$result_qnt_registros = $conn->prepare($query_qnt_registros);
$result_qnt_registros->execute();
$row_qnt_registros = $result_qnt_registros->fetch(PDO::FETCH_ASSOC);
var_dump($row_qnt_registros);

$query_registros = "SELECT * 
                    FROM gestor
                    ORDER BY nome ASC";
$result = $conn->prepare($query_registros);
$result->execute();

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    var_dump($row);
}