<!DOCTYPE html>
<?php include "server.php"?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="css/profiling.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    </head>
    <body style="min-height: 0px; min-width: 500px;">
        <div class="title-bar">
            <div class="btn-toggle-nav p-0"  onclick="toggleNav()"><img src="imgs/icon-menu.png" style="height:80%; width:80%;"></div>
            <div class="seal-container"><img src="imgs/wmsu-seal.png"></div>
            <div>View Student</div>
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
            <div class="main-window">
                <div class="window-content view-student-window" style="flex-direction: column; padding:0px;">
                    <div class="row m-0" style="width:100%; height:90%; overflow:hidden !important; flex:90%;">
                        <div class="col-12 col-md-4 view-student-container" style="border-right:solid #521818 1px;">
                            <?php 
                                $id=$_REQUEST['id'];
							    $record = mysqli_query($link,"SELECT * FROM student WHERE id=$id");
                                $student=mysqli_fetch_array($record);
                            ?>
                            <div class="info-label">Biographics:</div>
                            <div class="info-whitebox">                                
                                <p>
                                    <?php echo $student['firstname']." ".$student['middlename']." ".$student['lastname']; ?>
                                </p>
                                <div class="box">
                                    <div class="info-whitebox-label" style="left:-45px;">
                                        Name
                                    </div>
                                </div>
                            </div>
                            <span style="flex:50%; display:flex; width:90%;">
                                <div class="info-whitebox" style="flex:25%;margin-right:1%;">
                                    <p>
                                        <?php
                                            $bday = new DateTime($student['birthdate']);
                                            $today = new DateTime(date('m.d.y'));
                                            $diff = $today->diff($bday); 
                                            echo ($diff->y);
                                        ?>
                                    </p>
                                    <div class="box">
                                        <div class="info-whitebox-label" style="left:-30px;">
                                            Age
                                        </div>
                                    </div>
                                </div>
                                <div class="info-whitebox" style="flex:40%;margin:0px;">
                                    <p>
                                        <?php echo $student['birthdate']; ?>
                                    </p>
                                    <div class="box">
                                        <div class="info-whitebox-label" style="top:-20px; left:-60px; font-size:13px;">
                                            Birthdate
                                        </div>
                                    </div>
                                </div>
                                <div class="info-whitebox" style="flex:35%;margin-left:1%;">
                                    <p>
                                        <?php echo $student['sex']; ?>
                                    </p>
                                    <div class="box">
                                        <div class="info-whitebox-label" style="left:-28px;">
                                            Sex
                                        </div>
                                    </div>
                                </div>
                            </span>
                            <div class="info-whitebox">
                                <p>
                                    <?php echo $student['contactno']; ?>
                                </p>
                                <div class="box">
                                    <div class="info-whitebox-label" style="left:-85px;">
                                        Contact No.
                                    </div>
                                </div>
                            </div>
                                <div class="info-whitebox">
                                <p>
                                    <?php echo $student['permstreet'].", ".$student['permbarangay'].", ".$student['permprovince'].", ".$student['permcity']; ?>
                                </p>
                                <div class="box">
                                    <div class="info-whitebox-label" style="left:-140px;">
                                        Permanent Address
                                    </div>
                                </div>
                            </div>
                            <div class="info-whitebox">
                                <p>
                                   <?php 
                                        //$tempstreet = $student['tempstreet'] ?? '';
                                        echo $student['tempstreet'].", ".$student['tempbarangay'].", ".$student['tempprovince'].", ".$student['tempcity']; //$tempstreet;
                                   ?>
                                </p>
                                <div class="box">
                                    <div class="info-whitebox-label" style="left:-140px;">
                                        Temporary Address
                                    </div>
                                </div>
                            </div>
                            <span style="flex:50%; display:flex; width:90%;">
                                <div class="generic-button" id="viewSiblingModal" style="height:100%; flex:50%; margin-right:1%;">Siblings</div>
                                <div class="generic-button" id="viewParentModal" style="height:100%; flex:50%; margin-left:1%;">Parents/Guardian</div> 
                            </span> 
                        </div>
                        <div class="col-12 col-md-4 view-student-container" style="border-right:solid #521818 1px;">
                            <div class="info-label">Educational:</div>
                            <div class="info-whitebox">
                                <p>
                                    <?php echo $student['studentid']; ?>
                                 </p>
                                <div class="box">
                                    <div class="info-whitebox-label" style="left:-20px;">
                                        ID
                                    </div>
                                </div>
                            </div>
                            <div class="info-whitebox">
                                <p>
                                <?php echo $student['college']; ?>
                                 </p>
                                <div class="box">
                                    <div class="info-whitebox-label" style="left:-55px;">
                                        College
                                    </div>
                                </div>
                            </div>
                            <span style="flex:50%; display:flex; width:90%;">
                                <div class="info-whitebox" style="flex:80%;margin-right:1%;">
                                    <p>
                                    <?php echo $student['department']; ?>
                                     </p>
                                    <div class="box">
                                        <div class="info-whitebox-label" style="left:-85px;">
                                            Department
                                        </div>
                                    </div>
                                </div>
                                <div class="info-whitebox" style="flex:20%;margin:left;">
                                    <p>
                                    <?php echo $student['level']; ?>
                                     </p>
                                    <div class="box">
                                        <div class="info-whitebox-label" style="top:-20px; left:-40px; font-size:13px;">
                                            Yr. Lvl.
                                        </div>
                                    </div>
                                </div>
                            </span>
                            <span style="flex:50%; display:flex; width:90%;">
                                <div class="info-whitebox">
                                    <p>
                                        <?php echo $student['sessions']; ?>
                                     </p>
                                    <div class="box">
                                        <div class="info-whitebox-label" style="left:-94px; font-size:13px;">
                                            No. of Sessions
                                        </div>
                                    </div>
                                </div>
                                <div class="generic-button" id="viewSessionModal" style="height:100%; flex:50%; margin-left:2%;">Sessions</div>
                            </span>               
                        </div>
                        <div class="col-12 col-md-4 view-student-container">
                            <div class="info-label">Personal:</div>
                            <span style="flex:50%; display:flex; width:90%;">
                                <div class="info-whitebox" style="flex:50%;margin-right:1%;">
                                    <p>
                                    <?php echo $student['height']."cm"; ?>
                                     </p>
                                    <div class="box">
                                        <div class="info-whitebox-label" style="left:-49px;">
                                            Height
                                        </div>
                                    </div>
                                </div>
                                <div class="info-whitebox" style="flex:50%;margin:left;">
                                    <p>
                                    <?php echo $student['weight']."kg"; ?>
                                     </p>
                                    <div class="box">
                                        <div class="info-whitebox-label" style="left:-52px;">
                                            Weight
                                        </div>
                                    </div>
                                </div>
                            </span>
                            <div class="info-whitebox">
                                <p>
                                <?php echo $student['complexion']; ?>
                                 </p>
                                <div class="box">
                                    <div class="info-whitebox-label" style="left:-84px;">
                                        Complexion
                                    </div>
                                </div>
                            </div>
                            <div class="info-whitebox">
                                <p>
                                    <?php echo $student['gender']; ?>
                                 </p>
                                <div class="box">
                                    <div class="info-whitebox-label" style="left:-52px;">
                                        Gender
                                    </div>
                                </div>
                            </div>
                            <span style="flex:50%; display:flex; width:90%;">
                                <div class="info-whitebox" style="flex:50%;margin-right:1%;">
                                    <p>
                                        <?php echo $student['ethnicity']; ?>
                                     </p>
                                    <div class="box">
                                        <div class="info-whitebox-label" style="left:-62px;">
                                            Ethnicity
                                        </div>
                                    </div>
                                </div>
                                <div class="info-whitebox" style="flex:50%;margin:left;">
                                    <p>
                                        <?php echo $student['nationality']; ?>
                                     </p>
                                    <div class="box">
                                        <div class="info-whitebox-label" style="left:-78px; ">
                                            Nationality
                                        </div>
                                    </div>
                                </div>
                            </span>
                            <div class="info-whitebox">
                                <p>
                                    <?php echo $student['religion']; ?>
                                 </p>
                                <div class="box">
                                    <div class="info-whitebox-label" style="left:-58px;">
                                        Religion
                                    </div>
                                </div>
                            </div>
                            <span style="flex:50%; display:flex; width:90%;">
                                <div class="info-whitebox">
                                    <p>
                                        <?php echo $student['civilstatus']; ?>
                                    </p>
                                    <div class="box">
                                        <div class="info-whitebox-label" style="left:-78px;">
                                            Civil Status
                                        </div>
                                    </div>
                                </div>
                                <?php if($student['civilstatus'] == 'Married'){ ?>
                                <div class="generic-button" id="viewSpouseModal" style="height:100%; flex:50%; margin-left:1%;">View Spouse</div>
                                <?php } ?> 
                            </span>                   
                        </div>
                    </div>
                    <div class="buttons-container" style="width:100%; flex:10%; max-height:90px;">
                        <span style="flex:70%; display:flex; width:90%;">
                            <a href="PageStudentProfiling-ViewList.php" class="generic-button" id="return" style="height:100%; flex:50%; margin-right:1%;">Return</a>
                            <a href="#" class="generic-button" id="viewDeleteModal" style="height:100%; flex:50%; margin-left:1%;">Delete</a>
                            <a href="PageStudentProfiling-EditInfo.php?id=<?php echo $id ?>" class="generic-button" id="edit" style="height:100%; flex:50%; margin-left:1%;">Edit</a>
                            <a href="PageStudentProfiling-UpdateInfo.php?id=<?php echo $id ?>" class="generic-button" id="update" style="height:100%; flex:50%; margin-left:1%;">Update</a>
                        </span>
                        <div style="flex:10%;"></div>   
                        <a class="generic-button" id="viewUpdateModal" style="height:100%; flex:40%; margin-right:1%;">Update History</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="parentModal">
            <div class="modal-window" style="min-height:200px;">
                <div style="display:flex;align-items:center;width:90%;flex:5%;font-weight:500;font-size:20px;">
                    <div>
                        Parents/Guardians:
                    </div>
                </div>
                <div class="list-window">
                    <table class="list-table">
                        <tr>
                            <td class="parent-name  list-label" style="width:22%;">
                                Name
                            </td>
                            <td class="parent-relationship list-label" style="width:17%;">
                                Relationship
                            </td>
                            <td class="parent-occupation list-label" style="width:23%;">
                                Occupation
                            </td>
                            <td class="parent-address list-label" style="width:23%;">
                                Address
                            </td>
                            <td class="parent-contact list-label" style="width:15%;">
                                Contact No.
                            </td>
                        </tr>
                        <?php
                            $parentRecordQuery = "SELECT * FROM parentrecord WHERE studentid=$id";
                            $parentRecordList = $link->query($parentRecordQuery);
                            if ($parentRecordList->num_rows > 0) {
                                while($parentRecord = mysqli_fetch_array($parentRecordList)):
                                    $currentParentId = $parentRecord['parentid'];
                                    $parentQuery = "SELECT * FROM parent WHERE id=$currentParentId";
                                    $parentList = $link->query($parentQuery);
                                    $parentRow = mysqli_fetch_array($parentList);
                        ?>
                        <tr>
                            <td style="display:none;"><?php echo $parentRow['id']?></td>
                            <td class="parent-name" style="width:22%;">
                                <?php echo $parentRow['firstname']." ".$parentRow['middlename']." ".$parentRow['lastname'];?>
                            </td>
                            <td class="parent-relationship" style="width:17%;">
                                <?php echo $parentRow['relationship']; ?>
                            </td>
                            <td class="parent-occupation" style="width:23%;">
                                <?php echo $parentRow['occupation']; ?>
                            </td>
                            <td class="parent-address" style="width:23%;">
                                <?php echo $parentRow['address']; ?>
                            </td>
                            <td class="parent-contact" style="width:15%;">
                                <?php echo $parentRow['contactno']; ?>
                                
                            </td>
                        </tr>
                        <?php 	    
                                            endwhile;
										}
                        ?>
                    </table>
                </div>
                <div class="list-button">
                    <div style="flex:50%;"></div>
                    <button class="form-nav-button" id="closeParentModal">Return</button>
                </div>
            </div>
        </div>
        <div class="modal" id="siblingModal">
            <div class="modal-window" style="min-height:200px; width:60%;">
                <div style="display:flex;align-items:center;width:90%;flex:5%;font-weight:500;font-size:20px;">
                    <div>
                        Siblings:
                    </div>
                </div>
                <div class="list-window">
                    <table class="list-table">
                        <tr>
                            <td class="sibling-name  list-label" style="width:70%;">
                                Name
                            </td>
                            <td class="sibling-relationship list-label" style="width:370%;">
                                Relationship
                            </td>
                        </tr>
                        <?php
                            $siblingRecordQuery = "SELECT * FROM siblingrecord WHERE studentid=$id";
                            $siblingRecordList = $link->query($siblingRecordQuery);
                            if ($siblingRecordList->num_rows > 0) {
                                while($siblingRecord = mysqli_fetch_array($siblingRecordList)):
                                    $currentSiblingId = $siblingRecord['siblingid'];
                                    $siblingQuery = "SELECT * FROM sibling WHERE id=$currentSiblingId";
                                    $siblingList = $link->query($siblingQuery);
                                    $siblingRow = mysqli_fetch_array($siblingList);
                        ?>
                        <tr>
                            <td style="display:none;"><?php echo $siblingRow['id']?></td>
                            <td class="sibling-name" style="width:70%;">
                                <?php echo $siblingRow['firstname']." ".$siblingRow['middlename']." ".$siblingRow['lastname'];?>
                            </td>
                            <td class="sibling-relationship" style="width:30%;">
                                <?php echo $siblingRow['relationship']; ?>
                            </td>
                        </tr>
                        <?php 	    
                                endwhile;
                            }
                        ?>
                    </table>
                </div>
                <div class="list-button">
                    <div style="flex:50%;"></div>
                    <button class="form-nav-button" id="closeSiblingModal">Return</button>
                </div>
            </div>
        </div>
        <div class="modal" id="sessionModal">
            <div class="modal-window" style="min-height:200px;">
                <div style="display:flex;align-items:center;width:90%;flex:5%;font-weight:500;font-size:20px;">
                    <div>
                        Sessions:
                    </div>
                </div>
                <div class="list-window">
                    <table class="list-table">
                        <tr>
                            <td class="session-counselor  list-label" style="width:30%;">
                                Counselor
                            </td>
                            <td class="session-date list-label" style="width:25%;">
                                Date
                            </td>
                            <td class="session-time list-label" style="width:25%;">
                                Time
                            </td>
                            <td class="session-status list-label" style="width:20%;">
                                Status
                            </td>
                        </tr>
                        <?php 
                            //SESSION PHP GOES HERE
                        ?>
                        <tr>
                            <td class="session-counselor" style="width:30%;">
                                Jean Morgan
                            </td>
                            <td class="session-date" style="width:25%;">
                                07/14/2021
                            </td>
                            <td class="session-time" style="width:25%;">
                                8AM
                            </td>
                            <td class="session-status" style="width:20%;">
                                Ongoing
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="list-button">
                    <div style="flex:50%;"></div>
                    <button class="form-nav-button" id="closeSessionModal">Return</button>
                </div>
            </div>
        </div>
        <div class="modal" id="updateModal">
            <div class="modal-window" style="min-height:200px;">
                <div style="display:flex;align-items:center;width:90%;flex:5%;font-weight:500;font-size:20px;">
                    <div>
                        Information Updates:
                    </div>
                </div>
                <div class="list-window">
                    <div class="notification-container" style="margin:auto; width:100%; padding:10px;">
                        <?php
                            $updateRecordQuery = "SELECT * FROM changerecord WHERE studentid=$id";
                            $updateRecordList = $link->query($updateRecordQuery);
                            if ($updateRecordList->num_rows > 0){
                                while($updateRecord = mysqli_fetch_array($updateRecordList)):
                        ?>
                        <div style="padding:15px; height:100px;">
                            <h2><?php echo $updateRecord['changestr'] ?></h2>
                            <h2><?php echo $updateRecord['datechanged'] ?></h2>
                        </div>
                        <?php
                                endwhile;
                            }
                        ?>
                    </div>
                </div>
                <div class="list-button">
                    <div style="flex:50%;"></div>
                    <button class="form-nav-button" id="closeUpdateModal">Return</button>
                </div>
            </div>
        </div>
        <div class="modal" id="deleteModal">
            <form style="display:none;" id="deleteStudent" name="deleteStudent" method="post" action="delete.php">
                <input id="deleteId" name="deleteId" form="deleteStudent" value="<?php echo $id; ?>">
            </form>
            <div class="modal-window" style="height:250px; width:300px;">
                <div style="display:flex;align-items:center;flex-direction:column;width:90%;flex:5%;font-weight:500;font-size:20px;">
                    <div style="margin-top:20px;">
                        Are you Sure you want to delete this Student?
                    </div>
                    <div>
                        CANNOT BE UNDONE!
                    </div>
                </div>
                <div class="list-button">
                    <div style="flex:4%;"></div>
                    <button class="form-nav-button" id="closeDeleteModal">No</button>
                    <div style="flex:5%;"></div>
                    
                    <button type="submit" class="form-nav-button" id="deleteModal" form="deleteStudent">Yes</button>
                    <div style="flex:4%;"></div>
                </div>
            </div>
        </div>
        <div class="modal" id="spouseModal">
            <div class="modal-window" style="height:50%; width:50%; min-height:250px; min-width:300px;  padding-bottom:10px;">
                <div style="display:flex;align-items:center;flex-direction:column;width:90%;flex:80%;font-weight:500;font-size:20px; display:flex;">
                    <div class="col-12 col-md-4 view-student-container" style="height:100%; width:100%;">
                        <div class="info-whitebox">                                
                            <p>
                                <?php
                                    if($student['civilstatus'] == 'Married'){
                                        $spouseRecord = mysqli_query($link,"SELECT * FROM spouse WHERE spouseid=$id");
                                        $spouse=mysqli_fetch_array($spouseRecord);
                                        $spouseMaiden = " ";
                                        if($spouse['maidenname'] != ""){
                                            $spouseMaiden = " ".$spouse['maidenname']." ";
                                        }
                                        echo $spouse['firstname']." ".$spouse['middlename'].$spouseMaiden.$spouse['lastname'];
                                ?>
                            </p>
                            <div class="box">
                                <div class="info-whitebox-label" style="left:-45px;">
                                    Name
                                </div>
                            </div>
                        </div>
                        <span style="flex:50%; display:flex; width:90%;"> 
                            <div class="info-whitebox" style="margin-right:5px;">                                
                                <p>
                                    <?php
                                        echo $spouse['address'];
                                    ?>
                                </p>
                                <div class="box">
                                    <div class="info-whitebox-label" style="left:-58px;">
                                        Address
                                    </div>
                                </div>
                            </div>
                            <div class="info-whitebox">                                
                                <p>
                                    <?php
                                        echo $spouse['occupation'];
                                    ?>
                                </p>
                                <div class="box">
                                    <div class="info-whitebox-label" style="left:-80px;">
                                        Occupation
                                    </div>
                                </div>
                            </div>
                        </span>
                        <div class="info-whitebox">                                
                            <p>
                                <?php
                                        echo $spouse['contactno'];
                                    }
                                ?>
                            </p>
                            <div class="box">
                                <div class="info-whitebox-label" style="left:-45px;">
                                    Name
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-button" style="flex:20%;">
                    <div style="flex:4%;"></div>
                    <button class="form-nav-button" id="closeSpouseModal">Close</button>
                    <div style="flex:4%;"></div>
                </div>
            </div>
        </div>
        <?php mysqli_close($link); ?>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="js/viewStudent.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>