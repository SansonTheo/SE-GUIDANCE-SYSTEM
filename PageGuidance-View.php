<!DOCTYPE html>
<?php include "server.php"; ?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/guidance.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    </head>
    <body>
        <div class="title-bar">
            <div class="btn-toggle-nav p-0"  onclick="toggleNav()"><img src="imgs/icon-menu.png" style="height:80%; width:80%;"></div>
            <div class="seal-container"><img src="imgs/wmsu-seal.png"></div>
            <div>View Counseling Session</div>
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
                <div class="container window-content add-session-window" style="display:flex; width:90%; margin:auto; padding:0px;">
                    <div class="row m-0 p-0 w-100 h-100" id="session-form">
                        <div class="col-md-4 m-0 p-0 d-flex flex-column">
                            <div class="guidance-add-container" style="flex:10%;">
                            <?php 
                                $id=$_REQUEST['id'];
                                $record = mysqli_query($link,"SELECT * FROM session WHERE id=$id");
                                $session=mysqli_fetch_array($record);
                                $sessionid = $session['id'];
                                $counselorId = $session['counselorid'];
                                $counselorQuery = "SELECT * FROM counselor WHERE id=$counselorId";
                                $counselorList = $link->query($counselorQuery);
                                $counselorEdit = mysqli_fetch_array($counselorList);
                                $counselorName = $counselorEdit['firstname']." ".$counselorEdit['lastname'];
                            ?>
                                <p>Counselor:</p>
                                <p class="view-session-info"><?php echo $counselorName; ?></p>
                            </div>                                
                            <div class="guidance-add-container" style="flex:10%;">
                                <p>Time:</p>
                                <p class="view-session-info"><?php echo date("h A",strtotime($session['time'])); ?></p>
                            </div>
                            <div class="guidance-add-container" style="flex:10%;">
                                <p>Date:</p>
                                <p class="view-session-info"><?php echo $session['date']; ?></p>
                            </div>
                            <div class="guidance-add-container" style="flex:50%;">
                                <p>Information:</p>
                                <textarea disabled style="width:90%; height:80%; margin:auto; resize:none; background-color:white; font-size:23px; padding:5px;" name="session-info" form="session-form"><?php echo $session['sessiondesc']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4 m-0 p-0 d-flex flex-column">
                            <div class="guidance-add-container" style="flex:30%;" id="filler"></div>
                            <div class="guidance-add-container" style="flex:70%;">
                                <div class="session-container" style="padding-top: 5px;">
                                    <p>Student/s</p>
                                    <div class="session-student-list">
                                        <table class="session-student-table" id="studentList">
                                            <tr>
                                                <td class="sessionListStudent list-label">
                                                    Name
                                                </td>
                                                <td class="sessionListDepartment list-label">
                                                    Department
                                                </td>
                                            </tr>
                                            <?php
                                                $studentRecordQuery = "SELECT * FROM sessionrecord WHERE type='Student' AND sessionid=$sessionid";
                                                $studentRecordList = $link->query($studentRecordQuery);
                                                if ($studentRecordList->num_rows > 0) {
                                                    while($studentRecord = mysqli_fetch_array($studentRecordList)):
                                                        $currentStudentRecordId = $studentRecord['involvedid'];
                                                        $studentEditQuery = "SELECT * FROM student WHERE id=$currentStudentRecordId";
                                                        $studentEditList = $link->query($studentEditQuery);
                                                        $studentEdit = mysqli_fetch_array($studentEditList);                                          
                                            ?>
                                            <tr>
                                                <td class="sessionListStudent"><?php echo $studentEdit['firstname']." ".$studentEdit['lastname'] ?></td>
                                                <td class="sessionListDepartment"><?php echo $studentEdit['department']; ?></td>
                                            </tr>
                                            <?php
                                                        
                                                    endwhile;    
                                                }
                                                ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 m-0 p-0 d-flex flex-column align-items-center">
                            <div class="guidance-add-container" style="flex:40%;">
                                <div class="session-container" style="padding-top: 5px;">
                                    <p>Parents/Guardians</p>
                                    <div class="session-student-list">
                                        <table class="session-student-table" id="parentList">
                                            <tr>
                                                <td class="sessionListParent list-label">
                                                    Name
                                                </td>
                                                <td class="seesionListRelationship list-label">
                                                    Dependents
                                                </td>
                                            </tr>
                                            <?php
                                                $parentRecordQuery = "SELECT * FROM sessionrecord WHERE type='Parent' AND sessionid=$sessionid";
                                                $parentRecordList = $link->query($parentRecordQuery);
                                                if ($parentRecordList->num_rows > 0) {
                                                    while($parentRecord = mysqli_fetch_array($parentRecordList)):
                                                        $currentParentRecordId = $parentRecord['involvedid'];
                                                        $parentEditQuery = "SELECT * FROM parent WHERE id=$currentParentRecordId";
                                                        $parentEditList = $link->query($parentEditQuery);
                                                        $parentEdit = mysqli_fetch_array($parentEditList);
                                            ?>
                                            <tr>
                                                <td class="sessionListParent">
                                                    <?php echo $parentEdit['firstname']." ".$parentEdit['lastname'] ?>
                                                </td>
                                                <?php
                                                    $childRecordQuery = "SELECT * FROM parentrecord WHERE parentid=$currentParentRecordId";
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
                                </div>
                            </div>
                            <div class="guidance-add-container" style="flex:40%;">
                                <div class="session-container" style="padding-top: 5px;">
                                    <p>Teacher/s</p>
                                    <div class="session-student-list">
                                        <table class="session-student-table" id="teacherList">
                                            <tr>
                                                <td class="teacher-name list-label">
                                                    Name
                                                </td>
                                                <td class="teacher-department list-label">
                                                    Department
                                                </td>
                                            </tr>
                                            <?php
                                                $teacherRecordQuery = "SELECT * FROM sessionrecord WHERE type='Teacher' AND sessionid=$sessionid";
                                                $teacherRecordList = $link->query($teacherRecordQuery);
                                                if ($teacherRecordList->num_rows > 0) {
                                                    while($teacherRecord = mysqli_fetch_array($teacherRecordList)):
                                                        $currentTeacherRecordId = $teacherRecord['involvedid'];
                                                        $teacherEditQuery = "SELECT * FROM teacher WHERE id=$currentTeacherRecordId";
                                                        $teacherEditList = $link->query($teacherEditQuery);
                                                        $teacherEdit = mysqli_fetch_array($teacherEditList);  
                                            ?>
                                            <tr>
                                                <td class="teacher-name">
                                                    <?php echo $teacherEdit['firstname']." ".$teacherEdit['lastname'] ?>
                                                </td>
                                                <td class="teacher-department">
                                                    <?php echo $teacherEdit['department'] ?>
                                                </td>
                                            </tr>
                                            <?php
                                                        
                                                    endwhile;    
                                                }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div style="flex:5%; display:flex; align-items: center; justify-content: center; padding:5px; width:90%;">
                                <button class="form-nav-button" type="button" id="return" style="width:80%; margin:auto;">
                                    Return
                                </button>
                                <div style="flex:2%;"></div>
                                <button class="form-nav-button" type="button" id="viewDeleteModal" style="width:80%; margin:auto;">
                                    Delete
                                </button>
                                <div style="flex:2%;"></div>
                                <button class="form-nav-button" type="button" onclick="window.location='PageGuidance-Edit.php?id=<?php echo $id; ?>';" style="width:80%; margin:auto;">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
        <div class="modal" id="deleteModal">
            <form style="display:none;" id="deleteStudent" name="deleteStudent" method="post" action="counselingDelete.php">
                <input id="deleteId" name="deleteId" form="deleteStudent" value="<?php echo $id; ?>">
            </form>
            <div class="modal-window" style="height:250px;width:300px;">
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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
        <script>
            document.getElementById('return').onclick = function(){
                window.location.href = "PageGuidance-Index.php";
            }
            let modalDelete = document.getElementById("deleteModal");
            let viewDeleteModal = document.getElementById("viewDeleteModal");

            viewDeleteModal.onclick = function(){
                modalDelete.style.display = "flex";
            }
            window.onclick = function(event) {
                if (event.target == modalDelete || event.target == closeDeleteModal) {
                    modalDelete.style.display = "none";
                }
            }
        </script>
    </body>

</html>