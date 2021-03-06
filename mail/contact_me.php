<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'contato@itamarwjr.com.br'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Novo E-mail de:  $name";
$email_body = "Alguem enviou um e-mail do site.<br><br>"."Detalhes:<br><br>Nome: $name<br><br>E-mail: $email_address<br><br>Telefone: $phone<br><br>Mensagem:<br>$message";
$headers = "From: noreply@itamarwjr.com.br\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address\n";
$headers .= "Content-Type: text/html; charset=UTF-8";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>
