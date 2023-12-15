/*const username = document.getElementById('user');
const password = document.getElementById('pass');

form.addEventListener('submit', e => {
	e.preventDefault();
	
	checkInputs();
});

function checkInputs() {
	// trim to remove the whitespaces
	const usernameValue = username.value.trim();
	const passwordValue = password.value.trim();
	
	if(usernameValue === '') {
		setErrorFor(username, 'Username cannot be blank');
	} else {
		setSuccessFor(username);
	}
	
	if(passwordValue === '') {
		setErrorFor(password, 'Password cannot be blank');
	} else {
		setSuccessFor(password);
	}
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}*/

function validateForm(event) {
    var isValid = true;
    
    // Remove previous error messages and highlights
    var elements = document.getElementsByClassName("validate");
    for (var i = 0; i < elements.length; i++) {
        elements[i].classList.remove("highlight");
    }
    document.getElementById("usernameError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";

    // Client-side validation
    var username = document.getElementById("user").value;
    var password = document.getElementById("pass").value;

    if (username.trim() === "") {
        document.getElementById("usernameError").innerHTML = "Username is required";
        document.getElementById("username").classList.add("highlight");
        isValid = false;
    }

    if (!isValid) {
        console.log("Form not submitted due to validation errors");
        event.preventDefault(); // Prevent the form from submitting
    }else if (password.trim() === "") {
        document.getElementById("passwordError").innerHTML = "Password is required";
        document.getElementById("pass").classList.add("highlight");
        isValid = false;
    }

    if (!isValid) {
        console.log("Form not submitted due to validation errors");
        event.preventDefault(); // Prevent the form from submitting
    }else{
        return isValid;
    }

   // return isValid;  // Form will be submitted if all validation passes
}