const formElement = document.querySelector("#form");

formElement.addEventListener("submit",function (e){
    let name = document.querySelector("#name").value;
    let email = document.querySelector("#email").value;

    const formData = {
        name: name,
        email: email
    }

    const jsonDisplay = document.getElementById("jsonDisplay");
    jsonDisplay.innerHTML = "JSON displayed:<br>" + JSON.stringify(formData);
});