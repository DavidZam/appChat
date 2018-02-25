<?php
	// Conectamos con la base de datos
	require_once('connectdb.php');
	// Mostramos todos los usuarios existentes a los que se pueden mandar mensajes personales...
	// Consultamos a la bbdd para obtener los usuarios 
	$sql = "SELECT usuario FROM usuarios ORDER BY idusuario ASC";
	$allusers = $connect->query($sql);
	// Mostramos toos los usuarios existentes de la bbdd
	for($i = 0; $i < mysqli_num_rows($allusers); $i++) {
		// Para cada una de las filas de la tabla mostramos el nombre de usuario
		$alluserstxt = mysqli_fetch_row($allusers);
		// Comprobamos que no aparezca el mismo usuario conectado para evitar monólogos
		if($alluserstxt[0] != $_SESSION["nick"]) {
			echo '<option value="'.$alluserstxt[0].'"><span class="nick">'.$alluserstxt[0].'</span></option>';
		}	
	}
?>