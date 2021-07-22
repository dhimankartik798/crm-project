<?php
session_start();

include '../DBConfig/database.php';

if(isset($_POST['Delete_action'])){
	//Delete Company Data In DataBase
	if($_POST['Delete_action'] == "Delete_Product_Data"){
		$Product_Insert_Id = $_POST['Product_Insert_Id'];
	    $sql = 'delete from products where Product_Insert_Id="'.$Product_Insert_Id.'"';
		if(mysqli_query($conn,$sql)){
            echo "Product Deleted Successfully..";
            // window.location.reload();
		 } 
// 		$sql_location_contact = 'delete from location_contact_compny where ContactInsertId="'.$Contact_Id.'"';
// 		if(mysqli_query($conn,$sql_location_contact)){
//             echo "Contact Deleted Successfully..";
         
// 		 } 
	}
	//Delete Company Data In DataBase END 
}

?>