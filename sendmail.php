<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$name = htmlspecialchars($_POST['name']);
$company = htmlspecialchars($_POST['company']);
$phone = htmlspecialchars($_POST['phone']);
$email = htmlspecialchars($_POST['email']);
$project = htmlspecialchars($_POST['project_type']);
$size = htmlspecialchars($_POST['project_size']);
$message = htmlspecialchars($_POST['message']);

$to = "info@internetworkingsolutions.cc";

$subject = "New ICT Consultation Request";

$body = "

New ICT Consultation Request

Name: $name
Company: $company
Phone: $phone
Email: $email
Project Type: $project
Project Size: $size

Project Description:
$message

";

$headers = "From: Internetworking Solutions <info@internetworkingsolutions.cc>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

mail($to,$subject,$body,$headers);


/* AUTO REPLY TO CLIENT */

$client_subject = "Your ICT Consultation Request Has Been Received";

$client_message = "

Dear Client,

Your request has been received, and is currently being reviewed.

We will get in touch with our findings as soon as possible.

Thank you for your patience.

Internetworking Solutions Team

";

$client_headers = "From: Internetworking Solutions <info@internetworkingsolutions.cc>\r\n";
$client_headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

mail($email,$client_subject,$client_message,$client_headers);


/* REDIRECT */

header("Location: thank-you.html");
exit();

}

?>