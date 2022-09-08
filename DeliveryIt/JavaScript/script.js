
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