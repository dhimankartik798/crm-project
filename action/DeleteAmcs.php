<?php
session_start();

include '../DBConfig/database.php';

if(isset($_POST['Delete_action'])){

	//Delete Company Data In DataBase
	if($_POST['Delete_action'] == "Delete_AMCS_Data"){
		$AMCInsertId = $_POST['AMCInsertId'];	
	    $sql = 'delete from amcss_details where AMCDetailInsertId="'.$AMCInsertId.'"';
		if(mysqli_query($conn,$sql)){
            echo "Amcs Deleted Successfully..";
            
		 }	 
    }
}
    //Delete Company Data In DataBase END 
?>