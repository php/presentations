<?php
$ch = curl_init("http://localhost/presservice.php?id=20");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$user = simplexml_load_string(curl_exec($ch));
?>
<table>
<tr>
<td colspan="2" align="center">Information about <?=$user->name->last?>, <?=$user->name->first?></td>
</tr>
<tr>
<td>User ID</td>
<td>Description</td>
</tr>
<tr>
<td><?=$user->id?></td>
<td><?=$user->description?></td>
</tr>
</table>
