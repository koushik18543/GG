
function validateForm() {
    var firstname = document.getElementById('firstname').value;
    var email = document.getElementById('email').value;
    var num = document.getElementById('number').value;
    var pass = document.getElementById('psw').value;
    var conirmpass = document.getElementById('confirmpsw').value;

    var errors = [];
    //name field validation
    if (firstname === "") {
        errors.push("Name is required");
    } else if (!/^[a-zA-Z ]*$/.test(firstname)) {
        errors.push("Only alphabets and white space are allowed in the name");
    }
    //email field validation
    if (email === "") {
        errors.push("Email is required");
    } else if(!/^\w+@gmail\.com$/.test(email)){
        errors.push("Please only use google gmail");
    }
    //moblie number field validation
    if(num === ""){
        errors.push("Mobile number is required");
    } else if(num.length < 10){
        errors.push("Mobile number should be of 10 digit");
    } else if(!/^[789]\d{9}$/.test(num)){
        errors.push("Inavlid moblie number format");
    }
    //password field validation
    const password = pass;
    const regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
    if (password === "") {
        errors.push("Password cannot be empty");
      } else if (!regex.test(password)) {
        errors.push("Password must meet the following criteria:");
        if (password.length < 8 || password.length > 15) {
          errors.push("- Length should be between 8 and 15 characters");
        }
        if (!/(?=.*\d)/.test(password)) {
          errors.push("- Must contain at least one digit (0-9)");
        }
        if (!/(?=.*[a-z])/.test(password)) {
          errors.push("- Must contain at least one lowercase letter (a-z)");
        }
        if (!/(?=.*[A-Z])/.test(password)) {
          errors.push("- Must contain at least one uppercase letter (A-Z)");
        }
        if (!/(?=.*[^a-zA-Z0-9])/.test(password)) {
          errors.push("- Must contain at least one special character");
        }
        if (/\s/.test(password)) {
          errors.push("- Should not contain any whitespace characters");
        }
    }
            
    // else if(pass.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/)){
    //     errors.push("Password format incorret")
    // }
    
    //password matching condn remaing
    // else if(pass!==(/^[@#$%^&!]$/)){
    //     errors.push("One specail character is required");
    // } else if(pass.length < 16){
    //     errors.push("Length of the password should be 16");
    // }

    if (errors.length > 0) {
        alert(errors.join("\n")); // Display error messages in an alert box
        document.getElementById("regForm").reset(); // Clear form fields
        return false; // Prevent form submission
    }

    return true; // Allow form submission if validation passes
}