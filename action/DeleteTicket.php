<?php
session_start();

include '../DBConfig/database.php';

if(isset($_POST['action'])){
	//Delete Company Data In DataBase
	if($_POST['action'] == "Delete_Ticket"){
		$TicketInsertId = $_POST['TicketInsertId'];
	    $sql = 'delete from tickets where TicketNo="'.$TicketInsertId.'"';
			if(mysqli_query($conn,$sql)){
				$Sql_Ticket_Transfer = 'delete from ticket_transfer where TicketNo="'.$TicketInsertId.'"';
				if(mysqli_query($conn,$Sql_Ticket_Transfer)){
					$Sql_Ticket_Note = 'delete from ticket_notes where TicketNo="'.$TicketInsertId.'"';
					if(mysqli_query($conn,$Sql_Ticket_Note)){
						echo "Ticket Deleted Successfully..";
					}
				} 
			} 
	}
	//Delete Company Data In DataBase END 
}

?>