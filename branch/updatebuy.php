<!-- updatebuy.php -->
<?
error_reporting(~E_ALL);
 session_start(); ?>
<br><br><br>
<script type="text/javascript">

</script>
<? //;try{dojoForm2(this)}catch(E){};return false;
if(!isset($_GET['getcode'])) die("hard");
else $codice=$_GET['getcode'];
?>
<form method="POST" onsubmit="try{dojoForm3(this)}catch(E){};return false;" id="dacona" >
			
				quantita
				<input class="spid2_undo" type="text" name="quantita"  id="nome1">
			
				misura
				<input class="spid2_undo" type="text" name="misura"  id="misura">
			
				NuovoPrezzo
				<input class="spid2_undo" type="text" name="variazioneprezzo"   id="nome2">
			
				SCONTO
				<input class="spid2_undo" type="text" name="sconto"  id="nome3">
			
				SCONTO2
				<input class="spid2_undo" type="text" name="sconto2"  id="nome4">
			
				SCONTO3
				<input class="spid2_undo" type="text" name="sconto3"  id="nome5">
			<br><br>
Inserire su tutti i prodotti?<INPUT type="checkbox" name="sututti" value=1><br>
<input type="hidden" name="updateone" value="<? echo $codice;?>">
<input  type="hidden" name="oldmisura" value="<? echo $_GET['misur'];?>">
<input  type="hidden" name="updateorderno" value="<? echo $_SESSION['conto'];?>">
<input  type="submit" value="invia modifica" ></form>
	