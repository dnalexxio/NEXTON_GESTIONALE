
<?php
error_reporting (E_ALL);
$mittente = 'From: "ALEXXIO" <alessiogill@libero.it> \r\n';
$destinatario = "fgiliberti@libero.it";
$oggetto = "modifica db";
$messaggio = "Salve Fabio Giliberti, ecco che Le invio gli ordini di oggi che sono stati creati tramite server: \r\n";
$fileutenti="utentioggi.txt";
if(!$leggi=fopen($fileutenti,"rb")) die("errore nel file $fileutenti");
$messaggio.=fread($leggi,'4096');
if(mail($destinatario, $oggetto, $messaggio, $mittente)) echo "ok: il messaggio inviato è:$messaggio";
else echo "error";
$mittente = 'From: "ALEXXIO" <alessiogill@libero.it> \r\n';
$destinatario = "dnalexxio@gmail.com";
$oggetto = "modifica db";
$messaggio = "Salve Fabio Giliberti, ecco che Le invio gli ordini di oggi che sono stati creati tramite server: \r\n";
$fileutenti="utentioggi.txt";
if(!$leggi=fopen($fileutenti,"rb")) die("errore nel file $fileutenti");
$messaggio.=fread($leggi,'4096');
if(mail($destinatario, $oggetto, $messaggio, $mittente)) echo "ok: il messaggio inviato è:$messaggio";
else echo "error";

?>