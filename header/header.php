<?php
session_start();

if($_SESSION['username'] == ""){
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Marsone Innovators </title>

    <!-- Bootstrap -->
    <!-- <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <!-- Tmie Range Picker -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" /> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
    <!-- <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->
    <!-- Select2 CSS --> 
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 
<style type="text/css">    
  .center {
    margin: auto;
    width: 100%;
    padding: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    position:relative;
  }

  .hideform {
      display: none;
  }

  .tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -60px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:100%;position: relative;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
.table td, .table th {
  padding:8px !important;
  width:8%;
}
.table {
    /* color: #73879C;
    background: #2A3F54; */
    /* font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif; */
    font-size: 11px !important;
    font-weight: 400;
    line-height: 1.471;
    font-family: verdana,Arial,Helvetica !important;
}
.table-striped tbody tr:nth-of-type(odd) {
    /* background-color: rgba(0,0,0,.05); */
    background-color:#ffffff !important;
}
/*.left_col{*/
/*  position:fixed !important;*/
/*}*/

.dropdown-item {   
    /* padding:0px !important; */
    padding: 3px 12px !important;
}


.table {
    /* color: #73879C;
    background: #2A3F54; */
    /* font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif; */
    font-size: 11px !important;
    font-weight: 400;
    line-height: 1.471;
    font-family: verdana,Arial,Helvetica !important;
}
.table-striped tbody tr:nth-of-type(odd) {
    /* background-color: rgba(0,0,0,.05); */
    background-color:#ffffff !important;
}
/*.left_col{*/
/*  position:fixed !important;*/
/*}*/


 /* width */
::-webkit-scrollbar {
    width: 12px;
}

/* Track */
::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey; 
    border-radius: 3px;
}

/* Handle */
::-webkit-scrollbar-thumb {
    background:rgb(150, 150, 150); 
    border-radius: 3px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: rgb(75, 75, 75); 
}
::-webkit-inner-spin-button, 
.quantity::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}  
#GrandTotal{
    width: 100%;
}
.css-serial {
    counter-reset: serial-number; /* Set the serial number counter to 0 */
}
.css-serial td:first-child:before {
    counter-increment: serial-number; /* Increment the serial number counter */
    content: counter(serial-number); /* Display the counter */
}
.opening-balance-top {
width: 100%;
padding-bottom: 20px;padding-top: 20px;
}
.opening-balance-top ul{width: 100%;padding: 0;margin: 0;list-style: none;}
.opening-balance-top ul li{display: inline-block;}
.opening-balance-top .form-group {
    width: 100%;
}
.opening-balance-top .form-group select{
    width: 70% !important;
}
.opening-balance-body ul{padding: 0;margin: 0;list-style: none;}
.opening-balance-body ul li{display: inline-block;
padding: 0;
margin: 0;width: 8%;
vertical-align: middle;}
 .table-fixed{
  width: 100%;
  background-color: #f3f3f3;}
   tbody{
    overflow-y:auto;
    width: 100%;
    }
   .table{
    table-layout: fixed;
    border-collapse: collapse;
    margin-top: 30px;
  }
   thead{
  display:table;
  width:100%;
  width:calc(100% - 0px);
  }
   tr {
     display:table;
  width:100%;
  table-layout:fixed;
}
 tbody {
  display: block;
  overflow: overlay;
  width: 100%;
 background-color: white;
}
.table-responsive {
        overflow-x: unset !important;
}


.table tbody td{
    padding:0px !important;
}

.table thead th {
    padding:4px !important;
}

/*#idTableBody tr td{*/
/*    padding:none !important;*/
/*}*/

/*.table #idCompaniesProductsDetails tr td a:hover {*/
/*  color: blue !important;*/
/*  text-decoration: underline !important;*/
/*}*/
.txtlink:hover {
    text-decoration: underline;
}

 
.opening-balance-body{margin-bottom: 20px;}
.opening-balance-total ul{padding: 0;margin: 0;list-style: none;text-align: center;}
.opening-balance-total ul li{display: inline-block;}
.opening-balance-bottom ul{width: 100%;padding: 0;margin: 0;list-style: none;text-align: center;}
.opening-balance-bottom ul li{display: inline-block;}
.opening-balance-body .btn-primary{height: 30px;
    width: 30px;
    padding: 3px;
    font-size: 18px;}
.opening-balance-body .btn-danger{height: 30px;
    width: 30px;
    padding: 3px;
    font-size: 18px;}
.opening-balance-table .btn-danger{padding: 5% !important;}
.opening-balance-table .btn-primary{padding: 5% !important;}
.main-stock-top-right ul{text-align: right;}
.opening-balance-vendor-left ul{padding: 0;margin: 0;list-style: none;}
.opening-balance-vendor-left ul li{display: inline-block;}
.opening-balance-vendor-left ul li :last-child{width: 100% !important;}
.opening-balance-vendor{padding-bottom: 20px;}
.opening-balance-vendor-right ul{text-align: right;}
.opening-balance-vendor-right ul li{display: inline-block;}
.opening-balance-vendor-right ul li :last-child{width: 100% !important;}

.opening-balance-body ul li{
    width:100% !important;
}

.css-serial {
  counter-reset: serial-number;  /* Set the serial number counter to 0 */
}

.css-serial td:first-child:before {
  counter-increment: serial-number;  /* Increment the serial number counter */
  content: counter(serial-number);  /* Display the counter */
}

#idCompaniesProductsDetails .btn-group, .btn-group-vertical {
    position:absolute !important;
}

#idTableBody .btn-group, .btn-group-vertical {
    position:absolute !important;
}

#idContactDetails .btn-group, .btn-group-vertical {
    position:absolute !important;
}

table.jambo_table tbody tr:hover td {
    background: #9baef6 !important;
}

/*#SrchTable tbody {*/
/*    display: contents !important;*/
/*}*/

.clsTicketTable .btn-group, .btn-group-vertical {
    position: absolute !important;
}
</style>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Marsone</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <!-- <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div> -->
              <!--  <div class="profile_info">
                <h2><span>User :&nbsp;&nbsp; </span><?php //echo $_SESSION['username']; ?></h2>
               </div> --> 
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <!-- <h3>Master</h3>
                <ul class="nav side-menu">  
                <li><a href="Master_CreateProduct.php"><i class="fa fa-edit"></i>Products</a></li>
                </ul> -->
               <!--  <h3>General</h3> -->
                <ul class="nav side-menu">              
                 <!--  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                      <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul>
                  </li> -->
                  <li><a href="Dashboard.php"><i class="fa fa-home"></i>Dashboard</a></li>

                  <li><a href="CreateCompanies.php"><i class="fa fa-building"></i>Companies</a></li>
                  <li><a href="CreateContacts.php"><i class="fa fa-info"></i>Contacts</a></li>
                  <li><a href="Master_CreateProduct.php"><i class="fa fa-edit"></i>Products</a></li>
                  <li><a href="Companies_Products.php"><i class="fa fa-sitemap"></i>Company Product</a></li>
                  <!-- <li><a href="CreateProduct_Amcs.php"><i class="fa fa-clone"></i>AMC's</a></li> -->
                  <li><a href="CreateTickets.php"><i class="fa fa-table"></i>Ticket</a></li>
                  <!-- <li><a href="UserPermission.php"><i class="fa fa-table"></i>User Permission</a></li> -->
                  <li><a href="CreateEnquiry.php"><i class="fa fa-info"></i>Enquiry</a></li>
                  <li><a href="Lead.php"><i class="fa fa-user"></i>Lead</a></li>
                  <li><a href="#"><i class="fa fa-table"></i>Solutions</a></li>
                  <li><a href="CreateAttendance.php"><i class="fa fa-table"></i>Attendance</a></li>
                  <li><a href="CreateProductActivation.php"><i class="fa fa-sitemap"></i>Tally Activation</a></li>
                  <li><a href="SaleInvoice.php"><i class="fa fa-table"></i>Sale Invoice</a></li>
                  <li><a href="CreatePayment.php"><i class="fa fa-paypal"></i>Payment</a></li>
                  <li><a href="UserPermission.php"><i class="fa fa-table"></i>User Permission</a></li> 
                  <li><a href="DataBackUp.php"><i class="fa fa-table"></i>Data BackUp</a></li> 
                  <!--<li><a href="Sms.php"><i class="fa fa-file"></i>Sms</a></li>-->
                  <li><a href="Mail_Inbox.php"><i class="fa fa-envelope"></i>Email</a></li>
                  <!-- <li><a href="#"><i class="fa fa-key"></i>Change Password</a></li> -->

                 <!--  <li><a><i class="fa fa-home"></i> Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Create Product</a></li>
                      <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul>
                  </li> -->
                  <!--
                  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">General Form</a></li>
                      <li><a href="form_advanced.html">Advanced Components</a></li>
                      <li><a href="form_validation.html">Form Validation</a></li>
                      <li><a href="form_wizards.html">Form Wizard</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                -->   
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
           <!--  <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <!-- <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false"> -->
                    <!-- <img src="images/img.jpg" alt=""> -->
                    <button class="btn btn-success" style="height: 28px !important;padding: 3px;font-size: 12px;width: 35px;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <?php
                     $string = $_SESSION['username'];
                     //$string = 'öëBC';
                    //Use mb_substr to get the first character.
                    $firstChar = mb_substr($string, 0, 1, "UTF-8");
                    
                    //Print out the first character.
                    echo "<b>".$firstChar."</b>";
                     ?>
                    </button>
                    
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-left" aria-labelledby="navbarDropdown" style="margin-right:140px;">
                  <a class="dropdown-item"  href="#" Style="background-color:#EDEDED;"><h6> <?php echo $_SESSION['username']; ?></h6>
                  <small style="font-family:arial;font-size:13px;"><?php echo $_SESSION['email']; ?></small></a>
                    <a class="dropdown-item"  href="javascript:;"><i class="fa fa-user pull-right"></i> Profile Settings</a>
                      <!-- <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a> -->
                    <!-- <a class="dropdown-item"  href="javascript:;">Help</a> -->
                    <a class="dropdown-item"  href="#"><i class="fa fa-key pull-right"></i>Change Password</a>
                    <a class="dropdown-item"  href="Logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->