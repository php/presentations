<form action="" method="get">
data: <input type="text" name="data" maxlength="64" size="64"/>
<table>
<?php foreach( $flags as $flagName ) {
echo "<tr><td>$flagName</td><td><input type='checkbox' name='$flagName'/></td></tr>";
} ?>
</table>
<input type="submit"/>
</form>
