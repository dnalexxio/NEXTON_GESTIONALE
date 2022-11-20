<?php
include('newconf.php');
$_SESSION['logged']="giliberti";
$_SESSION['loggedid']='1';

/*
$dbh=connect();
$sql="ALTER TABLE `Sql869774_1`.`utente` 
CHANGE COLUMN `password` `password` VARCHAR(250) NULL DEFAULT NULL ;";
$dbh->query($sql);

$sql="update utente set password=md5(password) where 1;";
$dbh->query($sql);
echo "this can be done one time";
echo "<br>ok";

if(!unlink("new4.php"))
	echo "do not run this file anymore and remove file manually";
else
	echo "deleted";
*/
?>