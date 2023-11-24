



            let errUname="";
            let errMail="";
            let errDob="";
            let errPassword="";
            let errConfirm="";
            let errGender="";
			let errAddress="";
			let errPhone="";



        function validateForm(){

			
            var uname = document.getElementById('uname').value;
            var email = document.getElementById('email').value;
            var dob = document.getElementById('dob').value;
			var phone = document.getElementById('phone').value;
			var address = document.getElementById('address').value;
            var password = document.getElementById('pass').value;
            var confirmPass = document.getElementById('cpass').value;
			
			
          

            if (uname==null || uname==""){
                errUname="Name can't be blank";
                alert(errUname);
                return false; 
            }
            if (email==null || email==""){ 
                errMail="Email can't be blank";
                alert(errMail);
                return false; 
                
            }


            if (dob==null || dob==""){ 
                errDob="Date Of Birth can't be blank";
                alert(errDob)
                return false; 
                
            }

			if (phone==null || phone==""){ 
                errPhone="Phone can't be blank";
                alert(errPhone)
                return false; 
                
            }

			if (address==null || address==""){ 
                errAddress="Address can't be blank";
                alert(errAddress)
                return false; 
                
            }

            // if (gender==null || gender==""){  
            //     errGender="Gender can't be blank";
            //     alert(errGender);
            //     return false; 
            // }

            if (password==null || password==""){  
                errPassword="password can't be blank";
                alert(errPassword);
                return false; 
            }
            if (confirmPass==null || confirmPass==""){  
                errConfirm="confirm Pass can't be blank";
                alert(errConfirm);
                return false; 
            }
  
            else{ 

                if(uname.length<10){
                    errUname="Name length should be greater than 10";
                    alert(errUname);
                    return false;
                }

				if(phone.length<10){
                    errPhone="Phone length should be equal to 11";
                    alert(errPhone);
                    return false;
                }

                if (email.includes("@")==false) {
                    errMail="Please enter correct email ID";
                    alert(errMail);
                    return false;
                }
               if(password.length<8){
                    errPassword="Please use more than 8 character in password";
                    alert(errPassword);
                    return false;
                }if(password!=confirmPass){
                    errConfirm="Please use same password in both password field";
                    alert(errConfirm);
                    return false;
                }
   
                else{
                    errUname="";
                    errGender="";
                    errConfirm="";
                    errMail="";
                    errDob="";
                    errPassword="";
					errPhone="";
					errAddress="";
                    return true;
                }
            }
        }



    