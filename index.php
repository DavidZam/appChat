<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="lib/css/bootstrap.min.css">
	<link rel="stylesheet" href="lib/css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="lib/css/estilo.css">
	<link rel="shorcut icon" href="lib/img/chat.png">
	<title>Chat</title>
</head>
<body>
	<!-- Index page container -->
	<div class="container" id="index">
		<div class="col-sm-6 col-md 5 col-md-offset-3">
			<div class="fondo">
				<img class="chat-img" src="lib/img/chat.png" alt="imagenchat">
					<?php
						require_once('mainpage.html');
						require_once ('loginform.html');
						require_once ('registerform.html');
						require_once ('bajaform.html');
						require_once ('errorsuccessmsgspage.html');
						require_once ('chatpage.php');
					?>
			</div>
		</div>
	</div>
	<!-- Añadimos las librerias de jquery y bootstrap, además de nuestro propio archivo de javascript myjs.js -->
	<script src="lib/js/jquery.min.js"></script>
	<script src="lib/js/bootstrap.min.js"></script>
	<script src="lib/js/myjs.js"></script>
</body>
</html> 