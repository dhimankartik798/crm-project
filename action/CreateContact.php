<?php
session_start();

include '../DBConfig/database.php';

if(isset($_POST['action'])){

	//Insert Company Data In Sql Start 
	if($_POST['action'] == "Insert_Contact_Data"){
	    //$CompanyInsertId = $_POST['CompanyInsertids'];
		$ContactName     = $_POST['ContactName'];
		$Email_Id		 = $_POST['Email_Id'];
		$MobileNumber    = $_POST['MobileNumber'];
		$WhatsApp        = $_POST['WhatsApp'];
		$Designation     = $_POST['Designation'];
		//echo $_POST["CompanyInsertids"];
	    $sql = 'insert into contacts(ContactName,Email_Id,MobileNumber,WhatsApp,Designation)values("'.$ContactName.'","'.$Email_Id.'","'.$MobileNumber.'","'.$WhatsApp.'","'.$Designation.'")';
		if(mysqli_query($conn,$sql)){
			//echo "Contact Created Successfully..";
			$SQL = 'select * from contacts where ContactName = "'.$ContactName.'" AND  MobileNumber = "'.$MobileNumber.'"';
			if($data = mysqli_fetch_assoc(mysqli_query($conn,$SQL))){					   
				foreach($_POST["CompanyInsertids"] as $CompanyInsertId)
				{
					// echo $sqll = 'update location_contact_compny set ContactInsertId = "'.$data['ContactInsertId'].'" where CompanyInsertId ="'.$CompanyInsertId.'"';
					// if(mysqli_query($conn,$sqll)){
					// 	echo "Contact Created Successfully..";
					// }
					if($CompanyInsertId != "" ){
							$sqll = 'insert into location_contact_compny(ContactInsertId,CompanyInsertId) values("'.$data['ContactInsertId'].'","'.$CompanyInsertId.'")';
							if(mysqli_query($conn,$sqll)){
								// echo "Contact Created Successfully..";
							}
					}else{
						echo "Contact Created Successfully..";
					}
				}
			}
		}else{
			echo "Contact Is Already Created..";
		}
		// foreach($_POST["CompanyInsertids"] as $CompanyInsertId)
		// {
		// $SQL = 'select * from contacts where ContactName = "'.$ContactName.'" AND  MobileNumber = "'.$MobileNumber.'"';
		// if($data = mysqli_fetch_assoc(mysqli_query($conn,$SQL))){					   
		// 	foreach($_POST["CompanyInsertids"] as $CompanyInsertId)
		// 	{
				
		// 		if($CompanyInsertId != "" ){
		// 				$sqll = 'insert into location_contact_compny(ContactInsertId,CompanyInsertId) values("'.$data['ContactInsertId'].'","'.$CompanyInsertId.'")';
		// 				if(mysqli_query($conn,$sqll)){
							
		// 				}
		// 		}else{
		// 			echo "Contact Created Successfully..";
		// 		}
		// 	}
		// }
	//Insert Company Data In Sql End 
	}
	//Update Contact Data In Sql Start 
	if($_POST['action'] == "Update_Contact_Data"){
		$ContactInsertId = $_POST['ContactInsertId'];
		$ContactName 	 = $_POST['ContactName'];
		$Email_Id		 = $_POST['Email_Id'];
		$MobileNumber    = $_POST['MobileNumber'];
		$WhatsApp     	 = $_POST['WhatsApp'];
		$Designation	 = $_POST['Designation'];
		$sqls = 'update contacts set ContactName ="'.$ContactName.'",Email_Id="'.$Email_Id.'", MobileNumber ="'.$MobileNumber.'", WhatsApp ="'.$WhatsApp.'" ,Designation ="'.$Designation.'" where ContactInsertId="'.$ContactInsertId.'"';
		if(mysqli_query($conn,$sqls)){
			//echo "Contact Updated Successfully..";
			 $sqlls = 'delete from  location_contact_compny where ContactInsertId = "'.$ContactInsertId.'"';
					if(mysqli_query($conn,$sqlls)){
						//echo "Contact Delete Successfully..";
					}
			foreach($_POST["CompanyInsertids"] as $CompanyInsertId)
				{
				//    echo $sqlls = 'delete from  location_contact_compny where ContactInsertId = "'.$ContactInsertId.'"';
				// 	if(mysqli_query($conn,$sqlls)){
				// 		echo "Contact Delete Successfully..";
				// 	}

					if($CompanyInsertId != "" ){
						 $sqll = 'insert into location_contact_compny(ContactInsertId,CompanyInsertId) values("'.$ContactInsertId.'","'.$CompanyInsertId.'")';
						if(mysqli_query($conn,$sqll)){
							// echo "Contact Created Successfully..";
						}
					}else{
						echo "Contact Updated Successfully..";
					}
				}
		}else{
			echo "Email Id & Contact Number Is Already Created..";
		}
	}

}

if($_POST['action'] == "Display_Contact_Data"){
	//Fetch Contact Data Start
	$sql = 'SELECT * FROM `contacts`';
	if($result = mysqli_query($conn,$sql)){
			//create an array
			$CompanyArray = array();
			while($row =mysqli_fetch_assoc($result))
			{
				$CompanyArray[] = $row;
			}
		 echo json_encode($CompanyArray);
	}
	//Fetch Contact Data End
}


?>