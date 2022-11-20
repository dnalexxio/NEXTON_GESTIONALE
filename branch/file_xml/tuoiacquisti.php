<?
include '../newconf.php';
if(!isset($_GET['usern'])) toxml("pippo");
else toxml($_GET['usern']);



function toxml($who){

try{
$dbh=connect();
$cercanome="SELECT id from utente where utente='$who'";
$code=$dbh->query($cercanome);
$code=$code->fetchAll(); $code=$code[0][0];
//$dbh=null;// connect();
//global $dbh;
$sql="SELECT * FROM ordine ";
$sql.="WHERE id_utente_fk = '$code'";
//echo $sql;
$result=$dbh->query($sql);

$dataset=$result->fetchAll();
$dataset= str_replace("\&","E",$dataset);
$dataset= str_replace(">","E",$dataset);
$dataset= str_replace("<","E",$dataset);
if($dataset==null) { $string="<prodotti>

	<prodotto>

		<code>NO DATA FOUND</code>

		<name></name>

		<category></category>

		<dataacquisto></dataacquisto>

		<stato></stato>

		<boximage></boximage> 

		<price></price>

		<quantity></quantity>

	</prodotto>

	</prodotti>
";
// $xml = simplexml_load_string($string);
header('Content-type: text/xml');
// echo $xml->asXML();
echo $string;
exit();
}
$string="<ordini>";
foreach($dataset as $datas) {
$sql3="SELECT * from ordine_cliente_prod WHERE codice_ordine='$datas[0]'";
$res3=$dbh->query($sql3);
$res3=$res3->fetchAll();
foreach ($res3 as $prodbought) {

$sql2="SELECT * from prodotto where codice_prodotto='$prodbought[1]'";

$result2=$dbh->query($sql2);
$result2=$result2->fetch(PDO::FETCH_ASSOC);
$nomeprodotto=$result2['nome']; $prezzoprod=$datas[1];
$codeprod=$prodbought['codice_prodotto'];
$string.="<prodotto><codiceord>$datas[0]</codiceord><code>$codeprod</code><name>$nomeprodotto</name><dataacquisto>{$datas[3]}</dataacquisto><boximage>{$result2['boximage']}</boximage><bkgimage>{$datas[13]}</bkgimage><descheader>{$datas[14]}</descheader><desc>{$datas[8]}</desc><features><feature>{$datas[15]}</feature></features><color>{$datas[0]}</color><quantity>{$prodbought['qta']}</quantity><store>{$datas[5]}</store><price>$prezzoprod</price></prodotto>";
}
}
$string.="</ordini>";

//$xml = simplexml_load_string($string);
//if(empty($xml)) die("now");
header('Content-type: text/xml');
//echo $xml->asXML();
echo $string;
}
catch (PDOException $err) { echo "<br><font color=blue size=5>" ;die( $err->getMessage());}
}


?>