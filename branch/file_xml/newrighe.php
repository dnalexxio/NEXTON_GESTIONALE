<?
include '../newconf.php';
error_reporting(~E_ALL);
if(!isset($_GET['conto']) || !isset($_SESSION['loggedid'])) die("error776");

if(!isset($_GET['usern'])) toxml("pippo");
else toxml($_GET['usern']);



function toxml($who){
global $iva;
try{

$dbh=connect();
$sql11="SELECT * from ordine WHERE codice_ordine='{$_GET['conto']}'";
$res11=$dbh->query($sql11);
$res11=$res11->fetchAll();
$notes=$res11[0]['note'];
$resstrackno=$res11[0]['trackno'];
$trasport=$res11[0]['vector'];
$parziale=$res11[0]['prezzo_tot'];
$parziale=str_replace(",",".", $parziale);
$res11=$res11[0]['data_ordine'];

$dario=$trasport+$parziale;
$finalprice=$dario + $dario*$iva;
$finalprice=number_format($finalprice, 2, ',', '');



// echo "$res11";
$sql3="SELECT * from ordine_cliente_prod WHERE codice_ordine='{$_GET['conto']}'";
$res3=$dbh->query($sql3);
$res3=$res3->fetchAll();
// echo $sql3;




$string="<ordini>";
$totale='0';

$fornitore="";
foreach ($res3 as $prodbought) {

// Nuova funzione 06/04/2014
//Cerca il minor prezzo dello articolo finora applicato al cliente ed avverte se esiste un prezzo migliore mai applicato
//
//
$bestprice="SELECT MIN(distinct(CAST(replace(J.newprice,',','.')As DEC(7,3)))) FROM `ordine_cliente_prod` J join ordine O where id_utente_fk = '{$_SESSION['loggedid']}' and codice_prodotto ='{$prodbought['codice_prodotto']}' and J.newprice is not null and J.newprice <> ''";
$res4=$dbh->query($bestprice);
$res4=$res4->fetch();
$bestpriceapplied=$res4[0];
//fine

 $nomeprodotto=$prodbought['nome']; 
 $prezzoprod=$prodbought['prezzo_unit'];
 $id=$prodbought['id'];



if(!is_numeric($prodbought['sconto'])) ; 
if(!is_numeric($prodbought['newprice'])) ; 
if(!is_numeric($prodbought['qta'])) ; 
// $prodbought['sconto']=(double)($prodbought['sconto']);
// $prodbought['sconto2']=(double)($prodbought['sconto2']);
// $prodbought['sconto3']=(double)($prodbought['sconto3']);
// $prodbought['qta']=(double)($prodbought['qta']);
// $prodbought['newprice']=(double)($prodbought['newprice']);
$prodbought['sconto'] = str_replace(",",".", $prodbought['sconto']);
$prodbought['sconto2'] = str_replace(",",".", $prodbought['sconto2']);
$prodbought['sconto3'] = str_replace(",",".", $prodbought['sconto3']);
$prodbought['qta'] = str_replace(",",".", $prodbought['qta']);
$prodbought['newprice'] = str_replace(",",".", $prodbought['newprice']);
$prezzoprod = str_replace(",",".", $prezzoprod);


	if ($prodbought['sconto']=="" || $prodbought['sconto']=="0") { 
			
				 if ($prodbought['newprice']=="") $netto  =  $prezzoprod * $prodbought['qta'];
 				 else  $netto = $prodbought['qta'] * $prodbought['newprice']; 
			 	
      				       					}

	else {
 		if ($prodbought['newprice']=="" && $prodbought['sconto2']=="" && $prodbought['sconto3']=="" ) $netto = ( $prezzoprod-$prezzoprod*$prodbought['sconto'] / 100 ) * $prodbought['qta'];
              else  if ($prodbought['newprice']=="" && $prodbought['sconto2']!="" && $prodbought['sconto3']=="") {
			
			$nettotemp = ( $prezzoprod-$prezzoprod*$prodbought['sconto'] / 100 );
			$netto =  ( $nettotemp-$nettotemp*$prodbought['sconto2'] / 100 ) * $prodbought['qta'];
}
		else if ($prodbought['newprice']=="" && $prodbought['sconto2']!="" && $prodbought['sconto3']!="") {

$nettotemp = ( $prezzoprod-$prezzoprod*$prodbought['sconto'] / 100 );
$nettotemp2 =  ( $nettotemp-$nettotemp*$prodbought['sconto2'] / 100 );
$netto = ( $nettotemp2-$nettotemp2*$prodbought['sconto3'] / 100 ) * $prodbought['qta'];


														}
		else { //  nuovo prezzo!!

                if ($prodbought['sconto2']=="" && $prodbought['sconto3']=="") $netto = ( $prodbought['newprice'] - $prodbought['newprice'] * $prodbought['sconto'] / 100 ) * $prodbought['qta'];

		else if ( $prodbought['sconto2']!="" && $prodbought['sconto3']=="") {
				
				$nettotemp = ( $prodbought['newprice']-$prodbought['newprice']*$prodbought['sconto'] / 100 );
				$netto =  ( $nettotemp-$nettotemp*$prodbought['sconto2'] / 100 ) * $prodbought['qta'];
										}
		else  if (  $prodbought['sconto2']!="" && $prodbought['sconto3']!="") 	{
			
			$nettotemp = ( $prodbought['newprice']-$prodbought['newprice']*$prodbought['sconto'] / 100 );
			$nettotemp2 =  ( $nettotemp-$nettotemp*$prodbought['sconto2'] / 100 );
			$netto = ( $nettotemp2-$nettotemp2*$prodbought['sconto3'] / 100 ) * $prodbought['qta'];

											}
		
                      }
             }

$totale = $totale + $netto;
//$totale=number_format($totale, 3, ',', '.');

$prezzoprod = str_replace("\.",",", $prezzoprod);
// $totale = str_replace("\.",",", $totale);
$netto=number_format($netto, 2, ',', '');
$string.="<prodotto><codiceord>{$_GET['conto']}</codiceord><id_prod>{$id}</id_prod><code>{$prodbought['codice_prodotto']}</code><name>$nomeprodotto</name><sconto>{$prodbought['sconto']}</sconto><sconto2>{$prodbought['sconto2']}</sconto2><sconto3>{$prodbought['sconto3']}</sconto3><newprice>{$prodbought['newprice']}</newprice><descheader>{$datas[14]}</descheader><desc>{$datas[8]}</desc><features><feature>{$datas[15]}</feature></features><color>{$datas[0]}</color><quantity>{$prodbought['qta']}</quantity><store>{$datas[5]}</store><price>$prezzoprod</price><netto>$netto</netto><misura>{$prodbought['misura']}</misura><um>{$prodbought['um']}</um><trackno>$resstrackno</trackno><bestprice>$bestpriceapplied</bestprice></prodotto>";
if($prodbought['categoria']!="") $fornitore=$prodbought['categoria'];
}
$impo=$totale+$totale*$iva;
$totale=number_format($totale, 2 , ",", "");
$impo=number_format($impo, 2,',','');
$string.="<riepilogo><note>$notes</note><tot>$totale</tot><imponibile>$impo</imponibile><date>$res11</date><fornitore>{$fornitore}</fornitore><trasporto>$trasport</trasporto><finalp>$finalprice</finalp></riepilogo></ordini>";
str_replace("?"," ",$string);
if($res3==null || $res3=="") { $string="<ordini>

	<prodotto>

		<code>NESSUNA</code>

		<name>RIGA</name>

		<category>PRESENTE</category>

		<dataacquisto></dataacquisto>

		<sconto>IN</sconto>

		<sconto2>QUESTO</sconto2> 
		<sconto3>ORDINE</sconto3>
		<price></price>

		<quantity></quantity>

	</prodotto>

	</ordini>
";
//$xml = simplexml_load_string($string);
header('Content-type: text/xml');
//echo $xml->asXML();
 echo $string;
exit();
}
$res11=$dbh->query("UPDATE ordine set prezzo_tot='$totale', ditta='$fornitore' WHERE codice_ordine='{$_GET['conto']}'; ");
// $xml = simplexml_load_string($string);
// //if(empty($xml)) die("now");
header('Content-type: text/xml');
// echo $xml->asXML();
$xmlheader="<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
$string=$xmlheader.$string;
echo $string;
}
catch (PDOException $err) { echo "<br><font color=blue size=5>" ;die( $err->getMessage());}
}


?>
