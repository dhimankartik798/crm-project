<?php
session_start();
include '../DBConfig/database.php';
$Ticket_Transfer_Data = '';
$Ticket_Note_Data = '';


if(isset($_POST['action'])){
    if($_POST['action'] == "Display_Ticket_Data"){
        //Fetch Companies Data Start
        //$sql = 'SELECT * FROM `tickets`';
        if($_SESSION['user_type'] == "user"){
           // $sql ='SELECT tickets.*,companies.CompanyName FROM `tickets` JOIN companies ON companies.CompanyInsertId = tickets.CompanyInsertId where tickets.Userid ="'.$_SESSION['id'].'"';
             $sql='SELECT tickets.*,companies.CompanyName,contacts.ContactName FROM `tickets` JOIN companies ON companies.CompanyInsertId = tickets.CompanyInsertId JOIN contacts ON contacts.ContactInsertId=tickets.contact_insert_id where tickets.ComplaintStatus="Open" AND tickets.Userid ="'.$_SESSION['id'].'"  ORDER BY tickets.TicketInsertId DESC';
        }
        if($_SESSION['user_type'] == "admin"){
           // $sql ='SELECT tickets.*,companies.CompanyName FROM `tickets` JOIN companies ON companies.CompanyInsertId = tickets.CompanyInsertId';
            $sql ='SELECT tickets.*,companies.CompanyName,contacts.ContactName FROM `tickets` JOIN companies ON companies.CompanyInsertId = tickets.CompanyInsertId JOIN contacts ON contacts.ContactInsertId=tickets.contact_insert_id where tickets.ComplaintStatus="Open" ORDER BY tickets.TicketInsertId DESC';
        }
        if($result = mysqli_query($conn,$sql)){
                //create an array
                $TicketArray = array();
                while($row =mysqli_fetch_assoc($result))
                {
                    $TicketArray[] = $row;
                }
             echo json_encode($TicketArray);
        }
        //Fetch Companies Data 	End
    } 

    if($_POST['action'] == "Display_Ticket_On_Status_Base"){
        //Fetch Companies Data Start
        if($_SESSION['user_type'] == "user"){
            if($_POST['TicketStatus'] == "All Tickets"){
                $sql ='SELECT tickets.*,companies.CompanyName,contacts.ContactName FROM `tickets` JOIN companies ON companies.CompanyInsertId = tickets.CompanyInsertId JOIN contacts ON contacts.ContactInsertId=tickets.contact_insert_id where tickets.Userid ="'.$_SESSION['id'].'"  ORDER BY tickets.TicketInsertId DESC';
            }elseif($_POST['TicketStatus'] == "Open Tickets"){
                $sql ='SELECT tickets.*,companies.CompanyName,contacts.ContactName FROM `tickets` JOIN companies ON companies.CompanyInsertId = tickets.CompanyInsertId JOIN contacts ON contacts.ContactInsertId=tickets.contact_insert_id where tickets.ComplaintStatus="Open" AND tickets.Userid ="'.$_SESSION['id'].'" ORDER BY tickets.TicketInsertId DESC';
            }elseif($_POST['TicketStatus'] == "Hold Tickets"){
                $sql ='SELECT tickets.*,companies.CompanyName,contacts.ContactName FROM `tickets` JOIN companies ON companies.CompanyInsertId = tickets.CompanyInsertId JOIN contacts ON contacts.ContactInsertId=tickets.contact_insert_id where tickets.ComplaintStatus="Hold" AND tickets.Userid ="'.$_SESSION['id'].'" ORDER BY tickets.TicketInsertId DESC';
            }elseif($_POST['TicketStatus'] == "Closed Tickets"){
                $sql ='SELECT tickets.*,companies.CompanyName,contacts.ContactName FROM `tickets` JOIN companies ON companies.CompanyInsertId = tickets.CompanyInsertId JOIN contacts ON contacts.ContactInsertId=tickets.contact_insert_id where tickets.ComplaintStatus="Closed" AND tickets.Userid ="'.$_SESSION['id'].'" ORDER BY tickets.TicketInsertId DESC';
            }else{
                $sql ='SELECT tickets.*,companies.CompanyName,contacts.ContactName FROM `tickets` JOIN companies ON companies.CompanyInsertId = tickets.CompanyInsertId JOIN contacts ON contacts.ContactInsertId=tickets.contact_insert_id where tickets.ComplaintStatus="Open" AND tickets.Userid ="'.$_SESSION['id'].'" ORDER BY tickets.TicketInsertId DESC';
            }
        }

        if($_SESSION['user_type'] == "admin"){

           // $sql ='SELECT tickets.*,companies.CompanyName FROM `tickets` JOIN companies ON companies.CompanyInsertId = tickets.CompanyInsertId';
           if($_POST['TicketStatus'] == "All Tickets"){
                $sql ='SELECT tickets.*,companies.CompanyName,contacts.ContactName FROM `tickets` JOIN companies ON companies.CompanyInsertId = tickets.CompanyInsertId JOIN contacts ON contacts.ContactInsertId=tickets.contact_insert_id ORDER BY tickets.TicketInsertId DESC';
            }elseif($_POST['TicketStatus'] == "Open Tickets"){
                $sql ='SELECT tickets.*,companies.CompanyName,contacts.ContactName FROM `tickets` JOIN companies ON companies.CompanyInsertId = tickets.CompanyInsertId JOIN contacts ON contacts.ContactInsertId=tickets.contact_insert_id where tickets.ComplaintStatus="Open" ORDER BY tickets.TicketInsertId DESC';
            }elseif($_POST['TicketStatus'] == "Hold Tickets"){
                $sql ='SELECT tickets.*,companies.CompanyName,contacts.ContactName FROM `tickets` JOIN companies ON companies.CompanyInsertId = tickets.CompanyInsertId JOIN contacts ON contacts.ContactInsertId=tickets.contact_insert_id where tickets.ComplaintStatus="Hold" ORDER BY tickets.TicketInsertId DESC';
            }elseif($_POST['TicketStatus'] == "Closed Tickets"){
                $sql ='SELECT tickets.*,companies.CompanyName,contacts.ContactName FROM `tickets` JOIN companies ON companies.CompanyInsertId = tickets.CompanyInsertId JOIN contacts ON contacts.ContactInsertId=tickets.contact_insert_id where tickets.ComplaintStatus="Closed" ORDER BY tickets.TicketInsertId DESC';
            }else{
                $sql ='SELECT tickets.*,companies.CompanyName,contacts.ContactName FROM `tickets` JOIN companies ON companies.CompanyInsertId = tickets.CompanyInsertId JOIN contacts ON contacts.ContactInsertId=tickets.contact_insert_id where tickets.ComplaintStatus="Open" ORDER BY tickets.TicketInsertId DESC';
            }
        }

        if($result = mysqli_query($conn,$sql)){
                //create an array
                $TicketArray = array();
                while($row =mysqli_fetch_assoc($result))
                {
                    $TicketArray[] = $row;
                }
             echo json_encode($TicketArray);
        }
        //Fetch Companies Data 	End
    }


    // Display Ticket Transfer Data In Report
    if($_POST['action'] == "Display_Ticket_Transfer_Data"){
        //Fetch Companies Data Start
        //$sql = 'SELECT * FROM `tickets`';
        $sql ='SELECT * from ticket_transfer where TicketNo ="'.$_POST["TicketNo"].'"';
        if($result = mysqli_query($conn,$sql)){
                //create an array
                //$TicketArray = array();
                while($row =mysqli_fetch_assoc($result))
                {                  
                 $Ticket_Transfer_Data .= '<tr id="row_'.$row["ticket_trnsfer_id"].'">
                    <td>'.$row["TicketNo"].'</td>
                    <td>'.$row["Transfer_To"].'</td>              
                    <td id="IDTicketNo">'.$row["ticket_created"].'</td>                   
                    </center>
                    </tr>';
                    //$TicketArray[] = $row;
                }
             echo $Ticket_Transfer_Data;
        }
        // 	End
    } 

     // Display Ticket  Add Note Data In Report
     if($_POST['action'] == "Display_Ticket_AddNote_Data"){
        $sql ='SELECT * from ticket_notes';
        if($result = mysqli_query($conn,$sql)){             
                while($row =mysqli_fetch_assoc($result))
                { 
                 $Ticket_Note_Data .= '<tr id="row_'.$row["Ticket_Note_Id"].'">
                    <td>'.$row["TicketNo"].'</td>
                    <td>'.$row["AddNote_Details"].'</td> 
                    <td>'.$row["Created_on"].'</td>             
                    <td id="IDTicketNo">'.$row["AddNote_Created_By"].'</td>                   
                    </center>
                    </tr>';   
                }
             echo $Ticket_Note_Data;
        }
        // 	End
    } 
}

?> 
