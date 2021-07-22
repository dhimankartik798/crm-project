<?php
session_start();

include '../DBConfig/database.php';

if(isset($_POST['action'])){

	//Insert Company Product Data In Sql Start 
	if($_POST['action'] == "Insert_CompanyProduct_Data"){	
		$CompanyId 	  = $_POST['CompanyId'];
		$ProductId 	  = $_POST['ProductId'];
		$SerialNo  	  = $_POST['SerialNo'];
		$Email    	  = $_POST['Email'];
		$Desc  		  = mysqli_real_escape_string($conn,$_POST['Description']);
		
		//$Des 		  = mysql_set_charset($Description);

	    $sql = 'insert into add_product_compny(CompanyInsertId,Product_Insert_Id,Serial_No,Email_id,Description)values("'.$CompanyId.'","'.$ProductId.'","'.$SerialNo.'","'.$Email.'","'.$Desc.'")';
		if(mysqli_query($conn,$sql)){
			echo "Product add  to Company Successfully..";
		}else{
			echo "Product Is already add to Company ..";
		}

		// $sql1 = 'select * from companies where CompanyName = "'.$CompanyName.'"';
		// if($data = mysqli_fetch_assoc(mysqli_query($conn,$sql1))){					   
		// $sql = 'insert into location_contact_compny(CompanyInsertId)values("'.$data['CompanyInsertId'].'")';
		// 	if(mysqli_query($conn,$sql)){
		// 		echo "Company Created Successfully..";			
		// 	}
		// }
	}
	//Insert Company Data In Sql End 

	//Update Company Product Data 
	if($_POST['action'] == "Update_CompanyProduct_Data"){	
		 $CompanyId 	   = $_POST['CompanyId'];
		 $ProductId 	   = $_POST['ProductId'];
		 $SerialNo  	   = $_POST['SerialNo'];
		 $Email    	       = $_POST['Email'];
		 $Desc  		   = mysqli_real_escape_string($conn,$_POST['Description']);
		 $NotInterested    = $_POST['NotInterested'];
		 $Prodct_Compny_Id = $_POST['Prodct_Compny_Id'];
		 $sql = 'update add_product_compny set  CompanyInsertId ="'.$CompanyId.'" , Product_Insert_Id="'.$ProductId.'" , Serial_No="'.$SerialNo.'" , Email_id="'.$Email.'" , Description ="'.$Desc.'", ServiceStatus="'.$NotInterested.'"  where Prodct_Compny_Id ="'.$Prodct_Compny_Id.'"';
        //$SQL = 'update add_product_compny set CompanyInsertId="'..'"';
		//$sql = 'insert into add_product_compny(CompanyInsertId,Product_Insert_Id,Serial_No,Email_id,Description)values("'.$CompanyId.'","'.$ProductId.'","'.$SerialNo.'","'.$Email.'","'.$Description.'")';
		if(mysqli_query($conn,$sql)){
			echo "Company Product  Updated Successfully..";
		}
		else{
			echo "Company Product Is Not  Updated ..";
		}

	}
	//Update Company Product Data

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
?>