<?php
session_start();

include '../DBConfig/database.php';
$No = 1;
if(isset($_POST['action'])){

    if($_POST['action'] == "Enquiry_Transfer_Data"){
        $EnquiryNo      = $_POST['EnquiryNo'];
        $TransferID     = $_POST['TransferID'];
        $TransferDate   = $_POST['TransferDate'];
        $sql = 'insert into enquiry_transfer(enquiry_no,enquiry_to,enquiry_created)values("'.$EnquiryNo.'","'.$TransferID.'","'.$TransferDate.'")';
        if(mysqli_query($conn,$sql)){
             $SQL = 'update customer_enquiry set RegisterBy="'.$TransferID.'" where EnqryNo="'.$EnquiryNo.'"';
            if(mysqli_query($conn,$SQL)){
                echo "Enquiry Transfer Successfully..";
             }
        }  
    }
}
?>