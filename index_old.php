<?php
include('newconf.php');
session_start();

if (isset($_SESSION['logged'])) {
echo "<!DOCTYPE HTML><html><head><link href=\"css/style_mobile.css\" rel=\"stylesheet\" type=\"text/css\" media=\"(min-device-width: 0px) and (max-device-width: 320px)\" >
    <link href=\"css/style_tablet.css\" rel=\"stylesheet\" type=\"text/css\" media=\"(min-device-width: 321px) and (max-device-widthh: 768px)\" >
    <link href=\"css/style_desktop.css\" rel=\"stylesheet\" type=\"text/css\" media=\" (min-device-width: 769px)\" >
</head>";

echo "<body> 
<div id=\"titolo\">Giliberti Rappresentanze</div>
<div id=\"div_user\">{$_SESSION['logged']},(codice cliente {$_SESSION['loggedid']})<br> <a href=\"abbandono.php\">ABBANDONA IL SITO</a></div> <p class=\"menu1\">".date("d/m/y   G:i")." </p> ";

menu();

echo "</body>";

					}
      
else {

if (isset($_GET['page'])){ 
?>
<!DOCTYPE HTML>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <head>
 <link href="css/style_mobile.css" rel="stylesheet" type="text/css" media="(min-device-width: 0px) and (max-device-width: 320px)" >
 <link href="css/style_tablet.css" rel="stylesheet" type="text/css" media="(min-device-width: 321px) and (max-device-width: 768px)" >
 <link href="css/style_desktop.css" rel="stylesheet" type="text/css" media="(min-device-width: 769px)" >
 <TITLE>FABIO GILIBERTI</TITLE><script type="text/javascript">

function controlla(forma){
if (forma.username.value=="" || forma.password.value=="") {alert ("non hai inserito niente");  }
else { ; }
}
</script>

   <script language="JavaScript" type="text/javascript" src="functions.js"></script><script type="text/javascript" src="dojo/dojo.js"></script>
<script language="JavaScript" type="text/javascript">
			dojo.require("dojo.widget.*");
			dojo.require("dojo.io.*");
function clearbox(form){
var txt="loading...";
if (form.username.value=="") alert("wrong user");
if(form.password.value=="") alert("wrong password");
var allora=dojo.byId('docpane') ;
allora.innerHTML=txt;

}

var TimeToFade = 1500.0;
function animateFade(lastTick, eid)
{  
  var curTick = new Date().getTime();
  var elapsedTicks = curTick - lastTick;
  
  var element = document.getElementById(eid);
 
  if(element.FadeTimeLeft <= elapsedTicks)
  {
    element.style.opacity = element.FadeState == 1 ? '1' : '0';
    element.style.filter = 'alpha(opacity = ' 
        + (element.FadeState == 1 ? '100' : '0') + ')';
    element.FadeState = element.FadeState == 1 ? 2 : -2;
    return;
  }
 
  element.FadeTimeLeft -= elapsedTicks;
  var newOpVal = element.FadeTimeLeft/TimeToFade;
  if(element.FadeState == 1)
    newOpVal = 1 - newOpVal;

  element.style.opacity = newOpVal;
  element.style.filter = 'alpha(opacity = ' + (newOpVal*100) + ')';
  
  setTimeout("animateFade(" + curTick + ",'" + eid + "')", 33);
}
function fade(eid)
{

  var element = document.getElementById(eid);
  if(element == null)
    return;
   
  if(element.FadeState == null)
  {
    if(element.style.opacity == null 
        || element.style.opacity == '' 
        || element.style.opacity == '1')
    {
      element.FadeState = 2;
    }
    else
    {
      element.FadeState = -2;
    }
  }
    
  if(element.FadeState == 1 || element.FadeState == -1)
  {
    element.FadeState = element.FadeState == 1 ? -1 : 1;
    element.FadeTimeLeft = TimeToFade - element.FadeTimeLeft;
  }
  else
  {
    element.FadeState = element.FadeState == 2 ? -1 : 1;
    element.FadeTimeLeft = TimeToFade;
    setTimeout("animateFade(" + new Date().getTime() + ",'" + eid + "')", 3);
  }  

}
function cambiaimg(number){

var thediv=document.getElementById('aziende');
var thediv2 =document.getElementById('az_descrip');
fade('aziende');
fade('az_descrip');
switch(number){
case 1:
thediv.innerHTML='<img src="images/tecnolam.jpg"/>'; 
thediv2.innerHTML='doppione';
 break;
case 2:
thediv.innerHTML='<img src="images/SpanSet.gif"/>'; 
thediv2.innerHTML='sicurezza sul lavoro, sollevamento e ancoraggio dei carichi.';
break;
case 3:
thediv.innerHTML='<img src="images/iur.jpg"/>'; 
thediv2.innerHTML='Articoli per la casa';
break;
case 4:
thediv.innerHTML='<img src="images/nes.jpg"/>'; 
thediv2.innerHTML='| Antinfortunistica | Articoli Tecnici | MultiProdotto | MultiSettore';
break;
case 5:
thediv.innerHTML='<img src="images/vibi.jpg"/>'; 
thediv2.innerHTML='Le pompe VOLPI & BOTTOLI sono adatte per la protezione delle piante nei giardini, negli orti, nei frutteti, nei vigneti e per la disinfestazione di ospedali, scuole, abitazioni e stalle. Dal 1991 la Società porta il nome di “VIBI SPRAYERS SRL” e continua la stessa produzione con il marchio “VOLPI & BOTTOLI”.';
break;
case 6:
thediv.innerHTML='<img src="images/tecnolam.jpg"/>'; 
thediv2.innerHTML='Tecnolam Srl produce e commercia articoli realizzati in lamiera. Tecnolam mette a disposizione per tutti i rivenditori, ferramente utensilerie e grossisiti attrezzature e arredi come carrelli portautensili, banchi da lavoro, pannelli porta attrezzi, cassettiere, cassette portattrezzi, armadi spogliatoi, scale telescopiche, ';
break;
case 7:
thediv.innerHTML='<img src="images/mass.jpg"/>'; 
thediv2.innerHTML=' LEGA DI ALLUMINIO, ACCIAIO TEMPRATO, LAMIERA E FORGIATI. ACCESSORI ARMATURE, ACCESSORI PONTEGGI, TENAGLIE, DISCHI DIAMANTATI, ASTE TELESCOPICHE';
break;
case 8:
thediv.innerHTML='<img src="images/biandiz.jpg"/>'; 
thediv2.innerHTML='Produzione e vendita di utensili a mano per i consigli professionali di fissaggio, come cacciavite, cacciaviti, chiavi esagonali, suggerimenti e strumenti di percussione accessori. .';
break;
case 9:
number=1; break;

}
number++;
if (number>9) number=1;

setTimeout(function(){cambiaimg(number)}, 4000);	



}

		</script>
  </head>
  <body onload="cambiaimg(2);">

  <div id="docpane">
                  <div id="loginbox">
  <form method="POST" onsubmit="try{dojoForm2(this)}catch(E){};return false;">
<table>
  <tbody>
    <tr>
      <td>Username<input type="text" name="username" ></td>
      <td rowspan="2"><input type="hidden" name="requestenter" value="qq"><input class="submit" type="submit" value="Entra"></td>
    </tr>
    <tr>
      <td>Password<input type="password" name="password"></td> </form>
    </tr>
  </tbody>
</table>
                              
				

<a id="link1" onclick="javascript:window.location.href ='registra.php'"; >Registra nuovo utente</a></div>
<div id="titolo">Benvenuto su Giliberti Rappresentanze</div>
<br><br><br>
<hr width="50px">
<div class="photodiv">
<IMG src="images/photo1.jpg" width="250" height="250" align="left" border="0">

</div>
<div class="descrizione">
Giliberti Fabio 


</div>

<div id="aziende">
                      
</div>
<div id="az_descrip">
                 
</div>
      
</div>
<div class="final">   Owner : <a  href="mailto:fgiliberti@libero.it">Fabio Giliberti</a> | P.iva: IT05524720728<br>
                   <a href="mail/index.php">Invia un messaggio</a><br>
Created by VAlEssiO Communications
</div>
                      </body>
                      </html>
                      <?php }
else {
?>
<html>
  <head>
    <TITLE>FABIO GILIBERTI</TITLE><script type="text/javascript">
function controlla(forma){
if (forma.username.value=="" || forma.password.value=="") {alert ("non hai inserito niente");  }
else { ; }
}
</script><style>
a, ciao {
color: white;

}
table {
margin: 30px;


}
body {


}
table 	td {
font color: yellow;
}

    </style><script language="JavaScript" type="text/javascript" src="functions.js"></script><script type="text/javascript" src="dojo/dojo.js"></script><script language="JavaScript" type="text/javascript">
			dojo.require("dojo.widget.*");
			dojo.require("dojo.io.*");
function clearbox(form){
var txt="loading...";
if (form.username.value=="") alert("wrong user");
if(form.password.value=="") alert("wrong password");
var allora=dojo.byId('docpane') ;
allora.innerHTML=txt;

}


		</script>
  </head>
  <body >
  <div id="menu_princ"><a onclick="getpage('video_pg.php')">VIDEO</a></div>
    <table cellpadding="0" cellspacing="0">
      <TR >
        <TD background="backtry.png" width="885px" height="100%">
          <table>
            <tbody>
              <tr>
                <td>

                  <div id="docpane">
                    <br>
                    
                    
                  
                    <center>
                      <font color="white" size="6pt" >Benvenuto su Giliberti Rappresentanze<hr width="50px"></center></font>
                      <br>
                      <form method="POST" onsubmit="try{dojoForm2(this)}catch(E){};return false;">
                        <table cellpadding="0" cellspacing="0" border="0">
                          <tr >
                            <td width="30%" class="evidenza" >
                              <font color="yellow">Username</font>
                            </td>
                            <td width="70%">
                              <input type="text" name="username" dojoType="ValidationTextBox"

						required="true" 

						ucfirst="false">
                            </td><td><a target="_blank" href="http://www.masssrl.it"><img src="images/mass.jpg" width="150px"  align="left" border="1"></a></td><td><a target="_blank" href="http://www.bianditz.es"><img src="images/biandiz.jpg" width="200px"  align="left" border="1"></a></td>
                          </tr>
                          <tr>
                            <td  class="evidenza">
                              <font color="yellow">Password</font>
                            </td>
                            <td >
                              <input type="password" name="password" dojoType="ValidationTextBox"
						
						required="true" 

						ucfirst="false">
                            </td><td><a target="_blank" href="http://www.easy-book.eu"><img src="images/nes.jpg" width="100px"  align="left" border="1"></a></td><td><a target="_blank" href="http://www.bonezzi.it"><img src="images/bonezzi.gif" width="100px"  align="left" border="1"></a></td><tr><td></td><td><input type="hidden" name="requestenter" value="qq"><input type="submit" value="Entra"> </form></td><td><a target="_blank" href="http://www.iur.it"><img src="images/iur.jpg" width="100px"  align="left" border="1"></a></td><td><a target="_blank" href="http://www.colortap.it"><img src="images/color.jpg" width="150px"  align="left" border="1"></a></td></tr>
                         </tr>
                         <tr align="right"> <td></td><TD></td><td><a target="_blank" href="http://www.vibisprayers.com"><img src="images/vibi.jpg" width="100px"  align="left" border="1"></a>
</td><td><a target="_blank" href="http://www.tecnolamweb.com"><img src="images/tecnolam.jpg" width="100px"  align="left" border="1"></a></TD>
<td><a target="_blank" href="http://www.spanset.it"><img src="images/SpanSet.gif" width="100px"  align="left" border="1"></a></td> </div></tr>
                        </table>
                        
                     

                      <font color="Red"> Nuovo utente? Registrati <a id="link1"  href="registra.php" >cliccando qui</a></font>
                   <br><br><center><font color="white"> Owner : <a class="whitelink" href="mailto:fgiliberti@libero.it">Fabio Giliberti</a> | P.iva: IT05524720728</font></center>
                   <br><br> <center><a href="mail/index.php">Invia un messaggio da qui</a></center>                    
                      </td>
                                          
                      </tr>
                      </tbody>
                      </table>
                      </TD>
                     
                      </TR>
		      </table>




<center><small><strong>Created by VAlEssiO Communications</strong> </small></center>
                      </body>
                      </html>
                      







<?php
} 
}

                      ?>








