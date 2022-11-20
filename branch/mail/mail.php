<?php
#ini_set('display_errors','1');
#error_reporting(E_ALL);
require("class.phpmailer-lite.php");
echo "<head>
<link href=\"css/style_desktop2.css\" rel=\"stylesheet\" type=\"text/css\" >
<style>
body {
        width: 600px;
        height: 120px;
        border: 3px solid #cccccc;
        padding: 5px;
        font-family: Tahoma, sans-serif;
        background-image: url('../bg.gif');
        background-position: bottom right;
        background-repeat: no-repeat;
}

</style></head><body>";
if($_POST['contatto']=="") die("Errore imprevisto");

$mail = new PHPMailerLite();

$mail->SetFrom($_POST['contatto'], $_POST['nome']);

$mail->AddAddress("gilibertifabio@gmail.com", "FABIO GILIBERTI");


$mail->Host       = "192.168.1.9"; // SMTP server
$mail->SMTPDebug  = 2;
$mail->WordWrap = 50;                                 // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add 
//attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
$mail->IsHTML(true);                                  // set email 
//format to HTML

$mail->Subject = "MAIL DA GESTIONALE";
$mail->Body    = $_POST['styled-textarea'];


if(!$mail->Send())
{
   echo "Si è verificato un errore imprevisto. E' stata inviata una notifica<p>";
   echo "Cortesemente, riprovare più tardi";
   #echo $mail->ErrorInfo;
 echo "<br><br><a href=\"../index.php\">TORNA ALLA HOME</a>";
}

else{
$mail2 = new PHPMailerLite();

$mail2->SetFrom("gilibertifabio@gmail.com", "FABIO GILIBERTI");

$mail2->AddAddress($_POST['contatto'], $_POST['nome'] );


$mail2->Host       = "192.168.1.9"; // SMTP server
$mail2->SMTPDebug  = 2;
$mail2->WordWrap = 50;                                 // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add 
//attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
$mail2->IsHTML(true);                                  // set email 
//format to HTML

$mail2->Subject = "RICEVUTA MAIL DA GESTIONALE";
$mail2->Body    = "Gentile ".$_POST['nome'].", abbiamo ricevuto la sua comunicazione. Provvederemo a risponderle nel piu breve tempo possibile. Grazie. Giliberti Rappresentanze";

$mail2->Send();
echo "Il messaggio è stato inviato. Riceverà sulla sua email una conferma di invio";
echo "<a href=\"../index.php\">TORNA ALLA HOME</a>";
}
?>

