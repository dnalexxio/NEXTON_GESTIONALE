<? //riepilogo ordini annuali
error_reporting( ~E_NOTICE );
include_once 'newconf.php';
session_start();

try{
if($_REQUEST['y']=="") $_REQUEST['y']=date("Y");
$year=$_REQUEST['y'];
$dbh=connect();
$sql = "SELECT id FROM utente WHERE utente='{$_SESSION['logged']}'";
$result = $dbh->query($sql);
$result = $result->fetchAll();
$result = $result[0][0];
if ($result==0) die("ERRORE LATENZA BUFFER NEL FILE tuttiord.php");
$sql3="SELECT * from ordine WHERE id_utente_fk='{$result}' AND data_ordine like '%$year%'";
$res3=$dbh->query($sql3);
$res3=$res3->fetchAll();
//echo $sql3;
echo "<table id=\"mine\">";
if ($res==="") echo "non ci sono ordini";
else foreach ($res3 as $ordine) echo "<td onclick=\"javascript:contonumero=".$ordine[0].";drillon();strippa($ordine[0]);\">   <h3> ".$ordine['trackno']."</h3> del {$ordine['data_ordine']}</td>";
}
catch (PDOException $exc) { print "<br>Error!: " . $exc->getMessage() . "<br/>";  die();
}
		       echo "</table>";
?>
