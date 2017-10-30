<?php

    // Get the form fields, removes html tags and whitespace.
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);
    $group =$_POST["group"];
    $solo=$_POST["solo"];
$memphis=$_POST["memphis"];

    // Check the data.
   if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: http://www.yuniandbrandt.life/index.php?success=-1#form");
        exit;
    }

    // Set the recipient email address. Update this to YOUR desired email address.
    $recipient = "brandtcowan89@gmail.com";

    // Set the email subject.
    $subject = "RSVP from $name";

    // Build the email content.
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";
    $email_content .= "Group: $group\n";
    $email_content .= "Solo: $solo\n";
$email_content .= "Memphis: $memphis\n";


    // Build the email headers.
    $email_headers = "From: $name <$email>";

    // Send the email.
    mail($recipient, $subject, $email_content, $email_headers);

    // Redirect to the index.html page with success code
    header("Location: http://www.yuniandbrandt.life/index.php?success=1#form");

?>
