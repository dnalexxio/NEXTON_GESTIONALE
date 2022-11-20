<?php
error_reporting(E_ALL);
$file_contatoreordini="utentioggi.txt";
if(!$leggi=fopen($file_contatoreordini,"rb")) die("errore nel file del contatore $file_contatoreordini");
$contatoreordini=fgets($leggi);
$contatore_var=$contatoreordini;
fclose($leggi);
$writefile=fopen($file_contatoreordini,"wb");
$contatore_var+=1; echo $contatore_var;

    if (!fwrite($writefile, $contatore_var)) {
//         echo "Non si riesce a scrivere nel file ($file_contatoreordini)";
        
    }
  fclose($writefile);	
echo "Inizializzato l'ordine numero ".($contatore_var);
echo "<br><a href=newSeek.php>clicca qui</a>";




?>
