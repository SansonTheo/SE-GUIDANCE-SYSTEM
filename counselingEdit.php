<?php include "server.php";

    $sessionid = mysqli_real_escape_string($link,$_POST['session-id']);
    $counselorid= mysqli_real_escape_string($link,$_POST['counselor-id']);
    $time = mysqli_real_escape_string($link,$_POST['time']);
    $date = mysqli_real_escape_string($link,$_POST['date']);
    $desc = mysqli_real_escape_string($link,$_POST['session-info']);

    $sessionQuery = "UPDATE session SET sessiondesc='$desc', counselorid='$counselorid', date='$date', time='$time' WHERE id=$sessionid";
    if(mysqli_query($link,$sessionQuery)){
        echo 'Successful!';
    }

    $studentCount = mysqli_real_escape_string($link,$_POST['studentCount']);
    $studentDeleteCount = mysqli_real_escape_string($link,$_POST['studentDeleteCount']);
    $parentCount = mysqli_real_escape_string($link,$_POST['parentCount']);
    $parentDeleteCount = mysqli_real_escape_string($link,$_POST['parentDeleteCount']);
    $teacherCount = mysqli_real_escape_string($link,$_POST['teacherCount']);
    $teacherDeleteCount = mysqli_real_escape_string($link,$_POST['teacherDeleteCount']);

    if($studentDeleteCount > 0){
        for($i=0; $i < $studentCount; $i++){
            if(isset($_POST['studentWillDelete'.$i])){
                $willDelete = mysqli_real_escape_string($link,$_POST['studentWillDelete'.$i]);
                if($willDelete == "true"){
                    $deleteValue = mysqli_real_escape_string($link,$_POST['studentDeleteValue'.$i]);
                    $deleteQuery = "DELETE FROM sessionrecord WHERE type='Student' AND involvedid='$deleteValue'";
                    mysqli_query($link,$deleteQuery);
                }
            }
        }
    }

    if($parentDeleteCount > 0){
        for($i=0; $i <= $parentCount; $i++){
            if(isset($_POST['parentWillDelete'.$i])){
                $willDelete = mysqli_real_escape_string($link,$_POST['parentWillDelete'.$i]);
                echo $willDelete;
                if($willDelete == "true"){
                    $deleteValue = mysqli_real_escape_string($link,$_POST['parentDeleteValue'.$i]);
                    $deleteQuery = "DELETE FROM sessionrecord WHERE type='Parent' AND involvedid='$deleteValue'";
                    mysqli_query($link,$deleteQuery);
                }
            }
        }
    }

    if($teacherDeleteCount > 0){
        for($i=0; $i <= $teacherCount; $i++){
            if(isset($_POST['teacherWillDelete'.$i])){
                $willDelete = mysqli_real_escape_string($link,$_POST['teacherWillDelete'.$i]);
                echo $willDelete;
                if($willDelete == "true"){
                    $deleteValue = mysqli_real_escape_string($link,$_POST['teacherDeleteValue'.$i]);
                    $deleteQuery = "DELETE FROM sessionrecord WHERE type='Teacher' AND involvedid='$deleteValue'";
                    mysqli_query($link,$deleteQuery);
                }
            }
        }
    }

    if($studentCount>-1){
        for($i=0; $i<=$studentCount; $i++){
            if(isset($_POST['studentNo'.$i])){
                $studentId = mysqli_real_escape_string($link,$_POST['studentNo'.$i]);
                $checkQuery = "SELECT * FROM sessionrecord WHERE type='Student' AND involvedid=$studentId AND sessionid=$sessionid";
                $checkResult = mysqli_query($link,$checkQuery);
                if($checkResult){
                    if($checkResult->num_rows < 1){
                        $addStudentQuery = "INSERT INTO sessionrecord(type,involvedid,sessionid) VALUES('Student',$studentId,$sessionid)";
                        if(mysqli_query($link,$addStudentQuery)){
                            null;
                        }
                    }
                }
            }
        }
    }

    if($parentCount>-1){
        for($i=0; $i<=$parentCount; $i++){
            if(isset($_POST['parentNo'.$i])){
                $parentId = mysqli_real_escape_string($link,$_POST['parentNo'.$i]);
                $checkQuery = "SELECT * FROM sessionrecord WHERE type='Parent' AND involvedid=$parentId AND sessionid=$sessionid";
                $checkResult = mysqli_query($link,$checkQuery);
                if($checkResult){
                    if($checkResult->num_rows < 1){
                        $addParentQuery = "INSERT INTO sessionrecord(type,involvedid,sessionid) VALUES('Parent',$parentId,$sessionid)";
                        if(mysqli_query($link,$addParentQuery)){
                            echo 'Entry Successful!';
                        }
                    }
                    else{
                        echo 'Exists!';
                    }
                }
            }
        }
    }

    if($teacherCount>-1){
        for($i=0; $i<=$teacherCount; $i++){
            if(isset($_POST['teacherNo'.$i])){
                $teacherId = mysqli_real_escape_string($link,$_POST['teacherNo'.$i]);
                $checkQuery = "SELECT * FROM sessionrecord WHERE type='Teacher' AND involvedid=$teacherId AND sessionid=$sessionid";
                $checkResult = mysqli_query($link,$checkQuery);
                if($checkResult){
                    if($checkResult->num_rows < 1){
                        $addTeacherQuery = "INSERT INTO sessionrecord(type,involvedid,sessionid) VALUES('Teacher',$teacherId,$sessionid)";
                        if(mysqli_query($link,$addTeacherQuery)){
                            echo 'Entry Successful!';
                        }
                    }
                    else{
                        echo 'Exists!';
                    }
                }
            }
        }
    }
    $message = "Session Edited!";
    echo "	<script type='text/javascript'>
                alert('$message');
                window.location='PageGuidance-View.php?id=$sessionid';
			</script>";

?>