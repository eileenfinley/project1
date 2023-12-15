function validateForm() {
    // Client-side validation
    var username = document.getElementById('user').value;
    var password = document.getElementById('pass').value;
    var isValid = true;

    // Validate username
    if (username === "") {
      document.getElementById('usernameError').innerText = 'Username is required.';
      document.getElementById("user").style.borderColor = "red";
      isValid = false;
    } else {
      document.getElementById('usernameError').innerText = '';
      document.getElementById("user").style.borderColor = "#E7BCDE";
    }

    // Validate password
    if (password === "") {
      document.getElementById('passwordError').innerText = 'Password is required.';
      document.getElementById("pass").style.borderColor = "red";
      isValid = false;
    } else {
      document.getElementById('passwordError').innerText = '';
      document.getElementById("user").style.borderColor = "#E7BCDE";
    }

    return isValid;
  }
