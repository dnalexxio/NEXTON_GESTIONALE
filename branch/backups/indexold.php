<? 
error_reporting(E_ALL);
session_start();

if (session_is_registered("logged")) {

echo "<h2>{$logged},sei già autenticato come {$logged} </h2>";
echo "<head><link href=\"./newstyle.css\" rel=\"stylesheet\" type=\"text/css\" /></head><body bgcolor=lightsteelblue><br>Autenticazione riuscita<br><dd>il prossimo passaggio è</dd> <ul><li><a href=genera.php>cliccare qui per generare un ordine</a><li><a href=newtuttiord.php>qui per vedere gli altri ordini</a>";
if ($logged=="giliberti") echo " <u><li><a href=\"newinsertprod.php\">cliccare qui per inserire nuovi prodotti</a></u> <li><b><a href=\"gestioneprodotti.php\">cliccare qui per modificare dei prodotti esistenti</a></b><li><a href=graph.php>statistiche clienti</a><li><a href=artstat.php>statistiche prodotti</a>";
 die(".<li><a href=\"abbandono.php\">ABBANDONA IL SITO</a><li><a href=\"anagrafica.php\">anagrafica</a></ul></body>");

					}
      
else { ?>
<html>
<head><TITLE>prova</TITLE></head>
<script type="text/javascript">
function controlla(forma){
if (forma.username.value=="" || forma.password.value=="") {alert ("non hai inserito niente");  }
else { ; }
}
</script>
<link href="./newstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../dojo4/dojo.js"></script>

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

<script language="JavaScript" type="text/javascript" src="functions.js"></script>

<BODY bgcolor=lightsteelblue lang=IT style='tab-interval:35.4pt'>
<!--<img src="biglvisit.bmp">-->
<!-- <div id="stile" >Fabio Giliberti<br>Rappresentanze<br>3396232638<br>fgiliberti@libero.it</div> -->
<table>
  <tbody>
    <tr>
      <td><img src="intwes2.jpg"></td>
      <td><img src="mass.jpg"><br><img src="nes.jpg"></td>
      <td><img src="color.jpg"></td>
    </tr>
    <tr>
      <td><div id="docpane">
<h1><center><font color="blue">Inserisci i tuoi dati <br>di autenticazione</h1><hr width="50px"></center></font><br>
<form method="POST" onsubmit="clearbox(this);try{dojoForm2(this)}catch(E){};return false;">
		<table>
			<tr>
				<td width="30%" class="evidenza" >username</td>
				<td width="70%"><input type="text" name="username" dojoType="ValidationTextBox"

						required="true" 

						ucfirst="false"></td>
			</tr>
			<tr>
				<td width="30%" class="evidenza">password</td>
				<td width="70%"><input type="password" name="password" dojoType="ValidationTextBox"
						
						required="true" 

						ucfirst="false"></td>
			</tr>
			<tr>
			</tr>
		</table><input type="hidden" name="requestenter" value="qq">
		<input type="submit" value="Entra">
	</form>

Nuovo utente? Registrati <a href="partedestraregistrazione.php">cliccando qui</a></div>
</td>
      <td><img src="Immagine.jpg"></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>

</BODY>

</html> <? } ?>
