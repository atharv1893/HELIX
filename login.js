
var mail= document.getElementById("#email") 
$.ajax({
  type: 'POST',
  url: 'main.php',
  data: {email: mail },
  success: function(response) {
    console.log(response);
  },
  error: function(xhr, _status, _error) {
    console.log(xhr.responseText);
  }
});

function submit(){
  console.log("established");
}