<?php
//Header Section
    include 'header/header.php';
?>
  page content 
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form name="CreateUserForm" autocomplete="off" id="CreateUserForm"  method="post" novalidate>                        
                               <input type="hidden" value="View" id="IDView" name="View">
                                <span class="section">Export Data</span>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Data BackUp<span class="required">*</span></label>
                                    <div class="col-md-12 col-sm-12">
                                        <center>
                                        <button name="ExportData" id="ExportData" class="btn btn-success">Export Data</button> 
                                        </center>
                                        <div id="DataBody">
                                            <a href="backup.sql?id=1" id="DownloadFile" >Download File</a>
                                            
                                        </div>
                                     </div>
                                </div>                                                           

                                </div>                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
//Footer Section
include 'footer/footer.php';
?>

<?php
include('db_backup_library.php');
 $dbbackup = new db_backup;
// // $dbbackup->connect("localhost:3306","marsonei_crm","r^P*i!;xxk3.","marsonei_crmDB");
//  $dbbackup->connect();
//  $dbbackup->backup();
//  //$dbbackup->tables();
//  $dbbackup->download();

		$dbbackup = new db_backup;
		$dbbackup->connect();
		$dbbackup->backup();
		$dbbackup->download();
		$dbbackup->save("BackUpData/","backup");

// 	        $servername = "localhost:3306";
//             $username = "marsonei_crm";
//             $password = "r^P*i!;xxk3.";
//             $db = "marsonei_crmDB";
//             // Create connection
//             $conn = mysqli_connect($servername, $username, $password,$db);
        
//         //   $conn=mysqli_connect("localhost:3306","marsonei_crm","r^P*i!;xxk3.");
//         // 	$condb=mysqli_select_db("marsonei_crmDB");
//         // 	if(!$conn){
//         // 		echo mysqli_error();
//         // 		echo "DB Not Connect";
//         // 	}else{
//         // 		//return true;
//         // 		echo "Db Connect";
//         // 	}
        	
        	
//         	/*-------------------------------------*/
// 			//------Creating Table List start------//
// 			/*-------------------------------------*/
// 			$tb_name=mysqli_query($conn,"SHOW TABLES");
// 			$tables=array();
// 			while ($tb=mysqli_fetch_row($tb_name)){
// 				$tables[]=$tb[0] ;
// 			}
// 			/*-------------------------------------*/
// 			//-------Creating Table List end-------//
// 			/*-------------------------------------*/
// 			//return $tables;
// 		//	print_r($tables);
// 		//	echo $tables;
			
// 			$table_sql = array();
// 			foreach ($tables as $key => $table) {
// 				$tbl_query=mysqli_query($conn,"SHOW CREATE TABLE ".$table);
// 				$row2 = mysqli_fetch_row($tbl_query);
// 				$table_sql[]=$row2[1];
// 			}
			
// 			$solid_tablecreate_sql = implode("; \n\n" , $table_sql);
			
// 				/*-------------------------------------*/
// 			//-------Creating Table SQL end--------//
// 			/*-------------------------------------*/


// 			/*-------------------------------------*/
// 			//------Inserting Data SQL Start-------//
// 			/*-------------------------------------*/
// 			$all_table_data=array();
// 			foreach ($tables as $key => $table) {
// 			    	$all_fields=array();
//         			$fields = mysqli_query($conn,"SHOW COLUMNS FROM ".$table);
//         			if (!$fields) {
//         			 echo 'Could not run query: ' . mysqli_error();
//         			}
        			
//         			if (mysqli_num_rows($fields) > 0) {
//         				while ($field = mysqli_fetch_assoc($fields)) {
//         					$all_fields[]="`".$field["Field"]."`";
//         				}
//         			}
//         			//return $all_fields;
// 				//$show_field=$this->view_fields($table);
// 				$show_field=$all_fields;
// 				$solid_field_name=implode(", ",$show_field);
// 				$create_field_sql="INSERT INTO `$table` ( ".$solid_field_name.") VALUES \n";

// 				//Start checking data available
// 				mysqli_query($conn,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
// 				$table_data= mysqli_query($conn,"SELECT*FROM ".$table);
// 				if(!$table_data){
// 					echo 'Could not run query: '. mysqli_error();
// 				}
				
// 				if (mysqli_num_rows($table_data) > 0) {
// 					//$data_viewig=$this->view_data($table);
					
					
// 					$all_data=array();
//         			$table_data=mysqli_query($conn,"SELECT*FROM ".$table);
//         			if(!$table_data){
//         				echo 'Could not run query: '. mysqli_error();
//         			}
        
//         			if(mysqli_num_rows($table_data)>0){
        
        				
//         				while ($t_data=mysqli_fetch_row($table_data)) {
        
//         					$per_data=array();
//         					foreach ($t_data as $key => $tb_data) {
//         						$per_data[]= "'".str_replace("'","\'",$tb_data)."'";
//         					}
//         					$solid_data= "(".implode(", ",$per_data).")";
//         					$all_data[]=$solid_data;
//         				}
//         			}
//         			//	return $all_data;
// 					$data_viewig = $all_data;
					
// 					$splice_data = array_chunk($data_viewig,50);
// 					foreach($splice_data as $each_datas){
// 						$solid_data_viewig=implode(", \n",$each_datas)."; ";
// 						$all_table_data[]=$create_field_sql.$solid_data_viewig;
// 					}
				
// 				}
// 				else{
// 					$all_table_data[]=null;
// 				}
// 				//End checking data available
				
				
				
// 			}
// 			$entiar_table_data=implode(" \n\n\n",$all_table_data);
// 			/*-------------------------------------*/
// 			//-------Inserting Data SQL End--------//
// 			/*-------------------------------------*/
// 			//$this->exported_database=$solid_tablecreate_sql."; \n \n".$entiar_table_data;
// 			//return $this;
//         	$exported_database=$solid_tablecreate_sql."; \n \n".$entiar_table_data;
        	
//           /*//Download
// 			$file_name="Tmpdata.sql";
// 			$file=fopen($file_name,"w+");
// 			fwrite($file, $this->exported_database);*/
// 			$name='backup';
// 			header('Content-Type: application/sql');
// 			header('Content-Disposition: attachment; filename='.$name.'.sql');
// 			//echo $this->exported_database;
// 			echo $exported_database;
// 			/*readfile($file_name);
// 			fclose($file);
// 			unlink($file_name);*/
?>






