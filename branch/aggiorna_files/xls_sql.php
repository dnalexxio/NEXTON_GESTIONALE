<?
$ditta=$_GET['ditta'];
$nom_fichier="";
$leggicartella="0";
if($leggicartella=="0"){
if ($dh = opendir(".")) {
        while (($file = readdir($dh)) !== false) {
if (substr($file,-3,3)=="csv" && $file!=="") {
$nom_fichier=$file;
echo "processing with all xls in folder\n";
if($nom_fichier!=="")  doit($nom_fichier,$ditta);  
}      
//echo $nom_fichier." ";
//echo substr($file,-3,3)." ";
//echo "<hr>".$file."\n";
	}
        closedir($dh);
}

else  { echo "error reading folder"; }
}
else { 
       $nom_fichier="cebo1_2010_2.csv"; // nom du fichier a rtir
       echo "processing only file".$nom_fichier."<br>";
       doit($nom_fichier,$ditta);
    }

function doit($nom_fichier,$ditta){
echo "processing $nom_fichier ... <br>";

$separateur="|";                 // sigle de s�arateur


// ouverture connection base SQL
require("conf.php3");
$db_link = mysql_connect($serveur,$user,$passwd);
if (!$db_link) echo "Connexion impossible\n";

$requete=mysql_db_query($bdd,"select * from fichier ",$db_link);
if (!$requete) echo "Selection impossible\n";



// creation tableau d'affichage
// juste pour montrer que ca marche :-)
echo "<table border=1>";

if (file_exists($nom_fichier))         // Si le fichier existe, on l'ouvre
$fp = fopen($nom_fichier,  "r");
else                                   // sinon error
{
echo  "Fichier $nom_fichier introuvable.. <br>";
exit;
}
$contatore=1;
while (!feof($fp))  // On parcours le fichier
{

$ligne = fgets($fp,4096);  // On se d�lace d'une ligne
$liste = explode($separateur,$ligne);  // Champs s�ar� par |



for ($i=0;$i<8;$i++) if($liste[$i]=="") {
						$liste[$i]=$liste[$i+1]; 
					        $liste[$i+1]="";
					}
for ($i=0;$i<8;$i++) if($liste[$i]=="") {
                                                $liste[$i]=$liste[$i+1];
                                                $liste[$i+1]="";
                                        }




// ici important
$col1 = $liste[0];
$col2 = $liste[1];
$col3 = $liste[2];
$col4 = $liste[3];
$col5 = $liste[4];
$col6 = $liste[5];

//ale
$col7 = $liste[6];
$col8 = $liste[7];
//$col9 = $liste[8];
//$col10= $liste[9];
//$col11= $liste[10];

//$col2=eregi_replace('\'', '', $col2);


//$col3=eregi_replace('\'', '', $col3);
//$col1=eregi_replace('\'', '', $col1);

if (trim($col1)!= '')                     // si fin fichier
echo  "<tr>";
echo  "<td>$contatore</td>";
echo  "<td>$col1</td>";
echo  "<td>$col2</td>";
echo  "<td>$col3</td>";
echo  "<td>$col4</td>";
echo  "<td>$col5</td>";
echo  "<td>$col6</td>";
echo  "<td>$col7</td>";
//echo  "<td>$col8</td>";
//echo  "<td>$col9</td>";
//echo  "<td>$col10</td>";
//echo  "<td>$col11</td>";
echo  "<td>$ditta</td>";
echo  "</tr>";


// important dans la base SQL
$query="insert into fichier (col1,col2,col3,col4,col5,col6,col7) ";


$query.="values ('$col1','$col2','$col3','$col4','$col5','$col6','$ditta')";

$resul=mysql_query($query);
if (!$resul)  echo "<font color=red>Error:query was $query</font> and ".mysql_error()."<br><br> ";
$contatore++;
}

mysql_close($db_link);           // ferme SQL
fclose($fp);                     // ferme fichier TXT
echo "</table>";                 // fin du tableau

echo "Merci... Importation termine<br>";
}
?>
