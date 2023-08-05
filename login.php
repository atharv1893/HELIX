<?php
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

// Get the values from the signup form
$email = $_POST['email'];
$password = $_POST['password'];

// Check if the user exists in the database
$sql = "SELECT * FROM $table WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $storedPassword = $row['password'];
    
    if (password_verify($password,$storedPassword)) {

        $insertSql = "INSERT INTO login(email) VALUES('$email')";
        mysqli_query($conn, $insertSql);

        header("Location:location.php?email=" . urlencode($email));
        echo '<script type="text/javascript">
                alert("Welcome Back to Helix");
                window.location.href = "location.php";
                
                
                </script>';
    } else {
        echo '<script type="text/javascript">
                alert("Incorrect password. Please try again.");
                window.location.href = "login.html";

              </script>';
             }
} else {
    echo '<script type="text/javascript">
            alert("Hmmm...? Seems like you are new on Helix. Kindly Sign In.");
            window.location.href = "register.html";
          </script>';
   
}
mysqli_close($conn);

?>

