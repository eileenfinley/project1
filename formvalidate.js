function validateForm() {
    // Client-side validation
    var username = document.getElementById('user').value;
    var password = document.getElementById('pass').value;
    var isValid = true;

    // Validate username
    if (username === "") {
      document.getElementById('usernameError').innerText = 'Username is required.';
      isValid = false;
    } else {
      document.getElementById('usernameError').innerText = '';
    }

    // Validate password
    if (password === "") {
      document.getElementById('passwordError').innerText = 'Password is required.';
      isValid = false;
    } else {
      document.getElementById('passwordError').innerText = '';
    }

    return isValid;
  }
