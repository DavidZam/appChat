<?php
// Conectamos con la base de datos y en caso de error informamos del mismo.
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$database = "chat_bd";
$connect = new mysqli($servidor, $usuario, $contrasena, $database) or die ('Error al conectar con bd');
?>

