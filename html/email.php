<?php
if( isset($_POST["submit"]) ){

    // Checking For Blank Fields..
  if($_POST["vemail"]==""||$_POST["sub"]=="") {
      echo "Fill All Fields..";
  } else {

    // Check if the "Sender's Email" input field is filled out
    $email=$_POST['vemail'];

    // Sanitize E-mail Address
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Validate E-mail Address
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    if (!$email){
      echo "Invalid Sender's Email";
    } else {

      $subject = $_POST['sub'];
      $headers = 'From:'. $email2 . "\r\n"; // Sender's Email
      $headers .= 'Cc:'. $email2 . "\r\n"; // Carbon copy to Sender

      // Message lines should not exceed 70 characters (PHP rule), so wrap it
      $message = wordwrap($message, 70);

      // Send Mail By PHP Mail Function

      mail("news@antistrokes.ru", $subject, $message, $headers);

//      header('Content-Type: application/json');
//      echo json_encode({'send':'done'});

    }
  }
}
?>
