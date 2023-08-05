<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helix";
$table = "profession_form";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the values from the form
$professionName = $_POST['professionName'];
$professionDescription = $_POST['professionDescription'];

// Check if the email already exists in the database

    // Insert the new user into the database
    $insertSql =  "INSERT INTO profession_form(profession_name, profession_description) VALUES('$professionName', '$professionDescription')";

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