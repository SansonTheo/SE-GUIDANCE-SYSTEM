<?php include "server.php";

    $counselorid= mysqli_real_escape_string($link,$_POST['counselor-id']);
    $time = mysqli_real_escape_string($link,$_POST['time']);
    $date = mysqli_real_escape_string($link,$_POST['date']);
    $desc = mysqli_real_escape_string($link,$_POST['session-info']);
    $sessionAddQuery = "INSERT INTO session(sessiondesc,counselorid,date,time,dateset) VALUES('$desc','$counselorid','$date','$time',NOW())";
    mysqli_query($link,$sessionAddQuery);
    $sessionid = $link->insert_id;

    $studentCount = mysqli_real_escape_string($link,$_POST['studentCount']);
    $parentCount = mysqli_real_escape_string($link,$_POST['parentCount']);
    $teacherCount = mysqli_real_escape_string($link,$_POST['teacherCount']);

    if($studentCount>-1){
        for($i=0; $i<=$studentCount; $i++){
            if(isset($_POST['studentNo'.$i])){
                $studentId = mysqli_real_escape_string($link,$_POST['studentNo'.$i]);
                $addStudentQuery = "INSERT INTO sessionrecord(type,involvedid,sessionid) VALUES('Student', $studentId,$sessionid)";
                if(mysqli_query($link,$addStudentQuery)){
                    echo 'Entry Successful!';
                }
            }
        }
    }
    if($parentCount>-1){
        for($i=0; $i<=$parentCount; $i++){
            if(isset($_POST['parentNo'.$i])){
                $parentId = mysqli_real_escape_string($link,$_POST['parentNo'.$i]);
                $addParentQuery = "INSERT INTO sessionrecord(type, involvedid,sessionid) VALUES('Parent', $parentId, $sessionid)";
                if(mysqli_query($link,$addParentQuery)){
                    echo 'Entry Successful!';
                }
            }
        }
    }

    if($teacherCount>-1){
        for($i=0; $i<=$teacherCount; $i++){
            if(isset($_POST['teacherNo'.$i])){
                $teacherId = mysqli_real_escape_string($link,$_POST['teacherNo'.$i]);
                $addTeacherQuery = "INSERT INTO sessionrecord(type, involvedid,sessionid) VALUES('Teacher', $teacherId, $sessionid)";
                if(mysqli_query($link,$addTeacherQuery)){
                    echo 'Entry Successful!';
                }
            }
        }
    }
    $message = "Session Added!";
    echo "	<script type='text/javascript'>
                alert('$message');
                window.location='PageGuidance-View.php?id=$sessionid';
			</script>";
?>