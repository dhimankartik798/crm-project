<?php
session_start();

include '../DBConfig/database.php';
// $username  = $_POST['username'];
// $email     = $_POST['email'];
// $password  = $_POST['password'];
// $confrPswd = $_POST['ConfrmPwd']; 

if(isset($_POST["login"])){
	$email     = $_POST['email'];
	$password  = base64_encode($_POST['password']);
	$sql = 'select * from testuser where  email ="'.$email.'" AND password="'.$password.'"';
	if($data = mysqli_fetch_assoc(mysqli_query($conn,$sql))){
		//echo "Login Details Is Correct";
	   $_SESSION['username']   = $data['username'];
	   $_SESSION['email']      = $data['email'];
	   $_SESSION['user_type']  = $data['user_type'];
	   $_SESSION['phone_no']   = $data['phone_no'];
	   $_SESSION['id']         = $data['id'];
	   header("Location: ../Dashboard.php"); 
	}else{
		echo "Check Username & Password";
	}
}


if(isset($_POST['action'])){

	//Insert Sql Start 
	if($_POST['action'] == "InsertData"){
		$username  = $_POST['username'];
		$email     = $_POST['email'];
		$password  = $_POST['password'];
		$confrPswd = $_POST['ConfrmPwd'];
		//Condition Check Pswd AND ConfrmPswd is Same Or Not
		if($password == $confrPswd ){
			$sql = 'insert into testuser(username,email,password)values("'.$username.'","'.$email.'","'.$password.'")';
			if(mysqli_query($conn,$sql)){
				echo "Data Saved Successfully";
			}else{
				echo $email. " Email Id Is Already Created..";
			}
		}else{
			echo "Please Check  Password & ConfrmPswd ";
		}
		//End Condition Check Pswd AND ConfrmPswd is Same Or Not
	}
	//Insert Sql End 

	//Login Credential Check Here
	if($_POST['action'] == "Login"){
		$email     = $_POST['email'];
		$password  = md5($_POST['password']);
	    $sql = 'select * from testuser where  email ="'.$email.'" AND password="'.$password.'"';
		if($data = mysqli_fetch_assoc(mysqli_query($conn,$sql))){
			//echo "Login Details Is Correct";
		   $_SESSION['username'] = $data['username'];
		   $_SESSION['email']    = $data['email'];
		   $_SESSION['phone_no'] = $data['phone_no'];
		   $_SESSION['id']       = $data['id'];
		   header("Location: ../Dashboard.php"); 
		}else{
			echo "Check Username & Password";
		}
	}
	//Login Credential End Here



	//Update User Info Start 
	if($_POST['action'] == "UserUpdate"){
		$username  = $_POST['username'];
		$email     = $_POST['email'];
		$phone_no  = $_POST['phone_no'];
		$userid    = $_POST['userid'];
	    $sql = 'update testuser set username ="'.$username.'" , email = "'.$email.'" , phone_no="'.$phone_no.'" where id="'.$userid.'"';
		if(mysqli_query($conn,$sql)){
			echo "User Info Updated Successfully";
		}
	}
	//Update User Info End 

}

?>