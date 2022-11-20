<?

include '../newconf.php';
if(!isset($_GET['conto'])) die("what conto?");

if(!isset($_GET['usern'])) toxml("pippo");
else toxml($_GET['usern']);



function toxml($who){

try{
$dbh=connect();
$sql11="SELECT * from ordine WHERE codice_ordine='{$_GET['conto']}'";
$res11=$dbh->query($sql11);
$res11=$res11->fetchAll();
$notes=$res11[0]['note'];
$res11=$res11[0]['data_ordine'];

// echo "$res11";
$sql3="SELECT * from ordine_cliente_prod WHERE codice_ordine='{$_GET['conto']}'";
$res3=$dbh->query($sql3);
$res3=$res3->fetchAll();
// echo $sql3;
$string="<ordini>";
$totale='0';
$totale=(int)$totale;
$fornitore="";
foreach ($res3 as $prodbought) {
$sql2="SELECT * from prodotto where id='$prodbought[1]'";                         //ATTENZIONE: RIGHE ELIMINATE/MOD PER AGGIORNAMENTO PROG
$result2=$dbh->query($sql2);
$result2=$result2->fetch(PDO::FETCH_ASSOC); 
$nomeprodotto=$result2['nome']; 
$prezzoprod=$result2['prezzo_unit'];
$id=$prodbought['id'];
$codddd=$result2['codice_prodotto'];
//  $nomeprodotto=$prodbought['nome']; 
//  $prezzoprod=$prodbought['prezzo_unit'];
//  $id=$prodbought['id'];



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

	if ($prodbought['sconto']=="") {
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
		else { //c'è un nuovo prezzo!!

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
$totale=number_format($totale, 3, ',', '');
$string.="<prodotto><codiceord>{$_GET['conto']}</codiceord><id_prod>{$id}</id_prod><code>{$prodbought['codice_prodotto']}</code><name>$nomeprodotto</name><sconto>{$prodbought['sconto']}</sconto><sconto2>{$prodbought['sconto2']}</sconto2><sconto3>{$prodbought['sconto3']}</sconto3><newprice>{$prodbought['newprice']}</newprice><descheader>{$datas[14]}</descheader><desc>{$datas[8]}</desc><features><feature>{$datas[15]}</feature></features><color>{$datas[0]}</color><quantity>{$prodbought['qta']}</quantity><store>{$datas[5]}</store><price>$prezzoprod</price><netto>$netto</netto><misura>{$prodbought['misura']}</misura></prodotto>";
$fornitore=$prodbought['categoria'];

// *********************************************
//echo $codddd; echo "<br>";
$sqle="UPDATE ordine_cliente_prod SET nome='$nomeprodotto' , categoria='$fornitore' , prezzo_unit='$prezzoprod', codice_prodotto='$codddd' WHERE codice_ordine='$_GET[conto]' AND id='$id' AND misura='$prodbought[misura]' ";
//echo $sqle."<br>";
 $dbh->query($sqle);
//***********************************************

}

}
catch (PDOException $err) { echo "<br><font color=blue size=5>" ;die( $err->getMessage());}
echo "UPGRADED SUCCESSFULLY..";
}


?>