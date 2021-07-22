<?php
session_start();

include '../DBConfig/database.php';
$html ='';
$CompanyNameData = '';
$CompanyProductData = '';
$SrNo = 1;
//if(isset($_POST['action'])){
    
    
    // if($_GET['action'] == "Display_Company_Data_Test"){
    //     //Fetch Companies Data Start
    //     $sql = 'SELECT * FROM `companies`';
    //     if($result = mysqli_query($conn,$sql)){
    //             //create an array
    //             $CompanyArray = array();
    //             while($row =mysqli_fetch_assoc($result))
    //             {
    //                 $CompanyArray[] = $row;
    //             }
    //                 echo'<pre>';
    //                  print_r(json_encode($CompanyArray));
    //                  echo'</pre>';
    //         // echo $html;
    //     }
    //     //Fetch Companies Data 	End
    // } 
    
   if(isset($_POST['action'])){ 
    
    if($_POST['action'] == "Display_Company_Data"){
        //Fetch Companies Data Start
        $sql = 'SELECT * FROM `companies`';
        if($result = mysqli_query($conn,$sql)){
                //create an array
                $CompanyArray = array();
                while($row =mysqli_fetch_assoc($result))
                {
                    //$CompanyArray[] = $row;
                    $html .='
                    <tr id="row_'.$row["CompanyInsertId"].'">
                    <td style="width:3%;text-align:center;">&nbsp;</td>
                    <td id="IDCompanyName" style="width:18%;" class="Compnys" ><a style="color:black;" href="Search_Company_Wise_Products.php?action=View"><b>'.$row["CompanyName"].'</b></a></td>
                    <td id="IDAddress" style="width:20%;">'.$row["Address"].'</td>
                    <td id="IDCountry" style="Display:none;">'.$row["Country"].'</td>
                    <td id="IDCompanyID" style="Display:none;">'.$row["CompanyInsertId"].'</td>
                    <td id="IDGroup" style="Display:none;" >'.$row["Group_Name"].'</td>
                    <td id="IDState" style="width:7%;">'.$row["State"].'</td>
                    <td id="IDCity" style="width:7%;">'.$row["City"].'</td>
                    <td id="IDPinCode" style="Display:none;">'.$row["Pincode"].'</td>
                    <td id="IDGSTNumber" style="Display:none;" >'.$row["GSTNumber"].'</td>
                    <td id="IDRefferedBy" style="width:7%;">'.$row["RefferedBy"].'</td>
                    <td id="IDIndustry" style="Display:none;">'.$row["Industry"].'</td>
                    <td id="IDEmail" style="width:18%;">'.$row["Email"].'</td>
                    <td id="IDDescription" style="Display:none;">'.$row["Description"].'</td>
                    <td id="IDAction" style="width:4%;padding-left: 40px !important;"><center>
                    <div class="btn-group" style="display: block !important;">
                      <i class="fa fa-mail-forward" dropdown-toggle" data-toggle="dropdown"></i>
                      <div class="dropdown-menu">
                         <a class="dropdown-item delete" href="#" data-formindex="'.$row["CompanyInsertId"].'">Delete</a>
                         <a class="dropdown-item edit" data-toggle="modal" data-target="#myModal" href="#" data-formindex="'.$row["CompanyInsertId"].'">Edit</a>
                      </div></center>
                    </td>
                    </tr>
                    ';   
                    $SrNo = $SrNo+1;
                }
            // echo json_encode($CompanyArray);
            echo $html;
        }
        //Fetch Companies Data 	End
    } 
    
    
    
    
    

    // Company Name Data for Company Product
    if($_POST['action'] == "Display_CompanyName_Data_For_CompanyProduct"){
        //$sql = 'SELECT add_product_compny.*,amcss.*,products.Product_Name,companies.CompanyName FROM add_product_compny JOIN amcss ON add_product_compny.Prodct_Compny_Id = amcss.Prodct_Compny_Id JOIN products ON products.Product_Insert_Id =add_product_compny.Product_Insert_Id JOIN companies ON companies.CompanyInsertId = add_product_compny.CompanyInsertId';
        $sql = 'SELECT CompanyInsertId,CompanyName FROM `companies`';
        if($result = mysqli_query($conn,$sql)){
           // $CompanyProductData .= '<option value="Select Companies">Select Company Name </option>';
           $CompanyProductData = array();
            while($row =mysqli_fetch_assoc($result))
            {
                 $CompanyProductData[] = $row;
                // $CompanyProductData .= '<option value="'.$row["CompanyInsertId"].'">'.$row["CompanyName"].'</option>';
            }
            echo json_encode($CompanyProductData);

            // htmll+=`<option value="`+CompanyInsertId +`">`+CompanyName+`<option>`;
            // $.each(CompanyData, function(i,val) {
            //     htmll+=`<option value="`+val.CompanyInsertId +`">`+val.CompanyName +` </option>`;
            // });
        }
    }


    // Company Name Data for Ticket Generate
    if($_POST['action'] == "Display_CompanyName_Data_For_Amc"){
        //$sql = 'SELECT add_product_compny.*,amcss.*,products.Product_Name,companies.CompanyName FROM add_product_compny JOIN amcss ON add_product_compny.Prodct_Compny_Id = amcss.Prodct_Compny_Id JOIN products ON products.Product_Insert_Id =add_product_compny.Product_Insert_Id JOIN companies ON companies.CompanyInsertId = add_product_compny.CompanyInsertId';
        //  $sql = 'SELECT * FROM `companies` WHERE CompanyName LIKE "'.$_POST["CompanyName"].'%" ORDER BY CompanyName LIMIT 0,6';
         $sql = 'SELECT * FROM `companies` ORDER BY CompanyName';
        if($result = mysqli_query($conn,$sql)){
            //$CompanyNameData .= '<ul id="country-list">';
            $CompanyNameData .= '<option>--Select Company--</option>';
            while($row =mysqli_fetch_assoc($result))
            {
                // $CompanyId   = "'".$row['CompanyInsertId']."'";
                // $CompanyName = "'".$row['CompanyName']."'";
                // $Action      = "'Display_AMC_Data_CompanyName_Base'";
                $CompanyId      = $row['CompanyInsertId'];
                $CompanyName    = $row['CompanyName'];
                //$CompanyNameData .= '<li onClick="selectCountry('.$CompanyId.','.$CompanyName.','.$Action.');">'.$CompanyName.'</li>';
                $CompanyNameData .= '<option value="'.$CompanyId.'">'.$CompanyName.'</option>';
            }
           // $CompanyNameData .= '</ul>';				
            echo $CompanyNameData;
        }
    }

    
    if($_POST['action'] == "Display_Company_Data_For_Contact"){
        //Fetch Companies Data Start
        $sql = 'SELECT * FROM `companies` ORDER BY CompanyName ASC';
        if($result = mysqli_query($conn,$sql)){
            //create an array
            $CompanyArray = array();
            while($row =mysqli_fetch_assoc($result))
            {
                $CompanyArray[] = $row;
            }
              echo json_encode($CompanyArray);
        }
    }

    if($_POST['action'] == "Display_Company_Data_ID_BASE"){
        //Fetch Companies Data Start
        $sql = 'SELECT * FROM `companies` where CompanyInsertId="'.$_POST['CompanyInsertId'].'"';
        if($result = mysqli_fetch_assoc(mysqli_query($conn,$sql))){
            echo $result['Email'];
             //    $EmailArray = array();
             //    while($row =mysqli_fetch_assoc($result))
             //    {
             //        $EmailArray[] = $row;
             //    }
             // echo json_encode($EmailArray);
        }
        //Fetch Companies Data  End
    }



    if($_POST['action'] == "Display_CompanyProduct_Data"){
        //Fetch Companies Data Start
        //$sql = 'SELECT add_product_compny.*,companies.CompanyName,products.Product_Name FROM add_product_compny JOIN companies ON add_product_compny.CompanyInsertId = companies.CompanyInsertId JOIN products ON add_product_compny.Product_Insert_Id = products.Product_Insert_Id';
        // $sql = 'SELECT add_product_compny.*,companies.CompanyName,products.Product_Name, amcss.AMCFromDate AS Amc_From_Date , YEAR(amcss.AMCFromDate) AS Year, amcss.AMCExpiresOn AS Amc_Expire_On FROM add_product_compny LEFT JOIN companies ON add_product_compny.CompanyInsertId = companies.CompanyInsertId LEFT JOIN products ON add_product_compny.Product_Insert_Id = products.Product_Insert_Id LEFT JOIN amcss ON add_product_compny.Prodct_Compny_Id = amcss.Prodct_Compny_Id';
        //$sql = 'SELECT add_product_compny.*,companies.CompanyName,products.Product_Name,amcss.AMCFromDate AS Amc_From_Date , YEAR(amcss.AMCFromDate) AS Year, amcss.AMCExpiresOn AS Amc_Expire_On ,contacts.MobileNumber AS ContactNo,location_contact_compny.ContactInsertId FROM add_product_compny LEFT JOIN companies ON add_product_compny.CompanyInsertId = companies.CompanyInsertId LEFT JOIN products ON add_product_compny.Product_Insert_Id = products.Product_Insert_Id LEFT JOIN amcss ON add_product_compny.Prodct_Compny_Id = amcss.Prodct_Compny_Id LEFT JOIN location_contact_compny ON companies.CompanyInsertId=location_contact_compny.CompanyInsertId LEFT JOIN contacts ON location_contact_compny.ContactInsertId=contacts.ContactInsertId GROUP BY location_contact_compny.CompanyInsertId';
         $sql = 'SELECT add_product_compny.*,companies.CompanyName,products.Product_Name,amcss.AMCFromDate AS Amc_From_Date , YEAR(amcss.AMCFromDate) AS Year, amcss.AMCExpiresOn AS Amc_Expire_On ,contacts.MobileNumber AS ContactNo,location_contact_compny.ContactInsertId FROM add_product_compny LEFT JOIN companies ON add_product_compny.CompanyInsertId = companies.CompanyInsertId LEFT JOIN products ON add_product_compny.Product_Insert_Id = products.Product_Insert_Id LEFT JOIN amcss ON add_product_compny.Prodct_Compny_Id = amcss.Prodct_Compny_Id LEFT JOIN location_contact_compny ON companies.CompanyInsertId=location_contact_compny.CompanyInsertId LEFT JOIN contacts ON location_contact_compny.ContactInsertId=contacts.ContactInsertId GROUP BY location_contact_compny.CompanyInsertId,add_product_compny.Prodct_Compny_Id';
        if($result = mysqli_query($conn,$sql)){
                //create an array
                $CompanyProductArray = array();
                while($row =mysqli_fetch_assoc($result))
                {
                    $CompanyProductArray[] = $row;
                }
             echo json_encode($CompanyProductArray);
        }
        //Fetch Companies Data  End
    }  
    
    if($_POST['action'] == "Display_Company_Data_Alter"){
        $sql = 'SELECT * FROM `companies` ORDER BY CompanyInsertId DESC';
        if($result = mysqli_query($conn,$sql)){
                //create an array
                $TotalCompanyArrayAlter = array();
                while($row =mysqli_fetch_assoc($result))
                {
                    $TotalCompanyArrayAlter[] = $row;
                }
             echo json_encode($TotalCompanyArrayAlter);
        }
        //Fetch Companies Data  End
    } 

    if($_POST['action'] == "Display_CompanyProduct_Data_SerialNo_BASE"){
        //Fetch Companies Data Start
        $sql = 'SELECT add_product_compny.*,companies.CompanyName,products.Product_Name FROM add_product_compny JOIN companies ON add_product_compny.CompanyInsertId = companies.CompanyInsertId JOIN products ON add_product_compny.Product_Insert_Id = products.Product_Insert_Id where add_product_compny.Serial_No="'.$_POST['Serial_No'].'"';
        if($results = mysqli_query($conn,$sql)){
                //create an array
                $CompanyProductArr = array();
                while($rows =mysqli_fetch_assoc($results))
                {
                    $CompanyProductArr[] = $rows;
                }
             echo json_encode($CompanyProductArr);
        }
        //Fetch Companies Data  End
    }  

    if($_POST['action'] == "Display_Total_No_Company_Data"){
        $sql = 'SELECT COUNT(CompanyName) AS TotalCompanies FROM `companies`';
        if($result = mysqli_query($conn,$sql)){
                //create an array
                $TotalCompanyArray = array();
                while($row =mysqli_fetch_assoc($result))
                {
                    $TotalCompanyArray[] = $row;
                }
             echo json_encode($TotalCompanyArray);
        }
        //Fetch Companies Data  End
    }  
    
    if($_POST['action'] == "Display_State_Data"){
         $sql = 'SELECT * from state ORDER BY state_name ';
        if($result = mysqli_query($conn,$sql)){
            // //create an array
            // $TotalStateArray .= '<ul id="country-list">';
            // while($row = mysqli_fetch_assoc($result))
            // {   
            //     $state_name = "'".$row['state_name']."'";
            //     $TotalStateArray .= '<li onClick="selectCountry('.$state_name.');">'.$state_name.'</li>';
            // }
            // $TotalStateArray .= '</ul>';				
            // echo $TotalStateArray;
            
             //create an array
                $TotalStateArrayData = array();
                while($row =mysqli_fetch_assoc($result))
                {
                    $TotalStateArrayData[] = $row;
                }
             echo json_encode($TotalStateArrayData);
        }
        //Fetch Companies Data  End
    }  
}
?>