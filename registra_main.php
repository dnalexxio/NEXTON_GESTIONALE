
<?php
session_start();
if (isset($_SESSION['logged'])) { echo "<h2>Prima esegui il logout,  {$_SESSION['logged']} </h2>"; die(".");}
else ?>
<div id="inside2">
<h1>Registrazione</h1>  
<hr>
<form method="POST" onsubmit=";try{dojoForm(this)}catch(E){};return false;" id="registrescion">

			<p>Scegli le tue chiavi di accesso</p>

<label>Username</label><br>	<input type="text" size="20" name="username" dojoType="ValidationTextBox"  /><br><br>
<label>Password</label><br>	<input type="password" size="20" name="passwd"    /><br><br>
<label>EMAIL</label>  <br>      <input type="text" size="20" name="email" /><br><br>
<label>Codice Controllo</label><br> <input type="text" size="20" name="codice_controllo" />	Questo codice ti verrà riferito direttamente dall'agente
<br><br><input type="hidden" name="registra" value="1"><input type="submit"  class="submit" value="REGISTRA"> 
 
</form>
</div>			
<button> RECUPERA PASSWORD </button>
