//add frontend validation for login modal with id loginModal
document.getElementById('loginModal').addEventListener('submit', function(event){
    var email = document.getElementById('emailInput').value;
    var password = document.getElementById('passwordInput').value;
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    var passwordPattern = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
    var emailError = document.getElementById('emailError');
    var passwordError = document.getElementById('passwordError');
    var isValid = true;
    if(!emailPattern.test(email)){
        emailError.innerHTML = 'Invalid email';
        isValid = false;
    }else{
        emailError.innerHTML = '';
    }
    if(!passwordPattern.test(password)){
        passwordError.innerHTML = 'Invalid password';
        isValid = false;
    }else{
        passwordError.innerHTML = '';
    }
    if(!isValid){
        event.preventDefault();
    }
    if (isValid){
        alert('Login successful');
        //submit the form
        document.getElementById('loginModal').submit();
    }
});


// ADD FRONTEND VALIDATION FOR SIGNUP MODAL
document.getElementById('signupModal').addEventListener('submit', function(event){
    //get inputs for first and lastname
    var firstName = document.getElementById('firstnameInput').value;
    var lastName = document.getElementById('lastnameInput').value;
    var email = document.getElementById('signupEmail').value;
    var password = document.getElementById('signupPassword').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    var passwordPattern = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
    var emailError = document.getElementById('emailError2');
    var passwordError = document.getElementById('passwordError');
    var confirmPasswordError = document.getElementById('confirmPasswordError');
    var firstNameError = document.getElementById('firstNameError');
    var lastNameError = document.getElementById('lastNameError');
    var isValid = true;
    //validate first and last name
    if (firstName === '') {
        firstNameError.innerHTML = 'First name is required';
        isValid = false;

    } else {
        firstNameError.innerHTML = '';
    }

    if (lastName === '') {
        lastNameError.innerHTML = 'Last name is required';
        isValid = false;
    }
    else {
        lastNameError.innerHTML = '';
    }
    if(!emailPattern.test(email)){
        emailError.innerHTML = 'Invalid email';
        isValid = false;
    }else{
        emailError.innerHTML = '';
    }
    if(!passwordPattern.test(password)){
        passwordError.innerHTML = 'Invalid password';
        isValid = false;
    }else{
        passwordError.innerHTML = '';
    }
    if(password !== confirmPassword){
        confirmPasswordError.innerHTML = 'Passwords do not match';
        isValid = false;
    }else{
        confirmPasswordError.innerHTML = '';
    }
    if(!isValid){
        event.preventDefault();
    }
    if (isValid){
        alert('Signup successful');
        //submit the form
        document.getElementById('signupModal').submit();

        //clear the form
        document.getElementById('signupModal').reset();
    }
});