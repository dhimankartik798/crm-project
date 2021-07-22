<?php
//Header Section
include 'header/header.php';
if(!empty($_GET['action'])){
      $Action = $_GET['action'];
}else{
    $Action = "Create"; 
} 
?>
 <!-- page content -->
 <?php if($Action  == "Create"){ ?>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><small>New Contacts</small></h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form name="CreateContactForm" autocomplete="off" id="CreateContactForm" action="action/CreateContact.php" method="post" novalidate>                        
                               <input type="hidden" value="View" id="IDView" name="View">
                                <span class="section">Contact Info</span>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Customer Name<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="ContactName" id="ContactName" placeholder="" required="required" />
                                    </div>
                                </div>                               
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Mobile Number<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="tel" class='tel' name="MobileNumber" id="MobileNumber" required='required' data-validate-length-range="8,20" /></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">WhatsApp<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="tel" class='tel' name="WhatsApp" id="WhatsApp" required='required' data-validate-length-range="8,20" /></div>
                                </div>
                                 <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Designation<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="Designation" id="Designation" placeholder="" required="required" />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Companies<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6">                                                            
                                      <!--<select id="framework" name="framework[]" id="framework" multiple class="form-control clsData" >-->
                               
                                      <!--</select>                                     -->
                                  </div>
                                </div>                               
                                <!-- <div class="ln_solid"> -->
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-success">Submit</button>
                                            <button type='reset' class="btn btn-success">Reset</button>
                                            <a href="CreateContacts.php?action=View"><button type='button' class="btn btn-success" id="IDBtn">View Contacts</button></a>
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
            <!-- <div class="page-title">
              <div class="title_left">
                <h3><small>Contacts List</small></h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- <div class="clearfix"></div> -->
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Contacts Report</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <!--<li>-->
                      <!--    <select class="form-control">-->
                      <!--      <option>Sort</option>-->
                      <!--      <option>10</option>-->
                      <!--      <option>25</option>-->
                      <!--      <option>50</option>-->
                      <!--      <option>100</option>-->
                      <!--    </select>-->
                      <!--</li>&nbsp;&nbsp;                    -->
                      <!--<li>-->
                      <!--  <button type="button" class="btn btn-success NoPrint" id="Print"><i class="fa fa-print"></i> Print</button>-->
                      <!--</li>&nbsp;&nbsp;-->
                      <li>
                        <input type="text" name="myInput" id="myInput"class="form-control" placeholder="Search Contact.." >
                      </li>&nbsp;&nbsp;  
                      <li>
                        <div class="btn-group">
                          <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            View Reports
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="CreateCompanies.php?action=View">View Companies</a>
                            <a class="dropdown-item" href="ViewContacts.php?action=View">View Contacts</a>
                            <a class="dropdown-item" href="CreateTickets.php?action=View">View Ticket</a>
                            <!--<div class="dropdown-divider"></div>-->
                            <!--<a class="dropdown-item" href="#">Separated link</a>-->
                          </div>
                        </div>
                      </li>           
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="table-responsive">
                    <!--id="SrchTable"-->
                    <table id="SrchTable" class="table table-striped jambo_table bulk_action css-serial" style="width:100%">
                      <thead>
                        <tr>
                          <th style="width:5%;">S.no</th>
                          <th style="width:15%;">Contact</th>
                          <th style="width:25%;">Company</th>
                          <th style="width:25%;">Email Id</th>
                          <th style="width:8%;">Mob No 1</th>
                          <th style="width:8%;">Mob No 2</th>
                          <th style="width:10%;">Designation</th>
                          <th style="width:5%;">Action</th>                         
                        </tr>
                      </thead>
                      <tbody id="idContactDetails">

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
          <h4 class="modal-title">Alter Contact </h4>  
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          
                      <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_content">
                        <form name="UpdateConatctForm" autocomplete="off" id="UpdateConatctForm" action="action/CreateContact.php" method="post" novalidate>                        
                              <input type="hidden" name="ContactInsertId" id="ContactInsertId" value="">
                                <!--<span class="section">Contact Info</span>-->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Contact Name<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="ContactName" id="ContactName" placeholder="" required="required" /><span id="MSG_ContactName"></span>
                                    </div>
                                </div> 
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email Id</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="Email_Id" id="Email_Id" class='email' required="required" type="email" /><span id="MSG_Email"></span>
                                    </div>
                                </div>                              
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Mobile Number<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="tel" class='tel' name="MobileNumber" id="MobileNumber" required='required' data-validate-length-range="8,20" /><span id="MSG_MobileNumber"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">WhatsApp<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="tel" class='tel' name="WhatsApp" id="WhatsApp" required='required' data-validate-length-range="8,20" /></div>
                                </div>
                                 <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Designation<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <!-- <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="Designation" id="Designation" placeholder="" required="required" /> -->
                                        <select id="Designation" name="Designation" class="form-control">
                                          <option value="">---Select Designation---</option>
                                          <option value="Accountant">Accountant</option>
                                          <option value="Director">Director</option>
                                          <option value="Partner">Partner</option>
                                          <option value="Owner">Owner</option>
                                          <option value="Employee">Employee</option>
                                    	</select><span id="MSG_Designation"></span>
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Companies<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                    	<select id="framework" name="framework[]" class="form-control">
                                    	
                                    	</select>
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                    <button type='button' id="BtnADD" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                <center>
                                <table  class="table table-bordered" style="width:50%">
                                <thead>
                                  <th style="width:20%;">Companies</th>
                                  <th style="width:4%;">Act</th>
                                </thead>
                                <tbody id="IdComapiesDetails">

                                </tbody>
                                </table>
                               </center>
                               <div id="HiddenFormField"></div>


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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
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
   let html = '';
   let SNo = 1;
   let htmls = '';
   let hiddenField = '';
  //  let CompaniesIds = [];
  //  let Company_names = [];
  //  let Compny_Name_Data = ``;

// Set Multiple Companies Name In Table
   $('#BtnADD').click(function(){
    let companyids = $('#framework').val();
    let Companyid = $('#framework').val().replace(/,/g , '');
    let ids = "#row"+Companyid;
    let Companies = $(ids).val();
    $('#IdComapiesDetails').append('<tr><td class="clsCompanies" style="Display:none;">'+companyids+'</td><td style="width:20%;">'+Companies+'</td><td style="width:4%;text-align:right;"><button class="btn btn-success  clsDelete" style="height: 22px !important;padding: 3px;font-size: 12px;width: 22px;"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>');
  });



$('#CreateContactForm').submit(function (e) {
    e.preventDefault();
    var url = $('#CreateContactForm').attr('action');
    var formData = {
        'CompanyInsertids': $('#framework').val(),
        'ContactName'     : $('#ContactName').val(),
        'Email_Id'        : $('#Email_Id').val(),
        'MobileNumber'    : $('#MobileNumber').val(),
        'WhatsApp'        : $('#WhatsApp').val(),
        'Designation'     : $('#Designation').val(),
        'action'          : "Insert_Contact_Data",
    };
    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        success: function (data) {
            alert(data);            
              $('#CreateContactForm')[0].reset();
        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        },
    });
});

// Update Conatct Details In Database
$('#UpdateConatctForm').submit(function (e) {
    e.preventDefault();
    //var url = $('#UpdateCompanyForm').attr('action');
    if($('#ContactName').val() != "" && $('#MobileNumber').val() != "" && $('#Designation').val() != ""){
        var str = $('.clsCompanies').text();
            if(str == ""){
              str = "317,";
            }
        CompaniesIds = str.split(',');
        var AlterContactFormData = {
            'CompanyInsertids': CompaniesIds,
            'ContactInsertId' : $('#ContactInsertId').val(),
            'ContactName'     : $('#ContactName').val(),
            'Email_Id'        : $('#Email_Id').val(),
            'MobileNumber'    : $('#MobileNumber').val(),
            'WhatsApp'        : $('#WhatsApp').val(),
            'Designation'     : $('#Designation').val(),
            'action'          : "Update_Contact_Data",
        };
        $.ajax({
          url: 'action/CreateContact.php',
          type: 'POST',
          data: AlterContactFormData,
          // cache: true,
          success: function(data){
              alert(data);
              $('#UpdateConatctForm')[0].reset();
               $(".modal").modal('hide');
              // $("#myModal").dialog("close");
              Load_Data();
              //window.location.reload();
          }
        });

    }else{
        if($('#ContactName').val() == ""){
          $('#MSG_ContactName').text("Contact Name Is Mandatory..").css("color", "red");
        }

        if($('#MobileNumber').val() == ""){
          $('#MSG_MobileNumber').text("Mobile Number Is Mandatory..").css("color", "red");
        }

        if($('#Designation').val() == ""){
          $('#MSG_Designation').text("Designation Field Is Mandatory..").css("color", "red");
        } 
    }
});


// Delete Companies Data
$(document).on('click','.delete',function () {
    var confirmalert = confirm("Do you really want to Delete?");
   if (confirmalert == true) {
      let Contact_Id = $(this).attr('data-formindex');
      var url = 'action/DeleteContact.php';
      var formData = {
          'Contact_Id'    : Contact_Id,
          'Delete_action' : "Delete_Contact_Data",
      };
      $.ajax({
        url: 'action/DeleteContact.php',
        type: 'POST',
        data: formData,
        success: function(response){
            alert(response);
            Load_Data();
            //$('#idContactDetails').load('ViewContacts.php');
             // window.location = "ViewContacts.php?action=View";
        }
      });
   }
});
// Delete Companies Data End

Load_Data();
//Display Contact Details In Table
function Load_Data(){
$.ajax({
    type: 'POST',
    url: 'action/SelectContact.php',
    data: {action:'Display_Contact_And_Company_Data'},
    success: function (data) {
       // let ContactData = JSON.parse(data);
        // $.each(ContactData, function(i,val) {
        //     if(val.CompaniesNames == "Others"){
        //         val.CompaniesNames = "";
        //     }
        //     html+=`<tr id="row_` + val.ContactInsertId + `">
        //         <td>`+SNo+`</td>
        //         <td id="IDContactName">`+val.ContactName+`</td>
        //         <td id="IDComapanyInsertids" style="display:none;">`+val.CompanyInsertIds +`</td>
        //         <td id="IDComapnies">`+val.CompaniesNames+`</td>
        //         <td id="IDEmail_Id">`+val.Email_Id+`</td>
        //         <td id="IDMobileNumber">`+val.MobileNumber+`</td>
        //         <td id="IDWhatsApp">`+val.WhatsApp+`</td>                           
        //         <td id="IDDesignation">`+val.Designation+`</td>
        //         <td id="IDAction"><button class="btn btn-success delete" style="height: 22px !important;
        //         padding: 3px;font-size: 12px;width: 22px;" data-formindex="`+ (val.ContactInsertId) + `"><i class="fa fa-trash" aria-hidden="true"></i></button>
        //         <button class="btn btn-success edit" data-toggle="modal" data-target="#myModal" style="height: 22px !important;
        //         padding: 3px;font-size: 12px;width: 22px;" data-formindex="`+ (val.ContactInsertId) + `"><i class="fa fa-edit" aria-hidden="true"></i></button>
        //         </td>
        //         </tr>`;
        //         SNo = SNo +1;
                $('#idContactDetails').html(data);
                //$('#datatable').DataTable();
        //});
    }
});
}

//Companies Details
$.ajax({
    type: 'POST',
    url: 'action/SelectCompany.php',
    data: {action:'Display_Company_Data_Alter'},
    success: function (data) {
      let CompanyData = JSON.parse(data);
      htmls+=`<option value="Select Companies">Select Companies </option>`;
      $.each(CompanyData, function(i,val) {
        //val.CompanyInsertId
         hiddenField +=`<input type="hidden" name="row`+val.CompanyInsertId+`" id="row`+val.CompanyInsertId+`" value="`+val.CompanyName+`">`;
         htmls+=`<option value="`+val.CompanyInsertId+`,">`+val.CompanyName +` </option>`;
         // htmlCompanyIDs+=`<input type="hidden" name="ID`+val.CompanyInsertId+`" id="" >`;
      });
      $('#framework').html(htmls);
      $('#HiddenFormField').html(hiddenField);
    }
});

//Edit Companies Data
$(document).on('click','.edit',function () {
      let CompaniesIds      = [];
      let Company_names     = [];
      let Compny_Name_Data  = ``;
      let Contact_Id        = $(this).attr('data-formindex');
      let ContactName       = $(this).closest('tr').find('#IDContactName').text();
      let Email_Id          = $(this).closest('tr').find('#IDEmail_Id').html();
      let MobileNumber      = $(this).closest('tr').find('#IDMobileNumber').html();
      let WhatsApp          = $(this).closest('tr').find('#IDWhatsApp').html();
      let Designation       = $(this).closest('tr').find('#IDDesignation').html();
      let ComapanyInsertid = $(this).closest('tr').find('#IDComapanyInsertids').html();
      let Companies         = $(this).closest('tr').find('#IDComapnies').html();
      //CompaniesIds
      ComapanyInsertids = ComapanyInsertid.split(',');
      Company_names = Companies.split(',');
        $(Company_names).each(function(i,val){
          Compny_Name_Data += `<tr><td class="clsCompanies" style="Display:none;">`+ComapanyInsertids[i]+`,</td><td style="width:20%;">`+val+`</td><td style="width:4%;text-align:right"><button class="btn btn-success  clsDelete" style="height: 22px !important;padding: 3px;font-size: 12px;width: 22px;"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>`;
          // $('#IdComapiesDetails').html('<tr><td>'+val+'</td><td><button class="btn btn-success delete" style="height: 22px !important;padding: 3px;font-size: 12px;width: 22px;"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>');
        });
      $('#IdComapiesDetails').html(Compny_Name_Data);
      $(document).find('#ContactName').val(ContactName);
      $(document).find('#Email_Id').val(Email_Id);
      $(document).find('#MobileNumber').val(MobileNumber);
      $(document).find('#WhatsApp').val(WhatsApp);
      $(document).find('#Designation').val(Designation);
      $(document).find('#ContactInsertId').val(Contact_Id);
});

// $('.close').click(function(){
//   window.location.reload();
// });

$(document).on('click','.clsDelete',function(){
  $(this).closest('tr').remove();
  // window.location.reload();
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

</script>



