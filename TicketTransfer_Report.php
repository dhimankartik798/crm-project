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
                    <h2>Ticket Transfer Report</h2>
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
                          <th>Ticket No</th>
                          <th>Transfer To</th>
                          <th>Transfer On</th>                        
                        </tr>
                      </thead>


                      <tbody id="OpenTicketList">

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
if($Action == "Status_Report"){
?>
	<div class="right_col" role="main">
			<div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ticket Follow Up Report</h2>
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
                                <th>Ticket No</th>
                                <th>Note </th>
                                <th>Created On</th>
                                <th>Created By</th>
                                </tr>
                            </thead>
                            <tbody id="TicketNoteList">

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
?>
<?php
include 'footer/footer.php';
?>
<script type="text/javascript">
// let htmlTicket = ``;
// Display Ticket Transfer Data In Table
$.ajax({
    type: 'POST',
    url: 'action/SelectTicket.php',
    data: {action:'Display_Ticket_Transfer_Data',TicketNo:localStorage.getItem("TicketNo")},
    success: function (data) {
        $('#OpenTicketList').html(data);
    }
});

// Display Ticket Add Note Data In Table
$.ajax({
    type: 'POST',
    url: 'action/SelectTicket.php',
    data: {action:'Display_Ticket_AddNote_Data'},
    success: function (data) {
        $('#TicketNoteList').html(data);
    }
});

$('.clsBackBtn').click(function(){
  $('#idCompaniesProductsDetails').empty();
  $('#IDCompny').empty();
  window.location.href="CreateTickets.php?action=View";
});
</script>