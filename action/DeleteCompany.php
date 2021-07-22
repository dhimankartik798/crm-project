<?php
session_start();

include '../DBConfig/database.php';

if(isset($_POST['Delete_action'])){
	//Delete Company Data In DataBase
	if($_POST['Delete_action'] == "Delete_Company_Data"){
		$Company_Id = $_POST['Company_Id'];
		
	    $sql = 'delete from companies where CompanyInsertId="'.$Company_Id.'"';
		if(mysqli_query($conn,$sql)){
            echo "Company Deleted Successfully..";
            
		 }
		 
	}
	//Delete Company Data In DataBase END 

	//Delete Company Product Data In DataBase
    if($_POST['Delete_action'] == "Delete_Company_Product_Data"){
		$Prodct_Compny_Id = $_POST['Prodct_Compny_Id'];
	    $sql = 'delete from add_product_compny where Prodct_Compny_Id="'.$Prodct_Compny_Id.'"';
		if(mysqli_query($conn,$sql)){
			// $SQL = 'delete from amcss where Product_Compny_Id="'.$Prodct_Compny_Id.'"';
			// if($conn,$SQL){
			 	echo "Company Product Deleted Successfully..";
			// }
		 }
		 $SQL = 'delete from amcss where Prodct_Compny_Id="'.$Prodct_Compny_Id.'"';
		if(mysqli_query($conn,$SQL)){
			$SQLamcss_details = 'delete from amcss_details where Prodct_Compny_Id="'.$Prodct_Compny_Id.'"';
			if(mysqli_query($conn,$SQLamcss_details)){
				echo "& All AMC'S Is Related To This Product Is Deleted";
			}
		} 
	}
	//Delete Company Product Data In DataBase END 


}

?>