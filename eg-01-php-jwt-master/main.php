<?php
    ini_set('display_errors', '1'); 
    ini_set('max_execution_time', 300); 

    echo "<pre>";
    //https://account-d.docusign.com/oauth/auth?response_type=code&scope=signature%20impersonation&client_id=70208536-95f1-4816-9bb3-840b16c3f285&redirect_uri=http://localhost/eg-03-php-auth-code-grant/public/index.php?page=ds_callback

    require_once('vendor/autoload.php');
    require_once('vendor/docusign/esign-client/autoload.php');
    include_once 'ds_config.php';
    include_once 'lib/example_base.php';
    include_once 'lib/send_envelope.php';
    include_once 'lib/list_envelopes.php';

    $basePath = 'https://demo.docusign.net/restapi';
    //ini_set('display_errors', '1');  
    $config = new DocuSign\eSign\Configuration();
    $config->setHost($basePath);
    $apiClient = new DocuSign\eSign\ApiClient($config);

    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    
    //     try {
    //         print("\nSending an envelope...\n");
    //         $sendHandler = new SendEnvelope($apiClient);
    //         $result = $sendHandler->send();

    //         //printf("\nEnvelope status: %s. Envelope ID: %s\n", $result->getStatus(), $result->getEnvelopeId());
        
    //         print_r($result);
    //         print("\n<br>");
    //         # Redirect...
    //         header('Location: ' . $results['url']);
    //     } catch (Exception $e) {
    //         echo 'Caught exception: ',  $e->getMessage(), "\n";
    //         if ($e instanceof DocuSign\eSign\Client\ApiException) {
    //             print ("\nDocuSign API error information: \n");
    //             var_dump ($e->getResponseBody());
    //         }
    //     }    
    //     die();
    // }
    
    try {
        /*print("\nSending an envelope...\n");
        $sendHandler = new SendEnvelope($apiClient);
        $result = $sendHandler->send();

        //printf("\nEnvelope status: %s. Envelope ID: %s\n", $result->getStatus(), $result->getEnvelopeId());
    
        print_r($result);
        print("\n<br>");*/

        print("\nList envelopes in the account...");
        //print("\n<br>");

        $listEnvelopesHandler= new ListEnvelopes($apiClient);
        $envelopesList = $listEnvelopesHandler->listEnvelopes();
        $envelopes = $envelopesList->getEnvelopes();

        if(!is_null($envelopesList)  && count($envelopes) > 2) {
            printf("\nResults for %d envelopes were returned :\n", count($envelopes));
            //print("\n<br>");
            $envelopes_array = array();
            if (count($envelopes)) {
                foreach ($envelopes as $key => $value) {
                    $envelopes_array[]=$envelopes[$key];
                }
            }
            $envelopesList->setEnvelopes($envelopes_array);
        } else {
            printf("\nResults for %d envelopes were returned:\n", count($envelopes));
            //print("\n<br>");
        }
        # $envelopesList is an object that implements ArrayAccess. Convert to a regular array:
        $results = json_decode((string)$envelopesList, true);
        # pretty print it:
        print_r($results);
        //print (json_encode($results, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    } catch (Exception $e) {
        print ("\n\nException!\n");
        //print("\n<br>");
        print ($e->getMessage());

        if ($e instanceof DocuSign\eSign\ApiException) {
            print ("\nAPI error information: \n");
            //print("\n<br>");
            print ($e->getResponseObject());

        }


    }

    print("\nDone.\n");
    //print("\n<br>");

?>
<html lang="en">
    <body>
        <form method="post">
            <input type="submit" value="Sign the document!"
                style="width:13em;height:2em;background:#1f32bb;color:white;font:bold 1.5em arial;margin: 3em;"/>
        </form>
    </body>
</html>