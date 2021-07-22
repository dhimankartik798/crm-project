<?php
session_start();

include '../DBConfig/database.php';
$No = 1;
if(isset($_POST['action'])){
    //Insert Company Data In Sql Start 
    if($_POST['action']    == "Insert_Lead_Data"){
        $CompanyInsertId   = $_POST['CompanyInsertId'];
        $ContactInsertId   = $_POST['ContactInsertId'];
        $ProductsDetails   = $_POST['ProductsDetails'];
        $DealsIn           = $_POST['DealsIn'];
        $description       = $_POST['Description'];
        $RegisterBy        = $_POST['RegisterBy'];
        $date              = $_POST['date'];
        $Userid            = $_POST['Userid'];
        $LeadStatus        = $_POST['Status'];
        $EnqryLeadNo       = $_POST['EnqryLeadNo'];
        $newDate           = date("d-m-Y", strtotime($date));
        $LeadNo            = "MIPL-".$newDate."-";

        $SQL ='SELECT count(LeadNo) As LEADNO FROM `customer_lead` WHERE LeadDate="'.$date.'"';
        if($results= mysqli_fetch_assoc(mysqli_query($conn,$SQL))){
            $Nos = $results["LEADNO"]+1;
            $LeadNo  = $LeadNo.$Nos;
            $SQL_Customer_Lead = 'insert into customer_lead(EnqryNoLead,LeadNo,User_Id,CompanyInsertId,ContactInsertid,Product,DealsIn,LeadRegisterBy,Description,LeadDate,LeadStatus)values("'.$EnqryLeadNo.'","'.$LeadNo.'","'.$Userid.'","'.$CompanyInsertId.'","'.$ContactInsertId.'","'.$ProductsDetails.'","'.$DealsIn.'","'.$RegisterBy.'","'.$description.'","'.$date.'","'.$LeadStatus.'")';
            if(mysqli_query($conn,$SQL_Customer_Lead)){ 
                $SQL_Lead_Transfer = 'insert into transfer_lead(LeadNo,Transfer_Id)values("'.$LeadNo.'","'.$Userid.'")';
                if(mysqli_query($conn,$SQL_Lead_Transfer)){
                    $SQL_Lead_Status = 'insert into status_lead(LeadNo,Lead_Status,CreatedBy)values("'.$LeadNo.'","'.$LeadStatus.'","'.$RegisterBy.'")';
                    if(mysqli_query($conn,$SQL_Lead_Status)){
                        $SQL_Lead_Task = 'insert into task_lead(LeadNo,CreatedBy,Description)values("'.$LeadNo.'","'.$RegisterBy.'","'.$description.'")';
                        if(mysqli_query($conn,$SQL_Lead_Task)){ 
                            $SQL_Customer_Enqry  = 'UPDATE  `customer_enquiry` SET EnqryViewStatus = 0 WHERE EnqryNo = "'.$EnqryLeadNo.'"';
                            if(mysqli_query($conn,$SQL_Customer_Enqry)){
                                echo "Lead Created Successfully..."; 
                            }
                        }
                    } 
                }
            }else{
                  echo "Error Created Lead";
            }
        }
    }

    if($_POST['action'] == "Lead_Transfer_Data"){
        $LeadNo         = $_POST['LeadNo'];
        // $TransferTo     = $_POST['TransferTo']; 
        $TransferID     = $_POST['TransferID'];
        $sql = 'insert into transfer_lead(LeadNo,Transfer_Id)values("'.$LeadNo.'","'.$TransferID.'")';
        if(mysqli_query($conn,$sql)){
            $SQL = 'update customer_lead set User_Id="'.$TransferID.'" where LeadNo="'.$LeadNo.'"';
            if(mysqli_query($conn,$SQL)){
                echo "Lead Transfer Successfully..";
            }
        }  
    }

    if($_POST['action']    == "Lead_Update_Status_Data"){
        $LeadNo       = $_POST['LeadNo'];
        $LeadStatus   = $_POST['Status']; 
        $CreatedBy    = $_POST['CreatedBy']; 
        $LeadClosedOn = $_POST['LeadClosedOn'];
        $SQL = 'insert into status_lead(LeadNo,Lead_Status,CreatedBy)values("'.$LeadNo.'","'.$LeadStatus.'","'.$CreatedBy.'")';
        if(mysqli_query($conn,$SQL)){
            $SQLL = 'update customer_lead set LeadStatus="'.$LeadStatus.'" ,LeadClosedDate="'.$LeadClosedOn.'",  LeadRegisterBy ="'.$CreatedBy.'" where LeadNo="'.$LeadNo.'" ';
            if(mysqli_query($conn,$SQLL)){
                echo "Lead Status Updated Successfully..";
            }
        }
    }

    if($_POST['action'] == "Insert_Lead_Task_Data"){
        $LeadNo           = $_POST['LeadNo'];
        $CreatedByForTask = $_POST['CreatedByForTask'];
        $Description      = $_POST['Description'];
        $sql = 'insert into task_lead(LeadNo,CreatedBy,Description)values("'.$LeadNo.'","'.$CreatedByForTask.'","'.$Description.'")';
        if(mysqli_query($conn,$sql)){
            echo "Task Created Successfully..";
        }
    }

}
?>