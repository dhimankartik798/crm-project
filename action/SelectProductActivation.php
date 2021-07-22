<?php
session_start();

include '../DBConfig/database.php';
$html ='';
$SrNo = 1;
$status = '';
$BillStatus = '';
$Remarks = '';
$ActivationStatus ='';
if(isset($_POST['action'])){
    if($_POST['action'] == "Display_ProductActivation_Data"){
        //Fetch Companies Data Start
       // $sql = 'SELECT attendance.* , attendance_vchr.Created_Date FROM `attendance` join attendance_vchr on attendance.VoucherNo = attendance_vchr.VoucherNo ORDER BY AttendanceId DESC';
       $sql = 'SELECT product_activation.*,contacts.ContactName from product_activation JOIN contacts ON product_activation.Account=contacts.ContactInsertId ORDER BY product_activation.ActivationDate DESC';
       if($result = mysqli_query($conn,$sql)){
                //create an array
              //  $CompanyArray = array();
                
                while($row =mysqli_fetch_assoc($result))
                {
                   // $CompanyArray[] = $row;
                    if($row["leadStatus"] == "Done"){
                        $status = '<b style="color:green;">Done</b>';
                    }
                    if($row["leadStatus"] == "Pending"){
                        $status = '<b style="color:red;">Pending</b>';
                    }
                    
                    if($row["ActivationStatus"] == "Done"){
                        $ActivationStatus = '<b style="color:green;">Done</b>';
                    }
                    if($row["ActivationStatus"] == "Pending"){
                        $ActivationStatus = '<b style="color:red;">Pending</b>';
                    }
                    if($row["Remark"] =="Direct Online"){
                        $Remarks = '<b style="color:green;">'.$row["Remark"].'</b>';
                    }else{
                        $Remarks = $row["Remark"];
                    }
                    
                    if($row["BillingName"] == "Bill Pending"){
                         $BillStatus = '<b style="color:red;">'.$row["BillingName"].'</b>';
                    }else{
                        $BillStatus =  $row["BillingName"];
                    }
                    	
                    
                    $html .='                  
                    <tr id="row_'.$row["ActivationId"].'">
                    <td style="width:3%;text-align:center;">&nbsp;</td>
                    <td style="width:4%;Display:none;" id="IDVchrNo">'.$row["VoucherNo"].'</td>
                    <td style="width:4%;Display:none;" id="IDContact">'.$row["ContactNo"].'</td>
                    <td id="IDDate" style="width:6%;" class="sorting_1 Compnys" style="text-align:right;" >'.date("d-m-Y",strtotime($row["ActivationDate"])).'</td>
                    <td id="IDStaff" style="width:14%;" class="sorting_1 Compnys" >'.$row["Product"].'</td>
                    <td id="IDSerialNo" style="width:7%;text-align:right;">'.$row["SerialNo"].'</td>
                    <td id="IDActivationStatus" style="width:6%;padding-left:8px!important;">'.$ActivationStatus.'</td>
                    <td id="IDAccount" style="width:12%;display:none;">'.$row["Account"].'</td>
                    <td style="width:8%;">'.$row["ContactName"].'</td>
                    <td id="IDBillingName" style="width:17%;">'.$BillStatus.'</td>
                    <td id="IDEmailId" style="width:18%;">'.$row["EmailId"].'</td>
                    <td id="IDleadStatus" style="width:5%;padding-left:12px !important;">'.$status.'</td>
                    <td id="IDRemark" style="width:10%;">'.$Remarks.'</td>  
                    <td id="IDAction" style="width:4%;"><center>
                    <div class="btn-group" style="display: block !important;">
                      <i class="fa fa-mail-forward" dropdown-toggle" data-toggle="dropdown"></i>
                      <div class="dropdown-menu">
                         <a class="dropdown-item delete" href="#" data-formindex="'.$row["ActivationId"].'"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                         <a class="dropdown-item edit" data-toggle="modal" data-target="#myModal" href="#" data-formindex="'.$row["ActivationId"].'"><i class="fa fa-edit" aria-hidden="true"></i>Edit</a>
                         <a class="dropdown-item CompanyProduct" href="#" data-formindex="'.$row["ActivationId"].'"><i class="fa fa-home" aria-hidden="true"></i>Company Product</a>
                      </div></center>
                    </td>
                    </tr>
                    ';   
                    $SrNo = $SrNo+1;
                
                 }
            // echo json_encode($CompanyArray);
                 echo $html;
        }
        //Fetch Companies Data 	End
        
        //  <button class="btn btn-success CompanyProduct" style="height: 22px !important;
        //             padding: 3px;font-size: 12px;width: 22px;" data-formindex="'.$row["ActivationId"].'"><i class="fa fa-tags" aria-hidden="true"></i></button>

        // <button class="btn btn-success edit" data-toggle="modal" data-target="#myModal" style="height: 22px !important;
        //             padding: 3px;font-size: 12px;width: 22px;" data-formindex="'.$row["AttendanceId"].'"><i class="fa fa-edit" aria-hidden="true"></i></button>
    } 

    if($_POST['action'] == "Display_MaxVoucher_Number"){
       $sql = 'SELECT max(VoucherNo) AS MaxVchr FROM `product_activation`';
       if($result = mysqli_fetch_assoc(mysqli_query($conn,$sql))){
           if($result["MaxVchr"] == NuLL){
            echo  $vchrNo = 0;
           }else{
            echo  $vchrNo = $result["MaxVchr"];
           }
       }

    }



    
}