<?php
session_start();
include '../DBConfig/database.php';
$html ='';
$htmluser ='';
if(isset($_POST['action'])){
    if($_POST['action'] == "Display_User_Data_For_Permission"){
        //Fetch Companies Data Start
        if($_SESSION['user_type'] =="user"){
            $sql = 'SELECT * FROM `testuser` where id="'.$_SESSION['id'].'"';
        }
        if($_SESSION['user_type'] =="admin"){
            $sql = 'SELECT * FROM `testuser`';
        }
        if($result = mysqli_query($conn,$sql)){
                //create an array
                $CompanyArray = array();
                while($row =mysqli_fetch_assoc($result))
                {
                    $html .='
                        <tr id="row_'.$row["id"].'">
                        <td id="Userid" style="display:none;">'.$row["id"].'</td>
                        <td id="IDUserName"  class="sorting_1 Compnys" >'.$row["username"].'</td>
                        <td id="IDEmail">'.$row["email"].'</td>
                        <td id="IDPhone">'.$row["phone_no"].'</td>
                        <td id="IDPwsd">'.base64_decode($row["password"]).'</td>
                        <td class="clsEdit" style="text-align:left;"><i class="fa fa-edit" data-toggle="modal" data-target="#myModal"></i></td>
                        </tr>';   
                }
            // echo json_encode($CompanyArray);
            echo $html;
        }
        //Fetch Companies Data End
    } 
    
    if($_POST['action'] == "All_User_Data"){
        $sql = 'SELECT * FROM `testuser`';
        if($result = mysqli_query($conn,$sql)){
                //create an array
                $CompanyArray = array();
                //$htmluser .= '<option value="">Name of person who will handle this complaint</option>';
                while($row =mysqli_fetch_assoc($result))
                {
                    $htmluser .='<option value="'.$row["id"].'">'.$row["username"].'</option>';   
                }
            // echo json_encode($CompanyArray);
            echo $htmluser;
        }
    }
    
    if($_POST['action'] == "All_User_Data_For_Enquiry"){
        $sql = 'SELECT * FROM `testuser` ORDER BY username ASC';
        if($result = mysqli_query($conn,$sql)){
                //create an array
                $CompanyArray = array();
                $htmluser .= '<option value="">--- Select Register By ---</option>';
                while($row =mysqli_fetch_assoc($result))
                {
                    $htmluser .='<option value="'.$row["id"].'">'.$row["username"].'</option>';   
                }
            // echo json_encode($CompanyArray);
            echo $htmluser;
        }
    }
    
    
    
    
}
?>