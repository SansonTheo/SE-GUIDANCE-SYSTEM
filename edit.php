<?php
	include "server.php";
	$id = mysqli_real_escape_string($link,$_POST['id']);
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
	$complexion = mysqli_real_escape_string($link,$_POST['complexion']);
	$ethnicity = mysqli_real_escape_string($link,$_POST['ethnicity']);
	$nationality = mysqli_real_escape_string($link,$_POST['nationality']);
	$religion = mysqli_real_escape_string($link,$_POST['religion']);
	$civilstatus = mysqli_real_escape_string($link,$_POST['civilStatus']);
	$spouseId = 0;

	//Father's Info
	$fatherId = mysqli_real_escape_string($link,$_POST['fatherId']);
	$fatherFirstname = mysqli_real_escape_string($link,$_POST['fatherFirstname']);
	$fatherMiddlename = mysqli_real_escape_string($link,$_POST['fatherMiddlename']);
	$fatherLastname = mysqli_real_escape_string($link,$_POST['fatherLastname']);
	$fatherAddress = mysqli_real_escape_string($link,$_POST['fatherAddress']);
	$fatherOccupation = mysqli_real_escape_string($link,$_POST['fatherOccupation']);
	$fatherContact = mysqli_real_escape_string($link,$_POST['fatherContact']);

	//Mother's Info
	$motherId = mysqli_real_escape_string($link,$_POST['motherId']);
	$motherFirstname = mysqli_real_escape_string($link,$_POST['motherFirstname']);
	$motherMiddlename = mysqli_real_escape_string($link,$_POST['motherMiddlename']);
	$motherLastname = mysqli_real_escape_string($link,$_POST['motherLastname']);
	$motherAddress = mysqli_real_escape_string($link,$_POST['motherAddress']);
	$motherOccupation = mysqli_real_escape_string($link,$_POST['motherOccupation']);
	$motherContact = mysqli_real_escape_string($link,$_POST['motherContact']);
	//Guardian's Info
	$guardianId = mysqli_real_escape_string($link,$_POST['guardianId']);
	$guardianFirstname = mysqli_real_escape_string($link,$_POST['guardianFirstname']);
	$guardianMiddlename = mysqli_real_escape_string($link,$_POST['guardianMiddlename']);
	$guardianLastname = mysqli_real_escape_string($link,$_POST['guardianLastname']);
	$guardianRelationship = mysqli_real_escape_string($link,$_POST['guardianRelationship']);
	$guardianAddress = mysqli_real_escape_string($link,$_POST['guardianAddress']);
	$guardianOccupation = mysqli_real_escape_string($link,$_POST['guardianOccupation']);
	$guardianContact = mysqli_real_escape_string($link,$_POST['guardianContact']);
	//Spouse's Info
	$spouseId = mysqli_real_escape_string($link,$_POST['spouseId']);
	$spouseFirstname = mysqli_real_escape_string($link,$_POST['spouseFirstname']);
	$spouseMiddlename = mysqli_real_escape_string($link,$_POST['spouseMiddlename']);
	$spouseMaidenname = mysqli_real_escape_string($link,$_POST['spouseMaidenname']);
	$spouseLastname = mysqli_real_escape_string($link,$_POST['spouseLastname']);
	$spouseAddress = mysqli_real_escape_string($link,$_POST['spouseAddress']);
	$spouseOccupation = mysqli_real_escape_string($link,$_POST['spouseOccupation']);
	$spouseContact = mysqli_real_escape_string($link,$_POST['spouseContact']);
	//SiblingInfo
	$siblingCount = mysqli_real_escape_string($link,$_POST['siblingCount']);

	$sqlFather="UPDATE parent SET firstname='$fatherFirstname',middlename='$fatherMiddlename',lastname='$fatherLastname',address='$fatherAddress',occupation='$fatherOccupation',contactno='$fatherContact' WHERE id='$fatherId'";
	$sqlMother="UPDATE parent SET firstname='$motherFirstname',middlename='$motherMiddlename',lastname='$motherLastname',address='$motherAddress',occupation='$motherOccupation',contactno='$motherContact' WHERE id='$motherId'";
	$sql="UPDATE student SET firstname='$firstname',middlename='$middlename',lastname='$lastname',birthdate='$birthDate',contactno='$contact',permstreet='$street',permbarangay='$barangay',permcity='$city',permprovince='$province',residencytype='$residencyType',tempstreet='$boarderStreet',tempbarangay='$boarderBarangay',tempcity='$boarderCity',tempprovince='$boarderProvince',studentid='$studentId',college='$college',department='$department',level='$level',status='$studentStatus',sex='$sex',gender='$gender',heightft='$heightFt',heightin='$heightIn',weight='$weight',complexion='$complexion',ethnicity='$ethnicity',nationality='$nationality',religion='$religion',civilstatus='$civilstatus' 
	WHERE id='$id'";
	
	if(mysqli_query($link,$sql))
	{
		mysqli_query($link,$sqlFather);
		mysqli_query($link,$sqlMother);
		
		if($guardianFirstname != "" && $guardianId != ""){ //Updates Guardian
			$sqlGuardian="UPDATE parent SET firstname='$guardianFirstname',middlename='$guardianMiddlename',lastname='$guardianLastname',address='$guardianAddress',occupation='$guardianOccupation',contactno='$guardianContact' WHERE id=$guardianId";							
			mysqli_query($link,$sqlGuardian);
		}
		else if($guardianFirstname != "" && $guardianId == ""){ //Adds New Guardian
			$sqlGuardian="INSERT INTO parent(firstname,middlename,lastname,relationship,address,occupation,contactno) VALUES('$guardianFirstname','$guardianMiddlename','$guardianLastname','$guardianRelationship','$guardianAddress','$guardianOccupation','$guardianContact')";
			mysqli_query($link,$sqlGuardian);
			$last_guardian_id = $link->insert_id;
			$sqlGuardianRecord = "INSERT INTO parentrecord(parentid,studentid) VALUES('$last_guardian_id','$id')";
			mysqli_query($link,$sqlGuardianRecord);
		}
		else if($guardianFirstname == "" && $guardianId == ""){ //Removes Guardian
			$sqlGuardian="DELETE FROM parent WHERE id=$guardianId";
			mysqli_query($link,$sqlGuardian);
		}


		if($civilstatus == "Married" && $spouseId == 0){ //Adds Spouse (Newly Married)
			$sqlSpouse="INSERT INTO spouse(firstname,middlename,maidenname,lastname,address,occupation,contactno,spouseid) VALUES('$spouseFirstname','$spouseMiddlename','$spouseMaidenname','$spouseLastname','$spouseAddress','$spouseOccupation','$spouseContact',$id)";
			mysqli_query($link,$sqlSpouse);
		}
		else if($civilstatus != "Married" && $spouseId > 0){ //Removes Spouse (Newly Separated) :(
			$sqlSpouse="DELETE FROM spouse WHERE spouseid='$id'";
			mysqli_query($link,$sqlSpouse);
		}
		else if($civilstatus == "Married" && $spouseId > 0){ //Updates Spouse Already Married
			$sqlSpouse="UPDATE spouse SET firstname='$spouseFirstname',middlename='$spouseMiddlename',maidenname='$spouseMaidenname',lastname='$spouseLastname',address='$spouseAddress',occupation='$spouseOccupation',contactno='$spouseContact' WHERE spouseid=$id";
			mysqli_query($link,$sqlSpouse);
		}

		if($siblingCount>-1){
			$siblingToDeleteCount = mysqli_real_escape_string($link,$_POST['siblingToDeleteCount']);
			$siblingExisting = mysqli_real_escape_string($link,$_POST['siblingExisting']);
			if($siblingToDeleteCount>0){ //Deletes Existing Siblings
				for($varloop = 0; $varloop <= $siblingExisting; $varloop++){
					$siblingWillDelete = mysqli_real_escape_string($link,$_POST['siblingWillDelete'.$varloop]);
					echo $siblingWillDelete;
					if($siblingWillDelete == 'true'){
						$siblingDeleteValue = mysqli_real_escape_string($link,$_POST['siblingDeleteValue'.$varloop]);
						$deleteSiblingQuery = "DELETE FROM sibling WHERE id='$siblingDeleteValue'";
						mysqli_query($link,$deleteSiblingQuery);
					}
				}
			}	
			for($i = 0; $i <= $siblingCount; $i++){
				$siblingId = mysqli_real_escape_string($link,$_POST['siblingId'.$i]);
				$siblingFirstname= mysqli_real_escape_string($link,$_POST['siblingFirstname'.$i]);
				$siblingMiddlename= mysqli_real_escape_string($link,$_POST['siblingMiddlename'.$i]);
				$siblingLastname= mysqli_real_escape_string($link,$_POST['siblingLastname'.$i]);
				$siblingRelation= mysqli_real_escape_string($link,$_POST['siblingRelation'.$i]);
				if($siblingId != ""){ //Update a sibling
					$sqlSibling = "UPDATE sibling SET firstname='$siblingFirstname',middlename='$siblingMiddlename',lastname='$siblingLastname',relationship='$siblingRelation' WHERE id='$siblingId'";
					mysqli_query($link,$sqlSibling);
				}
				else{ //Adds a Sibling
					$siblingArray = array($siblingFirstname,$siblingMiddlename,$siblingLastname,$siblingRelation);
					$siblingStr = implode("', '", $siblingArray);
					$sqlSibling = "INSERT INTO sibling(firstname,middlename,lastname,relationship) VALUES ('$siblingStr')";
					mysqli_query($link,$sqlSibling);
					$last_sibling_id = $link->insert_id;
					$sqlSiblingRecord = "INSERT INTO siblingrecord(siblingid,studentid) VALUES('$last_sibling_id','$id')";
					mysqli_query($link,$sqlSiblingRecord);
				}				
				
			}
		}
		header("location:PageStudentProfiling-View.php?id=$id");
		//$redirect = 'http://' . $_SERVER['HTTP_HOST'] .'/SESystem/PageStudentProfiling-Index.html';
		//header("location:".$redirect);
		$message = "Student Edited!";
    	echo "	<script type='text/javascript'>
                alert('$message');
                window.location='PageStudentProfiling-View.php?id=$id';
			</script>";
	}
	else
	{
		echo "Error: Could not be able to execute $sql. " .mysqli_error($link);
	}
	mysqli_close($link);
?>