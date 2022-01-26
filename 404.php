<?php


if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
$link = "https";
else $link = "http";

// Here append the common URL characters.
$link .= "://";

// Append the host(domain name, ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL
$link .= $_SERVER['REQUEST_URI'];

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
$refuri = parse_url($_SERVER['HTTP_REFERER']); // use the parse_url() function to create an array containing information about the domain
if($refuri['host'] == "localhost"){

echo $link . ' is currenly broken please connect later or contact marklinsangan@pts-thesis.website';
}
else{
//the link was on another site. $refuri['host'] will return what that site is
}
}
else{
//the visitor typed gibberish into the address bar
echo 'Sorry for the inconvenience but no: "' . $link . '" Addresss exist in our website';
}

phpinfo();
?>