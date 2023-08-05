<?php

// Replace placeholders with your own values
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helix";
$table = "forgot_password";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch the latest value from the forgot_password table
$sql = "SELECT email FROM $table ORDER BY SNO DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $latestEmail = $row['email'];
  
} else {
    echo "No emails found";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "login.css">
   
    <title>Helix: Forget Password</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        *{
    margin:0;
    padding:0;
    box-sizing: border-box;
    font-family: "Poppins",sans-serif;

}
body{
    display: flex;
    height:100%;
    flex-direction: column;
    
    top:0;
    left:0;
    

}

body::-webkit-scrollbar{
  width:0px;
}
.background{
    position: absolute;
    top:0;
    left:0;
    height:100%;
width:100%;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;

}
.background img{
    height:100%;
width:100%;
}
  .overlay{
    position: absolute;
    top:0;
    left:0;
    height: 100%;
    width:100%;
    background-color: rgba(0,0,0,0.5);
    z-index: 2;
  }
.login-form{
    height:11cm;
    width:16cm;
    background-color: white;
    position: absolute;
    top:4cm;
   left:32%;
    border-radius: 30px;
    z-index: 5;
  }
  
  .form-logo img{
    position: absolute;
    top:0.5cm;
    left:45%;
    height: 3cm;
    width:2cm; 
  }
  
  .login-form h3{
    position: absolute;
    top:4cm;
    left:2.2cm;
    font-family: 'Wix Madefor Display', sans-serif;
    font-size: 0.8cm;
    text-align: center;
    font-weight: bold;
    color: #333333;
    width:12cm;
    pointer-events: none;
    
  }
  .login-form h3 p{

    color:#252525;
    margin-top: -1.25cm;
    font-size: 0.5cm;
    font-weight: 200;
  
  }
  .input{
    display: flex;
    flex-direction: column;
    position: absolute;
   
  
  }
  form .input{
    position: absolute;
    top:6cm;
    left:2.5cm;
    
}

.input input {
    color:black;
    margin-top: 0.5cm;
    justify-content: center;
    padding: 0 0.5cm 0 0.5cm;
    font-size: 0.45cm;
 border-radius: 15px; 
    height:1.2cm;
    border-color: #5e5e5e;
    width:11.5cm;
    margin-bottom: 1cm;
  }
 
  .input label{
  
    font-size: 0.4cm;
    margin-top: 0.5cm;
  }
  
 
   
    label{
      display: flex;
      flex-direction: column;
    }
    .submit{
    
      text-align: center;
    }
    .btn-submit{
      width:6cm;
      font-size: 0.5cm; 
      background-color:#fb0e28;
      border-radius: 20px;
      height: 1cm;
      color: white;
      font-weight: 600;
      position: relative;
      top:0.2cm;
      border: none;
    }
  
    .register p{
      position: relative;
      text-align: center;
      top:1.5cm;
      font-size: 0.325cm;
      font-family: 'Wix Madefor Display', sans-serif;
      color:#5e5e5e;
  
    }
  
    .register a{
      font-size: 0.325cm;
      font-family:'Wix Madefor Display', sans-serif;
      color:black;
      font-weight: 600;
      text-decoration: none;
      
    }
    .register a:hover{
    
      text-decoration:underline;
    
    }
    .allowance{
      width:6.5cm;
      text-align: justify;
      text-align-last: center;
      position: relative;
      align-items: center;
      left:0.8cm;
      top:1cm;
    }
    .allowance h6{
      
      font-size: 0.325cm;
        font-family: 'Wix Madefor Display', sans-serif;
        color:#5e5e5e;
      font-weight: lighter;
    
    }
    .allowance a{
      font-size: 0.325cm;
      font-family:'Wix Madefor Display', sans-serif;
      color:black;
      font-weight: 600;
      text-decoration: none;
    
    }
    .allowance a:hover{
      
      text-decoration:underline;
    
    }
    
.information{
    display: flex;
    flex-direction: row;
    gap:1cm;
    z-index: 5;
    position: absolute;
   top:18.9cm;
   border: 1px solid black;
   justify-content: center;
   align-items: center;
   background-color: black;

   font-size: 0.1cm;
   height:1cm;
   width: 100%;
  }

  .information h5 a{
    font-size: 0.325cm;
    font-weight: lighter;
    color:white;
    text-align: center;
  }
  .information h5 a:hover{
    text-decoration: underline;
   color:#1ed760; 
  }

    </style> 
</head>
<body>

        <div class="background">
            <img src = "login_bg.png">
        </div>
    <div class="overlay"></div>
    <div class="register">
    <div class="login-form">
        <div class="form-logo">
            <img src="logo_crop2.png">
         </div>
        <h3>Enter the OTP you received on<p><?php echo ' '. $latestEmail; ?></p></h3>

        <form action = " verifycode.php" method="POST">
            <div class="input">

                
                    <input type="text" id="otp" class = "otp" name = "otp" placeholder="Enter the OTP" required >
                    
                    <div class="submit">

                        <button type="submit" id = "submit" name = "submit" class = "btn-submit">Continue</button>
                    </div>
            
                    
                </div>
    </form>
   </div>
   <div class="information">
       <h5><a href = "terms.html">Terms and Conditions</a></h5>
       <h5><a href = "privacy_policy.html">Privacy Policy </a></h5>
       <h5><a href = "member_login.html">Member Login</a></h5>
       <h5><a href = "contact.html">Contact us</a></h5>
       <h5><a href = "register.html">Sign In</a></h5>
      </div>
    </div>

</body>
</html>