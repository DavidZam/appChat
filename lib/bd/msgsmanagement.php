<?php
	// Conectamos con la base de datos
	require_once('connectdb.php');
	// Gestionamos los mensajes que intente mandar el usuario antes de publicarlos en el chat...
	if(isset($_POST["msg"])) {
		// Procesamos el mensaje del usuario por si intenta enviar un mensaje vacio
		$msgwithblankspaces = $_POST["msg"];
		$msgwithoutblankspaces = trim($msgwithblankspaces);
		// Si el usuario ha escrito un mensaje no vacio
		if ($msgwithoutblankspaces != "") {
			// Guardamos los datos de su sesión
		    $_SESSION["msg"] = $_POST["msg"];
		    $_SESSION["usuariodestino"] = $_POST["usuariodestino"];
		    $_SESSION["horaMin"] = date("H:i:s");

		    // Esta consulta la hacemos para evitar duplicados al recargar la pagina (f5) si el msg es igual al ultimo mandado
			$sql = "SELECT msg FROM chatmsgs WHERE idmsg = (SELECT MAX(idmsg) FROM chatmsgs) AND usuarioorigen = '$_SESSION[nick]'";
			$textomsg = $connect->query($sql);
			$ultimomsg = mysqli_fetch_row($textomsg);
			// Comparamos el ultimo mensaje de la base de datos con el mensaje enviado, si son distintos lo insertamos en la bbdd
			if($_POST["msg"] != $ultimomsg[count($ultimomsg) - 1]) {
				if($_SESSION["usuariodestino"] == "") { // Si no hay usuario de destino es un mensaje para todos, lo insertamos como tal
					$sql2 = "INSERT INTO chatmsgs (usuarioorigen, msg, hora) VALUES('$_SESSION[nick]','$_SESSION[msg]', '$_SESSION[horaMin]')";
					$connect->query($sql2);
				} else { // Si hay usuario destino entonces es un mensaje personal, lo insertamos en la bbdd con el campo adicional
					$sql2 = "INSERT INTO chatmsgs (usuarioorigen, usuariodestino, msg, hora) VALUES('$_SESSION[nick]', '$_SESSION[usuariodestino]', '$_SESSION[msg]', '$_SESSION[horaMin]')";
					$connect->query($sql2);
				}
			}
		}
	}
?>