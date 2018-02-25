<?php
	// Conectamos con la base de datos
	require_once('connectdb.php');
	// Comprobamos si el usuario esta registrado...
	$usuario = $_POST["usuario"];
	$email = $_POST["email"];
	// Procesamos el texto que ha introducido el usuario para evitar inyecciones SQL
	$usuario = htmlspecialchars($usuario); 
	$email = htmlspecialchars($email);
	// Hacemos las consultas pertinentes a la bbdd para hacer la posterior comprobación
	$sql1 = "SELECT usuario FROM usuarios where usuario='$usuario'";
	$sql2 = "SELECT email FROM usuarios where email='$email'";
	$nuevo_usuario = $connect->query($sql1);
	$nuevo_email = $connect->query($sql2);
	// Si existe alguna fila que contenga el usuario o el mail introducidos entonces el usuario ya está registrado
	if(mysqli_num_rows($nuevo_usuario) > 0 || mysqli_num_rows($nuevo_email) > 0 || strlen($_POST["usuario"]) > 13) {
		// Si el usuario ya existe le mostramos un mensaje de error y le sugerimos que se loguee
		header('Location: ../../index.php?mensaje=registererror');
	} else {
		// Si el usuario se registra correctamente guardamos sus datos en la bbdd y le mostramos un mensaje de éxito
		$md5contraseña = md5($_POST["contrasena"]);
		$sql3 = "INSERT INTO usuarios (usuario, contrasena, email) VALUES ('$_POST[usuario]','$md5contraseña', '$_POST[email]')";
		$insertUsuario = $connect->query($sql3);
		// Confirmamos que el registro ha sido insertado con exito
		header('Location: ../../index.php?mensaje=registersuccess');
	} 
	mysql_close($connect);
?>