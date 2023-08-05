<?php
// get the values of city and suburb from the AJAX request
$city = $_POST['city'];
$suburb = $_POST['suburb'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];

// insert the values into your database
$conn = mysqli_connect('localhost', 'root', '', 'helix');
$query = "INSERT INTO location(city, suburb,latitude, longitude) VALUES ('$city', '$suburb', '$latitude', '$longitude')";
mysqli_query($conn, $query);

// send a response back to the JavaScript code
echo 'Data inserted successfully';
?>
