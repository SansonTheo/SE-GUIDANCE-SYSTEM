<!DOCTYPE html>
<?php include "server.php"?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    </head>
    <body style="min-height: 400px;" onload="editStudent()">
        <div class="title-bar">
            <div class="btn-toggle-nav p-0"  onclick="toggleNav()"><img src="imgs/icon-menu.png" style="height:80%; width:80%;"></div>
            <div class="seal-container"><img src="imgs/wmsu-seal.png"></div>
            <div>Edit Student</div>
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
                    <form method="post"  onsubmit="return validateForm()" action="edit.php"  class="window-add">
                        <?php 
                            $id=$_REQUEST['id'];
                            $record = mysqli_query($link,"SELECT * FROM student WHERE id=$id");
                            $student=mysqli_fetch_array($record);
                        ?>
                        <div class="add-form" id="biographics">
                            <span class="span-label"><label class="m-0">Student's basic information</label></span>
                            <input style="display:none;" id="id" name="id" value="<?php echo $student['id']?>">
                            <span id="first-span"><label>First Name</label>
                            <input type="text" id="firstname" name="firstname" value="<?php echo $student['firstname']?>"></span>
                            <span><label>Middle Name</label><input type="text" id="middlename" name="middlename" value="<?php echo $student['middlename']?>"></span>
                            <span><label>Last Name</label><input type="text" id="lastname" name="lastname" value="<?php echo $student['lastname'] ?>"></span>
                            <span><label>Birthdate</label><input type="date" id="birthDate" name="birthDate" value="<?php echo $student['birthdate'] ?>"></span>
                            <span><label>Contact No.</label><input type="text" id="contact" name="contact" value="<?php echo $student['contactno'] ?>"></span>
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
                            <span id="first-span"><label>Street</label><input type="text" id="street" name="street" value="<?php echo $student['permstreet'] ?>"></span>
                            <span><label>Barangay</label><input type="text" id="barangay" name="barangay" value="<?php echo $student['permbarangay'] ?>"></span>
                            <span><label>City</label><input type="text" id="city" name="city" value="<?php echo $student['permcity'] ?>"></span>
                            <span><label>Province</label><input type="text" id="province" name="province" value="<?php echo $student['permprovince'] ?>"></span>

                            <span>
                                <label>Residency Type</label>
                                <select name="isBoarder" id="isBoarder">
                                    <option value="resident" 
                                        <?php if($student['residencytype']=="resident"){
                                            echo "selected=\"selected\"";
                                        } 
                                        ?>>
                                        Resident
                                    </option>
                                    <option value="boarder" 
                                        <?php if($student['residencytype']=="boarder"){
                                            echo "selected=\"selected\"";
                                        } 
                                        ?>>
                                        Boarder
                                    </option>                                                             
                                    <option value="renting" 
                                        <?php if($student['residencytype']=="renting"){
                                            echo "selected=\"selected\"";
                                        } 
                                        ?>>
                                        Renting
                                    </option>
                                </select>
                            </span>

                            <span id="boarderAddress" class="span-label"><label  class="m-0">Temporary Address</label></span>
                            <span id="boarderAddress" ><label>Street</label><input type="text" id="boarderStreet" name="boarderStreet" value="<?php echo $student['tempstreet'] ?>"></span>
                            <span id="boarderAddress"><label>Barangay</label><input type="text" id="boarderBarangay" name="boarderBarangay" value="<?php echo $student['tempbarangay'] ?>"></span>
                            <span id="boarderAddress"><label>City</label><input type="text" id="boarderCity" name="boarderCity" value="<?php echo $student['tempcity'] ?>"></span>
                            <span id="boarderAddress"><label>Province</label><input type="text" id="boarderProvince" name="boarderProvince" value="<?php echo $student['tempprovince'] ?>"></span>
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
                            <span id="first-span"><label>Student-ID</label><input type="text" id="studentId" name="studentId" value="<?php echo $student['studentid'] ?>"></span>                            
                            <span><label>College</label><input type="text" id="college" name="college" value="<?php echo $student['college'] ?>"></span>   
                            <span><label>Department</label><input type="text" id="department" name="department" value="<?php echo $student['department'] ?>"></span>                          
                            <span>
                                <label>Year Level</label>
                                <select name="level" id="level">
                                    <option value="1"
                                    <?php if($student['level']=="1"){
                                            echo "selected=\"selected\"";
                                        } 
                                    ?>>1</option>
                                    <option value="2"
                                    <?php if($student['level']=="2"){
                                            echo "selected=\"selected\"";
                                        } 
                                    ?>>2</option>                                                             
                                    <option value="3"
                                    <?php if($student['level']=="3"){
                                            echo "selected=\"selected\"";
                                        } 
                                    ?>>3</option>
                                    <option value="4"
                                    <?php if($student['level']=="2"){
                                            echo "selected=\"selected\"";
                                        } 
                                    ?>>4</option>
                                </select>
                            </span>
                            <span>
                                <label>Student Status</label>
                                <select name="studentStatus" id="studentStatus">
                                    <option value="returning"
                                    <?php if($student['status']=="returning"){
                                            echo "selected=\"selected\"";
                                        } 
                                    ?>>Returning</option>
                                    <option value="new"
                                    <?php if($student['status']=="new"){
                                            echo "selected=\"selected\"";
                                        } 
                                    ?>>New</option>                                                             
                                    <option value="shiftee"
                                    <?php if($student['status']=="shiftee"){
                                            echo "selected=\"selected\"";
                                        } 
                                    ?>>Shiftee</option>
                                    <option value="transferee"
                                    <?php if($student['status']=="transferee"){
                                            echo "selected=\"selected\"";
                                        } 
                                    ?>>Transferee</option>
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
                                    <option value="male"
                                    <?php if($student['sex']=="male"){
                                            echo "selected=\"selected\"";
                                        } 
                                    ?>>Male</option>
                                    <option value="female"
                                    <?php if($student['sex']=="female"){
                                            echo "selected=\"selected\"";
                                        } 
                                    ?>>Female</option>
                                </select>
                                <label></label><label>Gender (optional)</label><input type="text" id="gender" name="gender">
                            </span>
                            <span>
                            <label style="margin-right:5%;">Height</label>
                                <label style="flex:2%; margin-right:1%;">ft.</label><input type="text" id="heightFt" name="heightFt" style="margin-right:1%;" value="<?php echo $student['heightft']; ?>">
                                <label style="flex:2%; margin-right:1%;">in.</label><input type="text" id="heightIn" name="heightIn" style="margin-right:5%;" value="<?php echo $student['heightin']; ?>">
                                <label style="flex:2%; margin-right:1%;">Weight kg.</label><input type="text" id="weight" name="weight" value="<?php echo $student['weight'] ?>">
                            </span>
                            <span><label>Complexion</label><input type="text" id="complexion" name="complexion" value="<?php echo $student['complexion'] ?>"></span>
                            <span><label>Ethnicity</label><input type="text" id="ethnicity" name="ethnicity" value="<?php echo $student['ethnicity'] ?>"></span>
                            <span><label>Nationality</label><input type="text" id="nationality" name="nationality" value="<?php echo $student['nationality'] ?>"></span>
                            <span><label>Religion</label><input type="text" id="religion" name="religion" value="<?php echo $student['religion'] ?>"></span>
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
                            <?php 
                                $id=$_REQUEST['id'];
                                $parentRecordQuery = "SELECT * FROM parentrecord WHERE studentid=$id";
                                $parentRecordList = $link->query($parentRecordQuery);
                                while($parentRecord = mysqli_fetch_array($parentRecordList)):
                                    $currentParentId = $parentRecord['parentid'];
                                    $fatherQuery = "SELECT * FROM parent WHERE id=$currentParentId AND relationship='father'";
                                    $motherQuery = "SELECT * FROM parent WHERE id=$currentParentId AND relationship='mother'";
                                    $guardianQuery = "SELECT * FROM parent WHERE id=$currentParentId AND NOT relationship='father' AND NOT relationship='mother'";
                                    $father = mysqli_fetch_array($link->query($fatherQuery));
                                    $mother = mysqli_fetch_array($link->query($motherQuery));
                                    $guardian = mysqli_fetch_array($link->query($guardianQuery));
                                    $guardianId = '';
                                    $guardianFirstname = '';
                                    $guardianMiddlename = '';
                                    $guardianLastname = '';
                                    $guardianRelationship = '';
                                    $guardianAddress = '';
                                    $guardianOccupation = '';
                                    $guardianContact = '';
                                    if($father != NULL){
                                        $fatherId = $father['id'];
                                        $fatherFirstname = $father['firstname'];
                                        $fatherMiddlename = $father['middlename'];
                                        $fatherLastname = $father['lastname'];
                                        $fatherAddress = $father['address'];
                                        $fatherOccupation = $father['occupation'];
                                        $fatherContact = $father['contactno'];
                                    }
                                    else if($mother != NULL){
                                        $motherId = $mother['id'];
                                        $motherFirstname = $mother['firstname'];
                                        $motherMiddlename = $mother['middlename'];
                                        $motherLastname = $mother['lastname'];
                                        $motherAddress = $mother['address'];
                                        $motherOccupation = $mother['occupation'];
                                        $motherContact = $mother['contactno'];
                                    }
                                    else if($guardian != NULL){
                                        $guardianId = $guardian['id'];
                                        $guardianFirstname = $guardian['firstname'];
                                        $guardianMiddlename = $guardian['middlename'];
                                        $guardianLastname = $guardian['lastname'];
                                        $guardianRelationship = $guardian['relationship'];
                                        $guardianAddress = $guardian['address'];
                                        $guardianOccupation = $guardian['occupation'];
                                        $guardianContact = $guardian['contactno'];
                                    }
                                endwhile;
                            ?>
                            <span class="span-label"><label  class="m-0">Father</label></span>
                            <input type="text" style="display:none;" id="fatherId" name="fatherId" value="<?php echo $fatherId ?>">
                            <span id="first-span"><label>Firstname</label><input type="text" id="fatherFirstname" name="fatherFirstname" value="<?php echo $fatherFirstname; ?>"></span>
                            <span><label>Middlename</label><input type="text" id="fatherMiddlename" name="fatherMiddlename" value="<?php echo $fatherMiddlename; ?>"></span>
                            <span><label>Lastname</label><input type="text" id="fatherLastname" name="fatherLastname" value="<?php echo $fatherLastname; ?>"></span>
                            <span><label>Address</label><input type="text" id="fatherAddress" name="fatherAddress" value="<?php echo $fatherAddress; ?>"></span>
                            <span><label>Occupation</label><input type="text" id="fatherOccupation" name="fatherOccupation" value="<?php echo $fatherOccupation; ?>"></span>
                            <span><label>Contact No.</label><input type="text" id="fatherContact" name="fatherContact" value="<?php echo $fatherContact; ?>"></span>

                            <span class="span-label"><label  class="m-0">Mother</label></span>
                            <input style="display:none;" type="text" id="motherId" name="motherId" value="<?php echo $motherId ?>">
                            <span><label>Firstname</label><input type="text" id="motherFirstname" name="motherFirstname" value="<?php echo $motherFirstname; ?>"></span>
                            <span><label>Middlename</label><input type="text" id="motherMiddlename" name="motherMiddlename" value="<?php echo $motherMiddlename; ?>"></span>
                            <span><label>Lastname</label><input type="text" id="motherLastname" name="motherLastname" value="<?php echo $motherLastname; ?>"></span>
                            <span><label>Address</label><input type="text" id="motherAddress" name="motherAddress" value="<?php echo $motherAddress; ?>"></span>
                            <span><label>Occupation</label><input type="text" id="motherOccupation" name="motherOccupation" value="<?php echo $motherOccupation; ?>"></span>
                            <span><label>Contact No.</label><input type="text" id="motherContact" name="motherContact" value="<?php echo $motherContact; ?>"></span>

                            <span class="span-label"><label  class="m-0">Guardian (Optional)</label></span>
                            <input style="display:none;" type="text" id="guardianId" name="guardianId" value="<?php echo $guardianId ?>">
                            <span><label>Firstname</label><input type="text" id="guardianFirstname" name="guardianFirstname" value="<?php echo $guardianFirstname; ?>"></span>
                            <span><label>Middlename</label><input type="text" id="guardianMiddlename" name="guardianMiddlename" value="<?php echo $guardianMiddlename; ?>"></span>
                            <span><label>Lastname</label><input type="text" id="guardianLastname" name="guardianLastname" value="<?php echo $guardianLastname; ?>"></span>
                            <span><label>Relationship w/ Guardian</label><input type="text" id="guardianRelationship" name="guardianRelationship" value="<?php echo $guardianRelationship; ?>"></span>
                            <span><label>Address</label><input type="text" id="guardianAddress" name="guardianAddress" value="<?php echo $guardianAddress; ?>"></span>
                            <span><label>Occupation</label><input type="text" id="guardianOccupation" name="guardianOccupation" value="<?php echo $guardianOccupation; ?>"></span>
                            <span><label>Contact No.</label><input type="text" id="guardianContact" name="guardianContact" value="<?php echo $guardianContact; ?>"></span>
                            <span>
                                <label>Civil Status</label>
                                <?php
                                    $spouse['id'] = 0; 
                                    $spouse['firstname'] = '';
                                    $spouse['middlename'] = '';
                                    $spouse['maidenname'] = '';
                                    $spouse['lastname'] = '';
                                    $spouse['address'] = '';
                                    $spouse['occupation'] = '';
                                    $spouse['contactno'] = '';
                                ?>
                                <select name="civilStatus" id="civilStatus">
                                    <option value="Single"
                                    <?php if($student['civilstatus']=="Single"){
                                            echo "selected=\"selected\"";
                                        } 
                                    ?>>Single</option>
                                    <option value="Married"
                                    <?php if($student['civilstatus']=="Married"){
                                            echo "selected=\"selected\"";
                                            $spouseQuery = "SELECT * FROM spouse WHERE spouseid=$id";
                                            $spouse = mysqli_fetch_array($link->query($spouseQuery));
                                        }
                                    ?>>Married</option>
                                    <option value="Divorced"
                                    <?php if($student['civilstatus']=="Divorced"){
                                            echo "selected=\"selected\"";
                                        } 
                                    ?>>Divorced</option>
                                    <option value="Separated"
                                    <?php if($student['civilstatus']=="Separated"){
                                            echo "selected=\"selected\"";
                                        } 
                                    ?>>Separated</option>
                                    <option value="Widowed"
                                    <?php if($student['civilstatus']=="Widowed"){
                                            echo "selected=\"selected\"";
                                        } 
                                    ?>>Widowed</option>
                                </select>                                
                            </span>
                            <?php $siblingCount = -1; ?>
                            <input style="display:none;" id="spouseId" name="spouseId" value="<?php echo $spouse['id']?>">
                            <span id="spouseInfo" class="span-label"><label  class="m-0">Spouse</label></span>
                            <span id="spouseInfo"><label>Firstname</label><input type="text" id="spouseFirstname" name="spouseFirstname" value="<?php echo $spouse['firstname']; ?>"></span>
                            <span id="spouseInfo"><label>Middlename</label><input type="text" id="spouseMiddlename" name="spouseMiddlename" value="<?php echo $spouse['middlename']; ?>"></span>
                            <span id="spouseInfo"><label>Maiden Name</label><input type="text" id="spouseMaidenname" name="spouseMaidenname" value="<?php echo $spouse['maidenname']; ?>"></span>
                            <span id="spouseInfo"><label>Lastname</label><input type="text" id="spouseLastname" name="spouseLastname" value="<?php echo $spouse['lastname']; ?>"></span>
                            <span id="spouseInfo"><label>Address</label><input type="text" id="spouseAddress" name="spouseAddress" value="<?php echo $spouse['address']; ?>"></span>
                            <span id="spouseInfo"><label>Occupation</label><input type="text" id="spouseOccupation" name="spouseOccupation" value="<?php echo $spouse['occupation']; ?>"></span>
                            <span id="spouseInfo"><label>Contact No.</label><input type="text" id="spouseContact" name="spouseContact" value="<?php echo $spouse['contactno']; ?>"></span>
                            <input type="text" style="display:none;" id="siblingCount" name="siblingCount" value="<?php $siblingCount = mysqli_num_rows($link->query("SELECT * FROM siblingrecord WHERE studentid=$id")) - 1; echo $siblingCount; ?>">
                            <input type="text" style="display:none;" id="siblingToDeleteCount" name="siblingToDeleteCount" value="<?php $siblingToDeleteCount = 0; echo $siblingToDeleteCount ?>">
                            <input type="text" style="display:none;" id="siblingExisting" name="siblingExisting" value="<?php echo $siblingCount; ?>">
                            <span class="span-label"><label  class="m-0">Siblings</label><button class="sibling-button" type="button" id="addSibling">Add Sibling</button><label style="flex:1%"></label><button class="sibling-button" type="button" id="removeSibling">Remove Sibling</button></span>
                            <?php 
                                $siblingRecordQuery = "SELECT * FROM siblingrecord WHERE studentid=$id";
                                $siblingRecordList = $link->query($siblingRecordQuery);
                                if($siblingCount > -1){
                                    $i = 0; 
                                    while($siblingRecord = mysqli_fetch_array($siblingRecordList)):
                                        $currentSiblingId = $siblingRecord['siblingid'];
                                        $siblingQuery = "SELECT * FROM sibling WHERE id=$currentSiblingId";
                                        $sibling = mysqli_fetch_array($link->query($siblingQuery));
                            ?>          
                                        <input style="display:none;" type="text" id="siblingWillDelete<?php echo $i ?>" name="siblingWillDelete<?php echo $i ?>" value="false" >
                                        <input style="display:none;" type="text" id="siblingDeleteValue<?php echo $i ?>" name="siblingDeleteValue<?php echo $i ?>" value="<?php echo $sibling['id']; ?>" >
                                        <span id="siblingSpan<?php echo $i ?>" style="display:none;"><input type="text" id="siblingId<?php echo $i ?>" name="siblingId<?php echo $i ?>" value="<?php echo $sibling['id']; ?>"></span>
                                        <span id="siblingSpan<?php echo $i ?>"><label>Firstname</label><input type="text" id="siblingFirstname<?php echo $i ?>" name="siblingFirstname<?php echo $i ?>" value="<?php echo $sibling['firstname']; ?>"></span>
                                        <span id="siblingSpan<?php echo $i ?>"><label>Middlename</label><input type="text" id="siblingMiddlename<?php echo $i ?>" name="siblingMiddlename<?php echo $i ?>"  value="<?php echo $sibling['middlename']; ?>"></span>
                                        <span id="siblingSpan<?php echo $i ?>"><label>Lastname</label><input type="text" id="siblingLastname<?php echo $i ?>" name="siblingLastname<?php echo $i ?>"  value="<?php echo $sibling['lastname']; ?>"></span>
                                        <span id="siblingSpan<?php echo $i ?>">
                                            <label>Sibling relation</label>
                                            <select name="siblingRelation<?php echo $i ?>" id="siblingRelation<?php echo $i ?>" >
                                                <option value="brother"
                                                <?php 
                                                    if($sibling['relationship']=="brother"){
                                                        echo "selected=\"selected\"";
                                                    } 
                                                ?>>Brother</option>
                                                <option value="sister"
                                                <?php 
                                                    if($sibling['relationship']=="sister"){
                                                        echo "selected=\"selected\"";
                                                    } 
                                                ?>>Sister</option>
                                             </select>  
                                             <button type="button" class="form-nav-button" name="<?php echo $i ?>" id="removeSiblingSpecific" style="margin-left:10px; flex:20%;">Remove this sibling</button>
                                        </span>
                                        <span id="siblingSpan<?php echo $i ?>" style="height:40px;"></span>
                            <?php       $i++;
                                    endwhile; 
                                } ?>
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
        <script src="js/editStudent.js"></script>
        <script>
            document.getElementById('return').onclick = function(){
                window.location.href = "PageStudentProfiling-View.php?id=<?php echo $id; ?>";
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