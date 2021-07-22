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
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Contact Name<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="ContactName" id="ContactName" placeholder="" required="required" /><span id="MSG_ContactName"></span>
                                    </div>
                                </div>                                                           
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Mobile Number:1<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="tel" class='tel' name="MobileNumber" id="MobileNumber" required='required' maxlength="10" /><span id="MSG_MobileNumber"></span></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Mobile Number:2</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="tel" class='tel' name="WhatsApp" id="WhatsApp" required='required' maxlength="10"  /></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email Id</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="Email_Id" id="Email_Id" class='email' required="required" type="email" /><span id="MSG_Email"></span>
                                    </div>
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
                                        <option value="Admin">Admin</option>                                    
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
                                  <th>Companies</th>
                                  <th>Action</th>
                                </thead>
                                <tbody id="IdComapiesDetails">

                                </tbody>
                                </table>
                               </center>
                               <div id="HiddenFormField"></div>

                                <!-- <div class="field item form-group">
                                 <label class="col-form-label col-md-3 col-sm-3  label-align">Companies<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6">                                                            
                                      <select id="framework" name="framework[]" id="framework" multiple class="form-control clsData" >
                               
                                      </select>                                     
                                  </div> -->

                                  <!-- <div class="control-group row">
                                  <label class="control-label col-md-3 col-sm-3 ">Input Tags</label> -->
                                  <!-- <div class="col-md-6 col-sm-6 ">
                                    <input id="tags_1" type="text" class="tags form-control" value="social, adverts, sales" />
                                    <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                                  </div>
                                </div> -->
                                 <!-- <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Companies<span class="required">*</span></label>
                                 <div class="col-md-6 col-sm-6"> 
                                    <input type="text" name="country" id="autocomplete-custom-append" class="form-control col-md-10" />
                                  </div>
                                </div> -->

                                </div>                               
                                <!-- <div class="ln_solid"> -->
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-success">Submit</button>
                                            <button type='reset' class="btn btn-success">Reset</button>
                                            <a href="ViewContacts.php?action=View"><button type='button' class="btn btn-success" id="IDBtn">View Contacts</button></a>
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
                    <h2>Contacts Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="CreateContacts.php?action=Create">Create Contacts</a>
                            <a class="dropdown-item" href="ViewContacts.php?action=View">List Contacts</a>
                        </div>
                      </li>               
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Contact Name</th>
                          <th>Mobile No</th>
                          <th>WhatsApp No</th>
                          <th>Designation</th>
                          <th>Action</th>                         
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
   let htmls = '';
   let hiddenField = '';
   let SNo = 1;
   let CompaniesIds = [];

   // Move Cursor to First Input Field
   $("#ContactName").focus();

    $(document).on('keyup','#Email_Id',function(){
        var text=$(this).val();
        text=text.toLowerCase();
        $(this).val(text);
    });

    $(document).on('keyup','#ContactName,#MobileNumber,#Designation',function(){
      let ContactName = $('#ContactName').val();
      let MobileNumber = $('#MobileNumber').val();
      let Designation = $('#Designation').val();
      if(ContactName != ""){
        $('#MSG_ContactName').empty();
      }
      if(MobileNumber != ""){
        $('#MSG_MobileNumber').empty();
      }
      if(Designation != ""){
        $('#MSG_Designation').empty();
      }
    });
//    $("#IdComapiesDetails").on("click", "tr", function(){
//     var words = [];
//     $("td", this).text(function(i,v){
//         words.push( v );
//     });
//     $("#txtread").val( words.join(" ") );
// });
  // var CompaniesIds = new Array();
  // $(document).ready(function(){
  //   $('#framework').multiselect({
  //     nonSelectedText: 'Select Framework',
  //     enableFiltering: true,
  //     enableCaseInsensitiveFiltering: true,
  //     buttonWidth:'400px'
  //   });
  // });
  $('#BtnADD').click(function(){
    let companyids = $('#framework').val();
    let Companyid = $('#framework').val().replace(/,/g , '');
    let ids = "#row"+Companyid;
    let Companies = $(ids).val();
    $('#IdComapiesDetails').append('<tr><td class="clsCompanies" style="Display:none;">'+companyids+'</td><td>'+Companies+'</td><td><button class="btn btn-success delete" style="height: 22px !important;padding: 3px;font-size: 12px;width: 22px;"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>');
  });

$(document).on('click','.delete',function(){
  $(this).closest('tr').remove();
  // window.location.reload();
});


$('#CreateContactForm').submit(function (e) {
    e.preventDefault();
    if($('#ContactName').val() != "" && $('#MobileNumber').val() != "" && $('#Designation').val() != ""){
    var str = $('.clsCompanies').text();
    CompaniesIds = str.split(',');
    var url = $('#CreateContactForm').attr('action');
    var formData = {
        'CompanyInsertids': CompaniesIds,
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
              $('#IdComapiesDetails').remove();
              window.location.reload();
        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        },
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


// $('#IDBtn').click(function(event){
// let ViewTableData =  $('#IDView').val();
//   if(ViewTableData =="View"){
  //Display Contact Details In Table
  // $.ajax({
  //     type: 'POST',
  //     url: 'action/SelectContact.php',
  //     data: {action:'Display_Contact_Data'},
  //     success: function (data) {
  //       let ContactData = JSON.parse(data);
  //       $.each(ContactData, function(i,val) {
  //         html+=`<tr id="row_` + val.ContactInsertId + `">
  //             <td>`+SNo+`</td>
  //             <td>`+val.ContactName+`</td>
  //             <td>`+val.MobileNumber+`</td>
  //             <td>`+val.WhatsApp+`</td>                           
  //             <td>`+val.Designation+`</td>
  //             <td id="IDAction"><button class="btn btn-success delete" style="height: 22px !important;
  //             padding: 3px;font-size: 12px;width: 22px;" data-formindex="`+ (val.ContactInsertId) + `"><i class="fa fa-trash" aria-hidden="true"></i></button>
  //             <button class="btn btn-success edit" style="height: 22px !important;
  //             padding: 3px;font-size: 12px;width: 22px;" data-formindex="`+ (val.ContactInsertId) + `"><i class="fa fa-edit" aria-hidden="true"></i></button>
  //             </td>
  //             </tr>`;
  //             SNo = SNo +1;
  //             $('#idContactDetails').html(html);
  //       });
  //     }
  // });

//   }
// });



  $.ajax({
    type: 'POST',
    url: 'action/SelectCompany.php',
    data: {action:'Display_Company_Data'},
    success: function (data) {
      let CompanyData = JSON.parse(data);
      html+=`<option value="Select Companies">Select Companies </option>`;
      $.each(CompanyData, function(i,val) {
        //val.CompanyInsertId
         hiddenField +=`<input type="hidden" name="row`+val.CompanyInsertId+`" id="row`+val.CompanyInsertId+`" value="`+val.CompanyName+`">`;
         html+=`<option value="`+val.CompanyInsertId+`,">`+val.CompanyName +` </option>`;
         // htmlCompanyIDs+=`<input type="hidden" name="ID`+val.CompanyInsertId+`" id="" >`;
      });
      $('#framework').html(html);
      $('#HiddenFormField').html(hiddenField);
    }
  });




// $.get("action/CreateContact.php", function(data, status){
//   let Contact_Data = JSON.parse(data);
//     $.each(Contact_Data, function(i,val) {
//         html+=`<tr>
//             <td>`+SNo+`</td>
//             <td>`+val.ContactName+`</td>
//             <td>`+val.MobileNumber+`</td>
//             <td>`+val.WhatsApp+`</td>                           
//             <td>`+val.Designation+`</td>
//             <td id="IDAction"><button class="btn btn-success delete" style="height: 22px !important;
//             padding: 3px;font-size: 12px;width: 22px;" data-formindex="`+ (val.ContactInsertId) + `"><i class="fa fa-trash" aria-hidden="true"></i></button>
//             <button class="btn btn-success edit" style="height: 22px !important;
//             padding: 3px;font-size: 12px;width: 22px;" data-formindex="`+ (val.ContactInsertId) + `"><i class="fa fa-edit" aria-hidden="true"></i></button>
//             </td></tr>`;
//             SNo = SNo +1;
//             $('#idContactDetails').html(html);
//     });
// });


// $.get("action/CreateCompany.php",function(data,status){
//   let ActualData = JSON.parse(data);
//   $.each(ActualData, function(i,val) {
//         htmls+=`<option value="`+val.CompanyName+`">`+val.CompanyName +` </option>`;
//   });
//   $('.clsData').html(htmls);
// });

//  $('#CreateContactForm').on('submit', function(event){
//   event.preventDefault();
//   var form_data = $(this).serialize();
//   $.ajax({
//    url:"insert.php",
//    method:"POST",
//    data:form_data,
//    success:function(data)
//    {
//     $('#framework option:selected').each(function(){
//      $(this).prop('selected', false);
//     });
//     $('#framework').multiselect('refresh');
//     alert(data);
//    }
//   });
//  });


</script>
