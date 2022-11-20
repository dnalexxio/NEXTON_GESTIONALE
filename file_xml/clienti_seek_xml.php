<?php
include ("../newconf.php");

toxml();



function toxml(){

//$_GET['city']
if($_GET['zona']=="tutti" && $_GET['settore']=="tutti")
	$sql="SELECT utente,cognome, provincia, settore, zona , categoria FROM utente order by cognome;";

else if($_GET['zona']!="tutti" && $_GET['settore']=="tutti")
{
$zona = $_GET['zona'];
	$sql="SELECT utente,cognome, provincia, settore, zona , categoria FROM utente 
	where zona='{$zona}'
	order by cognome;";
}
else if($_GET['zona']=="tutti" && $_GET['settore']!="tutti")
{
$settore = $_GET['settore'];
	$sql="SELECT utente,cognome, provincia, settore, zona , categoria FROM utente 
where settore like '%{$settore}%'
	order by cognome;";
}
else 
{
$zona = $_GET['zona'];
$settore = $_GET['settore'];
	$sql="SELECT utente,cognome, provincia, settore, zona , categoria FROM utente
where zona='{$zona}'
and settore like '%{$settore}%'
	 order by cognome;";
}

try{
$dbh=connect();
$result=$dbh->query($sql);
$i=0;
//echo "TROVATE {$result->columnCount()} OCCORRENZE <BR><BR>";
$dataset=$result->fetchAll();
$dataset= str_replace("\&","E",$dataset);
$dataset= str_replace(">","E",$dataset);
$dataset= str_replace("<","E",$dataset);
// $o=count($dataset);
//echo "TROVATE $o OCCORRENZE <BR><BR>";
//foreach ($result as $occorrenza){print_r($occorrenza); echo "<h1>$i</h1><br>"; $i++;}
if($dataset==null) { 
// $string="<clienti><cliente/></clienti>";
// $xml = simplexml_load_string($string);
// header('Content-type: text/xml');
// echo $xml->asXML();
die();
}
$string="<clienti>";
foreach($dataset as $datas) {
$string.="<cliente><cognome>{$datas['cognome']}</cognome><settore>{$datas['settore']}</settore><zona>{$datas['zona']}</zona><provincia>{$datas['provincia']}</provincia><categoria>{$datas['categoria']}</categoria><usern>{$datas['utente']}</usern></cliente>";
}
$string.="</clienti>";
// $xml = simplexml_load_string($string);
// if(empty($xml)) die("now");
header('Content-type: text/xml');
// echo $xml->asXML();
echo $string;
}
catch (PDOException $err) { echo "<br><font color=blue size=5>" ;die( $err->getMessage());}
}


?>