<?php
include 'includes/connection.php';

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Retrieve user data from the database
$sql = "SELECT * FROM students WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    // Verify password
    if ($row && password_verify($password, $row['password'])) {
        $otp = rand(100000, 999999);
        $otp_expire_time = date("Y-m-d H:i:s", strtotime("+3 minute"));

        $_SESSION['student_id'] = $row['id'];
        $_SESSION['student_email'] = $row['email'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['surname'] = $row['surname'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['otp'] = ['otp' => $otp];


          $email = "iamusmanshehu@gmail.com";
          $password = "Chemistry@090";
          $message = "Your one-time password (OTP) is: " . $otp;
          $sender_name = "ADUSTECH";
          $recipients = $_SESSION['phone'];
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
          // var_dump($email);

        $otp_sql = "UPDATE students SET otp='$otp', otp_exp='$otp_expire_time' WHERE id=".$_SESSION['student_id'];
        $result= mysqli_query($conn, $otp_sql);

        // $_SESSION['temp_user'] = ['id' => $result['id'], 'otp' => $otp];

        header("Location: verify.php");
        // header("Location: dashboard.php");
    } else {
        // Password is incorrect
        echo "Invalid password";
    }
} else {
    // User not found
    echo "User not found";
}

$conn->close();

// include 'includes/connection.php';

// use Infobip\Configuration;
// use Infobip\Api\SmsApi;
// use Infobip\Model\SmsDestination;
// use Infobip\Model\SmsTextualMessage;
// use Infobip\Model\SmsAdvancedTextualRequest;

// require __DIR__ . "/vendor/autoload.php";


// // Get form data
// $email = $_POST['email'];
// $password = $_POST['password'];

// // Retrieve user data from the database
// $sql = "SELECT * FROM students WHERE email='$email'";
// $result = $conn->query($sql);

// if ($result->num_rows == 1) {
//     $row = $result->fetch_assoc();
//     // Verify password
//     if ($row && password_verify($password, $row['password'])) {
//         $otp = rand(100000, 999999);
//         $otp_expire_time = date("Y-m-d H:i:s", strtotime("+3 minute"));

//         $_SESSION['student_id'] = $row['id'];
//         $_SESSION['user_email'] = $row['email'];
//         $_SESSION['first_name'] = $row['first_name'];
//         $_SESSION['surname'] = $row['surname'];
//         $_SESSION['phone'] = $row['phone'];
//         $_SESSION['otp'] = ['otp' => $otp];

//         $message = "Your one-time password (OTP) is: " . $otp;
//         $phoneNumber = $_SESSION['phone'];

//         $apiURL = "l3jel2.api.infobip.com";
//         $apiKey = "7e16338fcd40f7677d74358bb0b0ea4c-31d0f569-e7cf-4370-b2cd-4a9c24f789ff";


//         $configuration = new Configuration(host: $apiURL, apiKey: $apiKey);
//         $api = new SmsApi(config: $configuration);

//         $destinations = new SmsDestination(to: $phoneNumber);

//         $theMessage = new SmsTextualMessage(
//             destinations: [$destinations],
//             text: $message,
//             from: "ADUST-TECH"
//         );

//         $request = new SmsAdvancedTextualRequest(messages:[$theMessage]);
//         $response = $api -> sendSmsMessage($request);

//         $otp_sql = "UPDATE students SET otp='$otp', otp_exp='$otp_expire_time' WHERE id=".$_SESSION['student_id'];
//         $result= mysqli_query($conn, $otp_sql);

//         // $_SESSION['temp_user'] = ['id' => $result['id'], 'otp' => $otp];

//         header("Location: verify.php");
//         // header("Location: dashboard.php");
//     } else {
//         // Password is incorrect
//         echo "Invalid password";
//     }
// } else {
//     // User not found
//     echo "User not found";
// }

// $conn->close();

?>
