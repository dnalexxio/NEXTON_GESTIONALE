<?
include ("../newconf.php");

if(!isset($index)) toxml("0");
else toxml($index);



function toxml($howmany){

$lastnow=$howmany*10;
if (isset($_GET['city'])) { $sql="SELECT * FROM utente where citta like'%{$_GET['city']}%'";}
else {$sql="SELECT * FROM utente where 1 ";
//$sql.="LIMIT $lastnow,10";
//echo $sql;
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
$string.="<cliente><cognome>{$datas['cognome']}</cognome><indirizzo>{$datas['indirizzo']}</indirizzo><citta>{$datas['citta']}</citta><provincia>{$datas['cap']}</provincia><telefono>{$datas['telefono']}</telefono><cellulare>{$datas['cellulare']}</cellulare><email>{$datas['email']}</email><nazione>{$datas['nazione']}</nazione><usern>{$datas['utente']}</usern></cliente>";
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