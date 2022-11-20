<?php //newrequest.php
include 'newconf.php';




function logga($name){
        $logfile= 'log.html';
        $p_file=$logfile;
        $IP = $_SERVER['REMOTE_ADDR'];
        $logdetails=  date("F j, Y, g:i a") . ': ' . $_SERVER['REMOTE_ADDR'];
        $logdetails.=" !nome:".$name."<br>";
        $fp = fopen($logfile, "a");
        fwrite($fp, $logdetails);
        fwrite($fp,$HTTP_REFERER);
        fwrite($fp, "<br>");
        fclose($fp);

}

function avoid_duplicates($a){
$dbh=connect();
$sql="SELECT count(utente) from utente where utente='".$a."' LIMIT 1;";
$result=$dbh->query($sql);
$result=$result->fetchAll();
$result=$result[0];
$result=$result[0];
if ($result=='0') return true; //non ci sono utenti
else return false;
}

function register($a,$b,$c,$d){
try{
if($d!="13590") throw new Exception("Siamo spiacenti, la registrazione non è possibile");
if(!$a || !$b) throw new Exception("I campi richiesti non possono essere vuoti, torna indietro e inserisci tutti i campi");
if(!avoid_duplicates($a)) throw new Exception("Username già utilizzato: ".$a);
$sql="INSERT INTO utente (utente , password ,email, data_iscrizione) VALUES ('$a','$b','$c',DATE_FORMAT(now(), '%d %m %Y'))";
// echo $sql;

  $dbh=connect();
  $dbh->query($sql);
echo "<div id=\"inside2\">NUOVO UTENTE REGISTRATO:<br>"; 
echo "<br>Riepilogo:<br>";
echo "utente: ".$a."<br>password ".$b."<br>email ".$c;
echo "<br><h2>ora puoi loggarti con i tuoi dati</h2><BR><a href=\"index.php\">torna alla home</a></div>";

} catch (Exception $e) {
 //	 $dbh->rollBack();
  echo "<h1>ERRORE</h1>";
 if ($debug!=0) echo "$sql "; 
  echo "-->Failed4: " . $e->getMessage();
  echo "<br><a href='index.php'>Riprova</a>";
 die();

}

}

function warnmail($num,$user){
// $mittente = 'From: "ALEXXIO" <alessiogill@libero.it> \r\n';
// $destinatario = "fgiliberti@libero.it";
// $oggetto = "modifica db";
// $messaggio = "C'è stato un cambiamento nel db, si prega verificare l'ordine $num di $user";
// mail($destinatario, $oggetto, $messaggio, $mittente);
//echo "done";

//new implementation**********************************************

//la funzione scrive nel file gli utenti che hanno modificato in utentidioggi.txt
//la pagine di mail legge il testo del messaggio da utenti.txt
//alla fine configuro crontab in modo che ogni sera mandi la mail e cancelli il file utenti.txt


$fileutenti="utentioggi.txt";
$stringa="$num di $user\r\n";

if (($_SESSION['logged']=="giliberti") && (!$writefile2=fopen($fileutenti,"a"))) echo "<br>Errore Lettura File<br>";
if ((!fwrite($writefile2, $stringa)) && ($_SESSION['logged']=="giliberti")) echo "Errore 2: Non si riesce a scrivere nel file ($fileutenti)";
fclose($writefile2);

//END new implementation**********************************************
}


if($_REQUEST['requestenter']) { //funzione per il login

try{
$dbh=connect();
$pass = md5($_REQUEST['password']); 
$name= $_REQUEST['username'];
logga($name." with ".$pass);

if($pass=="" || $name=="") { header("index.php",1); echo("La combinazione di credenziali è invalida");  die("<a href=index.php id=\"generic_menu_1\"> Riprova</a>");}

$sql = "SELECT id,password FROM utente WHERE utente='{$name}'";
 $result=$dbh->query($sql);
    $result = $result->fetch(PDO::FETCH_ASSOC);
    if($result['password']==$pass) {
			

			if($name==null) die("Username non può essere nullo");
			
			setcookie("fabiowork",$name);

			$_SESSION['logged']=$name;
			$_SESSION['loggedid']=$result['id'];

			ob_end_flush();
			echo "<a id=\"generic_menu_1\" href=\"index.php\">PROCEDERE, CLICCA QUI</a>";
				

				}
else throw new PDOException("La combinazione di credenziali è invalida");
}

catch (PDOException $e) { print "<br> Si è verificato un errore! " . $e->getMessage() . "<br/>";
   die("<a id=\"generic_menu_1\" href=index.php>RETRY</a>");
   header("index.php",1);	//go to homepage		
			}

if ($debug!="0") echo $sql;
} //fine login
else if($_REQUEST['insertrow']) {

try{
$dbh=connect();

$sql="INSERT INTO ordine_cliente_prod VALUES ('$_REQUEST[orderno]', '$_REQUEST[insertrow]', '$_REQUEST[quantita]', '$_REQUEST[sconto]', '$_REQUEST[variazioneprezzo]', '$_REQUEST[sconto2]', '$_REQUEST[sconto3]', '$_REQUEST[misura]','$_REQUEST[nomep]','$_REQUEST[cat]','$_REQUEST[ppp]','$_REQUEST[codc]','$_REQUEST[um]' )";
$dbh->query($sql);


}

catch (PDOException $e) {
   print "<br> Errore Duplicato! <br/>";
if  ($debug!=0) echo $e->getMessage();
   die();
}


echo "<h1>ok</h1>";
if ($debug!="0") echo $sql;
}

else if ($_REQUEST['delproduct'] && $_REQUEST['order']) {
try {
$dbh=connect();
$sql="DELETE FROM ordine_cliente_prod WHERE codice_ordine= '{$_REQUEST['order']}' AND id='{$_REQUEST[delproduct]}' AND misura='{$_REQUEST['misura']}'";
$del=$dbh->query($sql);
$count = $del->rowCount();
if($count==0) 			{  
$sql="DELETE FROM ordine_cliente_prod WHERE codice_ordine= '{$_REQUEST['order']}' AND id='{$_REQUEST[delproduct]}'";
$del=$dbh->query($sql);

				}	
echo "deleted";
// echo "<h1><center>prodotto nell'ordine cancellato</center></h1><br>";
}
catch (PDOException $e) {
     print "Errore Duplicato! <br/>";
if ($debug!=0) echo $e->getMessage(); 
   die();
}
if ($debug!="0") echo $sql;
}
else if ($_REQUEST['delproduct'] && !isset($_REQUEST['order'])) { 
try {
$dbh=connect();
$sql="DELETE FROM prodotto WHERE id='{$_REQUEST[delproduct]}'";
$dbh->query($sql);
echo "<br><h1><center>prodotto definitivamente cancellato</center></h1><br>";
}
catch (PDOException $e) {
     print "Errore Duplicato! <br/>";
if ($debug!=0) echo $e->getMessage() ;
   die();
}

}
else if ($_REQUEST['genera']) { //funzione per la modifica degli ordini
		try{
		$dbh=connect();
		$sql = "SELECT id FROM utente WHERE utente='{$_REQUEST['utene']}'";
		$result = $dbh->query($sql);
		$result = $result->fetchAll();
		$result = $result[0][0];
				if ($result==0) {
				warnmail("problema",$_SESSION['logged']);
				die("Comando non riconosciuto");
				}
		$file_contatoreordini="contatoreordini.dat";
		if(!$leggi=fopen($file_contatoreordini,"rb")) die("errore nel file del contatore $file_contatoreordini");
		$contatoreordini=fgets($leggi);
		$contatore_var=$contatoreordini;
		$sql2="INSERT INTO ordine (data_ordine , id_utente_fk, ip, trackno  ) VALUES (DATE_FORMAT(now(), '%d %m %Y'),'{$result}','111111','$contatore_var' )";
		$dbh->query($sql2); 
		$conta=$dbh->query("SELECT COUNT(*) FROM ordine");
		$conta=$conta->fetchAll();
		$conta=$conta[0][0];
		$_SESSION['conto']=$conta;
		$_SESSION['contovisualizzabile']=$contatore_var;
		if ($debug!=0) print_r($conta);
		fclose($leggi);
		
		warnmail($contatore_var,$_SESSION['logged']);
		echo "<br>Inizializzato l'ordine numero ".($contatore_var)." del ".date("d-m-Y");
		
		
		$writefile=fopen($file_contatoreordini,"wb");
		$contatore_var+=1;
		if (!fwrite($writefile, $contatore_var)) {
			die("<br>Non si riesce a scrivere nel file ($file_contatoreordini).Contattare l'amministratore del sistema");
			
		}
		fclose($writefile);	
		
		echo "<br><a href=newSeek.php>clicca qui</a>";
		}
		
		catch (PDOException $e) { 

		print "Errore Duplicato! <br/>";
		if ($debug!=0) echo $e->getMessage() ;
   		die();
		}
		// echo "ecco :";
		// echo ($conta);
		if ($debug!="0") echo $sql;
}
else if ($_REQUEST['updateone'] && $_REQUEST['updateorderno']) { //funzioni per la modifica degli ordini


try{
$dbh=connect();
$_REQUEST['updateone'] = str_replace(" ","", $_REQUEST['updateone']);
if (isset($_REQUEST['sututti']) && $_REQUEST['sututti']==1) $sql="UPDATE ordine_cliente_prod SET sconto='{$_REQUEST[sconto]}', sconto2='{$_REQUEST[sconto2]}', sconto3='{$_REQUEST[sconto3]}' WHERE codice_ordine ='{$_REQUEST['updateorderno']}' AND newprice='';";
else $sql="UPDATE ordine_cliente_prod SET qta='{$_REQUEST[quantita]}', sconto='{$_REQUEST[sconto]}', sconto2='{$_REQUEST[sconto2]}', sconto3='{$_REQUEST[sconto3]}', newprice='{$_REQUEST[variazioneprezzo]}', misura='{$_REQUEST[misura]}' WHERE codice_ordine ='{$_REQUEST['updateorderno']}' AND id ='{$_REQUEST['updateone']}' AND misura='{$_REQUEST[oldmisura]}' LIMIT 1 ";

// echo "<br><br>".$sql;
$dbh->query($sql); 
} 
catch (PDOException $e) {
   print "Errore Duplicato! <br/>";
if ($debug!=0) echo $e->getMessage() ;
   die();
}
if ($debug!="0") echo $sql; 
echo "done";
}
else if ($_REQUEST['insertprod']) { //inserisce prodotti
//sanitize
		foreach($_REQUEST as $k => $v){
				$_REQUEST[$k] = _clean($v);
				}

		try {
		$dbh=connect();
		$sql="INSERT INTO prodotto ( codice_prodotto , nome  , color,  quantity , prezzo_unit , descrizione ,marca, fornitore, disponibilita, venduti, data_ultima_vendita, data_arrivo, bkgimage, descheader, features, magazzino, categoria, id ) VALUES 
		('{$_REQUEST['code']}', '{$_REQUEST['name']}', '{$_REQUEST['color']}', '{$_REQUEST['quantity']}', '{$_REQUEST['price']}', '{$_REQUEST['desc']}' ,' ',' ',' ',' ',' ', ' ',' ',' ',' ','{$_REQUEST['store']}','{$_REQUEST['category']}','')";

		// echo $sql;
		if(!$_REQUEST['code'] || !$_REQUEST['name'] || !$_REQUEST['price']) throw new Exception("I campi richiesti non possono essere vuoti, torna indietro e inserisci tutti i campi");

		$dbh->query($sql);
		echo "<br><h1><center>prodotto inserito con successo</center></h1><br>";
		}
		catch (Exception $e) {
		   print "<br>ErrorDOH!: " . $e->getMessage() . "<br/>";
		   die();
		}
		if ($debug!="0") echo $sql;
		}
else if ($_REQUEST['insertprodfast']) { //inserisce prodotti durante l'ordine
							//sanitize
							foreach($_REQUEST as $k => $v){
									$_REQUEST[$k] = _clean($v);
									}

							try {
							$dbh=connect();
							$riga_imp="";
							$sql="INSERT INTO prodotto ( codice_prodotto , nome  , color,  quantity , prezzo_unit , descrizione ,marca, fornitore, disponibilita, venduti, data_ultima_vendita, data_arrivo, bkgimage, descheader, features, magazzino, categoria ) VALUES 
							('{$_REQUEST['code']}', '{$_REQUEST['name']}', '{$_REQUEST['color']}', '{$_REQUEST['quantity']}', '{$_REQUEST['price']}', '{$_REQUEST['desc']}' ,' ',' ',' ',' ',' ', ' ',' ',' ',' ','{$_REQUEST['store']}','{$_REQUEST['category']}')";
							
							// echo $sql;
							if(!$_REQUEST['code'] || !$_REQUEST['name'] || !$_REQUEST['price']) throw new Exception("I campi richiesti non possono essere vuoti, torna indietro e inserisci tutti i campi");
							$dbh->query($sql);
							$sql="INSERT INTO ordine_cliente_prod SELECT '$_REQUEST[orderno]', max( id ) +1 , '$_REQUEST[qta_ordin]', '$_REQUEST[sconto]', '$_REQUEST[variazioneprezzo]', '$_REQUEST[sconto2]', '$_REQUEST[sconto3]', '$_REQUEST[misura]','{$_REQUEST['name']}','{$_REQUEST['category']}','{$_REQUEST['price']}','{$_REQUEST['code']}','$_REQUEST[um]' FROM prodotto";
							$dbh->query($sql);
							echo "<br><h1>OK</h1><br>";
							}
							catch (Exception $e) {
							   print "<p class=\"error\">Errore 687!</p> ";
								if ($debug!="0") echo $e->getMessage() . "<br/>";
								if ($debug!="0") echo $sql;
							   die();
							}
							
							}
else if ($_REQUEST['notes']) { //inserisce delle note
try {
$dbh=connect();
if($_REQUEST['notes']=="annullare") $sql="UPDATE ordine SET prezzo_tot='0' WHERE codice_ordine='{$_REQUEST['ordnu']}'";
else $sql="UPDATE ordine SET note='{$_REQUEST['notes']}' WHERE codice_ordine='{$_REQUEST['ordnu']}'";
$dbh->query($sql);
// echo $sql;
echo "<br><center>nota aggiunta:".$_REQUEST['notes']."</center><br>";
if($_REQUEST['notes']=="annullare") echo "<font color=red>ATTENZIONE:ordine azzerato</font><br>";

}
catch (PDOException $e) {
     print "<br>Errore Duplicato! <br/>";
if ($debug!=0) echo $e->getMessage() ;
   
   die();
}
if ($debug!="0") echo $sql;
}

else if($_REQUEST['registra']) { //funzione registra
$dbh=connect();
register($_REQUEST['username'],md5($_REQUEST['passwd']),$_REQUEST['email'],$_REQUEST['codice_controllo']);
 
} //fine registra
else if($_REQUEST['regex']) {  //modifica di un ordine chiuso...utilizzare con cautela
session_start();

$_SESSION['conto']=$_REQUEST['regex'];

echo "ordine {$_SESSION['conto']} rigenerato, <a href=\"neworders.php\">clicca qui</a>";
}
else if(isset($_REQUEST['ordersend'])) {  //invio di ordini
	try{

session_start();
$link = mysql_connect($dbhost, $dbuser, $dbpass);
$database = mysql_select_db($dbname); 
$tableName  = 'ordine_cliente_prod';
$table1 = datadump2("ordine",$_REQUEST['ordersend']);
$table1 .= datadump2("ordine_cliente_prod",$_REQUEST['ordersend']);


# Diamo un nome al file di Dump che verrà creato
$file_name = "ORDINE".$_REQUEST['ordersend'].$_SESSION['logged'].".sql";

# Definiamo le intestazioni
Header("Content-type: application/octet-stream"); 
Header("Content-Disposition: attachment; filename = $file_name");
echo "# ordine_generato_import \n";
# Stampiamo il contenuto
echo $table1; 

# Chiudiamo
exit;
	}
catch (Exception $e) {
   print "Errore Duplicato! <br/>";
if ($debug!=0) echo $e->getMessage() ;
   die();
}
if ($debug!="0") echo $sql;
}
else if($_REQUEST['findtotal']){

try {
$dbh=connect();
$sql="SELECT prezzo_tot from ordine WHERE id_utente_fk='{$_REQUEST['findtotal']}'";
$result=$dbh->query($sql);
$result=$result->fetchAll();
$tot=array();

// echo $sql;
foreach ($result as $parz) {

$parz[0]=number_format($parz[0],3,".","");
$tot[]=$parz[0];

}
$one=array_sum($tot);
$one=number_format($one,3,'.','');
echo $one." EUR";
//echo "".$_REQUEST['notes']."<br>";
}
catch (PDOException $e) {
   print "Errore Generico <br/>";
if ($debug!=0) echo $e->getMessage() ;
   die();
}

}

else if($_REQUEST['clientdel'] ) {
$dbh=connect();
echo $_SESSION['logged'];
if ($_SESSION['logged']!="giliberti") die("unauthorized");
try{
if ($_REQUEST['clientdel']=="1") throw new PDOException("INFILTRATION ERROR");
$sql="DELETE FROM utente WHERE id='{$_REQUEST['clientdel']}' LIMIT 1;";

if($dbh->query($sql)) ;
else throw new PDOException("General error while deleting");

}
 
 catch (PDOException $e) {
   print "Errore Generico <br/>";
if ($debug!=0) echo $e->getMessage() ;
   die();
}
echo "<h1>cliente cancellato</h1><br>";
if ($debug!="0") echo $sql;
}

else if($_REQUEST['numfatt']) {

try{
$dbh=connect();
if($_REQUEST['pagato']=="on") $_REQUEST['pagato']="1";
else $_REQUEST['pagato']="0";
$trim=$_REQUEST['mese']."-".substr($_REQUEST['year'],2);
$sql="INSERT INTO fatture (numero,data,totale,imponibile,ditta,trimestre,pagato) VALUES ('$_REQUEST[numfatt]', '$_REQUEST[data]', '$_REQUEST[totale]', '$_REQUEST[impo]', '$_REQUEST[ditta]', '$trim', '$_REQUEST[pagato]')";
$dbh->query($sql);


}

catch (PDOException $e) {
if ($debug!="0") echo $sql;
   print "<br>: ErrorDOH!: " . $e->getMessage() . "<br/>";
   die();
}


echo "<h3>fattura inserita :$_REQUEST[numfatt]--$_REQUEST[data]--  $_REQUEST[totale]--$_REQUEST[impo]--$_REQUEST[ditta]--$trim'--$_REQUEST[pagato]</h3>";
if ($debug!="0") echo $sql;
echo "<head><meta http-equiv=\"refresh\" content=\"2;url=visfatt.php\" /></head>";
}

else if($_REQUEST['sendp']) {
$dbh=connect();
$dbh->query("UPDATE fatture SET pagato=1 where id='{$_REQUEST['sendp']}'");

}

else if($_REQUEST['delfat']) {
$dbh=connect();
$dbh->query("DELETE from fatture where id='{$_REQUEST['delfat']}'");

}


else if ($_REQUEST['total_sped']) { //funzione di inserimento del trasporto
try {
$dbh=connect();

$sql="UPDATE ordine SET vector='{$_REQUEST['traspo']}' WHERE codice_ordine='{$_REQUEST['total_sped']}'";
$dbh->query($sql);
// echo $sql;
//echo "<br><center>nota aggiunta:".$_REQUEST['notes']."</center><br>";

}
catch (PDOException $e) {
   print "Errore Generico <br/>";
if ($debug!=0) echo $e->getMessage() ;
   die();
}
if ($debug!="0") echo $sql;
}

else if( isset($_REQUEST['nname']) && isset($_REQUEST['id']) && isset($_REQUEST['categoria']) && isset($_REQUEST['price'])) { //FASTORDINA
$dbh=connect();
$conto=$_SESSION['conto'];
$sql="INSERT INTO ordine_cliente_prod VALUES ('$conto', '{$_REQUEST['id']}', '$_REQUEST[quantity]', '', '', '', '', '','{$_REQUEST['nname']}','{$_REQUEST['categoria']}','{$_REQUEST['price']}','{$_REQUEST['code']}','' )";
try{
$dbh->query($sql);
}
catch (PDOException $e) {
   print "Errore Generico <br/>";
if ($debug!=0) echo $e->getMessage() ;
   die();
}
}
else {
echo "<head><meta http-equiv=\"refresh\" content=\"1;url=index.php\" /></head>";

if ($debug!=0) print_r($_REQUEST);

die();
}
?>
