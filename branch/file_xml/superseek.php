<? //seek.php

include '../newconf.php';
function toxml($which,$what,$bulean){
try{

$dbh=connect();

$sql="SELECT * FROM prodotto ";

if($what==1 && $bulean=='false') $sql.="WHERE nome LIKE '%$which%'";
else if($what==1 && $bulean=='true') $sql.="WHERE nome like '$which%'";
else if ($what==2 && $bulean=='false') $sql.="WHERE codice_prodotto like '%$which%'";
else if ($what==2 && $bulean=='true') $sql.="WHERE codice_prodotto LIKE '$which%'";
else if ($what==3 && $bulean=='false') $sql.="WHERE categoria like '%$which%'";
else if ($what==3 && $bulean=='true') $sql.="WHERE categoria like '$which%'";

$indice=$_REQUEST['index']*10;
$ind=$indice+10;
$sql.=" LIMIT $indice , 10;  ";

if ($_REQUEST['index']=="h025") {
$sql="SELECT * FROM prodotto ";

if($what==1 && $bulean=='false') $sql.="WHERE nome LIKE '%$which%'";
else if($what==1 && $bulean=='true') $sql.="WHERE nome like '$which%'";
else if ($what==2 && $bulean=='false') $sql.="WHERE codice_prodotto like '%$which%'";
else if ($what==2 && $bulean=='true') $sql.="WHERE codice_prodotto LIKE '$which%'";
else if ($what==3 && $bulean=='false') $sql.="WHERE categoria like '%$which%'";
else if ($what==3 && $bulean=='true') $sql.="WHERE categoria like '$which%'";
else if($what==4) $sql.="WHERE nome like '%$which%' AND categoria like '%$bulean%'";
$sql.=" LIMIT 0 , 70;  ";
}

//echo $sql;die();


$result=$dbh->query($sql);
$i=0;
//echo "TROVATE {$result->columnCount()} OCCORRENZE <BR><BR>";
$dataset=$result->fetchAll();
$o=count($dataset);
//echo "TROVATE $o OCCORRENZE <BR><BR>";
//foreach ($result as $occorrenza){print_r($occorrenza); echo "<h1>$i</h1><br>"; $i++;}
if($dataset==null) { $string="<products><product><name>NO DATA DOUND</name></product></products>";
// $xml = simplexml_load_string($string);
header('Content-type: text/xml');
// echo $xml->asXML();
echo $string;
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
$datas[6]=str_replace(",",".",$datas[6]);
$aaa=number_format($datas[6], 2, ',', '.');

$string.="<product><name>{$datas['nome']}</name><id>{$datas['id']}</id><category>{$datas[4]}</category><code>{$datas[0]}</code><misura>{$datas['misura']}</misura><quantity>{$datas['quantity']}</quantity><price>$aaa</price></product>";
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
//  $dbpass="";
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

if(!isset($_REQUEST['word'])) toxml("sfasdfasdf",1,true);
else {
switch ($_REQUEST['seek']){
case "name":  toxml($_REQUEST['word'],1,$_REQUEST['contiene']); break;
case "category": toxml($_REQUEST['word'],3,$_REQUEST['contiene']); break;
case "code": toxml($_REQUEST['word'],2,$_REQUEST['contiene']); break;
case "both": toxml($_REQUEST['word'],4,$_REQUEST['word2']); break;
}

}
?>