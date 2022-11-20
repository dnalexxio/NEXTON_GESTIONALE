<?php
include_once("newconf.php");

if (!isset($_SESSION['logged'])) 
{
header('Location: index.php');
die("restarting.."); 
}

if (!isset($_SESSION['loggedid'])) dodie("error1");
$dbh=connect();
$codpr = isset($_REQUEST['codpr']) ? $_REQUEST['codpr'] : 0  ;
if ($codpr==0) dodie("error2");
//new BEST PRICE 31/08/2014, fabio voleva l'ultimo prezzo netto applicato
$bestpriceapplied=0;
$bestprice="SELECT OCP.codice_ordine, OCP.qta, CAST(replace(OCP.newprice,',','.') As DEC(7,3)) newprice, OCP.nome, OCP.categoria, OCP.prezzo_unit, 
OCP.codice_prodotto, O.data_ordine, OCP.sconto, OCP.sconto2, OCP.sconto3
FROM  `ordine_cliente_prod` OCP
JOIN ordine O ON O.`codice_ordine` = OCP.codice_ordine
WHERE  `codice_prodotto` = '{$codpr}'
AND id_utente_fk =  '{$_SESSION['loggedid']}'
order by OCP.codice_ordine DESC LIMIT 10";

$res4=$dbh->query($bestprice);
$res4=$res4->fetchAll();
if(sizeof($res4)>0){
echo "<table border=1>";
echo "<tr>
    <th>Data</th>
    <th>Codice Ordine</th>
    <th>Ditta</th>
	<th>Quantita</th>
	<th>Prezzo di Listino</th>
    <th>Prezzo Netto</th>
<th>Sconto</th>
<th>Sconto2</th>
<th>Sconto3</th>
  </tr>";
foreach ($res4 as $resource){
echo "<tr>";
echo "<td>".$resource['data_ordine']."</td>";
echo "<td>".$resource['codice_ordine']."</td>";
// echo "<td>".$resource['nome']."</td>";
echo "<td>".$resource['categoria']."</td>";
echo "<td>".$resource['qta']."</td>";
echo "<td>".$resource['prezzo_unit']."</td>";
echo "<td>".$resource['newprice']."</td>";
echo "<td>".$resource['sconto']."</td>";
echo "<td>".$resource['sconto2']."</td>";
echo "<td>".$resource['sconto3']."</td>";
echo "</tr>";
}
echo "</table>";
//fine
}

function dodie($code){
echo "INVALID REQUEST";
echo $code;
}
?>