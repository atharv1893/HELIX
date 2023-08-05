<?php
// Replace placeholders with your own values
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helix";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the values from the signup form

$password = $_POST['password'];

// Check if the user exists in the database
$sql = "SELECT email FROM forgot_password ORDER BY SNO DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $maxlength = 20;
    $options = [
        'cost' => 12,
        'length' => $maxlength
    ];
    $hashpassword = password_hash($password,PASSWORD_BCRYPT,$options); 
    // Update the password for the specific email
    $changepassword = "UPDATE register SET password = '$hashpassword' WHERE email = '$email'";
    mysqli_query($conn, $changepassword);

    echo '<script type="text/javascript">
            alert("Password has been changed");
            window.location.href = "login.html";
          </script>';
}

mysqli_close($conn);
?>
