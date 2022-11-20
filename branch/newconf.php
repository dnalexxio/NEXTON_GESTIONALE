<?
//newconf.php
$debug=0;

$iva="0.22";

ini_set('display_errors', $debug);
if ($debug==0) error_reporting(~E_ALL);  //nascondi matilde ~
else error_reporting(E_ALL);
date_default_timezone_set('Europe/Paris');
session_start();
function connect(){
try{
$dbh;

$dbh = new PDO('mysql:host=localhost;dbname=fabio', "simpleuser", "44Nbx9XNdYPPPu7W",array(
  PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE=> true
));
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $dbh;
}
catch (PDOException $e) { print "<br>ErrorDOH!: " . $e->getMessage() . "<br/>";
   die();}
}


# Creo la funzione datadump
function datadump ($table) {

  $result .= "# Dump of $table \n";
  $result .= "# Dump DATE : " . date("d-M-Y") ."\n\n";

  # Conto i campi presenti nella tabella
  $query = mysql_query("select * from $table where codice_ordine='$id'");
   
  $num_fields = @mysql_num_fields($query);

  # Conto il numero di righe presenti nella tabella
  $numrow = mysql_num_rows($query);

  # Passo con un ciclo for tutte le righe della tabella
  for ($i =0; $i<$numrow; $i++)
  {
    $row = mysql_fetch_row($query);

    # Ricreo la tipica sintassi di un comune Dump
    $result .= "INSERT INTO ".$table." VALUES(";

    # Con un secondo ciclo for stampo i valori di tutti i campi
    # trovati in ogni riga
    for($j=0; $j<$num_fields; $j++) {
      $row[$j] = addslashes($row[$j]);
      $row[$j] = ereg_replace("\n","\\n",$row[$j]);
      if (isset($row[$j])) $result .= "\"$row[$j]\"" ; else $result .= "\"\"";
      if ($j<($num_fields-1)) $result .= ",";
    }

    # Chiudo l'istruzione INSERT
    $result .= ");\n";
  }

  return $result . "\n\n\n";
}

function datadump2($table,$id) {

  # Creo la variabile $result
  $result .= "# Dump of $table \n";
  $result .= "# Dump DATE : " . date("d-M-Y") ."\n\n";

  # Conto i campi presenti nella tabella
  $query = mysql_query("select * from $table where codice_ordine='$id'");
   
  $num_fields = @mysql_num_fields($query);

  # Conto il numero di righe presenti nella tabella
  $numrow = mysql_num_rows($query);

  # Passo con un ciclo for tutte le righe della tabella
  for ($i =0; $i<$numrow; $i++)
  {
    $row = mysql_fetch_row($query);

    # Ricreo la tipica sintassi di un comune Dump
    $result .= "INSERT INTO ".$table." VALUES(";

    # Con un secondo ciclo for stampo i valori di tutti i campi
    # trovati in ogni riga
    for($j=0; $j<$num_fields; $j++) {
       $row[$j] = addslashes($row[$j]);
      $row[$j] = ereg_replace("\n","\\n",$row[$j]);
	  //se la tabella � ordine devo togliere codice_ordine e trackno
		if ($table=="ordine") {
			if ($j=="0") $result .= "\"MAGIC_ORD_COD\"" ;
			else if ($j=="5") $result .= "\"MAGIC_ORD_TRNO\"" ;
			else if($j=="7")  $result .= "\"U_S_Q".$row[$j]."Q_S_U\"" ;
			else if ($j!="5" && $j!="0" && $j!="7") { if(isset($row[$j])) $result .= "\"$row[$j]\"" ; else $result .= "\"\""; }
		
	
		}
	
	  //se la tabella essere ordin_cli_prod devo togliere codice_ordine e id
		else if ($table=="ordine_cliente_prod") {
	
			if ($j=="0") $result .= "\"MAGIC_ORDC_COD\"" ;
			else if ($j=="1") $result .= "\"MAGIC_ORDC_ID$i\"" ;
		
			else if ($j!="1" && $j!="0"){ if(isset($row[$j])) $result .= "\"$row[$j]\"" ; else $result .= "\"\""; }
			
		}	
	
	if ($j<($num_fields-1)) $result .= ",";
    }

    # Chiudo l'istruzione INSERT
    $result .= ");\n";
  }
  $result=str_ireplace("INSERT INTO ordine ","SPRAN1",$result); 
  $result=str_ireplace("dump of ordine ","SPRAN",$result); 
  $result=str_ireplace("dump of ordine_cliente_prod ","SPRAN",$result); 
  $result=str_ireplace("INSERT INTO ordine_cliente_prod ","SPRAN2",$result); 
  return $result . "\n\n\n";
}

function menu(){
echo "<span id=\"generic_menu\"><a href=genera.php>Generare un ordine</a></span>
<span id=\"generic_menu\"><a href=newtuttiord.php>Vedere gli altri ordini</a></span>
<span id=\"generic_menu\"><a href=mystats.php>Prodotti venduti in precedenza</a></span>
<span id=\"generic_menu\"><a href=\"anagrafica.php\">Anagrafica</a></span>
<span id=\"generic_menu\"><a href=\"abbandono.php\">ABBANDONA IL SITO</a></span>
";
if ($_SESSION['logged']=="giliberti") echo " 
<span id=\"generic_menu\" ><a href=\"newinsertprod.php\">Inserire nuovi prodotti</a></span> 
<span id=\"generic_menu\"><a href=\"gestioneprodotti.php\">Modifica prodotti esistenti</a></span></b>
<span id=\"generic_menu\"><a href=graph.php>Statistiche clienti</a></span>
<span id=\"generic_menu\"><a href=modificaclienti.php>Modifica clienti</a></span>
<span id=\"generic_menu\"><a href=artstat.php>Statistiche prodotti</a></span>
<span id=\"generic_menu\"><a href=\"sqlupgrade.php\">UPGRADE VIA FILE</a></span>
<span id=\"generic_menu\"><a href=\"newclienti.php\">Lista Clienti</a></span>
<span id=\"generic_menu\"><a href=visfatt.php>Visualizza fatture azienda</a></span>
<span id=\"generic_menu\"><a href=db_utilities.php>BACKUP DB</a></span>
<span id=\"generic_menu\"><a href=last_orders.php>ULTIMI 10 ORDINI</a></span>
<span id=\"generic_menu\"><a href=\"abbandono.php\">ABBANDONA IL SITO</a></span>
";



}

?>
