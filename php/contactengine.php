<?php

$EmailFrom = "info@wavefrontbiometric.com";
$EmailTo = "$Email";
$Subject = "Thanks for contacting Wavefront";
$Name = Trim(stripslashes($_POST['Name']));  
$Email = Trim(stripslashes($_POST['Email'])); 
$Website = Trim(stripslashes($_POST['Website']));
$Message = Trim(stripslashes($_POST['Message'])); 

// validation
$validationOK=true;
if (!$validationOK) {
  header('Location: contactthanks.php');
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Website: ";
$Body .= $Website;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  header('Location: contactthanks.php');
  exit;
}
else {
  header('Location: contacterror.php');
  exit;
}
?>