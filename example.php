<?php

/* Send an SMS using ServerClub SMS. You can run this file 3 different ways:
 *
 * 1. Save it as example.php and at the command line, run
 *         php example.php
 *
 * 2. Upload it to a web host and load mywebhost.com/example.php
 *    in a web browser.
 *
 * 3. Download a local server like WAMP, MAMP or XAMPP. Point the web root
 *    directory to the folder containing this file, and load
 *    localhost:8888/example.php in a web browser.
 */


// Step 1: Get the ServerClub SMS API library from https://github.com/ServerClub-Digital/serverclub-sms-api,
// following the instructions to install it with Composer.

require_once 'src/Class_ServerClub_SMS_API.php';
use ServerClubSMS\ServerClubSMSAPI;


// Step 2: set your API_KEY from https://sms.serverclub.digital/sms/api

$api_key = 'YWRtaW46YWRtaW4ucGFzc3dvcmQ=';


// Step 3: Change the from Sender ID below. 
$from = 'Test';

// Step 4: the number we are sending to - Any phone number
$destination = '94771234567';

// Step 5: Replace your Install URL like https://sms.serverclub.digital/sms/api with https://sms.serverclub.digital/
// <sms/api> is mandatory.

$url = 'https://sms.serverclub.digital/sms/api';

// the sms body
$sms = 'test message from ServerClub SMS';

// unicode sms
$unicode = 0; //For Plain Message
$unicode = 1; //For Unicode Message


// Create SMS Body for request
$sms_body = array(
    'api_key' => $api_key,
    'to' => $destination,
    'from' => $from,
    'sms' => $sms,
    'unicode' => $unicode,
);

// Step 6: instantiate a new ServerClub SMS API request
$client = new ServerClubSMSAPI();

// Step 7: Send SMS
$response = $client->send_sms($sms_body, $url);

print_r($response);


// Step 8: Get Response
$response=json_decode($response);

// Display a confirmation message on the screen
echo 'Message: '.$response->message;


//Step 9: Get your inbox
$get_inbox=$client->get_inbox($api_key,$url);

//Step 10: Get your account balance

$check_balance=$client->check_balance($api_key,$url);

