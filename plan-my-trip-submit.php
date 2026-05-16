 <?php
include("config.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$rid = mt_rand();
	
    
	$name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
	$language= $_POST['language'];
    $adults = $_POST['adults'];
    $childrens = $_POST['childrens'];
	$hotel = $_POST['hotel'];
	$vehicle = $_POST['vehicle'];
	 $arrival = $_POST['arrival'];
	 $requirements = $_POST['requirements'];
     

    $admin_email = 'mldigitalwork@gmail.com';

   
    $subject = "Plan My Trip Enquiry - Taj Legacy";

    $message = "";
    $message .= "Dear ".$name.",\n\n";
    $message .= "Thank you Custom Tour Enquiry with Taj Legacy.\n\n";
    $message .= "Enquiry Details:\n";  
    $message .= "Email: ".$email."\n";
    $message .= "Phone: ".$phone."\n";
    $message .= "Country: ".$country."\n";
    $message .= "Guide Language: ".$language."\n"; 
	$message .= "Adults: ".$adults."\n";
	$message .= "Childrens: ".$childrens."\n";
	$message .= "Arrival Date: ".$arrival."\n";
	$message .= "Hotel: ".$hotel."\n";
	$message .= "Vehicle: ".$vehicle."\n\n";
	$message .= "Requirements: ".$requirements."\n\n";
    $message .= "We will contact you shortly to confirm the trip.\n\n";
    $message .= "Regards,\n";
    $message .= "Taj Legacy";

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@tajlegacy.com';
    $mail->Password = 'Tajlegacy#001';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(false);

    $mail->setFrom('info@tajlegacy.com', 'Taj Legacy');
    $mail->addAddress($email, $name);
    $mail->addCC($admin_email);
    $mail->Subject = $subject;
    $mail->Body = $message;

    if(!$mail->send()){
        echo "<div style=\"color:red;\">Email sending failed: ".$mail->ErrorInfo."</div>";
    } else {
        echo "<script>window.location='https://tajlegacy.com/thankyou.php?name=$name';</script>";
    }

    ?>
	 
 
<?php

} else {
    echo "Invalid request.";
}
?>
 				