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
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if the email already exists in the database
$sql = "SELECT * FROM $table WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Email already exists
    echo '<script type="text/javascript">
            alert("Hmmm? Seems like you are already a member pf Helix. Kindly Log In");
            window.location.href = "login.html";
          </script>';
} else {
    $maxlength = 20;
    $options = [
        'cost' => 12,
        'length' => 10
    ];
    $hashpassword = password_hash($password,PASSWORD_BCRYPT,$options);

    // Insert the new user into the database
    $insertSql = "INSERT INTO $table (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$hashpassword')";

    if (mysqli_query($conn, $insertSql)) {
        
        // New user inserted successfully
        echo'<script>alert("Please Login")</script>';
        header("Location:login.html?email=" . urlencode($email));
        $jsCode = '
        <script type="text/javascript">
        </script>';

        // Output the JavaScript code
        echo $jsCode;
    } else {
        // Error inserting new user
        echo "Error: " . $insertSql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);


?>