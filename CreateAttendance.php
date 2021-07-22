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
            <div class="page-title">
                <div class="title_left">
                    <h3><small>Create - Attendance</small></h3>
                </div>
            </div>
            <div class="clearfix"></div>
    <div class="container-fluid">
        <form name="InvoiceForm" id="InvoiceForm" autocomplete="off" method="post" enctype="multipart/form-data">
            <input type="hidden" style="display:inline-block;" form="InvoiceForm" name="VoucherNo " id="VoucherNo" value="" />
            <input type="hidden" style="display:inline-block;" form="InvoiceForm" name="AccountInsertId " id="AccountInsertId" value="" />
            <div class="row">
              <div class="col-sm-2">
                  <label>Voucher No</label>
                  <input type="text" style="display:inline-block;" name="InvoiceNo" autofocus class="form-control input_whole_soft Input" id="InvoiceNo" placeholder="Voucher No."  data-Index="1" form="InvoiceForm" readonly/>
              </div>
              <div class="col-sm-2">
                  <label>Date</label>
                  <input type="date" name="InvoiceDate" id="InvoiceDate" style="width:100%;" class="form-control input_whole_soft Input" form="InvoiceForm" required  data-Index="2"/>
                  <div id="suggesstion-box" style="position: absolute;z-index: 99;display:block;width:100%;"></div>
              </div>
            </div>
        </form>
        <div id="DynamicForm">
            <!--opening-balance-body-->
            <div class ="opening-balance-table"  style="margin: 10px 0px  !important;">
                <table class="table table-fixed table-bordered css-serial" id="DataContainer">
                    <thead>
                        <tr>
                            <th class="table-whole-soft-heading" style="width:5% !important;border-left:none;">Sr.no</th>
                            <th class="table-whole-soft-heading" style="width:15% !important;">Staff</th>
                            <th class="table-whole-soft-heading" style="width:15% !important;">P/A</th>
                            <th class="table-whole-soft-heading" style="width:15% !important;">In Time</th>
                            <th class="table-whole-soft-heading" style="text-align:left;width:15% !important;">Out Time</th>
                            <th class="table-whole-soft-heading" style="text-align:left;width:20% !important;">Confirmation</th>
                            <th class="table-whole-soft-heading" style="text-align:left;width:20% !important;">Remarks</th>
                        </tr>
                            
                        </tr>
                    </thead>
                    <tbody style="height: 250px;" id="IDTbody">
                        <tr>
                            <td class="table-whole-soft-heading" style="width:5% !important;border-left:none;"></td>
                            <td class="table-whole-soft-heading clsStaffName" style="width:15% !important;">Rahul</td>
                            <td class="table-whole-soft-heading" style="width:15% !important;">
                              <select name="SelectPA" id="SelectPA" class="form-control ClsPA">  
                                <option value="">--Select--</option>    		  
                                <option value="Present">Present</option>
                                <option value="Absent">Absent</option>			                            
                              </select>
                            </td>
                            <td class="table-whole-soft-heading" style="width:15% !important;">
                            <!--<input class="form-control clsInTimeDate"  type="text" name="date" required='required' >-->
                            <input class="form-control clsInTimeDate"  type="time" name="date" required='required' >
                            
                            </td>
                            <td class="table-whole-soft-heading" style="text-align:left;width:15% !important;">
                            <!--<input class="form-control clsOutTimeDate"  type="text" name="date" id="" required='required'>-->
                            <input class="form-control clsOutTimeDate"  type="time" name="date" required='required' >
                            </td>
                            <td class="table-whole-soft-heading" style="text-align:left;width:20% !important;">
                            <select name="SelectConfirmation" id="IDConfirmation" class="form-control ClsConfirmation">     		  
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>			                            
                              </select>
                            </td>
                            <td class="table-whole-soft-heading" style="text-align:left;width:20% !important;">
                            <input class="form-control clsRemarks"  type="text" name="date"  required='required'>
                            </td>
                        </tr>
                        <tr>
                            <td class="table-whole-soft-heading" style="width:5% !important;border-left:none;"></td>
                            <td class="table-whole-soft-heading clsStaffName" style="width:15% !important;">Anuradha</td>
                            <td class="table-whole-soft-heading" style="width:15% !important;">
                            <select name="SelectPA" id="SelectPA" class="form-control ClsPA">  
                                <option value="">--Select--</option>    		  
                                <option value="Present">Present</option>
                                <option value="Absent">Absent</option>			                            
                              </select>
                            </td>
                            <td class="table-whole-soft-heading" style="width:15% !important;">
                            <!--<input class="form-control clsInTimeDate"  type="text" name="date" required='required'>-->
                            <input class="form-control clsInTimeDate"  type="time" name="date" required='required' >
                            </td>
                            <td class="table-whole-soft-heading" style="text-align:left;width:15% !important;">
                            <!--<input class="form-control clsOutTimeDate"  type="text" name="date" required='required'>-->
                            <input class="form-control clsOutTimeDate"  type="time" name="date" required='required' >
                            </td>
                            <td class="table-whole-soft-heading" style="text-align:left;width:20% !important;">
                              <select name="SelectConfirmation" id="IDConfirmation" class="form-control ClsConfirmation">                                    		  
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>			                            
                              </select>
                            </td>
                            <td class="table-whole-soft-heading" style="text-align:left;width:20% !important;">
                            <input class="form-control clsRemarks"  type="text" name="date"  required='required'>
                            </td>
                        </tr>
                        <tr>
                            <td class="table-whole-soft-heading" style="width:5% !important;border-left:none;"></td>
                            <td class="table-whole-soft-heading clsStaffName" style="width:15% !important;">Shivam</td>
                            <td class="table-whole-soft-heading" style="width:15% !important;">
                            <select name="SelectPA" id="SelectPA" class="form-control ClsPA">  
                                <option value="">--Select--</option>    		  
                                <option value="Present">Present</option>
                                <option value="Absent">Absent</option>			                            
                              </select>
                            </td>
                            <td class="table-whole-soft-heading" style="width:15% !important;">
                              <!--<input class="form-control clsInTimeDate"  type="text" name="date" id="" required='required'>-->
                              <input class="form-control clsInTimeDate"  type="time" name="date" required='required' >
                            </td>
                            <td class="table-whole-soft-heading" style="text-align:left;width:15% !important;">
                              <!--<input class="form-control clsOutTimeDate"  type="text" name="date" id="" required='required'>-->
                              <input class="form-control clsOutTimeDate"  type="time" name="date" required='required' >
                            </td>
                            <td class="table-whole-soft-heading" style="text-align:left;width:20% !important;">
                              <select name="SelectConfirmation" id="IDConfirmation" class="form-control ClsConfirmation">      		  
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>			                            
                              </select>
                            </td>
                            <td class="table-whole-soft-heading" style="text-align:left;width:20% !important;">
                            <input class="form-control clsRemarks"  type="text" name="date"  required='required'>
                            </td>
                        </tr>

                    </tbody>
                 <tfoot>
                      <tr>
                          <th style="width:53% !important;text-align:right;vertical-align:middle;border-left:none;"><b><br></b></th>
                          <th style="width:8% !important;text-align:right;"></th>
                          <th style="width:8% !important;text-align:right;"></th>
                          <th style="width:8% !important;text-align:right;"></th>
                          <th style="width:8% !important;text-align:right;"></th>
                          <th style="width:8% !important;text-align:right;"></th>
                          <th style="width:7% !important;text-align:right;"></th>
                      </tr>
                  </tfoot>
                </table>
            </div><!--opening-balance-table-->
            <div class="opening-balance-bottom" style="text-align: center;">
              <button  class="btn btn-success  whole-save-button" id="SaveEntireForm" name="SaveEntireForm" style="font-size: 15px !important;">Save</button>
              <button  class="btn btn-success whole-reset-button" id="Discard" style="font-size: 15px !important;">Cancel</button>
              <a href="CreateAttendance.php?action=View"><button  class="btn btn-success whole-reset-button" id="View" style="font-size: 15px !important;">View</button></a>	
            </div>
            <div id="ModelWindow"></div>
            <div id="InvisibaleForm"></div>
        </div>
    </div><!-- container-fluid-->
    
    <div id="AlterFormDisplay"></div>
    <div id="CreateFormDisplay"></div>
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
                    <h2>Attendance Report</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <!-- <li>
                          <select class="form-control" id="IDLeads">
                            <option>Select Leads</option>
                            <option value="All Leads">All Leads</option>
                            <option value="Open Leads">Daily</option>
                            <option value="Won Leads">Weakly</option>
                            <option value="Drop Leads">Monthly</option>
                          </select>
                      </li>&nbsp;&nbsp; -->
                      <li>
                        <input type="text" name="myInput" id="myInput"class="form-control" placeholder="Search..." >
                      </li>&nbsp;&nbsp;  
                      <li class="dropdown">
                        <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i><b> &nbsp;Create/View/Edit</b></a> -->
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i class="fa fa-edit"></i>
                            Create/View/Edit
                          </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="CreateAttendance.php?action=Create">Create</a>
                        <a class="dropdown-item" href="CreateAttendance.php?action=View">Attendance Report</a>
                        </div>
                      </li>               
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
                                        <th>SNo</th>  
                                        <th>Date</th>                                           
                                        <th>Staff</th>
                                        <th>P/A</th>                  
                                        <th>In Time</th>
                                        <th>Out Time</th>
                                        <th>Confirmation</th>
                                        <th>Remarks</th>
                                        <th>Action</th>                         
                                        </tr>
                                    </thead>
                                    <tbody id="IDAttendanceDetails">

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
		                    <h2>Alter_Company_Product</h2>
		                    <ul class="nav navbar-right panel_toolbox">
		                      <li class="dropdown">
		                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i></a>
		                        <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		                            <a class="dropdown-item" href="Companies_Products.php?action=Create">Create</a>
		                            <a class="dropdown-item" href="Companies_Products.php?action=View">Report</a>
		                        </div> -->
		                      </li>
		                      <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		                      </li>
		                      
		                      <li><a class="close-link"><i class="fa fa-close"></i></a>
		                      </li> -->
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


  <!-- Create Lead Transfer's Div Start Here -->
  <div class="modal fade" id="TicketTransferModal" role="dialog">
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
		                    <h2>Lead Transfer</h2>
		                    <ul class="nav navbar-right panel_toolbox">
		                    </ul>
		                    <div class="clearfix"></div>
		                  </div>
                        <div class="x_content">
                          <form  name="Lead_Transfer_Form" id="Lead_Transfer_Form" action="action/CreateLead.php" autocomplete="off" method="post" novalidate>                        
                               <input type="hidden" name="LeadId" id="LeadId" value="">
                               <input type="hidden" name="Userid" id="Userid" value="<?php echo $_SESSION['id'];?>">        
                               <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Lead ID<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control"  id="LeadNo" name="LeadNo" placeholder="" required="required" disabled /><span id="MSG_TicketNo"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Transfer To<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control"  id="TransferTo" name="TransferTo" placeholder="" required="required"  /><span id="MSG_TicketNo"></span>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Create Lead Transfer's Div Start Here -->



  <!-- Lead Status Update Model Div Start Here -->
<div class="modal fade" id="TicketStatusModal" role="dialog">
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
		                    <h2>Lead Status </h2>
		                    <ul class="nav navbar-right panel_toolbox">
		                    </ul>
		                    <div class="clearfix"></div>
		                  </div>
                        <div class="x_content">
                          <form  name="Update_Lead_Status_Form" id="Update_Lead_Status_Form" action="action/Createlead.php" autocomplete="off" method="post" novalidate>                        
                               <input type="hidden" name="TicketInsertId" id="TicketInsertId" value="">
                               <input type="hidden" id="LeadNo"  name="LeadNo" >
                               <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Date</label>       
                                    <input class="form-control" class='date' id="date" type="date" name="date" required='required'>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Status<span class="required">*</span></label>
                                    <select name="Status" id="UpdateStatus" class="form-control">  
                                        <option value="">--Please Select--</option> 
                                        <option value="Open">Open</option>
                                        <option value="Won">Won</option>	   
                                        <option value="Drop">Drop</option>	                        
                                    </select><span id="MSG_Status"></span>
                                </div>  
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Created By</label>       
                                    <input class="form-control" id="CreatedBy" type="text" name="CreatedBy" required='required'>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Lead Status Update Model Div End Here -->

  <!-- add Task Model Div Start Here -->
<div class="modal fade" id="TicketAddNoteModal" role="dialog">
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
		                    <h2>Add Task</h2>
		                    <ul class="nav navbar-right panel_toolbox">
		                    </ul>
		                    <div class="clearfix"></div>
		                  </div>
                        <div class="x_content">
                          <form  name="AddTaskForm" id="AddTaskForm" action="action/CreateLead.php" autocomplete="off" method="post" novalidate>                                                 
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Lead ID<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control"  id="LeadNos" name="LeadNos" placeholder="" required="required" readonly /><span id="MSG_TicketNo"></span>
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
                                      <input class="form-control" id="CreatedByForTask" type="text" name="CreatedByForTask" required='required'>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
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

  let Todays=new Date();
  let FormatedDates=Todays.getFullYear()+'-'+('0'+(Todays.getMonth()+1)).slice(-2)+'-'+('0'+Todays.getDate()).slice(-2);
  $('#InvoiceDate').val(FormatedDates).focus().select();

  function formatAMPM(date) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  // var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
 // var strTime = hours + ':' + minutes + ' ' + ampm;
 var strTime = hours + ':' + minutes
  return strTime;
}
// $('.clsInTimeDate').val(formatAMPM(new Date));
//$('.clsOutTimeDate').val(formatAMPM(new Date));

//InTime();
// In Time
function InTime(){
  $('.clsInTimeDate').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '10',
    maxTime: '9:00pm',
    defaultTime: '11',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
  });
}

//OutTime();
//Out Time
function OutTime(){
  $('.clsOutTimeDate').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '10',
    maxTime: '9:00pm',
    defaultTime: '11',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true

    // timeFormat: 'h:mm p',
    // interval: 60,
    // minTime: '10',
    // maxTime: '6:00pm',
    // defaultTime: '11',
    // startTime: '10:00',
    // dynamic: false,
    // dropdown: true,
    // scrollbar: true

  });
}


// var timepicker = new TimePicker('clsInTimeDate', {
//   lang: 'en',
//   theme: 'dark'
// });
// timepicker.on('change', function(evt) {
//   var value = (evt.hour || '00') + ':' + (evt.minute || '00');
//   evt.element.value = value;
// });


  // let All_Data_Display = "";
  // GET_Company_ID = localStorage.getItem("CompanyInsertid");
  // if( GET_Company_ID != ""){
  //   let Search = "CompanyWiseData";
  // }else{
  //    All_Data_Display = "DisplayData";
  // }

// $('#SearchType').change(function(){
//   let SearchType = $(this).val();
//   $('#SData').val(SearchType);

// });


// $('#SelectPA').change(function(){
// let PA = $(this).val();
//     if(PA == "Present"){
//         $('#IDBox').html('<div class="field item form-group"><label class="col-form-label col-md-3 col-sm-3  label-align">In Time<span class="required">*</span></label><div class="col-md-6 col-sm-6"><input class="form-control" class="date" type="date" name="date" id="date" required="required" readonly></div></div><div class="field item form-group"><label class="col-form-label col-md-3 col-sm-3  label-align">Out Time<span class="required">*</span></label><div class="col-md-6 col-sm-6"><input class="form-control" class="date" type="date" name="date" id="date" required="required" readonly></div></div><div class="field item form-group"><label class="col-form-label col-md-3 col-sm-3  label-align"><span class="required">Confirmation*</span></label><div class="col-md-6 col-sm-6"><select name="Confirmation" id="Confirmation" class="form-control">  <option value="">--Select Confirmation--</option><option value="Yes">Yes</option><option value="No">No</option></select></div></div><div class="field item form-group"><label class="col-form-label col-md-3 col-sm-3  label-align">Remarks<span class="required">*</span></label><div class="col-md-6 col-sm-6"><input class="form-control" type="text" name="Remarks" id="Remarks" required="required"></div></div>');
//     }
//     if(PA == "Absent"){
//         $('#IDBox').empty();
//     }
// });

$(document).on('change','.ClsPA',function(){
  let PA = $(this).closest('tr').find('.ClsPA').val();
  if(PA == "Absent"){
    $(this).closest('tr').find('.clsInTimeDate').val('00:00:00');
    $(this).closest('tr').find('.clsOutTimeDate').val('00:00:00');
    $(this).closest('tr').find('.clsInTimeDate').prop('readonly', true);
    $(this).closest('tr').find('.clsOutTimeDate').prop('readonly', true);
  }
  if(PA == "Present"){
    $(this).closest('tr').find('.clsInTimeDate').val(InTime());
    $(this).closest('tr').find('.clsOutTimeDate').val(OutTime());
    $(this).closest('tr').find('.clsInTimeDate').prop('readonly', false);
    $(this).closest('tr').find('.clsOutTimeDate').prop('readonly', false);
    // $(this).closest('tr').find('.ClsConfirmation').html("disabled");
    // $(this).closest('tr').find('.ClsConfirmation').html("display","visible");
  }
});



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


$.ajax({
  type: 'POST',
  url: 'action/SelectAttendance.php',
  data: {action:'Display_MaxVoucher_Number'},
  success: function (data) {
    let NUM =parseInt(data);
    if (NUM == 0) {
            $('#InvoiceNo').val('1');
    } else {
        $('#InvoiceNo').val(NUM+1);
    }
  }
});



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


// $.ajax({
//   type: 'POST',
//   url: 'action/SelectContact.php',
//   data: {action:'Display_Contact_Data'},
//   success: function (data) {
//     let ContactData = JSON.parse(data);
//     htmlContactData+=`<option value>Select Contact </option>`;
//     $.each(ContactData, function(i,val) {
//         htmlContactData+=`<option value="`+val.ContactInsertId +`">`+val.ContactName +` </option>`;
//     });
//     $('#ContactInsertId').html(htmlContactData);
//   }
// });

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
    $('#ProductsDetails').html(htmls);
  }
});

DisplayLeadData();

// Display Data In Table
function DisplayLeadData(){
$.ajax({
    type: 'POST',
    url: 'action/SelectAttendance.php',
    data: {action:'Display_Attendance_Data'},
    success: function (data) {
      // let ActualData = JSON.parse(data);
      // let Status = "";
      //       $.each(ActualData, function(i,val) {
              // if(val.Amc_From_Date !=null){
              //  var Fromdate = new Date(val.Amc_From_Date);
              //  var AMCFromDate = Fromdate.toString('dd-MM-yyyy'); 
              // }else{
              //   var AMCFromDate = "";
              // }
              // if(val.Amc_Expire_On !=null){
              //   var Todate = new Date(val.Amc_Expire_On);
              //   var AMC_Expire_Date = Todate.toString('dd-MM-yyyy');
              // }else{
              //   var AMC_Expire_Date = "";
              // }
              // let Today=new Date();
              // let curr_day   = String(Today.getDate()).padStart(2, '0');
              // let curr_month = String(Today.getMonth()+ 1).padStart(2, '0');              
              // let curr_year  = Today.getFullYear();
              // let Curr_Date  = curr_year+'-'+curr_month+'-'+curr_day;
              // if(Curr_Date > val.Amc_Expire_On){
              // Status = '<span style="color:red;font-weight:bold;">Expired</span>';
              // }

              // if(Curr_Date < val.Amc_Expire_On){
              //  Status = '<span style="color:green;font-weight:bold;">Active</span>';
              // }

              // if(val.Amc_Expire_On == null){
              //   Status = '<span style="color:red;font-weight:bold;">Pending</span>';;
              // }
            // htmlData+=`<tr id="row_` + val.Prodct_Compny_Id + `">
            // <td id="IDCompanyName">`+val.CompanyName+`</td>
            // <td id="IDProduct_Name">`+val.Product_Name+`</td>
            // <td id="IDSerialNo">`+val.Serial_No+`</td>
            // <td id="IDEmail_id">`+val.Email_id+`</td>
            // <td>`+val.ContactNo+`</td>                
            // <td>`+AMCFromDate+ `<br>`+AMC_Expire_Date +`</td>
            // <td>`+Status+`</td>
            // <td id="IDCompanyInsertId" style="Display:none;">`+val.CompanyInsertId+`</td>
            // <td id="IDProduct_Insert_Id" style="Display:none;">`+val.Product_Insert_Id+`</td> 
            // <td id="IDDescription">`+val.Description+`</td>
            // <td id="IDAction"><button class="btn btn-success delete"  style="height: 22px !important;
            // padding: 3px;font-size: 12px;width: 22px;" data-formindex="`+ (val.Prodct_Compny_Id) + `"><i class="fa fa-trash" aria-hidden="true"></i></button>
            // <button class="btn btn-success edit" data-toggle="modal" data-target="#myModal" style="height: 22px !important;
            // padding: 3px;font-size: 12px;width: 22px;" data-formindex="`+ (val.Prodct_Compny_Id) + `"><i class="fa fa-edit" aria-hidden="true"></i></button>
            // <button class="btn btn-success clsAmcs" data-toggle="modal" data-target="#AMCModal" style="height: 22px !important;
            // padding: 3px;font-size: 12px;width: 22px;" data-formindex="`+ (val.Prodct_Compny_Id) + `"><i class="fa fa-clone" aria-hidden="true"></i></button>
            // </td>
            // </tr>`;
            // SNo = SNo+1;
            // });
            $('#IDAttendanceDetails').html(data);
      }
});
}

 
//Create Company Product
$('#CreateLeadForm').submit(function (e) {
    e.preventDefault();8
    var url = $('#CreateLeadForm').attr('action');
    var formData = {        
        'CompanyInsertId' : $('#framework').val(),
        'ContactInsertId' : $('#ContactInsertId').val(),
        'ProductsDetails' : $('#ProductsDetails').val(),
        'DealsIn'         : $('#DealsIn').val(),
        'RegisterBy'      : $('#RegisterBy').val(),
        'Userid'          : $('#Userid').val(),
        'Description'     : $('#Description').val(),
        'date'            : $('#date').val(),
        'Status'          : $('#Status').val(),
        'action'          : "Insert_Lead_Data",
    };
    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        success: function (data) {
        alert(data);              
        $('#CreateLeadForm')[0].reset();
         $(".modal").modal('hide');
        }
    });
});

//Delete Customer Lead 
$(document).on('click','.delete',function () {
//   var confirmalert = confirm("Do you really want to Delete?");
//   if (confirmalert == true) {
      var formData = {
          'AttendanceId'  : $(this).attr('data-formindex'),
          'action'  : "Delete_Attendance"
      };
      $.ajax({
          type: 'POST',
          url: 'action/DeleteAttendance.php',
          data: formData,
          success: function (data) {
              alert(data);            
                //$('#updateTicketForm')[0].reset();
                //  window.location.reload();
                 $(".modal").modal('hide');
                DisplayLeadData();
          }
      });
//   }
});

// Edit Ticket Table Data
$(document).on('click','.clsTicket,.clsAddNoteTicket,.clsDeleteTicket,.clsTransferTicket,.clsStatusLead',function () {
  let LeadNo          = $(this).closest('tr').find('#IDLeadNo').text();
  let LeadRegisterBy  = $(this).closest('tr').find('#IDLeadRegisterBy').text();
  
  // let AssignedTo       = $(this).closest('tr').find('#IDAssignedTo').text();
  // let TicketInsertId = $(this).attr('data-formindex');
  //let LeadStatus   = $('#IDLeadStatus').text();

  $(document).find('#LeadNo').val(LeadNo);
  $(document).find('#CreatedBy').val(LeadRegisterBy);
  $(document).find('#LeadNos').val(LeadNo);
  $(document).find('#CreatedByForTask').val(LeadRegisterBy);
  // $(document).find('#TicketInsertId').val(TicketInsertId);
  //$(document).find('#UpdateStatus').html('<option value="'+LeadStatus+'">'+LeadStatus+'</option>');
});


$(document).on('click','.clsLeadNo,.clsLeadStatus,.clsLeadDescription',function () {
      let Lead_No = $(this).closest('tr').find('.clsLeadNo').text();
      localStorage.setItem("LeadNo",Lead_No);
});


//Lead Transfer Form
$('#Lead_Transfer_Form').submit(function (e) {
  e.preventDefault();
  var url = $('#Lead_Transfer_Form').attr('action');
    var formData = {
        'LeadNo'    : $('#LeadNo').val(),
        'TransferTo': $('#TransferTo').val(),
        'action'    : "Lead_Transfer_Data"
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
$('#Update_Lead_Status_Form').submit(function (e) {
  e.preventDefault();
  var url = $('#Update_Lead_Status_Form').attr('action');
    var formData = {
        'LeadNo'       : $('#LeadNo').val(),
        'Status'       : $('#UpdateStatus').val(),
        'LeadClosedOn' : $('#date').val(),
        'CreatedBy'    : $('#CreatedBy').val(),
        'action'       : "Lead_Update_Status_Data"
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

//Lead Task Form
$('#AddTaskForm').submit(function (e) {
  e.preventDefault();
  var url = $('#AddTaskForm').attr('action');
    var formData = {
        'LeadNo'           : $('#LeadNos').val(),
        'Description'      : $('#add_notes').val(),       
        'CreatedByForTask' : $('#CreatedByForTask').val(),
        'action'           : "Insert_Lead_Task_Data"
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


$('#IDLeads').change(function(){
  //$('#OpenTicketList').empty();
  //let TicketStatus = $(this).val();
  let htmlLead = ``;
  let LeadsData = {
    'LeadStatus' :  $('#IDLeads').val(),
    'action'     : 'Display_Lead_On_Status_Base'
  }
  $.ajax({
      type: 'POST',
      url: 'action/SelectLead.php',
      data: LeadsData,
      success: function (data) {
        let ActualLeadsData = JSON.parse(data);
        $.each(ActualLeadsData,function(index,value){
            var Fromdate      = new Date(value.LeadDate);
            var LeadDate = Fromdate.toString('dd-MM-yyyy'); 
            htmlLead+=`<tr id="row_`+value.LeadId+`">
                <td>`+LeadDate+`</td>
                <td id="IDLeadNo"  class="sorting_1 Compnys clsLeadNo"><a href="LeadTransferReport.php?action=Transfer_Report">`+value.LeadNo+`</a></td>
                <td id="IDContactName">`+value.ContactName+`</td>
                <td id="IDCompanyName">`+value.CompanyName+`</td>
                <td id="IDProduct_Name">`+value.Product_Name+`</td>
                <td id="IDDealsIn">`+value.DealsIn+`</td>
                <td id="IDLeadRegisterBy">`+value.LeadRegisterBy+`</td>                  
                <td id="IDLeadStatus" class="clsLeadStatus"><a href="LeadTransferReport.php?action=Lead_Status_Report">`+value.LeadStatus+`</a></td>
                <td id="IDDescription" class="clsLeadDescription"><a href="LeadTransferReport.php?action=Lead_Task_Report">`+value.Description+`</a></td>
                <td id="IDAction">
                  <center>
                      <div class="btn-group">
                          <i class="fa fa-mail-forward" dropdown-toggle" data-toggle="dropdown"></i>
                          <div class="dropdown-menu">
                              <a class="dropdown-item clsTransferTicket" href="#" data-formindex="`+value.LeadId+`" data-toggle="modal" data-target="#TicketTransferModal">Lead Transfer</a>
                              <a class="dropdown-item clsStatusLead" href="#" data-formindex="`+value.LeadId+`" data-toggle="modal" data-target="#TicketStatusModal">Lead Status</a>
                              <a class="dropdown-item clsAddNoteTicket"   data-formindex="`+value.LeadId+`" data-toggle="modal" data-target="#TicketAddNoteModal" href="#">Add Task</a>
                              <a class="dropdown-item ClsDelete" data-formindex="`+value.LeadId+`" href="#">Delete Lead</a>
                          </div> 
                      </div>
                  </center> 
                </td>
                </tr>`;
        });
        $('#IDLeadDetails').html(htmlLead);  
      }
  });
});

//alert(localStorage.getItem("CompanyInsertid"));
$(document).on('click','.clsAlter_Product',function (){
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


$("#SaveEntireForm").click(function() {
    var StaffName       = [];
    var PA              = [];
    var InTime          = [];
    var OutTime         = [];
    var Confirmation    = [];
    var Remarks         = [];
    var VoucherNo       = $('#InvoiceNo').val();
    var date            = $('#InvoiceDate').val();
    
    $('.clsStaffName').each(function(){
      StaffName.push($(this).html());
    });
    $('.ClsPA').each(function(){
      PA.push($(this).val());
    });
    $('.clsInTimeDate').each(function(){
      InTime.push($(this).val());
    });
    $('.clsOutTimeDate').each(function(){
      OutTime.push($(this).val());
    });
    $('.ClsConfirmation').each(function(){
      Confirmation.push($(this).val());
    });
    $('.clsRemarks').each(function(){
      Remarks.push($(this).val());
    });

    // if(InvoiceNo != "" && SupplierCode != ""){
      $.ajax({
        url: "action/actionCreateAttendance.php",
        type: "post",
        data: {StaffName:StaffName,PA:PA,InTime:InTime,OutTime:OutTime,Confirmation:Confirmation,Remarks:Remarks,date:date,VoucherNo:VoucherNo,action:'Insert_Attendance_Data'},
        success : function(data){
        alert(data);
         $(".modal").modal('hide');
        // $('#DataContainer').empty();
        window.location.reload();
        // $('#IDTbody').empty();
        }
      });
    // }else{
    //     alert("Invoice No and Party Name Is Required..");
    // }
});

</script>