/*signup validation*/
var form = document.getElementById("signform");
var username = document.getElementById("username");
var email = document.getElementById("email");
var password = document.getElementById("password");
var repass = document.getElementById("repass");
var address = document.getElementById("address")


function showError(input, message) {
  var formController = input.parentElement;
  formController.className = "formcontrollererror";

    
  var small = formController.querySelector("small");
  small.innerText = message;
}

function checkPasswordsMatch(input1, input2) {
  if (input1.value !== input2.value) {
    showError(input2, "Passwords do not match");
  }
}

function checkLength(input, min, max) {
  if (input.value.length < min) {
    showError(input, `${input.id} must be at least ${min} characters`);
  } else if (input.value.length > max) {
    showError(input, `${input.id} must be less than ${max} characters`);
  } else {
    showSuccess(input);
  }
}

function checkRequired(formInput) {
  formInput.forEach(function(input) {
    if (input.value.trim() === "") {
      showError(input, `${input.id} is required`);
    } else {
      showSuccess(input);
    }
  });
}


form.addEventListener("submit", function(func) {
  func.preventDefault();
  checkRequired([username, email, password, repass, address]);
  checkLength(username, 6, 24);
  checkLength(password, 8, 24);
  checkPasswordsMatch(password, repass);
});

/*cart*/
function rateFunction(item,colr){
    item.style.color = colr;
}
function checkout(){
    document.getElementById("ccnum").required = true;
    document.getElementById("expmonth").required = true;
    document.getElementById("expyear").required = true;
    document.getElementById("ccv").required=true;
}
function confirm(){
    alert("order getting to the kitchen! Enjoy your meal ;) ")
}
/*Nav menu*/
function moreFunction(){
    var d = document.getElementById("more");
    d.style.display = 'block';
}
function lessFunction(){
    var d = document.getElementById("more");
    d.style.display = 'none';
}

/*contact us -i guess-*/
function checkInput(){
    var input1=document.getElementById('input1').value;
    var input2=document.getElementById('input2').value;
    var input3=document.getElementById('input3').value;
    
    var pattern1= /[A-Za-z]{3,}/;
    var pattern2= /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
    
    if(input1.match(pattern1)){
        document.getElementById("input1").style.borderBottomColor = "green";
        if(input2.match(pattern2)){
            document.getElementById("input2").style.borderBottomColor = "green";
            if(input3.length != 0){
                document.getElementById("input3").style.borderBottomColor = "green";
            }
            else{
                document.getElementById("input3").style.borderBottomColor = "red";
            }
        }
        else{
            document.getElementById("input2").style.borderBottomColor = "red";
        }
    }
    else{
        document.getElementById("input1").style.borderBottomColor = "red";
    }
    
}
