<?php

    // Get the form fields, removes html tags and whitespace.
    $name = strip_tags(trim($_POST["custname"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST["Email"]), FILTER_SANITIZE_EMAIL);
    $phone = $_POST["phone"];
    $staddress = $_POST["staddress"];
    $citystzip = $_POST["citystzip"];
    $servicetype = $_POST["servicetype"];
    $sqft = $_POST["sqft"];
    $rooms = $_POST["bedrooms"];
    $bathrooms = $_POST["bathrooms"];
    $pets = $_POST["pets"];
    $contact ="Not Specified";
    $emailme = (isset($_POST["emailme"]) ? $_POST["emailme"] : null);
    $callme = (isset($_POST["callme"]) ? $_POST["callme"] : null);

    if($emailme != null && $callme == null ){
        $contact = "Email Me";
    }else if($callme != null && $emailme == null ){
        $contact = "Call Me";
    }else if($emailme != null && $callme != null){
        $contact = "Can contact either by phone or Email";
    }






    // Check the data.
   /*if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: http://www.yuniandbrandt.life/index.php?success=-1#form");
        exit;
    }*/

    // Set the recipient email address. Update this to YOUR desired email address.
    //$recipient = "admin@classiccleaningbymoms.com";
    $recipient = "brandtcowan89@gmail.com";
    //$recipient = "donotreply@classiccleaningbymoms.com";

    // Set the email subject.
    $subject = "New Quote Request from $name";

    // Build the email content.
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone:$phone\n";
    $email_content .= "Preferred Contact: $contact \n\n";
    $email_content .= "Street Address:\n $staddress \n $citystzip \n\n";
    $email_content .= "Service Type: $servicetype\n";
    $email_content .= "Sq Ft: $sqft\n";
    $email_content .= "Bedrooms: $rooms\n";
    $email_content .= "Bathrooms: $bathrooms\n";
    $email_content .= "Pets: $pets\n";


    // Build the email headers.
    $email_headers = "From: donotreply@classiccleaningbymoms.com";

    // Send the email.
    mail($recipient, $subject, $email_content, $email_headers);

    // Redirect to the index.html page with success code
    header("Location: http://www.classiccleaningbymoms.com");

?>
