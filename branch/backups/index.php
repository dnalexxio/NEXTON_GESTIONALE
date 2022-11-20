<? 
error_reporting(E_ALL);
session_start();

if (session_is_registered("logged")) {

echo "<head>
<style>
a, ciao {
color: white;
}
.par {margin-left: 20px;}
</style></head>";
echo "<body style=\"margin: 30px;\"><table><TR><TD background=\"background.png\" width=\"885px\" height=\"100%\"><font color=white size=5pt>          <center><dd>{$logged},sei già autenticato come {$logged} </center></dd><p class=par>Autenticazione riuscita<br>il prossimo passaggio è</p> <ul><li><a href=genera.php>cliccare qui per generare un ordine</a><li><a href=newtuttiord.php>qui per vedere gli altri ordini</a>";
if ($logged=="giliberti") echo " <u><li><a href=\"newinsertprod.php\">cliccare qui per inserire nuovi prodotti</a></u> <li><b><a href=\"gestioneprodotti.php\">cliccare qui per modificare dei prodotti esistenti</a></b><li><a href=graph.php>statistiche clienti</a><li><a href=artstat.php>statistiche prodotti</a><li><a href=\"newclienti.php\">Lista Clienti</a><li><input type=\"button\" value=\"Backup DBS\" name=\"backup_db\" onclick=\"javascript:window.open('db_utilities.php','_self')\">";
 die(".<li><a href=\"abbandono.php\">ABBANDONA IL SITO</a><li><a href=\"anagrafica.php\">anagrafica</a></ul></font></table></body>");

					}
      
else { ?>
<html>
<head><TITLE>FABIO GILIBERTI</TITLE>
<script type="text/javascript">
function controlla(forma){
if (forma.username.value=="" || forma.password.value=="") {alert ("non hai inserito niente");  }
else { ; }
}
</script>
<style>
a, ciao {
color: white;
}
table {
margin: 50px;

}
table 	td {
font color: yellow;
}
</style><script language="JavaScript" type="text/javascript" src="functions.js"></script><script type="text/javascript" src="../dojo4/dojo.js"></script>
<script language="JavaScript" type="text/javascript">
			dojo.require("dojo.widget.*");
			dojo.require("dojo.io.*");
function clearbox(form){
var txt="loading...";
if (form.username.value=="") alert("wrong user");
if(form.password.value=="") alert("wrong password");
var allora=dojo.byId('docpane') ;
allora.innerHTML=txt;

}
		</script>
</head>
<body>

<table><TR ><TD background="background.png" width="885px" height="100%">
<table>
  <tbody>
    <tr>
      
   
      <td><div id="docpane"><br><br><br><br>
<center><font color="white" size="5pt">Benvenuto su Giliberti Rappresentanze<hr width="50px"></center></font><br>
<form method="POST" onsubmit="try{dojoForm2(this)}catch(E){};return false;">
		<table>
			<tr >
				<td width="30%" class="evidenza" ><font color="yellow">Username</font></td>
				<td width="70%"><input type="text" name="username" dojoType="ValidationTextBox"

						required="true" 

						ucfirst="false"></td>
			</tr>
			<tr> 
				<td  class="evidenza"><font color="yellow">Password</font></td>
				<td ><input type="password" name="password" dojoType="ValidationTextBox"
						
						required="true" 

						ucfirst="false"></td>
			</tr>
			<tr>
			</tr>
		</table><input type="hidden" name="requestenter" value="qq">
		<input type="submit" value="Entra">
	</form>
<font color="Red">
Nuovo utente? Registrati <a id="link1"  href="partedestraregistrazione.php" >cliccando qui</a></font></div>
</td>
     
    </tr>
  </tbody>
</table>

</TD></TR></table>

</body>
</html>
<? } ?>