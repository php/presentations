<?php
$ch = curl_init(); // init cURL

// going to make POST request
curl_setopt($ch, CURLOPT_POST,1); 

// specify data to send via POST
curl_setopt($ch, CURLOPT_POSTFIELDS, "name=>'/// / <&email=>'/// / <@foobar.com");

// send cookie
curl_setopt($ch, CURLOPT_COOKIE, "LAST_LANG=en; COUNTRY=CAN%2C24.100.195.79");

// specify the desitination URL
curl_setopt($ch, CURLOPT_URL, "http://localhost/register.php");

// 'Fake' a browser
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; Konqueror/3.1; en_US, POSIX) (KHTML, like Gecko)");

// Return data in a form of a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                         
// make request and retrieve data into $result
$result = curl_exec($ch);

curl_close($ch); // free resources
?>