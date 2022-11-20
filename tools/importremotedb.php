<?php
//
include('../newconf.php');


if (!isset($_SESSION['logged'])) 
{
header('Location: ../index.php');
die("restarting.."); 
} 


function printhead(){
echo "<!doctype html public \"-//W3C//DTD HTML 4.0 Transitional//EN\">
<html>";
}


// if ($_SESSION['dedi']!='alessio') {
// 	printhead();
// 	echo "<head><meta http-equiv=\"refresh\" content=\"2; URL=log.class.php\"></head><body><a href=log.class.php>rimando alla
// 	pagina di login...attendere prega</a><body>";
// 	echo  $_SESSION['dedi'];
// 	die();
// }


function logga($name){
        $logfile= 'uploada.log';
        $p_file=$logfile;
        $IP = $_SERVER['REMOTE_ADDR'];
        $logdetails=  date("F j, Y, g:i a") . ': ' . $_SERVER['REMOTE_ADDR'];
        $logdetails.=" !file:".$name." ";
        $fp = fopen($logfile, "a");
        fwrite($fp, $logdetails);
        fwrite($fp,$HTTP_REFERER);
        fwrite($fp, "<br>");
        fclose($fp);

}


function chiamaerrore($errorvar) {
switch ($errorvar) {
   case UPLOAD_ERR_OK:
       break;
   case UPLOAD_ERR_INI_SIZE:
       throw new Exception("The uploaded file exceeds the upload_max_filesize directive (".ini_get("upload_max_filesize").") in php.ini.");
       break;
   case UPLOAD_ERR_FORM_SIZE:
       throw new Exception("The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.");
       break;
   case UPLOAD_ERR_PARTIAL:
       throw new Exception("The uploaded file was only partially uploaded.");
       break;
   case UPLOAD_ERR_NO_FILE:
       throw new Exception("No file was uploaded.");
       break;
   case UPLOAD_ERR_NO_TMP_DIR:
       throw new Exception("Missing a temporary folder.");
       break;
   case UPLOAD_ERR_CANT_WRITE:
       throw new Exception("Failed to write file to disk");
       break;
   default:
       throw new Exception("Unknown File Error");
}
}
try{
if (isset($_POST["invio"])) {
  $percorso = "upload/";
  $entire=$percorso.$_FILES['file1']['name'];
  if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
    if (move_uploaded_file($_FILES['file1']['tmp_name'], $percorso.$_FILES['file1']['name'])) {

      logga($_FILES['file1']['name']);
      echo 'Nome file: <b><a href='.$percorso.$_FILES['file1']['name'].'>'.$_FILES['file1']['name'].'</a></b><br>';
      echo 'MIME Type: <b>'.$_FILES['file1']['type'].'</b><br>';
      echo 'Dimensione: <b>'.$_FILES['file1']['size'].'</b> byte<br>';
      echo '======================<br>';
      echo 'File caricato correttamente<br><br>';
     
       echo '<a href="uploada.php">carica un altro file</a>';
       echo '<br><br>';
       echo "<a href=\"php_sql_parse.php?ff={$_FILES['file1']['name']}\">Procedi con upgrade con il file {$_FILES['file1']['name']} </a>";


    } else {
      chiamaerrore($_FILES["file1"]["error"]);
    }
 } else {
    chiamaerrore($_FILES["file1"]["error"]);
  }
} else {
	printhead();
  // HTML ?>
    <form enctype="multipart/form-data" method="post" action="" name="uploadform">
      seleziona il file da caricare sul server: (max <?=ini_get("upload_max_filesize");?>)
      <br>
      <input type="file" name="file1" /><br>
	  
      <input type="submit" value="invia" name="invio">
    </form>
  <?php
}
}
catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>
</body>
</html>

