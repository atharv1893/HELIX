<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helix";
$table = "doctor_form";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the values from the form
$doctorName = $_POST['doctorName'];
$doctorDescription = $_POST['doctorDescription'];
$doctorLocation = $_POST['doctorLocation'];

// Check if the email already exists in the database

    // Insert the new user into the database
    $insertSql =  "INSERT INTO doctor_form(doctor_name, doctor_description ,doctor_location) VALUES('$doctorName', '$doctorDescription', '$doctorLocation')";

    if (mysqli_query($conn, $insertSql)) {
        
        echo '<script type="text/javascript">
                alert("Form Successfully Submitted");
                window.location.href = "main.php";

              </script>';
             }
     else {
        // Error inserting new user
        echo "Error: " . $insertSql . "<br>" . mysqli_error($conn);
    }


mysqli_close($conn);


?>