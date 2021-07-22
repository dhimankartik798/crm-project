<?php
session_start();

include '../DBConfig/database.php';

if(isset($_POST['action'])){
	//Delete Company Data In DataBase
	if($_POST['action'] == "Delete_Sale_Data"){
		$SaleId         = $_POST['SaleId'];
	    $sql = 'delete from sale_invoice where sale_id="'.$SaleId.'"';
			if(mysqli_query($conn,$sql)){
				echo "Sale Voucher Deleted Successfully..";
			} 
	}
}

?>