<!DOCTYPE html>
<?php include "server.php"?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/guidance.css">
        <link rel="stylesheet" type="text/css" href="css/profiling.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    </head>
    <body style="min-height:570px;">
        <div class="title-bar">
            <div class="btn-toggle-nav p-0"  onclick="toggleNav()"><img src="imgs/icon-menu.png" style="height:80%; width:80%;"></div>
            <div class="seal-container"><img src="imgs/wmsu-seal.png"></div>
            <div>Add Counseling Session</div>
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
            <div class="main-window" style="padding:10px;">
                <div class="container window-content add-session-window" style="display:flex; width:90%; margin:auto; padding:0px; max-width:none;">
                    <?php 
                        $id=$_REQUEST['id'];
                        $record = mysqli_query($link,"SELECT * FROM session WHERE id=$id");
                        $session=mysqli_fetch_array($record);
                        $sessionid = $session['id'];
                    ?>
                    <form method="post" onsubmit="return validateForm()" action="counselingEdit.php" class="row m-0 p-0 w-100 h-100" id="session-form">
                        <input type="text" name="session-id" id="session-id" style="display:none;" value="<?php echo $sessionid; ?>">
                        <?php
                            $studentCountQuery = "SELECT * FROM sessionrecord WHERE type='Student' AND sessionid=$sessionid";
                            $studentCountList = $link->query($studentCountQuery);
                            if($studentCountList->num_rows > 0){
                                $studentCount = $studentCountList->num_rows;
                            }
                            else{
                                $studentCount = 0;
                            }
                        ?>
                        <input type="text" name="studentCount" id="studentCount" style="display:none;" value="<?php echo $studentCount-1; ?>">
                        <?php
                            $parentCountQuery = "SELECT * FROM sessionrecord WHERE type='Parent' AND sessionid=$sessionid";
                            $parentCountList = $link->query($parentCountQuery);
                            if($parentCountList->num_rows > 0){
                                $parentCount = $parentCountList->num_rows;
                            }
                            else{
                                $parentCount = 0;
                            }
                        ?>
                        <input type="text" name="parentCount" id="parentCount" style="display:none;" value="<?php echo $parentCount-1 ?>">
                        <?php
                            $teacherCountQuery = "SELECT * FROM sessionrecord WHERE type='Teacher' AND sessionid=$sessionid";
                            $teacherCountList = $link->query($teacherCountQuery);
                            if($teacherCountList->num_rows > 0){
                                $teacherCount = $teacherCountList->num_rows;
                            }
                            else{
                                $teacherCount = 0;
                            }
                        ?>
                        <input type="text"name="teacherCount" id="teacherCount" style="display:none;" value="<?php echo $teacherCount-1 ?>">
                        <div class="col-md-4 m-0 p-0 d-flex flex-column">
                            <?php
                                $counselorId = $session['counselorid'];
                                $counselorQuery = "SELECT * FROM counselor WHERE id=$counselorId";
                                $counselorList = $link->query($counselorQuery);
                                $counselorEdit = mysqli_fetch_array($counselorList);
                                $counselorName = $counselorEdit['firstname']." ".$counselorEdit['lastname'];
                            ?>
                            <div class="guidance-add-container" style="flex:10%;">
                                <p>Counselor:</p>
                                <input type="text" style="display:none;" id="counselor-id" name="counselor-id" value="<?php echo $counselorId ?>">
                                <span style="display:flex; height:50px; width:90%; margin:auto;"><input style="flex:90%; height:100%; margin:0px; background-color:white;" type="text" name="counselor" id="counselor" value="<?php echo $counselorName; ?>" disabled>
                                <button type="button" id="addCounselorModal" class="generic-button" style="height:100%; flex:5%; margin-left:10px;">Select Counselor</button></span>
                            </div>                                
                            <div class="guidance-add-container" style="flex:10%;" >
                                <p>Time:</p>
                                <input style="width:90%; height:50px" type="time" name="time" id="time" value="<?php echo $session['time'] ?>">
                            </div>
                            <div class="guidance-add-container" style="flex:10%;">
                                <p>Date:</p>
                                <input style="width:90%; height:50px;" type="date" name="date" id="date" value="<?php echo $session['date'] ?>">
                            </div>
                            <div class="guidance-add-container" style="flex:50%;">
                                <p>Information:</p>
                                <textarea style="width:90%; height:80%; margin:auto; margin-bottom:10px; resize:none;" name="session-info" id="session-info" form="session-form" placeholder="Session Information"><?php echo $session['sessiondesc'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4 m-0 p-0 d-flex flex-column">
                            <div class="guidance-add-container" style="flex:30%;" id="filler"></div>
                            <div class="guidance-add-container" style="flex:70%;">
                                <div class="session-container" style="padding-top: 5px;">
                                    <p>Student/s</p>
                                    <div class="session-student-list">
                                        <table class="session-student-table" id="studentList">
                                            <tr id="student-label-tr">
                                                <td class="sessionListStudent list-label">
                                                    Name
                                                </td>
                                                <td class="sessionListDepartment list-label">
                                                    Department
                                                </td>
                                                <td class="list-label" style="flex:5%;">
                                                    <button style="visibility:hidden;"></button>
                                                </td>
                                            </tr>
                                            <tr style="display:none;"><td><input type="text" id="studentDeleteCount" name="studentDeleteCount" value="0"></td></tr>
                                            <?php
                                                $studentRecordQuery = "SELECT * FROM sessionrecord WHERE type='Student' AND sessionid=$sessionid";
                                                $studentRecordList = $link->query($studentRecordQuery);
                                                if ($studentRecordList->num_rows > 0) {
                                                    $j = 0;
                                                    while($studentRecord = mysqli_fetch_array($studentRecordList)):
                                                        $currentStudentRecordId = $studentRecord['involvedid'];
                                                        $studentEditQuery = "SELECT * FROM student WHERE id=$currentStudentRecordId";
                                                        $studentEditList = $link->query($studentEditQuery);
                                                        while($studentEdit = mysqli_fetch_array($studentEditList)):                                           
                                            ?>
                                            <tr style="display:none;"><td><input type="text" id="studentWillDelete<?php echo $studentEdit['id']; ?>" name="studentWillDelete<?php echo $j; ?>" value="false"><input type="text" class="studentDeleteValue<?php echo $j; ?>" id="studentDeleteValue<?php echo $j; ?>" name="studentDeleteValue<?php echo $j; ?>" value="<?php echo $studentEdit['id'] ?>"></td></tr>                                                
                                            <tr name="trStudent<?php echo $j; ?>" id="<?php echo $studentEdit['id'];?>">
                                                <td id="<?php echo $studentEdit['id'] ?>" style="display:none;"><input type="text" name="studentExists<?php echo $j;?>" id="studentExists<?php echo $j;?>"><input type="text" name="studentToAdd<?php echo $j; ?>" id="studentToAdd<?php echo $j; ?>" value="true"><input type="text" name="studentNo<?php echo $j; ?>" id="studentNo<?php echo $j; ?>'" value="<?php echo $studentEdit['id'] ?>"></td>
                                                <td class="sessionListStudent" id="<?php echo $studentEdit['id'] ?>"><?php echo $studentEdit['firstname']." ".$studentEdit['lastname']; ?></td>
                                                <td class="sessionListDepartment"><?php echo $studentEdit['department']; ?></td>
                                                <td style="flex:5%;"><button type="button" id="studentDelButton<?php echo $j ?>">X</button></td>
                                            </tr>
                                            <?php
                                                        endwhile;
                                                        $j++;
                                                    endwhile;
                                                }
                                            ?>
                                            <tr id="studentNull" name="studentNull" id="studentNull" style="display:none;">
                                                <td class="sessionListStudent">
                                                    Juan Sanjuan
                                                </td>
                                                <td class="sessionListDepartment">
                                                    Civil Engineering
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div style="flex:15%; padding-top:10px;">
                                        <button class="form-nav-button" id="addStudentModal" style="height:100%; width:70%; margin-left:15%;" type="button">
                                            + Add Student
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 m-0 p-0 d-flex flex-column">
                            <div class="guidance-add-container" style="flex:40%;">
                                <div class="session-container" style="padding-top: 5px;">
                                    <p>Parents/Guardians</p>
                                    <div class="session-student-list">
                                        <table class="session-student-table" id="parentList">
                                            <tr id="parent-label-tr">
                                                <td class="sessionListParent list-label">
                                                    Name
                                                </td>
                                                <td class="seesionListRelationship list-label">
                                                    Dependent
                                                </td>
                                                <td style="width:2%;" class="list-label"></td>
                                            </tr>
                                            <tr style="display:none;"><td><input type="text" id="parentDeleteCount" name="parentDeleteCount" value="0"></td></tr>
                                            <?php
                                                $parentRecordQuery = "SELECT * FROM sessionrecord WHERE type='Parent' AND sessionid=$sessionid";
                                                $parentRecordList = $link->query($parentRecordQuery);
                                                if ($parentRecordList->num_rows > 0) {
                                                    $k = -1; //FOR SOME REASON THIS NEEDS TO BE -1? INITIALIZES AS 1 IF = 0;
                                                    while($parentRecord = mysqli_fetch_array($parentRecordList)):
                                                        $currentParentRecordId = $parentRecord['involvedid'];
                                                        $parentEditQuery = "SELECT * FROM parent WHERE id=$currentParentRecordId";
                                                        $parentEditList = $link->query($parentEditQuery);
                                                        while($parentEdit = mysqli_fetch_array($parentEditList)):                                           
                                            ?>
                                            <tr style="display:none;"><td><input type="text" id="parentWillDelete<?php echo $parentEdit['id']; ?>" name="parentWillDelete<?php echo $k; ?>" value="false"><input type="text" id="parentDeleteValue<?php echo $k; ?>" name="parentDeleteValue<?php echo $k; ?>" value="<?php echo $parentEdit['id'] ?>"></td></tr>
                                            <tr name="trParent<?php echo $k; ?>" id="<?php echo $parentEdit['id'];?>">
                                                <td id="<?php echo $parentEdit['id'] ?>" style="display:none;"><input type="text" name="parentExists<?php echo $k;?>" id="parentExists<?php echo $k;?>"><input type="text" name="parentToAdd<?php echo $k; ?>" id="parentToAdd<?php echo $k; ?>" value="true"><input type="text" name="parentNo<?php echo $k; ?>" id="parentNo<?php echo $k; ?>'" value="<?php echo $parentEdit['id'] ?>"></td>
                                                <td class="sessionListParent" id="<?php echo $parentEdit['id'] ?>"><?php echo $parentEdit['firstname']." ".$parentEdit['lastname']; ?></td>
                                                <?php
                                                    $childRecordQuery = "SELECT * FROM parentrecord WHERE parentid=$currentParentRecordId";
                                                    $childRecordList =  $link->query($childRecordQuery);
                                                    if ($childRecordList->num_rows > 0) {
                                                        
                                                ?>
                                                <td class="parent-student"><?php while($childRecord = mysqli_fetch_array($childRecordList)):$currentStudentId = $childRecord['studentid'];$childQuery = "SELECT * FROM student WHERE id=$currentStudentId";$childList = $link->query($childQuery);while($child = mysqli_fetch_array($childList)):$childname = $child['firstname']." ".$child['middlename']." ".$child['lastname'];echo $childname."<br>";endwhile;endwhile; ?></td>
                                                <?php
                                                    }
                                                ?>
                                                <td style="width:2%;">
                                                    <button type="button" id="parentDelButton<?php echo $k ?>">X</button>
                                                </td>
                                            </tr>
                                            <?php
                                                        endwhile;
                                                        $k++;
                                                    endwhile;
                                                }
                                            ?>
                                            <tr name="parentNull" id="parentNull" style="display:none;">
                                                <td class="sessionListParent">
                                                    Pedro Sanjuan
                                                </td>
                                                <td class="sessionListRelationship">
                                                    Juan Sanjuan
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div style="flex:15%; padding-top:5px;">
                                        <button class="form-nav-button" id="addParentModal" style="height:100%; width:70%; margin-left:15%;" type="button">
                                            + Add Parent/Guardian
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="guidance-add-container" style="flex:40%;">
                                <div class="session-container" style="padding-top: 5px;">
                                    <p>Teacher/s</p>
                                    <div class="session-student-list">
                                        <table class="session-student-table" id="teacherList">
                                            <tr id="teacher-label-tr">
                                                <td class="teacher-name list-label">
                                                    Name
                                                </td>
                                                <td class="teacher-department list-label">
                                                    Department
                                                </td>
                                                <td style="width:2%;" class="list-label"></td>
                                            </tr>
                                            <tr style="display:none;"><td><input type="text" id="teacherDeleteCount" name="teacherDeleteCount" value="0"></td></tr>
                                            <?php
                                                $teacherRecordQuery = "SELECT * FROM sessionrecord WHERE type='Teacher' AND sessionid=$sessionid";
                                                $teacherRecordList = $link->query($teacherRecordQuery);
                                                if ($teacherRecordList->num_rows > 0) {
                                                    $l = 0;
                                                    while($teacherRecord = mysqli_fetch_array($teacherRecordList)):
                                                        $currentTeacherRecordId = $teacherRecord['involvedid'];
                                                        $teacherEditQuery = "SELECT * FROM teacher WHERE id=$currentTeacherRecordId";
                                                        $teacherEditList = $link->query($teacherEditQuery);
                                                        while($teacherEdit = mysqli_fetch_array($teacherEditList)):                                           
                                            ?>
                                            <tr style="display:none;"><td><input type="text" id="teacherWillDelete<?php echo $teacherEdit['id']; ?>" name="teacherWillDelete<?php echo $l; ?>" value="false"><input type="text" id="teacherDeleteValue<?php echo $l; ?>" name="teacherDeleteValue<?php echo $l; ?>" value="<?php echo $teacherEdit['id'] ?>"></td></tr>
                                            <tr name="trTeacher<?php echo $l; ?>" id="<?php echo $teacherEdit['id'];?>">
                                                <td id="<?php echo $teacherEdit['id'] ?>" style="display:none;"><input type="text" name="teacherExists<?php echo $l;?>" id="teacherExists<?php echo $k;?>"><input type="text" name="teacherExists<?php echo $l;?>" id="teacherExists<?php echo $l;?>"><input type="text" name="teacherToAdd<?php echo $l; ?>" id="teacherToAdd<?php echo $l; ?>" value="true"><input type="text" name="teacherNo<?php echo $l; ?>" id="teacherNo<?php echo $l; ?>'" value="<?php echo $teacherEdit['id'] ?>"></td>
                                                <td class="teacher-name"><?php echo $teacherEdit['firstname']." ".$teacherEdit['lastname']; ?></td>
                                                <td class="teacher-department"><?php echo $teacherEdit['department']; ?></td>
                                                <td style="width:2%;">
                                                    <button type="button" id="teacherDelButton<?php echo $l ?>">X</button>
                                                </td>
                                            </tr>
                                            <?php
                                                        endwhile;
                                                        $l++;
                                                    endwhile;
                                                }
                                            ?>
                                            <tr style="display:none;" id="teacherNull" name="teacherNull"></tr>
                                        </table>
                                    </div>
                                    <div style="flex:15%; padding-top:5px;">
                                        <button class="form-nav-button" id="addTeacherModal" style="height:100%; width:70%; margin-left:15%;" type="button">
                                            + Add Teacher
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div style="flex:5%; display:flex; align-items: center; justify-content: center; padding:5px;">
                                <a href="PageGuidance-View.php?id=<?php echo $id; ?>" class="form-nav-button generic-button" type="button" style="width:80%; margin-right:5px;">
                                    Return
                                </a>
                                <button class="form-nav-button" type="submit" style="width:80%; margin-left:5px; font-size:17px; font-weight:500;">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>        
                </div>
            </div>
        </div>
        <div class="modal" id="studentModal">
            <div class="modal-window">
                <div class="sort-buttons">
                    <div>
                        Search by:
                    </div>
                    <div>
                        <span>
                            <input type="text" id="search-student-name" name="search-student-name" placeholder="Student Name. . ." class="search">
                            <input type="text" id="search-student-department" name="search-student-department" placeholder="Department. . ." class="search">
                        </span>
                    </div>
                    <div>
                        <span>
                            <input type="text" id="search-student-college" name="search-student-college" placeholder="College. . ." class="search">
                            <input type="text" id="search-student-level" name="search-student-level" placeholder="Year Level. . ." class="search"> &nbsp;
                            <button onclick="searchStudent()" class="form-nav-button" style="width:20%; height:30px; border-radius: 10px;">Search</button>
                        </span>
                    </div>
                </div>
                <div class="list-window">
                    <table id="student-add-table" class="list-table">
                        <tr>
                            <td class="student-id list-label">
                                ID
                            </td>
                            <td class="student-name list-label">
                                Name
                            </td>
                            <td class="student-department list-label">
                                Department
                            </td>
                            <td class="student-level list-label">
                                Yr. Level
                            </td>
                            <td class="student-college list-label">
                                College
                            </td>
                            
                        </tr>
                        <?php
                            $studentQuery = "SELECT * FROM student";
                            $studentList = $link->query($studentQuery);
                            if ($studentList->num_rows > 0) {
                                while($student = mysqli_fetch_array($studentList)):
                                    $exists = "show";
                                    $existsStyle = "table-row";
                                    $studentExistsId = $student['id'];
                                    $studentExistsQuery = "SELECT * FROM sessionrecord WHERE type='Student' AND involvedid=$studentExistsId";
                                    $studentExists = $link->query($studentExistsQuery);
                                    if($studentExists->num_rows > 0){
                                        $exists = "hidden";
                                        $existsStyle = "none";
                                    }
                        ?>
                        <tr  class="<?php echo $exists; ?>" name="studententry" id="studentEntryId<?php echo $student['id'] ?>" style="display:<?php echo $existsStyle ?>">
                            <td style="display:none;" id="realStudentId"><?php echo $student['id']; ?></td>
                            <td class="student-id" name="<?php echo $student['studentid']; ?>"><?php echo $student['studentid'] ?></td>
                            <?php $studentName = $student['firstname']." ".$student['middlename']." ".$student['lastname'] ?>
                            <td class="student-name" name="<?php echo $studentName ?>"><?php echo $studentName ?></td>
                            <td class="student-department" name="<?php echo $student['department'] ?>"><?php echo $student['department'] ?></td>
                            <td class="student-level" name="<?php echo $student['level'] ?>"><?php echo $student['level'] ?></td>
                            <td class="student-college" name="<?php echo $student['college'] ?>"><?php echo $student['college'] ?></td>
                        </tr>
                        <?php
                                endwhile;
                            }
                        ?>
                    </table>
                </div>
                <div class="list-button">
                    <div style="flex:50%;"></div>
                    <button class="form-nav-button" id="closeStudentModal">Cancel</button>
                    <div style="width:5px;"></div>
                    <button class="form-nav-button" id="addStudent">Add</button>
                </div>
            </div>
        </div>
        <div class="modal" id="parentModal">
            <div class="modal-window">
                <div class="sort-buttons">
                    <div>
                        Search by:
                    </div>
                    <div>
                        <span>
                            <input type="text" id="search-parent-child" name="search-parent-child" placeholder="Student Name. . ." class="search">
                        </span>
                    </div>
                    <div>
                        <span>
                            <input type="text" id="search-parent-name" name="search-parent-name" placeholder="Parent/Guardian Name. . ." class="search"> &nbsp;
                            <button onclick="searchParent()" class="form-nav-button" style="width:20%; height:30px; border-radius: 10px;">Search</button>
                        </span>
                    </div>
                </div>
                <div class="list-window">
                    <table id="parent-add-table" class="list-table">
                        <tr>
                            <td class="parent-name list-label">
                                Name
                            </td>
                            <td class="parent-relationship list-label">
                                Relationship
                            </td>
                            <td class="parent-student list-label">
                                Student
                            </td>
                        </tr>
                        <?php
                            $parentQuery = "SELECT * FROM parent";
                            $parentList = $link->query($parentQuery);
                            if ($parentList->num_rows > 0) {
                                while($parent = mysqli_fetch_array($parentList)):
                        ?>
                        <tr name="parententry" class="show" id="parentEntryId<?php echo $parent['id'] ?>">
                            <td style="display:none;" id="realParentId"><?php $currentParentId = $parent['id']; echo $currentParentId; ?></td>
                            <?php $parentName = $parent['firstname']." ".$parent['middlename']." ".$parent['lastname'] ?>
                            <td class="parent-name"><?php echo $parentName ?></td>
                            <td class="parent-relationship"><?php echo $parent['relationship'] ?></td>
                            <?php
                                    $childRecordQuery = "SELECT * FROM parentrecord WHERE parentid=$currentParentId";
                                    $childRecordList =  $link->query($childRecordQuery);
                                    if ($childRecordList->num_rows > 0) {
                                        
                            ?>
                            <td class="parent-student"><?php while($childRecord = mysqli_fetch_array($childRecordList)):$currentStudentId = $childRecord['studentid'];$childQuery = "SELECT * FROM student WHERE id=$currentStudentId";$childList = $link->query($childQuery);while($child = mysqli_fetch_array($childList)):$childname = $child['firstname']." ".$child['middlename']." ".$child['lastname'];echo $childname."<br>";endwhile;endwhile; ?></td>
                            <?php
                                    }
                            ?>
                        </tr>
                        <?php           
                                    
                                endwhile;
                            }
                        ?>
                    </table>
                </div>
                <div class="list-button">
                    <div style="flex:50%;"></div>
                    <button class="form-nav-button" id="closeParentModal">Cancel</button>
                    <div style="width:5px;"></div>
                    <button class="form-nav-button" id="addParent">Add</button>
                </div>
            </div>
        </div>
        <div class="modal" id="teacherModal">
            <div class="modal-window">
                <div class="sort-buttons">
                    <div>
                        Search by:
                    </div>
                    <div>
                        <span>
                            <input type="text" id="search-teacher-name" name="search-teacher-name" placeholder="Teacher Name. . ." class="search">
                            <input type="text" id="search-teacher-department" name="search-teacher-department" placeholder="Department. . ." class="search">
                        </span>
                    </div>
                    <div>
                        <span>
                            <button type="button" onclick="searchTeacher()" class="form-nav-button" style="width:20%; height:30px; border-radius: 10px;">Search</button>
                        </span>
                    </div>
                </div>
                <div class="list-window">
                    <table class="list-table" id="teacher-add-table">
                        <tr>
                            <td class="teacher-name list-label">
                                Name
                            </td>
                            <td class="teacher-department list-label">
                                Department
                            </td>
                        </tr>
                        <?php
                            $teacherQuery = "SELECT * FROM teacher";
                            $teacherList = $link->query($teacherQuery);
                            if ($teacherList->num_rows > 0) {
                                while($teacher = mysqli_fetch_array($teacherList)):
                        ?>
                        <tr class="show" name="teacherentry" id="teacherEntryId<?php echo $teacher['id']; ?>">
                            <td style="display:none;" id="realTeacherId"><?php $currentTeacherId = $teacher['id']; echo $currentTeacherId; ?></td>
                            <td class="teacher-name"><?php echo $teacher['firstname']." ".$teacher['lastname']; ?></td>
                            <td class="teacher-department"><?php echo $teacher['department']; ?></td>
                        </tr>
                        <?php
                                endwhile;
                            }
                        ?>
                    </table>
                </div>
                <div class="list-button">
                    <div style="flex:50%;"></div>
                    <button class="form-nav-button" id="closeTeacherModal">Cancel</button>
                    <div style="width:5px;"></div>
                    <button class="form-nav-button" id="addTeacher">Add</button>
                </div>
            </div>
        </div>
        <div class="modal" id="counselorModal">
            <div class="modal-window">
                <div class="sort-buttons">
                    <div>
                        Search by:
                    </div>
                    <div>
                        <span>
                            <input type="text" id="search-counselor-name" name="search-counselor-name" placeholder="Counselor Name. . ." class="search">
                            <input type="text" id="search-counselor-department" name="search-counselor-department" placeholder="Department. . ." class="search">
                        </span>
                    </div>
                    <div>
                        <span>
                            <button onclick="searchCounselor()" class="form-nav-button" id="searchCounselor" style="width:20%; height:30px; border-radius: 10px;">Search</button>
                        </span>
                    </div>
                </div>
                <div class="list-window">
                    <table class="list-table" id="counselor-add-table">
                        <tr>
                            <td class="teacher-name list-label">
                                Name
                            </td>
                            <td class="teacher-department list-label">
                                Department
                            </td>
                            <td class="teacher-college list-label">
                                Position
                            </td>
                        </tr>
                        <?php
                            $counselorQuery = "SELECT * FROM counselor";
                            $counselorList = $link->query($counselorQuery);
                            if ($counselorList->num_rows > 0) {
                                while($counselor = mysqli_fetch_array($counselorList)):
                        ?>
                        <tr class="show" name="counselorentry" id="realCounselorId<?php echo $counselor['id']; ?>">
                            <td style="display:none;" ><?php $currentCounselorId = $counselor['id']; echo $currentCounselorId; ?></td>
                            <td class="teacher-name"><?php echo $counselor['firstname']." ".$counselor['lastname']; ?></td>
                            <td class="teacher-department"><?php echo $counselor['department']; ?></td>
                            <td class="teacher-college"><?php echo $counselor['position']; ?></td>
                        </tr>
                        <?php
                                endwhile;
                            }
                        ?>
                    </table>
                </div>
                <div class="list-button">
                    <div style="flex:50%;"></div>
                    <button class="form-nav-button" id="closeCounselorModal">Cancel</button>
                    <div style="width:5px;"></div>
                    <button class="form-nav-button" id="addCounselor">Add</button>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="js/guidance.js"></script>
        <script src="js/main.js"></script>
        <script src="js/editSessions.js"></script>
        <script>
            function validateForm(){
                let elementValidate = [
                    document.getElementById("time"),
                    document.getElementById("date"),
                ];

                let validateLength = elementValidate.length;
                let isEmpty = false;

                for(let i = 0; i < validateLength; i++){
                    if (elementValidate[i].value == "") {
                        elementValidate[i].style.outline = "solid red 3px";
                        isEmpty = true;
                    }
                }

                
                let counselorid = document.getElementById("counselor-id").value;
                

                if(counselorid == ""){
                    let counselor = document.getElementById("counselor");
                    counselor.style.outline = "solid red 3px";
                    isEmpty = true;
                }
                
                let validateStudentcount = document.getElementById('studentCount');
                if(validateStudentcount.value = -1){
                    let student = document.getElementById("session-student-list");
                    student.style.outline = "solid red 3px";
                    isEmpty = true;
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