<? session_start(); 
error_reporting(~E_NOTICE);
?>
<div id="superprinc">
<script type="text/javascript">

	var btn = document.getElementById("hider");
	_container_.setCloseControl(btn);
</script>

<? //;try{dojoForm2(this)}catch(E){};return false;
if(!isset($_GET['getcode'])) die("ERROR 1155");
else $codice=$_GET['getcode'];
?>

<form method="POST" onsubmit="try{dojoForm3(this,lateralpane)}catch(E){};return false;" id="dacon">
<table bgcolor="Gray"> Nome: <? echo $_GET['nomep'];?>     Prezzo:eur <? echo $_GET['p'];?>		<tr>
				<td class="evidenza" width="200px">quantita</td>
				<td width="70%"><input tabindex="1" type="text" name="quantita"  id="nome1"></td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">UM</td>
				<td width="70%"><input type="text" name="um"  id="nome9" tabindex="2" ></td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">misura</td>
				<td width="70%"><input type="text" name="misura"  id="misura" tabindex="3" ></td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">NuovoPrezzo</td>
				<td width="70%"><input type="text" name="variazioneprezzo"   id="nome2" tabindex="4" ></td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">SCONTO</td>
				<td width="70%"><input type="text" name="sconto"  id="nome3" tabindex="5" ></td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">SCONTO2</td>
				<td width="70%"><input type="text" name="sconto2"  id="nome4" tabindex="5" ></td>
			</tr>
			<tr>
				<td class="evidenza" width="200px">SCONTO3</td>
				<td width="70%"><input type="text" name="sconto3"  id="nome5" tabindex="6" ></td>
			</tr></table>
<input type="hidden" name="insertrow" value="<? echo $codice;?>">
<input type="hidden" name="ppp" value="<? echo $_GET['p'];?>">
<input type="hidden" name="cat" value="<? echo $_GET['cat'];?>">
<input type="hidden" name="nomep" value="<? echo $_GET['nomep'];?>">
<input type="hidden" name="codc" value="<? echo $_GET['codpr'];?>">
<input type="hidden" name="orderno" value="<? echo $_SESSION['conto'];?>">
<input type="submit" id="hider" value="ordina"></form>
</div>	
