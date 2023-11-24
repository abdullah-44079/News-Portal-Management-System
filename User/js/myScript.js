

let errFname="";
let errLname="";
let errUname="";
let errDob="";
let errMail="";
let errPhone="";
let errPassword="";




console.log("Hello world");

function validateForm(){

var fname = document.getElementById('fname').value;
var lname = document.getElementById('lname').value;
var uname = document.getElementById('uname').value;
var dob = document.getElementById('dob').value;
var email = document.getElementById('email').value;
var phone = document.getElementById('phone').value;
var Password = document.getElementById('pass').value;



if (fname==null || fname==""){
    errFname="First Name can't be blank";
    alert(errFname);
    return false; 
}
if (lname==null || lname==""){
    errLname="Last Name can't be blank";
    alert(errLname);
    return false;
}
if (uname==null || uname==""){
    errUname="Name can't be blank";
    alert(errUname);
    return false; 
}



if (dob==null || dob==""){ 
    errDob="Date Of Birth can't be blank";
    alert(errDob)
    return false; 
    
}

if (email==null || email==""){ 
    errMail="Email can't be blank";
    alert(errMail);
    return false; 
    
}

if (phone==null || phone==""){ 
    errPhone="Phone can't be blank";
    alert(errPhone)
    return false; 
    
}


if (Password==null || Password==""){  
    errPassword="password can't be blank";
    alert(errPassword);
    return false; 
}


else{ 

    if(fname.length<5){
        errFname="First Name length should be greater than 5";
        alert(errFname);
        return false;
    }

    if(lname.length<5){
        errLname="Last Name length should be greater than 5";
        alert(errLname);
        return false;
    }
    if(uname.length<10){
        errUname="User Name length should be greater than 5";
        alert(errUname);
        return false;
    }
    if (email.includes("@")==false) {
        errMail="Please enter correct email ID";
        alert(errMail);
        return false;
    }
    if(phone.length<10){
        errPhone="Phone length should be equal to 11";
        alert(errPhone);
        return false;
    }

    
   if(Password.length<8){
        errPassword="Please use more than 8 character in password";
        alert(errPassword);
        return false;
    }

    else{
        errFname="";
        errLname="";
        errUname="";
        errDob="";
        errMail="";
        errPhone="";
        errPassword="";
        return true;
    }
}
}

