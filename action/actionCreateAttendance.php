<?php
session_start();

include '../DBConfig/database.php';
$query = '';
if(isset($_POST['action'])){
	//Insert Attendance Data In Sql Start 
	if($_POST['action'] == "Insert_Attendance_Data"){
	    //$ProductQuality = array();
         $StaffName       = $_POST["StaffName"];
         $PA              = $_POST["PA"];
         $InTime   	      = $_POST["InTime"];
         $OutTime   	  = $_POST["OutTime"];
         $Confirmation 	  = $_POST["Confirmation"];
         $Remarks    	  = $_POST["Remarks"];      
         $VoucherNo       = $_POST["VoucherNo"];
         $date 		      = $_POST["date"];
        // $sql = 'INSERT INTO attendance_vchr(VoucherNo,Created_Date)VALUES("'.$VoucherNo.'","'.$date .'")';
        //   if(mysqli_query($conn, $sql))
        //   {
             for($count = 0; $count<count($StaffName); $count++)
             {
                  $StaffName_clean       = mysqli_real_escape_string($conn, $StaffName[$count]);
                  $PA_clean              = mysqli_real_escape_string($conn, $PA[$count]);
            	  $InTime_clean          = mysqli_real_escape_string($conn, $InTime[$count]);
            	  $OutTime_clean         = mysqli_real_escape_string($conn, $OutTime[$count]);
            	  $Confirmation_clean    = mysqli_real_escape_string($conn, $Confirmation[$count]);
            	  $Remarks_clean         = mysqli_real_escape_string($conn, $Remarks[$count]);
          	      $query .= '
            	  INSERT INTO attendance(VoucherNo,Staff,Present_Absent,Date,InTime,OutTime,Confirmation,Remark)
            	   VALUES("'.$VoucherNo.'","'.$StaffName_clean.'","'.$PA_clean.'","'.$date.'","'.$InTime_clean.'","'.$OutTime_clean.'","'.$Confirmation_clean.'", "'.$Remarks_clean.'");';
             }
            if(mysqli_multi_query($conn, $query))
            {
                echo 'Attendance Registered Successfully';
            }else{
                echo 'Error';
            }
        //   }
                
    }
}

 ?>