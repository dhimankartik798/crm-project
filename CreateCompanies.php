<?php
//Header Section
include 'header/header.php';
if(!empty($_GET['action'])){
	  $Action = $_GET['action'];
}else{
	$Action = "Create"; 
} 
?>

<?php if($Action  == "Create"){ ?>
	<div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><small>New Company</small></h3>

                </div>

                <!-- <div class="title_right">
                    <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form class=""  method="post" autocomplete="off" name="CreateCompanyForm" id="CreateCompanyForm" action="action/CreateCompany.php" novalidate>
                                <!-- <span class="section">Company Info </span> -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align"> Name<span class="required" style="color:red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="CompanyName" id="CompanyName" placeholder="" required="required" /><span id="MSG_CompanyName"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align"> Address</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea required="required" class="form-control"  name='Address' id="Address"></textarea></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email Id</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="Email" id="Email" class='email' required="required" type="email" /><span id="MSG_Email"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Country</label>
                                    <div class="col-md-6 col-sm-6">
                                      <select name="Country" id="Country" class="form-control">
                                     
                                      <option value="India">India</option> 
                                      </select>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">State<span class="required" style="color:red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <div class="frmSearch">
                                        <!--<input type="text" class="form-control" name="State" id="State" value="" placeholder="Select State" required="required"/><span id="MSG_State"></span>-->
                                         <select name="State" id="State" class="form-control">
                                        
                                        </select> 
                                        <div id="suggesstion-box" style="position: absolute;z-index: 99;display: block;width: 96.5%;"></div>
                                      </div>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">City<span class="required" style="color:red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="City" id="City" value="Ludhiana"  required="required" type="text" /><span id="MSG_City"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">PinCode <span class="required" style="color:red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="PinCode" id="PinCode" class='text' required="required" type="text" maxlength="6" /><span id="MSG_PinCode"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">GST Number</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='optional' name="GSTNumber" id="GSTNumber" data-validate-length-range="5,15" type="text" /><span id="MSG_GSTNumber"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Reffered By <span class="required" style="color:red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='optional' name="RefferedBy" id="RefferedBy" data-validate-length-range="5,15" type="text" /><span id="MSG_RefferedBy"></span></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Group <span class="required" style="color:red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <select name="Group" id="Group" class="form-control">
                                        <option value="">--- Select Group ---</option>
                                        <option value="Buyer">Buyer</option>
                                        <option value="Supplier">Supplier</option>
                                      </select><span id="MSG_Group"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nature of Bussiness<span class="required" style="color:red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                    	<select name="Industry" id="Industry" class="form-control">
                                    	     <option value="">--- Select Bussiness ---</option>
				                             <option value="IT Industry">IT Industry</option>
				                             <option value="Automotive">Automotive</option>
                                             <option value="Hosiery Garments">Hosiery Garments</option>
                                             <option value="Dairy">Dairy</option>
                                             <option value="Departmental Store">Departmental Store</option>
				                             <option value="Consumer Durable and Apparel">Consumer Durable and Apparel</option>
				                             <option value="Hotel,Restaurants,Leisure">Hotel,Restaurants,Leisure</option>
				                             <option value="Other">Other</option>
                                    	</select><span id="MSG_Industry"></span>
                                    </div>
                                </div>                        
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Remarks</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea required="required" class="form-control" name="Description" id="Description"></textarea></div>
                                </div>
                                <!-- <div class="ln_solid"> -->
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-success">Submit</button>
                                            <button type='reset' class="btn btn-success">Reset</button>
                                            <a href="CreateCompanies.php?action=View"><button type='button' class="btn btn-success">View Companies</button></a>
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
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-ed78294c-a32b-406f-a861-eb0211996d26"></div>
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
                    <h2>Companies Report</h2>                    
                    <ul class="nav navbar-right panel_toolbox">
                    <li>
                  <select name="state" id="maxRows" class="form-control" style="width:150px;">
                      <option value="ShowAll"> Show All</option>
                      <option value="5">5</option>
                      <option value="10">10</option>
                      <option value="15">15</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                  </select>
                    </li>&nbsp;&nbsp;
                    <!-- <li>
                    <button type="button" class="btn btn-success NoPrint" id="Print"><i class="fa fa-print"></i> Print</button>
                    </li>&nbsp;&nbsp; -->
                    <li>
                    <input type="text" name="myInput" id="myInput"class="form-control" placeholder="Search Company.." >
                    </li>&nbsp;&nbsp; 
                      <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i><b> &nbsp;Create/View/Edit</b></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="CreateCompanies.php?action=Create">Create Companies</a>
                            <a class="dropdown-item" href="CreateCompanies.php?action=View">List Companies</a>
                        </div>
                      </li> -->
                      <!--<li>-->
                      <!--  <div class="btn-group">-->
                      <!--    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"-->
                      <!--      aria-haspopup="true" aria-expanded="false">-->
                      <!--      View Reports-->
                      <!--    </button>-->
                      <!--    <div class="dropdown-menu">-->
                      <!--      <a class="dropdown-item" href="CreateCompanies.php?action=View">View Companies</a>-->
                      <!--      <a class="dropdown-item" href="ViewContacts.php?action=View">View Contacts</a>-->
                      <!--      <a class="dropdown-item" href="CreateTickets.php?action=View">View Ticket</a>-->
                      <!--      <div class="dropdown-divider"></div>-->
                      <!--      <a class="dropdown-item" href="#">Separated link</a>-->
                      <!--    </div>-->
                      <!--  </div>-->
                      <!--</li>-->
                      <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li> -->
                    </ul>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="table-responsive">
                         
                            <table id="SrchTable" class="table table-striped jambo_table bulk_action mytable css-serial">
                              <thead>
                                <tr>
                                  <th style="width:3%;">S.no</th>
                                  <th style="width:18%;">Company</th>
                                  <th style="width:20%;">Address</th>
                                  <th style="Display:none;">Country</th>
                                  <th style="width:7%;">State</th>
                                  <th style="width:7%;">City</th> 
                                  <th style="Display:none;">PinCode</th>                       
                                  <th style="Display:none;">GST No.</th>
                                  <th style="width:7%;">Ref</th>
                                  <th style="Display:none;">Industry</th>
                                  <th style="width:18%;">Email Id</th>
                                  <th style="Display:none;">Description</th>
                                  <th style="width:4%;">Action</th>
                                </tr>
                              </thead>
                              <tbody id="idTableBody">
                              
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
          <h4 class="modal-title">Alter Company </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
                      <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form class=""  method="post" autocomplete="off" name="UpdateCompanyForm" id="UpdateCompanyForm" action="action/CreateCompany.php" novalidate>
                              <input type="hidden" name="CompanyInsertId" id="CompanyInsertId" value="">
                                <!-- <span class="section">Company Info </span> -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align"> Name<span class="required" style="color:red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="CompanyName" id="CompanyName" placeholder="" required="required" /><span id="MSG_CompanyName"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align"> Address</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea required="required" class="form-control"  name='Address' id="Address"></textarea></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email Id</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="Email" id="Email" class='email' required="required" type="email" /><span id="MSG_Email"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Country</label>
                                    <div class="col-md-6 col-sm-6">
                                      <select name="Country" id="Country" class="form-control">
                                     
                                      <option value="India">India</option> 
                                      </select>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">State<span class="required" style="color:red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        
                                      <!--<input class="form-control" name="StateEdit" id="StateEdit" value=""  required="required" type="text" />-->
                                        
                                        <select name="StateEdit" id="StateEdit" class="form-control" style="width:100%;"></select>
                                        
                                      <!--<div id="suggesstion-boxs" style="position: absolute;z-index: 99;display: block;width: 91%;"></div>-->
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">City<span class="required" style="color:red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="City" id="City" value="Ludhiana"  required="required" type="text" /><span id="MSG_City"></span></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" >PinCode <span class="required" style="color:red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="PinCode" id="PinCode" class='text' required="required" type="text" maxlength="6" /><span id="MSG_PinCode"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">GST Number</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='optional' name="GSTNumber" id="GSTNumber" data-validate-length-range="5,15" type="text" />
                                        <!--<span id="MSG_GSTNumber"></span>-->
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Reffered By<span class="required" style="color:red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='optional' name="RefferedBy" id="RefferedBy" data-validate-length-range="5,15" type="text" /><span id="MSG_RefferedBy"></span></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Group<span class="required" style="color:red;">*</span> </label>
                                    <div class="col-md-6 col-sm-6">
                                      <select name="Group" id="Group" class="form-control">
                                        <option value="--- Select Group ---">--- Select Group ---</option>
                                        <option value="Buyer">Buyer</option>
                                        <option value="Supplier">Supplier</option>
                                      </select><span id="MSG_Group"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nature of Bussiness<span class="required" style="color:red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <select name="Industry" id="Industry" class="form-control">
                                      <option value="--- Select Industry ---">--- Select Bussiness ---</option>
                                     <option value="IT Industry">IT Industry</option>
                                     <option value="Automotive">Automotive</option>
                                     <option value="Hosiery Garments">Hosiery Garments</option>
                                     <option value="Diary">Diary</option>
                                     <option value="Departmental Store">Departmental Store</option>
                                     <option value="Consumer Durable and Apparel">Consumer Durable and Apparel</option>
                                     <option value="Hotel,Restaurants,Leisure">Hotel,Restaurants,Leisure</option>
                                     <option value="Other">Other</option>
                                      </select><span id="MSG_Industry"></span>
                                    </div>
                                </div>                        
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Remarks</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea required="required" class="form-control" name="Description" id="Description"></textarea></div>
                                </div>
                                <!-- <div class="ln_solid"> -->
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-success">Submit</button>
                                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                          
                                        </div>
                                    </div>
                                <!-- </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="modal-footer">-->
        <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
        <!--</div>-->
      </div>
      
    </div>
  </div>
<?php
	}
?>
<!-- /page content -->
<?php
//Header Section
include 'footer/footer.php';
?>
<script type="text/javascript">
 let html =``;
 let htmls =``;
 let htmlss =``;
 let SNo = 1;
// Move Cursor to First Input Field
$("#CompanyName").focus();
$(document).on('keyup','#GSTNumber',function(){
    var text=$(this).val();
    text=text.toUpperCase();
    $(this).val(text);
});
// $(document).on('keyup','#Email',function(){
//     var text=$(this).val();
//     text=text.toLowerCase();
//     $(this).val(text);
// });

$(document).on('keyup','#CompanyName',function(){
    let CompanyName = $('#CompanyName').val();
    if(CompanyName != ""){
      $('#MSG_CompanyName').empty();
    }else{
      $('#MSG_CompanyName').text("CompanyName Is Mandatory..").css("color", "red");
    }
});

// $(document).on('keyup','#Email',function(){
//     let Email = $('#Email').val();
//     if(Email != ""){
//       $('#MSG_Email').empty();
//     }else{
//       $('#MSG_Email').text("Email Number Is Mandatory..").css("color", "red");
//     }
// });

$(document).on('keyup','#PinCode',function(){
    let PinCode = $('#PinCode').val();
    if(PinCode != ""){
      $('#MSG_PinCode').empty();
    }else{
      $('#MSG_PinCode').text("PinCode Is Mandatory..").css("color", "red");
    }
});

$(document).on('keyup','#State',function(){
    let State = $('#State').val();
    if(State != ""){
      $('#MSG_State').empty();
    }else{
      $('#MSG_State').text("State Is Mandatory..").css("color", "red");
    }
});

$(document).on('keyup','#City',function(){
    let City = $('#City').val();
    if(City != ""){
      $('#MSG_City').empty();
    }else{
      $('#MSG_City').text("State Is Mandatory..").css("color", "red");
    }
});

$(document).on('keyup','#City',function(){
    let City = $('#City').val();
    if(City != ""){
      $('#MSG_City').empty();
    }else{
      $('#MSG_City').text("State Is Mandatory..").css("color", "red");
    }
});

$(document).on('change','#Group',function(){
    let Group = $('#Group').val();
    if(Group != ""){
      $('#MSG_Group').empty();
    }else{
      $('#MSG_Group').text("Group Is Mandatory..").css("color", "red");
    }
});

$(document).on('change','#Industry',function(){
    let Industry = $('#Industry').val();
    if(Industry != ""){
      $('#MSG_Industry').empty();
    }else{
      $('#MSG_Industry').text("Industry Is Mandatory..").css("color", "red");
    }
});

// $(document).on('keyup','#GSTNumber',function(){
//     let GSTNumber = $('#GSTNumber').val();
//     if(GSTNumber != ""){
//       $('#MSG_GSTNumber').empty();
//     }else{
//       $('#MSG_GSTNumber').text("GSTNumber Number Is Mandatory..").css("color", "red");
//     }
// });

$(document).on('keyup','#RefferedBy',function(){
    let RefferedBy = $('#RefferedBy').val();
    if(RefferedBy != ""){
      $('#MSG_RefferedBy').empty();
    }else{
      $('#MSG_RefferedBy').text("RefferedBy Is Mandatory..").css("color", "red");
    }
});



// Save Contact Details In Database
$('#CreateCompanyForm').submit(function (e) {
    e.preventDefault();
    var url = $('#CreateCompanyForm').attr('action');
    if($('#CompanyName').val() != "" && $('#State').val() != "" && $('#PinCode').val() != "" && $('#State').val() !="" && $('#City').val() != "" && $('#RefferedBy').val() != "" && $('#Group').val() != "" && $('#Industry').val() != ""){
      var formData = {
          'CompanyName' : $('#CompanyName').val(),
          'Address'     : $('#Address').val(),
          'Country'     : $('#Country').val(),
          'State'       : $('#State').val(),
          'City'        : $('#City').val(),
          'PinCode'     : $('#PinCode').val(),
          'GSTNumber'   : $('#GSTNumber').val(),
          'RefferedBy'  : $('#RefferedBy').val(),
          'Group'       : $('#Group').val(),
          'Industry'    : $('#Industry').val(),
          'Email'       : $('#Email').val(),
          'Description' : $('#Description').val(),
          'action'      : "Insert_Company_Data",
      };
      $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            //$('#MsgAlert').html(data);
            // window.location = "Dashboard.php";
            $('#CreateCompanyForm')[0].reset();
             $(".modal").modal('hide');
          }
      });
    }else{
        if($('#CompanyName').val() == ""){
          $('#MSG_CompanyName').text("Company Name Is Mandatory..").css("color", "red");
        }

        // if($('#Email').val() == ""){
        //   $('#MSG_Email').text("Email Is Mandatory..").css("color", "red");
        // }

        if($('#PinCode').val() == ""){
          $('#MSG_PinCode').text("PinCode Is Mandatory..").css("color", "red");
        }

        // if($('#GSTNumber').val() == ""){
        //   $('#MSG_GSTNumber').text("GST Number Is Mandatory..").css("color", "red");
        // }  
        
        if($('#State').val() == ""){
            $('#MSG_State').text("State Is Mandatory..").css("color", "red");
        }
        if($('#City').val() == ""){
            $('#MSG_City').text("City Name Is Mandatory..").css("color", "red");
        } 
        if($('#RefferedBy').val() == ""){
            $('#MSG_RefferedBy').text("RefferedBy Is Mandatory..").css("color", "red");
        }
        
        if($('#Group').val() == ""){
            $('#MSG_Group').text("Group Is Mandatory..").css("color", "red");
        }
        
        if($('#Industry').val() == ""){
            $('#MSG_Industry').text("Industry Is Mandatory..").css("color", "red");
        }
        
    }
});

// Update Company Details In Database
$('#UpdateCompanyForm').submit(function (e) {
    e.preventDefault();
    //var url = $('#UpdateCompanyForm').attr('action');
    // if($('#CompanyName').val() != "" && $('#Email').val() != "" && $('#PinCode').val() != "" && $('#GSTNumber').val()){
    if($('#CompanyName').val() != "" && $('#State').val() != "" && $('#PinCode').val() != "" && $('#State').val() !="" && $('#City').val() != "" && $('#RefferedBy').val() != "" && $('#Group').val() != "" && $('#Industry').val() != ""){
        var AlterFormData = {
            'Company_Id'  : $('#CompanyInsertId').val(),
            'CompanyName' : $('#CompanyName').val(),
            'Address'     : $('#Address').val(),
            'Country'     : $('#Country').val(),
            'State'       : $('#StateEdit').val(),
            'City'        : $('#City').val(),
            'PinCode'     : $('#PinCode').val(),
            'GSTNumber'   : $('#GSTNumber').val(),
            'RefferedBy'  : $('#RefferedBy').val(),
            'Group'       : $('#Group').val(),
            'Industry'    : $('#Industry').val(),
            'Email'       : $('#Email').val(),
            'Description' : $('#Description').val(),
            'action'      : 'Update_Company_Data',
        };
        $.ajax({
          url: 'action/CreateCompany.php',
          type: 'POST',
          data: AlterFormData,
          // cache: true,
          success: function(data){
              alert(data);
              $('#UpdateCompanyForm')[0].reset();
              // $("#myModal").dialog("close");
               $(".modal").modal('hide');
              load_data();    
              //window.location.reload();
          }
        });

    }else{
        if($('#CompanyName').val() == ""){
          $('#MSG_CompanyName').text("Company Name Is Mandatory..").css("color", "red");
        }

        // if($('#Email').val() == ""){
        //   $('#MSG_Email').text("Email Is Mandatory..").css("color", "red");
        // }

        if($('#PinCode').val() == ""){
          $('#MSG_PinCode').text("PinCode Is Mandatory..").css("color", "red");
        }

        // if($('#GSTNumber').val() == ""){
        //   $('#MSG_GSTNumber').text("GST Number Is Mandatory..").css("color", "red");
        // }  
        
        if($('#State').val() == ""){
            $('#MSG_State').text("State Is Mandatory..").css("color", "red");
        }
        if($('#City').val() == ""){
            $('#MSG_City').text("City Name Is Mandatory..").css("color", "red");
        } 
        if($('#RefferedBy').val() == ""){
            $('#MSG_RefferedBy').text("RefferedBy Is Mandatory..").css("color", "red");
        }
        
        if($('#Group').val() == ""){
            $('#MSG_Group').text("Group Is Mandatory..").css("color", "red");
        }
        
        if($('#Industry').val() == ""){
            $('#MSG_Industry').text("Industry Is Mandatory..").css("color", "red");
        }
    }
});
// Edit Companies Data End



// Display Data In Table
load_data();
    
function load_data()
{
$.ajax({
    type: 'POST',
    url: 'action/SelectCompany.php',
    data: {action:'Display_Company_Data'},
    success: function (data) {

      $('#idTableBody').html(data);
//       if($('#maxRows').val() == "ShowAll"){
//       var trnum = 0;
//       var maxRows = 5;
//       var TotalRows = $(table+' tbody tr').length;

//     $(table+' tr:gt(0)').each(function(){
//         trnum++
//         if(trnum > maxRows){
//             $(this).hide();
//         }
//         if(trnum <= maxRows){
//             $(this).show();
//         }
//     });
// }
    }
});
}

   // Display State Name
    $.ajax({
        type: 'POST',
        url: 'action/SelectCompany.php',
        data: {action:'Display_State_Data'},
        success: function (data) {
          let StateData = JSON.parse(data);
        htmls+=`<option value="Select State">Select State </option>`;
        $.each(StateData, function(i,val) {
            htmls+=`<option value="`+val.state_name +`">`+val.state_name +` </option>`;
        });
        $('#State').html(htmls);
        }
    });
        // Initialize select2
        $("#State").select2();
    
// $("#State").keyup(function(){
//   var formData = {
//         'State'  : $(this).val(),
//         'action' : "Display_State_Data"
//     };
//   $.ajax({
//       type: "POST",
//       url: "action/SelectCompany.php",
//       data:formData,
//       beforeSend: function(){
//         $("#State").css("background","#FFFFF url(LoaderIcon.gif) no-repeat 165px");
//       },
//       success: function(data){
//         $("#suggesstion-box").show();
//         $("#suggesstion-box").html(data);
//         $("#State").css("background","#FFF");
//       }
//   });
// });

//   var FormStateData = {
//         'action' : "Display_State_Data"
//     };
//   $.ajax({
//       type: "POST",
//       url: "action/SelectCompany.php",
//       data:FormStateData,
//       success: function(data){
//         let StateData = JSON.parse(data);
//         $.each(StateData, function(i,val) {
//             htmlss+=`<option value="`+val.state_name +`">`+val.state_name +` </option>`;
//         });
//         $('#StateEdit').html(htmlss);
//       }
//   });
  
//   $('#StateEdit').select2();




// Delete Companies Data
$(document).on('click','.delete',function () {
    var confirmalert = confirm("Do you really want to Delete?");
   if (confirmalert == true) {
      let Company_Id = $(this).attr('data-formindex');
      var url = 'action/DeleteCompany.php';
      var formData = {
          'Company_Id'    : Company_Id,
          'Delete_action' : "Delete_Company_Data",
      };
      $.ajax({
        url: 'action/DeleteCompany.php',
        type: 'POST',
        data: formData,
        success: function(response){
            alert(response);
            load_data();
           // window.location = "CreateCompanies.php?action=View";
        }
      });
   }
});
// Delete Companies Data End

// Edit Companies Data
$(document).on('click','.edit',function () {
      let Company_Id  = $(this).attr('data-formindex');
      let CompanyName = $(this).closest('tr').find('#IDCompanyName').text();
      let Address     = $(this).closest('tr').find('#IDAddress').html();
      let Country     = $(this).closest('tr').find('#IDCountry').html();
      let State       = $(this).closest('tr').find('#IDState').html();
      let City        = $(this).closest('tr').find('#IDCity').html();
      let PinCode     = $(this).closest('tr').find('#IDPinCode').html();
      let GSTNumber   = $(this).closest('tr').find('#IDGSTNumber').html();
      let RefferedBy  = $(this).closest('tr').find('#IDRefferedBy').html();
      let Group       = $(this).closest('tr').find('#IDGroup').html();
      let Industry    = $(this).closest('tr').find('#IDIndustry').html();
      let Email       = $(this).closest('tr').find('#IDEmail').html();
      let Description = $(this).closest('tr').find('#IDDescription').html();
    
      $(document).find('#CompanyName').val(CompanyName);
      $(document).find('#Address').val(Address);
      $(document).find('#Country').val(Country);
      //$(document).find('#StateEdit').val(State);
      $(document).find('#City').val(City);
      $(document).find('#PinCode').val(PinCode);
      $(document).find('#GSTNumber').val(GSTNumber);
      $(document).find('#RefferedBy').val(RefferedBy);
      $(document).find('#RefferedBy').val(RefferedBy);
      $(document).find('#Group').val(Group);
      $(document).find('#Industry').val(Industry);
      $(document).find('#Email').val(Email);
      $(document).find('#Description').val(Description);
      $(document).find('#CompanyInsertId').val(Company_Id);
      
      var FormStateData = {
        'action' : "Display_State_Data"
      };
      $.ajax({
          type: "POST",
          url: "action/SelectCompany.php",
          data:FormStateData,
          success: function(data){
            let StateData = JSON.parse(data);
            $.each(StateData, function(i,val) {
                if(State == val.state_name){
                    htmlss+=`<option value="`+val.state_name +`" Selected>`+val.state_name +` </option>`;
                }else{
                    htmlss+=`<option value="`+val.state_name +`">`+val.state_name +` </option>`;
                }
            });
            $('#StateEdit').html(htmlss);
          }
      });
  
      $('#StateEdit').select2();
});

// Search Companies Products On Company ID  
$(document).on('click','.Compnys',function () {
      let Company_Id = $(this).closest('tr').find('#IDCompanyID').html();
      let Company_Name = $(this).closest('tr').find('.Compnys').text();
      //$(this).closest('tr').attr('data-formindex');
      localStorage.setItem("CompanyInsertid", Company_Id);
      localStorage.setItem("CompanyName", Company_Name);
      //alert(Company_Id);
      
      // var url = 'action/DeleteCompany.php';
      // var formData = {
      //     'Company_Id'    : Company_Id,
      //     'Delete_action' : "Delete_Company_Data",
      // };
      // $.ajax({
      //   url: 'action/DeleteCompany.php',
      //   type: 'POST',
      //   data: formData,
      //   success: function(response){
      //       alert(response);
      //       window.location = "CreateCompanies.php?action=View";
      //   }
      // });
});
// Companies Data End
function selectCountry(val) {
  $("#State").val(val);
  $("#StateEdit").val(val);
  $("#suggesstion-box").hide();
  $("#suggesstion-boxs").hide();
}
// if($('#State').blur()){
//   $("#suggesstion-box").hide();
// }

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#SrchTable tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

//Print the document
$('#Print').click(function(event){
    event.preventDefault();
    window.print();
});

var table = '.mytable';
$('#maxRows').on('change',function(){
    $('.pagination').html('');
    var trnum = 0;
    var maxRows = parseInt($(this).val());
    var TotalRows = $(table+' tbody tr').length;

    $(table+' tr:gt(0)').each(function(){
        trnum++
        if(trnum > maxRows){
            $(this).hide();
        }
        if(trnum <= maxRows){
            $(this).show();
        }
    });

    // if(TotalRows > maxRows){
    //     var pagenum = Math.ceil(TotalRows/maxRows);
    //     for(var i=1; i<=pagenum;){
    //         $('.pagination').append('<li data-page="'+i+'">/</span>'+ i++ +'<span class="sr-only">(current)</span></span>/</li>').show();
    //     }
    // }
    // $('.pagination li:first-child').addClass('active');
    // $('.pagination li').on('click',function(){
    //     var pageNum  = $(this).attr('data-page');
    //     var trindex  = 0;
    //     $('.pagination li').removeClass('active');
    //     $(this).addClass('active');
    //     $(table+'tr:gt(0)').each(function(){    
    //         trindex++
    //         if(trindex > (maxRows*pageNum) || trindex <= ((maxRows*pageNum)-maxRows)){
    //             $(this).hide();
    //         }else{
    //             $(this).show();
    //         }
    //     }); 
    // });
});

// if($('#maxRows').val() == "ShowAll"){
//       var trnum = 0;
//       var maxRows = 5;
//       var TotalRows = $(table+' tbody tr').length;

//     $(table+' tr:gt(0)').each(function(){
//         trnum++
//         if(trnum > maxRows){
//             $(this).hide();
//         }
//         if(trnum <= maxRows){
//             $(this).show();
//         }
//     });
// }

// $(function(){
//     var tables = '#mytable';
//     $('table tr:eq(0)').prepend('<th>ID</th>');
//     var id = 0;
//     $('table tr:gt(0)').each(function(){
//         id++
//         $(this).prepend('<td>'+id+'</td>');
//     });
// });

  localStorage.removeItem("SerialNo");
  localStorage.removeItem("Product");
  localStorage.removeItem("Emailid");
  localStorage.removeItem("Remark");
  localStorage.removeItem("ENQRYProduct");
   localStorage.getItem("EnquiryNo");

</script>