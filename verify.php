<?php
include 'includes/connection.php';

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otp = $_POST['otp'];
    $dbotp = $_SESSION['otp']['otp'];
    $student_id = $_SESSION['student_id'];

    $sql = "SELECT * FROM students WHERE id='$student_id' AND otp='$dbotp'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);
    // var_dump($dbotp);
    if ($result) {
        $otp_exp = strtotime($result['otp_exp']);
        if ($otp_exp >= time()) {
            $_SESSION['student_id'] = $result['id'];

            header("Location: dashboard.php");
            exit();
        } else {
            ?>
                <script>
                    alert("OTP has expired. Please try again.");
                    function navigateToPage() {
                        window.location.href = 'login.php';
                    }
                    window.onload = function() {
                        navigateToPage();
                    }
                </script>
            <?php 
        }

    } else {
        echo "<script> alert('Invalid OTP. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style type="text/css">
        #container{
            /*border: 1px solid black;*/
            box-shadow: 0px 0px 15px -3px rgba(0,0,0,.1), 0 4px 6px -2px rgba(0,0,0,.05);
            width: 400px;
            margin-left: 400px;
            margin-top: 50px;
            height: auto;
            padding: 30px;
        }
        input[type=number]{
            width: 290px;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #efefef;

        }
        input[type="submit"]{
            background-color:rgb(209 209 209 / 5%);
            border: 1px solid rgb(209 209 209 / 5%);
            width: 100px;
            padding: 9px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.12), 0 1px 5px 0 rgba(0,0,0,.2);
        }
        input[type="submit"]:hover{
            cursor: pointer;
            opacity: .9;
            background-color: orange;
            border: 1px solid orange;
        }
    </style>
</head>
<body>
    <div id="container"><br>
        <h1>Two Factor Authentication System</h1>
        <p>6 Digit code has been sent to your phone number ending with: *****<?php echo substr($_SESSION['phone'], -4) ?></p>
        <form method="POST" action="verify.php">
            <label style="font-weight: bold; font-size: 18px;" for="otp">Enter OTP Code:</label><br>
            <input type="number" name="otp" pattern="\d{6}" placeholder="OTP-000000" required><br><br>
            <input type="submit" name="otp" value="Verify OTP">
        </form>
    </div>
</body>
</html>

