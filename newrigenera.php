<form method="POST" onsubmit="dojoForm(this);return false;">
<input type="hidden" name="regex" value=<?php echo $_GET['trip'];?>>
<input type="submit" value="RIGENERA QUESTO ORDINE">
</form>
<input type="button" value="ESPORTA QUESTO ORDINE" name="export" onclick="javascript:window.open('newrequest.php?ordersend=<?php echo $_GET['trip'];?>','_self')">


