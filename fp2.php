<?php
$email = $_POST['email'];
$otpmail = $email;
// Replace placeholders with your own values
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helix";
$table = "register";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the value of email

// Check if the email exists in the database
$sql = "SELECT * FROM $table WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Email exists
    $insert = "INSERT INTO forgot_password(email) VALUES ('$email')";
    if(mysqli_query($conn,$insert)){

        echo'<script>alert("Mail Confirmed! Proceed for the OTP code")</script>';
        echo'<script>window.location.href = "otp.php"</script>';
    }
} 
 else {
    // Email doesn't exist
    echo'<script>alert("User with entered email not found :( New User? ")</script>';
   echo'<script>window.location.href = "register.html"</script>';
}
    
mysqli_close($conn);
?>