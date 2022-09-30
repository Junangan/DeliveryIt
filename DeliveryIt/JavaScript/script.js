
function ManageProfitshowPassword(){
	var password = document.getElementById('NewVolunteerpassword');
	if(password.type === "password"){
		password.type = "text";
	}
	else{
		password.type = "password";
	}
}

function SignUpshowPassword(){
	var password = document.getElementById('Volunteerpassword');
	if(password.type === "password"){
		password.type = "text";
	}
	else{
		password.type = "password";
	}
}

function LoginshowPassword(){
	var password = document.getElementById('LoginPassword');
	if(password.type === "password"){
		password.type = "text";
	}
	else{
		password.type = "password";
	}
}

function showStaffPassword(){
	var password = document.getElementById('StaffPassword');
	if(password.type === "password"){
		password.type = "text";
	}
	else{
		password.type = "password";
	}
}

function SignUp_Validate(){
	var whitespace = /\s/g;
	var NumOrSpecialChar = /[^A-z^\s]/g;
	if(document.getElementById('name').value.match(whitespace)!=null || 
		document.getElementById('password').value.match(whitespace)!=null){
		alert('Username and Password cannot have any spacebar,please enter again!');
		if(document.getElementById('name').value.match(whitespace)!=null){
			document.getElementById('name').value = '';
		}
		if(document.getElementById('password').value.match(whitespace)!=null){
			document.getElementById('password').value = '';
		}
		return false;
	}
	else if(document.getElementById('Email').value.match(NumOrSpecialChar)!=null){
		alert('Full name cannot have any number or special character');
		document.getElementById('Email').value = '';
		return false;
	}
	else if(isNaN(document.getElementById('PhoneNumber').value)==true){
		alert('The Phone Number only can be number, please enter again!');
		document.getElementById('PhoneNumber').value = '';
		return false;
	}
	else{
		return true;
	}
}

function Login_Validate(){
	var whitespace = /\s/g;
	if(document.getElementById('LoginName').value.match(whitespace)!=null || 
		document.getElementById('LoginPassword').value.match(whitespace)!=null){
		alert('Usernameand Password cannot have any spacebar,please enter again!');
		if(document.getElementById('LoginName').value.match(whitespace)!=null){
			document.getElementById('LoginName').value = '';
		}
		if(document.getElementById('LoginPassword').value.match(whitespace)!=null){
			document.getElementById('LoginPassword').value = '';
		}
		return false;
	}
	else{
		return true;
	}
}


function Volunteer_Validate(){
	var whitespace = /\s/g;
	var NumOrSpecialChar = /[^A-z^\s]/g;
	if(document.getElementById('NewVolunteername').value.match(whitespace)!=null || 
		document.getElementById('NewVolunteerpassword').value.match(whitespace)!=null){
		alert('Username and Password cannot have any spacebar,please enter again!');
		if(document.getElementById('NewVolunteername').value.match(whitespace)!=null){
			document.getElementById('NewVolunteername').value = '';
		}
		if(document.getElementById('NewVolunteerpassword').value.match(whitespace)!=null){
			document.getElementById('NewVolunteerpassword').value = '';
		}
		return false;
	}
	else if(document.getElementById('NewVolunteerFullname').value.match(NumOrSpecialChar)!=null){
		alert('Full name cannot have any number or special character');
		document.getElementById('NewVolunteerFullname').value = '';
		return false;
	}
	else if(isNaN(document.getElementById('NewVolunteerPhoneNumber').value)==true){
		alert('The Phone Number only can be number, please enter again!');
		document.getElementById('NewVolunteerPhoneNumber').value = '';
		return false;
	}
	else if(document.getElementById('DocumentUpload').disabled==false){
		var image = document.getElementById('image').files[0];
        if (image.size/1024 >= 3096) {
            alert("File too Big, please select a file less than 3mb");
            return false;
        }
	}
	else if(document.getElementById('CredentialType').value == "" && 
		document.getElementById('VolunteerCredential').value != "" &&
			isNaN(document.getElementById('VolunteerCredential').value)==false){
		alert('You must select credential type!');
		document.getElementById('CredentialType').value = "";
		document.getElementById('VolunteerCredential').value = "";
		return false;
	}
	else if(document.getElementById('CredentialType').value != "" && 
		(document.getElementById('VolunteerCredential').value == "" ||
			isNaN(document.getElementById('VolunteerCredential').value)==true)){
		alert('You must enter credential number! (Only can enter number)');
		document.getElementById('CredentialType').value = "";
		document.getElementById('VolunteerCredential').value = '';
		return false;
	}
	else{
		return true;
	}
}

function minusNum(id){
	var numberPlace = document.getElementById(id);
	if(numberPlace.value==0){
		var number = 0;
	}
	else{
		var number = parseInt(numberPlace.value);
	}
	var min = 0;
    if (number>min){
        number = number-1; /// Minus 1 of the number   
        numberPlace.value = number;
    }
    if(number == min) {        
        numberPlace.style.color= "red";
        setTimeout(function(){numberPlace.style.color= "black"},500)
    }
    else {
      	numberPlace.style.color="black";            
    }
}

function addNum(id){
	var numberPlace = document.getElementById(id);
	if(numberPlace.value==0){
		var number = 0;
	}
	else{
		var number = parseInt(numberPlace.value);
	}
    number = number+1;
    numberPlace.value = number;
}

function show() {
  document.getElementById("myDropdown").classList.toggle("show");
  if (document.getElementById("icon").className == "fa fa-angle-up"){
  	document.getElementById("icon").className = "fa fa-angle-down"
  }
  else{
  	document.getElementById("icon").className = "fa fa-angle-up";
  }
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("allRestaurant");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}

function sortListByName() {
  show();
  var list, i, switching, b, shouldSwitch;
  list = document.getElementById("allRestaurant");
  switching = true;
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // start by saying: no switching is done:
    switching = false;
    b = list.getElementsByTagName("a");
    // Loop through all list-items:
    for (i = 0; i < (b.length); i++) {
      // start by saying there should be no switching:
      shouldSwitch = false;
      /* check if the next item should
      switch place with the current item: */
      if (b[i].innerText.toLowerCase() > b[i + 1].innerText.toLowerCase()) {
        /* if next item is alphabetically
        lower than current item, mark as a switch
        and break the loop: */
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark the switch as done: */
      b[i].parentNode.insertBefore(b[i + 1], b[i]);
      switching = true;
    }
  }
}

function reverseSortListByName() {
  show();
  var list, i, switching, b, shouldSwitch;
  list = document.getElementById("allRestaurant");
  switching = true;
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // start by saying: no switching is done:
    switching = false;
    b = list.getElementsByTagName("a");
    // Loop through all list-items:
    for (i = 0; i < (b.length); i++) {
      // start by saying there should be no switching:
      shouldSwitch = false;
      /* check if the next item should
      switch place with the current item: */
      if (b[i].innerText.toLowerCase() < b[i + 1].innerText.toLowerCase()) {
        /* if next item is alphabetically
        lower than current item, mark as a switch
        and break the loop: */
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark the switch as done: */
      b[i].parentNode.insertBefore(b[i + 1], b[i]);
      switching = true;
    }
  }
}

function clearFilter(){
	window.location.reload();
}