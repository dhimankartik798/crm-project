<?php
include 'header/header.php';
// GET Action
if(!empty($_GET['action'])){
	  $Action = $_GET['action'];
}else{
	$Action = "Create"; 
}
?>
<?php if($Action  == "Create"){ ?>
 <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
	                    <div class="x_title">
		                    <h2>Create - Customer Enquiry</h2>
		                    <ul class="nav navbar-right panel_toolbox"></ul>
		                    <div class="clearfix"></div>
		                  </div>

                        <div class="x_content">
                            <!--action="action/actionCreateEnquiry.php"-->
                            <form method="post" autocomplete="off" name="CreateEnquiryForm" id="CreateEnquiryForm">     
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Companies</label>
                                    <div class="col-md-6 col-sm-6">
                                      <input class="form-control" type="text" name="Companies" id="Companies">
                                     
                                    </div>
                                </div> 
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Contact Name<span style="color:red;" class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                       <input class="form-control" type="text" name="Contact" id="Contact">
                                       <span id="Msg_Contact"></span>
                                    </div>
                                </div> 
                                 <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Mobile No<span style="color:red;" class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                       <input class="form-control" type="number" name="MobNo" id="MobNo">
                                       <span id="Msg_MobNo"></span>
                                    </div>
                                </div> 
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email Id</label>
                                    <div class="col-md-6 col-sm-6">
                                       <input class="form-control" type="email" name="EmailId" id="EmailId">
                                      
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Address</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="Address" id="Address" autocomplete="off"></textarea>
                                    </div>
                                </div>
                                 <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Product <span style="color:red;" class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <!--<select id="Products" name="Products[]" class="form-control">-->
                                      <!--</select>-->
                                      <!-- Dropdown --> 
                                        <select  id="Products" class="form-control">
                                        </select>
                                        <div id='result'></div>
                                         <span id="Msg_Products"></span>
                                    </div>
                                </div> 
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Remarks <span style="color:red;" class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="Remarks" id="Remarks" placeholder="Enquiry Details"></textarea>
                                        <span id="Msg_Remarks"></span>
                                    </div>
                                </div> 
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Registerd By <span style="color:red;" class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        
                                    <input type="hidden" name="user_type" id="user_type" value="<?php echo$_SESSION['user_type'];?>">
                                      <?php
                                      if($_SESSION['user_type'] == "user"){
                                      ?>
                                          <input class="form-control" id="RegisterBy" value="<?php echo $_SESSION['username']; ?>" name="RegisterBy" disabled placeholder="Name of person who will handle this complaint"  />
                                          <input type="hidden" value="<?php echo$_SESSION['id'];?>" name="Userid" id="Userid">
                                      <?php 
                                       }
                                       if($_SESSION['user_type'] == "admin"){
                                      ?>
                                          <select name="RegisterBy" id="RegisterBy" class="form-control">  
                                           			                            
                                          </select>
                                      <?php
                                       }
                                      ?>
                                      <span id="Msg_RegisterBy"></span>
                                    </div>
                                </div> 
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Date</label>
                                    <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='date' type="date" name="date" id="date" tabindex="-1"></div>
                                </div> 
                                <input type="hidden" name="Status" id="Status" value="Open">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-success">Submit</button>
                                            <button type='reset' class="btn btn-success">Reset</button>  
                                            <button type="button" class="btn btn-success"><a href="CreateEnquiry.php?action=View" style="color:white;">View Enquiry</a></button>
                                        </div>
                                    </div>
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
                    <h2>Customer Enquiry - Report</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                              <select class="form-control" id="IdEnquiryStatusChange">
                                <option>Enquiry Status</option>
                                <option value="All">All Enquiry</option>
                                <option value="Open">Open Enquiry</option>
                                <option value="Won">Won Enquiry</option>
                                <option value="Drop">Drop Enquiry</option>
                              </select>
                          </li>&nbsp;&nbsp;
                      <li>
                        <input type="text" name="myInput" id="myInput"class="form-control" placeholder="Search..." >
                      </li>&nbsp;&nbsp;  
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="SrchTable" class="table table-striped jambo_table bulk_action" >
                                    <thead>
                                        <tr> 
                                        <th style="width:13%;">Enquiry ID</th>
                                        <th>Created On</th>
                                        <th style="width:4%;">Days</th>
                                        <th style="width:10%;">Customer</th>
                                         <th style="width:10%;">Mob No</th>
                                        <th style="width:15%;">Company</th>
                                        <th style="width:15%;">Product</th>
                                        <th>RegisterBy</th>
                                        <th style="width:5%;">Status</th>
                                        <th style="width:20%;">Remarks</th>
                                        <th style="width:4%;">Action</th>                         
                                        </tr>
                                    </thead>
                                    <tbody id="IDLeadDetailss">

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
  
  <!-- idCompaniesProductsDetails -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close clsAlter_Product" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          
        <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
	                    <div class="x_title">
		                    <h2>Alter CompanyProduct</h2>
		                    <ul class="nav navbar-right panel_toolbox">
		                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i></a>
		                    </ul>
		                    <div class="clearfix"></div>
		                  </div>

                        <div class="x_content">
                            <form class=""  method="post" autocomplete="off" name="UpdateCompanyProductForm" id="UpdateCompanyProductForm" action="action/CreateCompanyProduct.php" novalidate>
                                <input type="hidden" name="Prodct_Compny_Id" id="Prodct_Compny_Id" >
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Unique Id<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="SerialNo" id="SerialNo" placeholder="" required="required" /><span id="MSG_SerialNo"></span>
                                    </div>
                                </div>                           
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Companies<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <select id="framework" name="framework[]"  class="form-control clsframework">
                                      
                                      </select><span id="MSG_framework"></span>
                                    </div>
                                </div> 
                                 <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Products<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <select id="ProductsDetails" name="ProductsDetails[]" class="form-control clsProductsDetails">
                                      
                                      </select><span id="MSG_ProductsDetails"></span>
                                    </div>
                                </div>                       
                                 
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email Id</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="Email" id="Email" placeholder="" required="required"  />
                                    </div>
                                </div> 
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Remarks</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea required="required" class="form-control" name="Description" id="Description"></textarea>
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


  <!-- Create Enquiry Transfer's Div Start Here -->
  <div class="modal fade" id="EnquiryTransferModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
        <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
	                    <div class="x_title">
		                    <h2>Create - Enquiry Transfer</h2>
		                    <ul class="nav navbar-right panel_toolbox">
		                    </ul>
		                    <div class="clearfix"></div>
		                  </div>
                        <div class="x_content">
                          <form  name="Enquiry_Transfer_Form" id="Enquiry_Transfer_Form" action="action/EnquiryTransferForm.php" autocomplete="off" method="post" novalidate>                        
                               <input type="hidden" name="EnquiryId" id="EnquiryId" value="">
                               <input type="hidden" name="Userid" id="Userid" value="<?php echo $_SESSION['id'];?>">        
                               <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Enquiry Id<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control"  id="EnquiryNo" name="EnquiryNo" placeholder="" required="required" disabled /><span id="MSG_EnquiryNo"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Transfer To<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="TransferTo" id="TransferTo" class="form-control">  
                                            <option value="">--Select User--</option>    		  
                                            <option value="16">Rahul Singh</option>
                                            <option value="17">Anu</option>
                                            <option value="19">Shivam Chhabra</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Date</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='date' id="date" type="date" name="date" required='required'>
                                    </div>
                                </div>
                                <!-- <div class="ln_solid"> -->
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-success">Submit</button>
                                            <button type='reset' class="btn btn-success">Reset</button>                                          
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
    </div>
  </div>
  <!-- Create Enquiry Transfer's Div Start Here -->



  <!-- Enquiry Status Update Model Div Start Here -->
<div class="modal fade" id="EnquiryUpdateStatusModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
        <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
	                    <div class="x_title">
		                    <h2>Enquiry Status </h2>
		                    <ul class="nav navbar-right panel_toolbox">
		                    </ul>
		                    <div class="clearfix"></div>
		                  </div>
                        <div class="x_content">
                          <form  name="Update_Enquiry_Status_Form" id="Update_Enquiry_Status_Form" action="action/actionCreateEnquiry.php" autocomplete="off" method="post" novalidate>                        
                               <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Date</label>       
                                    <input class="form-control" class='date' id="StatusDate" type="date" name="date" required='required' readonly>
                                </div>
                        
                               <input id="EnquiryCreatedById" type="hidden" name="EnquiryCreatedById" >
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Enquiry No</label>       
                                    <input class="form-control" id="EnquiryStatusNo" type="text" name="EnquiryStatusNo" required='required' readonly>
                                </div> 
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Status</label>
                                    <select name="Status" id="EnquiryUpdateStatus" class="form-control">  
                                        <option value="">--Please Select--</option> 
                                        <option value="Open">Open</option>
                                        <option value="Won">Won</option>	   
                                        <option value="Drop">Drop</option>	                        
                                    </select><span id="MSG_Status"></span>
                                </div>  
                                
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Notes</label>       
                                    <textarea class="form-control" id="EnquiryStatusNotes" name="EnquiryStatusNotes" cols="10" rows="5">
                                        
                                    </textarea>
                                </div>
                                
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Created By</label>
                                    <input class="form-control" id="EnquiryCreatedBy" type="text" name="EnquiryCreatedBy" required='required' readonly>
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
      </div>
    </div>
  </div>
  <!-- Enquiry Status Update Model Div End Here -->

  <!-- add Task Model Div Start Here -->
<div class="modal fade" id="EnquiryAddNoteModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">

        <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
	                    <div class="x_title">
		                    <h2>Create - Add Notes</h2>
		                    <ul class="nav navbar-right panel_toolbox">
		                    </ul>
		                    <div class="clearfix"></div>
		                  </div>
                        <div class="x_content">
                          <form  name="AddNoteForm" id="AddNoteForm" action="action/actionCreateEnquiry.php" autocomplete="off" method="post" novalidate> 
                                    <input type="hidden" name="userid" id="userid" value="">
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Enquiry ID<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control"  id="EnquiryNos" name="EnquiryNos" placeholder="" required="required" readonly /><span id="MSG_EnquiryNos"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Remarks<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea required="required" id="add_notes"  class="form-control" rows="5" cols="15" name='add_notes'></textarea><span id="MSG_add_notes"></span></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Created By</label>  
                                    <div class="col-md-6 col-sm-6">    
                                      <input class="form-control" id="CreatedByForNote" type="text" name="CreatedByForNote" required='required' readonly>
                                    </div>
                                </div> 
                                <!-- <div class="ln_solid"> -->
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-success">Submit</button>
                                            <button type='reset' class="btn btn-success">Reset</button>                                          
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
  <!--  add Task Model Div End Here -->



<?php

	}
?>
<?php
include 'footer/footer.php';
?>
<script type="text/javascript">
  let html = '';
  let htmll ='';
  let htmls = '';
  let htmlss = '';
  let htmlData = '';
  // let htmlContactData ='';
  let SNo = 1;
  let GET_Company_ID = "";
  let LeadStatus = '';
    $('#Companies').focus().select();
    SetData();
    function SetData(){
      let Todays=new Date();
      let FormatedDates=Todays.getFullYear()+'-'+('0'+(Todays.getMonth()+1)).slice(-2)+'-'+('0'+Todays.getDate()).slice(-2);
    //   $('#date').val(FormatedDates).focus().select();
     $('#date').val(FormatedDates);
     $('#StatusDate').val(FormatedDates);
    }
    // Move Cursor to First Input Field
    $("#SerialNo").focus();
    $(document).closest('form').find('#InvoiceNo').focus();
    
    $(document).on('keyup','#Email',function(){
        var text=$(this).val();
        text=text.toLowerCase();
        $(this).val(text);
    });
    
    $('#SearchCreteria').change(function(event){
        let Value=$(this).children("option:selected").text();
        $('#CompanyName').prop('placeholder',Value);
    });
    
    $(document).on('keyup','#SerialNo',function(){
        let SerialNo = $('#SerialNo').val();
        if(SerialNo != ""){
          $('#MSG_SerialNo').empty();
        }else{
          $('#MSG_SerialNo').text("Serial No Is Mandatory..").css("color", "red");
        }
    });
    
    $.ajax({
      type: 'POST',
      url: 'action/SelectCompany.php',
      data: {action:'Display_Company_Data_For_Contact'},
      success: function (data) {
        let CompanyData = JSON.parse(data);
        html+=`<option value>Select Companies </option>`;
        $.each(CompanyData, function(i,val) {
            html+=`<option value="`+val.CompanyInsertId +`">`+val.CompanyName +` </option>`;
        });
        $('#framework').html(html);
      }
    });
    
    
    // DISPLAY ALL USER DATA FROM TESTUSER
    $.ajax({
      type: 'POST',
      url: 'action/actionSelectUsers.php',
      data: {action:'All_User_Data_For_Enquiry'},
      success: function (data) {
        $('#RegisterBy').html(data);
      }
    });
    
    // END HERE



    $('#framework').change(function(){
      let ContactsData = {
            'CompanyID' :  $('#framework').val(),
            'action'    : 'Display_Contact_data_In_Lead'
      }
      $.ajax({
        type: 'POST',
        url: 'action/SelectContact.php',
        data: ContactsData,
        success: function (data) {
          let ContactData = JSON.parse(data);
          let htmlContactData ='';
          htmlContactData+=`<option value>Select Contact </option>`;
          $.each(ContactData, function(i,val) {
              htmlContactData+=`<option value="`+val.ContactInsertId +`">`+val.ContactName +` </option>`;
          });
          $('#ContactInsertId').html(htmlContactData);
        }
      });
    
    });

    ProductData();
    function ProductData(){
        $.ajax({
          type: 'POST',
          url: 'action/CreateProduct.php',
          data: {action:'Display_Product_Data'},
          success: function (data) {
            let ProductData = JSON.parse(data);
            htmls+=`<option value="">Select Products </option>`;
            $.each(ProductData, function(i,val) {
                htmls+=`<option value="`+val.Product_Insert_Id +`">`+val.Product_Name +` </option>`;
            });
            $('#Products').html(htmls);
           // $('#autocomplete-custom-append').html(htmls);
          }
        });
    }

    DisplayLeadData();

    // Display Data In Table
    function DisplayLeadData(){
        $.ajax({
            type: 'POST',
            url: 'action/SelectLead.php',
            data: {action:'Display_Lead_Data'},
            success: function (data) {
                    $('#IDLeadDetails').html(data);
              }
        });
    }

     
    //Create Company Product
    $('#CreateEnquiryForm').submit(function (e) {
        e.preventDefault();
        if($('#Contact').val() != "" && $('#MobNo').val() != "" && $('#Products').val() && $('#Remarks').val() != "" && $('#RegisterBy').val() != ""){
        var url = "action/actionCreateEnquiry.php";
        var formData = {        
            'Companies'       : $('#Companies').val(),
            'Contact'         : $('#Contact').val(),
            'MobNo'           : $('#MobNo').val(),
            'EmailId'         : $('#EmailId').val(),
            'Address'         : $('#Address').val(),
            'Products'        : $('#Products').val(),
            'Remarks'         : $('#Remarks').val(),
            'user_type'       : $('#user_type').val(),
            'RegisterBy'      : $('#RegisterBy').val(),
            'Userid'          : $('#Userid').val(),
            'Description'     : $('#Description').val(),
            'date'            : $('#date').val(),
            'Status'          : "New",
            'action'          : "Insert_Enquiry_Data",
        };
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            success: function (data) {
            alert(data);              
            $('#CreateEnquiryForm')[0].reset();
            // $(".modal").modal('hide');
            ProductData();
            SetData();
            }
        });
        }else{
    
            if($('#Contact').val() == ""){
              $('#Msg_Contact').text("Contact Name Is Mandatory..").css("color", "red");
            }
            
            if($('#MobNo').val() == ""){
              $('#Msg_MobNo').text("Mobile Number Is Mandatory..").css("color", "red");
            }
                    
            if($('#Products').val() == ""){
              $('#Msg_Products').text("Products Is Mandatory..").css("color", "red");
            }
            
            if($('#Remarks').val() == ""){
              $('#Msg_Remarks').text("Enquiry Detail Is Mandatory..").css("color", "red");
            }
    
            if($('#RegisterBy').val() == ""){
              $('#Msg_RegisterBy').text("Register By Is Mandatory..").css("color", "red");
            }
        }
    });

    $('#Contact').keyup(function(){
        $('#Contact').keyup(function(){
            if($('#Contact').val() == ""){
              $('#Msg_Contact').text("Contact Name Is Mandatory..").css("color", "red");
            }else{
                $('#Msg_Contact').empty();
            }
        });
    });
    
    $('#MobNo').keyup(function(){
        if($('#MobNo').val() == ""){
          $('#Msg_MobNo').text("Mobile Number Is Mandatory..").css("color", "red");
        }else{
            $('#Msg_MobNo').empty();
            
        }
        
        var Num = $('#MobNo').val();
        Number = Num.toString().length;
        if(Number > 10){
            $('#Msg_MobNo').text("Please enter exactly 10 digits").css("color", "red");
            $('#MobNo').val("");
        }else{
            $('#Msg_MobNo').empty();
        }
    });
               
    $('#Products').change(function(){      
        if($('#Products').val() == ""){
          $('#Msg_Products').text("Products Is Mandatory..").css("color", "red");
        }else{
            $('#Msg_Products').empty();
        }
    });
    
    $('#Remarks').keyup(function(){
        if($('#Remarks').val() == ""){
          $('#Msg_Remarks').text("Enquiry Detail Is Mandatory..").css("color", "red");
        }else{
            $('#Msg_Remarks').empty();
        }
    });
        
    $('#RegisterBy').change(function(){
        if($('#RegisterBy').val() == ""){
          $('#Msg_RegisterBy').text("Register By Is Mandatory..").css("color", "red");
        }else{
            $('#Msg_RegisterBy').empty();
        }
    });
        
        
    //Delete Customer Lead 
    // $(document).on('click','.ClsDelete',function () {
    //   var confirmalert = confirm("Do you really want to Delete?");
    //   if (confirmalert == true) {
    //       var formData = {
    //           'LeadId'  : $(this).attr('data-formindex'),
    //           'LeadNo'  : $('#IDLeadNo').text(),
    //           'action'  : "Delete_Lead"
    //       };
    //       $.ajax({
    //           type: 'POST',
    //           url: 'action/DeleteLead.php',
    //           data: formData,
    //           success: function (data) {
    //               alert(data);            
    //                 DisplayLeadData();
    //           }
    //       });
    //   }
    // });

// Edit Ticket Table Data
$(document).on('click','.clsTicket,.clsAddNoteEnquiry,.clsDeleteTicket,.clsTransferEnquiry,.clsUpdateStatusEnquiry',function () {
  let EnquiryNo              = $(this).closest('tr').find('#IDEnquiryNo').text();
  let EnquiryRegisterBy      = $(this).closest('tr').find('#IDRegisterBy').text();
  let EnquiryRegisterByUsr   = $(this).closest('tr').find('#IDEnquiryRegisterBy').text();
  let EnquiryRemarks         = $(this).closest('tr').find('#IDEnquiryDescription').text();
  $(document).find('#EnquiryNo').val(EnquiryNo);
  $(document).find('#EnquiryStatusNo').val(EnquiryNo);
  $(document).find('#EnquiryNos').val(EnquiryNo);
//$(document).find('#add_notes').val(EnquiryRemarks);
  $(document).find('#CreatedByForNote').val(EnquiryRegisterByUsr);
  $(document).find('#EnquiryCreatedBy').val(EnquiryRegisterByUsr);
  $(document).find('#userid').val(EnquiryRegisterBy);
  $(document).find('#EnquiryCreatedById').val(EnquiryRegisterBy);
});

$(document).on('click','.clsEnquiryNo',function(){
    let EnquiryNo   = $(this).closest('tr').find('#IDEnquiryNo').text();
    let Contact     = $(this).closest('tr').find('#IDContactName').text();
    let Mob         = $(this).closest('tr').find('#IDMob').text();
    let Company     = $(this).closest('tr').find('#IDCompanyName').text();
    let Product     = $(this).closest('tr').find('#IDProduct_Name').text();
    
    localStorage.setItem("EnquiryNo",EnquiryNo);
    localStorage.setItem("Contact",Contact);
    localStorage.setItem("Mob",Mob);
    localStorage.setItem("Company",Company);
    localStorage.setItem("Product",Product);
});

$(document).on('click','.clsConvertEnquiryToLead',function(){
  let EnquiryNo   = $(this).closest('tr').find('#IDEnquiryNo').text();
  let Product     = $(this).closest('tr').find('#IDProduct_Name').text();
  let Company     = $(this).closest('tr').find('#IDCompanyName').text();
  localStorage.setItem("EnquiryNo",EnquiryNo);
  localStorage.setItem("ENQRYProduct",Product);
  localStorage.setItem("ENQRYCompany",Company);
  window.location.href="Lead.php";
});

$(document).on('click','.clsLeadNo,.clsLeadStatus,.clsLeadDescription',function () {
      let Lead_No = $(this).closest('tr').find('.clsLeadNo').text();
      localStorage.setItem("LeadNo",Lead_No);
});

//Enquiry Delete Start Here
$(document).on('click','.clsDeleteEnquiry',function (e) {
    e.preventDefault();
    let EnquiryNo = $(this).closest('tr').find('#IDEnquiryNo').text();
    var url = 'action/actionCreateEnquiry.php';
    var formData = {
        'EnquiryNo'     : EnquiryNo,
        'action'        : "Enquiry_Delete_Data"
    };
    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        success: function(data){
            alert(data);
            window.location.reload();                       
        }
    });
});

//Enquiry Delete End Here

//Enquiry Transfer Form
$('#Enquiry_Transfer_Form').submit(function (e) {
  e.preventDefault();
  var url = $('#Enquiry_Transfer_Form').attr('action');
    var formData = {
        'EnquiryNo'     : $('#EnquiryNo').val(),
        'TransferID'    : $('#TransferTo').val(),
        'TransferDate'  : $('#date').val(),
        'action'        : "Enquiry_Transfer_Data"
    };
    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        success: function (data) {
            alert(data);
             $(".modal").modal('hide');
            window.location.reload();                       
        }
    });
});

//Lead Status Form
$('#Update_Enquiry_Status_Form').submit(function (e) {
  e.preventDefault();
  var url = $('#Update_Enquiry_Status_Form').attr('action');
    var formData = {
        'EnquiryStatusNo'       : $('#EnquiryStatusNo').val(),
        'StatusDate'            : $('#StatusDate').val(),
        'EnquiryUpdateStatus'   : $('#EnquiryUpdateStatus').val(),
        'EnquiryStatusNotes'    : $('#EnquiryStatusNotes').val(),
        'EnquiryCreatedBy'      : $('#EnquiryCreatedBy').val(),
        'EnquiryCreatedById'    : $('#EnquiryCreatedById').val(),
        'action'                : "Enquiry_Update_Status_Data"
    };
    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        success: function (data) {
            alert(data);
             $(".modal").modal('hide');
            window.location.reload();                       
        }
    });
});

//Enquiry Add Note Form
$('#AddNoteForm').submit(function (e) {
  e.preventDefault();
  var url = $('#AddNoteForm').attr('action');
    var formData = {
        'userid'           : $('#userid').val(),
        'EnquiryNos'       : $('#EnquiryNos').val(),
        'add_notes'        : $('#add_notes').val(),       
        'CreatedByForNote' : $('#CreatedByForNote').val(),
        'action'           : "Insert_Add_Note_Data"
    };
    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        success: function (data) {
            alert(data);
             $(".modal").modal('hide');
            window.location.reload();                       
        }
    });
});

let Transfer = '<?php echo $_SESSION["username"]; ?>';

// $('#IDLeads').change(function(){
//   //$('#OpenTicketList').empty();
//   //let TicketStatus = $(this).val();
//   let htmlLead = ``;
//   var Days = '';
//   let Closed_Date = '';
  let EnquiryData = {
        'action'     : 'Display_Enquiry_Data'
  }
  $.ajax({
      type: 'POST',
      url: 'action/actionCreateEnquiry.php',
      data: EnquiryData,
      success: function (data) {
        $('#IDLeadDetailss').html(data);  
      }
  });

$('#IdEnquiryStatusChange').change(function(){
  //$('#OpenTicketList').empty();
  //let TicketStatus = $(this).val();
    let htmlEnquiryStatusBaseData = ``;
    var Days = '';
    let Closed_Date = '';
    let EnquiryChangeData = {
        'EnquiryStatus' :  $('#IdEnquiryStatusChange').val(),
        'action'        : 'Display_Enquiry_On_Status_Base'
    }
        $.ajax({
          type:'POST',
          url: 'action/actionCreateEnquiry.php',
          data: EnquiryChangeData,
          success: function (data) {
            let ActualLeadsData = JSON.parse(data);
            $.each(ActualLeadsData,function(index,value){
                var Fromdate      = new Date(value.Date);
                var EnquiryDate = Fromdate.toString('dd-MM-yyyy');

                if(value.Status == "Open"){
                    Status = '<span   style="color:green;font-weight:bold;">'+value.Status+'</span>';
                    // if(Closed_Date == "01-01-1970"){
                    var d = new Date();
                    var month = d.getMonth()+1;
                    var day = d.getDate();
                    Closed_Date = d.getFullYear() + '-' +
                    ((''+month).length<2 ? '0' : '') + month + '-' +
                    ((''+day).length<2 ? '0' : '') + day;
                    //  }
                    Days = daysdifference(value.Date,Closed_Date);
                    function daysdifference(FirstDate, secondDate){
                        var startDay = new Date(FirstDate);
                        var endDay   = new Date(secondDate);
                       
                        var millisBetween = startDay.getTime() - endDay.getTime();
                        var days = millisBetween / (1000 * 3600 * 24);
                       
                        return Math.round(Math.abs(days));
                    }
                 
                }
                
                if(value.Status == "Drop"){
                    Status = '<span style="color:blue;font-weight:bold;">'+value.Status+'</span>';
                    Days = daysdifference(value.Date,value.EnqryClosedDate);
                    function daysdifference(FirstDate, secondDate){
                        var startDay = new Date(FirstDate);
                        var endDay   = new Date(secondDate);
                        var millisBetween = startDay.getTime() - endDay.getTime();
                        var days = millisBetween / (1000 * 3600 * 24);
                        return Math.round(Math.abs(days));
                    }
                   // }
                }
                
                if(value.Status == "Won"){
                    Status = '<span  style="color:red;font-weight:bold;">'+value.Status+'</span>';
                    Days = daysdifference(value.Date,value.EnqryClosedDate);
                    function daysdifference(FirstDate, secondDate){
                        var startDay = new Date(FirstDate);
                        var endDay   = new Date(secondDate);
                        var millisBetween = startDay.getTime() - endDay.getTime();
                        var days = millisBetween / (1000 * 3600 * 24);
                        return Math.round(Math.abs(days));
                    }
                }

                htmlEnquiryStatusBaseData +=`                  
                <tr id="row_`+value.EnqryNo+`">
                        <td id="IDEnquiryNo"  class="sorting_1 Compnys clsEnquiryNo" style="font-weight:bold;width:13%;"><a href="EnquiryDetailReport.php">`+value.EnqryNo+`</a></td>
                        <td>`+EnquiryDate+`</td>
                        <td style="width:4%;text-align:center;">`+Days+`</td>
                        <td id="IDContactName" style="width:10%;">`+value.EnqryContactName+`</td>
                        <td id="IDMob" style="width:10%;">`+value.EnqryMob+`</td>
                        <td id="IDCompanyName" style="width:15%;">`+value.EnqryCompnyName+`</td>
                        <td id="IDProduct_Name" style="width:15%;">`+value.Product_Name+`</td>
                        <td id="IDEnquiryRegisterBy">`+value.username+`</td>
                        <td id="IDRegisterBy" style="display:none;">`+value.RegisterBy+`</td>
                        <td id="IDEnquiryStatus" style="width:5%;" class="clsLeadStatus"><a href="#"><span style="color:green;font-weight:bold;">`+value.Status+`</span></a></td>
                        <td id="IDEnquiryDescription" class="clsEnquiryRemarks" style="width:20%;"><a href="#">`+value.EnqryRemarks+`</a></td>
                        <td id="IDAction" style="width:2%;">
                            <div class="btn-group" style="position:absolute !important;">
                                <i class="fa fa-mail-forward" dropdown-toggle" data-toggle="dropdown"></i>
                                <div class="dropdown-menu">`;
                                
                                if(value.Status != "Won"){
                                    htmlEnquiryStatusBaseData +=`<a class="dropdown-item clsTransferEnquiry" href="#" data-formindex="`+value.EnqryNo+`" data-toggle="modal" data-target="#EnquiryTransferModal">Transfer</a>
                                                                 <a class="dropdown-item clsAddNoteEnquiry"  data-formindex="`+value.EnqryNo+`" data-toggle="modal" data-target="#EnquiryAddNoteModal" href="#">Add Notes</a>
                                                                 <a class="dropdown-item clsUpdateStatusEnquiry" data-formindex="`+value.EnqryNo+`" data-toggle="modal" data-target="#EnquiryUpdateStatusModal" href="#">Update Status</a>`;
                                }
                                
                                if(value.Status == "Won" && value.EnqryViewStatus == "1"){
                                 htmlEnquiryStatusBaseData +=`<a class="dropdown-item clsConvertEnquiryToLead" href="#" data-formindex="`+value.EnqryNo+`" >Convert Lead</a>`;
                                    
                                }
 htmlEnquiryStatusBaseData +=`</div> 
                            </div>
                        </td>
                    </tr>`;   
                });
                $('#IDLeadDetailss').html(htmlEnquiryStatusBaseData);
            }
        });
    });



            // htmlLead+=`<tr id="row_`+value.LeadId+`">
            //     <td id="IDLeadNo"  class="sorting_1 Compnys clsLeadNo" style="width:10%;"><a href="LeadTransferReport.php?action=Transfer_Report">`+value.LeadNo+`</a></td>
            //     <td>`+LeadDate+`</td>
            //     <td style="width:4%;text-align:center;">`+Days+`</td>
            //     <td id="IDContactName" style="width:10%;">`+value.ContactName+`</td>
            //     <td id="IDCompanyName" style="width:15%;">`+value.CompanyName+`</td>
            //     <td id="IDProduct_Name" style="width:15%;">`+value.Product_Name+`</td>
            //     <td id="IDDealsIn" style="display:none;">`+value.DealsIn+`</td>
            //     <td id="IDLeadRegisterBy">`+value.username+`</td>                  
            //     <td id="IDLeadStatus" class="clsLeadStatus" style="width:5%;"><a href="LeadTransferReport.php?action=Lead_Status_Report">`+LeadStatus+`</a></td>
            //     <td id="IDDescription" class="clsLeadDescription" style="width:20%;"><a href="LeadTransferReport.php?action=Lead_Task_Report">`+value.Description+`</a></td>
            //     <td id="IDAction" style="width:2%;">
            //           <div class="btn-group">
            //               <i class="fa fa-mail-forward" dropdown-toggle" data-toggle="dropdown"></i>
            //               <div class="dropdown-menu">
            //                   <a class="dropdown-item clsTransferTicket" href="#" data-formindex="`+value.LeadId+`" data-toggle="modal" data-target="#TicketTransferModal">Lead Transfer</a>
            //                   <a class="dropdown-item clsStatusLead" href="#" data-formindex="`+value.LeadId+`" data-toggle="modal" data-target="#TicketStatusModal">Lead Status</a>
            //                   <a class="dropdown-item clsAddNoteTicket"   data-formindex="`+value.LeadId+`" data-toggle="modal" data-target="#TicketAddNoteModal" href="#">Add Notes</a>
            //                   <a class="dropdown-item ClsDelete" data-formindex="`+value.LeadId+`" href="#">Delete Lead</a>
            //               </div> 
            //           </div>
            //     </td>
            //     </tr>`;




//alert(localStorage.getItem("CompanyInsertid"));
$(document).on('click','.clsAlter_Product',function () {
  window.location.reload();
});

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

 
// Initialize select2
$("#Products").select2();




</script>