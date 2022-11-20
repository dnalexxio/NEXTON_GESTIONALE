<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

	<head>

	

		<title>AJAX</title>


		<script language="JavaScript" type="text/javascript" src="./includes/xpath.js"></script>

		<script language="JavaScript" type="text/javascript" src="./includes/SpryData.js"></script>
		
		


		<script type="text/javascript" src="dojo/dojo.js"></script>

		<script language="JavaScript" type="text/javascript">
		

			dojo.require("dojo.widget.ComboBox");
			dojo.require("dojo.widget.Wizard");
			dojo.require("dojo.io.*");
			dojo.hostenv.writeIncludes();
		</script>



	
		<script language="JavaScript" type="text/javascript" src="functions.js"></script>


		<style>

		p {
		font-size: 25px;
}

			.dojoDialog {
				


				background : white;

				border : 1px solid #999;

				-moz-border-radius : 5px;

				padding : 4px;

				text-align: center;
				

				}



			.evidenza {
				font-size: 25px;
				color: orange;

				}

		</style>

	</head>

	

	<body bgcolor="#FF99FF">
<a href="index.php">HOME PAGE</a>
		


		

		

		<form onsubmit="dojoForm(this);return false;"  method="POST">
<div id="divdestra">

	<h1>Inserimento di nuovi prodotti</h1>
<div id="docpane" style="font-size: 15px;">
	<div id="wizard1" dojoType="WizardContainer"

      		style="width: 100%; height: 200px;"

	        nextButtonLabel="Avanti >>"

	        previousButtonLabel="<< Indietro"

		doneButtonLabel="Fatto"

	        >

	      

		<div dojoType="WizardPane" label="Tab 1" passFunction="checkInsProdotto1">

			<font face="Tahoma" color="black" size="3"><b>Dati del prodotto</b></font>

		<br>

		<p>Inserisci i dati del nuovo prodotto</p>

		<br><br>

		<table>

			<tr>

				<td width="30%" class="evidenza">Codice prodotto</td>

				<td width="70%"><input type="text" name="code"

						dojoType="ValidationTextBox"

						required="true" 

						ucfirst="false" onkeyup="javascript:c1=1" />

				</td>

			</tr>

			<tr>

				<td width="30%" class="evidenza">Nome</td>

				<td width="70%"><input type="text" name="name"

						dojoType="ValidationTextBox"

						required="true" 

						ucfirst="false" onkeyup="javascript:c2=1" />

				</td>

			</tr>

			<tr>

				<td width="30%" class="evidenza">Categoria</td>

				<td width="70%">

						<select onkeyup="javascript:cc1=1" dojoType="ComboBox" value="this should never be seen - it is replaced!" dataUrl="file_xml/categories.js.php" style="width: 140px;" name="category" maxListLength="15" >

						</select>

				</td>

			</tr>

		</table>

		</div>	

		<div dojoType="WizardPane" passFunction="checkInsProdotto2">

			<font face="Tahoma" color="black" size="3"><b>Dati del prodotto</b></font>

			<br>

			<p>Inserisci i dettagli del nuovo prodotto</p>

			<br><br>

			<table>

		<!--	<tr>

				<td width="30%" class="evidenza">Colore</td>

				<td width="70%"><input type="text" name="color"

						dojoType="ValidationTextBox"

						required="true" 

						ucfirst="false" onkeyup="javascript:c3=1" />

				</td>

			</tr>-->

			<tr>

				<td width="30%" class="evidenza">Quantita'</td>

				<td width="70%"><input type="text" name="quantity"

						dojoType="ValidationTextBox"

						required="true" 

						ucfirst="false" onkeyup="javascript:c4=1" />

				</td>

			</tr>

			<tr>

				<td width="30%" class="evidenza">Prezzo</td>

				<td width="70%"><input type="text" name="price"

						dojoType="ValidationTextBox"

						required="true" 

						ucfirst="false" onkeyup="javascript:c5=1" />

				</td>

			</tr>

		<!--	<tr>

				<td width="30%" class="evidenza">Descrizione</td>

				<td width="70%"><input type="text" name="desc" 

						dojoType="ValidationTextBox"

						required="true" 

						ucfirst="false" onkeyup="javascript:c6=1" />

				</td>

			</tr>-->

		</table>

		</div>

		<div dojoType="WizardPane" passFunction="checkInsProdotto4">

			<font face="Tahoma" color="black" size="3"><b>Dati del prodotto</b></font>

		<br>

		<p>Informazioni nuovo prodotto</p>

		<br><br>

		<table>

			<tr>

				<td width="30%" class="evidenza">Magazzino</td>

				<td width="70%"><select onkeyup="javascript:c8=1" dojoType="ComboBox" value="this should never be seen - it is replaced!" dataUrl="file_js/magazzini.js" style="width: 140px;" name="store" maxListLength="15" >

						</select>
				<input type="hidden" name="insertprod" value="1"><input type="submit">

				</td>

			</tr>

		</table>

		</div>

		

	</div>	

</div>
</form>
</div>

	</body>
</html>


