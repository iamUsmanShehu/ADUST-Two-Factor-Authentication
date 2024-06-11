<?php

  $email = "iamusmanshehu@gmail.com";
  $password = "Chemistry@090";
  $message = "To Test OTP API";
  $sender_name = "ADUSTECH";
  $recipients = "09160163113";
  $forcednd = 1;

  $data = array("email" => $email, "password" => $password,"message"=>$message, "sender_name"=>$sender_name,"recipients"=>$recipients,"forcednd"=>$forcednd);
  $data_string = json_encode($data);
  $ch = curl_init('https://api.bulksmslive.com/v2/app/sms');
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
  $result = curl_exec($ch);
  $res_array = json_decode($result);
  print_r($res_array);

// use Infobip\Configuration;
// use Infobip\Api\SmsApi;
// use Infobip\Model\SmsDestination;
// use Infobip\Model\SmsTextualMessage;
// use Infobip\Model\SmsAdvancedTextualRequest;

// require __DIR__ . "/vendor/autoload.php";


// $message = "Your one-time password (OTP) is: 09034";
// $phoneNumber = "+2349040306788";

// $apiURL = "l3jel2.api.infobip.com";
// $apiKey = "7e16338fcd40f7677d74358bb0b0ea4c-31d0f569-e7cf-4370-b2cd-4a9c24f789ff";


// $configuration = new Configuration(host: $apiURL, apiKey: $apiKey);
// $api = new SmsApi(config: $configuration);

// $destinations = new SmsDestination(to: $phoneNumber);

// $theMessage = new SmsTextualMessage(
//     destinations: [$destinations],
//     text: $message,
//     from: "ADUSTECH"
// );

// $request = new SmsAdvancedTextualRequest(messages:[$theMessage]);
// $response = $api -> sendSmsMessage($request);

// require_once 'HTTP/Request2.php';
// $request = new HTTP_Request2();
// $request->setUrl('https://l3jel2.api.infobip.com/sms/2/text/advanced');
// $request->setMethod(HTTP_Request2::METHOD_POST);
// $request->setConfig(array(
//     'follow_redirects' => TRUE
// ));
// $request->setHeader(array(
//     'Authorization' => 'App 7e16338fcd40f7677d74358bb0b0ea4c-31d0f569-e7cf-4370-b2cd-4a9c24f789ff',
//     'Content-Type' => 'application/json',
//     'Accept' => 'application/json'
// ));
// $request->setBody('{"messages":[{"destinations":[{"to":"2349040306788"}],"from":"ServiceSMS","text":"Hello,\\n\\nThis is a test message from Infobip. Have a nice day!"}]}');
// try {
//     $response = $request->send();
//     if ($response->getStatus() == 200) {
//         echo $response->getBody();
//     }
//     else {
//         echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
//         $response->getReasonPhrase();
//     }
// }
// catch(HTTP_Request2_Exception $e) {
//     echo 'Error: ' . $e->getMessage();
// }