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
	//HEIGHT NEEDS CALCULATION
	$heightCm = floor(($heightFt * 30.48) + ($heightIn * 2.54));
	$complexion = mysqli_real_escape_string($link,$_POST['complexion']);
	$ethnicity = mysqli_real_escape_string($link,$_POST['ethnicity']);
	$nationality = mysqli_real_escape_string($link,$_POST['nationality']);
	$religion = mysqli_real_escape_string($link,$_POST['religion']);
	$civilstatus = mysqli_real_escape_string($link,$_POST['civilStatus']);
	$spouseId = 0;

	$record = mysqli_query($link,"SELECT * FROM student WHERE id=$id");
    $student = mysqli_fetch_array($record);
	$oldfirstname = $student['firstname'];
	$oldmiddlename = $student['middlename'];
	$oldlastname = $student['lastname'];
	$oldbirthDate = $student['birthdate'];
	$oldcontact = $student['contactno'];
	$oldstreet = $student['permstreet'];
	$oldbarangay = $student['permbarangay'];
	$oldcity = $student['permcity'];
	$oldprovince = $student['permprovince'];
	$oldresidencyType = $student['residencytype'];
	$oldboarderStreet = $student['tempstreet'];
	$oldboarderBarangay = $student['tempbarangay'];
	$oldboarderCity = $student['tempcity'];
	$oldboarderProvince = $student['tempprovince'];
	$oldstudentId = $student['studentid'];
	$oldcollege = $student['college'];
	$olddepartment = $student['department'];
	$oldlevel = $student['level'];
	$oldstudentStatus = $student['status'];
	$oldsex = $student['sex'];
	$oldgender = $student['gender'];
	$oldheightCm = $student['height'];
	$oldweight = $student['weight'];

	//Father's Info
	$fatherId = mysqli_real_escape_string($link,$_POST['fatherId']);
	$fatherFirstname = mysqli_real_escape_string($link,$_POST['fatherFirstname']);
	$fatherMiddlename = mysqli_real_escape_string($link,$_POST['fatherMiddlename']);
	$fatherLastname = mysqli_real_escape_string($link,$_POST['fatherLastname']);
	$fatherAddress = mysqli_real_escape_string($link,$_POST['fatherAddress']);
	$fatherOccupation = mysqli_real_escape_string($link,$_POST['fatherOccupation']);
	$fatherContact = mysqli_real_escape_string($link,$_POST['fatherContact']);

	$parentrecord = mysqli_query($link,"SELECT * FROM parent WHERE id=$fatherId");
    $father = mysqli_fetch_array($parentrecord);
	$oldfatherFirstname = $father['firstname'];
	$oldfatherMiddlename = $father['middlename'];
	$oldfatherLastname = $father['lastname'];
	$oldfatherAddress = $father['address'];
	$oldfatherOccupation = $father['occupation'];
	$oldfatherContact = $father['contactno'];

	//Mother's Info
	$motherId = mysqli_real_escape_string($link,$_POST['motherId']);
	$motherFirstname = mysqli_real_escape_string($link,$_POST['motherFirstname']);
	$motherMiddlename = mysqli_real_escape_string($link,$_POST['motherMiddlename']);
	$motherLastname = mysqli_real_escape_string($link,$_POST['motherLastname']);
	$motherAddress = mysqli_real_escape_string($link,$_POST['motherAddress']);
	$motherOccupation = mysqli_real_escape_string($link,$_POST['motherOccupation']);
	$motherContact = mysqli_real_escape_string($link,$_POST['motherContact']);

	$parentrecord = mysqli_query($link,"SELECT * FROM parent WHERE id=$motherId");
    $mother = mysqli_fetch_array($parentrecord);
	$oldmotherFirstname = $mother['firstname'];
	$oldmotherMiddlename = $mother['middlename'];
	$oldmotherLastname = $mother['lastname'];
	$oldmotherAddress = $mother['address'];
	$oldmotherOccupation = $mother['occupation'];
	$oldmotherContact = $mother['contactno'];

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

	$changed = "CHANGED ";
	$from = " FROM ";
	$to = " TO ";

	if($guardianId != "" && $guardianFirstname != ""){
		$parentrecord = mysqli_query($link,"SELECT * FROM parent WHERE id=$guardianId");
		$guardian = mysqli_fetch_array($parentrecord);
		$oldguardianFirstname = $guardian['firstname'];
		$oldguardianMiddlename = $guardian['middlename'];
		$oldguardianLastname = $guardian['lastname'];
		$oldguardianRelationship = $guardian['relationship'];
		$oldguardianAddress = $guardian['address'];
		$oldguardianOccupation = $guardian['occupation'];
		$oldguardianContact = $guardian['contactno'];

		if($oldguardianFirstname != $guardianFirstname){
			$changestr = $changed." GUARDIAN\'S FIRSTNAME ".$from.$oldguardianFirstname.$to.$guardianFirstname;
			$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
			mysqli_query($link,$changequery);
		}

		if($oldguardianMiddlename != $guardianMiddlename){
			$changestr = $changed." GUARDIAN\'S MIDDLENAME ".$from.$oldguardianMiddlename.$to.$guardianMiddlename;
			$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
			mysqli_query($link,$changequery);
		}

		if($oldguardianLastname != $guardianLastname){
			$changestr = $changed." GUARDIAN\'S LASTNAME ".$from.$oldguardianLastname.$to.$guardianLastname;
			$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
			mysqli_query($link,$changequery);
		}

		if($oldguardianRelationship != $guardianRelationship){
			$changestr = $changed." GUARDIAN\'S RELATIONSHIP ".$from.$oldguardianRelationship.$to.$guardianRelationship;
			$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
			mysqli_query($link,$changequery);
		}

		if($oldguardianAddress != $guardianAddress){
			$changestr = $changed." GUARDIAN\'S ADDRESS ".$from.$oldguardianAddress.$to.$guardianAddress;
			$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
			mysqli_query($link,$changequery);
		}

		if($oldguardianOccupation != $guardianOccupation){
			$changestr = $changed." GUARDIAN\'S OCCUPATION ".$from.$oldguardianOccupation.$to.$guardianOccupation;
			$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
			mysqli_query($link,$changequery);
		}

		if($oldguardianContact != $guardianContact){
			$changestr = $changed." GUARDIAN\'S CONTACT ".$from.$oldguardianContact.$to.$guardianContact;
			$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
			mysqli_query($link,$changequery);
		}

	}

	if($spouseId > 0 && $civilstatus == "Married"){

		$spouserecord = mysqli_query($link,"SELECT * FROM spouse WHERE spouseid=$id");
		$spouse = mysqli_fetch_array($spouserecord);
		$oldspouseFirstname = $spouse['firstname'];
		$oldspouseMiddlename = $spouse['middlename'];
		$oldspouseMaidenname = $spouse['maidenname'];
		$oldspouseLastname = $spouse['lastname'];
		$oldspouseAddress = $spouse['address'];
		$oldspouseOccupation = $spouse['occupation'];
		$oldspouseContact = $spouse['contactno'];

		if($oldspouseFirstname != $spouseFirstname){
			$changestr = $changed." SPOUSE\'S FIRSTNAME ".$from.$oldspouseFirstname.$to.$spouseFirstname;
			$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
			echo $changequery;
			mysqli_query($link,$changequery);
		}

		if($oldspouseMiddlename != $spouseMiddlename){
			$changestr = $changed." SPOUSE\'S MIDDLENAME ".$from.$oldspouseMiddlename.$to.$spouseMiddlename;
			$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
			mysqli_query($link,$changequery);
		}

		if($oldspouseMaidenname != $spouseMaidenname){
			$changestr = $changed." SPOUSE\'S MAIDENNAME ".$from.$oldspouseMaidenname.$to.$spouseMaidenname;
			$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
			mysqli_query($link,$changequery);
		}

		if($oldspouseLastname != $spouseLastname){
			$changestr = $changed." SPOUSE\'S LASTNAME ".$from.$oldspouseLastname.$to.$spouseLastname;
			$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
			mysqli_query($link,$changequery);
		}

		if($oldspouseAddress != $spouseAddress){
			$changestr = $changed." SPOUSE\'S ADDRESS ".$from.$oldspouseAddress.$to.$spouseAddress;
			$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
			mysqli_query($link,$changequery);
		}

		if($oldspouseOccupation != $spouseOccupation){
			$changestr = $changed." SPOUSE\'S OCCUPATION ".$from.$oldspouseOccupation.$to.$spouseOccupation;
			$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
			mysqli_query($link,$changequery);
		}

		if($oldspouseContact != $spouseContact){
			$changestr = $changed." SPOUSE\'S CONTACT ".$from.$oldspouseContact.$to.$spouseContact;
			$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
			mysqli_query($link,$changequery);
		}
		
	}
	
	//SiblingInfo
	$siblingCount = mysqli_real_escape_string($link,$_POST['siblingCount']);

	$sqlFather="UPDATE parent SET firstname='$fatherFirstname',middlename='$fatherMiddlename',lastname='$fatherLastname',address='$fatherAddress',occupation='$fatherOccupation',contactno='$fatherContact' WHERE id='$fatherId'";
	$sqlMother="UPDATE parent SET firstname='$motherFirstname',middlename='$motherMiddlename',lastname='$motherLastname',address='$motherAddress',occupation='$motherOccupation',contactno='$motherContact' WHERE id='$motherId'";
	$sql="UPDATE student SET firstname='$firstname',middlename='$middlename',lastname='$lastname',birthdate='$birthDate',contactno='$contact',permstreet='$street',permbarangay='$barangay',permcity='$city',permprovince='$province',residencytype='$residencyType',tempstreet='$boarderStreet',tempbarangay='$boarderBarangay',tempcity='$boarderCity',tempprovince='$boarderProvince',studentid='$studentId',college='$college',department='$department',level='$level',status='$studentStatus',sex='$sex',gender='$gender',height='$heightCm',weight='$weight',complexion='$complexion',ethnicity='$ethnicity',nationality='$nationality',religion='$religion',civilstatus='$civilstatus' 
	WHERE id='$id'";

	//Update for Student

	if($oldfirstname != $firstname){
		$changestr = $changed." FIRSTNAME ".$from.$oldfirstname.$to.$firstname;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldmiddlename != $middlename){
		$changestr = $changed." MIDDLENAME ".$from.$oldmiddlename.$to.$middlename;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		echo 'same middle name';
		echo $changestr;
		mysqli_query($link,$changequery);
	}

	if($oldlastname != $lastname){
		$changestr = $changed." LASTNAME ".$from.$oldlastname.$to.$lastname;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldbirthDate != $birthDate){
		$changestr = $changed." BIRTHDATE ".$from.$oldbirthDate.$to.$birthDate;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldcontact != $contact){
		$changestr = $changed." CONTACTNO ".$from.$oldcontact.$to.$contact;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldstreet != $street){
		$changestr = $changed." ADDRESS, STREET ".$from.$oldstreet.$to.$street;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldbarangay != $barangay){
		$changestr = $changed." ADDRESS, BARANGAY ".$from.$oldbarangay.$to.$barangay;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldcity != $city){
		$changestr = $changed." ADDRESS, CITY ".$from.$oldcity.$to.$city;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldprovince != $province){
		$changestr = $changed." ADDRESS, PROVINCE ".$from.$oldprovince.$to.$province;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldresidencyType != $residencyType){
		$changestr = $changed." RESIDENCY ".$from.$oldresidencyType.$to.$residencyType;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldboarderStreet != $boarderStreet){
		$changestr = $changed." TEMPORARY ADDRESS, STREET ".$from.$oldboarderStreet.$to.$boarderStreet;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldboarderBarangay != $boarderBarangay){
		$changestr = $changed." TEMPORARY ADDRESS, BARANGAY ".$from.$oldboarderBarangay.$to.$boarderBarangay;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldboarderCity != $boarderCity){
		$changestr = $changed." TEMPORARY ADDRESS, CITY ".$from.$oldboarderCity.$to.$boarderCity;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldboarderProvince != $boarderProvince){
		$changestr = $changed." TEMPORARY ADDRESS, PROVINCE ".$from.$oldboarderProvince.$to.$boarderProvince;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldstudentId != $studentId){
		$changestr = $changed." STUDENT ID ".$from.$oldstudentId.$to.$studentId;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldcollege != $college){
		$changestr = $changed." COLLEGE ".$from.$oldcollege.$to.$college;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($olddepartment != $department){
		$changestr = $changed." DEPARTMENT ".$from.$olddepartment.$to.$department;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldlevel != $level){
		$changestr = $changed." LEVEL ".$from.$oldlevel.$to.$level;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldstudentStatus != $studentStatus){
		$changestr = $changed." STUDENT STATUS ".$from.$oldstudentStatus.$to.$studentStatus;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldsex != $sex){
		$changestr = $changed." SEX ".$from.$oldsex.$to.$sex;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldgender != $gender){
		$changestr = $changed." GENDER ".$from.$oldgender.$to.$gender;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldheightCm != $heightCm){
		$changestr = $changed." HEIGHT ".$from.$oldheightCm."cm".$to.$heightCm."cm";
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldweight != $weight){
		$changestr = $changed." WEIGHT ".$from.$oldweight."kg".$to.$weight."kg";
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	//Update for Father

	if($oldfatherFirstname != $fatherFirstname){
		$changestr = $changed." FATHER\'S FIRSTNAME ".$from.$oldfatherFirstname.$to.$fatherFirstname;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldfatherMiddlename != $fatherMiddlename){
		$changestr = $changed." FATHER\'S MIDDLENAME ".$from.$oldfatherMiddlename.$to.$fatherMiddlename;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldfatherLastname != $fatherLastname){
		$changestr = $changed." FATHER\'S LASTNAME ".$from.$oldfatherLastname.$to.$fatherLastname;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldfatherAddress != $fatherAddress){
		$changestr = $changed." FATHER\'S ADDRESS ".$from.$oldfatherAddress.$to.$fatherAddress;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldfatherOccupation != $fatherOccupation){
		$changestr = $changed." FATHER\'S OCCUPATION ".$from.$oldfatherOccupation.$to.$fatherOccupation;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldfatherContact != $fatherContact){
		$changestr = $changed." FATHER\'S CONTACT ".$from.$oldfatherContact.$to.$fatherContact;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	//Update for Mother

	if($oldmotherFirstname != $motherFirstname){
		$changestr = $changed." MOTHER\'S FIRSTNAME ".$from.$oldmotherFirstname.$to.$motherFirstname;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldmotherMiddlename != $motherMiddlename){
		$changestr = $changed." MOTHER\'S MIDDLENAME ".$from.$oldmotherMiddlename.$to.$motherMiddlename;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldmotherLastname != $motherLastname){
		$changestr = $changed." MOTHER\'S LASTNAME ".$from.$oldmotherLastname.$to.$motherLastname;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldmotherAddress != $motherAddress){
		$changestr = $changed." MOTHER\'S ADDRESS ".$from.$oldmotherAddress.$to.$motherAddress;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldmotherOccupation != $motherOccupation){
		$changestr = $changed." MOTHER\'S OCCUPATION ".$from.$oldmotherOccupation.$to.$motherOccupation;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

	if($oldmotherContact != $motherContact){
		$changestr = $changed." MOTHER\'S CONTACT ".$from.$oldmotherContact.$to.$motherContact;
		$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
		mysqli_query($link,$changequery);
	}

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
			$changestr = "ADDED GUARDIAN ".$guardianFirstname." FOR ".$firstname." ".$lastname;
			$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
			mysqli_query($link,$changequery);
		}
		else if($guardianFirstname == "" && $guardianId != ""){ //Removes Guardian
			$sqlGuardian="DELETE FROM parentrecord WHERE id=$guardianId";
			mysqli_query($link,$sqlGuardian);
			$changestr = "DELETED GUARDIAN ".$guardianFirstname." FOR ".$firstname." ".$lastname;
			$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
			mysqli_query($link,$changequery);
		}


		if($civilstatus == "Married" && $spouseId == 0){ //Adds Spouse (Newly Married)
			$sqlSpouse="INSERT INTO spouse(firstname,middlename,maidenname,lastname,address,occupation,contactno,spouseid) VALUES('$spouseFirstname','$spouseMiddlename','$spouseMaidenname','$spouseLastname','$spouseAddress','$spouseOccupation','$spouseContact',$id)";
			mysqli_query($link,$sqlSpouse);
			$changestr = "ADDED SPOUSE ".$spouseFirstname." FOR ".$firstname." ".$lastname;
			$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
			mysqli_query($link,$changequery);
		}
		else if($civilstatus != "Married" && $spouseId > 0){ //Removes Spouse (Newly Separated) :(
			$sqlSpouse="DELETE FROM spouse WHERE spouseid='$id'";
			mysqli_query($link,$sqlSpouse);
			$changestr = "DELETED SPOUSE ".$spouseFirstname." FOR ".$firstname." ".$lastname;
			$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
			mysqli_query($link,$changequery);
			echo $changestr;
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
					if($siblingWillDelete == 'true'){
						$siblingDeleteValue = mysqli_real_escape_string($link,$_POST['siblingDeleteValue'.$varloop]);
						$deleteSiblingQuery = "DELETE FROM siblingrecord WHERE siblingid='$siblingDeleteValue'";
						mysqli_query($link,$deleteSiblingQuery);
						$siblingrecord = mysqli_query($link,"SELECT * FROM sibling WHERE id=$siblingDeleteValue");
						$sibling = mysqli_fetch_array($siblingrecord);
						$tempSiblingFirstname = $sibling['firstname'];
						$changestr = "DELETED SIBLING ".$tempSiblingFirstname.$from.$firstname;
						$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
						mysqli_query($link,$changequery);
						
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

					$siblingrecord = mysqli_query($link,"SELECT * FROM sibling WHERE id=$siblingId");
					$sibling = mysqli_fetch_array($siblingrecord);
					$oldsiblingFirstname = $sibling['firstname'];
					$oldsiblingMiddlename = $sibling['middlename'];
					$oldsiblingLastname = $sibling['lastname'];
					$oldsiblingRelationship = $sibling['relationship'];

					if($oldsiblingFirstname != $siblingFirstname){
						$changestr = $changed." SIBLING\'S FIRSTNAME ".$from.$oldsiblingFirstname.$to.$siblingFirstname;
						$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
						mysqli_query($link,$changequery);
					}

					if($oldsiblingMiddlename != $siblingMiddlename){
						$changestr = $changed." SIBLING\'S MIDDLENAME ".$from.$oldsiblingMiddlename.$to.$siblingMiddlename;
						$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
						mysqli_query($link,$changequery);
					}

					if($oldsiblingLastname != $siblingLastname){
						$changestr = $changed." SIBLING\'S LASTNAME ".$from.$oldsiblingLastname.$to.$siblingLastname;
						$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
						mysqli_query($link,$changequery);
					}

					if($oldsiblingRelationship != $siblingRelation){
						$changestr = $changed." SIBLING\'S RELATIONSHIP ".$from.$oldsiblingRelationship.$to.$siblingRelation;
						$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
						mysqli_query($link,$changequery);
					}

					$sqlSibling = "UPDATE sibling SET firstname='$siblingFirstname',middlename='$siblingMiddlename',lastname='$siblingLastname',relationship='$siblingRelation' WHERE id='$siblingId'";
					mysqli_query($link,$sqlSibling);
				}
				else{ //Adds a Sibling

					$changestr = " ADDED SIBLING  ".$siblingFirstname." FOR ".$firstname;
					$changequery = "INSERT INTO changerecord(changestr,studentid,datechanged) VALUES('$changestr',$id,NOW())";
					mysqli_query($link,$changequery);

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
		$message = "Student Updated!";
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