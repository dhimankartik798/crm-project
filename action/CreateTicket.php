<?php
session_start();

include '../DBConfig/database.php';
$No = 1;
if(isset($_POST['action'])){
    //Insert Company Data In Sql Start 
    if($_POST['action'] == "Insert_Ticket_Data"){
        $AmcsInsertId      = $_POST['AmcsInsertId'];
        $Userid            = $_POST['Userid'];
        $CompanyInsertId   = $_POST['CompanyInsertId'];
        $ContactInsertId   = $_POST['ContactInsertId'];
        $description       = $_POST['description'];
        $RegisterBy        = $_POST['RegisterBy'];
        $AssignedTo        = $_POST['AssignedTo'];
        $date              = $_POST['date'];
        // $TicketNo       = "MIPL-".$_POST['date']."-";
        $TicketNo          = "TKT889900";
        
       // $SQL ='SELECT count(TicketNo) As Ticket FROM `tickets` WHERE ComplaintRegisteredOn="'.$date.'"';
         $SQL ='SELECT count(TicketNo) As Ticket FROM `tickets`';
        if($results= mysqli_fetch_assoc(mysqli_query($conn,$SQL))){
            $Nos = $results["Ticket"]+1;
            $TicketNo  = $TicketNo.$Nos;
            $sql = 'insert into tickets(TicketNo,Userid,CompanyInsertId,contact_insert_id,AMCInsertId,ComplaintDetails,AssignedTo,ComplaintStatus,ComplaintRegisteredOn,ComplainRegisteredBy)values("'.$TicketNo.'","'.$Userid.'","'.$CompanyInsertId.'","'.$ContactInsertId.'","'.$AmcsInsertId.'","'.$description.'","'.$AssignedTo.'","Open","'.$date .'","Null")';
            if(mysqli_query($conn,$sql)){ 
                $SQL = 'insert into ticket_transfer(TicketNo,Transfer_To)values("'.$TicketNo.'","'.$AssignedTo.'")';
                if(mysqli_query($conn,$SQL)){
                    echo "Ticket Generated  Successfully..";  
                }
            }else{
                  echo "Close First Ticket than New Ticket is Generated..";
            }
        }
    }

    if($_POST['action'] == "Insert_Ticket_AddNote_Data"){
        $TicketNo = $_POST['TicketNos'];
        $CreatedBy = $_POST['CreatedBy'];
        $add_notes = $_POST['add_notes'];
        $sql = 'insert into ticket_notes(TicketNo,AddNote_Created_By,AddNote_Details)values("'.$TicketNo.'","'.$CreatedBy.'","'.$add_notes.'")';
        if(mysqli_query($conn,$sql)){
            // $SQL = 'update tickets set add_notes="'.$add_notes.'" where TicketInsertId="'.$TicketNo.'" ';
            // if(mysqli_query($conn,$SQL)){
                echo "Note Add Successfully..";
            //}
        }
    }

    if($_POST['action'] == "Ticket_Transfer_Data"){
        $TicketNo    = $_POST['TicketNo'];
        $Userid      = $_POST['Userid'];
        $TransferTo  = $_POST['TransferTo'];     
        $sql = 'insert into ticket_transfer(TicketNo,Transfer_To)values("'.$TicketNo.'","'.$TransferTo.'")';
        if(mysqli_query($conn,$sql)){
            $SQL = 'update tickets set AssignedTo="'.$TransferTo.'", Userid="'.$Userid.'" where TicketNo="'.$TicketNo.'" ';
            if(mysqli_query($conn,$SQL)){
                echo "Ticket Transfer Successfully..";
            }
        }
        // else{
        //     echo "Close First Ticket than New Ticket is Generated..";
        // }  
    }

    if($_POST['action'] == "Ticket_Update_Status_Data"){
        $TicketNo          = $_POST['TicketNo'];
        $Status            = $_POST['Status']; 
        $ComplatinClosedOn = $_POST['ComplatinClosedOn'];
        $SQL = 'update tickets set ComplaintStatus="'.$Status.'" , ComplatinClosedOn ="'.$ComplatinClosedOn.'" where TicketNo="'.$TicketNo.'" ';
        if(mysqli_query($conn,$SQL)){
            echo "Ticket Status Updated Successfully..";
        }
    }

}
?>