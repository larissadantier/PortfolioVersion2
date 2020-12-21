<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "larissa_dantier@hotmail.com";
$subject = "Contato - Portfólio:  $name";
$body = "Uma nova mensagem do site\r\n"."Detalhes do contato:\r\nName: $name\r\nEmail: $email\r\nPhone: $phone\r\nMessage:\n$message";
$header = "From: larissa_dantier@hotmail.com\r\n"
          ."Reply-To: $email\r\n";
          ."X-Mailer:PHP/".phpversion();

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
