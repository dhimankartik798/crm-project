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
            <!-- <div class="page-title">
                <div class="title_left">
                    <h3><small>New Ticket</small></h3>
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
            </div> -->
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
	                    <div class="x_title">
		                    <h2>Products_Amcs</h2>
		                    <ul class="nav navbar-right panel_toolbox">
		                      <li class="dropdown">
		                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i><b> &nbsp;Create/View/Edit</b></a>
		                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		                            <a class="dropdown-item" href="CreateProduct_Amcs.php?action=Create">Create Amc's</a>
		                            <!--<a class="dropdown-item" href="CreateProduct_Amcs.php?action=View">Report Amc's</a>-->
		                        </div>
		                      </li>
		                      <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		                      </li>
		                      
		                      <li><a class="close-link"><i class="fa fa-close"></i></a>
		                      </li> -->
		                    </ul>
		                    <div class="clearfix"></div>
		                  </div>

                        <div class="x_content">
                            <form class=""  method="post" autocomplete="off" name="CreateProductAmcsForm" id="CreateProductAmcsForm" action="action/CreateAmcs.php" novalidate> 
                               <input type="hidden" name="Prodct_Compny_Id" id="Prodct_Compny_Id">                                    
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Serial No<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="SerialNo" id="SerialNo" placeholder="" required="required" />
                                    </div>
                                </div>                        
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Companies<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="Companies" id="Companies" placeholder="" required="required" readonly />
                                    </div>
                                </div>
                                 <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Products<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                       <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="Products" id="Products" placeholder="" required="required" readonly />
                                    </div>
                                </div>                                                                        
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email Id<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="Email" id="Email" placeholder="" required="required" readonly />
                                    </div>
                                </div>


                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">AMC From<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='date' type="date" name="AMCFromDate" id="AMCFromDate" required='required'></div>
                                </div>     
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">AMC To<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='date' type="date" name="AMCExpiresOn" id="AMCExpiresOn" required='required'></div>
                                </div>  
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Invoice No<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="InvoiceNo" id="InvoiceNo" placeholder="" required="required" />
                                    </div>
                                </div>  
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Invoice Date<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='date' type="date" name="InvoiceDate" id="InvoiceDate" required='required'></div>
                                </div>  
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Description <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea required="required" class="form-control"  name='Description' id="Description"></textarea></div>
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
<?php
	}
	if($Action =="View"){
?>

	<div class="right_col" role="main">
          <div class="">
<!--    <div class="page-title">
              <div class="title_left">
                <h3><small>Porduct_Amc's Report</small></h3>
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
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Amc's Detail Report</h2>
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
                        <input type="text" name="myInput" id="myInput"class="form-control" placeholder="Search..." >
                      </li>&nbsp;&nbsp;  
                      <li class="dropdown">
                        <!--<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"-->
                        <!--    aria-haspopup="true" aria-expanded="false"><i class="fa fa-edit"></i>-->
                        <!--    Create/View/Edit-->
                        <!--</button>-->
                        <!--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">-->
                        <!--    <a class="dropdown-item" href="Companies_Products.php?action=Create">Create</a>-->
                        <!--    <a class="dropdown-item" href="Companies_Products.php?action=View">AMC's Report</a>-->
                        <!--</div>-->
                      </li>               
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="SrchTable" class="table table-striped jambo_table bulk_action" style="width:100%;">
                                  <thead>
                                    <tr>
                                        <td colspan="2" style="width:10%;">Company Name</td>
                                        <td colspan="8" id="IDCompany" style="text-align:left;width:90%;"></td>
                                    </tr>  
                                    <tr>
                                        <td colspan="2" style="width:10%;">Product</td>
                                        <td colspan="8" id="IDProduct" style="text-align:left;width:90%;"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align:left;">Email Id</td>
                                        <td colspan="8" id="IDEmailid" style="text-align:left;width:90%;"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="width:10%;">Description</td>
                                        <td colspan="8" id="IDDescription" style="text-align:left;width:90%;"></td>
                                    </tr>
                                     <tr> 
                                      <th>Date</th>
                                      <th>Invoice No</th>                          
                                      <!--<th>Companies</th>-->
                                      <!--<th>Products</th>-->
                                      <th>SerialNo</th>
                                      <!--<th>Email Id</th>-->
                                      <th>Amcs From </th>
                                      <th>AmcsTo</th>
                                      <th>Description</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody id="idProductAmcsDetails">
            
                                  </tbody>
                                </table>
                    <center>
                    <button type="button" class="btn btn-success clsBackBtn">Go Back</button>
                    </center>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Create AMC's Edit Div Start Here -->
  <div class="modal fade" id="AMCEDITModal" role="dialog">
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
		                    <h2>Alter_Service_Contract</h2>
		                    <ul class="nav navbar-right panel_toolbox">
		                      <!-- <li class="dropdown">
		                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i></a>
		                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		                            <a class="dropdown-item" href="CreateProduct_Amcs.php?action=Create">Create Amc's</a>
		                            <a class="dropdown-item" href="CreateProduct_Amcs.php?action=View">Report Amc's</a>
		                        </div>
		                      </li> -->
		                      <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		                      </li>
		                      
		                      <li><a class="close-link"><i class="fa fa-close"></i></a>
		                      </li> -->
		                    </ul>
		                    <div class="clearfix"></div>
		                  </div>

                        <div class="x_content">
                            <form class=""  method="post" autocomplete="off" name="AlterProductAmcsForm" id="AlterProductAmcsForm" action="action/CreateAmcs.php" novalidate> 
                               <input type="hidden" name="OldInvoiceNo" id="OldInvoiceNo">                                    
                                <!-- <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Serial No<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="SerialNo" id="SerialNo" placeholder="" required="required" />
                                    </div>
                                </div>                        
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Companies<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="Companies" id="Companies" placeholder="" required="required" readonly />
                                    </div>
                                </div>
                                 <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Products<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                       <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="Products" id="Products" placeholder="" required="required" readonly />
                                    </div>
                                </div>                                                                        
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email Id<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="Email" id="Email" placeholder="" required="required" readonly />
                                    </div>
                                </div> -->


                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">AMC From<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='date' type="date" name="AMCFromDate" id="AMCFromDate" required='required'><span id="MSG_AMCFromDate"></span>
                                    </div>
                                </div>     
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">AMC To<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='date' type="date" name="AMCExpiresOn" id="AMCExpiresOn" required='required'><span id="MSG_AMCExpiresOn"></span></div>
                                </div>  
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Invoice No<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control"  name="InvoiceNo" id="InvoiceNo" autofocus  placeholder=""/><span id="MSG_InvoiceNo"></span>
                                    </div>
                                </div>  
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Invoice Date<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='date' type="date" name="InvoiceDate" id="InvoiceDate" required='required'></div>
                                </div>  
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Description <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea required="required" class="form-control"  name='Description' id="Description"></textarea></div>
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
  <!-- Create AMC's Edit Div End Here -->
  
  
  
  
<?php

	}
?>
<?php
include 'footer/footer.php';
?>
<script type="text/javascript">
  let html = '';
  let htmls = '';
  let htmlData = '';
  let SNo = 1;
// $('#SearchType').change(function(){
//   let SearchType = $(this).val();
//   $('#SData').val(SearchType);

// });

$('#SearchCreteria').change(function(event){
    let Value=$(this).children("option:selected").text();
    $('#CompanyName').prop('placeholder',Value);
});

// Create Company Product AMC'S 
$('#AlterProductAmcsForm').submit(function (e) {
    e.preventDefault();
    if($('#AMCFromDate').val() != "" && $('#AMCExpiresOn').val() != "" && $('#InvoiceNo').val() != "" ){
      var url = $('#AlterProductAmcsForm').attr('action');
      var formData = {        
          'AMCFromDate'        : $('#AMCFromDate').val(),
          'AMCExpiresOn'       : $('#AMCExpiresOn').val(),
          'OldInvoiceNo'       : $('#OldInvoiceNo').val(),
          'InvoiceNo'          : $('#InvoiceNo').val(),
          'InvoiceDate'        : $('#InvoiceDate').val(),
          'Description'        : $('#Description').val(),
          'Prodct_Compny_Id'   : $('#Prodct_Compny_Ids').val(),
          'action'             : "Alter_Product_AMCS_Data",
      };
      $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            //$('#MsgAlert').html(data);
             $(".modal").modal('hide');
             window.location.reload();
            $('#AlterProductAmcsForm')[0].reset();
          }
      });
    }else{
      if($('#AMCFromDate').val() == ""){
          $('#MSG_AMCFromDate').text("AMC's From Date Is Mandatory..").css("color", "red");
        }
      if($('#AMCExpiresOn').val() == ""){
        $('#MSG_AMCExpiresOn').text("AMC's To Date Is Mandatory..").css("color", "red");
      }
      if($('#ProductsDetails').val() == ""){
          $('#MSG_ProductsDetails').text("Product Is Mandatory..").css("color", "red");
      }
    }
});




// $.ajax({
//   type: 'POST',
//   url: 'action/SelectCompany.php',
//   data: {action:'Display_Company_Data'},
//   success: function (data) {
//     let CompanyData = JSON.parse(data);
//     html+=`<option value="Select Companies">Select Companies </option>`;
//     $.each(CompanyData, function(i,val) {
//         html+=`<option value="`+val.CompanyInsertId +`">`+val.CompanyName +` </option>`;
//     });
//     $('#framework').html(html);
//   }
// });

// $.ajax({
//   type: 'POST',
//   url: 'action/CreateProduct.php',
//   data: {action:'Display_Product_Data'},
//   success: function (data) {
//     let ProductData = JSON.parse(data);
//     htmls+=`<option value="Select Products">Select Products </option>`;
//     $.each(ProductData, function(i,val) {
//         htmls+=`<option value="`+val.Product_Insert_Id +`">`+val.Product_Name +` </option>`;
//     });
//     $('#ProductsDetails').html(htmls);
//   }
// });


$('#SerialNo').on('change', function() {
  // alert( this.value );
   let SerialNo = $(this).val();
    $.ajax({
      type: 'POST',
      url: 'action/SelectCompany.php',
      data: {action:'Display_CompanyProduct_Data_SerialNo_BASE',Serial_No:SerialNo},
      success: function (data) {
       // alert(data);
        let CompanyData = JSON.parse(data);
        // html+=`<option value="Select Companies">Select Companies </option>`;
        $.each(CompanyData, function(i,val) {
            // html+=`<option value="`+val.CompanyInsertId +`">`+val.CompanyName +` </option>`;
             $('#Email').val(val.Email_id);
             $('#Products').val(val.Product_Name);
             $('#Companies').val(val.CompanyName);
             $('#Prodct_Compny_Id').val(val.Prodct_Compny_Id);
        });
      }
    });
});

Load_Data();
// Display Data In Table
function Load_Data(){
  $.ajax({
      type: 'POST',
      url: 'action/SelectAmcs.php',
      data: {action:'Display_ProductAmcs_Data',PID:localStorage.PID},
      success: function (data) {
        $('#idProductAmcsDetails').html(data);
      }
  });
  
    $.ajax({
      type: 'POST',
      url: 'action/SelectAmcs.php',
      data: {action:'Display_Table_Head_Detail_ProductAmcs_Data',PID:localStorage.PID},
      success: function (data) {
        // $('#idProductAmcsDetails').html(data);
         let AmcsData = JSON.parse(data);
        $.each(AmcsData, function(i,val) {
             $('#IDCompany').html(val.CompanyName);
             $('#IDProduct').html(val.Product_Name);
             $('#IDEmailid').html(val.Email_id);
             $('#IDDescription').html(val.Description);
        });
      }
  });
  
}


// alert(localStorage.Company);

// $('#IDCompany').text(localStorage.Company);
// $('#IDProduct').text(localStorage.Product);
// $('#IDEmailid').text(localStorage.Email);
// $('#IDDescription').text(localStorage.Description);

// <td id="IDAction"><button class="btn btn-success delete" style="height: 22px !important;
//             padding: 3px;font-size: 12px;width: 22px;" data-formindex="`+ (val.AMCInsertId) + `"><i class="fa fa-trash" aria-hidden="true"></i></button>
//             <button class="btn btn-success edit" style="height: 22px !important;
//             padding: 3px;font-size: 12px;width: 22px;" data-formindex="`+ (val.AMCInsertId) + `"><i class="fa fa-edit" aria-hidden="true"></i></button>
//             </td>

// $('#CreateProductAmcsForm').submit(function (e) {
//     e.preventDefault();
//     var url = $('#CreateProductAmcsForm').attr('action');
//     var formData = {
//         'Prodct_Compny_Id' : $('#Prodct_Compny_Id').val(),
//         'AMCFromDate'      : $('#AMCFromDate').val(),
//         'AMCExpiresOn'     : $('#AMCExpiresOn').val(),
//         'InvoiceNo'        : $('#InvoiceNo').val(),
//         'InvoiceDate'      : $('#InvoiceDate').val(),
//         'Description'      : $('#Description').val(), 
//         'action'           : "Insert_Amcs_Data",
//     };
//     $.ajax({
//         type: 'POST',
//         url: url,
//         data: formData,
//         success: function (data) {
//           alert(data);
//           $('#CreateProductAmcsForm')[0].reset();
//         }
//     });
// });

// Delete AMC's Data
$(document).on('click','.delete',function () {
    var confirmalert = confirm("Do you really wnat to Delete?");
   if (confirmalert == true) {
      let AMCInsertId = $(this).attr('data-formindex');
     // var url = 'action/DeleteContact.php';
      var formData = {
          'AMCInsertId'    : AMCInsertId,
          'Delete_action' : "Delete_AMCS_Data",
      };
      $.ajax({
        url: 'action/DeleteAmcs.php',
        type: 'POST',
        data: formData,
        success: function(response){
            alert(response);
            Load_Data();
            //$('#idContactDetails').load('ViewContacts.php');
             // window.location = "CreateProduct_Amcs.php?action=View";
        }
      });
   }
});

$(document).on('click','.edit',function(){
    var  fromDate    = $(this).closest('tr').find('#IDAMCFromDate').html();
    var  fromOn      = $(this).closest('tr').find('#IDAMCExpiresOn').html();
    var  InvoiceNo   = $(this).closest('tr').find('#IDInvoiceNo').html();
    var  InvoiceDate = $(this).closest('tr').find('#IDInvoiceDate').html();
    var  Description = $(this).closest('tr').find('#IDDescription').html();
    $('#AMCFromDate').val(fromDate);
    $('#AMCExpiresOn').val(fromOn);
    $('#OldInvoiceNo').val(InvoiceNo),
    $('#InvoiceNo').val(InvoiceNo);
    $('#InvoiceDate').val(InvoiceDate);
    $('#Description').val(Description);
});



// Delete Companies Data End

//Search Action
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
$('.clsBackBtn').click(function(){
//   $('#idCompaniesProductsDetails').empty();
//   $('#IDCompny').empty();
  window.location.href="Companies_Products.php?action=View";
});
  localStorage.removeItem("SerialNo");
  localStorage.removeItem("Product");
  localStorage.removeItem("Emailid");
  localStorage.removeItem("Remark");
  localStorage.removeItem("ENQRYProduct");
  localStorage.getItem("EnquiryNo");
</script>