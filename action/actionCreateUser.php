<?php
session_start();

include '../DBConfig/database.php';

if(isset($_POST['action'])){

	//Insert User Data In Sql Start 
	if($_POST['action'] == "Insert_UserPermission_Data"){
		$UserName   = $_POST['UserName'];
		$EmailId    = $_POST['EmailId'];
		$ContactNo  = $_POST['ContactNo'];
		$Password   = base64_encode($_POST['Password']);
	   	$sql = 'insert into testuser(username,email,phone_no,password,user_type,user_status)values("'.$UserName.'","'.$EmailId.'","'.$ContactNo .'","'.$Password .'","admin","Active")';
		if(mysqli_query($conn,$sql)){
			echo "User Created Successfully..";
		}else{
			echo "User Is Already Created..";
		}
	}
	
	if($_POST['action'] == "Update_UserPermission_Data"){
	    $UserName           = $_POST['UserName'];
	    $EmailId            = $_POST['EmailId'];
	    $ContactNo          = $_POST['ContactNo'];
	    $Password           = base64_encode($_POST['Password']);
	    $id                 = $_POST['Userid'];
   	    $sql = 'update testuser set username= "'.$UserName.'" , email = "'.$EmailId.'",phone_no="'.$ContactNo.'",password="'.$Password.'" where id="'.$id.'"';
		if(mysqli_query($conn,$sql)){
			echo "User Updated Successfully..";
		}else{
			echo "Error In Update User Data..";
		}
	}
}

?>