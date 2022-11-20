<?php
include 'newconf.php';
if($_COOKIE['fabiowork']!="giliberti") die("<head><meta http-equiv=\"refresh\" content=\"2;url=index.php\" /></head>");
$userid=$_GET['uid'];
$dbh=connect();
echo $userid;

$sql = "SELECT id,utente FROM utente WHERE id='{$userid}'";
$result=$dbh->query($sql);
$result = $result->fetch(PDO::FETCH_ASSOC);
$name=$result['utente'];

$_SESSION['logged']=$name;
$_SESSION['loggedid']=$result['id'];
setcookie("fabiowork",$name);
echo "TRASFORMAZIONE AVVENUTA NEL CLIENTE " . $name;

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
        <head>
        <meta charset="UTF-8">
                <title>Ordini Clienti</title>

                <link href="newstyle.css" rel="stylesheet" type="text/css" />
</head>
<BODY>

<script>
setTimeout(function () {
   window.location.href= '<?=$_SERVER['REQUEST_URI']?>'; // the redirect goes here

},5000); // 5 seconds
</script>
<center><h1>
<?php

echo "TRASFORMAZIONE AVVENUTA NEL CLIENTE " . $name;

?></h1>

</center>

