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
		                    <h2>Customer Lead</h2>
		                    <ul class="nav navbar-right panel_toolbox">
		                    </ul>
		                    <div class="clearfix"></div>
		                  </div>

                        <div class="x_content">
                            <form class=""  method="post" autocomplete="off" name="CreateLeadForm" id="CreateLeadForm" action="action/CreateLead.php" novalidate>   
                            <input type="hidden" name="EnqryLeadNo" id="EnqryLeadNo">
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Companies<span class="required">*</span>
                                    <br><a data-toggle="modal" data-target="#modal-lg-company" href="#"> New Company</a></label>
                                    <div class="col-md-6 col-sm-6">
                                      <select id="framework" name="framework[]"  class="form-control">
                                      </select>
                                      <!-- <a data-toggle="modal" data-target="#modal-lg-color" href="#" >New Company</a> -->
                                      <span id="MSG_framework"></span>
                                    </div>
                                </div> 
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Contact Name<span class="required">*</span>
                                    <br><a data-toggle="modal" data-target="#modal-lg-contact" href="#">New Contact</a></label>
                                    <div class="col-md-6 col-sm-6">
                                      <select id="ContactInsertId" name="ContactInsertId[]"  class="form-control">
                                      </select><span id="MSG_ContactInsertId"></span>
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
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Deals In<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <select id="DealsIn" name="DealsIn[]" class="form-control">
                                        <option>--Select Service--</option>
                                        <option value="Sale">Sale</option>
                                        <option value="Customization">Customization</option>
                                      </select><span id="MSG_ProductsDetails"></span>
                                    </div>
                                </div> 
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Registerd By<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                      <?php
                                      if($_SESSION['user_type'] == "user"){
                                      ?>
                                          <input class="form-control" id="RegisterBy" value="<?php echo $_SESSION['username']; ?>" name="RegisterBy" disabled placeholder="Name of person who will handle this complaint" required="required" />
                                          <input type="hidden" value="<?php echo$_SESSION['id'];?>" name="Userid" id="Userid">
                                      <?php 
                                       }
                                       if($_SESSION['user_type'] == "admin"){
                                      ?>
                                          <select name="RegisterBy" id="RegisterBy" class="form-control">  
                                            <option value="">--Select User--</option>    		  
                                            <option value="Rahul Kumar">Rahul Kumar</option>
                                            <option value="Shivam Chhabra">Shivam Chhabra</option>
                                            <option value="Anu">Anu</option>
                                            <option value="Adesh Jain">Adesh Jain</option>
                                            <option value="Ravi Kumar">Ravi Kumar</option>			                            
                                          </select> <span id="MSG_RegisterBy"></span>
                                          <input type="hidden" value="<?php echo $_SESSION['id'];?>" name="Userid" id="Userid">
                                      <?php
                                       }
                                      ?>
                                      <span id="MSG_AssignedTo"></span>
                                    </div>
                                </div> 
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Description</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea required="required" class="form-control" name="Description" id="Description"></textarea>
                                        <span id="MSG_Description"></span>
                                    </div>
                                </div> 
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                    <input class="form-control" class='date' type="date" name="date" id="date" required='required' readonly></div>
                                </div> 
                                <input type="hidden" name="Status" id="Status" value="Open">
                                <!-- <div class="ln_solid"> -->
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-success">Submit</button>
                                            <button type='reset' class="btn btn-success">Reset</button>  
                                            <button type="button" class="btn btn-success"><a href="Lead.php?action=View" style="color:white;">View Lead</a></button>
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



      <!-- Color Master Model Start Here -->
<div class="modal fade" id="modal-lg-company">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title">Create - Companies</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal"  method="post" autocomplete="off" name="CreateCompanyForm" id="CreateCompanyForm" action="action/CreateCompany.php" novalidate>
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
                          <div class="">
                            <!--<input type="text" class="form-control" name="State" id="State" value="" placeholder="Select State" required="required"/><span id="MSG_State"></span>-->
                              <select name="State" id="State" class="form-control" style="width:100%;">
                            
                            </select> 
                            <!-- <div id="suggesstion-box" style="position: absolute;z-index: 99;display: block;width: 96.5%;"></div> -->
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
                <!-- </form> -->
            </div>
            <div class="modal-footer ">
              <button type="submit" class="btn btn-success">Save</button>
              <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<!-- Color Master Model End Here -->


      <!-- Color Master Model Start Here -->
      <div class="modal fade" id="modal-lg-contact">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title">Create - Contacts</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form name="CreateContactForm" autocomplete="off" id="CreateContactForm" action="action/CreateContact.php" method="post" novalidate>                        
                               <input type="hidden" value="View" id="IDView" name="View">
                                <!-- <span class="section">New Contact</span> -->
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
                                    	<select id="frameworkContact" name="framework[]" class="form-control" style="width:100%">
                                    	
                                    	</select>
                                    </div>
                                    <!-- <div class="col-md-2 col-sm-2">
                                    <button type='button' id="BtnADD" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div> -->
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
                                </div>                               
                            <!-- </form> -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" id="save_color">Save</button>
              <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<!-- Color Master Model End Here -->

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
                    <h2>Lead Report</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li>
                          <select class="form-control" id="IDLeads">
                            <option>Select Leads</option>
                            <option value="All Leads">All Leads</option>
                            <option value="Open Leads">Open Leads</option>
                            <option value="Won Leads">Won Leads</option>
                            <option value="Drop Leads">Drop Leads</option>
                            <!-- <option value="Closed Tickets">Closed Tickets</option> -->
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
                      <!--  <a class="dropdown-item" href="Lead.php?action=Create">Create</a>-->
                      <!--  <a class="dropdown-item" href="Lead.php?action=View">Lead Report</a>-->
                      <!--  </div>-->
                      <!--</li>               -->
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
                                        <th style="width:10%;">Lead ID</th>
                                        <th>Created On</th>
                                        <th style="width:4%;">Days</th>
                                        <th style="width:10%;">Customer</th>
                                        <th style="width:15%;">Company</th>
                                        <th style="width:15%;">Product</th>
                                        <th style="display:none;">Deals In</th>
                                        <th>RegisterBy</th>
                                        <th style="width:5%;">Status</th>
                                        <th style="width:20%;">Description</th>
                                        <th style="width:4%;">Action</th>                         
                                        </tr>
                                    </thead>
                                    <tbody id="IDLeadDetails">

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
                                        <!--<input class="form-control"  id="TransferTo" name="TransferTo" placeholder="" required="required"  /><span id="MSG_TicketNo"></span>-->
                                        <select name="TransferTo" id="TransferTo" class="form-control">  
                                            <option value="">--Select User--</option>    		  
                                            <option value="16">Rahul Singh</option>
                                            <option value="17">Anu</option>
                                            <option value="19">Shivam Chhabra</option>
                                            <!--<option value="Ravi Kumar">Ravi Kumar</option>-->
                                            
                                          </select>
                                        
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
                          <form  name="Update_Lead_Status_Form" id="Update_Lead_Status_Form" action="action/CreateLead.php" autocomplete="off" method="post" novalidate>                        
                               <input type="hidden" name="TicketInsertId" id="TicketInsertId" value="">
                               <input type="hidden" id="LeadNo"  name="LeadNo" >
                               <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Date</label>       
                                    <input class="form-control" class='date' id="date" type="date" name="date" required='required' readonly>
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
  let LeadStatus = '';

  let Todays=new Date();
  let FormatedDates=Todays.getFullYear()+'-'+('0'+(Todays.getMonth()+1)).slice(-2)+'-'+('0'+Todays.getDate()).slice(-2);
  $('#date').val(FormatedDates).focus().select();


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

Display_Company_Data_For_Contact();
function Display_Company_Data_For_Contact(){
  htmlContact =``;
  hiddenField =``;
  $.ajax({
    type: 'POST',
    url: 'action/SelectCompany.php',
    data: {action:'Display_Company_Data_For_Contact'},
    success: function (data) {
      let CompanyData = JSON.parse(data);
      html+=`<option value>Select Companies </option>`;
      html+=`<option value="New Company">New Company</option>`;
      $.each(CompanyData, function(i,val) {
          html+=`<option value="`+val.CompanyInsertId +`">`+val.CompanyName +` </option>`;
    
          hiddenField +=`<input type="hidden" name="row`+val.CompanyInsertId+`" id="row`+val.CompanyInsertId+`" value="`+val.CompanyName+`">`;
          htmlContact+=`<option value="`+val.CompanyInsertId+`,">`+val.CompanyName +` </option>`;
      });
      $('#framework').html(html);

      $('#frameworkContact').html(htmlContact);
      $('#HiddenFormField').html(hiddenField);

    }
  });

  // Initialize select2
  $("#framework").select2();
  $("#frameworkContact").select2();
}
// $(document).on('change','#framework',function(){
//     let txt =   $(this).val();
//     if(txt == "New Company"){
//       $("#modal-lg-color").modal('show');
//       // alert("Open Model ");
//     }
// });

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

  // let txt =   $(this).val();
  // if(txt == "New Company"){
  //   $("#modal-lg-color").modal('show');
  // }
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
      if(localStorage.getItem('ENQRYProduct') == val.Product_Name){
         htmls+=`<option value="`+val.Product_Insert_Id +`" Selected>`+val.Product_Name +` </option>`;
      }else{
        htmls+=`<option value="`+val.Product_Insert_Id +`">`+val.Product_Name +` </option>`;
      }
    });
    $('#ProductsDetails').html(htmls);
  }
});

$('#ProductsDetails').select2();

DisplayLeadData();

// Display Data In Table
function DisplayLeadData(){
$.ajax({
    type: 'POST',
    url: 'action/SelectLead.php',
    data: {action:'Display_Lead_Data'},
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
            $('#IDLeadDetails').html(data);
      }
});
}

 
//Create Company Product
$('#CreateLeadForm').submit(function (e) {
    e.preventDefault();
    
    if($('#EnqryLeadNo').val() == ""){
        EnqryLeadNo           =  0;
    }

    if($('#EnqryLeadNo').val() != ""){
        EnqryLeadNo            =  $('#EnqryLeadNo').val();
    }
    
    if($('#framework').val() != "" && $('#Description').val() != "" && $('#RegisterBy').val() != "" && $('#ContactInsertId').val()){
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
        'EnqryLeadNo'     : EnqryLeadNo,
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
    }else{
        if($('#framework').val() == ""){
          $('#MSG_framework').text("Company Name Is Mandatory..").css("color", "red");
        }

        if($('#ContactInsertId').val() == ""){
          $('#MSG_ContactInsertId').text("Contact Number Is Mandatory..").css("color", "red");
        }

        if($('#RegisterBy').val() == ""){
          $('#MSG_RegisterBy').text("Register By Is Mandatory..").css("color", "red");
        }
        
        if($('#Description').val() == ""){
          $('#MSG_Description').text("Description Is Mandatory..").css("color", "red");
        }
    }
});

//Delete Customer Lead 
$(document).on('click','.ClsDelete',function () {
  var confirmalert = confirm("Do you really want to Delete?");
   if (confirmalert == true) {
      var formData = {
          'LeadId'  : $(this).attr('data-formindex'),
          'LeadNo'  : $('#IDLeadNo').text(),
          'action'  : "Delete_Lead"
      };
      $.ajax({
          type: 'POST',
          url: 'action/DeleteLead.php',
          data: formData,
          success: function (data) {
              alert(data);            
                //$('#updateTicketForm')[0].reset();
                //  window.location.reload();
                DisplayLeadData();
          }
      });
   }
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
        'LeadNo'        : $('#LeadNo').val(),
        'TransferID'    : $('#TransferTo').val(),
        'action'        : "Lead_Transfer_Data"
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

let Transfer = '<?php echo $_SESSION["username"]; ?>';

$('#IDLeads').change(function(){
  //$('#OpenTicketList').empty();
  //let TicketStatus = $(this).val();
  let htmlLead = ``;
  var Days = '';
  let Closed_Date = '';
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
             if(value.LeadStatus == "Open"){
                 LeadStatus = '<span   style="color:green;font-weight:bold;">'+value.LeadStatus+'</span>';
                    // if(Closed_Date == "01-01-1970"){
                    var d = new Date();
                    var month = d.getMonth()+1;
                    var day = d.getDate();
                    Closed_Date = d.getFullYear() + '-' +
                    ((''+month).length<2 ? '0' : '') + month + '-' +
                    ((''+day).length<2 ? '0' : '') + day;
                    //  }
                    Days = daysdifference(value.LeadDate,Closed_Date);
                    function daysdifference(FirstDate, secondDate){
                        var startDay = new Date(FirstDate);
                        var endDay   = new Date(secondDate);
                       
                        var millisBetween = startDay.getTime() - endDay.getTime();
                        var days = millisBetween / (1000 * 3600 * 24);
                       
                        return Math.round(Math.abs(days));
                    }
                 
                }
                if(value.LeadStatus == "Drop"){
                    LeadStatus = '<span style="color:blue;font-weight:bold;">'+value.LeadStatus+'</span>';
                    Days = daysdifference(value.LeadDate,value.LeadClosedDate);
                    function daysdifference(FirstDate, secondDate){
                        var startDay = new Date(FirstDate);
                        var endDay   = new Date(secondDate);
                       
                        var millisBetween = startDay.getTime() - endDay.getTime();
                        var days = millisBetween / (1000 * 3600 * 24);
                       
                        return Math.round(Math.abs(days));
                    }
                  
                }
                if(value.LeadStatus == "Won"){
                   LeadStatus = '<span  style="color:red;font-weight:bold;">'+value.LeadStatus+'</span>';
                   Days = daysdifference(value.LeadDate,value.LeadClosedDate);
                    function daysdifference(FirstDate, secondDate){
                        var startDay = new Date(FirstDate);
                        var endDay   = new Date(secondDate);
                       
                        var millisBetween = startDay.getTime() - endDay.getTime();
                        var days = millisBetween / (1000 * 3600 * 24);
                       
                        return Math.round(Math.abs(days));
                    }
                }
            
            htmlLead+=`<tr id="row_`+value.LeadId+`">
                <td id="IDLeadNo"  class="sorting_1 Compnys clsLeadNo" style="width:10%;"><a href="LeadTransferReport.php?action=Transfer_Report">`+value.LeadNo+`</a></td>
                <td>`+LeadDate+`</td>
                <td style="width:4%;text-align:center;">`+Days+`</td>
                <td id="IDContactName" style="width:10%;">`+value.ContactName+`</td>
                <td id="IDCompanyName" style="width:15%;">`+value.CompanyName+`</td>
                <td id="IDProduct_Name" style="width:15%;">`+value.Product_Name+`</td>
                <td id="IDDealsIn" style="display:none;">`+value.DealsIn+`</td>
                <td id="IDLeadRegisterBy">`+value.username+`</td>                  
                <td id="IDLeadStatus" class="clsLeadStatus" style="width:5%;"><a href="LeadTransferReport.php?action=Lead_Status_Report">`+LeadStatus+`</a></td>
                <td id="IDDescription" class="clsLeadDescription" style="width:20%;"><a href="LeadTransferReport.php?action=Lead_Task_Report">`+value.Description+`</a></td>
                <td id="IDAction" style="width:2%;">
                      <div class="btn-group">
                          <i class="fa fa-mail-forward" dropdown-toggle" data-toggle="dropdown"></i>
                          <div class="dropdown-menu">
                              <a class="dropdown-item clsTransferTicket" href="#" data-formindex="`+value.LeadId+`" data-toggle="modal" data-target="#TicketTransferModal">Lead Transfer</a>
                              <a class="dropdown-item clsStatusLead" href="#" data-formindex="`+value.LeadId+`" data-toggle="modal" data-target="#TicketStatusModal">Lead Status</a>
                              <a class="dropdown-item clsAddNoteTicket"   data-formindex="`+value.LeadId+`" data-toggle="modal" data-target="#TicketAddNoteModal" href="#">Add Notes</a>
                              <a class="dropdown-item ClsDelete" data-formindex="`+value.LeadId+`" href="#">Delete Lead</a>
                          </div> 
                      </div>
                </td>
                </tr>`;
        });
        $('#IDLeadDetails').html(htmlLead);  
      }
  });
});


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
            Display_Company_Data_For_Contact();
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



//Print the document
$('#Print').click(function(event){
    event.preventDefault();
    window.print();
});



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
htmlsss =``;
// Display State Name
$.ajax({
    type: 'POST',
    url: 'action/SelectCompany.php',
    data: {action:'Display_State_Data'},
    success: function (data) {
      let StateData = JSON.parse(data);
    htmlsss+=`<option value="Select State">Select State </option>`;
    $.each(StateData, function(i,val) {
        htmlsss+=`<option value="`+val.state_name +`">`+val.state_name +` </option>`;
    });
    $('#State').html(htmlsss);
    $("#State").select2();
    }
});


$('#CreateContactForm').submit(function (e) {
    e.preventDefault();
    if($('#ContactName').val() != "" && $('#MobileNumber').val() != "" && $('#Designation').val() != ""){
    var str = $('.clsCompanies').text();
    if(str == ""){
      str = "317,";
    }
    CompaniesIds = str.split(',');
    // if(CompaniesIds == ""){
    //   CompaniesIds = "173";
    // }
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
               $(".modal").modal('hide');
              //window.location.reload();
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

$('#frameworkContact').change(function(){
    let companyids = $('#frameworkContact').val();
    let Companyid = $('#frameworkContact').val().replace(/,/g , '');
    let ids = "#row"+Companyid;
    let Companies = $(ids).val();
    $('#IdComapiesDetails').append('<tr><td class="clsCompanies" style="Display:none;">'+companyids+'</td><td>'+Companies+'</td><td><button class="btn btn-success delete" style="height: 22px !important;padding: 3px;font-size: 12px;width: 22px;"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>');
  });

$(document).on('click','.delete',function(){
  $(this).closest('tr').remove();
  // window.location.reload();
});



  $('#EnqryLeadNo').val(localStorage.getItem("EnquiryNo"));

  localStorage.removeItem("SerialNo");
  localStorage.removeItem("Product");
  localStorage.removeItem("Emailid");
  localStorage.removeItem("Remark");



</script>