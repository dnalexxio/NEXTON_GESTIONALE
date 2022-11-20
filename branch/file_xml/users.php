<?

include "../newconf.php";

try{
$dbh=connect();

$sql="SELECT nome,cognome,id FROM utente WHERE 1;";
$result=$dbh->query($sql);
$dataset=$result->fetchAll();
$string="<clienti>";
foreach ($dataset as $result) {
$string.="<cliente id=\"{$result['id']}\">{$result['cognome']}</cliente>";
}
$string.="</clienti>";
/*$xml = simplexml_load_string($string);*/
// if(empty($xml)) die("now");
header('Content-type: text/xml');
// echo $xml->asXML();
echo $string;
}
catch (PDOException $err) { echo "<br><font color=blue size=5>" ;die( $err->getMessage());}

