<?php
// Retrieve the email value sent from the JavaScript file
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    echo"<script>";
    echo "var email = ' " . $email ." ';";
   echo " </script>";

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'helix';
    
    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die('Database connection error: ' . mysqli_connect_error());
    }
    
    // Prepare and execute the query to select data based on the email
    $query = "SELECT firstname,SNO FROM register WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    // Check if the query was successful
    if ($result) {
        // Fetch the results and process them
        while ($row = mysqli_fetch_assoc($result)) {
            $firstname = $row['firstname'];
            // Do something with the fetched data, such as displaying it
            
        }
    } else {
        // Query execution failed
        echo 'Error executing the query: ' . mysqli_error($conn);
    }
    
    // Close the database connection
    mysqli_close($conn);

  } else {
    echo "";
  }

// Establish a database connection

?>
  
        <!DOCTYPE html>
<html>
<head>
    <title>Helix: Location</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
    <style>
       *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  height: 100vh;
  display: flex;
  flex-direction: column;
  background-color: #2e2f4a;

  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
}
       
      body::-webkit-scrollbar{
        width:0px;
      }  
        .user-name {
        border:2px solid #d6eaf2;
        border-radius: 20px;
        background-color: transparent;
        color:#ffffff;
        font-weight: 600;
        width:5cm;
        height:1.5cm;
        justify-content: center;
        text-align: center;
        position: absolute;
        right: 1cm;
        top:1cm;
        padding-top: 0.5cm;
        transition: linear 0.5s;
    }
    
    .user-name:hover{
        transform: scale(1.03);
        font-weight: 700;
        box-shadow: 0px 2px 5px rgba(225,225,225, 0.1);
        }
button{
    border: none;
  outline: none;
  font-size: 60px;
  color: #12121c;
  padding: 23px 44px;
  border-radius: 50px;
  cursor: pointer;
  background-color: #cdd6f1;
  font-weight:bolder;
  position: absolute;
  top: 9.5cm;
  left:5cm;
  width:29.5cm;
 box-shadow: 0 0 20px 0 rgba(0,0,0, 0.9);
 font-family: 'Assistant', sans-serif;
 z-index: 2;
}
.location-person{
    z-index:2;
    position: absolute;
    top:13.632cm;
    left:0;


}
.location-person img{
    height:6cm;
    width:5cm;
}
.next{
    z-index:2;
    position: absolute;
    top:13.632cm;
    right:0;


}
.next img{
    height:6cm;
    width:15cm;
}
#myVideo{
    height:6cm;
    position:absolute;
    top:4.14cm;
    right:5.3cm;
   object-fit: cover; 
    width:30cm;
z-index:1 ; 
   justify-content: center;
   align-items: center;
   text-align: center;
}
.login_back {
      display: none;
      position: absolute;
      top:13.4cm;
      left:4cm;
      padding: 10px;
      color:white;
      background-color: #252525;
      border: 1px solid #252525;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      z-index: 3;
    }
.login_back::before{
    content: "";
    position: absolute;
    top: 0.5cm;
    left:-0.5cm;
    transform: translateY(-50%);
    border-width: 10px;
    border-style: solid;
    border-color: transparent #252525 transparent transparent;
}
.next_button {
      display: none;
      position: absolute;
     top:12cm;
      right:1cm;
      padding: 10px;
      color:white;
      background-color: #252525;
      border: 1px solid #252525;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      z-index: 3;
    }
.next_button::before{
    content: "";
    position: absolute;
    top: 1.03cm;
    right:6cm;
    transform: translateX(-50%);
    border-width: 10px;
    border-style: solid;
    border-color: #252525 transparent transparent transparent;
 
}

.location-person img{
    animation: back 2s infinite alternate; 
}

@keyframes back{
  0% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-5px);
  }
  100% {
    transform: translateY(0);
  }
}
.next img{
    animation: next 2s infinite alternate;
}
@keyframes next {
  0% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-5px);
  }
  100% {
    transform: translateY(0);
  }
}

.logo{
    position: absolute;
    top:0.5cm;
    left:1cm;
}
.logo img{
    height:3cm;
    width:4cm;
}

</style>
</head>
<body>
    <div class="logo">
        <a href = "login.html">
            <img src = "location_logo.png">
        </a>
    </div>
            
    <div class="user-name">
        <?php
        echo "Hello," ." ". " " .$firstname ;
        ?>
      
    </div>
    <button>Find Your Location</button>
    <video autoplay muted loop id="myVideo">
        
        
        <source src="above_button.mp4" type="video/mp4">
        
    </video>
   
   
    <div id = "location_person" class="location-person">
        <a href = "login.html">
            <img src ="location_mobile.png">
        </a>
    </div>
     <div id = "login_back" class="login_back"></div>


    <div id = "next" class="next">
        <a href = "main.php">
            <img src ="next.png">
        </a>
    </div>

    <div id = "next_button" class="next_button"></div>

  
    <script>
    const button = document.querySelector("button");




button.addEventListener("click", ()=>{
    if(navigator.geolocation){ //if browser support geolocation api
        button.innerText = "Allow to detect location";
        // geolocation.getCurrentPosition method is used to get current position of the device
        // it takes three parameters success, error, options. If everything is right then success 
        // callback function will call else error callback function will call. We don't need third parameter for this project
        navigator.geolocation.getCurrentPosition(onSuccess, onError);
    }else{
        button.innerText = "Your browser not support";
    }
}); 
function onSuccess(position){
    button.innerText = "Detecting your location...";
    let {latitude, longitude} = position.coords; //getting latitude and longitude properties value from coords obj
    //sending get request to the api with passing latitude and longitude coordinates of the user position

   //nerul- 19.042263, 73.014517
   //thane - 19.267924,72.967252
   //change below terms also
    fetch(`https://api.opencagedata.com/geocode/v1/json?q=${19.267924}+${72.967252}&key=fb87072a45394821904e16450b724c48`)
    //parsing json data into javascript object and returning it and in another then function receiving the object that is sent by the api
    .then(response => response.json()).then(response =>{
        let allDetails = response.results[0].components; //passing components object to allDetails variable
        console.table(allDetails);
        let {suburb,city, state} = allDetails; //getting country, postcode, country properties value from allDetails obj
     

        button.innerText = `${suburb},  ${city}, ${state}`; //passing these value to the button innerText


     //   let city = ' ';
    //    const regionalAreas = {

    //        'Thane' : ['Kasarvadavali' , 'Manpada' , 'Majiwada' , 'Bhayander Pada'],
    //        'Navi Mumbai' : ['Nerul West' , 'Seawoods' , 'Panvel'],
    
      //          };
        //for (const [cityName , regionalAreasList] of Object.entries(regionalAreas)){
          //  if(regionalAreasList. includes(suburb)){
            //    city = cityName;
              //  break;
           // }
       // }


console.log(latitude,longitude);
// make an AJAX POST request to your PHP file
$.ajax({
type: 'POST',
url: 'location_save.php',
data: { city: city, suburb: suburb ,latitude:'19.267924' , longitude: '72.967252',email:email},
success: function(response) {
  console.log(response);
},
error: function(xhr, _status, _error) {
  console.log(xhr.responseText);
}
});


});


}
   


function onError(error){
    if(error.code == 1){ //if user denied the request
        button.innerText = "You denied the request";
    }else if(error.code == 2){ //if location in not available
        button.innerText = "Location is unavailable";
    }else{ //if other error occurred
        button.innerText = "Something went wrong";
    }
    button.setAttribute("disabled", "true"); //disable the button if error occurred
}

var location_person = document.getElementById('location_person');
    var login_back = document.getElementById('login_back');

    location_person .addEventListener('mouseover', function() {
      login_back.style.display = 'block';
      login_back.innerHTML = 'Back to Login';
    });

    location_person.addEventListener('mouseout', function() {
      login_back.style.display = 'none';
    });


    
    var next = document.getElementById('next');
    var next_button = document.getElementById('next_button');

    next.addEventListener('mouseover', function() {
      next_button.style.display = 'block';
      next_button.innerHTML = 'Check for your nearby health workers';
    });

    next.addEventListener('mouseout', function() {
      next_button.style.display = 'none';
    });

   
  
    </script>
</body>
</html>