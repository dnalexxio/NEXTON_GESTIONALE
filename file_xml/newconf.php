<?php
//newconf.php
$debug=0;

$iva="0.22";
ini_set('display_errors', $debug);
if ($debug==0) error_reporting(~E_ALL);  //nascondi matilde ~
else error_reporting(E_ALL);
date_default_timezone_set('Europe/Paris');
session_start();


$dbhost="62.149.150.234";
$dbname="Sql869774_1";
$dbuser="Sql869774";
$dbpass="35be5r1u5o";

$mittente = 'From: "GESTIONALE" <gilibertifabio@gmail.com> \r\n';
$destinatario = "gilibertifabio@gmail.com";
$oggetto = "modifica db";
$messaggio = "Salve Fabio Giliberti, ecco che Le invio gli ordini di oggi che sono stati creati tramite server: \r\n";
$fileutenti="utentioggi.txt";

function _clean($var){
    $pattern = array("/0x27/","/%0a/","/%0A/","/%0d/","/%0D/","/0x3a/",
                     "/union/i","/concat/i","/delete/i","/truncate/i","/alter/i","/information_schema/i",
                     "/unhex/i","/load_file/i","/outfile/i","/0xbf27/");
    $value = addslashes(str_replace($pattern, "", $var));
    return $value;
}


function connect(){
try{
$dbh;
global $dbhost,$dbname,$dbuser,$dbpass;
$pdostring="mysql:host=".$dbhost.";dbname=".$dbname;

$dbh = new PDO($pdostring, $dbuser, $dbpass,array(
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
	  //se la tabella is ordine devo togliere codice_ordine e trackno
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


function menu_short(){
echo "<ul class=\"list-group\">";


echo "
<a onclick=\"getpage('home_main.php');animatediv(1)\"><span><li class='active' id=\"1\">HOME</li></span></a>
<a onclick=\"getpage('video_pg.php');animatediv(2);\"><span><li id=\"2\">VIDEO</li></span></a>
";
if (isset($_SESSION['logged'])) echo "<a onclick=\"getpage('sollecita.php');animatediv(20);\"><span><li id=\"22\"><font color=red>SOLLECITA ORDINE</font></li></span></a>
";

if (!isset($_SESSION['logged'])) echo "<a onclick=\"getpage('registra_main.php');animatediv(3)\"><span><li id=\"3\">REGISTRA</li></span></a>";
echo "
<a onclick=\"getpage('mail/index.php');animatediv(4)\"><span><li id=\"4\">CONTATTI</li></span></a>
<a onclick=\"getpage('cataloghi.php');animatediv(5)\"><span><li id=\"5\">CATALOGHI</li></span></a>
</ul>
";
}


function menu(){
echo "
<ul class=\"list-group\">
<a onclick=\"getpage('genera.php');animatediv(6)\"><span><li id=\"6\">Generare un ordine</li></span></a>
<a href=\"newtuttiord.php\" onclick=\"animatediv(7);\"><span><li id=\"7\">Vedere gli altri ordini</li></span></a>
<a href=\"mystats.php\" onclick=\"animatediv(8)\"><span><li id=\"8\">Prodotti venduti in precedenza</li></span></a>
<a href=\"anagrafica.php\" onclick=\"animatediv(9)\"><span><li id=\"9\">Anagrafica</li></span></a>
<a href=\"abbandono.php\" onclick=\"animatediv(10)\"><span><li id=\"10\">ABBANDONA IL SITO</li></span></a>
</ul>
";
}

function menu_admin(){
echo " 
<ul class=\"list-group\">
<a onclick=\"getpageA('newinsertprod.php');animatediv(1)\"><span><li class='active' id=\"1\">Inserire nuovi prodotti</li></span></a>
<a onclick=\"getpageA('gestioneprodotti.php');animatediv(2);\"><span><li id=\"2\">Modifica prodotti esistenti</li></span></a>
<a onclick=\"getpageA('graph.php');animatediv(3)\"><span><li id=\"3\">Statistiche clienti</li></span></a>
<a onclick=\"getpageA('modificaclienti.php');animatediv(4)\"><span><li id=\"4\">Modifica clienti</li></span></a>
<a onclick=\"getpageA('artstat.php');animatediv(5)\"><span><li id=\"5\">Statistiche prodotti</li></span></a>
<a onclick=\"getpageA('sqlupgrade.php');animatediv(11);\"><span><li id=\"11\">UPGRADE VIA FILE</li></span></a>
<a onclick=\"getpageA('newclienti.php');animatediv(12)\"><span><li id=\"12\">Lista Clienti</li></span></a>
<a onclick=\"getpageA('provincestats.php');animatediv(13)\"><span><li id=\"13\">Statistiche Province</li></span></a>
<a onclick=\"getpageA('visfatt.php');animatediv(14)\"><span><li id=\"14\">Visualizza fatture azienda</li></span></a>
<a onclick=\"getpageA('db_utilities.php');animatediv(15)\"><span><li id=\"15\">BACKUP DB</li></span></a>
<a onclick=\"getpageA('last_orders.php');animatediv(16)\"><span><li id=\"16\">ULTIMI 10 ORDINI</li></span></a>
<a onclick=\"getpageA('listino_export.php');animatediv(16)\"><span><li id=\"17\">EXPORT LISTINO</li></span></a>
<a onclick=\"getpageA('listinouploada.php');animatediv(16)\"><span><li id=\"18\">CARICA ONLINE</li></span></a>
</ul>
";
}

function menu_oldadmin(){
echo " 

<span id=\"generic_menu2\" ><a href=\"newinsertprod.php\">Inserire nuovi prodotti</a></span> 
<span id=\"generic_menu2\"><a href=\"gestioneprodotti.php\">Modifica prodotti esistenti</a></span>
<span id=\"generic_menu2\"><a href=artstat.php>Statistiche prodotti</a></span>
<span id=\"generic_menu2\"><a href=newbill.php>Statistiche annuali</a></span>
<span id=\"generic_menu2\"><a href=graph.php>Statistiche clienti</a></span>
<span id=\"generic_menu2\"><a href=modificaclienti.php>Modifica clienti</a></span>
<span id=\"generic_menu2\"><a href=clienti_seek.php>Ricerca clienti</a></span>
<span id=\"generic_menu2\"><a href=\"newclienti.php\">Lista Clienti</a></span>

<span id=\"generic_menu2\"><a href=\"provincestats.php\">Statistiche Province</a></span>
<span id=\"generic_menu2\"><a href=visfatt.php>Visualizza fatture azienda</a></span>
<span id=\"generic_menu2\"><a href=sqlupgrade.php>UPGRADE VIA FILE</a></span>
<span id=\"generic_menu2\"><a href=db_utilities.php>BACKUP DB</a></span>
<span id=\"generic_menu2\"><a href=last_orders.php>ULTIMI 10 ORDINI</a></span>
<span id=\"generic_menu2\"><a href=listino_export.php>EXPORT LISTINO</a></span>
<span id=\"generic_menu2\"><a href=listinouploada.php>CARICA ONLINE</a></span>
";
}


function estrai_province(){

$dbh=connect();
$qq="SELECT distinct(provincia) FROM utente where length(provincia)=2 order by provincia";

$result = $dbh->query($qq);
$result = $result->fetchAll();
  return $result;
}


function estrai_settore(){

$dbh=connect();
$qq="SELECT distinct(settore) FROM utente  order by settore";
$result = $dbh->query($qq);
$result = $result->fetchAll();
  return $result;
}


function estrai_categoria(){

$dbh=connect();
$qq="SELECT distinct(categoria) FROM utente order by categoria";
$result = $dbh->query($qq);
$result = $result->fetchAll();
  return $result;
}


function estrai_zona(){

$dbh=connect();
$qq="SELECT distinct(zona) FROM utente  order by zona";
$result = $dbh->query($qq);
$result = $result->fetchAll();
  return $result;
}


function estraigestore(){
$dbh=connect();
$qq="SELECT ragione_sociale ,indirizzo,cap ,citta,provincia,telefono ,email,fax ,codice_fiscale,partitaiva  FROM gestore";
$result = $dbh->query($qq);
$result = $result->fetchAll();
  return $result[0];
}

?>
