<?php

$txt = "";
session_start();

if (isset($_POST['submit']) && (($_POST['field_0']) != "")) {
    $_SESSION['field_0'] = $_POST['field_0'];
    header("Location: ". $_SERVER['REQUEST_URI']);
    exit;
} else {
    if(isset($_SESSION['field_0'])) {
        //Retrieve show string from form submission.
        $txt = $_SESSION['field_0'];
        unset($_SESSION['field_0']);
    }
}

?>

    <div class="sent">

        <?php
if($txt != "") {
    echo "Dear $txt";
} else {
?>


            <?php } ?>

                <style type="text/css">
                    .sent {
                        margin: auto 0;
                        background-color: dff0d8;
                        border: #b6e1a4 1px solid;
                        padding: 15px;
                        color: #008000;
                        max-width: 98%;
                    }

                </style>


                <div>Thank you! Your form has been successfully submitted.</div>
    </div>
    <p><a href="javascript:history.back()">Go Back</a> | <a href="http://www.classiccleaningbymoms.com">Home</a></p>
