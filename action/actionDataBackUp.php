<?php
session_start();

include '../DBConfig/database.php';

if($_POST["action"] == "Export_Data"){
    $tables = array();
    $result = mysqli_query($conn,"SHOW TABLES");
    while($row = mysqli_fetch_row($result)){
      $tables[] = $row[0];
    }
    
    $return = '';
    foreach($tables as $table){
      $result = mysqli_query($conn,"SELECT * FROM ".$table);
      $num_fields = mysqli_num_fields($result);
      
      $return .= 'DROP TABLE '.$table.';';
      $row2 = mysqli_fetch_row(mysqli_query($conn,"SHOW CREATE TABLE ".$table));
      $return .= "\n\n".$row2[1].";\n\n";
      
      for($i=0;$i<$num_fields;$i++){
        while($row = mysqli_fetch_row($result)){
          $return .= "INSERT INTO ".$table." VALUES(";
          for($j=0;$j<$num_fields;$j++){
            $row[$j] = addslashes($row[$j]);
            if(isset($row[$j])){ $return .= '"'.$row[$j].'"';}
            else{ $return .= '""';}
            if($j<$num_fields-1){ $return .= ',';}
          }
          $return .= ");\n";
        }
      }
      $return .= "\n\n\n";
    }
    
    //save file
    $handle = fopen("backup.sql","w+");
    fwrite($handle,$return);
    fclose($handle);
    
        // $zip = new ZipArchive();
        // $zip_name = getcwd() . "/uploads/upload_" . time() . ".zip";
        
        // Create a zip target
        // if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) {
        //     $error .= "Sorry ZIP creation is not working currently.<br/>";
        // }
        
        // $imageCount = count($_FILES['img']['name']);
        // for($i=0;$i<$imageCount;$i++) {
        
        //     if ($_FILES['img']['tmp_name'][$i] == '') {
        //         continue;
        //     }
        //     $newname = date('YmdHis', time()) . mt_rand() . '.jpg';
            
        //     // Moving files to zip.
        //     $zip->addFromString($_FILES['img']['name'][$i], file_get_contents($_FILES['img']['tmp_name'][$i]));
            
        //     // moving files to the target folder.
        //     move_uploaded_file($_FILES['img']['tmp_name'][$i], './uploads/' . $newname);
        // }
        // $zip->close();
        
        // Create HTML Link option to download zip
        // $success = basename($zip_name);
    
    //$move = "/Users/George/Desktop/uploads/";
    //move_uploaded_file($handle, $move);
    // if (file_exists($handle)) {
    //     header('Content-Description: File Transfer');
    //     header('Content-Type: application/octet-stream');
    //     header('Content-Disposition: attachment; filename="'.basename($handle).'"');
    //     header('Expires: 0');
    //     header('Cache-Control: must-revalidate');
    //     header('Pragma: public');
    //     header('Content-Length: ' . filesize($handle));
    //     readfile($handle);
    //     exit;
    // }
    echo '<a href="DataFile.php">Download</a>';
}
?>

