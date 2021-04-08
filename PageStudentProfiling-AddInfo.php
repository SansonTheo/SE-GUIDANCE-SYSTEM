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
    <body style="min-height: 400px;" onload="newStudent()">
        <div class="title-bar">
            <div class="btn-toggle-nav p-0"  onclick="toggleNav()"><img src="imgs/icon-menu.png" style="height:80%; width:80%;"></div>
            <div class="seal-container"><img src="imgs/wmsu-seal.png"></div>
            <div>Add Student</div>
        </div>
        <aside class="nav-sidebar">
            <ul>
                <li><span>menu</span></li>
                <li><a href="Page-Guidance-Index.php"><img src="imgs/icon-home.png">home</a></li>
                <li><a href="PageStudentProfiling-Index.html"><img src="imgs/icon-student.png">profiling index</a></li>
                <li><a href="PageGuidance-Index.php"><img src="imgs/icon-counseling.png">counseling index</a></li>
                <li><a href="Page-Login.php"><img src="imgs/icon-logout.png">logout</a></li>
            </ul>
        </aside>
        <div class="main-page">
            <div class="main-window" style="padding-top:0px; display:block">
                <div class="window-content" style="height: 600px; flex-direction:column; justify-content:start; margin-bottom:30px; margin-top:30px;"> <!--height:600px;-->
                    <form method="post"  onsubmit="return validateForm()" action="add.php"  class="window-add">
                        <div class="add-form" id="biographics">
                            <span class="span-label"><label class="m-0">Student's basic information</label></span>
                            <span id="first-span"><label>First Name</label>
                            <input type="text" id="firstname" name="firstname" value=""></span>
                            <span><label>Middle Name</label><input type="text" id="middlename" name="middlename" value=""></span>
                            <span><label>Last Name</label><input type="text" id="lastname" name="lastname"></span>
                            <span><label>Birthdate</label><input type="date" id="birthDate" name="birthDate"></span>
                            <span><label>Contact No.</label><input type="text" id="contact" name="contact"></span>
                            <span class="span-button"><span style="flex:5%"></span><span style="flex:5%"></span></span>
                            <span style="height:40px; margin:0px"></span>

                            <span class="span-button">
                                <span style="flex:5%"></span>
                                <button type="button" class="form-nav-button" id="next-1">Next</button>
                                <span style="flex:5%"></span>
                                <button type="button" class="form-nav-button" id="return">Return/Cancel</button>
                                <span style="flex:5%"></span>                                
                            </span>

                            <span class="addform-progressbar" style="height:20px; margin:0px;"><div class="addform-progress" style="width:20%;"></div></span>
                        </div>
                        <div class="add-form" id="address">
                            <span class="span-label"><label class="m-0">Permanent Address</label></span>
                            <span id="first-span"><label>Street</label><input type="text" id="street" name="street"></span>
                            <span><label>Barangay</label><input type="text" id="barangay" name="barangay"></span>
                            <span><label>City</label><input type="text" id="city" name="city"></span>
                            <span><label>Province</label><input type="text" id="province" name="province"></span>

                            <span>
                                <label>Residency Type</label>
                                <select name="isBoarder" id="isBoarder">
                                    <option value="resident">Resident</option>
                                    <option value="boarder">Boarder</option>                                                             
                                    <option value="renting">Renting</option>
                                </select>
                            </span>

                            <span id="boarderAddress" class="span-label"><label  class="m-0">Temporary Address</label></span>
                            <span id="boarderAddress" ><label>Street</label><input type="text" id="boarderStreet" name="boarderStreet"></span>
                            <span id="boarderAddress"><label>Barangay</label><input type="text" id="boarderBarangay" name="boarderBarangay"></span>
                            <span id="boarderAddress"><label>City</label><input type="text" id="boarderCity" name="boarderCity"></span>
                            <span id="boarderAddress"><label>Province</label><input type="text" id="boarderProvince" name="boarderProvince"></span>
                            <span style="height:40px; margin:0px"></span>
                            <span class="span-button">
                                <span style="flex:5%"></span>
                                <button type="button" class="form-nav-button" id="next-2">Next</button>
                                <span style="flex:5%"></span>
                                <button type="button" class="form-nav-button" id="prev-2">Previous</button>
                                <span style="flex:5%"></span>                                
                            </span>
                            <span style="height:40px; margin:0px"></span>
                            <span class="addform-progressbar" style="height:20px; margin:0px;"><div class="addform-progress" style="width:40%;"></div></span>
                        </div>
                        <div class="add-form" id="education">
                            <span class="span-label"><label  class="m-0">Educational Information</label></span>
                            <span id="first-span"><label>Student-ID</label><input type="text" id="studentId" name="studentId"></span>                            
                            <span><label>College</label><input type="text" id="college" name="college"></span>   
                            <span><label>Department</label><input type="text" id="department" name="department"></span>                          
                            <span>
                                <label>Year Level</label>
                                <select name="level" id="level">
                                    <option value="1">1</option>
                                    <option value="2">2</option>                                                             
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </span>
                            <span>
                                <label>Student Status</label>
                                <select name="studentStatus" id="studentStatus">
                                    <option value="returning">Returning</option>
                                    <option value="new">New</option>                                                             
                                    <option value="shiftee">Shiftee</option>
                                    <option value="transferee">Transferee</option>
                                </select>
                            </span>
                            <span class="span-button">
                                <span style="flex:5%"></span>
                                <button type="button" class="form-nav-button" id="next-3">Next</button>
                                <span style="flex:5%"></span>
                                <button type="button" class="form-nav-button" id="prev-3">Previous</button>
                                <span style="flex:5%"></span>                                
                            </span>
                            <span style="height:40px; margin:0px"></span>
                            <span class="addform-progressbar" style="height:20px; margin:0px;"><div class="addform-progress" style="width:60%;"></div></span>                                                                             
                        </div>
                        <div class="add-form" id="personal-data">
                            <span class="span-label"><label  class="m-0">Personal Information</label></span>
                            <span id="first-span">
                                <label>Sex</label>
                                <select name="sex" id="sex">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <label></label><label>Gender (optional)</label><input type="text" id="gender" name="gender">
                            </span>
                            <span>
                                <label style="margin-right:5%;">Height</label>
                                <label style="flex:2%; margin-right:1%;">ft.</label><input type="text" id="heightFt" name="heightFt" style="margin-right:1%;">
                                <label style="flex:2%; margin-right:1%;">in.</label><input type="text" id="heightIn" name="heightIn" style="margin-right:5%;">
                                <label style="flex:2%; margin-right:1%;">Weight kg.</label><input type="text" id="weight" name="weight">
                            </span>
                            <span><label>Complexion</label><input type="text" id="complexion" name="complexion"></span>
                            <span><label>Ethnicity</label><input type="text" id="ethnicity" name="ethnicity"></span>
                            <span><label>Nationality</label><input type="text" id="nationality" name="nationality"></span>
                            <span><label>Religion</label><input type="text" id="religion" name="religion"></span>
                            <span class="span-button">
                                <span style="flex:5%"></span>
                                <button type="button" class="form-nav-button" id="next-4">Next</button>
                                <span style="flex:5%"></span>
                                <button type="button" class="form-nav-button" id="prev-4">Previous</button>
                                <span style="flex:5%"></span>
                            </span>
                            <span style="height:40px; margin:0px"></span>
                            <span class="addform-progressbar" style="height:20px; margin:0px;"><div class="addform-progress" style="width:80%;"></div></span>
                        </div>
                        <div class="add-form" id="family">
                            <span class="span-label"><label  class="m-0">Family Information</label></span>

                            <span class="span-label"><label  class="m-0">Father</label></span>
                            <span id="first-span"><label>Firstname</label><input type="text" id="fatherFirstname" name="fatherFirstname"></span>
                            <span><label>Middlename</label><input type="text" id="fatherMiddlename" name="fatherMiddlename"></span>
                            <span><label>Lastname</label><input type="text" id="fatherLastname" name="fatherLastname"></span>
                            <span><label>Address</label><input type="text" id="fatherAddress" name="fatherAddress"></span>
                            <span><label>Occupation</label><input type="text" id="fatherOccupation" name="fatherOccupation"></span>
                            <span><label>Contact No.</label><input type="text" id="fatherContact" name="fatherContact"></span>

                            <span class="span-label"><label  class="m-0">Mother</label></span>
                            <span><label>Firstname</label><input type="text" id="motherFirstname" name="motherFirstname"></span>
                            <span><label>Middlename</label><input type="text" id="motherMiddlename" name="motherMiddlename"></span>
                            <span><label>Lastname</label><input type="text" id="motherLastname" name="motherLastname"></span>
                            <span><label>Address</label><input type="text" id="motherAddress" name="motherAddress"></span>
                            <span><label>Occupation</label><input type="text" id="motherOccupation" name="motherOccupation"></span>
                            <span><label>Contact No.</label><input type="text" id="motherContact" name="motherContact"></span>

                            <span class="span-label"><label  class="m-0">Guardian (Optional)</label></span>
                            <span><label>Firstname</label><input type="text" id="guardianFirstname" name="guardianFirstname"></span>
                            <span><label>Middlename</label><input type="text" id="guardianMiddlename" name="guardianMiddlename"></span>
                            <span><label>Lastname</label><input type="text" id="guardianLastname" name="guardianLastname"></span>
                            <span><label>Relationship w/ Guardian</label><input type="text" id="guardianRelationship" name="guardianRelationship"></span>
                            <span><label>Address</label><input type="text" id="guardianAddress" name="guardianAddress"></span>
                            <span><label>Occupation</label><input type="text" id="guardianOccupation" name="guardianOccupation"></span>
                            <span><label>Contact No.</label><input type="text" id="guardianContact" name="guardianContact"></span>
                            <span>
                                <label>Civil Status</label>
                                <select name="civilStatus" id="civilStatus">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Separated">Separated</option>
                                    <option value="Widowed">Widowed</option>
                                </select>                                
                            </span>
                            <span id="spouseInfo" class="span-label"><label  class="m-0">Spouse</label></span>
                            <span id="spouseInfo"><label>Firstname</label><input type="text" id="spouseFirstname" name="spouseFirstname"></span>
                            <span id="spouseInfo"><label>Middlename</label><input type="text" id="spouseMiddlename" name="spouseMiddlename"></span>
                            <span id="spouseInfo"><label>Maiden Name</label><input type="text" id="spouseMaidenname" name="spouseMaidenname"></span>
                            <span id="spouseInfo"><label>Lastname</label><input type="text" id="spouseLastname" name="spouseLastname"></span>
                            <span id="spouseInfo"><label>Address</label><input type="text" id="spouseAddress" name="spouseAddress"></span>
                            <span id="spouseInfo"><label>Occupation</label><input type="text" id="spouseOccupation" name="spouseOccupation"></span>
                            <span id="spouseInfo"><label>Contact No.</label><input type="text" id="spouseContact" name="spouseContact"></span>
                            <input type="text" style="display:none; visibility:hidden" id="siblingCount" name="siblingCount" value="-1">
                            <span class="span-label"><label  class="m-0">Siblings</label><button class="sibling-button" type="button" id="addSibling">Add Sibling</button><label style="flex:1%"></label><button class="sibling-button" type="button" id="removeSibling">Remove Sibling</button></span>
                            <!-- <span><label>Firstname</label><input type="text" id="siblingFirstname0" name="siblingLastname0"></span>
                            <span><label>Middlename</label><input type="text" id="siblingMiddlename0" name="siblingMiddlename0"></span>
                            <span><label>Lastname</label><input type="text" id="siblingLastname0" name="siblingFirstname0"></span>
                            <span>
                                <label>Sibling relation</label>
                                <select name="siblingRelation0" id="siblingRelation0">
                                    <option value="brother">Brother</option>
                                    <option value="sister">Sister</option>
                                </select>                                
                            </span> -->
                            <span class="span-button" id="nav-buttons">
                                <span style="flex:5%"></span>
                                <button type="submit" class="form-nav-button" style="flex:50%">Submit</button>
                                <span style="flex:5%"></span>
                                <button type="button" class="form-nav-button" id="prev-5">Previous</button>
                                <span style="flex:5%"></span>
                            </span>
                            <span style="height:40px; margin:0px"></span>
                            <span class="addform-progressbar" style="height:20px; margin:0px;"><div class="addform-progress" style="width:100%;"></div></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
        <script>
            document.getElementById('return').onclick = function(){
                window.location.href = "PageStudentProfiling-Index.html";
            }

            function validateForm(){
                let elementValidate = [
                    document.getElementById("firstname"),
                    document.getElementById("middlename"),
                    document.getElementById("lastname"),
                    document.getElementById("birthDate"),
                    document.getElementById("contact"),
                    document.getElementById("street"),
                    document.getElementById("barangay"),
                    document.getElementById("city"),
                    document.getElementById("province"),
                    document.getElementById("studentId"),
                    document.getElementById("college"),
                    document.getElementById("department"),
                    document.getElementById("heightFt"),
                    document.getElementById("heightIn"),
                    document.getElementById("weight"),
                    document.getElementById("ethnicity"),
                    document.getElementById("nationality"),
                    document.getElementById("religion"),
                    document.getElementById("fatherFirstname"),
                    document.getElementById("fatherMiddlename"),
                    document.getElementById("fatherLastname"),
                    document.getElementById("motherFirstname"),
                    document.getElementById("motherMiddlename"),
                    document.getElementById("motherLastname"),       
                ];

                let validateLength = elementValidate.length;
                let isEmpty = false;

                for(let i = 0; i < validateLength; i++){
                    if (elementValidate[i].value == "") {
                        elementValidate[i].style.outline = "solid red 3px";
                        isEmpty = true;
                    }
                }


                if(document.getElementById('isBoarder').value != 'resident'){
                    let elementValidate = [
                        document.getElementById("boarderStreet"),
                        document.getElementById("boarderBarangay"),
                        document.getElementById("boarderCity"),
                        document.getElementById("boarderProvince")     
                    ];

                    let validateLength = elementValidate.length;

                    for(let i = 0; i < validateLength; i++){
                        if (elementValidate[i].value == "") {
                            elementValidate[i].style.outline = "solid red 3px";
                            isEmpty = true;
                        }
                    }
                }

                if(document.getElementById('civilStatus').value == "Married"){
                    let elementValidate = [
                        document.getElementById("spouseFirstname"),
                        document.getElementById("spouseMiddlename"),
                        document.getElementById("spouseLastname"),
                        document.getElementById("spouseAddress"),  
                        document.getElementById("spouseOccupation"),  
                        document.getElementById("spouseContact")                           
                    ];

                    let validateLength = elementValidate.length;

                    for(let i = 0; i < validateLength; i++){
                        if (elementValidate[i].value == "") {
                            elementValidate[i].style.outline = "solid red 3px";
                            isEmpty = true;
                        }
                    }
                }

                guardianElementValidate = [
                    document.getElementById("guardianFirstname"),
                    document.getElementById("guardianMiddlename"),
                    document.getElementById("guardianLastname"),
                    document.getElementById("guardianRelationship"),
                    document.getElementById("guardianContact")

                ];

                if(guardianElementValidate[0].value != "" || guardianElementValidate[1].value != "" || guardianElementValidate[2].value != ""){
                    let guardianValidateLength = guardianElementValidate.length;
                    for(let i = 0; i < guardianValidateLength; i++){
                        if (guardianElementValidate[i].value == "") {
                            guardianElementValidate[i].style.outline = "solid red 3px";
                            isEmpty = true;
                        }
                    }
                }

                if(document.getElementById('siblingCount').value >= 0){
                    
                    let siblingCount = document.getElementById('siblingCount').value;
                    for(let i = 0; i <= siblingCount; i++){
                        let elementValidate = [
                            document.getElementById("siblingFirstname" + i),
                            document.getElementById("siblingMiddlename" + i),
                            document.getElementById("siblingLastname" + i)                    
                        ];

                        let validateLength = elementValidate.length;

                        for(let i = 0; i < validateLength; i++){
                            if (elementValidate[i].value == "") {
                                elementValidate[i].style.outline = "solid red 3px";
                                isEmpty = true;
                            }
                        }
                    }
                }

                if(isEmpty == true){
                    alert('Please Fill out the Required Forms (Highlighted in Red)')
                    return false;
                }
                else{
                    return true;
                }
            }
        </script>
    </body>

</html>