<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    $to = "lifeofmotivation4@gmail.com";  // ✅ Your email
    $subject = "New Message from Cozy Glick Contact Form";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    
    $headers = "From: Cozy Glick <no-reply@yourdomain.com>\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        header("Location: index.php?status=success");
        exit;
    } else {
        echo "❌ Failed to send message. Please try again later.";
    }
} else {
    header("Location: index.php");
    exit;
}
?>
