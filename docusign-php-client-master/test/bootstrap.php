<?php

require_once dirname(__FILE__). '/../vendor/autoload.php';
//require_once __DIR__ . '/TestConfig.php';

// Input your info here:
$integratorKey = '70208536-95f1-4816-9bb3-840b16c3f285';
$email = 'nc@isolutionstechnology.com.au';
$password = '##DEV1++!!@@';

$recipient_email = 'nitin.isquare@gmail.com';
$name = 'NC';
$document_name = './Docs/SignTest1.pdf';

// construct the authentication header:
$header = "<DocuSignCredentials><Username>" . $email . "</Username><Password>" . $password . "</Password><IntegratorKey>" . $integratorKey . "</IntegratorKey></DocuSignCredentials>";

/////////////////////////////////////////////////////////////////////////////////////////////////
// STEP 1 - Login (to retrieve baseUrl and accountId)
/////////////////////////////////////////////////////////////////////////////////////////////////
$url = "https://demo.docusign.net/restapi/v2/login_information";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("X-DocuSign-Authentication: $header"));

$json_response = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ( $status != 200 ) {
	echo "error calling webservice, status is:" . $status. "\n<br>";
	exit(-1);
}

$response = json_decode($json_response, true);
//$accountId = $response["loginAccounts"][0]["accountId"];
$accountId = "";
//$baseUrl = $response["loginAccounts"][0]["baseUrl"];
$baseUrl = "https://demo.docusign.net/restapi/v2/accounts/9690499";
curl_close($curl);

//--- display results
echo "\naccountId = " . $accountId . "\nbaseUrl = " . $baseUrl . "\n<br>";

/////////////////////////////////////////////////////////////////////////////////////////////////
// STEP 2 - Create an envelope with one recipient, one tab, one document and send!
/////////////////////////////////////////////////////////////////////////////////////////////////
$data = "{
  \"emailBlurb\":\"This comes from PHP\",
  \"emailSubject\":\"DocuSign API - Please Sign This Document...\",
  \"documents\":[
    {
      \"documentId\":\"1\",
      \"name\":\"".$document_name."\"
    }
  ],
  \"recipients\":{
    \"signers\":[
      {
        \"email\":\"$recipient_email\",
        \"name\":\"$name\",
        \"recipientId\":\"1\",
        \"tabs\":{
          \"signHereTabs\":[
            {
              \"anchorString\":\"Signature:\",
              \"anchorXOffset\":\"0\",
              \"anchorYOffset\":\"0\",
              \"documentId\":\"1\",
              \"pageNumber\":\"1\"
            }
          ]
        }
      }
    ]
  },
  \"status\":\"sent\"
}";  

$file_contents = file_get_contents($document_name);

$requestBody = "\r\n"
."\r\n"
."--myboundary\r\n"
."Content-Type: application/json\r\n"
."Content-Disposition: form-data\r\n"
."\r\n"
."$data\r\n"
."--myboundary\r\n"
."Content-Type:application/pdf\r\n"
."Content-Disposition: file; filename=\"SignTest1.pdf\"; documentid=1 \r\n"
."\r\n"
."$file_contents\r\n"
."--myboundary--\r\n"
."\r\n";

// *** append "/envelopes" to baseUrl and as signature request endpoint
$curl = curl_init($baseUrl . "/envelopes" );
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $requestBody);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
	'Content-Type: multipart/form-data;boundary=myboundary',
	'Content-Length: ' . strlen($requestBody),
	"X-DocuSign-Authentication: $header" )
);

$json_response = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
if ( $status != 201 ) {
	echo "error calling webservice, status is:" . $status . "\nerror text is --> ";
	print_r($json_response); echo "\n<br>";
	exit(-1);
}

$response = json_decode($json_response, true);
$envelopeId = $response["envelopeId"];

//--- display results
echo "Document is sent! Envelope ID = " . $envelopeId . "\n\n"; 
