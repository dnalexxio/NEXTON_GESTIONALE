<?php //STATS:PHP

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

$kuker=array();
$wsg=array();
$sifa=array();
$laser=array();
$fen=array();
$akfix=array();
$papigio=array();


$protools=array();
$darrell=array();
$medid=array();
$ipt=array();

$fassi=array();
$impreba=array();
$daldegan=array();
$gazziero=array();
$lamet=array();
$mga=array();
$olsangro=array();
$sipoil=array();
$tecnoforni=array();
$vebex=array();

$compa=array();
$fima=array();
$imilani=array();
$panther=array();
$med=array();

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


case "KUKER": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $kuker)) $kuker[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $kuker[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "SIFA": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $sifa)) $sifa[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $sifa[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "WSG": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $wsg)) $wsg[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $wsg[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "LASERLINER": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $laser)) $laser[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $laser[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;


case "FEN": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $fen)) $fen[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $fen[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "AKFIX": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $akfix)) $akfix[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $akfix[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "PAPIGIO": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $papigio)) $papigio[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $papigio[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "PROTOOLS": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $protools)) $protools[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $protools[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "DARRELL": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $darrell)) $darrell[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $darrell[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "MEDID": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $medid)) $medid[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $medid[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "IPT": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $ipt)) $ipt[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $ipt[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "FASSI": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $fassi)) $fassi[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $fassi[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "IMPREBA": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $impreba)) $impreba[$result['id_utente_fk']]=$result['prezzo_tot']; 
 else $impreba[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "DALDEGAN": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $daldegan)) $daldegan[$result['id_utente_fk']]=$result['prezzo_tot'];
 else $daldegan[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "GAZZIERO": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $gazziero)) $gazziero[$result['id_utente_fk']]=$result['prezzo_tot'];
 else $gazziero[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "LAMET": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $lamet)) $lamet[$result['id_utente_fk']]=$result['prezzo_tot'];
 else $lamet[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "MGA": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $mga)) $mga[$result['id_utente_fk']]=$result['prezzo_tot'];
 else $mga[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "OL.SANGRO": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $olsangro)) $olsangro[$result['id_utente_fk']]=$result['prezzo_tot'];
 else $olsangro[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "SIPOIL": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $sipoil)) $sipoil[$result['id_utente_fk']]=$result['prezzo_tot'];
 else $sipoil[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "TECNOFORNI": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $tecnoforni)) $tecnoforni[$result['id_utente_fk']]=$result['prezzo_tot'];
 else $tecnoforni[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "VEBEX": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $vebex)) $vebex[$result['id_utente_fk']]=$result['prezzo_tot'];
 else $vebex[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "COMPA": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $compa)) $compa[$result['id_utente_fk']]=$result['prezzo_tot'];
 else $compa[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;
case "FIMA": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $fima)) $fima[$result['id_utente_fk']]=$result['prezzo_tot'];
 else $fima[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;


case "IMILANI": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $imilani)) $imilani[$result['id_utente_fk']]=$result['prezzo_tot'];
 else $imilani[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;

case "MED": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $med)) $med[$result['id_utente_fk']]=$result['prezzo_tot'];
 else $med[$result['id_utente_fk']]+=$result['prezzo_tot'];
break;


case "PANTHER": 
$result['prezzo_tot']= str_replace("," ,  "." ,  $result['prezzo_tot']); if (!array_key_exists($result['id_utente_fk'], $panther)) $panther[$result['id_utente_fk']]=$result['prezzo_tot'];
 else $panther[$result['id_utente_fk']]+=$result['prezzo_tot'];
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



reset($kuker);
$string.="<kuker>";
while (list($chiave, $valore) = each($kuker)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</kuker>";


reset($sifa);
$string.="<sifa>";
while (list($chiave, $valore) = each($sifa)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</sifa>";

reset($wsg);
$string.="<wsg>";
while (list($chiave, $valore) = each($wsg)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</wsg>";


reset($laser);
$string.="<laserliner>";
while (list($chiave, $valore) = each($laser)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</laserliner>";

reset($fen);
$string.="<fen>";
while (list($chiave, $valore) = each($fen)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</fen>";


reset($akfix);
$string.="<akfix>";
while (list($chiave, $valore) = each($akfix)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</akfix>";

reset($papigio);
$string.="<papigio>";
while (list($chiave, $valore) = each($papigio)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</papigio>";


reset($protools);
$string.="<protools>";
while (list($chiave, $valore) = each($protools)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</protools>";


reset($darrell);
$string.="<darrell>";
while (list($chiave, $valore) = each($darrell)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</darrell>";


reset($medid);
$string.="<medid>";
while (list($chiave, $valore) = each($medid)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</medid>";


reset($ipt);
$string.="<ipt>";
while (list($chiave, $valore) = each($ipt)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</ipt>";


reset($fassi);
$string.="<fassi>";
while (list($chiave, $valore) = each($fassi)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</fassi>";

reset($impreba);
$string.="<impreba>";
while (list($chiave, $valore) = each($impreba)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</impreba>";

reset($daldegan);
$string.="<daldegan>";
while (list($chiave, $valore) = each($daldegan)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";
$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</daldegan>";

reset($gazziero);
$string.="<gazziero>";
while (list($chiave, $valore) = each($gazziero)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</gazziero>";

reset($lamet);
$string.="<lamet>";
while (list($chiave, $valore) = each($lamet)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</lamet>";


reset($mga);
$string.="<mga>";
while (list($chiave, $valore) = each($mga)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</mga>";

reset($olsangro);
$string.="<olsangro>";
while (list($chiave, $valore) = each($olsangro)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</olsangro>";

reset($sipoil);
$string.="<sipoil>";
while (list($chiave, $valore) = each($sipoil)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</sipoil>";

reset($tecnoforni);
$string.="<tecnoforni>";
while (list($chiave, $valore) = each($tecnoforni)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</tecnoforni>";


reset($compa);
$string.="<compa>";
while (list($chiave, $valore) = each($compa)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</compa>";

reset($fima);
$string.="<fima>";
while (list($chiave, $valore) = each($fima)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</fima>";

reset($imilani);
$string.="<imilani>";
while (list($chiave, $valore) = each($imilani)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</imilani>";

reset($panther);
$string.="<panther>";
while (list($chiave, $valore) = each($panther)) {
$sql2="SELECT cognome from utente where id='{$chiave}'";$res2=$dbh->query($sql2);
$res2=$res2->fetchAll();
$res2=$res2[0]['cognome'];
$string.="<SA name=\"$res2\">$valore</SA>";    

}
$string.="</panther>";


reset($vebex);
if(reset($vebex)===false) $string.="<vebex><SA name=\"GILIBERTI FABIO\">1.1</SA></vebex>";
	else{
	$string.="<vebex>";
	while (list($chiave, $valore) = each($vebex)) {
	$sql2="SELECT cognome from utente where id='{$chiave}'";$res2=$dbh->query($sql2);
	$res2=$res2->fetchAll();
	$res2=$res2[0]['cognome'];
	$string.="<SA name=\"$res2\">$valore</SA>";    

	}
	$string.="</vebex>";
}

reset($med);
if(reset($med)===false) $string.="<med><SA name=\"GILIBERTI FABIO\">1.1</SA></med>";
	else{
	$string.="<med>";
	while (list($chiave, $valore) = each($med)) {
	$sql2="SELECT cognome from utente where id='{$chiave}'";$res2=$dbh->query($sql2);
	$res2=$res2->fetchAll();
	$res2=$res2[0]['cognome'];
	$string.="<SA name=\"$res2\">$valore</SA>";    

	}
	$string.="</med>";
}




$string.="</gente>";
header('Content-type: text/xml');

echo $string;
}
catch (PDOException $err) { echo "<br><font color=blue size=5>" ;die( $err->getMessage());}
?>
