<?php

$docusign_username = "nc@isolutionstechnology.com.au'";
$docusign_password = "##DEV1++!!@@";
$docusign_integrator_key = "70208536-95f1-4816-9bb3-840b16c3f285";

$applicant_email = "nitin.isquare@gmail.com";
$applicant_name = "NC";
$applicant_unique_id = "123";

$application_unique_id = "31587";
$application_form_pdf = "./Docs/SignTest1.pdf";

// construct the authentication header:
$header = "<DocuSignCredentials><Username>" . $docusign_username . "</Username><Password>" . $docusign_password . "</Password><IntegratorKey>" . $docusign_integrator_key . "</IntegratorKey></DocuSignCredentials>";

//////////////////////////////////////////////////////////////////////////////////////
// STEP 1 - Login (retrieves baseUrl and accountId)
//////////////////////////////////////////////////////////////////////////////////////
$url = "https://demo.docusign.net/restapi/v2/login_information";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("X-DocuSign-Authentication: $header"));

$json_response = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ( $status != 200 ) {
    echo "error calling webservice, status is:" . $status;
    die();
    //exit(-1);
}

$response = json_decode($json_response, true);
$accountId = $response["loginAccounts"][0]["accountId"];
$baseUrl = $response["loginAccounts"][0]["baseUrl"];
curl_close($curl);

//--- display results
echo "accountId = " . $accountId . "\nbaseUrl = " . $baseUrl . "\n";


//////////////////////////////////////////////////////////////////////////////////////
// STEP 2 - Create an envelope with document
//////////////////////////////////////////////////////////////////////////////////////
$data =
    array (
        "emailSubject" => "DocuSign API - Please sign " . $application_form_pdf,
        "documents" => array(
            array("documentId" => $application_unique_id, "name" => $application_form_pdf)
            ),
        "recipients" => array(
            "signers" => array(
                array(
                    "email" => $applicant_email,
                    "name" => $applicant_name,
                    "clientUserId" => $applicant_unique_id,
                    "recipientId" => $applicant_unique_id,
                    "tabs" => array(
                        "signHereTabs" => array(
                            array(
                                "xPosition" => "100",
                                "yPosition" => "100",
                                "documentId" => $application_unique_id,
                                "pageNumber" => "1"
                            )
                        )
                    )
                )
            )
        )
    , "status" => "sent"
    // , "status" => "created"
);
$data_string = json_encode($data);
$file_contents = file_get_contents($application_form_pdf);

// Create a multi-part request. First the form data, then the file content
$requestBody =
     "\r\n"
    ."\r\n"
    ."--myboundary\r\n"
    ."Content-Type: application/json\r\n"
    ."Content-Disposition: form-data\r\n"
    ."\r\n"
    ."$data_string\r\n"
    ."--myboundary\r\n"
    ."Content-Type:application/pdf\r\n"
    ."Content-Disposition: file; filename=\"$application_form_pdf\"; documentid=".$application_unique_id." \r\n"
    ."\r\n"
    ."$file_contents\r\n"
    ."--myboundary--\r\n"
    ."\r\n";

// Send to the /envelopes end point, which is relative to the baseUrl received above.
$curl = curl_init($baseUrl . "/envelopes" );
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $requestBody);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: multipart/form-data;boundary=myboundary',
    'Content-Length: ' . strlen($requestBody),
    "X-DocuSign-Authentication: $header" )
);
$json_response = curl_exec($curl); // Do it!

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
if ( $status != 201 ) {
    echo "Error calling DocuSign, status is:" . $status . "\nerror text: ";
    print_r($json_response); echo "\n";
    exit(-1);
}

$response = json_decode($json_response, true);
$envelopeId = $response["envelopeId"];

//--- display results
echo "Envelope created! Envelope ID: " . $envelopeId . "\n";

//////////////////////////////////////////////////////////////////////////////////////
// STEP 3 - Get the Embedded Signing View
//////////////////////////////////////////////////////////////////////////////////////
$data = array(
      "returnUrl" => "https://www.docusign.com/devcenter"
    , "authenticationMethod" => "None"
    , "authenticationInstant" => "None"
    , "userId" => $applicant_unique_id
    , "clientUserId" => $applicant_unique_id
    // , "email" => $applicant_email
    // , "userName" => $applicant_name
);

$data_string = json_encode($data);
$curl = curl_init($baseUrl."/envelopes/$envelopeId/views/recipient" );
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string),
    "X-DocuSign-Authentication: $header" )
);

$json_response = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
if ( $status != 201 ) {
    echo "error calling webservice, status is:" . $status . "\nerror text is --> ";
    print_r($json_response); echo "\n";
    exit(-1);
}

$response = json_decode($json_response, true);
$url = $response["url"];

//--- display results
echo "Embedded URL is: \n\n" . $url . "\n\nNavigate to this URL to start the embedded signing view of the envelope\n";

?>