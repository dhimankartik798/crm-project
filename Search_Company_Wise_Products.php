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
		                    <h2>Products_Companies</h2>
		                    <ul class="nav navbar-right panel_toolbox">
		                      <li class="dropdown">
		                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i><b> &nbsp;Create/View/Edit</b></a>
		                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="Companies_Products.php?action=Create">Create</a>
                            <a class="dropdown-item" href="Companies_Products.php?action=View">Current AMC's Report</a>
                            <a class="dropdown-item" href="CreateProduct_Amcs.php?action=View">AMC's Detail Report</a>
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
                            <form class=""  method="post" autocomplete="off" name="CreateCompanyProductForm" id="CreateCompanyProductForm" action="action/CreateCompanyProduct.php" novalidate>
                                
                                <!-- <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Invoice No<span class="required">*</span></label>
                                    <div class="col-md-2 col-sm-2">
                                       <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="VoucherNo" id="VoucherNo" placeholder="" required="required"  />                         
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <input class="form-control" class='date' type="date" name="date" id="date" required='required'>
                                    </div>
                                </div>  -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Unique Id<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="SerialNo" id="SerialNo" placeholder="" required="required" /><span id="MSG_SerialNo"></span>
                                    </div>
                                </div>                           
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Companies<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <select id="framework" name="framework[]"  class="form-control">
                                      
                                      </select><span id="MSG_framework"></span>
                                    </div>
                                </div> 
                                 <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Products<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <select id="ProductsDetails" name="ProductsDetails[]" class="form-control">
                                      
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
                                <!-- <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='date' type="date" name="date" required='required'></div>
                                </div>     -->                    
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
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                  <h2>Company Product</h2>
                    <!-- <h2 id="IDCompny"></h2> -->
                    <ul class="nav navbar-right panel_toolbox">
                      <li>
                          <select class="form-control">
                            <option>Sort</option>
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                            <option>100</option>
                          </select>
                      </li>&nbsp;&nbsp;                    
                      <li>
                        <button type="button" class="btn btn-success NoPrint" id="Print"><i class="fa fa-print"></i> Print</button>
                      </li>&nbsp;&nbsp;
                      <li>
                        <input type="text" name="myInput" id="myInput"class="form-control" placeholder="Search Contact.." >
                      </li>&nbsp;&nbsp;  
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i><b> &nbsp;Create/View/Edit</b></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="Companies_Products.php?action=Create">Create</a>
                            <a class="dropdown-item" href="Companies_Products.php?action=View">Current AMC's Report</a>
                            <!-- <a class="dropdown-item" href="CreateProduct_Amcs.php?action=View">AMC's Detail Report</a> -->
                        </div>
                      </li>               
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
              <!-- <form class="form-inline">
								<div class="form-group col-md-3 col-sm-3">
									<input type="text" id="ex3" class="form-control" placeholder="Unique Id * ">&nbsp;&nbsp;
								</div>
								<div class="form-group col-md-3 col-sm-3">
									<input type="text" id="IDCompnyName" class="form-control" placeholder="ComapnyName ">&nbsp;&nbsp;
                </div>
                <div class="form-group col-md-3 col-sm-3">
                <select id="ProductsDetails" name="ProductsDetails[]" class="form-control">
                </select><span id="MSG_ProductsDetails"></span>
                  &nbsp;&nbsp;
								</div>
								<div class="form-group col-md-3 col-sm-3">
									<input type="email" id="ex4" class="form-control" placeholder="Email Id ">
                </div>
                <br><br><br>
								<button type="submit" class="btn btn-success" style="margin-left:10px;">Save</button>
							</form><br> -->
                    <table id="SrchTable" class="table table-striped jambo_table bulk_action" style="width:100%;">
                      <thead>
                        <tr>                         
                          <th>Companies</th>
                          <th>Product</th>
                          <th>Unique Id</th>
                          <th>Email Id</th>
                          <th>Amc's From</th>
                          <th>Amc's To</th>
                          <th>Description</th>
                          <th>Action</th>                         
                        </tr>
                      </thead>
                      <tbody id="idCompaniesProductsDetails">

                      </tbody>
                    </table><center>
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
		                    <h2>Alter_Product</h2>
		                    <ul class="nav navbar-right panel_toolbox">
		                      <li class="dropdown">
		                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i></a>
		                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		                            <a class="dropdown-item" href="Companies_Products.php?action=Create">Create</a>
		                            <a class="dropdown-item" href="Companies_Products.php?action=View">Report</a>
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
<!-- Create AMC's Div Start Here -->
  <div class="modal fade" id="AMCModal" role="dialog">
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
		                    <h2>Create_Service_Contract</h2>
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
                            <form class=""  method="post" autocomplete="off" name="CreateProductAmcsForm" id="CreateProductAmcsForm" action="action/CreateAmcs.php" novalidate> 
                               <input type="hidden" name="Prodct_Compny_Ids" id="Prodct_Compny_Ids">                                    
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">AMC From<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='date' type="date" name="AMCFromDate" id="AMCFromDate" required='required'><span id="MSG_AMCFromDate"></span></div>
                                </div>     
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">AMC To<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='date' type="date" name="AMCExpiresOn" id="AMCExpiresOn" required='required'><span id="MSG_AMCExpiresOn"></span></div>
                                </div>  
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Invoice No<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="InvoiceNo" id="InvoiceNo" placeholder="" required="required" /><span id="MSG_InvoiceNo"></span>
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
  <!-- Create AMC's Div End Here -->
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
  let SNo = 1;
  let GET_Company_ID = "";
  // let All_Data_Display = "";
  GET_Company_ID = localStorage.getItem("CompanyInsertid");
  $('#IDCompnyName').val(localStorage.getItem("CompanyName"));
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



// Move Cursor to First Input Field
$("#SerialNo").focus();

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
  data: {action:'Display_Company_Data'},
  success: function (data) {
    let CompanyData = JSON.parse(data);
    html+=`<option value="">Select Companies </option>`;
    $.each(CompanyData, function(i,val) {
        html+=`<option value="`+val.CompanyInsertId +`">`+val.CompanyName +` </option>`;
    });
    $('#framework').html(html);
  }
});

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


// $('#framework').on('change', function() {
//   // alert( this.value );
//    let CompanyId = $(this).val();
//     $.ajax({
//       type: 'POST',
//       url: 'action/SelectCompany.php',
//       data: {action:'Display_Company_Data_ID_BASE',CompanyInsertId:CompanyId},
//       success: function (data) {
        
//          $('#Email').val(data);
//       }
//     });
// });


// Display Data In Table
$.ajax({
    type: 'POST',
    url: 'action/SelectCompany.php',
    data: {action:'Display_CompanyProduct_Data'},
    success: function (data) {
    // $.get("action/CreateCompany.php",{action:'Display_Company_Data'},function(data, status){
      let ActualData = JSON.parse(data);
      var d = new Date();
      let JSYear = d.getFullYear();
      //alert(JSYear);
          // var month = d.getMonth()+1;
          // var day = d.getDate();
          // var output = d.getFullYear() + '-' +
          // ((''+month).length<2 ? '0' : '') + month + '-' +
          // ((''+day).length<2 ? '0' : '') + day;
         // alert(output);
         
            $.each(ActualData, function(i,val) {
             // if(val.Year == JSYear){
               //$("#IDCompny").html(val.CompanyName);
               if(val.Amc_From_Date !=null){
                  var Fromdate = new Date(val.Amc_From_Date);
                  var AMCFromDate = Fromdate.toString('dd-MM-yyyy'); 
                }else{
                  var AMCFromDate = "";
                }
                if(val.Amc_Expire_On !=null){
                  var Todate = new Date(val.Amc_Expire_On);
                  var AMC_Expire_Date = Todate.toString('dd-MM-yyyy');
                }else{
                  var AMC_Expire_Date = "";
                }
              if(GET_Company_ID == val.CompanyInsertId){
                  htmlData+=`<tr id="row_` + val.Prodct_Compny_Id + `">
                  <td id="IDCompanyName">`+val.CompanyName+`</td>
                  <td id="IDProduct_Name">`+val.Product_Name+`</td>
                  <td id="IDSerialNo">`+val.Serial_No+`</td>
                  <td id="IDEmail_id">`+val.Email_id+`</td>
                  <td>`+AMCFromDate+`</td>
                  <td>`+AMC_Expire_Date+`</td>
                  <td id="IDCompanyInsertId" style="Display:none;">`+val.CompanyInsertId+`</td>
                  <td id="IDProduct_Insert_Id" style="Display:none;">`+val.Product_Insert_Id+`</td> 
                  <td id="IDDescription">`+val.Description+`</td>
                  <td id="IDAction"><button class="btn btn-success delete"  style="height: 22px !important;
                  padding: 3px;font-size: 12px;width: 22px;" data-formindex="`+ (val.Prodct_Compny_Id) + `"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  <button class="btn btn-success edit" data-toggle="modal" data-target="#myModal" style="height: 22px !important;
                  padding: 3px;font-size: 12px;width: 22px;" data-formindex="`+ (val.Prodct_Compny_Id) + `"><i class="fa fa-edit" aria-hidden="true"></i></button>
                  <button class="btn btn-success clsAmcs" data-toggle="modal" data-target="#AMCModal" style="height: 22px !important;
                  padding: 3px;font-size: 12px;width: 22px;" data-formindex="`+ (val.Prodct_Compny_Id) + `"><i class="fa fa-clone" aria-hidden="true"></i></button>
                  </td>
                  </tr>`;
                  SNo = SNo+1;
              }
            });
         // }
      $('#idCompaniesProductsDetails').html(htmlData);
          // var d = new Date();
          // var month = d.getMonth()+1;
          // var day = d.getDate();
          // var output = d.getFullYear() + '-' +
          // ((''+month).length<2 ? '0' : '') + month + '-' +
          // ((''+day).length<2 ? '0' : '') + day;
          // alert(output);
      }
});

 
//Create Company Product
$('#CreateCompanyProductForm').submit(function (e) {
    e.preventDefault();
    if($('#SerialNo').val() != "" && $('#framework').val() != "" && $('#ProductsDetails').val() != "" ){
      var url = $('#CreateCompanyProductForm').attr('action');
      var formData = {        
          'CompanyId'   : $('#framework').val(),
          'ProductId'   : $('#ProductsDetails').val(),
          'SerialNo'    : $('#SerialNo').val(),
          'Email'       : $('#Email').val(),
          'Description' : $('#Description').val(),
          'action'      : "Insert_CompanyProduct_Data",
      };
      $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            //$('#MsgAlert').html(data);
            // window.location = "Dashboard.php";
            //$('#CreateCompanyProductForm')[0].reset();
            $("#SerialNo").focus();
          }
      });
    }else{
      if($('#SerialNo').val() == ""){
          $('#MSG_SerialNo').text("Unique Id Is Mandatory..").css("color", "red");
        }
      if($('#framework').val() == ""){
        $('#MSG_framework').text("Company Is Mandatory..").css("color", "red");
      }
      if($('#ProductsDetails').val() == ""){
          $('#MSG_ProductsDetails').text("Product Is Mandatory..").css("color", "red");
      }
    }
});

// Update Company Product
$('#UpdateCompanyProductForm').submit(function (e) {
    e.preventDefault();
    if($('#SerialNo').val() != "" && $('.clsframework').val() != "" && $('#ProductsDetails').val() != "" ){
      var url = $('#UpdateCompanyProductForm').attr('action');
      var formData = {        
          'CompanyId'        : $('.clsframework').val(),
          'ProductId'        : $('#ProductsDetails').val(),
          'SerialNo'         : $('#SerialNo').val(),
          'Email'            : $('#Email').val(),
          'Description'      : $('#Description').val(),
          'Prodct_Compny_Id' : $('#Prodct_Compny_Id').val(),
          'action'           : "Update_CompanyProduct_Data",
      };
      $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            //$('#MsgAlert').html(data);
             window.location.reload();
            $('#UpdateCompanyProductForm')[0].reset();
          }
      });
    }else{
      if($('#SerialNo').val() == ""){
          $('#MSG_SerialNo').text("Unique Id Is Mandatory..").css("color", "red");
        }
      if($('#framework').val() == ""){
        $('#MSG_framework').text("Company Is Mandatory..").css("color", "red");
      }
      if($('#ProductsDetails').val() == ""){
          $('#MSG_ProductsDetails').text("Product Is Mandatory..").css("color", "red");
      }
    }
});



// Delete Companies Product Data
$(document).on('click','.delete',function () {
    var confirmalert = confirm("Do you really want to Delete?");
   if (confirmalert == true) {
      let Prodct_Compny_Id = $(this).attr('data-formindex');
      var url = 'action/DeleteCompany.php';
      var formData = {
          'Prodct_Compny_Id'  : Prodct_Compny_Id,
          'Delete_action'     : "Delete_Company_Product_Data",
      };
      $.ajax({
        url: 'action/DeleteCompany.php',
        type: 'POST',
        data: formData,
        success: function(response){
            alert(response);
            // window.location = "CreateCompanies.php?action=View";
            window.location.reload();
        }
      });
   }
});

// Edit Companies Product Data
$(document).on('click','.edit',function () {
  //GET DATA
      let Prodct_Compny_Id  = $(this).attr('data-formindex');
      let CompanyInsertId   = $(this).closest('tr').find('#IDCompanyInsertId').html();
      let Product_Insert_Id = $(this).closest('tr').find('#IDProduct_Insert_Id').html();
      let CompanyName       = $(this).closest('tr').find('#IDCompanyName').html();
      let SerialNo          = $(this).closest('tr').find('#IDSerialNo').html();
      let Product_Name      = $(this).closest('tr').find('#IDProduct_Name').html();
      let Email             = $(this).closest('tr').find('#IDEmail_id').html();
      let Description       = $(this).closest('tr').find('#IDDescription').html();
    
    // SET DATA
      $.ajax({
        type: 'POST',
        url: 'action/SelectCompany.php',
        data: {action:'Display_Company_Data'},
        success: function (data) {
          let CompanyData = JSON.parse(data);
          htmll+=`<option value="`+CompanyInsertId +`">`+CompanyName+`<option>`;
          $.each(CompanyData, function(i,val) {
              htmll+=`<option value="`+val.CompanyInsertId +`">`+val.CompanyName +` </option>`;
          });
         // $('.clsframework').html(html);
         $(document).find(".clsframework").html(htmll);
        }
      });

      $.ajax({
        type: 'POST',
        url: 'action/CreateProduct.php',
        data: {action:'Display_Product_Data'},
        success: function (data) {
          let ProductData = JSON.parse(data);
          htmlss+=`<option value="`+Product_Insert_Id +`">`+Product_Name+`<option>`;
          $.each(ProductData, function(i,val) {
              htmlss+=`<option value="`+val.Product_Insert_Id +`">`+val.Product_Name +` </option>`;
          });
          $(document).find('.clsProductsDetails').html(htmlss);
        }
      });
     // $(document).find(".clsframework").html('<option value="'+CompanyInsertId +'">'+CompanyName+'<option>');
      $(document).find('#SerialNo').val(SerialNo);
      //$(document).find('#ProductsDetails').html('<option value="'+Product_Insert_Id +'">'+Product_Name+'<option>');
      $(document).find('#Email').val(Email);
      $(document).find('#Description').val(Description);
      $(document).find('#Prodct_Compny_Id').val(Prodct_Compny_Id);

});

// Edit Companies Product AMC
$(document).on('click','.clsAmcs',function () {
  // GET DATA
  let Prodct_Compny_Id  = $(this).attr('data-formindex');

  //SET DATA
  $(document).find('#Prodct_Compny_Ids').val(Prodct_Compny_Id);
});

// Create Company Product AMC'S 
$('#CreateProductAmcsForm').submit(function (e) {
    e.preventDefault();
    if($('#AMCFromDate').val() != "" && $('#AMCExpiresOn').val() != "" && $('#InvoiceNo').val() != "" ){
      var url = $('#CreateProductAmcsForm').attr('action');
      var formData = {        
          'AMCFromDate'        : $('#AMCFromDate').val(),
          'AMCExpiresOn'       : $('#AMCExpiresOn').val(),
          'InvoiceNo'          : $('#InvoiceNo').val(),
          'InvoiceDate'        : $('#InvoiceDate').val(),
          'Description'        : $('#Description').val(),
          'Prodct_Compny_Id'   : $('#Prodct_Compny_Ids').val(),
          'action'             : "Create_Product_AMCS_Data",
      };
      $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          success: function (data) {
            alert(data);
            //$('#MsgAlert').html(data);
             window.location.reload();
            $('#CreateProductAmcsForm')[0].reset();
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

//alert(localStorage.getItem("CompanyInsertid"));
$(document).on('click','.clsAlter_Product',function () {
  window.location.reload();
});
$('.clsBackBtn').click(function(){
  $('#idCompaniesProductsDetails').empty();
  $('#IDCompny').empty();
  window.location.href="CreateCompanies.php?action=View";
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