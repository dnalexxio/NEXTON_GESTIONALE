<?php
if (DEBUG!=0) error_reporting (~E_NOTICE);
include 'newconf.php';
session_start();
if (!isset($_SESSION['logged'])) 
{
header('Location: index.php');
die("restarting.."); 
}
?>
<html>
<head><TITLE>aggiornameto</TITLE>
<LINK href="newstyle.css" rel="StyleSheet" type="text/css">
</head><body>
<a href="index.php">torna alla home</a><br>
<?php
function RemoveFile($dir,$file) {
    if(!$dh = @opendir($dir)) return;
    while (false !== ($obj = readdir($dh))) {
        if($obj==$file) unlink($dir.'/'.$obj); 
        else throw new Exception("impossibile to delete file $file");
    }

    closedir($dh);
echo "file $file deleted";
    
}

//legge il file ed esegue la query sql che è scritta dentro...si mi piace


//legge il file

try{
	if($_SESSION['logged']=="" || $_SESSION['logged']!="giliberti" ) throw new Exception("you're not the admin"); 
	$file_upgrade="";
	$directory = "./aggiorna/";

                if( !$dirhandle = @opendir($directory) )
                        return;

                while( false !== ($filename = readdir($dirhandle)) ) {
                        if( substr($filename,-3,3) == "sql")	$file_upgrade=$filename;
				}

	if($file_upgrade=="") throw new Exception("la cartella e' vuota $file_upgrade"); 
	if(!$leggi=fopen($directory.$file_upgrade,"rb") ) throw new Exception("errore file $file_upgrade"); 

// $upgrade=fgets($leggi);
	while(!feof($leggi))
	{
	$upgrade.=fgets($leggi);
	}
	// $upgrade.=fread($leggi, filesize($file_upgrade));
	//esegue la query
	fclose($leggi);
	if($upgrade=="") throw new Exception("IL FILE è vuoto: $file_upgrade"); 
	echo "<div id=\"pane\" name=\"pane\"><h3><center>TROVATO FILE: $file_upgrade <img src=images/waiting.gif /></center></h3></div>";
	$dbh=connect();
	$sql=$upgrade;

  if(eregi("ordine_generato_import",$upgrade)) {

if (DEBUG!=0) echo " Procedura per l'importazione degli ordini non ancora implementata<br>";
	  	//die();
			
  			//devo prendere i magicvalues e sostituirli coi valori nel db!!
			//sono solo 4 valori: MAGIC_ORD_COD       MAGIC_ORD_TRNO
			//MAGIC_ORDC_COD                     MAGIC_ORDC_ID$i
			
		//2- controllo id utente
		$num_pos=stripos($sql,"U_S_Q")+5;
		$num_pos2=stripos($sql,"Q_S_U");
		
		$userid=substr($sql,$num_pos,$num_pos2-$num_pos);
		$findno="SELECT utente from utente where id='".$userid."'";
		
		$user=$dbh->query($findno);
		$user=$user->fetchAll();
		$user=$user[0][0];	
		//1-CREA UN NUOVO ORDINE
		$knoworder=substr_count($sql, "SPRAN1");
		$know_numrows=substr_count($sql, "SPRAN2");
		
		if($knoworder<1 || $know_numrows<1) throw new Exception(" non ci sono ordini in questo file...");
		$file_contatoreordini="contatoreordini.dat";
		if(!$leggi=fopen($file_contatoreordini,"rb")) throw new Exception("errore nel file del contatore $file_contatoreordini");
		$contatoreordini=fgets($leggi);
		$contatore_var=$contatoreordini;     //contatore var è MAGIC_ORD_TRNO
		fclose($leggi);
		$sql=str_replace("MAGIC_ORD_TRNO",$contatore_var,$sql);
		$conta=$dbh->query("SELECT MAX(codice_ordine) FROM ordine");
		$conta=$conta->fetchAll();
		$conta=$conta[0][0]+1;                //conta è MAGIC_ORD_COD
		
		$sql=str_replace("MAGIC_ORD_COD",$conta,$sql); 
		$sql=str_replace("MAGIC_ORDC_COD",$conta,$sql);  
		
               
		
		echo "L'ordine numero ".$contatore_var." (".$conta.") dell'utente ".$user."<br>sta per essere processato dal sistema";
						
		$writefile=fopen($file_contatoreordini,"wb");
		$contatore_var+=1;
		if (!fwrite($writefile, $contatore_var)) {
				throw new Exception("Non si riesce a scrivere nel file ($file_contatoreordini).Contattare l'amministratore del sistema");
					}
		fclose($writefile);
		
		$sql=str_replace("SPRAN1","INSERT INTO ordine ",$sql);
		$sql=str_replace("SPRAN2","INSERT INTO ordine_cliente_prod ",$sql);
		$sql=str_replace("U_S_Q","",$sql);
		$sql=str_replace("Q_S_U","",$sql);
		

		//3- inserisci le righe corrispondenti	
		echo "<br><br><br><br><br>";	
		$max_num_righe="SELECT max( id )FROM ordine_cliente_prod";
		$max_num=$dbh->query($max_num_righe);
		$max_num=$max_num->fetchAll();
		$max_num=$max_num[0][0]+1;		
		for ($i=0;$i<=$know_numrows;$i++) {		

		//scegli il codiced prodotto dal campo della query e inseriscilo in MAGIC_ORDC_ID$i
		   
		$sql=$sql=str_replace("MAGIC_ORDC_ID".$i,$max_num+$i,$sql); 
						}
		//echo $sql; 
		
		$conta=$dbh->query($sql);
		echo "TERMINATO CON SUCCESSO";
		


	}
  
  else { //non si sta eseguendo l'importazione, ma la modifica del db

    if (DEBUG!=0) echo $sql;
	$count = $dbh->exec($sql);
	//   $dbh->query($sql);
	echo "procedura per l'importazione dei prodotti<br>";
	echo "<br>"; 

	echo "UPDATE ricorrenze:".substr_count($sql, "UPDATE");
	echo "<br>INSERT ricorrenze:".substr_count($sql, "INSERT");
	echo "<br>DELETE ricorrenze:".substr_count($sql, "DELETE");
	echo "<br>$count rows processed<br>END<br>";

	 //RemoveFile($directory,$file_upgrade);

	  }
	}
	 catch (Exception $e) {
	  if (DEBUG!=0) echo "$sql<br>";
	  echo("<br><center>error received</font>");	
	  echo "<font color=red>   -->Failed: " . $e->getMessage();
	  echo "</center>";
	die();
	}

?>
