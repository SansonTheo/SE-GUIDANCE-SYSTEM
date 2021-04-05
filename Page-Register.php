<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    </head>
    <body style="min-height: 400px; min-width:600px; padding-top:50px;">
        <div class="window-content" style="height: 880px; flex-direction:column; justify-content:start; width:70%; padding-top:20px;"> <!--height:600px;-->
            <form class="window-add" onsubmit="return validateForm()" action="register.php" method="post">
                <div class="add-form register-form" id="biographics">
                    <span class="span-label"><label class="m-0">Please input the following information:</label></span>
                    <span id="first-span"><label>First Name</label>
                    <input type="text" id="fname" name="firstname"></span>
                    <span><label>Middle Name</label><input type="text" id="mname" name="middlename"></span>
                    <span><label>Last Name</label><input type="text" id="lname" name="lastname"></span>
                    <span><label>Position</label><input type="text" id="position" name="position"></span>
                    <span><label>Department</label><input type="text" id="department" name="department"></span>
                    <span><label>ID No.</label><input type="text" id="idNo" name="idNo"></span>
                    <span><label>Contact No.</label><input type="text" id="contactno" name="contactno"></span>
                    <span style="height:40px; margin:0px"></span>
                    <span><label>Email</label><input type="text" id="email" name="email"></span>
                    <span><label>Password</label><input type="password" id="password" name="password"></span>
                    <span><label>Confirm Password:</label><input type="password" id="confirm" name="confirm"></span>
                    <span>
                        <label>User Type</label>
                        <select name="usertype" id="usertype">
                            <option value="Counselor">Counselor</option>
                            <option value="Teacher">Teacher</option>
                        </select>
                    </span>
                    <span style="flex:10%;">
                        <button type="button" id="return" class="generic-button" style="margin-top:10px; height:100px; width:50%; max-height:80px;">Return</button>
                        <div style="width:40px;"></div>
                        <button type="submit" class="generic-button" style="margin-top:10px; height:100px; width:50%; max-height:80px;">Register</button>
                    </span>
                </div>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
        <script>
            document.getElementById('return').onclick = function(){
                window.location.href = "Page-Login.php";
            }
        </script>
        <script>
            function validateForm(){
                let elementValidate = [
                    document.getElementById("fname"),
                    document.getElementById("mname"),
                    document.getElementById("lname"),
                    document.getElementById("position"),
                    document.getElementById("department"),
                    document.getElementById("idNo"),
                    document.getElementById("contactno"),
                    document.getElementById("email"),
                    document.getElementById("password")
                ];

                let validateLength = elementValidate.length;
                let isEmpty = false;

                for(let i = 0; i < validateLength; i++){
                    if (elementValidate[i].value == "") {
                        elementValidate[i].style.outline = "solid red 3px";
                        isEmpty = true;
                    }
                }

                if(isEmpty == false){
                    let password = document.getElementById("password");
                    let confirm = document.getElementById("confirm");
                    if(password.value != confirm.value){
                        password.style.outline = "solid red 3px";
                        confirm.style.outline = "solid red 3px";
                        alert('Password and its Confirmation don\'t match!');
                        return false;
                    }
                }

                if(isEmpty == true){
                    alert('Please Fill out the Required Forms (Highlighted in Red)');
                    return false;
                }
                else{
                    return true;
                }
            }
        </script>
    </body>

</html>