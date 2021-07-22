<?php
include 'header/header.php';
// GET Action
if(!empty($_GET['action'])){
	  $Action = $_GET['action'];
}
?>

	<div class="right_col" role="main">
			<div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                      <center><h5>-- Enquiry Details -- </h5></center>
                    <b>Enquiry No : <span id="IdEnquiryNo"></span></b><br>
                    <b>Product    : <span id="IdProduct"></span></b><br>
                    <b>Mob No     : <span id="IdMob"></span></b><br>
                    <b>Customer   : <span id="IdCustomer"></span></b><br>
                    <b>Company    : <span id="IdCompany"></span></b>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                            <table border="1" style="width:45%;float:left;" class="table table-striped jambo_table bulk_action">
                              <thead>
                                <tr>
                                  <th colspan="3">Transfer Details</th>
                                </tr>
                                <tr>                          
                                  <th style="width:75%;">Transfer</th>
                                  <th style="width:25%;">Transfer On</th>                        
                                </tr>
                              </thead>
                              <tbody id="EnquiryTransferList">
        
                              </tbody>
                            </table>
                                
                          
                            <table border="1" style="width:45%;float:right;" class="table table-striped jambo_table bulk_action">
                              <thead>
                                <tr>
                                    <th colspan="3">Status Details</th>
                                </tr>
                                <tr>                          
                                  <th style="width:75%;">Enquiry Status</th>
                                  <th style="width:25%;">Updated On</th>
                                </tr>
                              </thead>
                              <tbody id="EnquiryStatusListData">
        
                              </tbody>
                            </table>
                         </div>
                        </div>
                       </div>
                       <div class="row" style="margin-top:20px !important">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                            <table border="1" style="width:45%;float:left;" class="table table-striped jambo_table bulk_action">
                              <thead>
                                <tr>
                                  <th colspan="3">Add Notes Details</th>
                                </tr>
                                <tr>                          
                                  <th style="width:75%;">Add Note</th>
                                  <th style="width:25%;">Updated On</th>                        
                                </tr>
                              </thead>
                              <tbody id="Display_Enquiry_AddNote_Data">
        
                              </tbody>
                            </table>
                         </div><br><br>
                         <!--<center>-->
                         <!--  <button type="button" class="btn btn-success clsBackBtn">Go Back</button>-->
                         <!--</center>-->
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
include 'footer/footer.php';
?>
<script type="text/javascript">

    $('#IdEnquiryNo').text(localStorage.getItem("EnquiryNo"));
    $('#IdProduct').text(localStorage.getItem("Product"));
    $('#IdMob').text(localStorage.getItem("Mob"));
    $('#IdCustomer').text(localStorage.getItem("Contact"));
    $('#IdCompany').text(localStorage.getItem("Company"));
    
    $.ajax({
        type: 'POST',
        url: 'action/actionCreateEnquiry.php',
        data: {action:'Display_Enquiry_Transfer_Data',EnquiryNo:localStorage.getItem("EnquiryNo")},
        success: function (data) {
            $('#EnquiryTransferList').html(data);
        }
    });
    

 // Display Lead Status Data In Table
    $.ajax({
         type: 'POST',
         url: 'action/actionCreateEnquiry.php',
         data: {action:'Display_Enquiry_Status',EnquiryNo:localStorage.getItem("EnquiryNo")},
         success: function (data) {
             $('#EnquiryStatusListData').html(data);
     }
    });
    
    // Display Lead Status Data In Table
    $.ajax({
         type: 'POST',
         url: 'action/actionCreateEnquiry.php',
         data: {action:'Display_Enquiry_AddNote_Data',EnquiryNo:localStorage.getItem("EnquiryNo")},
         success: function (data) {
             $('#Display_Enquiry_AddNote_Data').html(data);
     }
    });

// // Display Lead Task Data In Table
// $.ajax({
//     type: 'POST',
//     url: 'action/SelectLead.php',
//     data: {action:'Display_Lead_Task_Data',LeadNo:localStorage.getItem("LeadNo")},
//     success: function (data) {
//         $('#LeadTaskList').html(data);
//     }
// });

// $('.clsBackBtn').click(function(){
//   $('#idCompaniesProductsDetails').empty();
//   $('#IDCompny').empty();
//   window.location.href="CreateEnquiry.php?action=View";
// });

</script>