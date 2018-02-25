<?php
	// Conectamos con la base de datos
	require_once('connectdb.php');
	// Por si no había ninguna sesión iniciada nos aseguramos iniciando una para cerrarla justo después
	session_start();
	// Cerramos toda sesión existente
	session_destroy();
	// Hacemos las consultas adecuada a la bbdd para borrar todos los mensajes cuando el último usuario cierra sesión
	$sql1 = "UPDATE usuarios SET conectado='0' WHERE usuario='$_SESSION[nick]'";
	$connect->query($sql1);
	$sql2 = "SELECT usuario FROM usuarios WHERE conectado = '1'";
	$usersconnected = $connect->query($sql2);
	// Si ya no queda ningun usuario conectado borramos todos los mensajes
	if(mysqli_num_rows($usersconnected) == 0) {
		$sql3 = "TRUNCATE TABLE chatmsgs";
		$connect->query($sql3);
	}
	// Mostramos el formulario de login y un mensaje al usuario
	header('Location: ../../index.php?mensaje=loguedout');
	mysql_close($connect);
?>