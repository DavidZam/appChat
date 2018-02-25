<?php
	// Conectamos con la base de datos
	require_once('connectdb.php');	
	// Imprimimos todos los mensajes existentes...
	$sql = "SELECT * FROM chatmsgs";
	$allmsgs = $connect->query($sql);
	// Mientras haya mensajes en la variable $msgs que contiene todos los mensajes los imprimimos
	while($msgs = $allmsgs->fetch_assoc()) {
		// Diferenciamos los casos en los que hay un usuario de destino o no lo hay
		if($msgs['usuariodestino'] == "") {
			// Si no lo hay es un mensaje para todos y lo publicamos
			echo "<span class='nick'>" .  $msgs['usuarioorigen'] . "</span>";
			echo " " . $msgs['hora'];
			echo " " . $msgs["msg"];
			echo "<br/>";
		} else if($_SESSION["nick"] == $msgs['usuarioorigen'] || $_SESSION["nick"] == $msgs['usuariodestino']) {
			// Si hay usuario de destino es un mensaje personal y nos aseguramos de que solo lo vean los usuarios adecuados
			echo "<span class='nick'>" .  $msgs['usuarioorigen'] . "</span>";
			echo " a " . "<span class='nick'>" .  $msgs['usuariodestino'] . "</span>";
			echo " " . $msgs['hora'];
			echo " " . $msgs["msg"];
			echo "<br/>";
		}
	}
?>
