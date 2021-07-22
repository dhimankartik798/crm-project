<?php
session_start();

include '../DBConfig/database.php';

if(isset($_POST['action'])){
	//Delete Company Data In DataBase
	if($_POST['action'] == "Delete_Product_Activation"){
		$ActivatoinInsertId = $_POST['ActivatoinInsertId'];
	    $sql = 'delete from product_activation where ActivationId="'.$ActivatoinInsertId.'"';
			if(mysqli_query($conn,$sql)){
				echo "Product Activation Deleted Successfully..";
			} 
	}
}

?>