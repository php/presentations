  1 : <?php
  2 :   define('AWS_ID', 'ABCFOOBARXYZ13579'); 
  3 : 
  4 :   $keywords = 'PHP';
  5 :   $aws_call = 'http://webservices.amazon.com/onca/xml'
  6 :              .'?Service=AWSECommerceService'
  7 :              .'&SubscriptionId='.AWS_ID.'&Operation=ItemSearch'
  8 :              .'&Keywords='.$keywords.'&SearchIndex=Books&Sort=salesrank';
  9 :   $results = file_get_contents($aws_call);
 10 : 
 11 :   $xml = simplexml_load_string($results);
 12 :   $re = '/[\n ]+/';
 13 :   foreach ($xml->Items->Item as $item) {
 14 :       $title = trim(preg_replace($re,' ', $item->ItemAttributes->Title));
 15 :       $author = $item->ItemAttributes->Author;
 16 :       $asin = $item->ASIN;
 17 :       echo "* '$title',\n   $author (ASIN: $asin)\n";
 18 :   }
 19 : ?>
