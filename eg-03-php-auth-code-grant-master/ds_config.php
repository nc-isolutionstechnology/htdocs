<?php
// ds_config.py
// 
// DocuSign configuration settings
/*https://account-d.docusign.com/oauth/auth?response_type=code&scope=signature&client_id=70208536-95f1-4816-9bb3-840b16c3f285&state=a39fh23hnf23&redirect_uri=http://localhost/eg-03-php-auth-code-grant/public/index.php?page=ds_callback

http://localhost/eg-03-php-auth-code-grant-master/public/index.php?page=ds_callback&code=eyJ0eXAiOiJNVCIsImFsZyI6IlJTMjU2Iiwia2lkIjoiNjgxODVmZjEtNGU1MS00Y2U5LWFmMWMtNjg5ODEyMjAzMzE3In0.AQsAAAABAAYABwAATD6TvYrXSAgAANjE2r2K10gCAGi1Ww7iyz9MmC7w2AHErzYVAAEAAAAYAAEAAAAFAAAADQAkAAAANzAyMDg1MzYtOTVmMS00ODE2LTliYjMtODQwYjE2YzNmMjg1IgAkAAAANzAyMDg1MzYtOTVmMS00ODE2LTliYjMtODQwYjE2YzNmMjg1MAAATD6TvYrXSBIAAgAAAAsAAABpbnRlcmFjdGl2ZQMAAAB0c3Y3AP78IFrc7EdPqt6lwFJf0oY.Wjq64aYNuZ53wY7TQ4CbIAJxi3i4orjsVTzgA63dQZB_7PDzY7z1U43Nf7TTStqsdyZUGHA5gaikgrP73gNFa5wU-C075BcaI2poTQmjNtTBzzTku6vnroCOXWmRC5Wa7pDTZvrBs5G_LVyjPQmMCQmHiBe7U2bmBmPjoDlTptsaC7m2moS10vdSvow5vgwoaUEISGFGBx__e-QXb3X695_a_I_ut2nRkScxHK4vr6yOW_dRDnMV6C4jafHGZmAtz59XXtwnfloaTxUvssSX5vJZx3D_RnMq0ii7VHYZ3aDVRZt5siwcrQXN6O5czNr6O_AqmUT2torfji_DLAscTg&state=ea594f7d82cb218cee5f872da68f3e99
*/
$DS_CONFIG = [
    'ds_client_id' => '70208536-95f1-4816-9bb3-840b16c3f285', # The app's DocuSign integration key
    'ds_client_secret' => 'af6d56d8-b37a-4653-9f9a-94c41e5f039f', # The app's DocuSign integration key's secret
    'signer_email' => 'nc@isolutionstechnology.com.au',
    'signer_name' => 'NC iST',
    'app_url' => 'http://localhost/eg-03-php-auth-code-grant-master/public', // The url of the application.
    // Ie, the user enters  app_url in their browser to bring up the app's home page
    // Eg http://localhost/eg-03-php-auth-code-grant/public if the app is installed in a
    // development directory that is accessible via web server.
    // NOTE => You must add a Redirect URI of app_url/index.php?page=ds_callback to your Integration Key.
    'authorization_server' => 'https://account-d.docusign.com',
    'session_secret' => 'SESSION_SECRET', // Secret for encrypting session cookie content
    'allow_silent_authentication' => false, // a user can be silently authenticated if they have an // active login session on another tab of the same browser
    'target_account_id' => false, // Set if you want a specific DocuSign AccountId, If false, the user's default account will be used.
    'demo_doc_path' => 'demo_documents',
    'doc_docx' => 'World_Wide_Corp_Battle_Plan_Trafalgar.docx',
    'doc_pdf' =>  'World_Wide_Corp_lorem.pdf',
    // Payment gateway information is optional
    'gateway_account_id' => '{DS_PAYMENT_GATEWAY_ID}',
    'gateway_name' => "stripe",
    'gateway_display_name' => "Stripe",
    'github_example_url' => 'https://github.com/docusign/eg-03-php-auth-code-grant/tree/master/src/',
    'documentation' => false
];
$GLOBALS['DS_CONFIG'] = $DS_CONFIG;