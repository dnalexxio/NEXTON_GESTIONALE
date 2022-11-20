
<!DOCTYPE HTML>
<head>
<link href="css/style_mobile.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 0px) and (max-width: 320px)" >
    <link href="css/style_tablet.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 321px) and (max-width: 768px)" >
    <link href="css/style_desktop.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 769px)" >
    <TITLE>FABIO GILIBERTI</TITLE>

			<style>

		p {
		font-size: 15px;
}
</style>

<script language="JavaScript" type="text/javascript" src="./includes/xpath.js"></script>
<script language="JavaScript" type="text/javascript" src="./includes/SpryData.js"></script>
<script language="JavaScript" type="text/javascript" src="./includes/SpryEffects.js"></script>


	<script type="text/javascript" src="dojo/dojo.js"></script>
	<script type="text/javascript">
		dojo.require("dojo.widget.LinkPane");
			dojo.require("dojo.widget.ContentPane");
			dojo.require("dojo.widget.LayoutContainer");
			dojo.require("dojo.widget.Wizard");
		dojo.hostenv.writeIncludes();
</script>
		<script language="JavaScript" type="text/javascript" src="file_js/controllodatianagrafica.js"></script>

		<script language="JavaScript" type="text/javascript" src="file_js/controllodatirecupero.js"></script>

		<script language="JavaScript" type="text/javascript" src="file_js/controllodatiassistenza.js"></script>

		<script language="JavaScript" type="text/javascript" src="file_js/controllodaticategorie.js"></script>

		<script language="JavaScript" type="text/javascript" src="file_js/controllodatiinserimentoprodotto.js"></script>

		<script language="JavaScript" type="text/javascript" src="file_js/controllodatispedizione.js"></script>

		<script language="JavaScript" type="text/javascript" src="file_js/controllodatimagazzino.js"></script>

		<script language="JavaScript" type="text/javascript" src="functions.js"></script>
</head>
<body>
<div id="titolo">Benvenuto su Giliberti Rappresentanze</div>
<h1>Registrazione</h1>      <div align="right"><a href="index.php">Torna all'inizio</a></div>
<?php
session_start();
if (isset($_SESSION['logged'])) { echo "<h2>Impossibile procedere {$_SESSION['logged']} </h2>"; die(".");}
else ?>
<div id="docpane2">
<form method="POST" onsubmit=";try{dojoForm(this)}catch(E){};return false;" id="registrescion">

	

	<div id="wizard1" dojoType="WizardContainer"

      		style="width: 100%; height: 200px;"

	        nextButtonLabel="Avanti >>"

	        previousButtonLabel="<< Indietro"

		doneButtonLabel="Fatto"

	        >

	      

		<div dojoType="WizardPane" label="Tab 1" >

			<font face="Tahoma" size="4" color="black"><b>Anagrafica (1/4)</b></font>

			<br><br>

			<table id="tab_registrazione">

				<tr>

					<td class="evidenza">Nome</td>

					<td><input type="text" name="nome"

						dojoType="ValidationTextBox"

						required="true" 

						ucfirst="true" onkeyup="javascript:f1=2" />

					</td>

				</tr>

				<tr>

					<td class="evidenza">Cognome</td>

					<td><input type="text" name="cognome"

						dojoType="ValidationTextBox"

						required="true" 

						 onkeyup="javascript:f2=1" />

					</td>

				</tr>

				<tr>

					<td class="evidenza">Luogo di Nascita</td>

					<td>

						<input type="text" name="luogonascita"

							dojoType="ValidationTextBox"

							required="true" 

							ucfirst="true" onkeyup="javascript:f3=1" />

					</td>

				</tr>

				<tr>

					<td class="evidenza">Cap</td>

					<td>    

						<input type="text" name="cap" dojoType="ValidationTextBox"

							required="true" 

							ucfirst="true">

						

					</td>	

				</tr>

				
				<tr>

					<td class="evidenza">Codice Fiscale / P. IVA</td>

					<td><input type="text" name="codicefiscale"

						dojoType="ValidationTextBox"

						required="true" 

						ucfirst="false" onkeyup="javascript:f4=1" />

					</td>

				</tr>

				<tr>

					<td class="evidenza">Indirizzo di residenza</td>

					<td><input type="text" name="indirizzo"

						dojoType="ValidationTextBox"

						required="true" 

						ucfirst="true" onkeyup="javascript:f5=2" />

					</td>

				</tr>

				<tr>

					<td class="evidenza">Citta'</td>

					<td><input type="text" name="citta"

						dojoType="ValidationTextBox"

						required="true" 

						ucfirst="true" onkeyup="javascript:f6=1" />

					</td>

				</tr>

				<tr>

					<td class="evidenza">Provincia</td>

					<td>

						<select onkeypress="javascript:f20=1" dojoType="ComboBox" value="this should never be seen - it is replaced!" dataUrl="file_js/provincie.js" style="width: 140px;" name="provincia" maxListLength="15">

						</select>

					</td>

				</tr>

				<tr>

					<td class="evidenza">Num FAX</td>

					<td><input type="text" size="20" name="stato" dojoType="ValidationTextBox"

						required="true" 

						ucfirst="false" onkeyup="javascript:f7=2" />

					</td>

				</tr>

				<tr>

					<td class="evidenza">Telefono</td>

					<td><input type="text" size="20" name="telefono" dojoType="UsPhoneNumberTextbox"

						required="true" 

						ucfirst="false" onkeyup="javascript:f8=1" />

					</td>

				</tr>	

				<tr>

					<td class="evidenza">Cellulare</td>

					<td><input type="text" name="cellulare" 

						dojoType="UsPhoneNumberTextbox"

						required="true" 

						ucfirst="false" onkeyup="javascript:f9=1" />

					</td>

				</tr>	

				<tr>

					<td class="evidenza">Indirizzo email</td>

					<td><input type="text" name="email"

						dojoType="EmailTextbox"

						required="true" 

						ucfirst="false" onkeyup="javascript:f10=1" />

					</td>

				</tr>

			</table>	

		</div>	

		<div dojoType="WizardPane" >

			<font face="Tahoma" size="4" color="black"><b>Dati di spedizione  (2/4)</b></font>

			<br><br>

			<table id="tab_registrazione2">

				<tr>

					<td class="evidenza">Indirizzo di spedizione</td>

					<td><input type="text" name="indspedizione"

						dojoType="ValidationTextBox"

						required="true" 

						ucfirst="true" onkeyup="javascript:f11=2" />

					</td>

				</tr>

				<tr>

					<td class="evidenza">Citta'</td>

					<td><input type="text" name="cittaspedizione"

						dojoType="ValidationTextBox"

						required="true" 

						ucfirst="true" onkeyup="javascript:f12=1" />

					</td>

				</tr>

				<tr>

					<td class="evidenza">Provincia</td>

					<td>

						<select onkeypress="javascript:f21=1" dojoType="ComboBox" value="this should never be seen - it is replaced!" dataUrl="file_js/provincie.js" style="width: 140px;" name="foo.bar2" maxListLength="15">

						</select>

					</td>

				</tr>

				<tr>

					<td class="evidenza">Stato</td>

					<td><input type="text" size="20" name="statospedizione" dojoType="ValidationTextBox"

						required="true" 

						ucfirst="true" onkeyup="javascript:f13=1" />

					</td>

				</tr>

			</table>

		</div>

		<div dojoType="WizardPane" id="divtre">

			<font face="Tahoma" size="4" color="black"><b>Dati di pagamento  (3/4)</b></font>

			<br><br>

			<p>Scegli il metodo di pagamento</p>

			<br><br>
			IBAN:
			<input type="text" size="27" name="IBAN"  dojoType="RegexpTextbox" 
			regexpr="/^[a-zA-Z]{2}\d{2}[a-zA-Z]\d{22}$/"
						required="true" 

						ucfirst="true" onkeyup="javascript:f13=1" />

			<br>

			<div id="targetDivQui">

			</div>

		</div>

		<div dojoType="WizardPane" >

			<font face="Tahoma" size="4" color="black"><b>Dati di Login  (4/4)</b></font>

			<br><br>

			<p>Scegli le tue chiavi di accesso</p>

			<br><br>

			<table id="tab_registrazione3">

				<tr>

					<td class="evidenza">Username</td>

					<td><input type="text" size="20" name="username" dojoType="ValidationTextBox"

						aaa

						ucfirst="false" onkeyup="javascript:f14=1" />

					</td>

				</tr>	

				<tr>

					<td class="evidenza">Password</td>

					<td><input type="password" size="20" name="passwd" dojoType="ValidationTextBox"

						required="true" 

						ucfirst="false" onkeyup="javascript:f15=1" />

					</td>

				</tr>	

				<tr>

					<td class="evidenza">Domanda segreta</td>

					<td><input type="text" size="20" name="domandasegreta" dojoType="ValidationTextBox"

						required="true" 

						ucfirst="true" onkeyup="javascript:f16=1" />

					</td>

				</tr>	

				<tr>

					<td class="evidenza">Risposta</td>

					<td><input type="text" size="20" name="rispostasegreta" dojoType="ValidationTextBox"

						required="true" 

						ucfirst="true" onkeyup="javascript:f17=1" />

					</td>

				</tr>
				<tr>

<td class="evidenza">Codice Controllo</td>
				<td>


<input type="text" size="20" name="codice_controllo" dojoType="ValidationTextBox"

						required="true" 

						ucfirst="true" onkeyup="javascript:f16=1" />

					</td><td class="evidenza">Questo codice ti verrà riferito direttamente dall'agente</td>
				</tr>

	<tr><br><TD align="right"><input type="hidden" name="registra" value="1"></TD></tr>
<input type="submit"  class="submit">
</form>
			</table>

		</div>

		

	</div>	

</div>

</body>
</html>