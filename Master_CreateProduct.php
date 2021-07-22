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
		                    <h2>Create Product</h2>
		                    <ul class="nav navbar-right panel_toolbox">
		                      <!--<li class="dropdown">-->
		                      <!--  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i></a>-->
		                      <!--  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">-->
		                      <!--      <a class="dropdown-item" href="Master_CreateProduct.php?action=Create">Create Product</a>-->
		                      <!--      <a class="dropdown-item" href="Master_CreateProduct.php?action=View">Report Product</a>-->
		                      <!--  </div>-->
		                      <!--</li>-->
		                    </ul>
		                    <div class="clearfix"></div>
		                  </div>

                        <div class="x_content">
                            <form class="" action="action/CreateProduct.php" name="CreateProductForm" id="CreateProductForm" autocomplete="off" method="post" novalidate>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Product Name<span class="required" style="color:red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="ProductName" id="ProductName" placeholder="Product Name" required="required" />
                                        <span id="MSG_ProductName"></span>
                                    </div>
                                </div>
                                             
                                <!-- <div class="ln_solid"> -->
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-success">Submit</button>
                                            <button type='reset' class="btn btn-success">Reset</button>      
                                            <button type='button' class="btn btn-success"><a href="Master_CreateProduct.php?action=View" style="color:white;">View</a></button>  
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
<!--             <div class="page-title">
              <div class="title_left">
                <h3><small>Tickets List</small></h3>
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
                    <h2>Product Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <!--<li class="dropdown">-->
                      <!--  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i></a>-->
                      <!--  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">-->
                      <!--      <a class="dropdown-item" href="Master_CreateProduct.php?action=Create">Create Product</a>-->
                      <!--      <a class="dropdown-item" href="Master_CreateProduct.php?action=View">Report Product</a>-->
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
                            <div class="card-box table-responsive">
                    <table id="SrchTable" class="table table-striped jambo_table bulk_action mytable">
                    <!--<table class="table table-striped table-bordered" style="width:100%">-->
                      <thead>
                        <tr>
                          <th style="width:2%;">S.No</th>
                          <th style="width:40%;">Product</th>
                          <th style="width:3%;text-align:center;">Action</th>
                        </tr>
                      </thead>
                      <tbody id="ProductData">
                        
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
          <h4 class="modal-title">Alter Product </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form class=""  method="post" autocomplete="off" name="UpdateProductForm" id="UpdateProductForm" action="action/CreateCompany.php" novalidate>
                              <input type="hidden" name="Product_Id" id="Product_Id" value="">
                                <!-- <span class="section">Company Info </span> -->
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align"> Name<span class="required" style="color:red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" style="width:100%;" data-validate-length-range="6" data-validate-words="2" name="ProductName" id="ProductName" placeholder="" required="required" /><span id="MSG_ProductName"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type='submit' class="btn btn-success">Submit</button>
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                      
                                    </div>
                                </div>
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
<?php
include 'footer/footer.php';
?>
<script type="text/javascript">
let htmlData ='';
let SNo = 1;
// $('#SearchCreteria').change(function(event){
//     let Value=$(this).children("option:selected").text();
//     $('#CompanyName').prop('placeholder',Value);
// });

$(document).on('keyup','#ProductName',function(){
    let ProductName = $('#ProductName').val();
    if(ProductName != ""){
      $('#MSG_ProductName').empty();
    }else{
      $('#MSG_ProductName').text("ProductName Is Mandatory..").css("color", "red");
    }
});


// Save Contact Details In Database
$('#CreateProductForm').submit(function (e) {
    e.preventDefault();
    let ProductName  = $('#ProductName').val();
    if(ProductName != ""){
        var url = $('#CreateProductForm').attr('action');
        var formData = {
            'ProductName' : $('#ProductName').val(),
            'action'      : "Insert_Product_Data",
        };
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            success: function (data) {
              alert(data);
              $('#CreateProductForm')[0].reset();
            }
        });
    }else{
        if($('#ProductName').val() == ""){
          $('#MSG_ProductName').text("Product Name Is Mandatory..").css("color", "red");
        }
    }
});

// Delete Companies Data
$(document).on('click','.delete',function () {
    var confirmalert = confirm("Do you really want to Delete?");
   if(confirmalert == true){
      let Product_Insert_Id = $(this).attr('data-formindex');
      //var url = 'action/DeleteCompany.php';
      var formData = {
          'Product_Insert_Id'    : Product_Insert_Id,
          'Delete_action'        : "Delete_Product_Data",
      };
      $.ajax({
        url: 'action/DeleteMasterProducts.php',
        type: 'POST',
        data: formData,
        success: function(response){
            alert(response);
            window.location.reload();
            // Display_Product_Data();
           // window.location = "CreateCompanies.php?action=View";
        }
      });
   }
});
// Delete Companies Data End
var user_type = '<?php echo $_SESSION["user_type"]; ?>';
Display_Product_Data(user_type);
// Display Data In Table
function Display_Product_Data(user_type){
    
    $.ajax({
        type: 'POST',
        url: 'action/CreateProduct.php',
        data: {action:'Display_Product_Data'},
        success: function (data) {
        // $.get("action/CreateCompany.php",{action:'Display_Company_Data'},function(data, status){
          let ActualData = JSON.parse(data);
          $.each(ActualData, function(i,val){
                htmlData+=`<tr id="row_` + val.Product_Insert_Id + `">
                <td id="IDCompanyName" style="width:2%;">`+SNo+`</td>
                <td id="IDProductName" style="width:40%"><b>`+val.Product_Name+`</b></td>
                <td id="IDAction" style="width:3%;text-align:center;">
                    <div class="btn-group" style="display: block !important;">
                      <i class="fa fa-mail-forward" dropdown-toggle" data-toggle="dropdown"></i>
                      <div class="dropdown-menu">
                         <a class="dropdown-item edit" data-toggle="modal" data-target="#myModal" href="#" data-formindex="`+ (val.Product_Insert_Id) + `">Edit</a>
                      </div>
                    </div>
                </td>
                </tr>`;
                SNo = SNo+1;
          });
          $('#ProductData').html(htmlData);
        }
    });
}
// <a class="dropdown-item delete" href="#" data-formindex="`+ (val.Product_Insert_Id) + `">Delete</a>

// Edit Companies Data
$(document).on('click','.edit',function () {
      let Product_Id  = $(this).attr('data-formindex');
      let ProductName = $(this).closest('tr').find('#IDProductName').text();
      $(document).find('#Product_Id').val(Product_Id);
      $(document).find('#ProductName').val(ProductName);
});

// Update Company Details In Database
$('#UpdateProductForm').submit(function (e) {
    e.preventDefault();
    if($('#ProductName').val() != ""){
        var AlterFormData = {
            'Product_Id'  : $('#Product_Id').val(),
            'ProductName' : $('#ProductName').val(),
            'action'      : 'Update_Product_Data',
        };
        $.ajax({
          url: 'action/CreateProduct.php',
          type: 'POST',
          data: AlterFormData,
          // cache: true,
          success: function(data){
              alert(data);
              $(".modal").modal('hide');
              window.location.reload();
          }
        });

    }else{
        if($('#ProductName').val() == ""){
          $('#MSG_ProductName').text("Product Name Is Mandatory..").css("color", "red");
        }
    }
});
// Edit Companies Data End
</script>