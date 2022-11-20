<? //STATS:PHP

include ('../newconf.php');

try{
if($_REQUEST['y']=="") $_REQUEST['y']=date("Y");
$dbh=connect();
$sql="SELECT prezzo_tot, ditta, id_utente_fk from ordine where data_ordine like '%{$_REQUEST['y']}%'";
$res=$dbh->query($sql);
// echo $sql;
$res=$res->fetchAll();

$cebo=array();
$iur=array();
$volpi=array();
$tecno=array();
$bon=array();
$unigum=array();
$sapio=array();
$mass=array();
$arnetoli=array();
$spanset=array();
$coloratap=array();
$gis=array();
$biandiz=array();
$villa=array();
$jdm=array();
$micanti=array();
$tomes=array();
$tecfi=array();
$tron=array();
$gtline=array();
$molle=array();


foreach ($res as $result) {

//print_r($result); echo "<br>era res; <br><br>";
				switch ($result['ditta']) {
case "CEBO": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']);


 if (!array_key_exists($result['id_utente_fk'], $cebo)) $cebo[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $cebo[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "VILLA": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $villa)) $villa[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $villa[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "SPANSET": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $spanset)) $spanset[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $spanset[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "COLORTAP": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $coloratap)) $coloratap[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $coloratap[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;


case "IUR": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']);
if (!array_key_exists($result['id_utente_fk'], $iur)) $iur[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $iur[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;


case "VOLPI": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $volpi)) $volpi[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $volpi[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

		
case "MASS": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $mass)) $mass[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $mass[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "GIS": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $gis)) $gis[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $gis[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "BIANDITZ": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $biandiz)) $biandiz[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $biandiz[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "TECNOLAM": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $tecno)) $tecno[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $tecno[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;
case "BONEZZI": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $bon)) $bon[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $bon[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;
case "ARNETOLI": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $arnetoli)) $arnetoli[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $arnetoli[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;
case "UNIGUM" ;
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $unigum)) $unigum[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $unigum[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;
case "SAPIO": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $sapio)) $sapio[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $sapio[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;
case "JDM": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $jdm)) $jdm[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $jdm[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;
case "MICANTI": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $micanti)) $micanti[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $micanti[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;
case "TOMES": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $tomes)) $tomes[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $tomes[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;
case "TECFI": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $tecfi)) $tecfi[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $tecfi[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "TRON": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $tron)) $tron[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $tron[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "GTLINE": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $gtline)) $gtline[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $gtline[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "MOLLE": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $molle)) $molle[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $molle[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

					   }

			   }
// print_r($iur);
// print_r($mass);
// 
// print_r($volpi);
// print_r($cebo);
$string="<gente>";
// echo "<hr>";
reset($iur);
$string.="<iur>";
while (list($chiave, $valore) = each($iur)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];

$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</iur>";
reset($volpi);
$string.="<volpi>";
while (list($chiave, $valore) = each($volpi)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</volpi>";
reset($cebo);
$string.="<cebo>";
while (list($chiave, $valore) = each($cebo)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</cebo>";
reset($cebo);
$string.="<colortap>";
while (list($chiave, $valore) = each($coloratap)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</colortap>";
reset($mass);
$string.="<mass>";
while (list($chiave, $valore) = each($mass)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</mass>";
reset($sapio);
$string.="<sapio>";
while (list($chiave, $valore) = each($sapio)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</sapio>";
reset($unigum);
$string.="<unigum>";
while (list($chiave, $valore) = each($unigum)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</unigum>";
reset($bon);
$string.="<bonezzi>";
while (list($chiave, $valore) = each($bon)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</bonezzi>";
reset($tecno);
$string.="<tecnolam>";
while (list($chiave, $valore) = each($tecno)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</tecnolam>";
reset($tecno);
$string.="<spanset>";
while (list($chiave, $valore) = each($spanset)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</spanset>";

reset($villa);
$string.="<villa>";
while (list($chiave, $valore) = each($villa)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</villa>";

reset($gis);
$string.="<gis>";
while (list($chiave, $valore) = each($gis)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</gis>";


reset($biandiz);
$string.="<biandiz>";
while (list($chiave, $valore) = each($biandiz)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</biandiz>";


reset($arnetoli);
$string.="<arnetoli>";
while (list($chiave, $valore) = each($arnetoli)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</arnetoli>";


reset($jdm);
$string.="<jdm>";
while (list($chiave, $valore) = each($jdm)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</jdm>";


reset($micanti);
$string.="<micanti>";
while (list($chiave, $valore) = each($micanti)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</micanti>";


reset($tomes);
$string.="<tomes>";
while (list($chiave, $valore) = each($tomes)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</tomes>";


reset($tecfi);
$string.="<tecfi>";
while (list($chiave, $valore) = each($tecfi)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</tecfi>";

reset($tron);
$string.="<tron>";
while (list($chiave, $valore) = each($tron)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</tron>";


reset($gtline);
$string.="<gtline>";
while (list($chiave, $valore) = each($gtline)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</gtline>";

reset($molle);
$string.="<molle>";
while (list($chiave, $valore) = each($molle)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</molle>";




$string.="</gente>";
header('Content-type: text/xml');

echo $string;
}
catch (PDOException $err) { echo "<br><font color=blue size=5>" ;die( $err->getMessage());}
?>
