<?php
session_start();

include '../DBConfig/database.php';
$query = '';
if(isset($_POST['action'])){
	//Insert Attendance Data In Sql Start 
	if($_POST['action'] == "Insert_ProductActivation_Data"){
         $VoucherNo       = $_POST["VoucherNo"];
         $date            = $_POST["date"];
         $ProductName     = $_POST["ProductName"];
         $SerialNo   	  = $_POST["SerialNo"];
        //  $SerialKey 	  = $_POST["SerialKey"];
         $Pstatus         = $_POST["Pstatus"];
         $AccountName     = $_POST["AccountName"];
         $Billing         = $_POST["Billing"];
         $ContactNo       = $_POST["ContactNo"];
         $EmailId         = $_POST["EmailId"];
         $Lstatus         = $_POST["Lstatus"];
         $Remarks    	  = $_POST["Remarks"];      
        for($count = 0; $count<count($ProductName); $count++)
        {
            $ProductName_clean  = mysqli_real_escape_string($conn, $ProductName[$count]);
            $SerialNo_clean     = mysqli_real_escape_string($conn, $SerialNo[$count]);
            // $SerialKey_clean    = mysqli_real_escape_string($conn, $SerialKey[$count]);
            $Pstatus_clean      = mysqli_real_escape_string($conn, $Pstatus[$count]);
            $AccountName_clean  = mysqli_real_escape_string($conn, $AccountName[$count]);
            $Billing_clean      = mysqli_real_escape_string($conn, $Billing[$count]);
            $EmailId_clean      = mysqli_real_escape_string($conn, $EmailId[$count]);
            $ContactNo_clean    = mysqli_real_escape_string($conn, $ContactNo[$count]);
            $Lstatus_clean      = mysqli_real_escape_string($conn, $Lstatus[$count]);
            $Remarks_clean      = mysqli_real_escape_string($conn, $Remarks[$count]);
            $query .= 'INSERT INTO product_activation(VoucherNo,ActivationDate,PurchaseDate,Product,SerialNo,ActivationStatus,Account,BillingName,EmailId,ContactNo,leadStatus,Remark)
            VALUES("'.$VoucherNo.'","'.$date.'","'.$date.'","'.$ProductName_clean.'","'.$SerialNo_clean.'","'.$Pstatus_clean.'","'.$AccountName_clean.'","'.$Billing_clean.'",
             "'.$EmailId_clean.'","'.$ContactNo_clean.'","'.$Lstatus_clean.'","'.$Remarks_clean.'");';
        }
        if(mysqli_multi_query($conn, $query))
        {
            echo 'Product Activation Created Successfully';
        }else{
            echo 'Error';
        }
                
    }
    
    //Edit Product Activation Data In Sql Start 
	if($_POST['action'] == "Update_Product_Activation_Data"){
	     $ActivationId = $_POST["AlterActivationId"];
         $VoucherNo   = $_POST["AlterVoucherNo"];
         $datee       = $_POST["Alterdate"];
         $date        = date("Y-m-d", strtotime($datee) );
         $Product     = $_POST["AlterProduct"];
         $SerialNo    = $_POST["AlterSerialNo"];
         $Activation  = $_POST["AlterActivation"];
         $Account     = $_POST["AlterAccount"];
         $Billing     = $_POST["AlterBilling"];
         $EmailID     = $_POST["AlterEmailID"];
         $Contact     = $_POST["AlterContact"];
         $LeadStatus  = $_POST["AlterLeadStatus"];
         $Remarks     = $_POST["AlterRemarks"];
      
        $query .= 'update product_activation  SET VoucherNo="'.$VoucherNo.'",ActivationDate="'.$date.'",PurchaseDate="'.$date.'",Product="'.$Product.'",SerialNo="'.$SerialNo.'",ActivationStatus="'.$Activation.'",Account="'.$Account.'",BillingName="'.$Billing.'",EmailId="'.$EmailID.'",ContactNo="'.$Contact.'",leadStatus="'.$LeadStatus.'",Remark="'.$Remarks.'" where ActivationId="'.$ActivationId.'";';
      
        if(mysqli_multi_query($conn, $query))
        {
            echo 'Product Activation Update Successfully';
        }else{
            echo 'Error';
        }
                
    }
}

 ?>