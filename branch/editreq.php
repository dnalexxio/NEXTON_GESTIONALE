<?

include 'newconf.php';
try{
$dbh=connect();
$dove="";
$normalizza=substr($_REQUEST['campo'],23);

switch ($normalizza){
case "editable1]": $tabella="utente"; $dove="id"; break;
case "editable2]": $tabella="utente"; $dove="cognome"; break;
case "editable3]": $tabella="utente"; $dove="nome"; break;
case "editable4]":$tabella="utente"; $dove="datanascita";break;
case "editable5]":$tabella="utente"; $dove="luogonascita";break;
case "editable7]":$tabella="utente"; $dove="codice_fiscale";break;
case "editable8]":$tabella="utente"; $dove="indirizzo";break;
case "editable9]":$tabella="utente"; $dove="citta";break;
case "editable10]":$tabella="utente"; $dove="provincia";break;break;
case "editable11]":$tabella="utente"; $dove="stato";break;
case "editable12]":$tabella="utente"; $dove="telefono";break;
case "editable13]":$tabella="utente"; $dove="email";break;
case "editable14]":$tabella="utente"; $dove="attivo";break;
case "editable15]":$tabella="utente"; $dove="password";break;
case "editable16]":$tabella="utente"; $dove="dataultimoacquisto";
case "editable17]":$tabella="utente"; $dove="utente";break;
case "editable18]":$tabella="utente"; $dove="password";break;
case "cap":$tabella="utente"; $dove="cap";break;
case "editable20]":$tabella="utente"; $dove="rispostasegreta";break;
case "editable21]":$tabella="utente"; $dove="tipopagamento";break;
case "editable22]":$tabella="utente"; $dove="descrizionepagamento";break;
case "editable23]":$tabella="utente"; $dove="indirizzospedizione";break;
case "editable24]":$tabella="utente"; $dove="cittaspedizione";break;
case "editable25]":$tabella="utente"; $dove="provinciaspedizione";break;
case "editable26]":$tabella="utente"; $dove="statospedizione";break;
case "d1]":$tabella="prodotto";$dove="codice_prodotto";break;
case "d2]":$tabella="prodotto";$dove="nome";break;
case "d3]":$tabella="prodotto";$dove="categoria";break;
case "d4]":$tabella="prodotto";$dove="boximage";break;
case "d5]":$tabella="prodotto";$dove="color";break;
case "d6]":$tabella="prodotto";$dove="disponibilita";break;
case "d7]":$tabella="prodotto";$dove="quantity";break;
case "d8]":$tabella="prodotto";$dove="magazzino";break;
case "d9]":$tabella="prodotto";$dove="prezzo_unit";break;
case "d10]":$tabella="prodotto";$dove="descrizione";break;
case "fax]":$tabella="utente2";$dove="cellulare";break;
case "telcl]":$tabella="utente2";$dove="telefono";break;
case "contoc]":$tabella="utente2";$dove="numeroconto";break;
case "paga]":$tabella="utente2";$dove="tipo_pagamento";break;
case "mailc]":$tabella="utente2";$dove="email";break;
case "abicab]":$tabella="utente2";$dove="abicab";break;
case "verofax]":$tabella="utente2";$dove="nazione";break;
case "ind8]":$tabella="utente2";$dove="indirizzo";break;
case "ind9]":$tabella="utente2";$dove="citta";break;
case "ind10]":$tabella="utente2";$dove="provincia";break;
case "ind11]":$tabella="utente2";$dove="stato";break;
case "editableqty]": $tabella="ordine_cliente_prod"; $dove="qta"; break;
case "editablesco]": $tabella="ordine_cliente_prod"; $dove="sco"; break;
}
if ($dove=="") {
$normalizza=substr($_REQUEST['campo'],28);

switch ($normalizza){
case "editable1]": $tabella="utente"; $dove="id"; break;
case "editable2]": $tabella="utente"; $dove="cognome"; break;
case "editable3]": $tabella="utente"; $dove="nome"; break;
case "editable4]":$tabella="utente"; $dove="datanascita";break;
case "editable5]":$tabella="utente"; $dove="luogonascita";break;
case "editable7]":$tabella="utente"; $dove="codice_fiscale";break;
case "editable8]":$tabella="utente"; $dove="indirizzo";break;
case "editable9]":$tabella="utente"; $dove="citta";break;
case "editable10]":$tabella="utente"; $dove="provincia";break;break;
case "editable11]":$tabella="utente"; $dove="stato";break;
case "editable12]":$tabella="utente"; $dove="telefono";break;
case "editable13]":$tabella="utente"; $dove="email";break;
case "editable14]":$tabella="utente"; $dove="attivo";break;
case "editable15]":$tabella="utente"; $dove="password";break;
case "editable16]":$tabella="utente"; $dove="dataultimoacquisto";
case "editable17]":$tabella="utente"; $dove="utente";break;
case "editable18]":$tabella="utente"; $dove="password";break;
case "cap]":$tabella="utente";         $dove="cap";break;
case "editable20]":$tabella="utente"; $dove="rispostasegreta";break;
case "editable21]":$tabella="utente"; $dove="tipopagamento";break;
case "editable22]":$tabella="utente"; $dove="descrizionepagamento";break;
case "editable23]":$tabella="utente"; $dove="indirizzospedizione";break;
case "editable24]":$tabella="utente"; $dove="cittaspedizione";break;
case "editable25]":$tabella="utente"; $dove="provinciaspedizione";break;
case "editable26]":$tabella="utente"; $dove="statospedizione";break;
case "d1]":$tabella="prodotto";$dove="codice_prodotto";break;
case "d2]":$tabella="prodotto";$dove="nome";break;
case "d3]":$tabella="prodotto";$dove="categoria";break;
case "d4]":$tabella="prodotto";$dove="boximage";break;
case "d5]":$tabella="prodotto";$dove="color";break;
case "d6]":$tabella="prodotto";$dove="disponibilita";break;
case "d7]":$tabella="prodotto";$dove="quantity";break;
case "d8]":$tabella="prodotto";$dove="magazzino";break;
case "d9]":$tabella="prodotto";$dove="prezzo_unit";break;
case "d10]":$tabella="prodotto";$dove="descrizione";break;
case "fax]":$tabella="utente2";$dove="cellulare";break;
case "telcl]":$tabella="utente2";$dove="telefono";break;
case "contoc]":$tabella="utente2";$dove="numeroconto";break;
case "paga]":$tabella="utente2";$dove="tipo_pagamento";break;
case "abicab]":$tabella="utente2";$dove="abicab";break;
case "mailc]":$tabella="utente2";$dove="email";break;
case "verofax]":$tabella="utente2";$dove="nazione";break;
case "ind8]":$tabella="utente2";$dove="indirizzo";break;
case "ind9]":$tabella="utente2";$dove="citta";break;
case "ind10]":$tabella="utente2";$dove="provincia";break;
case "ind11]":$tabella="utente2";$dove="stato";break;
case "editableqty]": $tabella="ordine_cliente_prod"; $dove="qta"; break;
case "editablesco]": $tabella="ordine_cliente_prod"; $dove="sco"; break;
case "numero]": $tabella="fatture"; $dove="numero"; break;
case "ditta]": $tabella="fatture"; $dove="ditta"; break;
case "imponibile]": $tabella="fatture"; $dove="imponibile"; break;
case "pagato]": $tabella="fatture"; $dove="pagato"; break;
case "totale]": $tabella="fatture"; $dove="totale"; break;
case "data]": $tabella="fatture"; $dove="data"; break;
case "trimestre]": $tabella="fatture"; $dove="trimestre"; break;
}






}
if($tabella=="utente") $sql ="UPDATE $tabella SET $dove = '{$_REQUEST['cosa']}' where utente='{$_REQUEST['chi']}'"; //nell'orig era id!
else if($tabella=="prodotto") $sql ="UPDATE $tabella SET $dove = '{$_REQUEST['cosa']}' where id={$_REQUEST['chi']}";
else if($tabella=="utente2") $sql ="UPDATE utente SET $dove = '{$_REQUEST['cosa']}' where utente='{$_REQUEST['chi']}'";
else if($tabella=="ordine_cliente_prod") $sql ="UPDATE ordine_cliente_prod SET $dove = '{$_REQUEST['cosa']}' where codice_ordine='{$_REQUEST['chi']}'";
else if($tabella=="fatture") $sql="UPDATE fatture SET $dove ='{$_REQUEST['cosa']}' where id='{$_REQUEST['chi']}'";
if (DEBUG!=0) echo $sql;
$dbh->query($sql);

echo "<font color=red><h3>OK</font> il campo  $dove è stato modificato</h3></font>";

}
catch (PDOException $e) { echo $e->getMessage(); die("errore!!"); }
?>
