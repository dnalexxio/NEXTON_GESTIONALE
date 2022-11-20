<?php
include '../newconf.php';


function toxml($who){
$dbh=connect();

$sql="SELECT * FROM prodotto ";
$sql.="WHERE id = '$who'";
//echo $sql;
try{

$result=$dbh->query($sql);
$i=0;
//echo "TROVATE {$result->columnCount()} OCCORRENZE <BR><BR>";
$dataset=$result->fetchAll();
//$o=count($dataset); //non serve
//echo "TROVATE $o OCCORRENZE <BR><BR>";
//foreach ($result as $occorrenza){print_r($occorrenza); echo "<h1>$i</h1><br>"; $i++;}
if($dataset==null) die("colpa della nullità del dataset");
$string="<products>";
foreach($dataset as $datas) {
$datas[8] = str_replace("&reg;", "", $datas[8]);
$datas[14] = str_replace("&reg;", "", $datas[14]);
$datas[15] = str_replace("&reg;", "", $datas[15]);
//ricordati di inserire all'inizio e alla fine i CDATA
if ($datas[6]=="") $datas[6]=".";

$datas[1] = ($datas[1]==null || $datas[1]=='') ? '.' : $datas[1];
$datas[4] = ($datas[4]==null || $datas[4]=='') ? '.' : $datas[4];
$datas[12] = ($datas[12]==null || $datas[12]=='') ? '.' : $datas[12];
$datas[13] = ($datas[13]==null || $datas[13]=='') ? '.' : $datas[13];
$datas[14] = ($datas[14]==null || $datas[14]=='') ? '.' : $datas[14];
$datas[8] = ($datas[8]==null || $datas[8]=='') ? '.' : $datas[8];
$datas[15] = ($datas[15]==null || $datas[15]=='') ? '.' : $datas[15];
$datas[0] = ($datas[0]==null || $datas[0]=='') ? '.' : $datas[0];
$datas[16] = ($datas[16]==null || $datas[16]=='') ? '.' : $datas[16];
$datas[7] = ($datas[7]==null || $datas[7]=='') ? '.' : $datas[7];
$datas[5] = ($datas[5]==null || $datas[5]=='') ? '.' : $datas[5];

$string.="<product><name>{$datas[1]}</name><category>{$datas[4]}</category><boximage>{$datas[12]}</boximage><bkgimage>{$datas[13]}</bkgimage><descheader>{$datas[14]}</descheader><desc>{$datas[8]}</desc><features><feature>{$datas[15]}</feature></features><code>{$datas[0]}</code><color>{$datas[16]}</color><quantity>{$datas[7]}</quantity><store>{$datas[5]}</store><price>{$datas[6]}</price></product>";
}

$string.="</products>";
// $xml = simplexml_load_string($string);
//if(empty($xml)) die("now");
header('Content-type: text/xml');
// echo $xml->asXML();
echo $string;
}
catch (PDOException $err) { echo "<br><font color=blue size=5>" ;die( $err->getMessage());}
}

if(!isset($_GET['code'])) die("invalid quest");
if (isset($_GET['ordercode'])) {
connect();
$sql="SELECT * FROM ordine ";   //BISOGNA SCEGLIERE L'ORDINE GIUSTO E FARE LA TOXML($ORDINE)
//$sql.="WHERE codice_prodotto = '$who'";
//echo $sql;
try{
global $dbh;
$result=$dbh->query($sql);
$i=0;
//echo "TROVATE {$result->columnCount()} OCCORRENZE <BR><BR>";
$dataset=$result->fetchAll();
$dataset= str_replace("&","E",$dataset);
$dataset= str_replace(">","E",$dataset);
$dataset= str_replace("<","E",$dataset);
}
catch (PDOException $ex) {}
}
else toxml($_GET['code']);

?>