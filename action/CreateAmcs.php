<?php
session_start();

include '../DBConfig/database.php';

if(isset($_POST['action'])){

	//Insert Amcs Data In Sql Start 
	if($_POST['action'] == "Create_Product_AMCS_Data"){
		$Prodct_Compny_Id = $_POST['Prodct_Compny_Id'];
		$AMCFromDate      = $_POST['AMCFromDate'];
		$AMCExpiresOn     = $_POST['AMCExpiresOn'];
		$InvoiceNo  	  = $_POST['InvoiceNo'];
		$InvoiceDate      = $_POST['InvoiceDate'];
		$Description      = $_POST['Description'];
		//$SQL = 'select * from amcss where AMCFromDate="'.$AMCFromDate.'" '
 		$sqlSelect = 'select count(Prodct_Compny_Id) as PCID from amcss where Prodct_Compny_Id="'.$Prodct_Compny_Id.'"';
		if($Results = mysqli_query($conn,$sqlSelect)){
		    $ROW = mysqli_fetch_assoc($Results);
			if($ROW["PCID"] == 0){
				$sqlamcss = 'insert into amcss(Prodct_Compny_Id,AMCFromDate,AMCExpiresOn,InvoiceNo,InvoiceDate,Description)values("'.$Prodct_Compny_Id.'","'.$AMCFromDate.'","'.$AMCExpiresOn.'","'.$InvoiceNo.'","'.$InvoiceDate.'","'.$Description.'")';
				if(mysqli_query($conn,$sqlamcss)){
					$sqlamcss_details = 'insert into amcss_details(Prodct_Compny_Id,AMCFromDate,AMCExpiresOn,InvoiceNo,InvoiceDate,Description)values("'.$Prodct_Compny_Id.'","'.$AMCFromDate.'","'.$AMCExpiresOn.'","'.$InvoiceNo.'","'.$InvoiceDate.'","'.$Description.'")';
					if(mysqli_query($conn,$sqlamcss_details)){
						echo "AMC's Created Successfully..";
					}
				}else{
					echo " AMC's  Is Already Created..";
				}
			}else{
				$sqlamcss = 'update amcss set  AMCFromDate ="'.$AMCFromDate.'", AMCExpiresOn="'.$AMCExpiresOn.'",InvoiceNo ="'.$InvoiceNo.'",InvoiceDate="'.$InvoiceDate.'",Description="'.$Description.'" where Prodct_Compny_Id="'.$Prodct_Compny_Id.'"';
				if(mysqli_query($conn,$sqlamcss)){
					$sqlamcss_details = 'insert into amcss_details(Prodct_Compny_Id,AMCFromDate,AMCExpiresOn,InvoiceNo,InvoiceDate,Description)values("'.$Prodct_Compny_Id.'","'.$AMCFromDate.'","'.$AMCExpiresOn.'","'.$InvoiceNo.'","'.$InvoiceDate.'","'.$Description.'")';
					if(mysqli_query($conn,$sqlamcss_details)){
					echo "AMC's Created Successfully..";
					}
				}else{
					echo " AMC's  Is Already Created..";
				}
			}
		}

		//$sql1 = 'select * from companies where CompanyName = "'.$CompanyName.'"';
		// if($data = mysqli_fetch_assoc(mysqli_query($conn,$sql1))){					   
		// $sql = 'insert into location_contact_compny(CompanyInsertId)values("'.$data['CompanyInsertId'].'")';
		// 	if(mysqli_query($conn,$sql)){
		// 		echo "Company Created Successfully..";			
		// 	}
		// }
	}
	
	//Insert Company Data In Sql End 
	
	
	
	if($_POST['action'] == "Alter_Product_AMCS_Data"){
		$AMCFromDate      = $_POST['AMCFromDate'];
		$AMCExpiresOn     = $_POST['AMCExpiresOn'];
		$OldInvoiceNo     = $_POST['OldInvoiceNo'];
		$InvoiceNo  	  = $_POST['InvoiceNo'];
		$InvoiceDate      = $_POST['InvoiceDate'];
		$Description      = $_POST['Description'];
		$sqlamcss = 'update amcss set  AMCFromDate ="'.$AMCFromDate.'", AMCExpiresOn="'.$AMCExpiresOn.'",InvoiceNo ="'.$InvoiceNo.'",InvoiceDate="'.$InvoiceDate.'",Description="'.$Description.'" where InvoiceNo="'.$OldInvoiceNo.'"';
		if(mysqli_query($conn,$sqlamcss)){
			$sqlamcss_details = 'update amcss_details set  AMCFromDate ="'.$AMCFromDate.'", AMCExpiresOn="'.$AMCExpiresOn.'",InvoiceNo ="'.$InvoiceNo.'",InvoiceDate="'.$InvoiceDate.'",Description="'.$Description.'" where InvoiceNo="'.$OldInvoiceNo.'"';
			if(mysqli_query($conn,$sqlamcss_details)){
			echo "AMC's Updated Successfully..";
			}
		}else{
			echo " Error In update Amc Data..";
		}
		
	}
 }
 ?>