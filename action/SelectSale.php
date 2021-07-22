<?php
session_start();

include '../DBConfig/database.php';
$html ='';
$SrNo = 1;
$status = '';
$ActivationStatus ='';
if(isset($_POST['action'])){
    if($_POST['action'] == "Display_SaleInvoice_Data"){
        //Fetch Companies Data Start
       // $sql = 'SELECT attendance.* , attendance_vchr.Created_Date FROM `attendance` join attendance_vchr on attendance.VoucherNo = attendance_vchr.VoucherNo ORDER BY AttendanceId DESC';
       $sql = 'SELECT * from  sale_invoice';
       if($result = mysqli_query($conn,$sql)){
                //create an array
              //  $CompanyArray = array();
                
                while($row =mysqli_fetch_assoc($result))
                {
                   // $CompanyArray[] = $row;
                    // if($row["leadStatus"] == "Done"){
                    //     $status = '<b style="color:green;">Done</b>';
                    // }
                    // if($row["leadStatus"] == "Pending"){
                    //     $status = '<b style="color:red;">Pending</b>';
                    // }
                    
                    // if($row["ActivationStatus"] == "Done"){
                    //     $ActivationStatus = '<b style="color:green;">Done</b>';
                    // }
                    // if($row["ActivationStatus"] == "Pending"){
                    //     $ActivationStatus = '<b style="color:red;">Pending</b>';
                    // }
                    $html .='                  
                    <tr id="row_'.$row["sale_id"].'">
                    <td style="width:5%;">'.$SrNo.'</td>
                    <td style="width:10%;" id="IDVchrNo">'.date("d-m-Y",strtotime($row["bill_date"])).'</td>
                    <td style="width:10%;" id="IDContact">'.$row["bill_no"].'</td>
                    <td id="IDDate" style="width:10%;" class="sorting_1 Compnys" style="text-align:right;" >'.$row["agent_id"].'</td>
                    <td id="IDStaff" style="width:10%;" class="sorting_1 Compnys" >'.$row["billing_name"].'</td>
                    <td id="IDSerialNo" style="width:10%;text-align:left;">'.$row["product_id"].'</td>
                    <td id="IDActivationStatus" style="width:10%;padding-left:8px!important;">'.$row["serial_no"].'</td>
                    <td id="IDAccount" style="width:10%;">'.$row["goods_amount"].'</td>
                    <td id="IDBillingName" style="width:5%;display:none;">'.$row["tax_amount"].'</td>
                    <td id="IDEmailId" style="width:5%;display:none;">'.$row["bill_amount"].'</td>
                    <td id="IDleadStatus" style="width:5%;padding-left:12px !important;">'.$row["agent_rate"].'</td>
                    <td id="IDRemark" style="width:15%;">'.$row["commision"].'</td>                
                    <td id="IDAction" style="width:5%;"><center><button class="btn btn-success delete" style="height: 22px !important;
                    padding: 3px;font-size: 12px;width: 22px;" id="delete" data-formindex="'.$row["sale_id"].'"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    
                    </center>
                    </td>
                    </tr>
                    ';   
                    $SrNo = $SrNo+1;
                
                 }
            // echo json_encode($CompanyArray);
                 echo $html;
        }
        //Fetch Companies Data 	End

    // <button class="btn btn-success edit" data-toggle="modal" data-target="#myModal" style="height: 22px !important;
    //                 padding: 3px;font-size: 12px;width: 22px;" data-formindex="'.$row["sale_id"].'"><i class="fa fa-edit" aria-hidden="true"></i></button>
    //                  <button class="btn btn-success CompanyProduct" style="height: 22px !important;
    //                 padding: 3px;font-size: 12px;width: 22px;" data-formindex="'.$row["sale_id"].'"><i class="fa fa-home" aria-hidden="true"></i></button>


        // <button class="btn btn-success edit" data-toggle="modal" data-target="#myModal" style="height: 22px !important;
        //             padding: 3px;font-size: 12px;width: 22px;" data-formindex="'.$row["AttendanceId"].'"><i class="fa fa-edit" aria-hidden="true"></i></button>
    } 

    if($_POST['action'] == "Display_MaxVoucher_Number"){
       $sql = 'SELECT max(voucher_no) AS MaxVchr FROM `sale_invoice`';
       if($result = mysqli_fetch_assoc(mysqli_query($conn,$sql))){
           if($result["MaxVchr"] == NuLL){
            echo  $vchrNo = 0;
           }else{
            echo  $vchrNo = $result["MaxVchr"];
           }
       }

    }



    
}