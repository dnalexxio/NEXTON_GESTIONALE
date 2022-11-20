
<?php
include('newconf.php');

if(!$leggi=fopen($fileutenti,"rb")) die("errore nel file $fileutenti");
$messaggio.=fread($leggi,'4096');
if(mail($destinatario, $oggetto, $messaggio, $mittente)) echo "ok: il messaggio inviato è:$messaggio";
else echo "error";


?>