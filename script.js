const myJSONText = document.getElementById("finalJSONText");
myJSONText.innerHTML = localStorage.getItem("JSONInfo");
// get the form object
const myForm = document.querySelector("#form");
// add event listener for the submit event
myForm.addEventListener("submit", function (e) {
    // get the name and email object's value
    let name = document.querySelector("#name").value;
    let email = document.querySelector("#email").value;
    // if the name is empty
    if(name==null || name==""){
        alert("Enter a name");
        // do not let the submit happen
        e.preventDefault();
        return;
    }
    // if the email is empty
    if(email == null || email == ""){
        alert("Enter an email");
        // do not let the submit happen
        e.preventDefault();
        return;
    }
    // creating object and JSON from the form info
    const personInfo = {Name:name, Email:email};
    let myTextJSON = JSON.stringify(personInfo);
    // storing them in the local computer
    localStorage.setItem("JSONInfo", myTextJSON);
});