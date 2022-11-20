<?php
//listinoleggicsv.php
include('newconf.php');
if (!isset($_SESSION['logged'])) 
{
header('Location: index.php');
die("restarting.."); 
} 

function actual_write($query){
$dbh=connect();
if($dbh->query($query)) return true;
else return false;
}

function loadlistinoindb($total_listino,$ditta){
	
	
    $query="";
	 // start table
    $html = '<table>';
    // header row
    $html .= '<tr>';
    foreach($total_listino[0] as $key=>$value){
            $html .= '<th>' . addslashes(htmlspecialchars($key)) . '</th>';
        }
    $html .= '</tr>';

    // data rows
    foreach( $total_listino as $key=>$value){
		$query.="insert into prodotto (codice_prodotto,nome,color,misura,quantity,prezzo_unit,categoria) VALUES(";
        $html .= '<tr>';
		$index=0;
        foreach($value as $key2=>$value2){
            $html .= '<td>' . htmlspecialchars($value2) . '</td>';
			
			$query.="'$value2'";
			if(count($value) > $index+1) $query.=",";
			$index++;
        }
        $html .= '</tr>';
		$query.=");";
    }

    // finish table and return it

    $html .= '</table>';
    if(!isset($_POST['gofordb'])) echo $html;
	$querydelete="DELETE FROM prodotto where CATEGORIA LIKE '$ditta';";
	global $debug;
	if ($debug==1) echo $querydelete.$query;
	return $querydelete.$query;
}


if (!isset($_POST['tendaaziendaimport'])) {
	?>
<html>
<head>
<link href="newstyle.css" rel="stylesheet" type="text/css" />
</head>
<body><br>
	<h1>IMPORTA LISTINO</h1>
	<br>
	Scegli la ditta da cancellare e caricare:
<form id="" method="POST" action="listinoleggicsv.php">
<select name="tendaaziendaimport" id="tendaaziendaimport">
<?php

$dbh=connect();

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql="SELECT DISTINCT(categoria) FROM prodotto  where categoria not like '' ORDER BY categoria";
$result=$dbh->query($sql);
$dataset=$result->fetchAll();
foreach ($dataset as $cat) echo "<option>$cat[0]</option>";
?>

</select>
<input type="submit" />
</form>

<?php
if ($dh = opendir("./aggiorna/")) {
				while (($file = readdir($dh)) !== false) {
		if ( $file!= "." && $file!= ".." && (substr($file,-3,3)=="csv" || substr($file,-3,3)=="CSV") && $file!=="") {
			$nom_fichier=$file;
		echo "Esiste già un file {$nom_fichier} csv in folder\n";
		
		}      
		//echo $nom_fichier." ";
		//echo substr($file,-3,3)." ";
		//echo "<hr>".$file."\n";
		else{
			//echo "<h3>Nessun listino trovato $file<h3>";
			
		}
			}
				closedir($dh);
				echo "<br>";
				echo "<a href=\"listinouploada.php\">carica un altro file</a>";
		}
?>

</body>
</html>
<?php 

}
else {
$ditta=$_POST['tendaaziendaimport'];
echo "<html>
<head>
<link href=\"newstyle.css\" rel=\"stylesheet\" type=\"text/css\" />
</head>
<body>
<br>
	<h1>IMPORTA LISTINO $ditta</h1>";

try{

		if ($dh = opendir("./aggiorna/")) {
				while (($file = readdir($dh)) !== false) {
		if ( $file!= "." && $file!= ".." && (substr($file,-3,3)=="csv" || substr($file,-3,3)=="CSV") && $file!=="") {
		$nom_fichier=$file;
		echo "processing {$nom_fichier} csv in folder\n";
		if($nom_fichier!==""){  
			
		$fileread = fopen("./aggiorna/".$file, 'r');
		$listino_array=array();
			while (($line = fgetcsv($fileread,0,";")) !== FALSE) {
			  //$line is an array of the csv elements
			  //print_r($line);
			  $listino_array[]=$line;
			}
			$allquery = loadlistinoindb($listino_array,$ditta);
			if(isset($_POST['gofordb'])) { 
									echo "checkbox is selected";
									//carica nel db
									//cancella il file 
									//esci 
									
	
												if(isset($_POST['gofordb'])) {
												$LASTPOST = actual_write($allquery);
												if($debug==1) echo $allquery;
												unlink("./aggiorna/".$file);
												echo "<br>Terminato <a href=index.php>vai alla home</a> ";
												}
									}
			fclose($file);
		
		}
		}      
		//echo $nom_fichier." ";
		//echo substr($file,-3,3)." ";
		//echo "<hr>".$file."\n";
		else{
			//echo "<h3>Nessun listino trovato $file<h3>";
			
		}
			}
				closedir($dh);
		}

		else  { echo "error reading folder"; }


}
catch (PDOException $e) { echo $e->getMessage(); die("errore!!"); }

?><br><br>
 <form method="post" action="listinoleggicsv.php" name="conferma">
 <input type="checkbox" name="gofordb" value="gofordb">
  <label for="gofordb"> Conferma inserimento in DB</label><br>
 <input readonly type="text" name="tendaaziendaimport" value="<?php echo $ditta;?>">
      <input type="submit" value="invia" name="invio">
    </form>
<?php
	echo "<a href=\"listinouploada.php\">carica un altro file</a><br><br><br>";
	}
?>