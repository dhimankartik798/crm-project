<?php
session_start();

include '../DBConfig/database.php';

if(isset($_POST['Delete_action'])){
	//Delete Company Data In DataBase
	if($_POST['Delete_action'] == "Delete_Contact_Data"){
		$Contact_Id = $_POST['Contact_Id'];
	    $sql = 'delete from contacts where ContactInsertId="'.$Contact_Id.'"';
		if(mysqli_query($conn,$sql)){
            //echo "Contact Deleted Successfully..";
            // window.location.reload();
		 } 
		$sql_location_contact = 'delete from location_contact_compny where ContactInsertId="'.$Contact_Id.'"';
		if(mysqli_query($conn,$sql_location_contact)){
            echo "Contact Deleted Successfully..";
         
		 } 
	}
	//Delete Company Data In DataBase END 
}

?>