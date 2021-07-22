<?php
session_start();

include '../DBConfig/database.php';

if(isset($_POST['action'])){
	//Delete Attendance Data In DataBase
	if($_POST['action'] == "Delete_Attendance"){
		$AttendanceId = $_POST['AttendanceId'];
	    $sql = 'delete from attendance where AttendanceId="'.$AttendanceId.'"';
		if(mysqli_query($conn,$sql)){
            echo "Attendance Deleted Successfully..";
            // window.location.reload();
		 } 
		// $sql_location_contact = 'delete from location_contact_compny where ContactInsertId="'.$Contact_Id.'"';
		// if(mysqli_query($conn,$sql_location_contact)){
        //     echo "Contact Deleted Successfully..";
         
		//  } 
	}
	//Delete Attendance Data In DataBase END 
}

?>