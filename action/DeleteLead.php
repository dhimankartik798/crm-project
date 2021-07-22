<?php
session_start();

include '../DBConfig/database.php';

if(isset($_POST['action'])){
	//Delete Company Data In DataBase
	if($_POST['action'] == "Delete_Lead"){
                $LeadId = $_POST['LeadId'];
                $LeadNo = $_POST['LeadNo'];       
                $SQL_Customer_Lead    = 'delete from customer_lead where LeadId="'.$LeadId.'"';
                if(mysqli_query($conn,$SQL_Customer_Lead)){
                        $Sql_Lead_Transfer = 'delete from transfer_lead where LeadNo="'.$LeadNo.'"';
                        if(mysqli_query($conn,$Sql_Lead_Transfer)){
                                $Sql_Lead_Status = 'delete from status_lead where LeadNo="'.$LeadNo.'"';
                                if(mysqli_query($conn,$Sql_Lead_Status)){
                                        $Sql_Task_Lead = 'delete from task_lead where LeadNo="'.$LeadNo.'"';
                                        if(mysqli_query($conn,$Sql_Task_Lead)){
                                                echo "Lead Deleted Successfully..";
                                        }
                                }
                        } 
                } 
	}
	//Delete Company Data In DataBase END 
}

?>