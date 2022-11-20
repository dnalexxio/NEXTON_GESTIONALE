<?php
include('newconf.php');
echo "<!DOCTYPE HTML><html><head>
   <link href=\"css/StyleSheet3.css\" rel=\"stylesheet\" type=\"text/css\" >";
echo "<meta charset=\"utf-8\" />
<script language=\"JavaScript\" type=\"text/javascript\" src=\"functions.js\"></script>
</head>";


if (!isset($_SESSION['logged'])) 
{
header('Location: index.php');
die("restarting.."); 
}

?>



<h1>GENERA ORDINE</h1>

<div id="docpane">


<?php if(isset($_SESSION['conto'])) echo"<br><h2><font color=\"red\">ATTENZIONE: </font>Hai già un ordine aperto, il numero ".$_SESSION['contovisualizzabile']." <a href=\"newSeek.php\"><br><br>Riaprilo cliccando qui</a></h2>"; ?>
<br>
Cliente <?php echo $_SESSION['logged'];?>
<form onsubmit="try{dojoForm2(this)}catch(E){};return false;"  method="POST"> 
<input type="hidden" name="genera" value="2">
<input type="hidden" name="utene" value="<?php echo $_SESSION['logged'];?>">
<input class="submit" type="submit" value="genera nuovo ordine">
</form>
<script type="text/javascript" src="dojo/dojo.js"></script>
	<script language="JavaScript" type="text/javascript">
		dojo.require("dojo.widget.*");
		dojo.require("dojo.io.*");
	
	</script>
</div>
