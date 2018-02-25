<?php
	// Conectamos con la base de datos
	require_once('connectdb.php');
	// Comprobamos si el usuario esta registrado y puede loguearse...
	$userPOST = $_POST["user"];
	$userPOST = htmlspecialchars($userPOST); // Procesamos el texto que ha introducido el usuario para evitar inyecciones SQL
	$pswdPostEncrypted = md5($_POST["pswd"]); // Guardamos la contraseña que ha introducido el usuario encriptada
	// Hacemos las consultas pertinentes a la bbdd para hacer la posterior comprobación
	$sql1 = "SELECT usuario FROM usuarios WHERE usuario='$userPOST'";
	$sql2 = "SELECT contrasena FROM usuarios WHERE contrasena='$pswdPostEncrypted'";
	$userBD = $connect->query($sql1);
	$passBD = $connect->query($sql2);
	// Si existe alguna fila que contenga el usuario y la contraseña introducidas entonces el usuario existe y se puede loguear
	if(mysqli_num_rows($userBD) > 0 && mysqli_num_rows($passBD) > 0) {
		// Si el usuario hace login establecemos en la bbdd que se ha conectado y guardamos los datos de su sesión y lo redirigimos a la página de chat pertinente
		$sql = "UPDATE usuarios SET conectado='1' WHERE usuario='$userPOST'";
		$connect->query($sql);
		session_start();
		$_SESSION["nick"] = $userPOST;
		$_SESSION["email"] = $email;
		header('Location: ../../index.php?mensaje=loginsuccess');
	} else {
		// Si el usuario no puede hacer login le mostramos un mensaje de error
		header('Location: ../../index.php?mensaje=loginerror');
	}
	mysql_close($connect);
?>