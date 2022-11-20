<?php
error_reporting (E_ALL);
$mittente = 'From: "ALEXXIO" <alessiogill@libero.it> \r\n';
$destinatario = "dnalexxio@gmail.com";
$oggetto = "modifica db";
$messaggio = "eeeeeeeeee";
mail($destinatario, $oggetto, $messaggio, $mittente); 
echo "ok: il messaggio inviato è:$messaggio";


?>
