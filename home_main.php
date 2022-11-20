<?php
include("newconf.php");
session_start();

if (isset($_SESSION['logged'])) { 
			echo "<div id=\"div_menu\">";
			menu();
		 if ($_SESSION['logged']=="giliberti")  menu_oldadmin(); 
			echo "</div>"; 
			die();
			}
?>
LOGIN
<HR>
<div id="loginbox">
  <form method="POST" onsubmit="try{dojoForm2(this)}catch(E){};return false;">
  <p> 
  <label>Username</label><input type="text" name="username"><br><br>
  <input type="hidden" name="requestenter" value="qq">
  <label>Password</label><input type="password" name="password"> <br><br>
<input class="submit" type="submit" value="Entra">
</p>
 
</form>
</div>
	
		