<?php
session_start();
include '../DBConfig/database.php';
$htmlContent ='';
$SNo =1;
if($_POST['action'] == "Display_Contact_Data"){
//Fetch Contact Data Start
$sql = 'SELECT * FROM `contacts`';
if($result = mysqli_query($conn,$sql)){
		//create an array
		$CompanyArray = array();
		while($row =mysqli_fetch_assoc($result))
		{
			$CompanyArray[] = $row;
		}
	 echo json_encode($CompanyArray);
}
//Fetch Contact Data End
}


if($_POST['action'] == "Display_Contact_And_Company_Data"){
	//Fetch Contact Data Start
	//$sql = 'SELECT companies.CompanyName ,contacts.* FROM contacts JOIN companies ON companies.CompanyInsertId=contacts.CompanyInsertId';
	//$sql = 'SELECT GROUP_CONCAT(DISTINCT companies.CompanyName) as CompaniesNames ,contacts.* FROM contacts JOIN companies ON companies.CompanyInsertId=contacts.CompanyInsertId  group by contacts.ContactName';
	//$sql = 'SELECT location_contact_compny.ContactInsertId , GROUP_CONCAT(DISTINCT companies.CompanyName) as CompaniesNames,contacts.MobileNumber,contacts.WhatsApp,contacts.ContactName,contacts.Email_Id,contacts.Designation FROM companies JOIN location_contact_compny ON companies.CompanyInsertId = location_contact_compny.CompanyInsertId JOIN contacts ON contacts.ContactInsertId = location_contact_compny.ContactInsertId GROUP BY contacts.ContactInsertId';
	$sql = 'SELECT location_contact_compny.ContactInsertId , GROUP_CONCAT(DISTINCT companies.CompanyName) as CompaniesNames,GROUP_CONCAT(DISTINCT companies.CompanyInsertId) as CompanyInsertIds ,contacts.MobileNumber,contacts.WhatsApp,contacts.ContactName,contacts.Email_Id,contacts.Designation FROM companies JOIN location_contact_compny ON companies.CompanyInsertId = location_contact_compny.CompanyInsertId JOIN contacts ON contacts.ContactInsertId = location_contact_compny.ContactInsertId GROUP BY contacts.ContactInsertId';
	if($result = mysqli_query($conn,$sql)){
			//create an array
			//$CompanyArray = array();
			while($row =mysqli_fetch_assoc($result))
			{
				//$CompanyArray[] = $row;
				if($row["CompaniesNames"] == "Others"){
					$row["CompaniesNames"] = "";
				}
				if($row["CompaniesNames"] == "No Company"){
					$row["CompaniesNames"] = "";
				}
				$htmlContent .='
					<tr id="row_'.$row["ContactInsertId"].'">
					<td style="width:5%;text-align:center;">&nbsp;</td>
					<td style="width:15%;" id="IDContactName"><b>'.$row["ContactName"].'</b></td>
					<td  id="IDComapanyInsertids" style="display:none;">'.$row["CompanyInsertIds"].'</td>
					<td style="width:25%;" id="IDComapnies">'.$row["CompaniesNames"].'</td>
					<td style="width:25%;" id="IDEmail_Id">'.$row["Email_Id"].'</td>
					<td style="width:8%;" id="IDMobileNumber">'.$row["MobileNumber"].'</td>
					<td style="width:8%;" id="IDWhatsApp">'.$row["WhatsApp"].'</td>                           
					<td style="width:10%;" id="IDDesignation">'.$row["Designation"].'</td>
					<td id="IDAction" style="width:5%;">
    				   <center>
                            <div class="btn-group" style="display: block !important;">
                              <i class="fa fa-mail-forward" dropdown-toggle" data-toggle="dropdown"></i>
                              <div class="dropdown-menu">
                                 <a class="dropdown-item delete" href="#" data-formindex="'.$row["ContactInsertId"].'">Delete</a>
                                 <a class="dropdown-item edit" data-toggle="modal" data-target="#myModal" href="#" data-formindex="'.$row["ContactInsertId"].'">Edit</a>
                              </div>
                            </div>
                       </center>
                    </td>
					</tr>';
				$SNo =$SNo+1;

			}
			echo $htmlContent;
	}
	//Fetch Contact Data End
	
// 		<td style="width:5%;" id="IDAction">
// 					<button class="btn btn-success delete" style="height: 22px !important;
// 					padding: 3px;font-size: 12px;width: 22px;" data-formindex="'.$row["ContactInsertId"].'"><i class="fa fa-trash" aria-hidden="true"></i></button>
// 					<button class="btn btn-success edit" data-toggle="modal" data-target="#myModal" style="height: 22px !important;
// 					padding: 3px;font-size: 12px;width: 22px;" data-formindex="'.$row["ContactInsertId"].'"><i class="fa fa-edit" aria-hidden="true"></i></button>
// 					</td>
}
if($_POST['action'] == "Display_Total_No_Contact_Data"){
	$sql = 'SELECT COUNT(ContactName) AS TotalContact FROM `contacts`';
	if($result = mysqli_query($conn,$sql)){
			//create an array
			$TotalContactArray = array();
			while($row =mysqli_fetch_assoc($result))
			{
				$TotalContactArray[] = $row;
			}
		 echo json_encode($TotalContactArray);
	}
	//Fetch Companies Data  End
}  

// Display Contact Details in Ticket
if($_POST['action'] == "Display_Contact_data_In_Ticket"){
	$sql = 'SELECT location_contact_compny.ContactInsertId , GROUP_CONCAT(DISTINCT companies.CompanyName) as CompaniesNames,GROUP_CONCAT(DISTINCT companies.CompanyInsertId) as CompanyInsertIds ,contacts.ContactInsertId,contacts.MobileNumber,contacts.WhatsApp,contacts.ContactName,contacts.Email_Id,contacts.Designation FROM companies JOIN location_contact_compny ON companies.CompanyInsertId = location_contact_compny.CompanyInsertId JOIN contacts ON contacts.ContactInsertId = location_contact_compny.ContactInsertId where location_contact_compny.CompanyInsertId="'.$_POST["CompanyInsertId"].'" GROUP BY contacts.ContactInsertId';
	if($result = mysqli_query($conn,$sql)){
			//create an array
			$ContactTicketArray = array();
			while($row =mysqli_fetch_assoc($result))
			{
				$ContactTicketArray[] = $row;
			}
		 echo json_encode($ContactTicketArray);
	}
	//Fetch Companies Data  End
} 

// Display Contact Lead Details in Ticket
if($_POST['action'] == "Display_Contact_data_In_Lead"){
	//$sql = 'SELECT location_contact_compny.ContactInsertId , GROUP_CONCAT(DISTINCT companies.CompanyName) as CompaniesNames,GROUP_CONCAT(DISTINCT companies.CompanyInsertId) as CompanyInsertIds ,contacts.MobileNumber,contacts.WhatsApp,contacts.ContactName,contacts.Email_Id,contacts.Designation FROM companies JOIN location_contact_compny ON companies.CompanyInsertId = location_contact_compny.CompanyInsertId JOIN contacts ON contacts.ContactInsertId = location_contact_compny.ContactInsertId where location_contact_compny.CompanyInsertId="'.$_POST["CompanyInsertId"].'" GROUP BY contacts.ContactInsertId';
	$sql = 'SELECT contacts.*,location_contact_compny.CompanyInsertId FROM contacts LEFT JOIN location_contact_compny on contacts.ContactInsertId = location_contact_compny.ContactInsertId where location_contact_compny.CompanyInsertId="'.$_POST['CompanyID'].'"';
	if($result = mysqli_query($conn,$sql)){
			//create an array
			$ContactLeadArray = array();
			while($row =mysqli_fetch_assoc($result))
			{
				$ContactLeadArray[] = $row;
			}
		 echo json_encode($ContactLeadArray);
	}
	//Fetch Companies Data  End
} 


if($_POST['action'] == "Display_Product_Data"){
     $sql = 'SELECT * from products';
    if($result = mysqli_query($conn,$sql)){
        $TotalProductArray = array();
        while($row = mysqli_fetch_assoc($result))
        {   
            	$TotalProductArray[] = $row;
        }
        echo json_encode($TotalProductArray);
    }
    //Fetch Companies Data  End
}


    if($_POST['action'] == "Display_Agent_Data"){
         $sql = 'SELECT * from contacts where CustormerType= "Agent" OR CustormerType= "Reseller"';
        if($result = mysqli_query($conn,$sql)){
            $TotalAgentArray = array();
            while($row = mysqli_fetch_assoc($result))
            {   
                	$TotalAgentArray[] = $row;
            }
            echo json_encode($TotalAgentArray);
        }
    }

// Company Name Data for Ticket Generate
// if($_POST['action'] == "Display_Agent_Data"){
//      $sql = 'SELECT * from contacts where CustormerType= "Agent"';
//     if($result = mysqli_query($conn,$sql)){
//         $ContactAgentData .= '<ul id="country-list">';
//         while($row =mysqli_fetch_assoc($result))
//         {
//             $ContactId   = "'".$row['ContactInsertId']."'";
//             $ContactName = "'".$row['ContactName']."'";
          
//             $ContactAgentData .= '<li onClick="selectCountry('.$ContactName.');">'.$ContactName.'</li>';
//         }
//         $ContactAgentData .= '</ul>';				
//         echo $ContactAgentData;
//     }
// }
?>