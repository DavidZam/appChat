<?php
	// Conectamos con la base de datos
	require_once('connectdb.php');
	// Comprobamos si el usuario esta registrado para poder darlo de baja...
	$userPOST = $_POST["user"];
	// Procesamos el texto que ha introducido el usuario para evitar inyecciones SQL
	$userPOST = htmlspecialchars($userPOST); 
	$pswdPostEncrypted = md5($_POST["pswd"]);
	$pswdPostEncrypted = htmlspecialchars($pswdPostEncrypted); 
	// Hacemos las consultas pertinentes a la bbdd para hacer la posterior comprobación
	$sql1 = "SELECT usuario FROM usuarios WHERE usuario='".$userPOST."'";
	$sql2 = "SELECT contrasena FROM usuarios WHERE contrasena='".$pswdPostEncrypted."'";
	$userBD = $connect->query($sql1);
	$passBD = $connect->query($sql2);
	$userBDtxt = mysqli_fetch_row($userBD);
	$passBDtxt = mysqli_fetch_row($passBD);
	// Si coinciden tanto el nombre de usuario como la contraseña introducidas entonces existe el usuario y se le da de baja de la bbdd
	if(($userPOST == $userBDtxt[0]) && ($pswdPostEncrypted == $passBDtxt[0])) {
		$sql3 = "DELETE FROM usuarios WHERE usuario = '$userPOST'";
		$connect->query($sql3);
		// Se muestra un mensaje comunicando que el usuario ha sido dado de baja correctamente
		header('Location: ../../index.php?mensaje=dardebajasuccess');
	} else {
		// En caso de que el usuario introducido no exista en la bbdd se muestra un mensaje de error informando de ello
		header('Location: ../../index.php?mensaje=dardebajaerror');
	}
	mysql_close($connect);
?>