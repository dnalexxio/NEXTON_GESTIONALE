<?php 
include('newconf.php');
session_start();
if(!$_SESSION['logged'] || $_SESSION['logged']!="giliberti") {
header('Location: /gestionALE/index.php');
			 

			}
?>
<BODY>
<head><TITLE>fatture</TITLE></head>
<BODY>
<h3>Inserisci fatture</h3>
<FORM action="newrequest.php" method="POST">
FATT N.<INPUT type="text" name="numfatt">
DEL: <INPUT type="text" name="data">
TOTALE:<INPUT type="text" name="totale">
IMPONIBILE<INPUT type="text" name="impo">
ditta :<INPUT type="text" name="ditta">
trimestre:<INPUT type="text" name="trim">
pagato <INPUT type="checkbox" name="pagato">
<INPUT type="submit">
</FORM>
</BODY>
</html>
