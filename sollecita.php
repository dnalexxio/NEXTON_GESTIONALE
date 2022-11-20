<?php
include('newconf.php');

$sender="gilibertifabio@gmail.com";
ini_set("sendmail_from", $sender);
session_start();
function getmittemail($utente){
$dbh=connect();
$user=array();
$sql="SELECT email,cognome FROM utente where utente='".$utente."' limit 1;";
$result=$dbh->query($sql);
$result=$result->fetchAll();
$user[0]=$result[0]['email'];
$user[1]=$result[0]['cognome'];
	return $user;
}


function getemail($destinatario){
$dbh=connect();
$sql="SELECT email from aziende where nomeazienda='".$destinatario."' limit 1;";
$result=$dbh->query($sql);
$result=$result->fetchAll();
$result=$result[0]['email'];
	return $result;
}

function finalsend($emdestinatario, $oggetto, $messaggio, $fromEmail){

// Genera un boundary
$mail_boundary = "=_NextPart_" . md5(uniqid(time()));
 
$to = $emdestinatario;
$subject = $oggetto;
$sender = "gilibertifabio@gmail.com";

 
$headers = "From: $sender\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-Type: multipart/alternative;\n\tboundary=\"$mail_boundary\"\n";
$headers .= "Cc: $sender\n";
$headers .= "X-Mailer: PHP " . phpversion();
 
// Corpi del messaggio nei due formati testo e HTML
$text_msg = "messaggio in formato testo";
$html_msg = $messaggio;
 
// Costruisci il corpo del messaggio da inviare
$msg = "This is a multi-part message in MIME format.\n\n";
$msg .= "--$mail_boundary\n";
$msg .= "Content-Type: text/plain; charset=\"iso-8859-1\"\n";
$msg .= "Content-Transfer-Encoding: 8bit\n\n";
 
$msg .= "\n--$mail_boundary\n";
$msg .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
$msg .= "Content-Transfer-Encoding: 8bit\n\n";
$msg .= $html_msg;	
 
// Boundary di terminazione multipart/alternative
$msg .= "\n--$mail_boundary--\n";
 
// Imposta il Return-Path (funziona solo su hosting Windows)
ini_set("sendmail_from", $sender);
 
// Invia il messaggio, il quinto parametro "-f$sender" imposta il Return-Path su hosting Linux
if (mail($to, $subject, $msg, $headers, "-f$sender")) { 
    echo "Mail inviata correttamente !<br><br><br><br>";
    
} else { 
    echo "<br><br>Recapito e-Mail fallito!";
}

}


if (!isset($_SESSION['logged'])) 
{
header('Location: index.php');
die("</script>couldn't load page"); 
}
?>

<?php

echo "<h3>SOLLECITA ORDINE</h3><br>";
if(!isset($_POST['sollecita'])){

echo "Mittente: ".$_SESSION['logged'];

$dbh=connect();
$sql="SELECT nomeazienda from aziende;";
$result=$dbh->query($sql);
$result=$result->fetchAll();
//$result=$result;




echo "<br>";
echo "<form name=\"sollpage\"id=\"sollecitaform\" action=\"sollecita.php\" method=\"POST\">";
echo"<br> SCEGLI IL DESTINATARIO:<select name=\"destinatario\" id=\"sollecitaid\">";

foreach($result as $cc) {
	
    echo '<option value="' . $cc['nomeazienda'] . '">' . $cc['nomeazienda'] . '</option>';
}
echo "</select>";
echo "<br>";echo "<br>";
echo "TESTO DA INVIARE";echo "<br>";
echo "<textarea name=\"messaggio\"></textarea>";
echo "<br>";
echo "<input type=\"hidden\" name='mittente' value='".$_SESSION['logged']."'>";
echo "<input type=\"hidden\" name='sollecita' value='sollecita'>";
echo "<input type=\"submit\">";
echo "</form>";

echo "<br><br>";
echo "<br><a href=\"index.php\">TORNA ALLA HOME</a><br>";



}

else{
echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">
<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
		<title>SOLLECITA</title>
<link href=\"./newstyle.css\" rel=\"stylesheet\" type=\"text/css\" />
</head>
<body>";

echo "<br>ATTENDERE INVIO MESSAGGIO IN CORSO<br>";
$aremmittente=array();
$destinatario=$_POST['destinatario'];
$postmittente=strtoupper($_POST['mittente']);
$aremmittente=getmittemail($postmittente);
$emmittente=$aremmittente[0];

$emdestinatario=getemail($destinatario);
$mittente=$aremmittente[1];

$oggetto="INFORMAZIONI CONSEGNA ORDINE - ".$mittente;
$messaggio="Buongiorno, con la presente si richiedono informazioni sulla consegna per l'ordine in corso del cliente ".$mittente;
$messaggio.="<br><br> Ulteriori note del cliente:  ";
$messaggio.=$_POST['messaggio'];
$messaggio.="<br><br>  Distinti saluti.<br><br>  FG ";
//debug
// echo $mittente;echo "<br>";
// echo $oggetto;echo "<br>";
// echo $messaggio;echo "<br>";
// echo $emmittente;echo "<br>";
//debug
echo "MESSAGGIO INVIATO A: ".$emdestinatario;echo "<br>";

finalsend($emdestinatario, $oggetto, $messaggio, $emmittente);




echo "<br><br>";
echo "<br><a href=\"index.php\">TORNA ALLA HOME</a><br>";


}
?>