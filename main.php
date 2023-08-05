<?php


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

// Fetch email with the largest SNO from the login table
$query1 = "SELECT email FROM login ORDER BY SNO DESC LIMIT 1";
$result1 = mysqli_query($conn, $query1);

if (mysqli_num_rows($result1) > 0) {
    $row1 = mysqli_fetch_assoc($result1);
    $email = $row1['email'];

    // Perform query to find firstname from register table using the retrieved email
    $query2 = "SELECT firstname FROM register WHERE email = '$email'";
    $result2 = mysqli_query($conn, $query2);

    if (mysqli_num_rows($result2) > 0) {
        $row2 = mysqli_fetch_assoc($result2);
        $firstname = $row2['firstname'];

        
    } else {
        echo "No matching value found in register table";
    }
} else {
    echo "No rows found in login table";
}

mysqli_close($conn);



?>
  
        <!DOCTYPE html>
<html>
<head>
    <title>Helix</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
</head>
    <style>
       *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  height: 306vh;
  display: flex;
  flex-direction: column;
  background: rgb(39,0,68);
background: linear-gradient(171deg, rgba(39,0,68,1) 35%, rgba(9,121,107,1) 81%, rgba(8,152,172,1) 94%);

  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
}

body::-webkit-scrollbar{
  width:0px;
}
        
        .user-name {
        border:2px solid white;
        border-radius: 20px;
        background-color: transparent;
        color:white;
        font-weight: 600;
        width:5cm;
        height:1.5cm;
        justify-content: center;
        text-align: center;
        position: absolute;
        right: 1cm;
        top:2cm;
        padding-top: 0.5cm;
        transition: linear 0.5s;
    }
    
    .user-name:hover{
        transform: scale(1.03);
        font-weight: 700;
        box-shadow: 0px 2px 5px rgba(225, 225 ,225, 0.3);
        z-index: 2;
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


#searchBox {
  padding: 8px;
  border:none;
  border-radius: 15px;
  width:12cm;
  height:1.5cm;
  position: absolute;
  justify-content: center;
  top:2cm;
  left:12cm;
  font-size: 18px;
  color: black;
  z-index: 6;
}
 #searchBox [type="text"]{
  width:3cm;
}

#searchButton{
  height:1.5cm;
  width:3cm;
  border: none;
border-radius: 20px;
position: absolute;
  left:24.5cm;
  top:2cm;
  font-size: 18px;
  color: black;
  font-weight: bold;
  transition: ease 0.5s;
}

#searchButton:hover{
  transform: scale(1.04);

}
#autocompleteList {
  list-style-type: none;
  padding: 0;
  margin: 0;
  max-height: 200px;
  overflow-y: auto;
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 4px;
  width:11cm;
  position: absolute;
  justify-content: center;
  top:3.4cm;
  left:12.5cm;
  z-index: 5;
}

#autocompleteList li {
  padding: 8px;
  cursor: pointer;
}
#autocompleteList::-webkit-scrollbar{
  width:0px;
}
#autocompleteList li:hover {
  background-color: #f5f5f5;
}



.speech-icon img{
    height:1.3cm;
    position: absolute;
    top:2.1cm;
    left:22.5cm;
    z-index: 7;
    border:1px solid white;
    background-color: white;
    border-top-right-radius: 15px;
    border-bottom-right-radius: 15px;
    transition: ease 0.5s;
  }
  
  .speech-icon img:hover{
    transform: scale(1.05);
    
  }
  .cardContainer {
  display: flex;
  flex-direction: row;
  gap:3cm;
  position: absolute;
  top:6cm;
  left:4cm;
  flex-wrap: wrap;
  padding-right: 1cm;
  }

.card {
  width: 8cm;
  margin-right: 1cm;
  padding: 10px;
  padding-top: 5cm;
  border: none;
  border-radius: 30px;
  background-color: #ffffff;
  height:11cm;
  


}
.card p{
  padding-top:0.5cm;
  color:#767676;
  text-align: justify;
text-align-last: center;

}
.card h3{
 padding-top: 0.5cm; 
  color:black;
  font-size: 28px;
  text-align: center;
  font-family: 'Assistant', sans-serif;
  
} 
.main-button{
   margin-top: 0.5cm; 
  height:1cm;
  width:3cm;
  font-size: 17px;
  color:black;
  border:none;
  border-radius:10px;
  cursor:pointer;
  transition: 0.5s ease-in-out;

}
.main-button:hover{
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2), 0 2px 4px rgba(0, 0, 0, 0.1);

}
.profession-pic1{
  position: absolute;
  top:0cm;
  left:0cm;
  border-top-right-radius: 30px;
  border-top-left-radius: 30px;
  height:5cm;
  width:8cm;
  z-index: 4;
padding-left: 1.5cm;
  margin-bottom: 0.5cm;
background-color: #98cbd6;  
  
}
.profession-pic1 img{
  

  border-radius: 15px;
  height:5cm;
  width:5cm;
  justify-content: center;
  align-items: center;
  z-index: 4;
}

#doctor-button
{
  position: relative;
  background:#98cbd6;
  left:2.25cm;
  z-index: 5;
}
#doctor-button:hover{
  background-color: #739aa3;
}

.profession-pic2{
  position: relative;
  top:-5cm;
  left:-0.27cm;
  border-top-right-radius: 30px;
  border-top-left-radius: 30px;
  height:5cm;
  width:8cm;
  z-index: 4;
padding-left: 1.5cm;
  margin-bottom:-5cm;
background-color: #aeccc4;  
  
}
.profession-pic2 img{
 
  position: absolute;
  top:0;
  left:0;

  border-radius: 15px;
  height:5cm;
  width:7.5cm;
  justify-content: center;
  align-items: center;
  z-index: 4;
}
#dentist-button
{
  background:#aeccc4;
  position: relative;
  z-index: 5;
  left:2.25cm;
}
#dentist-button:hover{
  background-color: #829993;

}
.profession-pic3{
  position: relative;
  top:-5cm;
  left:-0.27cm;
  border-top-right-radius: 30px;
  border-top-left-radius: 30px;
  height:5cm;
  width:8cm;
  z-index: 4;
padding-left: 1.5cm;
  margin-bottom:-5cm;
background-color: #f2de61;  
  
}
.profession-pic3 img{
 
  position: absolute;
  top:-1cm;
  left:-0.5cm;

  border-radius: 15px;
  height:6cm;
  width:8cm;
  justify-content: center;
  align-items: center;
  z-index: 4;
}

#medical-button
{
  position: relative;
  z-index: 5;
  left:2.25cm;
  background:#f2de61;
}
#medical-button:hover{
  background-color: #b9aa4a;

}
.profession-pic4{
  position: relative;
  top:-5cm;
  left:-0.27cm;
  border-top-right-radius: 30px;
  border-top-left-radius: 30px;
  height:5cm;
  width:8cm;
  z-index: 4;
padding-left: 1.5cm;
  margin-bottom:-5cm;
background-color: #e6bbff;  
  
}
.profession-pic4 img{
 
  position: absolute;
  top:0;
  left:0;

  border-radius: 15px;
  height:5cm;
  width:8cm;
  justify-content: center;
  align-items: center;
  z-index: 4;
}

#physiotherapist-button
{
  position: relative;
  z-index: 5;
  left:2.25cm;
  background:#e6bbff;
}
#physiotherapist-button:hover{
  background-color: #b795cc;

}
.profession-pic5{
  position: relative;
  top:-5cm;
  left:-0.27cm;
  border-top-right-radius: 30px;
  border-top-left-radius: 30px;
  height:5cm;
  width:8cm;
  z-index: 4;
padding-left: 1.5cm;
  margin-bottom:-5cm;
background-color: #ffbb5f;  
  
}
.profession-pic5 img{
 
  position: absolute;
  top:0;
  left:1.6cm;

  border-radius: 15px;
  height:5cm;
  width:5cm;
  justify-content: center;
  align-items: center;
  z-index: 4;
}
#cardiologist-button
{
  position: relative;
  z-index: 5;
  left:2.25cm;
  background:#ffbb5f;
}
#cardiologistist-button:hover{
  background-color: #cc954c;

}

.profession-pic6{
  position: relative;
  top:-5cm;
  left:-0.27cm;
  border-top-right-radius: 30px;
  border-top-left-radius: 30px;
  height:5cm;
  width:8cm;
  z-index: 4;
padding-left: 1.5cm;
  margin-bottom:-5cm;
background-color: #ffb2e7;  
  
}
.profession-pic6 img{
 
  position: absolute;
  top:0;
  left:0cm;

  border-radius: 15px;
  height:5cm;
  width:7.5cm;
  justify-content: center;
  align-items: center;
  z-index: 4;
}

#dermatologist-button
{
  position: relative;
  z-index: 5;
  left:2.25cm;
  background:#ffb2e7;
}
#dermatologist-button:hover{
  background-color: #cc8eb8;

}


.profession-pic7{
  position: relative;
  top:-5cm;
  left:-0.27cm;
  border-top-right-radius: 30px;
  border-top-left-radius: 30px;
  height:5cm;
  width:8cm;
  z-index: 4;
padding-left: 1.5cm;
  margin-bottom:-5cm;
background-color: #cdd7ff;  
  
}
.profession-pic7 img{
 
  position: absolute;
  bottom:0;
  right:0cm;

  border-radius: 15px;
  height:5cm;
  width:11cm;
  justify-content: center;
  align-items: center;
  z-index: 4;
}
#psychiatrist-button
{
  position: relative;
  z-index: 5;
  left:2.25cm;
  background:#cdd7ff;
}
#psychiatrist-button:hover{
  background-color: #a4accc;

}

.profession-pic8{
  position: relative;
  top:-5cm;
  left:-0.27cm;
  border-top-right-radius: 30px;
  border-top-left-radius: 30px;
  height:5cm;
  width:8cm;
  z-index: 4;
padding-left: 1.5cm;
  margin-bottom:-5cm;
background-color: #ffcde9;  
  
}
.profession-pic8 img{
 
  position: absolute;
  top:0;
  left:-0.9cm;

  border-radius: 15px;
  height:5cm;
  width:9cm;
  justify-content: center;
  align-items: center;
  z-index: 4;
}
#pediatrician-button
{
  position: relative;
  z-index: 5;
  left:2.25cm;
  background:#ffcde9;
}
#pediatrician-button:hover{
  background-color: #cca4ba;

}

.profession-pic9{
  position: relative;
  top:-5cm;
  left:-0.27cm;
  border-top-right-radius: 30px;
  border-top-left-radius: 30px;
  height:5cm;
  width:8.03cm;
  z-index: 4;
padding-left: 1.5cm;
  margin-bottom:-5cm;
background-color: #a98cda;  
  
}
.profession-pic9 img{
 
  position: absolute;
  top:0;
  left:0cm;

  border-radius: 15px;
  height:5cm;
  width:8.8cm;
  justify-content: center;
  align-items: center;
  z-index: 4;
}
#gynecologist-button
{
  position: relative;
  z-index: 5;
  left:2.25cm;
  background:#a98cda;
}
#gynecologist-button:hover{
  background-color: #816ba6;

}

.profession-pic10{
  position: relative;
  top:-5cm;
  left:-0.27cm;
  border-top-right-radius: 30px;
  border-top-left-radius: 30px;
  height:5cm;
  width:8.03cm;
  z-index: 4;
padding-left: 1.5cm;
  margin-bottom:-5cm;
background-color: #b6daa8;  
  
}
.profession-pic10 img{
 
  position: absolute;
  top:0.15cm;
  left:1cm;

  border-radius: 15px;
  height:5cm;
  width:6cm;
  justify-content: center;
  align-items: center;
  z-index: 4;
}
#orthopedic-button
{
  position: relative;
  z-index: 5;
  left:2.25cm;
  background:#b6daa8;
}
#orthopedic-button:hover{
  background-color: #8ba680;

}

.profession-pic11{
  position: relative;
  top:-5cm;
  left:-0.27cm;
  border-top-right-radius: 30px;
  border-top-left-radius: 30px;
  height:5cm;
  width:8.03cm;
  z-index: 4;
padding-left: 1.5cm;
  margin-bottom:-5cm;
background-color: #fe1a87;  
  
}
.profession-pic11 img{
 
  position: absolute;
  top:0cm;
  left:0.25cm;

  border-radius: 15px;
  height:5cm;
  width:8cm;
  justify-content: center;
  align-items: center;
  z-index: 4;
}
#ophthalmologist-button
{
  position: relative;
  z-index: 5;
  left:2.25cm;
  background:#fe1a87;
}
#ophthalmologist-button:hover{
  background-color: #cb146b;

}


.profession-pic12{
  position: relative;
  top:-5cm;
  left:-0.27cm;
  border-top-right-radius: 30px;
  border-top-left-radius: 30px;
  height:5cm;
  width:8.03cm;
  z-index: 4;
padding-left: 1.5cm;
  margin-bottom:-5cm;
background-color: #c8b0dd;  
  
}
.profession-pic12 img{
 
  position: absolute;
  top:-0.3cm;
  left:0.5cm;

  border-radius: 15px;
  height:5.5cm;
  width:6.5cm;
  justify-content: center;
  align-items: center;
  z-index: 4;
}
#veterinary-button
{
  position: relative;
  z-index: 5;
  left:2.25cm;
  background:#c8b0dd;
}
#veterinary-button:hover{
  background-color: #9987aa;

}
.search-message{
  color:white;
  font-size: 3cm;
  position: absolute;
  left:1cm;
  text-align:center ;
  text-align-last:center ;
border:none;
width:30cm;
}
.profession-feedback{
  position:absolute;
  color:gray;
  font-size: 15px;
  font-family: 'PT Sans', sans-serif;
  top:15cm;
  left:11cm;
  display: none;
}

.button-feedback{
  position: absolute;
  top:16cm;
  left:18.5cm;
  height:1cm;
  width:3cm;
  font-size: 0.5cm;
  border-radius : 5px;
  color:white;
  background: rgb(3,170,225);
background: linear-gradient(156deg, rgba(3,170,225,1) 20%, rgba(49,226,206,1) 92%);
  border:none;
  cursor: pointer;
  display: none;
}

.button-feedback a{
  color:white;
  text-decoration: none;
}
</style>
</head>


<body id = "body">
   <div class="logo"> 
            <img src = "main_logo.png">
    </div>
 
    <div class="user-name">
        <?php
        echo "Hello," ." ". " " .$firstname ;
        ?>
      
    </div>


  
<input type="text" id="searchBox" placeholder="Search for any health worker">
 <ul id="autocompleteList"></ul> 
<button id="searchButton">Search</button>

<div class="speech-icon">
<button id="speechButton">
  <img src = "voice.png">
</button>
</div>

<div id="cardContainer" class = "cardContainer">
  <div class="card" id="card1">
    <div class="profession-pic1">
      <img src = "main_doctor.jpg">
    </div>
    <h3>Doctor <br>(MBBS)</h3>
    <p>Medical professional who diagnoses and treats illnesses and injuries.</p>
    <a href = "doctor.html">
      <button id = "doctor-button"class = "main-button">Check</button>
    </a>
  </div>


  <div class="card" id="card2">
  <div class="profession-pic2">
      <img src = "main_dentist.png">
    </div>
    <h3>Dentist <br>(BDS/MDS)</h3>
    <p>Dental specialist who focuses on oral health, including teeth, gums.</p>
    <a href ="dentist.html">
      <button id = "dentist-button"class = "main-button">Check</button>
    </a>
  </div>
      
  <div class="card" id="card3">
  <div class="profession-pic3">
      <img src = "main_medical.png">
    </div>
    <h3>Medical <br>Stores</h3>
    <p>Retail outlets that provide medicines, healthcare products.</p>
    <a href = "medical.html">
      <button id = "medical-button"class = "main-button">Check</button>
    </a>
  </div>


  <div class="card" id="card4">
  <div class="profession-pic4">
      <img src = "main_physiotherapy.png">
    </div>
    <h3>Physiotherapist (BPT/MPT)</h3>
    <p>Therapist who helps restore physical function and mobility through exercises.</p>
    <a href = "physiotherapist.html">
      <button id = "physiotherapist-button"class = "main-button">Check</button>
    </a>
  </div>


  <div class="card" id="card5">
  <div class="profession-pic5">
      <img src = "main_cardiologist.png">
    </div>
    <h3>Cardiologist (DM Cardiology)</h3>
    <p>Doctor specializing in heart-related conditions and diseases..</p>
    <a href = "cardiologist.html">
      <button id = "cardiologist-button"class = "main-button">Check</button>
    </a>
  </div>


  <div class="card" id="card6">
  <div class="profession-pic6">
      <img src = "main_dermatologist.png">
    </div>
    <h3>Dermatologist (MD Dermatology)</h3>
    <p>Specialist treating disorders related to the skin, hair, and nails..</p>
    <a href = "dermatolist.html">
      <button id = "dermatologist-button"class = "main-button">Check</button>
    </a>
  </div>


  <div class="card" id="card7">
  <div class="profession-pic7">
      <img src = "main_psychiatrist.png">
    </div>
    <h3>Psychiatrist (MD Psychiatry)</h3>
    <p>Medical doctor specializing in mental health and disorders.</p>
    <a href = "psychiatrist.html">
      <button id = "psychiatrist-button"class = "main-button">Check</button>
    </a>
  </div>


  <div class="card" id="card8">
  <div class="profession-pic8">
      <img src = "main_pediatrician.png">
    </div>
    <h3>Pediatrician (MD Pediatrics)</h3>
    <p>Doctor specializing in the care of infants, children, and adolescents.</p>
    <a href = "pediatrician.html">
      <button id = "pediatrician-button"class = "main-button">Check</button>
    </a>
  </div>


  <div class="card" id="card9">
  <div class="profession-pic9">
      <img src = "main_gynecologist.png">
    </div>
    <h3>Gynecologist (Gynecology)</h3>
    <p>Specialist in women's reproductive health and female  medical conditions.</p>
    <a href ="gynecologist.html">
      <button id = "gynecologist-button"class = "main-button">Check</button>
    </a>
  </div>


  <div class="card" id="card10">
  <div class="profession-pic10">
      <img src = "main_orthopaedic.png">
    </div>
    <h3>Orthopedic Surgeon (MS Orthopedics)</h3>
    <p> Surgeon specializing in the treatment of musculoskeletal conditions and injuries.</p>
    <a href = "orthopedic.html">
      <button id = "orthopedic-button"class = "main-button">Check</button>
    </a>
  </div>


  <div class="card" id="card11">
  <div class="profession-pic11">
      <img src = "main_opthalmologist.png">
    </div>
    <h3>Ophthalmologist (MS Ophthalmology)</h3>
    <p> Specialist in eye care, including diagnosis and treatment of eye.</p>
    <a href = "opthalmologist.html">
      <button id = "ophthalmologist-button"class = "main-button">Check</button>
    </a>
  </div>


  <div class="card" id="card12">
  <div class="profession-pic12">
      <img src = "main_veterinary.png">
    </div>
    <h3>Veterinary Doctor <br>(VMD)</h3>
    <p>Medical professional who provides healthcare services for animals..</p>
    <a href = "veterinary.html">
      <button id = "veterinary-button"class = "main-button">Check</button>
    </a>
  </div>

  
</div>

      <div id="profession-feedback" class="profession-feedback">If you feel like entered profession should be added please fill up the form by clicking on the button below</div>
      <button id="button-feedback" class = "button-feedback">
        <a href = "profession-entry-form.html"> Continue</a></button> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
    <script>
        // List of specialist degrees in the medical field

        const searchBox = document.getElementById('searchBox');
  const searchButton = document.getElementById('searchButton');
  const cardContainer = document.getElementById('cardContainer');

var specialistDegrees = [
 "Doctor (MBBS)",
 "Dentist (BDS/MDS)",
  "Medical Stores",
  "Physiotherapist (BPT/MPT)",
  "Cardiologist (DM Cardiology)",
  "Dermatologist (MD Dermatology)",
  "Psychiatrist (MD Psychiatry)",
  "Pediatrician (MD Pediatrics)",
  "Veterinary (VMD)",
  "Gynecologist (Gynecology)",
  "Orthopedic Surgeon (MS Orthopedics)",
  "Ophthalmologist (MS Ophthalmology)",
];
function handleSearch() {
  var searchBar1 = document.getElementById("searchBox");
  var query = searchBar1.value.toLowerCase();
  var autocompleteList = document.getElementById("autocompleteList");
  
  // Clear previous autocomplete suggestions
  autocompleteList.innerHTML = "";
  
  // Filter specialist degrees that match the search query
  var matches = specialistDegrees.filter(function(specialistDegree) {
    return specialistDegree.toLowerCase().indexOf(query) !== -1;
  });
  
  // Display the matched specialist degrees as autocomplete suggestions
  matches.forEach(function(match) {
    var listItem = document.createElement("li");
    listItem.textContent = match;
    listItem.addEventListener("click", function() {
      searchBar1.value = match;
      autocompleteList.innerHTML = "";
    });
    autocompleteList.appendChild(listItem);
  });
}

// Event listener to hide the autocomplete list when clicking outside the search field
document.addEventListener("click", function(event) {
  var target = event.target;
  var searchBar1 = document.getElementById("searchBox");
  var autocompleteList = document.getElementById("autocompleteList");
  
  if (target !== searchBar1 && target !== autocompleteList) {
    autocompleteList.innerHTML = "";
  }
});


// Attach event listener for search input changes
var searchBar2 = document.getElementById("searchBox");
searchBar2.addEventListener("input", handleSearch);


  searchBox.addEventListener('input', searchCards);
  searchButton.addEventListener('click', searchCards);

  function searchCards() {
  const query = searchBox.value.toLowerCase();
  const cards = cardContainer.getElementsByClassName('card');
  let matchingCardsCount = 0;

  for (let i = 0; i < cards.length; i++) {
    const card = cards[i];
    const title = card.getElementsByTagName('h3')[0].textContent.toLowerCase();

    if (title.includes(query)) {
      card.style.display = 'block';
      matchingCardsCount++;
    } else {
      card.style.display = 'none';
    }
  }

  const message = cardContainer.querySelector('.search-message');
  const requestform = cardContainer.querySelector('.requestform');
  const pf = document.getElementById("profession-feedback");
  const bf = document.getElementById("button-feedback");

  if (matchingCardsCount === 0 && !message) {
    const noCardsMessage = document.createElement('p');
    noCardsMessage.classList.add('search-message');
    noCardsMessage.textContent = 'Sorry, no Profession matched your search';
    cardContainer.appendChild(noCardsMessage);
    pf.style.display = "block";
    bf.style.display = "block";
  } else if (matchingCardsCount > 0 && message) {
    cardContainer.removeChild(message);
    pf.style.display = "none";
    bf.style.display = "none";
  } else if (matchingCardsCount === 0 && query === '') {
    pf.style.display = "none";
    bf.style.display = "none";
  }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
        // Create a new instance of SpeechRecognition
        const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();

        // Set the recognition language
        recognition.lang = 'en-US';

        // Get the search box element
        const searchBox = document.getElementById('searchBox');

        // Define the startButton click event handler
        const speechButton = document.getElementById('speechButton');
        speechButton.addEventListener('click', () => {
          recognition.start();
          speechButton.disabled = true;
        
        
        });

        
        recognition.onresult = (event) => {
          const transcript = event.results[0][0].transcript;
          const resultElement = document.getElementById('result');
          const sanitizedTranscript = transcript.replace(/[.|,]/g, '').trim();
          searchBox.value = sanitizedTranscript;

        };

        // Define the recognition error event handler
        recognition.onerror = (event) => {
          console.error('Speech recognition error:', event.error);
        };

        // Define the recognition end event handler
        recognition.onend = () => {
          speechButton.disabled = false;
          speechButton.style.backgroundColor = "#270044";          
          
        };
      } else {
        alert('Speech recognition is not supported in this browser.');
      }
   
</script>
</body>
</html>