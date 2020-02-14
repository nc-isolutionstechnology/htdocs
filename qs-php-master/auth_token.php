<?php
echo "<pre>";
print_r($_GET);
//print_r($_REQUEST);



$data = array(
	'response_type=code',
	'scope=signature',
	'client_id=70208536-95f1-4816-9bb3-840b16c3f285',
	'state=a39fh23hnf23',
	'redirect_uri='.urlencode('http://localhost/qs-php-master/auth_token.php')
);

echo $api_url = 'https://account-d.docusign.com/oauth/auth?'.implode("&", $data); 

$connection_c = curl_init(); // initializing
curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect
curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, 1 ); // return the result, do not print
$json_return = curl_exec( $connection_c ); // connect and get json data
$responseKeys = json_decode( $json_return , true); // decode and return
echo "<pre>";
print_r($responseKeys);
curl_close( $connection_c ); // close connection

if (isset($_GET["code"])&&!empty($_GET["code"])) {
	

	$dataInput = array(
		'grant_type'=>'authorization_code',
		'authorization_code'=>$_GET["code"],
	);

	/*$options = array(
	    'http' => array(
	        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
	        'method'  => 'POST',
	        'content' => http_build_query($dataInput)
	    )
	);*/

	$header = array("Content-type: application/x-www-form-urlencoded","Authorization: Basic NzAyMDg1MzYtOTVmMS00ODE2LTliYjMtODQwYjE2YzNmMjg1Mzk1NGYwYzAtMmNlOC00ZDE3LTg1M2YtZDZiM2Y3Yzg1ODVm");
	echo $api_url = 'https://account-d.docusign.com/oauth/token'; 
	$connection_c_2 = curl_init(); // initializing
	curl_setopt( $connection_c_2, CURLOPT_URL, $api_url ); // API URL to connect
	curl_setopt( $connection_c_2, CURLOPT_RETURNTRANSFER, 1 ); // return the result, do not print
	curl_setopt( $connection_c_2, CURLOPT_HEADER, $header );
	//curl_setopt( $connection_c_2, CURLOPT_TIMEOUT, 20 );
	curl_setopt( $connection_c_2, CURLOPT_POST, true );
	curl_setopt( $connection_c_2, CURLOPT_POSTFIELDS, $dataInput );
	$json_return_2 = curl_exec( $connection_c_2 ); // connect and get json data
	$responseKeys2 = json_decode( $json_return_2 , true); // decode and return
	echo "<pre>";
	print_r($responseKeys2);
	curl_close( $connection_c_2 ); // close connection
}
/*
https://developers.docusign.com/oauth-token-generator?code=eyJ0eXAiOiJNVCIsImFsZyI6IlJTMjU2Iiwia2lkIjoiNjgxODVmZjEtNGU1MS00Y2U5LWFmMWMtNjg5ODEyMjAzMzE3In0.AQsAAAABAAYABwAAqY43AarXSAgAADUVfwGq10gCAGi1Ww7iyz9MmC7w2AHErzYVAAEAAAAYABMAAAAFAAAAUQAAACsAAABlAAAALQAAAC8AAAAxAAAAMgAAADgAAAAzAAAANQAAAA0AAAAOAAAACwAAAAwAAAARAAAAEgAAAA8AAAAQAAAADQAkAAAAZjBmMjdmMGUtODU3ZC00YTcxLWE0ZGEtMzJjZWNhZTNhOTc4IgAkAAAAZjBmMjdmMGUtODU3ZC00YTcxLWE0ZGEtMzJjZWNhZTNhOTc4NwD-_CBa3OxHT6repcBSX9KGMACA2G79-6nXSBIAAQAAAAMAAAB0c3Y.iPA5j1_Ent2A3rzGtrdukJWwPMJKMhu5cqCUMyzpWfAu97yfWbO04CiatfpGfqqqTp2E8Av-668qv52hxlMXSaMCyXWd7Ueqdn-WHPx8q4SZ3eVmmK67fCzN7lsfN9CldWVb3pFaVY5Ax-msWR2PwpbumI3KAJ7a_jX4K2rNHr0x2oV0BmI-Z9yrSegCag0-lTzTLQ2BHJ51_FO00Tdt6t4VbSJ8d2wL_0ojF8FZURoGlAIu-CEYWm2goxl9bRdeZEvLxjd7r9D-N0GFtF5dZ2OmHRJ5vs5aqCX5gDA92PQh_ZIpHq_RnzjrB_dlitfTLneMK9hmIm8t-RtKHHWdEQ



GET https://account-d.docusign.com/oauth/auth?

   response_type=code

   &scope=signature

   &client_id={CLIENT_ID}

   &state=a39fh23hnf23

   &redirect_uri={REDIRECT_URI}


70208536-95f1-4816-9bb3-840b16c3f2853954f0c0-2ce8-4d17-853f-d6b3f7c8585f


POST https://account-d.docusign.com/oauth/token

Content-Type: application/x-www-form-urlencoded

Authorization: Basic BASE64_COMBINATION_OF_INTEGRATOR_AND_SECRET_KEYS


grant_type=authorization_code&authorization_code=YOUR_AUTHORIZATION_CODE*/

?>