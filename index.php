<?php
    session_start();

    include 'DBConfig/database.php';
	//Login Credential Check Here
	//if($_POST['action'] == "Login"){
    if(isset($_POST["login"])){
		$email     = $_POST['email'];
		$password  = md5($_POST['password']);
		echo $sql = 'select * from testuser where  email ="'.$email.'" AND password="'.$password.'"';
		if($data = mysqli_fetch_assoc(mysqli_query($conn,$sql))){
			//echo "Login Details Is Correct";
		   $_SESSION['username'] = $data['username'];
		   $_SESSION['email']    = $data['email'];
		   $_SESSION['phone_no'] = $data['phone_no'];
		   $_SESSION['id']       = $data['id'];
		   header("Location: Dashboard.php"); 
		}else{
			echo "Check Username & Password";
		}
	}
	//Login Credential End Here

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    MarsoneSolution
  </title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
.form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.form-signin input[type="text"]
{
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 20px;
    padding: 40px 0px 20px 0px;
    background-color: #f7f7f7;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.need-help
{
    margin-top: 10px;
}
.new-account
{
    display: block;
    margin-top: 10px;
}
.h1{
  font-weight: bold;
}
/*margin-left: 86px !important;*/
.img-thumbnail {
    max-width: 50% !important;
    border:none !important;
    background-color: #f7f7f7;
}
/*@media (min-width: 768px){*/
/*    .col-sm-6 {*/
/*        margin-left: 170px !important;*/
/*    }*/
/*}*/
/*@media (min-width: 1024px){*/
/*    .col-sm-6 {*/
/*        margin-left: 0px !important;*/
/*    }*/
/*}*/
</style>
</head>
<body>
<div class="container">
    <div class="row clsROW">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <!-- <h1 class="text-center login-title h1">MARSONE SOLUTION CRM</h1> -->
            <!--src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"-->
            <!--profile-img--><center>
            <div class="account-wall">
                <img class="img-thumbnail" src="build/images/MARSONE_LOGO.png"
                    alt="">
                <form class="form-signin" id="LoginForm" action="action/UserLogin.php" method="post">
                <input type="text" class="form-control" name="email" id="email" value="" placeholder="Username" required autofocus><br>
                <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required><br>
                <input type="submit" class="btn btn-lg btn-primary btn-block" value="Login" name="login" id="login">
                <!-- <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span> -->
                </form>
            </div>
            </center>
            <!-- <a href="SignUp.php" class="text-center new-account">Create an account </a> -->
        </div>
    </div>
</div>
</body>
</html>



<script type="text/javascript">
   // var frm = $('#LoginForm');
    // $('#LoginForm').submit(function (e) {
    //     e.preventDefault();
    //     var url = $('#LoginForm').attr('action');
    //     var formData = {
    //         'email'    : $('#email').val(),
    //         'password' : $('#password').val(),
    //         'action'   : "Login",
    //     };
    //     $.ajax({
    //         type: 'POST',
    //         url: url,
    //         data: formData,
    //         success: function (data) {
    //             //alert(data);
    //             window.location = "Dashboard.php";
    //             $('#LoginForm')[0].reset();

    //            // console.log(data);
    //         },
    //         error: function (data) {
    //             console.log('An error occurred.');
    //             console.log(data);
    //         },
    //     });
    // });
</script>