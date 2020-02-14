<?php
include_once 'example_base.php';

class SendEnvelope extends ExampleBase {
    const DEMO_DIR = "demo_documents";
    const DOC_2_DOCX = "World_Wide_Corp_Battle_Plan_Trafalgar.docx";
    const DOC_3_PDF = "World_Wide_Corp_lorem.pdf";

    private static function DOCUMENT_1() {
        $signer_name = DSConfig::signer_name();
        $signer_email = DSConfig::signer_email();
        $cc_name = DSConfig::cc_name();
        $cc_email = DSConfig::cc_email();

        return <<<HTML
        <!DOCTYPE html>
            <html>
                <head>
                  <meta charset='UTF-8'>
                </head>
                <body style='font-family:sans-serif;margin-left:2em;'>
                    <h1 style='font-family: "Trebuchet MS", Helvetica, sans-serif; color: darkblue;margin-bottom: 0;'>World Wide Corp</h1>
                    <h2 style='font-family: "Trebuchet MS", Helvetica, sans-serif; margin-top: 0px;margin-bottom: 3.5em;font-size: 1em; color: darkblue;'>Order Processing Division</h2>
                    <h4>Ordered by {$signer_name}</h4>
                    <p style='margin-top:0em; margin-bottom:0em;'>Email: {$signer_email}</p>
                    <p style='margin-top:0em; margin-bottom:0em;'>Copy to: {$cc_name}, {$cc_email}</p>
                    <p style='margin-top:3em;'> Candy bonbon pastry jujubes lollipop wafer biscuit biscuit. Topping brownie sesame snaps 
                    sweet roll pie. Croissant danish biscuit soufflé caramels jujubes jelly. Dragée danish caramels lemon 
                    drops dragée. Gummi bears cupcake biscuit tiramisu sugar plum pastry. 
                    Dragée gummies applicake pudding liquorice. Donut jujubes oat cake jelly-o. Dessert bear claw chocolate 
                    cake gummies lollipop sugar plum ice cream gummies cheesecake.
                    </p>
                    <!-- Note the anchor tag for the signature field is in white. -->
                    <h3 style='margin-top:3em;'>Agreed: <span style='color:white;'>**signature_1**/</span></h3>
                </body>
            </html>
HTML;
    }

    public function __construct($client) {
        parent::__construct($client);
    }

    public function send() {
        $authenticationMethod = 'None';
        $baseUrl = 'http://localhost/eg-01-php-jwt-master/';
        $this->checkToken();

        # document 1 (html) has sign here anchor tag **signature_1**
        # document 2 (docx) has sign here anchor tag /sn1/
        # document 3 (pdf)  has sign here anchor tag /sn1/
        #
        # The envelope has two recipients.
        # recipient 1 - signer
        # recipient 2 - cc
        # The envelope will be sent first to the signer.
        # After it is signed, a copy is sent to the cc person.
        #
        # create the envelope definition
        $envelope_definition = new \DocuSign\eSign\Model\EnvelopeDefinition([
            'email_subject' => 'Please sign this document set'
        ]);

        $signer_name = DSConfig::signer_name();
        $signer_email = DSConfig::signer_email();
        $cc_name = DSConfig::cc_name();
        $cc_email = DSConfig::cc_email();

        $doc1_b64 = base64_encode(self::DOCUMENT_1());
        # read files 2 and 3 from a local directory
        # The reads could raise an exception if the file is not available!
        $demo_docs_path = getcwd() . '/' . self::DEMO_DIR . '/';
        $content_bytes = file_get_contents($demo_docs_path . self::DOC_2_DOCX);
        $doc2_b64 = base64_encode($content_bytes);
        $content_bytes = file_get_contents($demo_docs_path . self::DOC_3_PDF);
        $doc3_b64 = base64_encode($content_bytes);
        # Create the document models
        $document1 = new \DocuSign\eSign\Model\Document([  # create the DocuSign document object
            'document_base64' => $doc1_b64,
            'name' => 'Order acknowledgement',  # can be different from actual file name
            'file_extension' => 'html',  # many different document types are accepted
            'document_id' => '1'  # a label used to reference the doc
        ]);
        $document2 = new \DocuSign\eSign\Model\Document([  # create the DocuSign document object
            'document_base64' => $doc2_b64,
            'name' => 'Battle Plan',  # can be different from actual file name
            'file_extension' => 'docx',  # many different document types are accepted
            'document_id' => '2'  # a label used to reference the doc
        ]);
        $document3 = new \DocuSign\eSign\Model\Document([  # create the DocuSign document object
            'document_base64' => $doc3_b64,
            'name' => 'Lorem Ipsum',  # can be different from actual file name
            'file_extension' => 'pdf',  # many different document types are accepted
            'document_id' => '3'  # a label used to reference the doc
        ]);
        # The order in the docs array determines the order in the envelope
        /*$envelope_definition = new \DocuSign\eSign\Model\EnvelopeDefinition([
            'email_subject' => "Please sign this document",
            'documents' => [$document1, $document2, $document3], # The order in the docs array determines the order in the envelope
            # The Recipients object wants arrays for each recipient type
            'recipients' => new DocuSign\eSign\Model\Recipients(['signers' => [$signer]]), 
            'status' => "sent" # requests that the envelope be created and sent.
        ]);*/

        $envelope_definition->setDocuments([$document1, $document2, $document3]);
        # Create the signer recipient model
        $signer1 = new \DocuSign\eSign\Model\Signer([
            'email' => $signer_email, 'name' => $signer_name,
            'recipient_id' => "1", 'routing_order' => "1"]);
        # routingOrder (lower means earlier) determines the order of deliveries
        # to the recipients. Parallel routing order is supported by using the
        # same integer as the order for two or more recipients.
        # create a cc recipient to receive a copy of the documents
        


        /*$cc1 = new \DocuSign\eSign\Model\CarbonCopy([
            'email' => $cc_email, 'name' => $cc_name,
            'recipient_id' => "2", 'routing_order' => "2"]);*/



        # Create signHere fields (also known as tabs) on the documents,
        # We're using anchor (autoPlace) positioning
        #
        # The DocuSign platform searches throughout your envelope's
        # documents for matching anchor strings. So the
        # signHere2 tab will be used in both document 2 and 3 since they
        #  use the same anchor string for their "signer 1" tabs.
            # DocuSign SignHere field/tab object
    $signHere = new \DocuSign\eSign\Model\SignHere([ 
        'document_id' => '1', 'page_number' => '1', 'recipient_id' => '1', 
        'tab_label' => 'SignHereTab', 'x_position' => '195', 'y_position' => '147'
    ]);

        /*$sign_here1 = new \DocuSign\eSign\Model\SignHere([
            'anchor_string' => '**signature_1**', 'anchor_units' => 'pixels',
            'anchor_y_offset' => '10', 'anchor_x_offset' => '20']);
        $sign_here2 = new \DocuSign\eSign\Model\SignHere([
            'anchor_string' => '/sn1/', 'anchor_units' =>  'pixels',
            'anchor_y_offset' => '10', 'anchor_x_offset' => '20']);*/
        # Add the tabs model (including the sign_here tabs) to the signer
        # The Tabs object wants arrays of the different field/tab types
        $signer1->setTabs(new \DocuSign\eSign\Model\Tabs(
            ['sign_here_tabs' => [$signHere] ]
        ));
        # Add the recipients to the envelope object
        //$recipients = new \DocuSign\eSign\Model\Recipients(['signers' => [$signer1], 'carbon_copies' => [$cc1]]);
        $recipients = new \DocuSign\eSign\Model\Recipients(['signers' => [$signer1]]);

        $envelope_definition->setRecipients($recipients);
        # Request that the envelope be sent by setting |status| to "sent".
        # To request that the envelope be created as a draft, set to "created"
        $envelope_definition->setStatus("sent");

        $envelopeApi = new DocuSign\eSign\Api\EnvelopesApi(self::$apiClient);
        $results = $envelopeApi->createEnvelope(self::$accountID, $envelope_definition);
        $envelopeId = $results->getEnvelopeId();



        if ($baseUrl == '') {
            # Try to figure out our URL folder
            # NOTE: The following code relies on browser-supplied headers to be correct.
            #       In production, DO NOT use this code since it is not bullet-proof.
            #       Instead, set the $baseUrl appropriately.
            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            # remove the current script name from the $baseUrl:
            $chars = -1 * (strlen(__FILE__) - strlen(__DIR__));
            $baseUrl = substr($baseUrl, 0, $chars);
        }
        //echo $baseUrl."\n<br/>";


        $recipientViewRequest = new \DocuSign\eSign\Model\RecipientViewRequest([
            'authentication_method' => $authenticationMethod, 'client_user_id' => "123",
            'recipient_id' => '1', 'return_url' => $baseUrl ,
            'user_name' => $signer_name, 'email' => $signer_email
        ]);

        $results2 = $envelopeApi->createRecipientView(self::$accountID, $envelopeId, $recipientViewRequest);

        return $results2;
    }
}
