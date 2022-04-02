<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
        <style>
            .error-message{
                display: none;
                color: red;
                font-size: 14px;
            }
        </style>
        <script>
            function validatesignin(){
                    email = document.getElementById('logemail').value;
                    password = document.getElementById('logpsw').value;
                    isValidate = true; 

                    if(email == ''){
                        document.getElementById('log-email-validation-message').style.display = 'block';
                        isValidate = false;
                    }else{
                        document.getElementById('log-email-validation-message').style.display = 'none';
                    }
                
                    if(password == ''){
                        document.getElementById('log_for_password').style.display = 'block';
                        isValidate = false;
                    }else{
                        document.getElementById('log_for_password').style.display = 'none';
                        if(password.length < 8){
                            document.getElementById('log_password_length').style.display = 'block';
                            isValidate = false;
                        }else{
                            document.getElementById('log_password_length').style.display = 'none';
                        }
                    }
                    if(isValidate){
                        document.getElementById("signin-form").submit();
                    }
                }


            function validatesignup(){
                userName = document.getElementById('fullname').value;
                Email = document.getElementById('email').value;
                Password =document.getElementById('psw').value;
                conPassword = document.getElementById('pswcon').value;
                isValidate = true; 

                if(userName == ''){
                    document.getElementById('username-validation-message').style.display = 'block';
                    isValidate = false;
                }else{
                    document.getElementById('username-validation-message').style.display = 'none';
                }

                if(Email == ''){
                    document.getElementById('email-validation-message').style.display = 'block';
                    isValidate = false;
                }else{
                    document.getElementById('email-validation-message').style.display = 'none';
                }
            
                if(Password == ''){
                    document.getElementById('for_password').style.display = 'block';
                    isValidate = false;
                }else{
                    document.getElementById('for_password').style.display = 'none';
                    if(Password.length < 8){
                        document.getElementById('password_length').style.display = 'block';
                    }else{
                        document.getElementById('password_length').style.display = 'none';
                    }
                }
                if(conPassword == ''){
                    document.getElementById('for_con_password').style.display = 'block';
                    isValidate = false;
                }else{
                    document.getElementById('for_con_password').style.display = 'none';
                    if(Password != conPassword){
                        document.getElementById('password_match').style.display = 'block';
                        isValidate = false;
                    }else{
                        document.getElementById('password_match').style.display = 'none';
                    }
                }
                if(isValidate){
                    document.getElementById("signup-form").submit();
                }
            }
            
        </script>
    </head>
    <body>
    <div id="signup" class="bgmodal">
        <form id="signup-form" class="modal-content" method="POST" action="register.php" onsubmit="event.preventDefault(); validatesignup()">
            <div class="container_signup" >
                <span onclick="document.getElementById('signup').style.display='none'" class="close">+</span><br/> 
                <h1 style="color: #f4b41a;">Register account</h1>
                <div class="signdesign">
                    <p style="font-size: x-large;"><b>Sign-up</b></p>
                    <hr style="border-bottom: 1px whitesmoke;" /><br/>
                    <label for="name"><b>Full Name</b></label> <br/>
                    <input type="text" placeholder="Enter your name" name="fullname" id="fullname" class="in"> 
                    <span class="error-message" id="username-validation-message">Username cannot be empty.</span> 
                    <label for="email"><b>Email</b></label> <br/>
                    <input type="text" placeholder="Enter email" name="email" id="email" class="in"> 
                    <span class="error-message" id="email-validation-message">Email cannot be empty.</span> 
                    <label for="psw"><b>Password</b></label> <br/>
                    <input type="password" placeholder="Enter password" name="psw" id="psw" class="in" > 
                    <span class="error-message" id="for_password">Password cannot be empty</span>
                    <span class="error-message" id="password_length">Password must be of atleast 8 characters</span> 
                    <label for="pswconfirm"><b>Confirm Password</b></label> <br/>
                    <input type="password" placeholder="Confirm password" name="pswcon" id="pswcon" class="in" >
                    <span class="error-message" id="for_con_password">Password cannot be empty</span> 
                    <span class="error-message" id="password_match">Password not matched</span> 
                </div>  
                        <button type="submit" class="signbtn">Sign Up</button>
            </div>
        </form>
    </div>
    <div id="signin" class="bgmodal">
        <form id="signin-form" class="modal-content" method="POST" action="login.php" onsubmit="event.preventDefault(); validatesignin()">
            <div class="container_signin" >
                <span onclick="document.getElementById('signin').style.display='none'" class="close">+</span><br/>
                <h1 style="color: #f4b41a;">Warm greeting from Residence</h1>
                <div class="signdesign">
                    <p style="font-size: x-large;"><b>Sign-in</b></p>
                    <hr style="border-bottom: 1px whitesmoke;" /><br/>
                    <label for="email"><b>Email</b></label> <br/>
                    <input type="text" placeholder="Enter email" name="logemail" id="logemail" class="in">
                    <span class="error-message" id="log-email-validation-message">Email cannot be empty.</span>
                    <label for="psw"><b>Password</b></label> <br/>
                    <input type="password" placeholder="Enter password" name="logpsw" id="logpsw" class="in" > 
                    <span class="error-message" id="log_for_password">Password cannot be empty</span>
                    <span class="error-message" id="log_password_length">Password must be of atleast 8 characters</span>
                </div>  
                <input type="submit" class="signbtn" value="Sign In"/>
            </div>
        </form>
    </div>
        
    </body>
</html>
