<?php
session_start();

include '../DBConfig/database.php';

if(isset($_POST['action'])){

	//Insert Company Data In Sql Start 
	if($_POST['action'] == "Insert_Company_Data"){
		$CompanyName = $_POST['CompanyName'];
		$Address     = $_POST['Address'];
		$Country     = $_POST['Country'];
		$State     	 = $_POST['State'];
		$City        = $_POST['City'];
		$PinCode     = $_POST['PinCode'];
		$GSTNumber   = $_POST['GSTNumber'];
		$RefferedBy  = $_POST['RefferedBy'];
		$Group_Name  = $_POST['Group'];
		$Industry    = $_POST['Industry'];
		$Email       = $_POST['Email'];
		$Description = $_POST['Description'];

	   	$sql = 'insert into companies(CompanyName,Address,Country,State,City,Pincode,GSTNumber,RefferedBy,Group_Name,Industry,Email,Description)values("'.$CompanyName.'","'.$Address.'","'.$Country .'","'.$State .'","'.$City .'","'.$PinCode .'","'.$GSTNumber.'","'.$RefferedBy.'","'.$Group_Name.'","'.$Industry.'","'.$Email.'","'.$Description.'")';
		if(mysqli_query($conn,$sql)){
			echo "Company Created Successfully..";
		}else{
			echo " Company Is Already Created..";
		}

		// $sqls = 'select * from companies where CompanyName = "'.$CompanyName.'"';
		// if($data = mysqli_fetch_assoc(mysqli_query($conn,$sqls))){					   
		// $sql = 'insert into location_contact_compny(CompanyInsertId)values("'.$data['CompanyInsertId'].'")';
		// 	if(mysqli_query($conn,$sql)){
		// 		echo "Company Created Successfully..";			
		// 	}
		// }
	}
	//Insert Company Data In Sql End 

	//Update Company Data In Sql Start 
	if($_POST['action'] == "Update_Company_Data"){
		$Company_Id  = $_POST['Company_Id'];
		$CompanyName = $_POST['CompanyName'];
		$Address     = $_POST['Address'];
		$Country     = $_POST['Country'];
		$State     	 = $_POST['State'];
		$City        = $_POST['City'];
		$PinCode     = $_POST['PinCode'];
		$GSTNumber   = $_POST['GSTNumber'];
		$RefferedBy  = $_POST['RefferedBy'];
		$Industry    = $_POST['Industry'];
		$Group_Name  = $_POST['Group'];
		$Email       = $_POST['Email'];
		$Description = $_POST['Description'];
	    $sql = 'update companies set CompanyName ="'.$CompanyName.'", Address ="'.$Address.'", Country ="'.$Country.'",State ="'.$State.'",City="'.$City.'",Pincode ="'.$PinCode.'", GSTNumber ="'.$GSTNumber.'",RefferedBy ="'.$RefferedBy.'",Group_Name = "'.$Group_Name.'",Industry="'.$Industry.'",Email="'.$Email.'",Description="'.$Description.'"where CompanyInsertId="'.$Company_Id.'"';
			if(mysqli_query($conn,$sql)){
				echo "Company Updated Successfully..";
			}

		// (CompanyName,Address,Country,State,City,Pincode,GSTNumber,RefferedBy,Industry,Email,Description)values("'.$CompanyName.'","'.$Address.'","'.$Country .'","'.$State .'","'.$City .'","'.$PinCode .'","'.$GSTNumber.'","'.$RefferedBy.'","'.$Industry.'","'.$Email.'","'.$Description.'")';
		// 	if(mysqli_query($conn,$sql)){
		// 		//echo "Company Created Successfully..";
		// 	}

	}


//  if($_POST['action'] == "Display_Company_Data"){
//     //Fetch Companies Data Start
// 	$sql = 'SELECT * FROM `companies`';
// 	if($result = mysqli_query($conn,$sql)){
// 			//create an array
// 			$CompanyArray = array();
// 			while($row =mysqli_fetch_assoc($result))
// 			{
// 				$CompanyArray[] = $row;
// 			}
// 		 echo json_encode($CompanyArray);
// 	}
//     //Fetch Companies Data 	End
// }

 }
// ?>