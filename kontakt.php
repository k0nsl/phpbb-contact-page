<?php
 // Assign the input values to variables for easy reference
$email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$message= filter_var($_POST['message'], 
                     FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
 
// Test input values for errors
$errors = array();
if(mb_strlen($name) < 2) {
  if(!$name) {
    $errors[] = "You must enter a name.";
  } else {
    $errors[] = "Name must be at least 2 characters.";
  }
}
if(!$email) {
  $errors[] = "You must enter an e-mail.";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "You must enter a valid e-mail.";
} else if (checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")) {
         $errors[] = "Invalid e-mail.";
}

if(mb_strlen($message) < 10) {
  if(!$message) {
    $errors[] = "You must enter a message.";
  } else {
    $errors[] = "Message must be at least 10 characters.";
  }
}
 
if($errors) {
  // Output errors and die with a failure message
  $errortext = "";
  foreach($errors as $error) {
    $errortext .= "<li>".$error."</li>";
  }
  die("<span class='failure'>The following errors occured:<ul>". $errortext ."</ul></span>");
}
 
// Send the email
$to = "you-email-here@domain.tld";
$subject = "Contact Form: $name";
$message = "$message";
$headers  = "From: $to\r\n" .
  "X-Mailer: k0nsl-mail-form\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers = "Reply-To: $email";
 
mail($to, $subject, $message, $headers);
 
// Die with a success message
die("<span class='success'>Success! Your message has been sent.</span>");
 
?>