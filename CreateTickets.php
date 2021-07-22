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
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="x_panel">
	                    <div class="x_title">
		                    <h2>Ticket Create</h2>
		                    <ul class="nav navbar-right panel_toolbox">
		                    </ul>
		                    <div class="clearfix"></div>
		                  </div>

                        <div class="x_content">
                            <form  name="CreateTicketForm" id="CreateTicketForm" action="action/CreateTicket.php" autocomplete="off" method="post" novalidate>                        
                               <input type="hidden" name="action" id="action" value="">
                                <!--<div class="field item form-group">-->
                                <!--    <label class="col-form-label col-md-3 col-sm-3  label-align">Search<span class="required">*</span></label>-->
                                <!--    <div class="col-md-2 col-sm-2">-->
                                <!--      <select name="SearchCreteria" id="SearchCreteria" class="form-control">  -->
                                <!--      <option value="Search">Search</option>    		  -->
				                            <!-- <option value="SerialNumber">Serial Number</option>-->
				                            <!-- <option value="EmailId">Email Id</option>-->
				                            <!-- <option value="CompanyName">Company Name</option>			                            -->
                                <!--    	</select>-->
                                <!--    </div>-->
                                <!--    <div class="col-md-4 col-sm-4">-->
                                <!--      <div class="frmSearch">-->
                                <!--      <input  type="hidden" class="form-control" name="search-box-copy" id="search-box-copy" placeholder="" required="required" />-->
                                <!--        <input  type="text" class="form-control" name="search-box" id="search-box" placeholder="" required="required" />-->
                                <!--        <div id="suggesstion-box" style="position: absolute;z-index: 99;display: block;width: 91%;"></div>-->
                                <!--      </div>-->
                                <!--    </div>-->
                                <!--</div>-->

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Serial No</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select  id="SerialNo" name="SerialNo" class="form-control">
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Company</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select  id="Company" name="Company" class="form-control">
                                        </select>
                                    </div>
                                </div>
                                
                                <!--<div class="field item form-group">-->
                                <!--    <label class="col-form-label col-md-3 col-sm-3  label-align">Email</label>-->
                                <!--    <div class="col-md-6 col-sm-6">-->
                                <!--        <select  id="email" name="email" class="form-control">-->
                                <!--        </select>-->
                                <!--    </div>-->
                                <!--</div>-->
                                
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Date</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='date' id="date" type="date" name="date" required='required' readonly>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Description<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea required="required" id="description" placeholder="Short description of complain" class="form-control" rows="4" name='description'></textarea><span id="MSG_description"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Customer Name<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="RegisterBy" id="RegisterBy" class="form-control">  
                                      </select>
                                      <span id="MSG_RegisterBy"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Assigned To<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <?php
                                      if($_SESSION['user_type'] == "user"){
                                      ?>
                                          <input class="form-control" id="AssignedTo" value="<?php echo $_SESSION['username']; ?>" name="AssignedTo" disabled required="required" />
                                          <input type="hidden" value="<?php echo$_SESSION['id'];?>" name="Userid" id="Userid">
                                      <?php 
                                       }
                                       if($_SESSION['user_type'] == "admin"){
                                      ?>
                                          <select name="AssignedTo" id="AssignedTo" class="form-control clsUserDetails">  
                                          </select>
                                          <input type="hidden" value="<?php echo $_SESSION['id'];?>" name="Userid" id="Userid">
                                      <?php
                                       }
                                      ?>
                                      <span id="MSG_AssignedTo"></span>
                                    </div>
                                </div>       
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type='submit' class="btn btn-success">Submit</button>
                                        <button type='reset' class="btn btn-success">Reset</button>  
                                        <button type="button" class="btn btn-success"><a href="CreateTickets.php?action=View" style="color:white;">View Ticket</a></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="test-right" id="AMCDetailsDisplay" style="min-height:500px;background-color:#fff;    padding-top: 7px; text-align: center;">
                      Select Customer to see AMC Details.
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
			<div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ticket Report</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li>
                          <!--<label>From </label>-->
                          <input type="date" name="FromDateReport" id="CreatedOnReport" class="form-control">
                      </li>&nbsp;&nbsp;
                      <li>
                          <!--<label>To </label>-->
                          <input type="date" name="ToDateReport" id="ClosedOnReport" class="form-control">
                      </li>&nbsp;&nbsp;
                      <li>
                          <select class="form-control" id="IDTickets">
                            <!--<option disabled>View Tickets</option>-->
                            <option value="Open Tickets">Open Tickets</option>
                            <option value="Hold Tickets">Hold Tickets</option>
                            <option value="Closed Tickets">Closed Tickets</option>  
                            <option value="All Tickets">All Tickets</option>
                          </select>
                      </li>&nbsp;&nbsp;                    
                      <li>
                        <input type="text" name="myInput" id="myInput"class="form-control" placeholder="Search Contact.." >
                      </li>&nbsp;&nbsp;  

                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="table-responsive">
                    
                    <table  id="SrchTable" class="table table-striped jambo_table bulk_action clsTicketTable" style="width:100%">
                      <thead>
                        <tr>                        
                          <th>Ticket No</th>
                          <th style="width:7%;">Created On</th>
                          <th style="width:7%;">Closed On</th>
                          <th style="width:4%;">Days</th>
                          <th style="width:20%;">Company</th>
                          <th>Contact</th>
                          <th style="width:15%;">Complaint</th>
                          <th>Assign</th> 
                          <th style="width:5%;">Status</th>
                          <th style="width:5%;text-align:right;">Action</th>
                        </tr>
                      </thead>
                      <tbody id="OpenTicketList">
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

  <!-- Create AMC's Div Start Here -->
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
		                    <h2>Ticket Transfer</h2>
		                    <ul class="nav navbar-right panel_toolbox">
		                    </ul>
		                    <div class="clearfix"></div>
		                  </div>
                        <div class="x_content">
                          <form  name="UpdateTicketForm" id="UpdateTicketForm" action="action/CreateTicket.php" autocomplete="off" method="post" novalidate>                        
                               <input type="hidden" name="TicketInsertId" id="TicketInsertId" value="">
                               <input type="hidden" name="Userid" id="Userid" value="<?php echo $_SESSION['id'];?>">        
                               <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Ticket No<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control"  id="TicketNo" name="TicketNo" placeholder="" required="required" disabled /><span id="MSG_TicketNo"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Transfer To<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <!--<input class="form-control"  id="TransferTo" name="TransferTo" placeholder="" required="required"  />-->
                                          <select name="TransferTo" id="TransferTo" class="form-control">  
                                            <option value="">--Select User--</option>    		  
                                            <option value="16">Rahul Singh</option>
                                            <option value="17">Anu</option>
                                            <option value="19">Shivam Chhabra</option>
                                            <option value="20">Abhishek Kumar</option>
                                          </select>
                                        <span id="MSG_TicketNo"></span>
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
  <!-- Create AMC's Div End Here -->

<!-- add Note Model Div Start Here -->
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
		                    <h2>Add Note</h2>
		                    <ul class="nav navbar-right panel_toolbox">
		                    </ul>
		                    <div class="clearfix"></div>
		                  </div>
                        <div class="x_content">
                          <form  name="AddNoteTicketForm" id="AddNoteTicketForm" action="action/CreateTicket.php" autocomplete="off" method="post" novalidate>                        
                                <input type="hidden" name="TicketInsertId" id="TicketInsertId" value="">
                                <input type="hidden" id="TicketNos"  class="form-control" name="TicketNo" required="required" disabled>
                                <input type="hidden" id="CreatedBy"  class="form-control" name="CreatedBy" required="required">
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Add Note<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea required="required" id="add_notes"  class="form-control" rows="5" cols="15" name='add_notes'></textarea><span id="MSG_add_notes"></span>
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
  <!--  add Note Model Div End Here -->

  <!-- Status Update Model Div Start Here -->
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
		                    <h2>Ticket Status </h2>
		                    <ul class="nav navbar-right panel_toolbox">
		                    </ul>
		                    <div class="clearfix"></div>
		                  </div>
                        <div class="x_content">
                          <form  name="Update_Ticket_Status_Form" id="Update_Ticket_Status_Form" action="action/CreateTicket.php" autocomplete="off" method="post" novalidate>                        
                               <input type="hidden" name="TicketInsertId" id="TicketInsertId" value="">
                               <input type="hidden" id="TicketNos"  name="TicketNo" >
                               <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Date</label>       
                                    <input class="form-control" class='date' id="date" type="date" name="date" required='required'>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Status<span class="required">*</span></label>
                                    <select name="Status" id="UpdateStatus" class="form-control">  
                                        <option value="">--Please Select--</option>    		  
                                        <option value="Hold">Hold</option>
                                        <option value="Closed">Closed</option>	                            
                                    </select><span id="MSG_Status"></span>
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
</div>
<?php

	}
?>
<?php
include 'footer/footer.php';
?>
<script type="text/javascript">
    let Today=new Date();
    let FormatedDate=Today.getFullYear()+'-'+('0'+(Today.getMonth()+1)).slice(-2)+'-'+('0'+Today.getDate()).slice(-2);
    $('#date').val(FormatedDate).focus().select();
    $('#CreatedOnReport').val(FormatedDate).focus().select();

    $(document).on('keyup','#description',function(){
        let description = $('#description').val();
        if(description != ""){
          $('#MSG_description').empty();
        }else{
          $('#MSG_description').text("Description Field Is Mandatory..").css("color", "red");
        }
    });
    
    $(document).on('change','#AssignedTo',function(){
        let AssignedTo = $('#AssignedTo').val();
        if(AssignedTo != ""){
          $('#MSG_AssignedTo').empty();
        }else{
          $('#MSG_AssignedTo').text("Assigned To Field Is Mandatory..").css("color", "red");
        }
    });

    $(document).on('change','#RegisterBy',function(){
        let RegisterBy = $('#RegisterBy').val();
        if(RegisterBy != "" || RegisterBy != null){
          $('#MSG_RegisterBy').empty();
        }else{
          $('#MSG_RegisterBy').text("Register By  Field Is Mandatory..").css("color", "red");
        }
    });
    
    $(document).on('keyup','#add_notes',function(){
        let add_notes = $('#add_notes').val();
        if(add_notes != ""){
          $('#MSG_add_notes').empty();
        }else{
          $('#MSG_add_notes').text("Add Note Field Is Mandatory..").css("color", "red");
        }
    });

    //UpdateTicketForm Start
    $(document).on('keyup','#TicketNo',function(){
        let TicketNo = $('#TicketNo').val();
        if(TicketNo != ""){
          $('#MSG_TicketNo').empty();
        }else{
          $('#MSG_TicketNo').text("Ticket No Field Is Mandatory..").css("color", "red");
        }
    });
    
    $(document).on('keyup','#ResolvedBy',function(){
        let ResolvedBy = $('#ResolvedBy').val();
        if(ResolvedBy != ""){
          $('#MSG_ResolvedBy').empty();
        }else{
          $('#MSG_ResolvedBy').text("Resolved By  Field Is Mandatory..").css("color", "red");
        }
    });
    
    $(document).on('change','#Status',function(){
        let Status = $('#Status').val();
        if(Status != "" || Status != null){
          $('#MSG_Status').empty();
        }else{
          $('#MSG_Status').text("Status Field Is Mandatory..").css("color", "red");
        }
    });
    
    
    SerialNo();
    function SerialNo(){
        var formData = {
            //'Serial_No'  : $(this).val(),
            'action'     : "Display_ProductAmcs_Serial_Data"
        };
      	$.ajax({
          type: "POST",
          url: "action/SelectAmcs.php",
          data:formData,
        //   beforeSend: function(){
        //     $("#search-box").css("background","#FFFFF url(LoaderIcon.gif) no-repeat 165px");
        //   },
          success: function(data){
              $("#SerialNo").html(data)
            // $("#suggesstion-box").show();
            // $("#suggesstion-box").html(data);
            // $("#search-box").css("background","#FFF");
          }
      	});
    }
    
   CompaniesData();
   function CompaniesData(){
        var formData = {
            'action' : "Display_CompanyName_Data_For_Amc"
        };
        $.ajax({
            type: "POST",
            url: "action/SelectCompany.php",
            data:formData,
            success: function(data){
                $("#Company").html(data)
            }
        });
    }
    
    
    
    
    
    //UpdateTicketForm END
    $('#SearchCreteria').change(function(event){
        let Value=$(this).children("option:selected").val();
        $('#search-box').prop('placeholder',Value);
        if(Value =="SerialNumber"){
          let htmls =``;
          $('#action').val("Display_AMC_Data_SerialNo_Base");
            // AJAX call for autocomplete 
          	$("#search-box").keyup(function(){
                var formData = {
                    'Serial_No'  : $(this).val(),
                    'action'     : "Display_ProductAmcs_Serial_Data"
                };
          		$.ajax({
                  type: "POST",
                  url: "action/SelectAmcs.php",
                  data:formData,
                  beforeSend: function(){
                    $("#search-box").css("background","#FFFFF url(LoaderIcon.gif) no-repeat 165px");
                  },
                  success: function(data){
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html(data);
                    $("#search-box").css("background","#FFF");
                  }
          		});
          	});
        }
    
        if(Value == "EmailId"){
          let htmlss =``;
          $('#framework').empty();
          $('#AMCDetailsDisplay').empty();
          $('#action').val("Display_AMC_Data_EmailId_Base");
        }
    
        if(Value=="CompanyName"){
          let htmlsss =``;
          $('#framework').empty();
          $('#AMCDetailsDisplay').empty();
          $("#search-box").keyup(function(){
            var formData = {
                  'CompanyName'  : $(this).val(),
                  'action'     : "Display_CompanyName_Data_For_Amc"
                };
            $.ajax({
                type: "POST",
                url: "action/SelectCompany.php",
                data:formData,
                beforeSend: function(){
                  $("#search-box").css("background","#FFFFF url(LoaderIcon.gif) no-repeat 165px");
                },
                success: function(data){
                  $("#suggesstion-box").html(data);
                  $("#search-box").css("background","#FFF");
                }
            });
          });
        }
    });


    $('#CreatedOnReport').change(function(){
        var formData = {
              'CreatedOnReport'  : $('#CreatedOnReport').val(),
              'ClosedOnReport'   : $('#ClosedOnReport').val(),
              'action'           : "Display_Ticket_Data_On_Report_Base"
            };
        $.ajax({
            type: "POST",
            url: "action/SelectTicket.php",
            data:formData,
            success: function(data){

            }
        });
    });
    
    $('#ClosedOnReport').change(function(){
        var formData = {
              'CreatedOnReport'  : $('#CreatedOnReport').val(),
              'ClosedOnReport'   : $('#ClosedOnReport').val(),
              'action'           : "Display_Ticket_Data_On_Report_Base"
            };
        $.ajax({
            type: "POST",
            url: "action/SelectTicket.php",
            data:formData,
            success: function(data){

            }
        });
    });

    $('#CreateTicketForm').submit(function (e) {
        e.preventDefault();
        let AmcsInsertId    = $('.SerialSelcetor').attr('data-InsertId');
        let CompanyInsertId = $('.CompanySelcetor').attr('data-InsertId');
        var url             = $('#CreateTicketForm').attr('action');
        let RegisterBy      = $('#RegisterBy').val();
        
        if($('#description').val() != "" && RegisterBy != "" && $('#AssignedTo').val() != ""){
            var formData = {
                'AmcsInsertId'    : AmcsInsertId,
                'Userid'          : $('#Userid').val(),
                'CompanyInsertId' : CompanyInsertId,
                'ContactInsertId' : $('#RegisterBy').val(),
                'date'            : $('#date').val(),
                'description'     : $('#description').val(),
                'RegisterBy'      : $('#RegisterBy').text(),
                'AssignedTo'      : $('#AssignedTo').val(),
                'action'          : "Insert_Ticket_Data",
            };
            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                success: function (data) {
                    alert(data);            
                      $('#CreateTicketForm')[0].reset();
                      $(".modal").modal('hide');
                      window.location.reload();
                },
                error: function (data) {
                    console.log('An error occurred.');
                    console.log(data);
                },
            });
        }else{
              if($('#description').val() == ""){
                $('#MSG_description').text("Description Field Is Mandatory..").css("color", "red");
              }
        
              if(RegisterBy == "" || RegisterBy == null){
                $('#MSG_RegisterBy').text("Register By Field Is Mandatory..").css("color", "red");
              }
        
              if($('#AssignedTo').val() == ""){
                $('#MSG_AssignedTo').text("Assigned To Field Is Mandatory..").css("color", "red");
              }    
        }
    });

    //Add Notes Details
    $('#AddNoteTicketForm').submit(function (e) {
        e.preventDefault();
        var url = $('#AddNoteTicketForm').attr('action');
        let add_notes = $('#add_notes').val();
        if(add_notes != ""){
          var formData = {
              'TicketNos'  : $('#TicketNos').val(),
              'CreatedBy'  : $('#CreatedBy').val(),
              'add_notes'  : $('#add_notes').val(),
              'action'     : "Insert_Ticket_AddNote_Data"
          };
          $.ajax({
              type: 'POST',
              url: url,
              data: formData,
              success: function (data) {
                  alert(data);         
                   $(".modal").modal('hide');
                    //$('#CreateTicketForm')[0].reset();
                    //window.location.reload();
              },
              error: function (data) {
                  console.log('An error occurred.');
                  console.log(data);
              },
          });
        }else{
          if(add_notes == ""){
              $('#MSG_add_notes').text("Add Note Field Is Mandatory..").css("color", "red");
            }
        }
    });

    // Edit Ticket Table Data
    $(document).on('click','.clsTicket,.clsAddNoteTicket,.clsDeleteTicket,.clsTransferTicket,.clsStatusTicket',function () {
      let TicketNo       = $(this).closest('tr').find('#IDTicketNo').text();
      let AssignedTo       = $(this).closest('tr').find('#IDAssignedTo').text();
      let TicketInsertId = $(this).attr('data-formindex');
      //let TicketStatus   = $('#IDStatus').text();
      $(document).find('#TicketNo').val(TicketNo);
      $(document).find('#TicketNos').val(TicketNo);
      $(document).find('#TicketInsertId').val(TicketInsertId);
      $(document).find('#CreatedBy').val(AssignedTo);
    });

    $(document).on('click','.clsTicketNo',function () {
          let Ticket_No = $(this).closest('tr').find('.clsTicketNo').text();
          localStorage.setItem("TicketNo",Ticket_No);
    });

    //Update Ticket Form
    $('#UpdateTicketForm').submit(function (e) {
        e.preventDefault();
        var url = $('#UpdateTicketForm').attr('action');
        if($('#TicketNo').val() != "" && $('#Status').val() != "" && $('#ResolvedBy').val() != "" && $('#date').val() != "" && $('#description').val() != ""){
            var formData = {
              'TicketNo'        : $('#TicketNo').val(),
              'Userid'          : $('#TransferTo').val(),
              'TransferTo'      : $('#TransferTo option').text(),
              'action'          : "Ticket_Transfer_Data"
            };
            $.ajax({
                  type: 'POST',
                  url: url,
                  data: formData,
                  success: function (data) {
                      alert(data);    
                      $(".modal").modal('hide');
                      window.location.reload();
                  },
                  error: function (data) {
                      console.log('An error occurred.');
                      console.log(data);
                  },
            });
        }else{
            if($('#TicketNo').val() == ""){
              $('#MSG_TicketNo').text("Ticket No Field Is Mandatory..").css("color", "red");
            }
        }
    });

    //Ticket Status Update Form
    $('#Update_Ticket_Status_Form').submit(function (e) {
      e.preventDefault();
      var url = $('#Update_Ticket_Status_Form').attr('action');
        var formData = {
            'TicketNo'          : $('#TicketNo').val(),
            'Status'            : $('#UpdateStatus').val(),
            'ComplatinClosedOn' : $('#date').val(),
            'action'            : "Ticket_Update_Status_Data"
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

    //Delete Ticket 
    $(document).on('click','.clsDeleteTicket',function () {
      var confirmalert = confirm("Do you really want to Delete?");
       if (confirmalert == true) {
          var formData = {
              'TicketInsertId'  : $(this).attr('data-formindex'),
              'action'          : "Delete_Ticket"
          };
          $.ajax({
              type: 'POST',
              url: 'action/DeleteTicket.php',
              data: formData,
              success: function (data) {
                  alert(data);            
                     window.location.reload();
              }
          });
       }
    });
    
    // $("#SerialNo option").on(function(){
    // $("#SerialNo').change(function(){
    //     alert("option Change"); 
    // });
    
    $("#Company").change(function(){
        CompanyId = $(this).val();
        Action   = "Display_AMC_Data_CompanyName_Base";
        Display_Amcs_Details(CompanyId,Action)
    });    
    
    $("#SerialNo").change(function(){
        SerialNo = $(this).val();
        Action   = "Display_AMC_Data_SerialNo_Base";
        Display_Amcs_Details(SerialNo,Action)
    });
    
    
    //Display Amcs Details
     function Display_Amcs_Details(SerialNo,Action){
        
        let html =``;
        
        var formData = {
            'SerialNo_CompanyName_EmailId_All_In_One': SerialNo,
            'action'  : Action ,
        };
        
        $.ajax({
            type: 'POST',
            url: 'action/SelectAmcs.php',
            data: formData,
            success: function (data) {
                let TicketData = JSON.parse(data);
                html+=`<table style="background-color:transparent; width:99%;">`;
                $.each(TicketData,function(index,value){
                    let Today=new Date();
                    let curr_day   = Today.getDate();
                    let curr_month = Today.getMonth()+1;
                    let curr_year  = Today.getFullYear();
                    let Curr_Date  = curr_year+'-'+"0"+curr_month+'-'+"0"+curr_day;
                    let BGColor,radio,Status;
                    if(Curr_Date<=value.AMCExpiresOn){
                        BGColor='#4CAF50;'
                        radio=`<input type="radio" name="radio" class="SerialSelcetor" data-InsertId="`+value.AMCInsertId+`" required/>
                                <input type="hidden" name="CompanySelcetor" class="CompanySelcetor" data-InsertId="`+value.CompanyInsertId+`" required/>`;
                        Status='Active';
                    }else{
                        BGColor='#da322d';
                        radio=`<input type="radio" name="radio" class="SerialSelcetor Expired" data-InsertId="`+value.AMCInsertId+`" required/>
                                <input type="hidden" name="CompanySelcetor" class="CompanySelcetor Expired" data-InsertId="`+value.CompanyInsertId+`" required/>`;
                        Status='Expired';
                    }
                    html+=`
                    <tr>
                    <td colspan="2" style="background-color:`+BGColor+`; color:white;padding:5px 5px; font-weight:bold; text-align:left;">`+radio+`
                      &nbsp;`+(index+1)+`.`+value.Product_Name+` <sup>`+Status+`</sup> </td>
                    </tr>
                    <tr style="border-bottom: 2px solid #ddd !important;padding:5px 0px;padding-left:5px;">
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">Company Name: </td>
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;"><b>`+value.CompanyName+`</b></td>
                    </tr>
                    <tr style="border-bottom: 2px solid #ddd !important;padding:5px 0px;padding-left:5px;">
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">Serial No: </td>
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;"><b>`+value.Serial_No+`</b></td>
                    </tr>
                    <tr style="border-bottom: 2px solid #ddd !important;padding:5px 10px;padding-left:5px;">
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">AMC Invoice No.: </td>
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">`+value.InvoiceNo+`</td>
                    </tr>
                    <tr style="border-bottom: 2px solid #ddd !important;padding:5px 10px;padding-left:5px;">
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">AMC Valid From: </td>
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">`+value.AMCFromDate+`</td>
                    </tr>
                    <tr style="border-bottom: 2px solid #ddd !important;padding:5px 0px;">
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">AMC Expires on.: </td>
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;font-weight:800;">`+value.AMCExpiresOn+`</td>
                    </tr>
                    <tr style="border-bottom: 2px solid #ddd !important;padding:5px 0px;">
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">Description: </td>
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">`+value.Description+`</td>
                    </tr><tr><td colspan="2">&nbsp;</td></tr>`;
                });
                html+='</table>';
                $('#AMCDetailsDisplay').html(html);
            }
        });
     }
    

    //Display Company Product On the Basis Serial No And CompanyName
    function selectCountry(val_CompanyId,val_CompanyName,Action) {
        // $("#search-box").val(val_CompanyName);
        // $("#search-box-copy").val(val_CompanyId);
        // $("#suggesstion-box").hide();
        let html =``;
        let SerialNo_CompanyName_EmailId_All_In_One = $("#search-box-copy").val();
        var formData = {
            'SerialNo_CompanyName_EmailId_All_In_One': SerialNo_CompanyName_EmailId_All_In_One,
            'action'  : Action,
            };
        $.ajax({
            type: 'POST',
            url: 'action/SelectAmcs.php',
            data: formData,
            success: function (data) {
                let TicketData = JSON.parse(data);
                html+=`<table style="background-color:transparent; width:99%;">`;
                $.each(TicketData,function(index,value){
                    let Today=new Date();
                    let curr_day   = Today.getDate();
                    let curr_month = Today.getMonth()+1;
                    let curr_year  = Today.getFullYear();
                    let Curr_Date  = curr_year+'-'+"0"+curr_month+'-'+"0"+curr_day;
                    let BGColor,radio,Status;
                    if(Curr_Date<=value.AMCExpiresOn){
                        BGColor='#4CAF50;'
                        radio=`<input type="radio" name="radio" class="SerialSelcetor" data-InsertId="`+value.AMCInsertId+`" required/>
                                <input type="hidden" name="CompanySelcetor" class="CompanySelcetor" data-InsertId="`+value.CompanyInsertId+`" required/>`;
                        Status='Active';
                    }else{
                        BGColor='#da322d';
                        radio=`<input type="radio" name="radio" class="SerialSelcetor Expired" data-InsertId="`+value.AMCInsertId+`" required/>
                                <input type="hidden" name="CompanySelcetor" class="CompanySelcetor Expired" data-InsertId="`+value.CompanyInsertId+`" required/>`;
                        Status='Expired';
                    }
                    html+=`
                    <tr>
                    <td colspan="2" style="background-color:`+BGColor+`; color:white;padding:5px 5px; font-weight:bold; text-align:left;">`+radio+`
                      &nbsp;`+(index+1)+`.`+value.Product_Name+` <sup>`+Status+`</sup> </td>
                    </tr>
                    <tr style="border-bottom: 2px solid #ddd !important;padding:5px 0px;padding-left:5px;">
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">Company Name: </td>
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;"><b>`+value.CompanyName+`</b></td>
                    </tr>
                    <tr style="border-bottom: 2px solid #ddd !important;padding:5px 0px;padding-left:5px;">
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">Serial No: </td>
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;"><b>`+value.Serial_No+`</b></td>
                    </tr>
                    <tr style="border-bottom: 2px solid #ddd !important;padding:5px 10px;padding-left:5px;">
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">AMC Invoice No.: </td>
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">`+value.InvoiceNo+`</td>
                    </tr>
                    <tr style="border-bottom: 2px solid #ddd !important;padding:5px 10px;padding-left:5px;">
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">AMC Valid From: </td>
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">`+value.AMCFromDate+`</td>
                    </tr>
                    <tr style="border-bottom: 2px solid #ddd !important;padding:5px 0px;">
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">AMC Expires on.: </td>
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;font-weight:800;">`+value.AMCExpiresOn+`</td>
                    </tr>
                    <tr style="border-bottom: 2px solid #ddd !important;padding:5px 0px;">
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">Description: </td>
                    <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">`+value.Description+`</td>
                    </tr><tr><td colspan="2">&nbsp;</td></tr>`;
                });
                html+='</table>';
                $('#AMCDetailsDisplay').html(html);
            }
        });
    }
    
    
    //     //Display Company Product On the Basis Serial No And CompanyName
    // function selectCountry(val_CompanyId,val_CompanyName,Action) {
    //     // $("#search-box").val(val_CompanyName);
    //     // $("#search-box-copy").val(val_CompanyId);
    //     // $("#suggesstion-box").hide();
    //     let html =``;
    //     let SerialNo_CompanyName_EmailId_All_In_One = $("#search-box-copy").val();
    //     var formData = {
    //         'SerialNo_CompanyName_EmailId_All_In_One': SerialNo_CompanyName_EmailId_All_In_One,
    //         'action'  : Action,
    //         };
    //     $.ajax({
    //         type: 'POST',
    //         url: 'action/SelectAmcs.php',
    //         data: formData,
    //         success: function (data) {
    //             let TicketData = JSON.parse(data);
    //             html+=`<table style="background-color:transparent; width:99%;">`;
    //             $.each(TicketData,function(index,value){
    //                 let Today=new Date();
    //                 let curr_day   = Today.getDate();
    //                 let curr_month = Today.getMonth()+1;
    //                 let curr_year  = Today.getFullYear();
    //                 let Curr_Date  = curr_year+'-'+"0"+curr_month+'-'+"0"+curr_day;
    //                 let BGColor,radio,Status;
    //                 if(Curr_Date<=value.AMCExpiresOn){
    //                     BGColor='#4CAF50;'
    //                     radio=`<input type="radio" name="radio" class="SerialSelcetor" data-InsertId="`+value.AMCInsertId+`" required/>
    //                             <input type="hidden" name="CompanySelcetor" class="CompanySelcetor" data-InsertId="`+value.CompanyInsertId+`" required/>`;
    //                     Status='Active';
    //                 }else{
    //                     BGColor='#da322d';
    //                     radio=`<input type="radio" name="radio" class="SerialSelcetor Expired" data-InsertId="`+value.AMCInsertId+`" required/>
    //                             <input type="hidden" name="CompanySelcetor" class="CompanySelcetor Expired" data-InsertId="`+value.CompanyInsertId+`" required/>`;
    //                     Status='Expired';
    //                 }
    //                 html+=`
    //                 <tr>
    //                 <td colspan="2" style="background-color:`+BGColor+`; color:white;padding:5px 5px; font-weight:bold; text-align:left;">`+radio+`
    //                   &nbsp;`+(index+1)+`.`+value.Product_Name+` <sup>`+Status+`</sup> </td>
    //                 </tr>
    //                 <tr style="border-bottom: 2px solid #ddd !important;padding:5px 0px;padding-left:5px;">
    //                 <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">Company Name: </td>
    //                 <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;"><b>`+value.CompanyName+`</b></td>
    //                 </tr>
    //                 <tr style="border-bottom: 2px solid #ddd !important;padding:5px 0px;padding-left:5px;">
    //                 <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">Serial No: </td>
    //                 <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;"><b>`+value.Serial_No+`</b></td>
    //                 </tr>
    //                 <tr style="border-bottom: 2px solid #ddd !important;padding:5px 10px;padding-left:5px;">
    //                 <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">AMC Invoice No.: </td>
    //                 <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">`+value.InvoiceNo+`</td>
    //                 </tr>
    //                 <tr style="border-bottom: 2px solid #ddd !important;padding:5px 10px;padding-left:5px;">
    //                 <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">AMC Valid From: </td>
    //                 <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">`+value.AMCFromDate+`</td>
    //                 </tr>
    //                 <tr style="border-bottom: 2px solid #ddd !important;padding:5px 0px;">
    //                 <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">AMC Expires on.: </td>
    //                 <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;font-weight:800;">`+value.AMCExpiresOn+`</td>
    //                 </tr>
    //                 <tr style="border-bottom: 2px solid #ddd !important;padding:5px 0px;">
    //                 <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">Description: </td>
    //                 <td style="border: 1px solid #ddd;text-align:left !important;padding:5px 10px;">`+value.Description+`</td>
    //                 </tr><tr><td colspan="2">&nbsp;</td></tr>`;
    //             });
    //             html+='</table>';
    //             $('#AMCDetailsDisplay').html(html);
    //         }
    //     });
    // }

    DisplayTicketData();
    
    // Display Data In Table
    function DisplayTicketData(){
        let htmlTicket = ``;
        $.ajax({
            type: 'POST',
            url: 'action/SelectTicket.php',
            data: {action:'Display_Ticket_Data'},
            success: function (data) {
                let ActualTicketData = JSON.parse(data);
                $.each(ActualTicketData,function(index,value){
                    var Fromdate      = new Date(value.ComplaintRegisteredOn);
                    var ComplaintDate = Fromdate.toString('dd-MM-yyyy'); 
                    var ClosedOn      = new Date(value.ComplatinClosedOn);
                    var Closed_Dates  = ClosedOn.toString('dd-MM-yyyy'); 
                    var Closed_Date   = ClosedOn.toString('dd-MM-yyyy'); 
                    if(Closed_Date == "01-01-1970"){
                        Closed_Dates = "";
                        var d        = new Date();
                        var month    = d.getMonth()+1;
                        var day      = d.getDate();
                        Closed_Date  = d.getFullYear() + '-' +
                        ((''+month).length<2 ? '0' : '') + month + '-' +
                        ((''+day).length<2 ? '0' : '') + day;
                    }else{
                        var ClosedOns   = new Date(value.ComplatinClosedOn);
                            Closed_Date = ClosedOns.toString('yyyy-MM-dd');
                    }
                    var days = daysdifference(value.ComplaintRegisteredOn,Closed_Date);
                    function daysdifference(FirstDate, secondDate){
                        var startDay      = new Date(FirstDate);
                        var endDay        = new Date(secondDate);
                        var millisBetween = startDay.getTime() - endDay.getTime();
                        var days          = millisBetween / (1000 * 3600 * 24);
                        return Math.round(Math.abs(days));
                    }
                        
                    if(value.ComplaintStatus == "Open"){
                        ComplaintStatus = '<span   style="color:green;font-weight:bold;padding:6px;">'+value.ComplaintStatus+'</span>';
                    }
                    if(value.ComplaintStatus == "Hold"){
                        ComplaintStatus = '<span style="color:blue;font-weight:bold;">'+value.ComplaintStatus+'</span>';
                    }
                    if(value.ComplaintStatus == "Closed"){
                        ComplaintStatus = '<span  style="color:red;font-weight:bold;">'+value.ComplaintStatus+'</span>';
                    }
                    htmlTicket+=`<tr id="row_`+value.TicketInsertId+`">
                    <td id="IDTicketNo" class="clsTicketNo"><a href="TicketTransfer_Report.php?action=Transfer_Report">`+value.TicketNo+`</a></td>
                    <td style="width:7%;text-align: center;">`+ComplaintDate+`</td>
                    <td style="width:7%;text-align: center;">`+Closed_Dates+`</td>
                    <td style="width:4%;text-align: center;">`+days+`</td>
                    <td style="width:20%;">`+value.CompanyName+`</td>
                    <td>`+value.ContactName+`</td>
                     <td id="IDComplaint" style="width:15%;">`+value.ComplaintDetails+`</td>
                    <td id="IDAssignedTo">`+value.AssignedTo+`</td>
                    <td id="IDStatus" style="width:5%;">`+ComplaintStatus+`</td>
                    <td style="width:4%;padding-left: 40px !important;">
                    <div class="btn-group" style="display: block !important;">
                    <i class="fa fa-mail-forward" dropdown-toggle" data-toggle="dropdown"></i>
                      <div class="dropdown-menu">
                        <a class="dropdown-item clsTransferTicket" href="#" data-formindex="`+ (value.TicketInsertId) + `" data-toggle="modal" data-target="#TicketTransferModal">Ticket Transfer</a>
                        <a class="dropdown-item clsStatusTicket" href="#" data-formindex="`+ (value.TicketInsertId) + `" data-toggle="modal" data-target="#TicketStatusModal">Update Status</a>
                        <a class="dropdown-item clsAddNoteTicket"   data-formindex="`+ (value.TicketInsertId) + `" data-toggle="modal" data-target="#TicketAddNoteModal" href="#">Add Notes</a>
                    </div>  
                    </td>
                    </tr>`;
                });
                $('#OpenTicketList').html(htmlTicket);
            }
        });
    }



    $('#IDTickets').change(function(){
        let htmlTicket = ``;
        let TicketData = {
            'TicketStatus' :  $(this).val(),
            'action'       : 'Display_Ticket_On_Status_Base'
        }
        $.ajax({
            type: 'POST',
            url: 'action/SelectTicket.php',
            data: TicketData,
            success: function (data) {
               let ActualTicketData = JSON.parse(data);
                $.each(ActualTicketData,function(index,value){
                    var Fromdate      = new Date(value.ComplaintRegisteredOn);
                    var ComplaintDate = Fromdate.toString('dd-MM-yyyy'); 
                    var ClosedOn      = new Date(value.ComplatinClosedOn);
                    var Closed_Dates  = ClosedOn.toString('dd-MM-yyyy'); 
                    var Closed_Date   = ClosedOn.toString('dd-MM-yyyy'); 
                    
                    if(Closed_Date == "01-01-1970"){
                            Closed_Dates  = "";
                            var d         = new Date();
                            var month     = d.getMonth()+1;
                            var day       = d.getDate();
                            Closed_Date   = d.getFullYear() + '-' +
                            ((''+month).length<2 ? '0' : '') + month + '-' +
                            ((''+day).length<2 ? '0' : '') + day;
                     }else{
                            var ClosedOns = new Date(value.ComplatinClosedOn);
                            Closed_Date = ClosedOns.toString('yyyy-MM-dd');
                     }
                    var days = daysdifference(value.ComplaintRegisteredOn,Closed_Date);
                    function daysdifference(FirstDate, secondDate){
                        var startDay = new Date(FirstDate);
                        var endDay   = new Date(secondDate);
                       
                        var millisBetween = startDay.getTime() - endDay.getTime();
                        var days          = millisBetween / (1000 * 3600 * 24);
                        return Math.round(Math.abs(days));
                    }
        
                    if(value.ComplaintStatus == "Open"){
                        ComplaintStatus = '<span   style="color:green;font-weight:bold;padding:6px;">'+value.ComplaintStatus+'</span>';
                    }
                    if(value.ComplaintStatus == "Hold"){
                        ComplaintStatus = '<span style="color:blue;font-weight:bold;">'+value.ComplaintStatus+'</span>';
                    }
                    if(value.ComplaintStatus == "Closed"){
                        ComplaintStatus = '<span  style="color:red;font-weight:bold;">'+value.ComplaintStatus+'</span>';
                    }
                    htmlTicket+=`<tr id="row_`+value.TicketInsertId+`">
                    <td id="IDTicketNo" class="clsTicketNo"><a href="TicketTransfer_Report.php?action=Transfer_Report">`+value.TicketNo+`</a></td>
                    <td style="width:7%;text-align: center;">`+ComplaintDate+`</td>
                    <td style="width:7%;text-align: center;">`+Closed_Dates+`</td>
                    <td style="width:4%;text-align: center;">`+days+`</td>
                    <td style="width:20%;">`+value.CompanyName+`</td>
                    <td>`+value.ContactName+`</td>
                     <td id="IDComplaint" style="width:15%;">`+value.ComplaintDetails+`</td>
                    <td id="IDAssignedTo">`+value.AssignedTo+`</td>
                    <td id="IDStatus" style="width:5%;">`+ComplaintStatus+`</td>
                    <td style="width:5%;padding-left: 40px !important;">
                    <div class="btn-group" style="display: block !important;">
                    <i class="fa fa-mail-forward" dropdown-toggle" data-toggle="dropdown"></i>
                      <div class="dropdown-menu">
                        <a class="dropdown-item clsTransferTicket" href="#" data-formindex="`+ (value.TicketInsertId) + `" data-toggle="modal" data-target="#TicketTransferModal">Ticket Transfer</a>
                        <a class="dropdown-item clsStatusTicket" href="#" data-formindex="`+ (value.TicketInsertId) + `" data-toggle="modal" data-target="#TicketStatusModal">Update Status</a>
                        <a class="dropdown-item clsAddNoteTicket"   data-formindex="`+ (value.TicketInsertId) + `" data-toggle="modal" data-target="#TicketAddNoteModal" href="#">Add Notes</a>
                    </div>  
                    </td>
                      
                    </tr>`;
                });
                $('#OpenTicketList').html(htmlTicket); 
            }
        });
    });


    //Contact Person Details
    $(document).on('click','.SerialSelcetor',function(){
      let Contacthtml =``;
      var  ContactData = {
            'CompanyInsertId' :  $('.CompanySelcetor').attr('data-InsertId'),
            'action'          : 'Display_Contact_data_In_Ticket'
      }
      $.ajax({
          type: 'POST',
          url: 'action/SelectContact.php',
          data: ContactData,
          success: function (data) {
            let TicketContactData = JSON.parse(data);
            $.each(TicketContactData,function(index,value){ 
              Contacthtml +=`<option value="`+value.ContactInsertId+`">`+value.ContactName+`</option>`;
            });   
            $('#RegisterBy').html(Contacthtml);
          }
      });
    });
    
    user();
    function user(){
      $.ajax({
        type: 'POST',
        url: 'action/actionSelectUsers.php',
        data: {action:'All_User_Data'},
        success: function (data) {
            $('.clsUserDetails').html(data);
        }
      });
    }
    
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
    localStorage.removeItem("SerialNo");
    localStorage.removeItem("Product");
    localStorage.removeItem("Emailid");
    localStorage.removeItem("Remark");
    localStorage.removeItem("ENQRYProduct");
    localStorage.getItem("EnquiryNo");
    
    $('#SerialNo').select2();
    $('#Company').select2();

</script>