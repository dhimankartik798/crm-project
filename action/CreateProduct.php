<?php
session_start();

include '../DBConfig/database.php';

if(isset($_POST['action'])){
	//Insert Product Data In Sql Start 
	if($_POST['action'] == "Insert_Product_Data"){
		$ProductName = $_POST['ProductName'];
	    $sql = 'insert into products(Product_Name)values("'.$ProductName.'")';
		if(mysqli_query($conn,$sql)){
			echo "Product Created Successfully..";
		}else{
			echo "Product Is Already Created..";
		}
	}

	if($_POST['action'] == "Display_Product_Data"){
        //Fetch Product Data Start
        $sql = 'SELECT * FROM `products` ORDER BY Product_Name ASC';
        if($result = mysqli_query($conn,$sql)){
                //create an array
                $ProductArray = array();
                while($row =mysqli_fetch_assoc($result))
                {
                    $ProductArray[] = $row;
                }
             echo json_encode($ProductArray);
        }
        //Fetch Product Data End
    }  
    
    //Update Product Data In Sql Start 
	if($_POST['action'] == "Update_Product_Data"){
		$ProductName  = $_POST['ProductName'];
		$Product_Id   = $_POST['Product_Id'];
	    $sql = 'update products SET Product_Name="'.$ProductName.'" where Product_Insert_Id = "'.$Product_Id.'"';
		if(mysqli_query($conn,$sql)){
			echo "Product Updated Successfully..";
		}
	}
}
?>