<form onsubmit="dojoForm(this);return false;" method="POST">
<textarea name="notes" rows="5">
inserisci nota
</textarea>
<input type="hidden" name="ordnu" value="<? echo $_GET['prova'];?>"> 
<input type="submit" value="inserisci nota">
</form>