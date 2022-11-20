<?php
include('newconf.php');
if (!isset($_SESSION['logged'])) 
{
header('Location: index.php');
die("restarting.."); 
}
if (!isset($_SESSION['logged'])) { die("<!DOCTYPE HTML><html>
<head><meta http-equiv=\"refresh\" content=\"2;URL=index.php\">"); }
else
{
?>
Prodotto Nuovo<br><br>
<form method="POST" onsubmit="try{dojoForm3(this,lateralpane)}catch(E){};return false;" >
			<span class="spid">Codice</span>	<input class="spid2" type="text" name="code"   ><br><br>
    		<span class="spid">Nome:</span>		<input class="spid2" type="text" name="name"  ><br><br>
			<span class="spid">Prezzo:eur</span>     <input class="spid2" type="text" name="price"  ><br><br>
			<span class="spid">Quantita</span>	<input class="spid2" type="text" name="quantity"  ><br><br>
			<span class="spid">UM	</span>		<input class="spid2" type="text" name="um"  ><br><br>
			<span class="spid">Color</span>		<input class="spid2" type="text" name="color"  ><br><br>
			<span class="spid">misura</span>	<input class="spid2" type="text" name="misura"  ><br><br>
			<span class="spid">Ditta</span>		<input class="spid2" type="text" name="category"  ><br><br>
			<span class="spid">Quantità da ordinare</span>	<input class="spid2" type="text" name="qta_ordin"  ><br><br>
			<input type="hidden" name="store" value="1">
			<input type="hidden" name="desc" value="1">
			<input type="hidden" name="insertprodfast" value="1">
			
			<input type="hidden" name="orderno" value="<?php echo $_SESSION['conto'];?>">
			
			<table bgcolor="Gray"> 	
			<tr>
				<td class="evidenza" width="200px">UM</td>
				<td width="70%"><input type="text" name="um"  id="nome9"></td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">misura</td>
				<td width="70%"><input type="text" name="misura"  id="misura"></td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">NuovoPrezzo</td>
				<td width="70%"><input type="text" name="variazioneprezzo"   id="nome2"></td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">SCONTO</td>
				<td width="70%"><input type="text" name="sconto"  id="nome3"></td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">SCONTO2</td>
				<td width="70%"><input type="text" name="sconto2"  id="nome4"></td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">SCONTO3</td>
				<td width="70%"><input type="text" name="sconto3"  id="nome5"></td>
			</tr></table>
			<INPUT type="submit">
</form>
<?php
}
?>