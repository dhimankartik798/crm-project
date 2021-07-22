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
                    <h3><small>Create - Product Activation</small></h3>
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
                  <input type="text" style="display:inline-block;" name="InvoiceNo" autofocus class="form-control input_whole_soft Input" id="InvoiceNo" placeholder="Voucher No."  data-Index="1" form="InvoiceForm" readonly/><br><br>
                  <input type="date" name="InvoiceDate" id="InvoiceDate" style="width:100%;" class="form-control input_whole_soft Input" form="InvoiceForm" required  data-Index="2"/>
                </div>
              <!-- <div class="col-sm-2">
                  <label>Date</label>
                  <input type="date" name="InvoiceDate" id="InvoiceDate" style="width:100%;" class="form-control input_whole_soft Input" form="InvoiceForm" required  data-Index="2"/>
                  <div id="suggesstion-box" style="position: absolute;z-index: 99;display:block;width:100%;"></div>
              </div> -->
            </div>
        </form>
        <div id="DynamicForm">
        <div class="opening-balance-body" style="width: 100%;float: left;">
                <form action="#" id="RawMaterialForm" autocomplete="off">
                <input type="hidden" name="ProductInsertId" id="ProductInsertId" value=""/>
                <input type="hidden" name="UOMF" id="UOMF" value=""/>
                <input type="hidden" name="RawInventoryInsertId" id="RawInventoryInsertId" value=""/>
                <input type="hidden" name="ColorInsertId" id="ColorInsertId" value=""/>
                <div style="width:18%; float: left;">
                  <!--<input type="text" class="form-control input_whole_soft Input Autocomplete OTACreateEditEnabled" name="ProductName" id="ProductName" placeholder="Product" data-Index="4" required   data-CreateAction="../iframes/ProductMaster.html" data-AlterAction="../iframes/EditProduct.html" data-AltInsertId="ProductInsertId" data-CTitle="Product - Create" data-ATitle="Product - Alter"/>-->
                  <!--<select name="ProductName" class="form-control input_whole_soft Input" id="ProductName">-->
                      
                  <!--</select>-->
                  <!--<div id="suggesstion-box" style="position: absolute;z-index: 99;display: block;width:15%;"></div>-->
                  
                  
                    <select  id="ProductName" class="form-control"></select>
                    <div id='result'></div>
                    <span id="Msg_Products"></span>
                    
                </div>
                <div style="width:8%; float: left;">
                  <input type="number" class="form-control input_whole_soft Input" step="1" name="SerialNo" id="SerialNo" placeholder="Serial No" data-Index="5" required/>
                </div>
                <!--<div style="width:8%; float: left;">-->
                <!--  <input type="text" class="form-control input_whole_soft Input Autocomplete OTACreateEditEnabled" name="Serialkey" id="Serialkey" placeholder="Serialkey" data-Index="6"  data-CreateAction="../iframes/ColorMaster.html" data-AlterAction="../iframes/editcolor.html" data-AltInsertId="ColorInsertId" data-CTitle="Colour - Create" data-ATitle="Colour - Alter"/>-->
                <!--</div>-->
                <div class="input-group" style="width: 6%; float: left;">
                  <!-- <input type="text" class="form-control input_whole_soft Input" step="any" name="Pstatus" id="Pstatus" placeholder="P-status" data-Index="7" required/> -->
                    <select class="form-control" name="Pstatus" id="Pstatus">
                        <option value="Pending">Pending</option>
                        <option value="Done">Done</option>
                    </select>
                </div>
                <div style="width:10%; float: left;">
                  <!--<input type="text" class="form-control input_whole_soft Input" step="any" name="AccountName" id="AccountName" placeholder="Account" data-Index="8" />-->
                  <!--AccountName-->
                    <select class="form-control input_whole_soft Input" name="AccountName" id="AccountName">
                        
                    </select>
                  <div id="suggesstion-box" style="position: absolute;z-index: 99;display: block;width:15%;"></div>
                </div>
                <div style="width:10%; float: left;">
                  <input type="text" class="form-control input_whole_soft Input" step="any" name="Billing" id="Billing" placeholder="Customer" />
                </div>
                <div style="width:10%; float: left;">
                  <input type="text" class="form-control input_whole_soft Input Autocomplete OTACreateEditEnabled" name="EmailId" id="EmailId" placeholder="Email Id" data-Index="6"  data-CreateAction="../iframes/ColorMaster.html" data-AlterAction="../iframes/editcolor.html" data-AltInsertId="ColorInsertId" data-CTitle="Colour - Create" data-ATitle="Colour - Alter"/>
                </div>
                <div class="input-group" style="width: 10%; float: left;">
                  <input type="number" class="form-control input_whole_soft Input" step="any" name="ContactNo" id="ContactNo" placeholder="Contact No" data-Index="7" />
                </div>
                <div style="width:6%; float: left;">
                  <!-- <input type="text" class="form-control input_whole_soft Input" step="any" name="LStatus" id="LStatus" placeholder="L-Status" data-Index="8" required/> -->
                  <select class="form-control" name="LStatus" id="LStatus">
                        <option value="Pending">Pending</option>
                        <option value="Done">Done</option>
                    </select>
                </div>
                <div style="width:14%; float: left;">
                  <input type="text" class="form-control input_whole_soft Input" step="any" name="Remarks" id="Remarks" placeholder="Remarks" />
                </div>


                <div style="text-align: center; float: left; width: 8%;">
                  <button type="submit" class="btn btn-success"  data-Index="9" id="SaveForm"><i class="fa fa-plus"></i></button>&nbsp;<button type="reset" class="btn btn-success"><i class="fa fa-undo"></i></button>
                </div>
                </form>
            </div>
            <!--opening-balance-body-->
            <div class ="opening-balance-table"  style="margin: 10px 0px  !important;">
                <table class="table table-fixed table-bordered" id="DataContainer">
                    <thead>
                        <tr>
                            <th class="table-whole-soft-heading" style="width:10% !important;">Product</th>
                            <th class="table-whole-soft-heading" style="width:8% !important;">Serial No</th>
                            <!--<th class="table-whole-soft-heading" style="width:8% !important;">Serial key</th>-->
                            <th class="table-whole-soft-heading" style="text-align:left;width:7% !important;">Activation</th>
                            <th class="table-whole-soft-heading" style="text-align:left;width:10% !important;">Account</th>
                            <th class="table-whole-soft-heading" style="text-align:left;width:15% !important;">Customer </th>
                            <th class="table-whole-soft-heading" style="text-align:left;width:15% !important;">Email Id</th>
                            <th class="table-whole-soft-heading" style="text-align:left;width:10% !important;">Contact No</th>
                            <th class="table-whole-soft-heading" style="text-align:left;width:7% !important;">Lead Status</th>
                            <th class="table-whole-soft-heading" style="text-align:left;width:7% !important;">Remarks</th>
                            <th class="table-whole-soft-heading" style="text-align:left;width:3% !important;">Act</th>
                        </tr>
                    </thead>
                    <tbody style="height: 250px;" id="IDTbody">
                    </tbody>
                 <tfoot>
                      <tr>
                          <th style="width:30% !important;text-align:right;vertical-align:middle;border-left:none;"><b><br></b></th>
                          <th style="width:8% !important;text-align:right;"></th>
                          <th style="width:8% !important;text-align:right;"></th>
                          <th style="width:8% !important;text-align:right;"></th>
                          <th style="width:8% !important;text-align:right;"></th>
                          <th style="width:8% !important;text-align:right;"></th>
                          <th style="width:7% !important;text-align:right;"></th>
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
              <a href="CreateProductActivation.php?action=View"><button  class="btn btn-success whole-reset-button" id="View" style="font-size: 15px !important;">View</button></a>	
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
                    <h2>Activation Report</h2>
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
                          <select name="Product" id="Product" class="form-control" style="width:150px;">
                              <option> Select Product</option>
                          </select>
                        </li>&nbsp;&nbsp;
                        <li>
                            <input type="date" name="FromDate" id="fromDate"class="form-control">
                        </li>&nbsp;&nbsp;
                        <li>
                            <input type="date" name="ToDate" id="ToDate"class="form-control">
                        </li>&nbsp;&nbsp;
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
                      <li>
                        <input type="text" name="myInput" id="myInput"class="form-control" placeholder="Search..." >
                      </li>&nbsp;&nbsp;
                      
                      <!--<li class="dropdown">-->
                      <!--  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"-->
                      <!--      aria-haspopup="true" aria-expanded="false"><i class="fa fa-edit"></i>-->
                      <!--      Create/View/Edit-->
                      <!--    </button>-->
                      <!--  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">-->
                      <!--  <a class="dropdown-item" href="CreateProductActivation.php?action=Create">Create</a>-->
                      <!--  <a class="dropdown-item" href="CreateProductActivation.php?action=View">Activation Report</a>-->
                      <!--  </div>-->
                      <!--</li>               -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive" id="example">
                                    <table id="SrchTable" class="table table-striped jambo_table bulk_action mytable css-serial" >
                                    <thead>
                                        <tr>
                                        <th style="width:3%;">SNo</th>  
                                        <th style="width:6%;">Date</th>                                           
                                        <th style="width:14%;">Product</th>
                                        <th style="width:7%;text-align:right;">SerialNo</th>                  
                                        <!--<th>SerialKey</th>-->
                                        <th style="width:6%;">Act</th>
                                        <th style="width:8%;">Account</th>
                                        <th style="width:17%;">Billing</th>
                                        <th style="width:18%;">Email Id</th>
                                        <th style="width:5%;">Lead</th>
                                        <th style="width:10%;">Remarks</th>
                                        <th style="width:4%;">Act</th>                         
                                        </tr>
                                    </thead>
                                    <tbody id="IDProductActivationDetails">

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
		                    <h2>Alter_Tally_Product</h2>
		                    <ul class="nav navbar-right panel_toolbox">
		                      
		                      <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		                      </li>
		                      
		                      <li><a class="close-link"><i class="fa fa-close"></i></a>
		                      </li> -->
		                    </ul>
		                    <div class="clearfix"></div>
		                  </div>

                        <div class="x_content">
                            <form class=""  method="post" autocomplete="off" name="UpdateProductActivationForm" id="UpdateProductActivationForm" action="action/actionCreateProductActivation.php" novalidate>
                                <input type="hidden" name="AlterActivationId" id="AlterActivationId" >
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Voucher No<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                       <input class="form-control" data-validate-length-range="6" data-validate-words="1" name="AlterVoucherNo" id="AlterVoucherNo" placeholder="" required="required" readonly/>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                       <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="Alterdate" id="Alterdate" placeholder="" required="required" /><span id="MSG_Date"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Product<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select id="AlterProduct" name="AlterProduct[]"  class="form-control clsframework">
                                      
                                      </select><span id="MSG_framework"></span>
                                       
                                    </div>
                                </div>                           
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Serial No<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                       <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="AlterSerialNo" id="AlterSerialNo" placeholder="" required="required" /><span id="MSG_SerialNo"></span>
                                    </div>
                                </div> 
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Activation<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <select id="AlterActivation" name="AlterActivation" class="form-control ">
                                        <option value="Pending">Pending</option>
                                         <option value="Done">Done</option>
                                      </select><span id="MSG_ProductsDetails"></span>
                                    </div>
                                </div> 
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Account<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <!--<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="AlterAccount" id="AlterAccount" placeholder="Account" required="required" />-->
                                      <select class="form-control input_whole_soft Input" name="AlterAccount" id="AlterAccount">
                        
                                      </select>
                                     <span id="MSG_ProductsDetails"></span>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Billing<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="AlterBilling" id="AlterBilling" placeholder="Billing Name" required="required" />
                                     <span id="MSG_Billing"></span>
                                    </div>
                                </div>
                                 <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email Id<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                       <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="AlterEmailID" id="AlterEmailID" placeholder="Email Id" required="required" /><span id="MSG_EmailID"></span>
                                    </div>
                                </div>
                                 <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Contact<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                       <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="AlterContact" id="AlterContact" placeholder="Contact No" required="required" /><span id="MSG_EmailID"></span>
                                    </div>
                                </div> 
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Lead Status<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                       <!--<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="LeadStatus" id="LeadStatus" placeholder="Lead Status" required="required" /><span id="MSG_LeadStatus"></span>-->
                                     <select id="AlterLeadStatus" name="AlterLeadStatus" class="form-control ">
                                        <option value="Pending">Pending</option>
                                         <option value="Done">Done</option>
                                      </select>
                                    </div>
                                </div> 
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Remarks</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea required="required" class="form-control" name="AlterRemarks" id="AlterRemarks"></textarea>
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
  let htmlAgent = '';
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

InTime();
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

OutTime();
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

  });
}



var nextnumber = 1;
//Submit Raw Material Form
$(document).on('submit', '#RawMaterialForm', function (event) {
    event.preventDefault();
    let ProductName   = $('#ProductName').val();
    let SerialNo      = $('#SerialNo').val();
    // let Serialkey     = $('#Serialkey').val();
    let PStatus       = $('#Pstatus').val();
    let AccountName   = $('#AccountName').val();
    let Billing       = $('#Billing').val();
    let EmailId       = $('#EmailId').val();
    let ContactNo     = $('#ContactNo').val();
    let LStatus       = $('#LStatus').val();
    let Remarks       = $('#Remarks').val();
    //  <input type="hidden" class="clsSerialkey" name="Serialkey" value="`+Serialkey+ `"/>
    let InvisibleForm = `<form class="ProductData" id="ProductData_`+nextnumber+ `" name="ProductData_`+nextnumber+ `">
    <input type="hidden" class="clsProductName" name="ProductName" value="`+ProductName + `"/>
    <input type="hidden" class="clsSerialNo" name="SerialNo" value="`+SerialNo+ `"/>
    
    <input type="hidden" class="clsPStatus" name="PStatus" value="`+PStatus+`"/>
    <input type="hidden" class="clsAccountName" name="AccountName" value="`+AccountName+ `"/>
    <input type="hidden" class="clsBilling" name="Billing" value="`+Billing+ `"/>
    <input type="hidden" class="clsEmailId" name="EmailId" value="`+EmailId+ `"/>
    <input type="hidden" class="clsContactNo" name="ContactNo" value="`+ContactNo+ `"/>
    <input type="hidden" class="clsLStatus" name="LStatus" value="`+LStatus+ `"/>
    <input type="hidden" class="clsRemarks" name="Remarks" value="`+Remarks+ `"/>
    </form>`;
    // <td style="text-align:text;width:8% !important;" class="whole-font">`+ Serialkey + `</td>
    $('#InvisibaleForm').append(InvisibleForm);
    let NewRow = `<tr id="row_`+nextnumber+ `">
    <td style="width:10% !important;" class="whole-font">`+ ProductName + `</td>
    <td style="width:8% !important;" class="whole-font">`+ SerialNo + `</td>
    <td style="text-align:text;width:7% !important;" class="whole-font">`+ PStatus + `</td>
    <td style="text-align:left;width:10% !important;" class="whole-font">`+ AccountName + `</td>
    <td style="text-align:left;width:15% !important;" class="whole-font">`+ Billing + `</td>
    <td style="text-align:left;width:15% !important;" class="whole-font">`+ EmailId + `</td>
    <td style="text-align:left;width:10% !important;" class="whole-font">`+ ContactNo + `</td>
    <td style="text-align:left;width:7% !important;" class="whole-font">`+ LStatus + `</td>
    <td style="text-align:text;width:7% !important;" class="whole-font">`+ Remarks + `</td>
    <td style="width:3% !important;"><button class="btn btn-danger clsdelete" style="height: 22px !important;
     padding: 3px;font-size: 12px;width: 22px;" data-formindex="`+ nextnumber + `"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
    </tr>`;
    $(document).find('#DataContainer tbody').append(NewRow);
    nextnumber = nextnumber + 1;
    
});


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
  url: 'action/SelectProductActivation.php',
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


DisplayProductActivationData();

// Display Data In Table
function DisplayProductActivationData(){
    $.ajax({
        type: 'POST',
        url: 'action/SelectProductActivation.php',
        data: {action:'Display_ProductActivation_Data'},
        success: function (data) {
            $('#IDProductActivationDetails').html(data);
            // $('#example').DataTable();
            if($('#maxRows').val() == "ShowAll"){
              var trnum = 0;
              var maxRows = 15;
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
            }
        }
    });
}

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
});

 
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
        }
    });
});

//Delete Customer Lead 
$(document).on('click', '.clsdelete', function (event) {
    let FormIndex = $(this).attr('data-formindex');
    let form = $(document).find('#ProductData_'+FormIndex);
    $(document).find('#ProductData_'+FormIndex).remove();
    $(document).find('#row_'+FormIndex).remove();
});

// Edit Ticket Table Data edit
//$(document).on('click','.clsTicket,.clsAddNoteTicket,.clsDeleteTicket,.clsTransferTicket,.clsStatusLead',function () {
$(document).on('click','.edit',function () {
  let ActivationId  = $(this).attr('data-formindex');
  let Voucher       = $(this).closest('tr').find('#IDVchrNo').text();
  let date          = $(this).closest('tr').find('#IDDate').text();
  let Product       = $(this).closest('tr').find('#IDStaff').text();
  let SerialNo      = $(this).closest('tr').find('#IDSerialNo').text();
  let Activation    = $(this).closest('tr').find('#IDActivationStatus').text();
  let Account       = $(this).closest('tr').find('#IDAccount').text();
  let Billing       = $(this).closest('tr').find('#IDBillingName').text();
  let Contact       = $(this).closest('tr').find('#IDContact').text();
  let Emailid       = $(this).closest('tr').find('#IDEmailId').text();
  let LeadStatus    = $(this).closest('tr').find('#IDleadStatus').text();
  let Remark        = $(this).closest('tr').find('#IDRemark').text();

  $(document).find('#AlterActivationId').val(ActivationId);
  $(document).find('#AlterVoucherNo').val(Voucher);
  $(document).find('#Alterdate').val(date);
  
 // $(document).find('#AlterProduct').html('<option value="'+Product+'">'+Product+'</option>');
    $.ajax({
      type: 'POST',
      url: 'action/SelectContact.php',
      data: {action:'Display_Product_Data'},
      success: function (data) {
        let ProductData = JSON.parse(data);
        htmls+=`<option value="">Select Product </option>`;
        $.each(ProductData, function(i,val) {
            if(Product != val.Product_Name){
                htmls+=`<option value="`+val.Product_Name +`">`+val.Product_Name +` </option>`;
            }else{
                htmls+=`<option value="`+Product +`" selected>`+Product+`</option>`; 
            }
        });
        $('#AlterProduct').html(htmls);
        // $('#Product').html(htmls);
      }
    });
  
  $(document).find('#AlterSerialNo').val(SerialNo);
  $(document).find('#AlterActivation').val(Activation);
  $(document).find('#AlterAccount').val(Account);
  $(document).find('#AlterBilling').val(Billing);
  $(document).find('#AlterContact').val(Contact);
  $(document).find('#AlterEmailID').val(Emailid);
  $(document).find('#AlterLeadStatus').val(LeadStatus);
  $(document).find('#AlterRemarks').val(Remark);
  
});


$(document).on('click','.CompanyProduct',function(){
  let SerialNo      = $(this).closest('tr').find('#IDSerialNo').text();
  let Product       = $(this).closest('tr').find('#IDStaff').text();
  let Emailid       = $(this).closest('tr').find('#IDEmailId').text();
  let Remark        = $(this).closest('tr').find('#IDRemark').text();
  localStorage.setItem("SerialNo", SerialNo);
  localStorage.setItem("Product",  Product);
  localStorage.setItem("Emailid",  Emailid);
  localStorage.setItem("Remark",  Remark);
  window.location.href = 'Companies_Products.php'; 
});

$(document).on('click','.clsLeadNo,.clsLeadStatus,.clsLeadDescription',function () {
      let Lead_No = $(this).closest('tr').find('.clsLeadNo').text();
      localStorage.setItem("LeadNo",Lead_No);
});


//Product Activation Update Form
$('#UpdateProductActivationForm').submit(function (e) {
  e.preventDefault();
  var url = $('#UpdateProductActivationForm').attr('action');
    var formData = {
        'AlterActivationId'   : $('#AlterActivationId').val(),
        'AlterVoucherNo'      : $('#AlterVoucherNo').val(),   
        'Alterdate'           : $('#Alterdate').val(),
        'AlterProduct'        : $('#AlterProduct').val(),
        'AlterSerialNo'       : $('#AlterSerialNo').val(),
        'AlterActivation'     : $('#AlterActivation').val(),
        'AlterAccount'        : $('#AlterAccount').val(),       
        'AlterBilling'        : $('#AlterBilling').val(),
        'AlterEmailID'        : $('#AlterEmailID').val(),
        'AlterContact'        : $('#AlterContact').val(),
        'AlterLeadStatus'     : $('#AlterLeadStatus').val(),
        'AlterRemarks'        : $('#AlterRemarks').val(),
        'action'              : "Update_Product_Activation_Data"
    };
    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        success: function (data){
            alert(data);
            $(".modal").modal('hide');
            DisplayProductActivationData();
            //$(".modal").modal('hide');
            // window.location.reload();                       
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
// $(document).on('click','.clsAlter_Product',function (){
//   window.location.reload();
// });

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
    var ProductName       = [];
    var SerialNo          = [];
    // var SerialKey         = [];
    var Pstatus           = [];
    var AccountName       = [];
    var Billing           = [];
    var EmailId           = [];
    var ContactNo         = [];
    var Lstatus           = [];
    var Remarks           = [];
    var VoucherNo         = $('#InvoiceNo').val();
    var date              = $('#InvoiceDate').val();
    
    $('.clsProductName').each(function(){
        ProductName.push($(this).val());
    });
    $('.clsSerialNo').each(function(){
        SerialNo.push($(this).val());
    });
    // $('.clsSerialkey').each(function(){
    //     SerialKey.push($(this).val());
    // });
    $('.clsPStatus').each(function(){
        Pstatus.push($(this).val());
    });
    $('.clsAccountName').each(function(){
        AccountName.push($(this).val());
    });
    $('.clsBilling').each(function(){
        Billing.push($(this).val());
    });
    $('.clsContactNo').each(function(){
        ContactNo.push($(this).val());
    });
    $('.clsEmailId').each(function(){
        EmailId.push($(this).val());
    });
    $('.clsLStatus').each(function(){
        Lstatus.push($(this).val());
    });
    $('.clsRemarks').each(function(){
      Remarks.push($(this).val());
    });

    // if(InvoiceNo != "" && SupplierCode != ""){
      $.ajax({
        url: "action/actionCreateProductActivation.php",
        type: "post",
        data: {VoucherNo:VoucherNo,date:date,ProductName:ProductName,SerialNo:SerialNo,Pstatus:Pstatus,AccountName:AccountName,Billing:Billing,ContactNo:ContactNo,EmailId:EmailId,Lstatus:Lstatus,Remarks:Remarks,action:'Insert_ProductActivation_Data'},
        success : function(data){
        alert(data);
        // $('#DataContainer').empty();
        window.location.reload();
        // $('#IDTbody').empty();
        }
      });
});


$.ajax({
  type: 'POST',
  url: 'action/SelectContact.php',
  data: {action:'Display_Product_Data'},
  success: function (data) {
    let ProductData = JSON.parse(data);
    htmls+=`<option value="">Select Product </option>`;
    $.each(ProductData, function(i,val) {
        htmls+=`<option value="`+val.Product_Name +`">`+val.Product_Name +` </option>`;
    });
    $('#ProductName').html(htmls);
    $('#Product').html(htmls);
  }
});

$("#ProductName").select2();

$("#AccountName").select2();
$.ajax({
  type: 'POST',
  url: 'action/SelectContact.php',
  data: {action:'Display_Agent_Data'},
  success: function (data) {
    let ProductData = JSON.parse(data);
    htmlAgent+=`<option value="">Select Account </option>`;
    $.each(ProductData, function(i,val) {
        htmlAgent+=`<option value="`+val.ContactInsertId +`">`+val.ContactName +` </option>`;
    });
    $('#AccountName').html(htmlAgent);
    $('#AlterAccount').html(htmlAgent);
  }
});

// Delete Companies Data
$(document).on('click','.delete',function () {
      let ActivatoinInsertId = $(this).attr('data-formindex');
      var formData = {
          'ActivatoinInsertId'  : ActivatoinInsertId,
          'action'              : "Delete_Product_Activation",
      };
      $.ajax({
        url: 'action/DeleteProductActivation.php',
        type: 'POST',
        data: formData,
        success: function(response){
            alert(response);
            DisplayProductActivationData();
        }
      });
});

localStorage.removeItem("ENQRYProduct");
 localStorage.getItem("EnquiryNo");

</script>