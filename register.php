<?php 
    include "server.php";
    $username = mysqli_real_escape_string($link,$_POST['email']);
	$password = mysqli_real_escape_string($link,$_POST['password']);
    $firstname = mysqli_real_escape_string($link,$_POST['firstname']);
    $middlename = mysqli_real_escape_string($link,$_POST['middlename']);
    $lastname = mysqli_real_escape_string($link,$_POST['lastname']);
    $usertype = mysqli_real_escape_string($link,$_POST['usertype']);
    $facultyid = mysqli_real_escape_string($link,$_POST['idNo']);
    $department = mysqli_real_escape_string($link,$_POST['department']);
    $position = mysqli_real_escape_string($link,$_POST['position']);
    $contactno = mysqli_real_escape_string($link,$_POST['contactno']);
    
    $userid = "";

    if($usertype == "Counselor"){
        $counselorQuery = "INSERT INTO counselor(firstname, middlename, lastname, position, facultyid, department, contactno) VALUES('$firstname','$middlename','$lastname','$position','$facultyid','$department','$contactno')";
        if(mysqli_query($link,$counselorQuery)){
            $userid = $link->insert_id;
        }
        else{
            echo 'Failed to Insert Counselor!';
            return;
        }
    }

    else{
        $teacherQuery = "INSERT INTO teacher(firstname, middlename, lastname, position, facultyid, department, contactno) VALUES('$firstname','$middlename','$lastname','$position','$facultyid','$department','$contactno')";
        if(mysqli_query($link,$teacherQuery)){
            $userid = $link->insert_id;
        }
        else{
            echo 'Failed to Insert Counselor!';
            return;
        }
    }

    if($userid != ""){
        $userQuery = "INSERT INTO user(username,password,type,facultyreferenceid) VALUES('$username', '$password', '$usertype', '$userid')";
        if(mysqli_query($link,$userQuery)){
            $message = "Registration Succesful!";
            echo "	<script type='text/javascript'>
						alert('$message');
						window.location='Page-Login.php';
					</script>";		
        }
        else{
            echo 'Failed to Insert User!';
        }
    }
?>