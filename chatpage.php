<!-- Chat page section -->

<!-- Chat page up section -->
<div id="chatpageupsection">
	<p class="saludo" id="welcome">
		Bienvenido,
		<span class="nick"><?php echo $_SESSION["nick"]; ?></span>
	</p>
	<form class="form" name="formReload" method="POST" action="">
		<button type="button" class="btn btn-info saludo" onclick="submit()" id="botonReload">
			Actualizar
			<i class="fa fa-refresh" aria-hidden="true"></i>
		</button>
	</form>
	<form class="form" name="formLogout" method="POST" action="lib/bd/logout.php">
		<button type="submit" class="btn btn-info saludo float-right" id="botonLogout">
			Cerrar sesión
			<i class="fa fa-power-off" aria-hidden="true"></i>
		</button>
	</form>
</div>

<!-- Chat page center section -->
<div class="container chattext" id="chatpagecentersection">
		<?php
			require_once('lib/bd/msgsmanagement.php');
		?>
	<div id="msgs">
		<?php
			require_once('lib/bd/publishmsgs.php');
		?>
	</div>
</div>

<!-- Chat page down section -->
<div id="chatpagedownsection">
	<form class="form" name="formMsg" id="chatForm" method="POST" action="">
		<input class="form-control typetext" size="80" type="text" name="msg" id="msg" placeholder="Mensaje" required autofocus>
		<input type="hidden" id="usuariodestino" name="usuariodestino"/>
		<button type="button" class="btn btn-lg btn-primary form-control botonenviar" onclick="submit()" id="sendButton">
			Enviar <i class="fa fa-paper-plane" aria-hidden="true"></i>
		</button>
	</form>
	<div id="dropdowndest">
	  <label id="lab1" for="sel1">Destino:</label>
	  <select class="form-control" id="sel1" onchange="showUsersDestination(this);">
	    <option value="all">A todos</option>
	    <option value="user">A un usuario: </option>
	  </select>
	  <p id="ifUserDestiny">
	  	<select name="sel2selected" id="sel2" onclick="saveSelectedListValue(this);">
	  		<option value="anyone">Select user</option>
			<?php
				require_once('lib/bd/showusers.php');
			?>
		</select>
	  </p>
	</div>
	<div id="usersConnected">
		Usuarios conectados: 
		<?php
			require_once('lib/bd/connectedusers.php');
		?>
	</div>
</div>