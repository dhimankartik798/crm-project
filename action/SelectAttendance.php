<?php
session_start();

include '../DBConfig/database.php';
$html ='';
$SrNo = 1;
if(isset($_POST['action'])){
    if($_POST['action'] == "Display_Attendance_Data"){
        //Fetch Companies Data Start
       // $sql = 'SELECT attendance.* , attendance_vchr.Created_Date FROM `attendance` join attendance_vchr on attendance.VoucherNo = attendance_vchr.VoucherNo ORDER BY AttendanceId DESC';
       $sql = 'SELECT * from attendance';
       if($result = mysqli_query($conn,$sql)){
                //create an array
                //$CompanyArray = array();
                while($row =mysqli_fetch_assoc($result))
                {
                    $html .='                  
                    <tr id="row_'.$row["AttendanceId"].'">
                    <td>'.$SrNo.'</td>
                    <td id="IDDate"  class="sorting_1 Compnys" >'.date("d-m-Y",strtotime($row["Date"])).'</td>
                    <td id="IDStaff"  class="sorting_1 Compnys" >'.$row["Staff"].'</td>
                    <td id="IDPresent_Absents">'.$row["Present_Absent"].'</td>
                    <td id="IDInTime">'.date ('H:i',strtotime($row["InTime"])).'</td>
                    <td id="IDOutTime">'.date ('H:i',strtotime($row["OutTime"])).'</td>
                    <td id="IDConfirmation">'.$row["Confirmation"].'</td>
                    <td id="IDRemark">'.$row["Remark"].'</td>                
                    <td id="IDAction"><button class="btn btn-success delete" style="height: 22px !important;
                    padding: 3px;font-size: 12px;width: 22px;" id="delete" data-formindex="'.$row["AttendanceId"].'"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    
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
        //             padding: 3px;font-size: 12px;width: 22px;" data-formindex="'.$row["AttendanceId"].'"><i class="fa fa-edit" aria-hidden="true"></i></button>
    } 

    if($_POST['action'] == "Display_MaxVoucher_Number"){
       $sql = 'SELECT max(VoucherNo) AS MaxVchr FROM `attendance`';
       if($result = mysqli_fetch_assoc(mysqli_query($conn,$sql))){
           if($result["MaxVchr"] == NuLL){
            echo  $vchrNo = 0;
           }else{
            echo  $vchrNo = $result["MaxVchr"];
           }
       }

    }



    
}