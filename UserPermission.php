<?php
//Header Section
include 'header/header.php';
if(!empty($_GET['action'])){
      $Action = $_GET['action'];
}else{
    $Action = "View"; 
} 
?>
 <!-- page content -->
 <?php if($Action  == "Create"){ ?>
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form name="CreateUserForm" autocomplete="off" id="CreateUserForm"  method="post" novalidate>                        
                               <input type="hidden" value="View" id="IDView" name="View">
                                <span class="section">Create - User</span>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">User Name<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="UserName" id="UserName" placeholder="" required="required" /><span id="MSG_UserName"></span>
                                    </div>
                                </div>                                                           
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email Id<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="email" name="EmailId" id="EmailId" required='required' /><span id="MSG_EmailId"></span></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Contact No</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="tel" class='tel' name="ContactNo" id="ContactNo" required='required' maxlength="10"  /><span id="MSG_ContactNo"></span></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Create Password</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="Password" id="Password"  required="required" type="password" /><span id="MSG_Password"></span>
                                    </div>
                                </div>

                                </div>                               
                                <!-- <div class="ln_solid"> -->
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-success">Submit</button>
                                            <button type='reset' class="btn btn-success">Reset</button>
                                            <a href="UserPermission.php?action=View"><button type='button' class="btn btn-success" id="IDBtn">View</button></a>
                                        </div>
                                    </div>
                                <!-- </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    }
    if($Action =="View"){
?>
<div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Info</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="dropdown">
                        <!--<a href="SignUp.php" class="btn"  role="button"><i class="fa fa-user"></i>&nbsp;&nbsp;Add User</a>-->
                        <a href="UserPermission.php?action=Create" class="btn"  role="button><i class="fa fa-user"></i>&nbsp;&nbsp;Add User</a>
                        <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="CreateContacts.php?action=Create">Create Contacts</a>
                            <a class="dropdown-item" href="ViewContacts.php?action=View">List Contacts</a>
                        </div> -->
                      </li>               
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="table-responsive">
                    
                    <table id="SrchTable" class="table table-striped jambo_table bulk_action" style="width:100%">
                      <thead>
                        <tr>
                          <th>User Name</th>
                          <th>Email Id</th>
                          <th>Mobile No</th>
                          <th>Password</th>
                          <th>Permission</th>                         
                        </tr>
                      </thead>
                      <tbody id="IdUserDetails">

                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>
          </div>
      </div>
  </div>
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form class=""  method="post" autocomplete="off" name="UpdateUserForm" id="UpdateUserForm" novalidate>
                                <input type="hidden" name="userid" id="userid">
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">User Name<span class="required" style="color:red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="UserName" id="UserName" placeholder="" required="required" /><span id="MSG_CompanyName"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align"> Email id</label>
                                    <div class="col-md-6 col-sm-6">
                                         <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="Emailid" id="Emailid" placeholder="" required="required" />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Mobile<span class="required" style="color:red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="Phone" id="Phone" required="required" type="number" />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Password<span class="required" style="color:red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="Password" id="Password" required="required" type="text" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type='submit' class="btn btn-success">Submit</button>
                                        <button type='reset' class="btn btn-success">Reset</button>
                                      
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
 
<?php
}

//Header Section
include 'footer/footer.php';
?>
<script type="text/javascript">

$(document).on('click','.clsEdit',function(){
   var username = $(this).closest('tr').find('#IDUserName').text();
   var email    = $(this).closest('tr').find('#IDEmail').text();
   var phone    = $(this).closest('tr').find('#IDPhone').text();
   var pswd     = $(this).closest('tr').find('#IDPwsd').text();
   var Userid   = $(this).closest('tr').find('#Userid').text();
   
   $('#UserName').val(username);
   $('#Emailid').val(email);
   $('#Phone').val(phone);
   $('#userid').val(Userid);
   $('#Password').val(pswd);
});

$("#UserName").focus();
$(document).on('keyup','#GSTNumber',function(){
    var text=$(this).val();
    text=text.toUpperCase();
    $(this).val(text);
});
$(document).on('keyup','#Email',function(){
    var text=$(this).val();
    text=text.toLowerCase();
    $(this).val(text);
});

$(document).on('keyup','#UserName',function(){
    let UserName = $('#UserName').val();
    if(UserName != ""){
      $('#MSG_UserName').empty();
    }else{
      $('#MSG_UserName').text("User Name Is Mandatory..").css("color", "red");
    }
});

$(document).on('keyup','#EmailId',function(){
    let EmailId = $('#EmailId').val();
    if(EmailId != ""){
      $('#MSG_EmailId').empty();
    }else{
      $('#MSG_EmailId').text("Email Id Number Is Mandatory..").css("color", "red");
    }
});

$(document).on('keyup','#ContactNo',function(){
    let ContactNo = $('#ContactNo').val();
    if(ContactNo != ""){
      $('#MSG_ContactNo').empty();
    }else{
      $('#MSG_ContactNo').text("Contact No Is Mandatory..").css("color", "red");
    }
});

$(document).on('keyup','#Password',function(){
    let Password = $('#Password').val();
    if(Password != ""){
      $('#MSG_Password').empty();
    }else{
      $('#MSG_Password').text("Password Is Mandatory..").css("color", "red");
    }
});



// Save User Details In Database
$('#CreateUserForm').submit(function (e) {
    e.preventDefault();
    if($('#UserName').val() != "" && $('#EmailId').val() != "" && $('#ContactNo').val() != "" && $('#Password').val()){
      var formData = {
          'UserName'   : $('#UserName').val(),
          'EmailId'    : $('#EmailId').val(),
          'ContactNo'  : $('#ContactNo').val(),
          'Password'   : $('#Password').val(),
          'action'     : "Insert_UserPermission_Data",
      };
      $.ajax({
          type: 'POST',
          url: 'action/actionCreateUser.php',
          data: formData,
          success: function (data) {
            alert(data);
            $('#CreateUserForm')[0].reset();
          }
      });
    }else{
        if($('#UserName').val() == ""){
          $('#MSG_UserName').text("User Name Is Mandatory..").css("color", "red");
        }

        if($('#EmailId').val() == ""){
          $('#MSG_EmailId').text("Email Id Is Mandatory..").css("color", "red");
        }

        if($('#ContactNo').val() == ""){
          $('#MSG_ContactNo').text("Contact No Is Mandatory..").css("color", "red");
        }

        if($('#Password').val() == ""){
          $('#MSG_Password').text("Password Is Mandatory..").css("color", "red");
        }     
    }
});

$('#UpdateUserForm').submit(function (e) {
      e.preventDefault();
      var formData = {
          'UserName'   : $('#UserName').val(),
          'EmailId'    : $('#Emailid').val(),
          'ContactNo'  : $('#Phone').val(),
          'Password'   : $('#Password').val(),
          'Userid'     : $('#userid').val(),
          'action'     : "Update_UserPermission_Data",
      };
      $.ajax({
          type: 'POST',
          url: 'action/actionCreateUser.php',
          data: formData,
          success: function (data) {
            alert(data);
            $(".modal").modal('hide');
            user();
          }
      });
});

user();
function user(){
  $.ajax({
    type: 'POST',
    url: 'action/actionSelectUsers.php',
    data: {action:'Display_User_Data_For_Permission'},
    success: function (data) {
        $('#IdUserDetails').html(data);
    }
  });
}
  
  
  
  
</script>
