<?php
$rdf = simplexml_load_file('presentations/slides/php5intro/rss_feed.rdf');
?>
<table border="1" cellspacing="0" cellpadding="0" bordercolor="#0000FF">
<tr>
    <td>
<table border="0" cellspacing="0" cellpadding="4">
<tr>
    <td style="background-color:blue; color:white;">
    <?php echo $rdf->channel->title; ?>
    </td>
</tr>
<?php
foreach ($rdf->channel->item as $item) {
?>
<tr>
    <td>
    <a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
    </td>
</tr>
<?php
}
?>
</table>
    </td>
</tr>
</table>
