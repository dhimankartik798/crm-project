<?php
//Header Section
 // include 'header/header.php';
 // require "PHPMailer/PHPMailerAutoload.php";
  
//   if(isset($_POST['Send_Mail'])){
    // $to   = 'dhimankartik798@gmail.com';
    // $from = 'autoreply@marsoneinnovators.com';
    // $name = 'Marsone CRM';
    // $subj = 'PHPMailer 5.2 testing from Marsone CRM';
    // $msg = 'This is mail about testing mailing using PHP.';
    

    
    require "PHPMailer/PHPMailerAutoload.php";

function smtpmailer($to, $from, $from_name, $subject, $body)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = 'mail.marsoneinnovators.com';
        //$mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;  
        $mail->Username = 'autoreply@marsoneinnovators.com';
        $mail->Password = '(t_dq4TPMpD1';   
   
   //   $path = 'reseller.pdf';
   //   $mail->AddAttachment($path);
   
        $mail->IsHTML(true);
        $mail->From="autoreply@marsoneinnovators.com";
        $mail->FromName=$from_name;
        $mail->Sender=$from;
        $mail->AddReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->IsHTML(true);
        $mail->AddAddress($to);
        if(!$mail->Send())
        {
            $error ="Please try Later, Error Occured while Processing...";
            return $error; 
        }
        else 
        {
            $error = "Thanks You !! Your email is sent.";  
            return $error;
        }
    }
    
    //   $to   = $_POST['Email_Id'];
    //   $from = 'autoreply@marsoneinnovators.com';
    //   $name = 'Marsone CRM';
    //   $subj = $_POST['Subject'];
    //   $msg  = $_POST['Message'];
      
    $to   = 'dhimankartik798@gmail.com';
    $from = 'autoreply@marsoneinnovators.com';
    $name = 'Marsone CRM';
    $subj = 'PHPMailer 5.2 testing from Marsone CRM';
    $msg  = 'This is mail about testing mailing using PHP.';
    
    $error = smtpmailer($to,$from, $name ,$subj, $msg);

// if(isset($_POST['Send_Mail'])){
    //  echo $to = $_POST['Email_Id'];
    //  echo $subject = $_POST['Subject'];

    //   $message = $_POST['Message'];

    //  $header = "From:dhimankartik798@gmail.com";
    //   // $header .= "Cc:afgh@somedomain.com \r\n";
    //   // $header .= "MIME-Version: 1.0\r\n";
    //   // $header .= "Content-type: text/html\r\n";

    //   $retval = mail ($to,$subject,$message,$header);

    //   if( $retval == true ) {
    //     $MSG = "<h3>Message sent successfully...</h3>";
    //   }else {
    //     $MSG =  "Message could not be sent...";
    //   }

      
    //   $to_email = $_POST['Email_Id'];
    //   $subject  = $_POST['Subject'];
    //   $body     = $_POST['Message'];
    //   $headers  = "From:mail@marsoneinnovators.com";

    //   if (mail($to_email, $subject, $body, $headers)) {
    //       $MSG = "Email successfully sent to $to_email...";
    //   } else {
    //       $MSG = "Email sending failed...";
    //   }



//}
//}



?>

    <!--<div class="right_col" role="main">-->
    <!--    <div class="">-->
    <!--        <div class="page-title">-->
    <!--            <div class="title_left">-->
    <!--                <h3><small>E-MAIL</small></h3>-->
    <!--            </div>-->
    <!--            <div class="title_right">-->
    <!--                <div class="col-md-5 col-sm-5 form-group pull-right top_search">-->
    <!--                    <div class="input-group">-->
    <!--                        <input type="text" class="form-control" placeholder="Search for...">-->
    <!--                        <span class="input-group-btn">-->
    <!--                            <button class="btn btn-default" type="button">Go!</button>-->
    <!--                        </span>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="clearfix"></div>-->
    <!--        <div class="row">-->
    <!--            <div class="col-md-12 col-sm-12">-->
    <!--                <div class="x_panel">-->
    <!--                    <div class="x_content">-->
                            <?php
                               //echo $MSG;
                               echo $error;
                            ?>
    <!--                        <form name="CreateMailForm" autocomplete="off" id="CreateMailForm"  method="post" novalidate>                        -->
    <!--                           <input type="hidden" value="View" id="IDView" name="View">-->
    <!--                            <span class="section"></span>-->
    <!--                            <div class="field item form-group">-->
    <!--                                <label class="col-form-label col-md-3 col-sm-3  label-align">Sender<span class="required">*</span></label>-->
    <!--                                <div class="col-md-6 col-sm-6">-->
    <!--                                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="Sender" id="Sender" placeholder="" required="required" /><span id="MSG_ContactName"></span>-->
    <!--                                </div>-->
    <!--                            </div>                                                           -->
    <!--                            <div class="field item form-group">-->
    <!--                                <label class="col-form-label col-md-3 col-sm-3  label-align">To</label>-->
    <!--                                <div class="col-md-6 col-sm-6">-->
    <!--                                    <input class="form-control" name="Email_Id" id="Email_Id" class='email' required="required" type="email" /><span id="MSG_Email"></span>-->
    <!--                                </div>-->
    <!--                            </div>   -->
    <!--                            <div class="field item form-group">-->
    <!--                                <label class="col-form-label col-md-3 col-sm-3  label-align">Subject<span class="required">*</span></label>-->
    <!--                                <div class="col-md-6 col-sm-6">-->
    <!--                                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="Subject" id="Subject" placeholder="" required="required" /><span id="MSG_ContactName"></span>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="field item form-group">-->
    <!--                                <label class="col-form-label col-md-3 col-sm-3  label-align">Message</label>-->
    <!--                                <div class="col-md-6 col-sm-6">-->
    <!--                                <textarea required="required" rows="10" class="form-control" name="Message" id="Message"></textarea></div>-->
    <!--                            </div>-->
    <!--                           <div id="HiddenFormField"></div>-->

    <!--                            </div>                               -->
    <!--                             <div class="ln_solid"> -->
    <!--                                <div class="form-group">-->
    <!--                                    <div class="col-md-6 offset-md-3">-->
    <!--                                        <input type='submit' name="Send_Mail" id="Send_Mail" value="Send" class="btn btn-success">-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                             </div> -->
    <!--                        </form>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

<!-- /page content -->
<?php
//Footer Section
//include 'footer/footer.php';
?>

