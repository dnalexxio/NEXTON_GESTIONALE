<?php
include('newconf.php');
session_start();
?>

<!doctype html>
<html lang="en">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115757226-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-115757226-3');
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="apple-touch-icon" href="favicon.ico" />
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<title>NEXTON</title>
<link href="css/style_mobile.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 0px) and (max-width: 320px)" >
<link href="css/style_tablet.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 321px) and (max-width: 768px)" >
<link rel="stylesheet" type="text/css" media="only screen and (min-width: 769px)" href="StyleSheet.css">
<style>
#disclaimer{

font-size: 13px;

float: left;

}
</style>
</head>

<body>
<div class="intestazione">
<a target="_blank" href="www.nextonideas.com"><img src="nexton_logo.png" /></a>

</div>


<div class="menu">
<ul>
<?php
menu_short(); 
if (isset($_SESSION['logged'])) menu();
?>
</ul>
</div>
<div class="docpane" id="docpane">
Benvenuto nel portale Nexton<?php
if (isset($_SESSION['logged'])) echo ", ".$_SESSION['logged'];
echo "<br>";

 if ($_SESSION['logged']=="giliberti")  menu_oldadmin(); 

 if (!isset($_SESSION['logged'])) { 
 
 ?>
  <form method="POST" onsubmit="try{dojoForm2(this)}catch(E){};return false;">
  <p>
  <label>USERNAME</label><input type="text" name="username"><br><br>
  <input type="hidden" name="requestenter" value="qq">
  <label>PASSWORD</label><input type="password" name="password"><br><br>
<input class="submit" type="submit" value="Entra">
</p>
</form>
<?php
//die();
}

?>
</div>

<div class="loghi" >
</div>
<div class="loghi_dx" >
</div>
<div class="footer" >
Owner : NEXTON IDEAS | P.iva: 
Created By Alessio Giliberti - Graphics: NEXTON
</div>
<script language="JavaScript" type="text/javascript" src="functions.js"></script>
<script type="text/javascript" src="dojo/dojo.js"></script>
	<script language="JavaScript" type="text/javascript">
		dojo.require("dojo.widget.*");
		dojo.require("dojo.io.*");
	
	</script><br>
	<div id="disclaimer">
	<p>Cookie Policy</p>
		Nota:
In alcune pagine utilizziamo i cookies per ricordare:
le preferenze di visualizzazione, per es. le impostazioni del contrasto o le dimensioni dei caratteri
se hai già risposto a un sondaggio pop-up sull'utilità dei contenuti trovati, per evitare di riproportelo
se hai autorizzato l'uso dei cookies sul sito.
Inoltre, alcuni video inseriti nelle nostre pagine utilizzano un cookie per elaborare statistiche, in modo anonimo, su come sei arrivato sulla pagina e quali video hai visto.
Non è necessario abilitare i cookies perché il sito funzioni, ma farlo migliora la navigazione. È possibile cancellare o bloccare i cookies, però in questo caso alcune funzioni del sito potrebbero non funzionare correttamente.
Le informazioni riguardanti i cookies non sono utilizzate per identificare gli utenti e i dati di navigazione restano sempre sotto il nostro controllo. Questi cookies servono esclusivamente per i fini qui descritti.
</div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
