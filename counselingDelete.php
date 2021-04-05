<?php
    include "server.php";
    $id = mysqli_real_escape_string($link,$_POST['deleteId']);
    $sqlDelete = "DELETE FROM session WHERE id=$id";
    if(mysqli_query($link,$sqlDelete)){
        $message = "Session Deleted!";
        echo "	<script type='text/javascript'>
                alert('$message');
                window.location='Page-Guidance-Index.php';
			    </script>";
    }
?>