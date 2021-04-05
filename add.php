<?php
	include "server.php";
	//Student's Info
	$firstname = mysqli_real_escape_string($link,$_POST['firstname']);
	$middlename = mysqli_real_escape_string($link,$_POST['middlename']);
	$lastname = mysqli_real_escape_string($link,$_POST['lastname']);
	$birthDate = mysqli_real_escape_string($link,$_POST['birthDate']);
	$contact = mysqli_real_escape_string($link,$_POST['contact']);
	$street = mysqli_real_escape_string($link,$_POST['street']);
	$barangay = mysqli_real_escape_string($link,$_POST['barangay']);
	$city = mysqli_real_escape_string($link,$_POST['city']);
	$province = mysqli_real_escape_string($link,$_POST['province']);
	$residencyType = mysqli_real_escape_string($link,$_POST['isBoarder']);
	$boarderStreet = mysqli_real_escape_string($link,$_POST['boarderStreet']);
	$boarderBarangay = mysqli_real_escape_string($link,$_POST['boarderBarangay']);
	$boarderCity = mysqli_real_escape_string($link,$_POST['boarderCity']);
	$boarderProvince = mysqli_real_escape_string($link,$_POST['boarderProvince']);
	$studentId = mysqli_real_escape_string($link,$_POST['studentId']);
	$college = mysqli_real_escape_string($link,$_POST['college']);
	$department = mysqli_real_escape_string($link,$_POST['department']);
	$level = mysqli_real_escape_string($link,$_POST['level']);
	$studentStatus = mysqli_real_escape_string($link,$_POST['studentStatus']);
	$sex = mysqli_real_escape_string($link,$_POST['sex']);
	$gender = mysqli_real_escape_string($link,$_POST['gender']);
	$heightFt = mysqli_real_escape_string($link,$_POST['heightFt']);
	$heightIn = mysqli_real_escape_string($link,$_POST['heightIn']);
	$weight = mysqli_real_escape_string($link,$_POST['weight']);
	//HEIGHT NEEDS CALCULATION
	$heightCm = floor(($heightFt * 30.48) + ($heightIn * 2.54));
	$complexion = mysqli_real_escape_string($link,$_POST['complexion']);
	$ethnicity = mysqli_real_escape_string($link,$_POST['ethnicity']);
	$nationality = mysqli_real_escape_string($link,$_POST['nationality']);
	$religion = mysqli_real_escape_string($link,$_POST['religion']);
	$civilstatus = mysqli_real_escape_string($link,$_POST['civilStatus']);
	$spouseId = 0;

	//Father's Info
	$fatherFirstname = mysqli_real_escape_string($link,$_POST['fatherFirstname']);
	$fatherMiddlename = mysqli_real_escape_string($link,$_POST['fatherMiddlename']);
	$fatherLastname = mysqli_real_escape_string($link,$_POST['fatherLastname']);
	$fatherAddress = mysqli_real_escape_string($link,$_POST['fatherAddress']);
	$fatherOccupation = mysqli_real_escape_string($link,$_POST['fatherOccupation']);
	$fatherContact = mysqli_real_escape_string($link,$_POST['fatherContact']);

	//Mother's Info
	$motherFirstname = mysqli_real_escape_string($link,$_POST['motherFirstname']);
	$motherMiddlename = mysqli_real_escape_string($link,$_POST['motherMiddlename']);
	$motherLastname = mysqli_real_escape_string($link,$_POST['motherLastname']);
	$motherAddress = mysqli_real_escape_string($link,$_POST['motherAddress']);
	$motherOccupation = mysqli_real_escape_string($link,$_POST['motherOccupation']);
	$motherContact = mysqli_real_escape_string($link,$_POST['motherContact']);
	//Guardian's Info
	$guardianFirstname = mysqli_real_escape_string($link,$_POST['guardianFirstname']);
	$guardianMiddlename = mysqli_real_escape_string($link,$_POST['guardianMiddlename']);
	$guardianLastname = mysqli_real_escape_string($link,$_POST['guardianLastname']);
	$guardianRelationship = mysqli_real_escape_string($link,$_POST['guardianRelationship']);
	$guardianAddress = mysqli_real_escape_string($link,$_POST['guardianAddress']);
	$guardianOccupation = mysqli_real_escape_string($link,$_POST['guardianOccupation']);
	$guardianContact = mysqli_real_escape_string($link,$_POST['guardianContact']);
	//Spouse's Info
	$spouseFirstname = mysqli_real_escape_string($link,$_POST['spouseFirstname']);
	$spouseMiddlename = mysqli_real_escape_string($link,$_POST['spouseMiddlename']);
	$spouseMaidenname = mysqli_real_escape_string($link,$_POST['spouseMaidenname']);
	$spouseLastname = mysqli_real_escape_string($link,$_POST['spouseLastname']);
	$spouseAddress = mysqli_real_escape_string($link,$_POST['spouseAddress']);
	$spouseOccupation = mysqli_real_escape_string($link,$_POST['spouseOccupation']);
	$spouseContact = mysqli_real_escape_string($link,$_POST['spouseContact']);
	//SiblingInfo
	$siblingCount = mysqli_real_escape_string($link,$_POST['siblingCount']);

	$sqlFather="INSERT INTO parent(firstname,middlename,lastname,relationship,address,occupation,contactno) VALUES('$fatherFirstname','$fatherMiddlename','$fatherLastname','Father','$fatherAddress','$fatherOccupation','$fatherContact')";
	$sqlMother="INSERT INTO parent(firstname,middlename,lastname,relationship,address,occupation,contactno) VALUES('$motherFirstname','$motherMiddlename','$motherLastname','Mother','$motherAddress','$motherOccupation','$motherContact')";
	$sql="INSERT INTO student (firstname,middlename,lastname,birthdate,contactno,permstreet,permbarangay,permcity,permprovince,residencytype,tempstreet,tempbarangay,tempcity,tempprovince,studentid,college,department,level,status,sex,gender,height,weight,complexion,ethnicity,nationality,religion,civilstatus) 
	VALUES('$firstname','$middlename','$lastname','$birthDate','$contact','$street','$barangay','$city','$province','$residencyType','$boarderStreet','$boarderBarangay','$boarderCity','$boarderProvince','$studentId','$college','$department','$level','$studentStatus','$sex','$gender','$heightCm','$weight','$complexion','$ethnicity','$nationality','$religion','$civilstatus')";	$last_student_id = $link->insert_id;
	
	if(mysqli_query($link,$sql))
	{
		$last_student_id = $link->insert_id;

		mysqli_query($link,$sqlFather);
		$last_father_id = $link->insert_id;
		$sqlParentRecord = "INSERT INTO parentrecord(parentid,studentid) VALUES('$last_father_id','$last_student_id')";
		mysqli_query($link,$sqlParentRecord);

		mysqli_query($link,$sqlMother);
		$last_mother_id = $link->insert_id;
		$sqlParentRecord = "INSERT INTO parentrecord(parentid,studentid) VALUES('$last_mother_id','$last_student_id')";		
		mysqli_query($link,$sqlParentRecord);

		if($civilstatus == "Married"){
			$sqlSpouse="INSERT INTO spouse(firstname,middlename,maidenname,lastname,address,occupation,contactno,spouseid) VALUES('$spouseFirstname','$spouseMiddlename','$spouseMaidenname','$spouseLastname','$spouseAddress','$spouseOccupation','$spouseContact',$last_student_id)";
			mysqli_query($link,$sqlSpouse);
		}

		if($guardianFirstname != ""){
			$sqlGuardian="INSERT INTO parent(firstname,middlename,lastname,relationship,address,occupation,contactno) VALUES('$guardianFirstname','$guardianMiddlename','$guardianLastname','$guardianRelationship','$guardianAddress','$guardianOccupation','$guardianContact')";
			mysqli_query($link,$sqlGuardian);
			$last_guardian_id = $link->insert_id;
			$sqlGuardianRecord = "INSERT INTO parentrecord(parentid,studentid) VALUES('$last_guardian_id','$last_student_id')";
			mysqli_query($link,$sqlGuardianRecord);
		}

		if($siblingCount>-1){		
			for($i = 0; $i <= $siblingCount; $i++){
				$siblingFirstname= mysqli_real_escape_string($link,$_POST['siblingFirstname'.$i]);
				$siblingMiddlename= mysqli_real_escape_string($link,$_POST['siblingMiddlename'.$i]);
				$siblingLastname= mysqli_real_escape_string($link,$_POST['siblingLastname'.$i]);
				$siblingRelation= mysqli_real_escape_string($link,$_POST['siblingRelation'.$i]);
				$siblingArray = array($siblingFirstname,$siblingMiddlename,$siblingLastname,$siblingRelation);
				$siblingStr = implode("', '", $siblingArray);
				$sqlSibling = "INSERT INTO sibling(firstname,middlename,lastname,relationship) VALUES ('$siblingStr')";
				mysqli_query($link,$sqlSibling);
				$last_sibling_id = $link->insert_id;
				$sqlSiblingRecord = "INSERT INTO siblingrecord(siblingid,studentid) VALUES('$last_sibling_id','$last_student_id')";
				mysqli_query($link,$sqlSiblingRecord);
			}
		}
		$message = "Student Added!";
		echo "	<script type='text/javascript'>
						alert('$message');
						window.location='PageStudentProfiling-View.php?id=$studentId';
					</script>";
	}
	else
	{
		echo "Error: Could not be able to execute $sql. " .mysqli_error($link);
	}
	mysqli_close($link);
?>