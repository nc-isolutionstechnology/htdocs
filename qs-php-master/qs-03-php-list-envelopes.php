<?php

# PHP Quick start example: list envelopes and their status.
# Copyright (c) 2018 by DocuSign, Inc.
# License: The MIT License -- https://opensource.org/licenses/MIT

require_once('vendor/autoload.php');
require_once('vendor/docusign/esign-client/autoload.php');

function list_envelopes(){
    # Settings
    # Fill in these constants
    #
    # Obtain an OAuth access token from https://developers.docusign.com/oauth-token-generator
    $accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6IjY4MTg1ZmYxLTRlNTEtNGNlOS1hZjFjLTY4OTgxMjIwMzMxNyJ9.eyJUb2tlblR5cGUiOjUsIklzc3VlSW5zdGFudCI6MTU4MDM1NTY1MiwiZXhwIjoxNTgwMzg0NDUyLCJVc2VySWQiOiIwZTViYjU2OC1jYmUyLTRjM2YtOTgyZS1mMGQ4MDFjNGFmMzYiLCJzaXRlaWQiOjEsInNjcCI6WyJzaWduYXR1cmUiLCJjbGljay5tYW5hZ2UiLCJvcmdhbml6YXRpb25fcmVhZCIsInJvb21fZm9ybXMiLCJncm91cF9yZWFkIiwicGVybWlzc2lvbl9yZWFkIiwidXNlcl9yZWFkIiwidXNlcl93cml0ZSIsImFjY291bnRfcmVhZCIsImRvbWFpbl9yZWFkIiwiaWRlbnRpdHlfcHJvdmlkZXJfcmVhZCIsImR0ci5yb29tcy5yZWFkIiwiZHRyLnJvb21zLndyaXRlIiwiZHRyLmRvY3VtZW50cy5yZWFkIiwiZHRyLmRvY3VtZW50cy53cml0ZSIsImR0ci5wcm9maWxlLnJlYWQiLCJkdHIucHJvZmlsZS53cml0ZSIsImR0ci5jb21wYW55LnJlYWQiLCJkdHIuY29tcGFueS53cml0ZSJdLCJhdWQiOiJmMGYyN2YwZS04NTdkLTRhNzEtYTRkYS0zMmNlY2FlM2E5NzgiLCJhenAiOiJmMGYyN2YwZS04NTdkLTRhNzEtYTRkYS0zMmNlY2FlM2E5NzgiLCJpc3MiOiJodHRwczovL2FjY291bnQtZC5kb2N1c2lnbi5jb20vIiwic3ViIjoiMGU1YmI1NjgtY2JlMi00YzNmLTk4MmUtZjBkODAxYzRhZjM2IiwiYXV0aF90aW1lIjoxNTgwMzU1NDAyLCJwd2lkIjoiNWEyMGZjZmUtZWNkYy00ZjQ3LWFhZGUtYTVjMDUyNWZkMjg2In0.byFu342MSQ1RmxjPiRBJRWfdvgKDEPnP7QQztWOlN6Ak4Y_rnkOY5YcmmwhtyWx1hVBcykOd_feYxyvcWQ1Qwz0TygUK8KU8WbP8PKVdw7_seBbBkGJtwSbCIjkhpBrulwoFs9lsL7gPl22DDR2wFAsdFFRhn69ubVGRKVc0f5jhba2wYdw-Zjt_0yabeK08gLIlT3mMszbwvJ6wGxxLrdPXNOc7GZ1uxO8wLMVV9VvwF06OLUgWBD3kAZ51KJXpeZZJlNgb182Mjp2bqnPbeUz7g8ozYXcYb0liUkJ4vGAxT-aoS0przuszDX1XOoNGoGCj0nNG_rOqq0Q8iBFeDg';
    # Obtain your accountId from demo.docusign.com -- the account id is shown in the drop down on the
    # upper right corner of the screen by your picture or the default picture. 
    $accountId = '9690499';

    # The API base_path
    $basePath = 'https://demo.docusign.net/restapi';

    # configure the EnvelopesApi object
    $config = new DocuSign\eSign\Configuration();
    $config->setHost($basePath);
    $config->addDefaultHeader("Authorization", "Bearer " . $accessToken);
    $apiClient = new DocuSign\eSign\Client\ApiClient($config);
    $envelopeApi = new DocuSign\eSign\Api\EnvelopesApi($apiClient);

    #
    # Step 1. Create the options object. We want the envelopes created 10 days ago or more recently.
    #
    $date = new Datetime();
    $date->sub(new DateInterval("P10D"));
    $options = new DocuSign\eSign\Api\EnvelopesApi\ListStatusChangesOptions();
    $options->setFromDate($date->format("Y/m/d"));

    #
    #  Step 2. Request the envelope list.
    #
    $results = $envelopeApi->listStatusChanges($accountId, $options);
    return $results;
};

/*private function worker($args)
    {
        # 1. call API method
        # Exceptions will be caught by the calling function
        $config = new \DocuSign\eSign\Configuration();
        $config->setHost($args['base_path']);
        $config->addDefaultHeader('Authorization', 'Bearer ' . $args['ds_access_token']);
        $api_client = new \DocuSign\eSign\client\ApiClient($config);
        $envelope_api = new \DocuSign\eSign\Api\EnvelopesApi($api_client);
        $document_id = $args['document_id'];
        # An SplFileObject is returned. See http://php.net/manual/en/class.splfileobject.php
        $temp_file = $envelope_api->getDocument($args['account_id'], $document_id, $args['envelope_id']);
        # find the matching document information item
        $doc_item = false;
        foreach ($args['envelope_documents']['documents'] as $item) {
            if ($item['document_id'] == $document_id) {
                $doc_item = $item;
                break;
            }
        }
        $doc_name = $doc_item['name'];
        $has_pdf_suffix = strtoupper(substr($doc_name, -4)) == '.PDF';
        $pdf_file = $has_pdf_suffix;
        # Add ".pdf" if it's a content or summary doc and doesn't already end in .pdf
        if ($doc_item["type"] == "content" || ($doc_item["type"] == "summary" && ! $has_pdf_suffix)) {
            $doc_name .= ".pdf";
            $pdf_file = true;
        }
        # Add .zip as appropriate
        if ($doc_item["type"] == "zip") {
            $doc_name .= ".zip";
        }
        # Return the file information
        if ($pdf_file) {
            $mimetype = 'application/pdf';
        } elseif ($doc_item["type"] == 'zip') {
            $mimetype = 'application/zip';
        } else {
            $mimetype = 'application/octet-stream';
        }
    return ['mimetype' => $mimetype, 'doc_name' => $doc_name, 'data' => $temp_file];
    }*/

# Mainline
try {
    $results = list_envelopes();
    ?>
<html lang="en">
    <body>
        <h4>Results</h4>
        <p><code><pre><?= print_r ($results) ?></pre></code></p>
    </body>
</html>
    <?php
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    if ($e instanceof DocuSign\eSign\Client\ApiException) {
        print ("\nDocuSign API error information: \n");
        var_dump ($e->getResponseBody());
    }
}
