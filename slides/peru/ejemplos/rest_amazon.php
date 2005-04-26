<?php
  define('AWS_ID', 'ABCFOOBARXYZ13579'); 

  $keywords = 'PHP';
  $aws_call = 'http://webservices.amazon.com/onca/xml'
             .'?Service=AWSECommerceService'
             .'&SubscriptionId='.AWS_ID.'&Operation=ItemSearch'
             .'&Keywords='.$keywords.'&SearchIndex=Books&Sort=salesrank';
  $results = file_get_contents($aws_call);

  $xml = simplexml_load_string($results);
  $re = '/[\n ]+/';
  foreach ($xml->Items->Item as $item) {
      $title = trim(preg_replace($re,' ', $item->ItemAttributes->Title));
      $author = $item->ItemAttributes->Author;
      $asin = $item->ASIN;
      echo "* '$title',\n   $author (ASIN: $asin)\n";
  }
?>
