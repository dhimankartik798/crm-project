<?php
session_start();

include '../DBConfig/database.php';
$No = 1;
$htmlLeadData ='';
$htmlEnquiryTransferData = '';
$htmlEnquiryStatusData   = '';
$htmlEnquiryAddNoteData  = '';
if(isset($_POST['action'])){
    
    //Insert Company Data In Sql Start 
    if($_POST['action']  == "Insert_Enquiry_Data"){
        $Companies       = $_POST["Companies"];
        $Contact         = $_POST["Contact"];
        $MobNo           = $_POST["MobNo"];
        $EmailId         = $_POST["EmailId"];
        $Address         = $_POST["Address"];
        $Products        = $_POST["Products"];
        $Remarks         = $_POST["Remarks"];
        $user_type       = $_POST["user_type"];
        if($user_type == "admin"){
             $RegisterBy      = $_POST["RegisterBy"];
        }
        if($user_type == "user"){
             $RegisterBy      = $_POST["Userid"];
        }
        $date            = $_POST["date"];
        $Status          = "Open";
        $newDate         = date("d-m-Y", strtotime($date));
        // $EnqryNo         = "MIPL-".$newDate."-";
        $EnqryNo         = "E"."000";

        $SQL ='SELECT count(EnqryNo) As EnqryNo FROM `customer_enquiry`';
        if($results= mysqli_fetch_assoc(mysqli_query($conn,$SQL))){
            $Nos = $results["EnqryNo"]+1;
            $EnqryNo  = $EnqryNo.$Nos;
            $SQL_Customer_Enquiry = 'insert into customer_enquiry(EnqryNo,EnqryCompnyName,EnqryContactName,EnqryMob,EnqryEmailId,EnqryAddress,EnqryProduct,EnqryRemarks,RegisterBy,Date,Status)values("'.$EnqryNo.'","'.$Companies.'","'.$Contact.'","'.$MobNo.'","'.$EnqryEmailId.'","'.$Address.'","'.$Products.'","'.$Remarks.'","'.$RegisterBy.'","'.$date.'","'.$Status.'");';
            if(mysqli_query($conn,$SQL_Customer_Enquiry)){ 
                $SQL_Enquiry_Transfer = 'insert into enquiry_transfer(enquiry_no,enquiry_to)values("'.$EnqryNo.'","'.$RegisterBy.'");';
                if(mysqli_query($conn,$SQL_Enquiry_Transfer)){
                    $SQL_Add_Note = 'insert into enquiry_notes(enquiry_no,addnote_created_by,addnote_details)values("'.$EnqryNo.'","'.$RegisterBy.'","'.$Remarks.'");';
                    if(mysqli_query($conn,$SQL_Add_Note)){
                        $sql_enquiry_status = 'insert into enquiry_status(enquiry_no,enquiry_status,enquiry_createdby)values("'.$EnqryNo.'","'.$Status.'","'.$RegisterBy.'");';
                        if(mysqli_query($conn,$sql_enquiry_status)){ 
                            echo "Enquiry Created Successfully";
                        }
                    } 
                }
            }else{
                  echo "Error Created Lead";
            }
        }
    }
    
    if($_POST['action'] == "Display_Enquiry_Data"){
       
        if($_SESSION['user_type'] == "user"){
              //$sql = 'SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id where customer_lead.LeadStatus="Open" AND customer_lead.User_Id ="'.$_SESSION['id'].'" ORDER BY customer_lead.LeadDate DESC';
              $sql = 'SELECT customer_enquiry.*, products.Product_Name,testuser.username FROM customer_enquiry JOIN testuser on customer_enquiry.RegisterBy=testuser.id JOIN products ON customer_enquiry.EnqryProduct=products.Product_Insert_Id where customer_enquiry.RegisterBy ="'.$_SESSION['id'].'" AND customer_enquiry.Status="Open" ORDER BY customer_enquiry.EnqryId DESC';
              
        }
        if($_SESSION['user_type'] == "admin"){
           // $sql ='SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id where customer_lead.LeadStatus="Open" ORDER BY customer_lead.LeadDate DESC';
            $sql ='SELECT customer_enquiry.*, products.Product_Name,testuser.* FROM customer_enquiry JOIN testuser on customer_enquiry.RegisterBy=testuser.id JOIN products ON customer_enquiry.EnqryProduct=products.Product_Insert_Id where customer_enquiry.Status="Open" ORDER BY customer_enquiry.EnqryId DESC';
        }
        if($result = mysqli_query($conn,$sql)){   
                while($row =mysqli_fetch_assoc($result))
                {
                    
                    
                    $Date = date("d-m-Y", strtotime($row["Date"]));
                    $now = time(); // or your date as well
                    $your_date = strtotime($row["Date"]);
                    $datediff = $now - $your_date;
                    
                    $Days = round($datediff / (60 * 60 * 24));
                    
                    $htmlLeadData .='                  
                    <tr id="row_'.$row["EnqryNo"].'">
                    <td id="IDEnquiryNo"  class="sorting_1 Compnys clsEnquiryNo" style="font-weight:bold;width:13%;"><a href="EnquiryDetailReport.php">'.$row["EnqryNo"].'</a></td>
                    <td>'.$Date.'</td>
                    <td style="width:4%;text-align:center;">'.$Days.'</td>
                    <td id="IDContactName" style="width:10%;">'.$row["EnqryContactName"].'</td>
                    <td id="IDMob" style="width:10%;">'.$row["EnqryMob"].'</td>
                    <td id="IDCompanyName" style="width:15%;">'.$row["EnqryCompnyName"].'</td>
                    <td id="IDProduct_Name" style="width:15%;">'.$row["Product_Name"].'</td>
                    <td id="IDEnquiryRegisterBy">'.$row['username'].'</td>
                    <td id="IDRegisterBy" style="display:none;">'.$row['RegisterBy'].'</td>
                    <td id="IDEnquiryStatus" style="width:5%;" class="clsLeadStatus"><a href="#"><span style="color:green;font-weight:bold;">'.$row["Status"].'</span></a></td>
                    <td id="IDEnquiryDescription" class="clsEnquiryRemarks" style="width:20%;"><a href="#">'.$row["EnqryRemarks"].'</a></td>
                    <td id="IDAction" style="width:2%;">
                            <div class="btn-group" style="position:absolute !important;">
                                <i class="fa fa-mail-forward" dropdown-toggle" data-toggle="dropdown"></i>
                                <div class="dropdown-menu">';
                                
                                if($row["Status"] != "Won"){
                                    $htmlLeadData .='<a class="dropdown-item clsTransferEnquiry" href="#" data-formindex="'.$row["EnqryNo"].'" data-toggle="modal" data-target="#EnquiryTransferModal">Transfer</a>
                                                     <a class="dropdown-item clsAddNoteEnquiry"  data-formindex="'.$row["EnqryNo"].'" data-toggle="modal" data-target="#EnquiryAddNoteModal" href="#">Add Notes</a>
                                                     <a class="dropdown-item clsUpdateStatusEnquiry" data-formindex="'.$row["EnqryNo"].'" data-toggle="modal" data-target="#EnquiryUpdateStatusModal" href="#">Update Status</a>';
                                }
                                if($row["Status"] == "Won" && $row["EnqryViewStatus"] == "1"){
                                    $htmlLeadData .='<a class="dropdown-item clsConvertEnquiryToLead" href="#" data-formindex="'.$row["EnqryNo"].'">Convert Lead</a>';
                                }
                                
                $htmlLeadData .='</div> 
                            </div>
                    </td>
                    </tr>';   
                }
                echo $htmlLeadData;
                
                // if($_SESSION['user_type'] == "admin"){
                //                         $htmlLeadData .='<a class="dropdown-item clsDeleteEnquiry" data-formindex="'.$row["EnqryNo"].'">Delete</a>';
                //                     }
        }
        
    } 
    
    
    // Display Enquiry Data On Status Base
    if($_POST['action'] == "Display_Enquiry_On_Status_Base"){
        //Fetch Lead Data Start
        if($_SESSION['user_type'] == "user"){
            if($_POST['EnquiryStatus'] == "All"){
                //$sql ='SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id where customer_lead.User_Id ="'.$_SESSION['id'].'" ORDER BY customer_lead.LeadDate DESC';
                $sql = 'SELECT customer_enquiry.*, products.Product_Name,testuser.username FROM customer_enquiry JOIN testuser on customer_enquiry.RegisterBy=testuser.id JOIN products ON customer_enquiry.EnqryProduct=products.Product_Insert_Id where customer_enquiry.RegisterBy ="'.$_SESSION['id'].'" ORDER BY customer_enquiry.EnqryId DESC';
            }
            if($_POST['EnquiryStatus'] == "Open"){
              //echo  $sql ='SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id where customer_lead.LeadStatus="Open" AND customer_lead.User_Id ="'.$_SESSION['id'].'" ORDER BY customer_lead.LeadDate DESC';
                $sql = 'SELECT customer_enquiry.*, products.Product_Name,testuser.username FROM customer_enquiry JOIN testuser on customer_enquiry.RegisterBy=testuser.id JOIN products ON customer_enquiry.EnqryProduct=products.Product_Insert_Id where customer_enquiry.RegisterBy ="'.$_SESSION['id'].'" AND customer_enquiry.Status="Open" ORDER BY customer_enquiry.EnqryId DESC';
            }
            if($_POST['EnquiryStatus'] == "Won"){
                //$sql ='SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id where customer_lead.LeadStatus="Won" AND customer_lead.User_Id ="'.$_SESSION['id'].'" ORDER BY customer_lead.LeadDate DESC';
                $sql = 'SELECT customer_enquiry.*, products.Product_Name,testuser.username FROM customer_enquiry JOIN testuser on customer_enquiry.RegisterBy=testuser.id JOIN products ON customer_enquiry.EnqryProduct=products.Product_Insert_Id where customer_enquiry.RegisterBy ="'.$_SESSION['id'].'" AND customer_enquiry.Status="Won" ORDER BY customer_enquiry.EnqryId DESC';
                
            }
            if($_POST['EnquiryStatus'] == "Drop"){
                //$sql ='SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id where customer_lead.LeadStatus="Drop" AND customer_lead.User_Id ="'.$_SESSION['id'].'" ORDER BY customer_lead.LeadDate DESC';
                  $sql = 'SELECT customer_enquiry.*, products.Product_Name,testuser.username FROM customer_enquiry JOIN testuser on customer_enquiry.RegisterBy=testuser.id JOIN products ON customer_enquiry.EnqryProduct=products.Product_Insert_Id where customer_enquiry.RegisterBy ="'.$_SESSION['id'].'" AND customer_enquiry.Status="Drop" ORDER BY customer_enquiry.EnqryId DESC';
            }
        }
    
        if($_SESSION['user_type'] == "admin"){
            if($_POST['EnquiryStatus'] == "All"){
                //$sql ='SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id ORDER BY customer_lead.LeadDate DESC';
                  $sql ='SELECT customer_enquiry.*, products.Product_Name,testuser.* FROM customer_enquiry JOIN testuser on customer_enquiry.RegisterBy=testuser.id JOIN products ON customer_enquiry.EnqryProduct=products.Product_Insert_Id ORDER BY  customer_enquiry.EnqryId DESC';
                
            }
            if($_POST['EnquiryStatus'] == "Open"){
               // $sql ='SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id where customer_lead.LeadStatus="Open" ORDER BY customer_lead.LeadDate DESC';
                  $sql ='SELECT customer_enquiry.*, products.Product_Name,testuser.* FROM customer_enquiry JOIN testuser on customer_enquiry.RegisterBy=testuser.id JOIN products ON customer_enquiry.EnqryProduct=products.Product_Insert_Id where customer_enquiry.Status="Open" ORDER BY  customer_enquiry.EnqryId DESC';
                
            }
            if($_POST['EnquiryStatus'] == "Won"){
                //$sql ='SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id where customer_lead.LeadStatus="Won" ORDER BY customer_lead.LeadDate DESC';
                $sql ='SELECT customer_enquiry.*, products.Product_Name,testuser.* FROM customer_enquiry JOIN testuser on customer_enquiry.RegisterBy=testuser.id JOIN products ON customer_enquiry.EnqryProduct=products.Product_Insert_Id where customer_enquiry.Status="Won" ORDER BY customer_enquiry.EnqryId DESC';
            }
            if($_POST['EnquiryStatus'] == "Drop"){
               // $sql ='SELECT customer_lead.*,testuser.username,companies.CompanyName,contacts.ContactName,products.Product_Name FROM `customer_lead` LEFT JOIN companies ON customer_lead.CompanyInsertId=companies.CompanyInsertId LEFT JOIN contacts ON customer_lead.ContactInsertid=contacts.ContactInsertId LEFT JOIN products ON customer_lead.Product=products.Product_Insert_Id LEFT JOIN testuser ON customer_lead.User_Id=testuser.id where customer_lead.LeadStatus="Drop" ORDER BY customer_lead.LeadDate DESC';
                $sql ='SELECT customer_enquiry.*, products.Product_Name,testuser.* FROM customer_enquiry JOIN testuser on customer_enquiry.RegisterBy=testuser.id JOIN products ON customer_enquiry.EnqryProduct=products.Product_Insert_Id where customer_enquiry.Status="Drop" ORDER BY  customer_enquiry.EnqryId DESC';
            }
        }
        if($result = mysqli_query($conn,$sql)){
                //create an array
                $EnquiryDataArray = array();
                while($row =mysqli_fetch_assoc($result))
                {
                    $EnquiryDataArray[] = $row;
                }
             echo json_encode($EnquiryDataArray);
        }
    
    }
// Display Enquiry Data On Status Base
    
    
    if($_POST['action'] == "Insert_Add_Note_Data"){
        $userid         = $_POST['userid'];
        $EnquiryNo      = $_POST['EnquiryNos'];
        $add_notes      = $_POST['add_notes'];
        $sql = 'insert into enquiry_notes(enquiry_no,addnote_created_by,addnote_details)values("'.$EnquiryNo.'","'.$userid.'","'.$add_notes.'");';
        if(mysqli_query($conn,$sql)){
             $SQL = 'update customer_enquiry set EnqryRemarks="'.$add_notes.'" where EnqryNo="'.$EnquiryNo.'";';
            if(mysqli_query($conn,$SQL)){
                echo "Enquiry Add Note Successfully..";
             }
        }  
    }
    
    if($_POST['action'] == "Enquiry_Update_Status_Data"){
        $EnquiryStatusNo         = $_POST['EnquiryStatusNo'];
        $StatusDate              = $_POST['StatusDate'];
        $EnquiryUpdateStatus     = $_POST['EnquiryUpdateStatus'];
        $EnquiryStatusNotes      = $_POST['EnquiryStatusNotes'];
        $EnquiryCreatedById      = $_POST['EnquiryCreatedById'];
        $sql = 'insert into enquiry_status(enquiry_no,enquiry_status,enquiry_status_notes,enquiry_createdby)values("'.$EnquiryStatusNo.'","'.$EnquiryUpdateStatus.'","'.$EnquiryStatusNotes.'","'.$EnquiryCreatedById.'");';
        if(mysqli_query($conn,$sql)){
             $SQL = 'update customer_enquiry set Status="'.$EnquiryUpdateStatus.'", EnqryClosedDate="'.$StatusDate.'" where EnqryNo="'.$EnquiryStatusNo.'";';
            if(mysqli_query($conn,$SQL)){
                echo "Enquiry Status Updated Successfully..";
             }
        }  
    }
    
    if($_POST['action'] == "Enquiry_Delete_Data"){
        $EnquiryNo                    =   $_POST['EnquiryNo'];
        $SQL_Customer_Enquiry_Delete .= 'delete from customer_enquiry where EnqryNo="'.$EnquiryNo.'";';
        if(mysqli_query($conn,$SQL_Customer_Enquiry_Delete)){ 
            $SQL_Enquiry_Transfer_Delete = 'delete from  enquiry_transfer where enquiry_no="'.$EnquiryNo.'";';
            if(mysqli_query($conn,$SQL_Enquiry_Transfer_Delete)){
                $SQL_Add_Note_Delete = 'delete from  enquiry_notes where enquiry_no="'.$EnquiryNo.'";';
                if(mysqli_query($conn,$SQL_Add_Note_Delete)){
                    $sql_enquiry_status_Delete = 'delete from enquiry_status where enquiry_no="'.$EnquiryNo.'";';
                    if(mysqli_query($conn,$sql_enquiry_status_Delete)){ 
                        echo "Enquiry Deleted Successfully";
                    }
                } 
            }
        }else{
              echo "Error Deleted Enquiry Data";
        }
    }
    
    if($_POST["action"] == "Display_Enquiry_Transfer_Data"){
        $EnquiryNo      =  $_POST["EnquiryNo"];
        $SQL_Transfer_Enquiry_Data = 'SELECT enquiry_transfer.*,testuser.username FROM `enquiry_transfer` join testuser on enquiry_transfer.enquiry_to=testuser.id  where enquiry_transfer.enquiry_no="'.$EnquiryNo.'";';
        if($result = mysqli_query($conn,$SQL_Transfer_Enquiry_Data)){   
            while($row =mysqli_fetch_assoc($result))
            {
               $htmlEnquiryTransferData .='                  
                    <tr>
                    <td style="width:75%;">'.$row["username"].'</td>
                    <td style="width:25%;">'.$row["enquiry_created"].'</td>
                    </tr>';
                echo $htmlEnquiryTransferData;
                
            }
        }
    }
    
    // if($_POST["action"] == "Display_Enquiry_AddNote_Data"){
    //     $EnquiryNo      =  $_POST["EnquiryNo"];
    //     $SQL_Transfer_Enquiry_Data = 'SELECT enquiry_transfer.*,testuser.username FROM `enquiry_transfer` join testuser on enquiry_transfer.enquiry_to=testuser.id  where enquiry_transfer.enquiry_no="'.$EnquiryNo.'";';
    //     if($result = mysqli_query($conn,$SQL_Transfer_Enquiry_Data)){   
    //         while($row =mysqli_fetch_assoc($result))
    //         {
    //           $htmlEnquiryTransferData .='                  
    //                 <tr>
    //                 <td style="width:75%;">'.$row["username"].'</td>
    //                 <td style="width:25%;">'.$row["enquiry_created"].'</td>
    //                 </tr>';
    //             echo $htmlEnquiryTransferData;
                
    //         }
    //     }
    // }
    
    if($_POST["action"] == "Display_Enquiry_Status"){
        $EnquiryNo      =  $_POST["EnquiryNo"];
        $SQL_Status_Enquiry = 'SELECT enquiry_status.*,testuser.username FROM `enquiry_status` join testuser on enquiry_status.enquiry_createdby=testuser.id  where enquiry_status.enquiry_no="'.$EnquiryNo.'";';
        if($result = mysqli_query($conn,$SQL_Status_Enquiry)){   
            while($row =mysqli_fetch_assoc($result))
            {
               $htmlEnquiryStatusData .='                  
                    <tr>
                    <td style="width:75%;">'.$row["enquiry_status"].'</td>
                    <td style="width:25%;">'.$row["enquiry_createdOn"].'</td>
                    </tr>';
                echo $htmlEnquiryStatusData;
                
            }
        }
    }
    
    if($_POST["action"] == "Display_Enquiry_AddNote_Data"){
        $EnquiryNo      =  $_POST["EnquiryNo"];
        $SQL_AddNote_Enquiry = 'SELECT enquiry_notes.*,testuser.username FROM `enquiry_notes` join testuser on enquiry_notes.addnote_created_by=testuser.id  where enquiry_notes.enquiry_no="'.$EnquiryNo.'";';
        if($result = mysqli_query($conn,$SQL_AddNote_Enquiry)){   
            while($row =mysqli_fetch_assoc($result))
            {
               $htmlEnquiryAddNoteData .='                  
                    <tr>
                    <td style="width:75%;">'.$row["addnote_details"].'</td>
                    <td style="width:25%;">'.$row["created_on"].'</td>
                    </tr>';
                echo $htmlEnquiryAddNoteData;
                
            }
        }
    }
    
    
    
    
    
}
?>