<h1><?=$title?></h1>
<form><select>
<?foreach ($users as $option) {?>
<option <?=($option == $user) ? 'selected' : ''?>><?=$option?></option>
<?}?>
</select></form>
