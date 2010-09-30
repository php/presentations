<?php
include 'secrets.inc';
$url = "http://query.yahooapis.com/v1/public/yql?q=";
$q   = "select * from etsy.listings where color='AAAA22' and api_key='$etsy_api_key'";
$env = 'store://datatables.org/alltableswithkeys';
$fmt = "xml";

$x = simplexml_load_file($url.urlencode($q)."&format=$fmt&env=".urlencode($env));

foreach($x->results->results as $l) {
  echo <<<EOB
<a href="{$l->url}>
<img src="{$l->image_url_430xN}" title="{$l->listing_id}: {$l->title}">
</a><br>
EOB;
}
?>
