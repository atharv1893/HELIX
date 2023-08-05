<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helix";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle the AJAX request

    $email = $_POST["email"];
    $code = $_POST["code"];
    $sql = "SELECT * FROM register WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
   
    if (mysqli_num_rows($result) > 0) {
    // Insert the data into the database
    $sql = "UPDATE register SET code = '$code' WHERE email = '$email'";

    if (mysqli_query($conn, $sql)) {
        echo "Code stored in the database.";
    } else {
        echo "Error storing code in the database: " . mysqli_error($conn);
    }
}


use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'helix.healthwebsite@gmail.com';                     //SMTP username
    $mail->Password   = 'hvwgkfomvatbjbon';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('helix.healthwebsite@gmail.com', 'HELIX ');
   
    $mail->addAddress($email);     //Add a recipient
  

    //Attachments
 


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Forgotten Password';
   
 
    $mail->Body ='Hi'.'<br>'.'We received a request to reset your Helix password'.'<br>'.'Enter the following password reset code:'.'<br>'.$code;

   
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
} 

// Close the database connection
mysqli_close($conn);
// Close the database connection

?>

