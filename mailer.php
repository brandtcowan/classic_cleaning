<?php

    // Get the form fields, removes html tags and whitespace.
    $name = strip_tags(trim($_POST["cust-name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST["Email"]), FILTER_SANITIZE_EMAIL);
    $phone = $_POST["phone"];
    $staddress = $_POST["st-address"];
    $citystzip =$_POST["city-st-zip"];
    $emailme =$_POST["email-me"];
    $callme =   $_POST["call-me"];
    $servicetype =$_POST["service-type"];
    $sqft = $_POST["sqft"];
    $rooms = $_POST["rooms"];
    $bathrooms = $_POST["bathrooms"];
    $pets=$_POST["pets"];




    // Check the data.
   /*if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: http://www.yuniandbrandt.life/index.php?success=-1#form");
        exit;
    }*/

    // Set the recipient email address. Update this to YOUR desired email address.
    $recipient = "brandtcowan89@gmail.com";

    // Set the email subject.
    $subject = "New Contact Request from $name";

    // Build the email content.
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone:$phone\n";
    $email_content .= "Preferred Contact: $callme $emailme \n\n";
    $email_content .= "Street Address:\n $staddress \n $citystzip \n";
    $email_content .= "Service Type: $servicetype\n"
    $email_content .= "Sq Ft: $sqft\n"
    $email_content .= "Rooms: $rooms\n"
    $email_content .= "Bathrooms: $bathrooms\n"
    $email_content .= "Pets: $pets\n"


    // Build the email headers.
    $email_headers = "From: $name <$email>";

    // Send the email.
    mail($recipient, $subject, $email_content, $email_headers);

    // Redirect to the index.html page with success code
    //header("Location: http://www.yuniandbrandt.life/index.php?success=1#form");

?>
