<?php
//Header Section
include 'header/header.php';
if(!empty($_GET['action'])){
      $Action = $_GET['action'];
}else{
    $Action = "Create"; 
} 

if(isset($_POST['SendSmsForm'])){
   echo $mobile = '91'.$_POST['Phone'];
   echo $message = $_POST['Message'];

	//$mobile='91'.$_POST['mobile'];
	//$message=$_POST['message'];
	
	$apiKey = urlencode('PuV0EpNHrPE-W4qD7DW7r7EDcTkKlJH54oOK6N3bmr');
	$numbers = array($mobile);
	$sender = urlencode('TXTLCL');
	$message = rawurlencode($message);
	$numbers = implode(',', $numbers);
 	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	echo $response;
}
?>
 <!-- page content -->
 <?php if($Action  == "Create"){ ?>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><small>New Contacts</small></h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_content">
                        
                            <form autocomplete="off"  method="post" novalidate>                        
                               <input type="hidden" value="View" id="IDView" name="View">
                                <span class="section">SMS Info</span>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Mobile Number:2</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="tel" class='tel' name="Phone" id="Phone" required='required' maxlength="10"/></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Message</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" name="Message" id="Message" class='email' required="required" ></textarea>
                                    </div>
                                </div>   
                                </div>                               
                                <!-- <div class="ln_solid"> -->
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <input type='submit' name="SendSmsForm" id="Submit" value="Submit" class="btn btn-success">
                                            <button type='reset' class="btn btn-success">Reset</button>                    
                                        </div>
                                    </div>
                                <!-- </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    }
?>
<!-- /page content -->
<?php
//Header Section
include 'footer/footer.php';
?>
</script>
