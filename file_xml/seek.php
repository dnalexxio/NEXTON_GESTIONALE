<?php //seek.php
include_once("../newconf.php");
function toxml($which,$what,$bulean,$ditta){
try{

$dbh=connect();

$sql="SELECT * FROM prodotto ";
$which=str_replace(" ","%",$which);

if($what==1 && $bulean=='false') $sql.="WHERE nome LIKE '%$which%'";
else if($what==1 && $bulean=='true') $sql.="WHERE nome like '$which%'";
else if ($what==2 && $bulean=='false') $sql.="WHERE codice_prodotto like '%$which%'";
else if ($what==2 && $bulean=='true') $sql.="WHERE codice_prodotto LIKE '$which%' ";  //ordinamento
if ($ditta=="TUTTE") ;
else $sql.=" AND categoria like '%$ditta%'";
$sql.="ORDER BY codice_prodotto";
$indice=$_REQUEST['index']*10;
$ind=$indice+10;
$sql.=" LIMIT $indice , 10;  ";

if ($_REQUEST['index']=="h025") {
$sql="SELECT * FROM prodotto ";

if($what==1 && $bulean=='false') $sql.="WHERE nome LIKE '%$which%'";
else if($what==1 && $bulean=='true') $sql.="WHERE nome like '$which%'";
else if ($what==2 && $bulean=='false') $sql.="WHERE codice_prodotto like '%$which%'";
else if ($what==2 && $bulean=='true') $sql.="WHERE codice_prodotto LIKE '$which%'";
if ($ditta=="TUTTE") ;
else $sql.=" AND categoria like '%$ditta%'";

$sql.=" LIMIT 0 , 70;  ";
}

// echo $sql;


$result=$dbh->query($sql);
$i=0;
//echo "TROVATE {$result->columnCount()} OCCORRENZE <BR><BR>";
$dataset=$result->fetchAll();
$o=count($dataset);
//echo "TROVATE $o OCCORRENZE <BR><BR>";
//foreach ($result as $occorrenza){print_r($occorrenza); echo "<h1>$i</h1><br>"; $i++;}
if($dataset==null) { $string="<product><name>NO DATA DOUND</name></product>";
$xml = simplexml_load_string($string);
header('Content-type: text/xml');
echo $xml->asXML();
exit();
}
$string="<products>";
foreach($dataset as $datas) {

$datas[8] = str_replace("&reg;", "", $datas[8]);
$datas[14] = str_replace("&reg;", "", $datas[14]);
$datas[15] = str_replace("&reg;", "", $datas[15]);
//$datas['nome'] = str_replace("\.", " ", $datas['nome']);
//$datas['nome'] = str_replace("\(", "", $datas['nome']);
//$datas['nome'] = str_replace("\)", "", $datas['nome']);
//$datas['nome'] = str_replace("\/", "", $datas['nome']);
//$datas['nome'] = str_replace(" ", "", $datas['nome']);
//ricordati di inserire all'inizio e alla fine i CDATA



//new BEST PRICE 31/08/2014, fabio voleva l'ultimo prezzo netto applicato
$bestpriceapplied=0;
$bestprice="SELECT OCP.codice_ordine, OCP.qta, CAST(replace(OCP.newprice,',','.') As DEC(7,3)) newprice, OCP.nome, OCP.categoria, OCP.prezzo_unit, 
OCP.codice_prodotto, O.data_ordine
FROM  `ordine_cliente_prod` OCP
JOIN ordine O ON O.`codice_ordine` = OCP.codice_ordine
WHERE  `codice_prodotto` = '{$datas[0]}'
AND id_utente_fk =  '{$_SESSION['loggedid']}'
order by OCP.codice_ordine DESC LIMIT 10";

$res4=$dbh->query($bestprice);
$res4=$res4->fetchAll();

$bestpriceapplied=sizeof($res4)>0 ?  "S" : "N" ;
//fine






$datas[6]=str_replace(",",".",$datas[6]);
$aaa=number_format($datas[6], 2, ',', '');

$string.="<product><name>{$datas['nome']}</name><id>{$datas['id']}</id>
<category>{$datas[4]}</category><code>{$datas[0]}</code><misura>{$datas['misura']}</misura>
<quantity>{$datas['quantity']}</quantity><price>$aaa</price><bestprice>$bestpriceapplied</bestprice></product>";
}
$string.="</products>";
// $xml = simplexml_load_string($string);
//if(empty($xml)) {
//echo $sql;
//$string="<product><name>NO DATA DOUND</name></product>"; $xml = simplexml_load_string($string);
//header('Content-type: text/xml');
//echo $xml->asXML();
//}

header('Content-type: text/xml');
// echo $xml->asXML();
echo $string;
}
catch (PDOException $err) { echo "<br><font color=blue size=5>" ;die( $err->getMessage());}
}

// function connect(){ //connette al DB
// $dbuser="root";
//  $dbpass="oZdij5";
//  
// try {
//    
// $dbh = new PDO('mysql:host=localhost;dbname=fabio', $dbuser, $dbpass, array(
//   PDO::ATTR_PERSISTENT => true
// ));
// $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// }
// catch (PDOException $exc) { print "<br>Error!: " . $exc->getMessage() . "<br/>";  die();
// }
// 		 
// return $dbh; }
// 
if(!isset($_REQUEST['word'])) toxml("sfasdfasdf",1,true,"");
else {
switch ($_REQUEST['seek']){
case "name":  toxml($_REQUEST['word'],1,$_REQUEST['contiene'],$_REQUEST['ditta']); break;
// case "category": toxml($_REQUEST['word'],3,$_REQUEST['contiene']); break;
case "code": toxml($_REQUEST['word'],2,$_REQUEST['contiene'],$_REQUEST['ditta']); break;
}

}
?>