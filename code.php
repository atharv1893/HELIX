<?php

$email = $_POST['email'];



// Function to generate a random 6-digit number
function generateRandomNumber() {
    return mt_rand(100000, 999999);
}

// Generate a random number
$randomNumber = generateRandomNumber();

// Store the random number in the database (example code)
// Replace with your own code to connect to the database and perform the insertion
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helix";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the random number into the database
$sql = "UPDATE register SET code = '$randomNumber' WHERE email = '$email'";

if ($conn->query($sql) === TRUE) {
    echo "Random number stored in the database successfully";
    echo'<script>console.log(email)</script>';
} else {
    echo "Error storing random number in the database: " . $conn->error;
}

// Close the database connection
$conn->close();

// Send an email using PHPMailer

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
    
    $mail->Body =$randomNumber;

   
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
} 
?>