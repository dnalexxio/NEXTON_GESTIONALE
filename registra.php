<?php
include('newconf.php');
if (!isset($_SESSION['logged'])) 
{
header('Location: index.php');
die("restarting.."); 
}
?>



<!DOCTYPE HTML>
<head>
<link href="css/style_mobile.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 0px) and (max-width: 320px)" >
    <link href="css/style_tablet.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 321px) and (max-width: 768px)" >
    <link href="css/style_desktop.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 769px)" >
    <TITLE>FABIO GILIBERTI</TITLE>

			<style>

		p {
		font-size: 15px;
}
</style>

<script language="JavaScript" type="text/javascript" src="./includes/xpath.js"></script>
<script language="JavaScript" type="text/javascript" src="./includes/SpryData.js"></script>
<script language="JavaScript" type="text/javascript" src="./includes/SpryEffects.js"></script>


	<script type="text/javascript" src="dojo/dojo.js"></script>


		<script language="JavaScript" type="text/javascript" src="functions.js"></script>
</head>
<body>
<div id="titolo">Benvenuto su Giliberti Rappresentanze</div>
<h1>Registrazione</h1>      <div align="right"><a href="index.php">Torna all'inizio</a></div>
<?php
session_start();
if (isset($_SESSION['logged'])) { echo "<h2>Impossibile procedere {$_SESSION['logged']} </h2>"; die(".");}
else ?>
<div id="docpane">
<form method="POST" onsubmit=";try{dojoForm(this)}catch(E){};return false;" id="registrescion">



		<div >

			<font face="Tahoma" size="4" color="black"><b>Dati di Login  </b></font>

			<br><br>

			<p>Scegli le tue chiavi di accesso</p>

			<br><br>

			<table id="tab_registrazione3">

				<tr>

					<td class="evidenza">Username</td>

					<td><input type="text" size="20" name="username" dojoType="ValidationTextBox"

					  />

					</td>

				</tr>

				<tr>

					<td class="evidenza">Password</td>

					<td><input type="password" size="20" name="passwd"

					    />

					</td>

				</tr>

				<tr>

					<td class="evidenza">Domanda segreta</td>

					<td><input type="text" size="20" name="domandasegreta" />

					</td>

				</tr>

				<tr>

					<td class="evidenza">Risposta</td>

					<td><input type="text" size="20" name="rispostasegreta"  />

					</td>

				</tr>
                	<tr>

					<td class="evidenza">EMAIL</td>

					<td><input type="text" size="20" name="email" />

					</td>

				</tr>
				<tr>

<td class="evidenza">Codice Controllo</td>
				<td>


<input type="text" size="20" name="codice_controllo" />

					</td><td class="evidenza">Questo codice ti verrà riferito direttamente dall'agente</td>
				</tr>

	<tr><br><TD align="right"><input type="hidden" name="registra" value="1"><input type="submit"  class="submit" value="REGISTRA"> </TD></tr>

</form>
			</table>

		</div>



	</div>

</div>

</body>
</html>