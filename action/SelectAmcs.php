<?php
session_start();

include '../DBConfig/database.php';
$htmlData = '';
$SerialNoData = '';
$SNo =1;
if($_POST['action'] == "Display_ProductAmcs_Data"){
	    // $sql = 'SELECT location_contact_compny.ContactInsertId , GROUP_CONCAT(DISTINCT companies.CompanyName) as CompaniesNames,contacts.MobileNumber,contacts.WhatsApp,contacts.ContactName,contacts.Designation FROM companies JOIN location_contact_compny ON companies.CompanyInsertId = location_contact_compny.CompanyInsertId JOIN contacts ON contacts.ContactInsertId = location_contact_compny.ContactInsertId GROUP BY contacts.ContactInsertId';
	    //$sql = 'SELECT add_product_compny.*,amcss.*,products.Product_Name,companies.CompanyName FROM add_product_compny JOIN amcss ON add_product_compny.Prodct_Compny_Id = amcss.Prodct_Compny_Id JOIN products ON products.Product_Insert_Id =add_product_compny.Product_Insert_Id JOIN companies ON companies.CompanyInsertId = add_product_compny.CompanyInsertId';
	    // $sql = 'SELECT add_product_compny.*,amcss.*,products.Product_Name,companies.CompanyName FROM add_product_compny LEFT JOIN amcss ON add_product_compny.Prodct_Compny_Id = amcss.Prodct_Compny_Id LEFT JOIN products ON products.Product_Insert_Id =add_product_compny.Product_Insert_Id LEFT JOIN companies ON companies.CompanyInsertId = add_product_compny.CompanyInsertId';
	    $sql = 'SELECT add_product_compny.*,amcss_details.*,products.Product_Name,companies.CompanyName FROM add_product_compny LEFT JOIN amcss_details ON add_product_compny.Prodct_Compny_Id = amcss_details.Prodct_Compny_Id LEFT JOIN products ON products.Product_Insert_Id =add_product_compny.Product_Insert_Id LEFT JOIN companies ON companies.CompanyInsertId = add_product_compny.CompanyInsertId where amcss_details.Prodct_Compny_Id="'.$_POST["PID"].'"';
		if($result = mysqli_query($conn,$sql)){
				//create an array
				//$CompanyArray = array();
				$SerialNoData .= '<option value="Select Companies">Select Serial No </option>';
				while($row =mysqli_fetch_assoc($result))
				{
                    $FromDate     = date("d-m-Y", strtotime($row["AMCFromDate"]));
                    $ExpireOnDate = date("d-m-Y", strtotime($row["AMCExpiresOn"]));
                     $InvoiceDate = date("d-m-Y", strtotime($row["InvoiceDate"]));
					//$CompanyArray[] = $row;
					$htmlData .= '<tr id="row_'.$row["AMCDetailInsertId"].'">
					<td id="IDInvoiceDate">'.$InvoiceDate.'</td>
					<td id="IDInvoiceNo">'.$row["InvoiceNo"].'</td>
					<td id="IDCompanyName" style="display:none;">'.$row["CompanyName"].'</td>
					<td id="IDProduct_Name" style="display:none;">'.$row["Product_Name"].'</td>
					<td id="IDSerial_No">'.$row["Serial_No"].'</td>
					<td style="display:none;">'.$row["Email_id"].'</td>
					<td id="IDAMCFromDate">'.$FromDate.'</td>
					<td id="IDAMCExpiresOn">'.$ExpireOnDate.'</td>
					<td id="IDDescription">'.$row["Description"].'</td>
					<td id="IDAction"><button class="btn btn-success delete" style="height: 22px !important;padding: 3px;font-size: 12px;width: 22px;" data-formindex="'.$row["AMCDetailInsertId"].'"><i class="fa fa-trash" aria-hidden="true"></i></button>
					<button class="btn btn-success edit" style="height: 22px !important;padding: 3px;font-size: 12px;width: 22px;" data-formindex="'.$row["AMCDetailInsertId"].'"  data-toggle="modal" data-target="#AMCEDITModal"><i class="fa fa-edit" aria-hidden="true"></i></button></td>
					</tr>';
					$SNo = $SNo+1;
				}
			 //echo json_encode($CompanyArray);
				echo $htmlData;
		}
	//Fetch Contact Data End
}

if($_POST['action'] == "Display_Table_Head_Detail_ProductAmcs_Data"){
    $SQLData =  'SELECT add_product_compny.*,products.Product_Name,companies.CompanyName FROM add_product_compny LEFT JOIN products ON products.Product_Insert_Id =add_product_compny.Product_Insert_Id LEFT JOIN companies ON companies.CompanyInsertId = add_product_compny.CompanyInsertId where add_product_compny.Prodct_Compny_Id="'.$_POST["PID"].'"';
	if($result = mysqli_query($conn,$SQLData)){
		//create an array
		$data_Array = array();
		while($row =mysqli_fetch_assoc($result))
		{
			$data_Array[] = $row;
		}
		echo json_encode($data_Array);
	}
}

// Serial No Data for Ticket Generate
// if($_POST['action'] == "Display_ProductAmcs_Serial_Data"){
// 	// $sql = 'SELECT location_contact_compny.ContactInsertId , GROUP_CONCAT(DISTINCT companies.CompanyName) as CompaniesNames,contacts.MobileNumber,contacts.WhatsApp,contacts.ContactName,contacts.Designation FROM companies JOIN location_contact_compny ON companies.CompanyInsertId = location_contact_compny.CompanyInsertId JOIN contacts ON contacts.ContactInsertId = location_contact_compny.ContactInsertId GROUP BY contacts.ContactInsertId';
// 	$sql = 'SELECT add_product_compny.*,amcss.*,products.Product_Name,companies.CompanyName FROM add_product_compny JOIN amcss ON add_product_compny.Prodct_Compny_Id = amcss.Prodct_Compny_Id JOIN products ON products.Product_Insert_Id =add_product_compny.Product_Insert_Id JOIN companies ON companies.CompanyInsertId = add_product_compny.CompanyInsertId where add_product_compny.Serial_No like "' . $_POST["Serial_No"] . '%" ORDER BY add_product_compny.Serial_No LIMIT 0,6';
// 		if($result = mysqli_query($conn,$sql)){
// 				$SerialNoData .= '<ul id="country-list">';

// 				while($row =mysqli_fetch_assoc($result))
// 				{
// 					$Serial_No     = "'".$row['Serial_No']."'";
// 					$Action        = "'Display_AMC_Data_SerialNo_Base'";
// 					$SerialNoData .= '<li onClick="selectCountry('.$Serial_No.','.$Serial_No.','.$Action.');">'.$Serial_No.'</li>';
// 					//$SerialNoData .= '<option onClick="selectCountry('.$row["Serial_No"].');" value="'.$row["Serial_No"].'">'.$row["Serial_No"].'</option>';
// 				}
// 				$SerialNoData .= '</ul>';				
// 				echo $SerialNoData;
// 		}
// 	//Fetch Contact Data End
// }


if($_POST['action'] == "Display_ProductAmcs_Serial_Data"){
	// $sql = 'SELECT location_contact_compny.ContactInsertId , GROUP_CONCAT(DISTINCT companies.CompanyName) as CompaniesNames,contacts.MobileNumber,contacts.WhatsApp,contacts.ContactName,contacts.Designation FROM companies JOIN location_contact_compny ON companies.CompanyInsertId = location_contact_compny.CompanyInsertId JOIN contacts ON contacts.ContactInsertId = location_contact_compny.ContactInsertId GROUP BY contacts.ContactInsertId';
	
	//$sql = 'SELECT add_product_compny.*,amcss.*,products.Product_Name,companies.CompanyName FROM add_product_compny JOIN amcss ON add_product_compny.Prodct_Compny_Id = amcss.Prodct_Compny_Id JOIN products ON products.Product_Insert_Id =add_product_compny.Product_Insert_Id JOIN companies ON companies.CompanyInsertId = add_product_compny.CompanyInsertId where add_product_compny.Serial_No like "' . $_POST["Serial_No"] . '%" ORDER BY add_product_compny.Serial_No LIMIT 0,6';
	$sql = 'SELECT add_product_compny.*,amcss.*,products.Product_Name,companies.CompanyName FROM add_product_compny JOIN amcss ON add_product_compny.Prodct_Compny_Id = amcss.Prodct_Compny_Id JOIN products ON products.Product_Insert_Id =add_product_compny.Product_Insert_Id JOIN companies ON companies.CompanyInsertId = add_product_compny.CompanyInsertId  ORDER BY add_product_compny.Serial_No';
		if($result = mysqli_query($conn,$sql)){
			//	$SerialNoData .= '<ul id="country-list">';
                $SerialNoData .= '<option>--Select Serial No --</option>';
				while($row =mysqli_fetch_assoc($result))
				{   
				    $Show_SerialNo = $row['Serial_No'];
					$Serial_No     = "'".$row['Serial_No']."'";
					//$Action        = "'Display_AMC_Data_SerialNo_Base'";
					//$SerialNoData .= '<li onClick="selectCountry('.$Serial_No.','.$Serial_No.','.$Action.');">'.$Serial_No.'</li>';
					$SerialNoData .= '<option value="'.$Show_SerialNo.'">'.$Show_SerialNo.'</option>';
				}
			//	$SerialNoData .= '</ul>';				
				echo $SerialNoData;
		}
	//Fetch Contact Data End
}


//$SQL = 'SELECT add_product_compny.*,amcss.* FROM `add_product_compny` JOIN amcss ON add_product_compny.Product_Insert_Id=amcss.Prodct_Compny_Id WHERE add_product_compny.CompanyInsertId="'.$_POST['CompanyInsertId'].'"';
	//$SQL = 'SELECT * FROM amcs WHERE CompanyInsertId="'.$_POST['CompanyInsertId'].'"';

//Fetch Data Serial No Base
if($_POST['action'] == "Display_AMC_Data_SerialNo_Base"){
	$SerialNo_CompanyName_EmailId_All_In_One    = $_POST['SerialNo_CompanyName_EmailId_All_In_One'];
	$SQLSerialNo = 'SELECT add_product_compny.*,amcss.*,products.Product_Name,companies.CompanyName,companies.CompanyInsertId FROM `add_product_compny` JOIN amcss ON add_product_compny.Prodct_Compny_Id=amcss.Prodct_Compny_Id JOIN products ON products.Product_Insert_Id=add_product_compny.Product_Insert_Id JOIN companies ON companies.CompanyInsertId=add_product_compny.CompanyInsertId WHERE add_product_compny.Serial_No="'.$SerialNo_CompanyName_EmailId_All_In_One.'"';  
	if($result = mysqli_query($conn,$SQLSerialNo)){
		//create an array
		$AMCS_Serial_Array = array();
		while($row =mysqli_fetch_assoc($result))
		{
			$AMCS_Serial_Array[] = $row;
		}
		echo json_encode($AMCS_Serial_Array);
	}
}
//Fetch Data Email Id Base
if($_POST['action'] == "Display_AMC_Data_EmailId_Base"){
	$SerialNo_CompanyName_EmailId_All_In_One    = $_POST['SerialNo_CompanyName_EmailId_All_In_One'];
	 $SQLEmailId = 'SELECT add_product_compny.*,amcss.*,products.Product_Name,companies.CompanyName,companies.CompanyInsertId FROM `add_product_compny` JOIN amcss ON add_product_compny.Prodct_Compny_Id=amcss.Prodct_Compny_Id JOIN products ON products.Product_Insert_Id=add_product_compny.Product_Insert_Id JOIN companies ON companies.CompanyInsertId=add_product_compny.CompanyInsertId WHERE add_product_compny.Email_id="'.$SerialNo_CompanyName_EmailId_All_In_One.'"';
	if($result = mysqli_query($conn,$SQLEmailId)){
		//create an array
		$AMCS_Email_Array = array();
		while($row =mysqli_fetch_assoc($result))
		{
			$AMCS_Email_Array[] = $row;
		}
		echo json_encode($AMCS_Email_Array);
	}
}
//Fetch Data Company Name Base
if($_POST['action'] == "Display_AMC_Data_CompanyName_Base"){
	$SerialNo_CompanyName_EmailId_All_In_One    = $_POST['SerialNo_CompanyName_EmailId_All_In_One'];
	$SQLCompanyName = 'SELECT add_product_compny.*,amcss.*,products.Product_Name,companies.CompanyName,companies.CompanyInsertId FROM `add_product_compny` JOIN amcss ON add_product_compny.Prodct_Compny_Id=amcss.Prodct_Compny_Id JOIN products ON products.Product_Insert_Id=add_product_compny.Product_Insert_Id JOIN companies ON companies.CompanyInsertId=add_product_compny.CompanyInsertId WHERE add_product_compny.CompanyInsertId="'.$SerialNo_CompanyName_EmailId_All_In_One.'"';
	if($result = mysqli_query($conn,$SQLCompanyName)){
		//create an array
		$AMCS_CompanyName_Array = array();
		while($row =mysqli_fetch_assoc($result))
		{
			$AMCS_CompanyName_Array[] = $row;
		}
		echo json_encode($AMCS_CompanyName_Array);
	}
}
?>