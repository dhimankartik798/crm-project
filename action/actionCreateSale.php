<?php
session_start();

include '../DBConfig/database.php';
$query = '';
if(isset($_POST['action'])){
	//Insert Attendance Data In Sql Start 
	if($_POST['action'] == "Insert_Sale_invoice_Data"){
         $VoucherNo       = $_POST["VoucherNo"];
         $Bill_Date       = $_POST["Bill_Date"];
         $Bill_No         = $_POST["Bill_No"];
         $Agent_Name   	  = $_POST["Agent_Name"];
         $Billing_Name    = $_POST["Billing_Name"];
         $Product         = $_POST["Product"];
         $Serial_No       = $_POST["Serial_No"];
         $Goods_Amount    = $_POST["Goods_Amount"];
         $Tax_Amount      = $_POST["Tax_Amount"];
         $Bill_Amount     = $_POST["Bill_Amount"];
         $Agent_Rate      = $_POST["Agent_Rate"];  
         $Commission      = $_POST["Commission"];

        for($count = 0; $count<count($Billing_Name); $count++)
        {
            $Bill_Date_clean    = mysqli_real_escape_string($conn, $Bill_Date[$count]);
            $Bill_No_clean       = mysqli_real_escape_string($conn, $Bill_No[$count]);
            $Agent_Name_clean    = mysqli_real_escape_string($conn, $Agent_Name[$count]);
            $Billing_Name_clean  = mysqli_real_escape_string($conn, $Billing_Name[$count]);
            $Product_clean       = mysqli_real_escape_string($conn, $Product[$count]);
            $Serial_No_clean     = mysqli_real_escape_string($conn, $Serial_No[$count]);
            $Goods_Amount_clean  = mysqli_real_escape_string($conn, $Goods_Amount[$count]);
            $Tax_Amount_clean    = mysqli_real_escape_string($conn, $Tax_Amount[$count]);
            $Bill_Amount_clean   = mysqli_real_escape_string($conn, $Bill_Amount[$count]);
            $Agent_Rate_clean    = mysqli_real_escape_string($conn, $Agent_Rate[$count]);
            $Commission_clean    = mysqli_real_escape_string($conn, $Commission[$count]);
            
            $query .= 'INSERT INTO sale_invoice(voucher_no,bill_date,bill_no,agent_id,billing_name,product_id,serial_no,goods_amount,tax_amount,bill_amount,agent_rate,commision)
            VALUES("'.$VoucherNo.'","'.$Bill_Date_clean.'","'.$Bill_No_clean.'","'.$Agent_Name_clean.'","'.$Billing_Name_clean.'","'.$Product_clean.'","'.$Serial_No_clean.'","'.$Goods_Amount_clean.'",
             "'.$Tax_Amount_clean.'","'.$Bill_Amount_clean.'","'.$Agent_Rate_clean.'","'.$Commission_clean.'");';
        }
        if(mysqli_multi_query($conn, $query))
        {
            echo 'Sale Invoice Created Successfully';
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