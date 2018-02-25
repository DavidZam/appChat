<?php
	// Conectamos con la base de datos
	require_once('connectdb.php');
	// Mostramos todos los usuarios existentes a los que se pueden mandar mensajes personales...
	// Consultamos a la bbdd para obtener los usuarios 
	$sql = "SELECT usuario FROM usuarios WHERE conectado = '1'";
	$allusers = $connect->query($sql);
	// Mostramos toos los usuarios existentes de la bbdd
	echo mysqli_num_rows($allusers) . ' (';
	for($i = 0; $i < mysqli_num_rows($allusers); $i++) {
		// Para cada una de las filas de la tabla mostramos el nombre de usuario
		$alluserstxt = mysqli_fetch_row($allusers);
		// Comprobamos que no aparezca el mismo usuario conectado para evitar monólogos
		echo '<span class="nick">'. $alluserstxt[0] . '</span>';
		if($i != mysqli_num_rows($allusers) - 1) {
			echo ', ';
		} else {
			echo ')';
		}
	}
?>