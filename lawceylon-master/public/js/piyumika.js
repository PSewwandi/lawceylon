/*tooltip*/

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});

var myInput = document.getElementById("Password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('Password');
    var pass2 = document.getElementById('password_confirmation');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
       
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}
function goBack() {
  window.history.back();
}


$("#input-id").rating();

/* popup login box*/

function openMessage1() {
  document.getElementById("myFormm").style.display = "block";
}
function openMessage2() {
  document.getElementById("notification").style.display = "block";
}
function closeMessage2() {
  document.getElementById("notification").style.display = "none";
}

function closeMessage1() {
  document.getElementById("myFormm").style.display = "none";
}
function check_empty_form1() {
  if (document.getElementById('name').value == "" || document.getElementById('email2').value == "" || document.getElementById('msg1').value == "") {
  alert("Fill All Fields !");
  } else {
    
    alert("Form Submitted Successfully...");
    }
  }



/*popup email*/

function openEmail(){
  document.getElementById("myForme").style.display= "block";
}
function closeEmail() {
  document.getElementById("myForme").style.display = "none";
}
// Validating Empty Field
function check_empty_form2() {
  if (document.getElementById('name').value == "" || document.getElementById('email1').value == "" || document.getElementById('msg').value == "") {
  alert("Fill All Fields !");
  } else {
  document.getElementById('myForme').submit();
  alert("Form Submitted Successfully...");
  }
}