<?php
session_start();

include '../DBConfig/database.php';
$htmlLeadData       = '';
$Lead_Transfer_Data = '';
$Lead_Status_Data   = '';
$Lead_Task_Data     = '';
// $CompanyNameData = '';
// $CompanyProductData = '';
// $TotalStateArray = '';
$SrNo = 1;
if(isset($_POST['action'])){
    if($_POST['action'] == "Display_Lead_Data"){
       
       if($_SESSION['user_type'] == "user"){
           $sql = 'SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id where customer_lead.LeadStatus="Open" AND customer_lead.User_Id ="'.$_SESSION['id'].'" ORDER BY customer_lead.LeadDate DESC';
        }
        if($_SESSION['user_type'] == "admin"){
            $sql ='SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id where customer_lead.LeadStatus="Open" ORDER BY customer_lead.LeadDate DESC';
       }
        if($result = mysqli_query($conn,$sql)){   
                while($row =mysqli_fetch_assoc($result))
                {
                    
                    
                    $Date = date("d-m-Y", strtotime($row["LeadDate"]));
                    
                    $now = time(); // or your date as well
                    $your_date = strtotime($row["LeadDate"]);
                    $datediff = $now - $your_date;
                    
                    $Days = round($datediff / (60 * 60 * 24));
                    
                    $htmlLeadData .='                  
                    <tr id="row_'.$row["LeadId"].'">
                    <td id="IDLeadNo"  class="sorting_1 Compnys clsLeadNo" style="width:10%;"><a href="LeadTransferReport.php?action=Transfer_Report">'.$row["LeadNo"].'</a></td>
                    <td>'.$Date.'</td>
                    <td style="width:4%;text-align:center;">'.$Days.'</td>
                    <td id="IDContactName" style="width:10%;">'.$row["ContactName"].'</td>
                    <td id="IDCompanyName" style="width:15%;">'.$row["CompanyName"].'</td>
                    <td id="IDProduct_Name" style="width:15%;">'.$row["Product_Name"].'</td>
                    <td id="IDDealsIn" style="display:none;">'.$row["DealsIn"].'</td>
                    <td id="IDLeadRegisterBy">'.$row['username'].'</td>                  
                    <td id="IDLeadStatus" style="width:5%;" class="clsLeadStatus"><a href="LeadTransferReport.php?action=Lead_Status_Report"><span style="color:green;font-weight:bold;">'.$row["LeadStatus"].'</span></a></td>
                    <td id="IDDescription" class="clsLeadDescription" style="width:20%;"><a href="LeadTransferReport.php?action=Lead_Task_Report">'.$row["Description"].'</a></td>
                    <td id="IDAction" style="width:2%;">
                            <div class="btn-group">
                                <i class="fa fa-mail-forward" dropdown-toggle" data-toggle="dropdown"></i>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item clsTransferTicket" href="#" data-formindex="'.$row["LeadId"].'" data-toggle="modal" data-target="#TicketTransferModal">Lead Transfer</a>
                                    <a class="dropdown-item clsStatusLead" href="#" data-formindex="'.$row["LeadId"].'" data-toggle="modal" data-target="#TicketStatusModal">Lead Status</a>
                                    <a class="dropdown-item clsAddNoteTicket"   data-formindex="'.$row["LeadId"].'" data-toggle="modal" data-target="#TicketAddNoteModal" href="#">Add Notes</a>
                                    <a class="dropdown-item ClsDelete" data-formindex="'.$row["LeadId"].'" href="#">Delete Lead</a>
                                </div> 
                            </div>
                    </td>
                    </tr>
                    ';   
                   // $SrNo = $SrNo+1;
                }
                echo $htmlLeadData;
        }
        //Fetch Lead Data 	End


        // <a class="dropdown-item clsAddNoteTicket"   data-formindex="'.$row["LeadId"].'" data-toggle="modal" data-target="#TicketAddNoteModal" href="#">Add Notes</a>
    } 
}

// <button class="btn btn-success ClsDelete" style="height: 22px !important;
// padding: 3px;font-size: 12px;width: 22px;" id="delete" data-formindex="'.$row["LeadId"].'"><i class="fa fa-trash" aria-hidden="true"></i></button>
// <button class="btn btn-success edit" data-toggle="modal" data-target="#myModal" style="height: 22px !important;
// padding: 3px;font-size: 12px;width: 22px;" data-formindex="'.$row["LeadId"].'"><i class="fa fa-edit" aria-hidden="true"></i></button>

// Display Lead Transfer Data In Report
if($_POST['action'] == "Display_Lead_Transfer_Data"){
    //$sql ='SELECT * from transfer_lead where LeadNo ="'.$_POST["LeadNo"].'"';
    $sql ='SELECT transfer_lead.*,testuser.username from transfer_lead JOIN testuser ON transfer_lead.Transfer_Id=testuser.id where LeadNo ="'.$_POST["LeadNo"].'"';
    if($result = mysqli_query($conn,$sql)){
            //create an array
            //$TicketArray = array();
            while($row =mysqli_fetch_assoc($result))
            {          
                $Date = date("d-m-Y H:i:s", strtotime($row["Lead_created"]));        
                $Lead_Transfer_Data .= '<tr id="row_'.$row["TransferLeadID"].'">
                <td>'.$row["LeadNo"].'</td>
                <td>'.$row["username"].'</td>              
                <td id="IDLeadNo">'.$Date.'</td>                   
                </center>
                </tr>';
                //$TicketArray[] = $row;
            }
            echo $Lead_Transfer_Data;
    }
    // 	End
} 

// Display Lead Status Data In Report
if($_POST['action'] == "Display_Lead_status_Data"){
    //Fetch Companies Data Start      
    $sql ='SELECT * from status_lead where LeadNo ="'.$_POST["LeadNo"].'"';
    if($result = mysqli_query($conn,$sql)){
            while($row =mysqli_fetch_assoc($result))
            {      
                $Date = date("d-m-Y H:i:s", strtotime($row["Status_CreatedOn"]));            
                $Lead_Status_Data .= '<tr id="row_'.$row["Status_Lead_Id"].'">
                <td>'.$row["LeadNo"].'</td>
                <td>'.$row["Lead_Status"].'</td>              
                <td>'.$row["CreatedBy"].'</td>  
                <td>'.$Date.'</td>                                     
                </tr>';
            }
            echo $Lead_Status_Data;
    }
    // 	End
} 

// Display Lead Task Data In Report
if($_POST['action'] == "Display_Lead_Task_Data"){
    //Fetch Companies Data Start      
    $sql ='SELECT * from task_lead where LeadNo ="'.$_POST["LeadNo"].'"';
    if($result = mysqli_query($conn,$sql)){
            while($row =mysqli_fetch_assoc($result))
            {      
                $Date = date("d-m-Y H:i:s", strtotime($row["Task_Created_On"]));            
                $Lead_Task_Data .= '<tr id="row_'.$row["Task_Lead_ID"].'">
                <td>'.$row["LeadNo"].'</td>
                <td>'.$row["CreatedBy"].'</td>              
                <td>'.$row["Description"].'</td>  
                <td>'.$Date.'</td>                                     
                </tr>';
            }
            echo $Lead_Task_Data;
    }
    // 	End
}


// Display Lead Data On Status Base
if($_POST['action'] == "Display_Lead_On_Status_Base"){
    //Fetch Lead Data Start
    if($_SESSION['user_type'] == "user"){
        if($_POST['LeadStatus'] == "All Leads"){
            $sql ='SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id where customer_lead.User_Id ="'.$_SESSION['id'].'" ORDER BY customer_lead.LeadDate DESC';
        }
        if($_POST['LeadStatus'] == "Open Leads"){
          echo  $sql ='SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id where customer_lead.LeadStatus="Open" AND customer_lead.User_Id ="'.$_SESSION['id'].'" ORDER BY customer_lead.LeadDate DESC';
        }
        if($_POST['LeadStatus'] == "Won Leads"){
            $sql ='SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id where customer_lead.LeadStatus="Won" AND customer_lead.User_Id ="'.$_SESSION['id'].'" ORDER BY customer_lead.LeadDate DESC';
        }
        if($_POST['LeadStatus'] == "Drop Leads"){
            $sql ='SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id where customer_lead.LeadStatus="Drop" AND customer_lead.User_Id ="'.$_SESSION['id'].'" ORDER BY customer_lead.LeadDate DESC';
        }
    }

    if($_SESSION['user_type'] == "admin"){
        if($_POST['LeadStatus'] == "All Leads"){
            $sql ='SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id ORDER BY customer_lead.LeadDate DESC';
        }
        if($_POST['LeadStatus'] == "Open Leads"){
            $sql ='SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id where customer_lead.LeadStatus="Open" ORDER BY customer_lead.LeadDate DESC';
        }
        if($_POST['LeadStatus'] == "Won Leads"){
            $sql ='SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id where customer_lead.LeadStatus="Won" ORDER BY customer_lead.LeadDate DESC';
        }
        if($_POST['LeadStatus'] == "Drop Leads"){
            $sql ='SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id where customer_lead.LeadStatus="Drop" ORDER BY customer_lead.LeadDate DESC';
        }
    }
    if($result = mysqli_query($conn,$sql)){
            //create an array
            $LeadArray = array();
            while($row =mysqli_fetch_assoc($result))
            {
                $LeadArray[] = $row;
            }
         echo json_encode($LeadArray);
    }
    //Fetch Companies Data 	End
}
// Display Lead Data On Status Base



?>