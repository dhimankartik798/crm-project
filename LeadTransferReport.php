<?php
include 'header/header.php';
// GET Action
if(!empty($_GET['action'])){
	  $Action = $_GET['action'];
}
// else{
// 	$Action = "Create"; 
// }
if($Action == "Transfer_Report"){
?>

	<div class="right_col" role="main">
			<div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lead Transfer Report</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="CreateTickets.php?action=Create">Create Ticket</a>
                            <a class="dropdown-item" href="CreateTickets.php?action=View">List Ticket</a>
                        </div>
                      </li>
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
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                          </div>
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
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    <table id="SrchTable" class="table table-striped jambo_table bulk_action" style="width:100%">
                      <thead>
                        <tr>                          
                          <th>Lead ID</th>
                          <th>Transfer To</th>
                          <th>Transfer On</th>                        
                        </tr>
                      </thead>
                      <tbody id="LeadList">

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
<?php
}
if($Action == "Lead_Status_Report"){
?>
	<div class="right_col" role="main">
			<div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lead Status Report</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="Lead.php?action=Create">Create Lead</a>
                            <a class="dropdown-item" href="Lead.php?action=View">Report Lead</a>
                        </div>
                      </li>
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
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                            <table id="SrchTable" class="table table-striped jambo_table bulk_action" style="width:100%">
                            <thead>
                                <tr>                          
                                <th>Lead No</th>
                                <th>Status </th>
                                <th>Assigned To </th>
                                <th>Assigned On</th>
                                </tr>
                            </thead>
                            <tbody id="LeadStatusList">

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
<?php
}
if($Action == "Lead_Task_Report"){
?>
	<div class="right_col" role="main">
			<div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lead Follow Up Report</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-edit"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="Lead.php?action=Create">Create Lead</a>
                            <a class="dropdown-item" href="Lead.php?action=View">Report Lead</a>
                        </div>
                      </li>
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
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                            <table id="SrchTable" class="table table-striped jambo_table bulk_action" style="width:100%">
                            <thead>
                                <tr>                          
                                <th>Lead No</th>
                                <th>Created By </th>
                                <th>Description</th>
                                <th>Created On</th>
                                </tr>
                            </thead>
                            <tbody id="LeadTaskList">

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


<?php
}
include 'footer/footer.php';
?>
<script type="text/javascript">
// let htmlTicket = ``;
// Display Ticket Transfer Data In Table
// alert(localStorage.getItem("LeadNumber"));
$.ajax({
    type: 'POST',
    url: 'action/SelectLead.php',
    data: {action:'Display_Lead_Transfer_Data',LeadNo:localStorage.getItem("LeadNo")},
    success: function (data) {
        $('#LeadList').html(data);
    }
});

// Display Lead Status Data In Table
$.ajax({
    type: 'POST',
    url: 'action/SelectLead.php',
    data: {action:'Display_Lead_status_Data',LeadNo:localStorage.getItem("LeadNo")},
    success: function (data) {
        $('#LeadStatusList').html(data);
    }
});

// Display Lead Task Data In Table
$.ajax({
    type: 'POST',
    url: 'action/SelectLead.php',
    data: {action:'Display_Lead_Task_Data',LeadNo:localStorage.getItem("LeadNo")},
    success: function (data) {
        $('#LeadTaskList').html(data);
    }
});

$('.clsBackBtn').click(function(){
  $('#idCompaniesProductsDetails').empty();
  $('#IDCompny').empty();
  window.location.href="Lead.php?action=View";
});
</script>