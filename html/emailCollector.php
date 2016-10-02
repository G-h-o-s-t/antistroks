<?php
$email=urldecode($_GET["email"]);
$type=urldecode($_GET["type"]);

$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);



$subject = 'E-mail подписка';
$message = 'Новая подписка. Тип: ' . $type . ', E-mail: '. $email;

if (!$email){
  $result = 'error';
} else {
  $result = 'success';
  mail("news@antistrokes.ru", $subject, $message, $headers);
}

header('Content-type: application/json');
$ansver = array('result' => $result);
echo json_encode($ansver);

?>
