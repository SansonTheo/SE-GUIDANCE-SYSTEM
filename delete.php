<?php
    include "server.php";
    $id = mysqli_real_escape_string($link,$_POST['deleteId']);
    $sqlDelete = "DELETE FROM student WHERE id=$id";
    mysqli_query($link,$sqlDelete);
    $message = "Student Deleted!";
    echo "	<script type='text/javascript'>
                alert('$message');
                window.location='PageStudentProfiling-Index.php';
			</script>";
?>