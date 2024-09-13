<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Validate name and message
    if (empty($name) || empty($message)) {
        echo "Name and message fields cannot be empty.";
        exit;
    }

    // Replace with your actual email address
    $to = "nahomhabtamu.nsc.eth@gmail.com";
    $subject = "New Contact Form Message from " . htmlspecialchars($name);

    // Structured email body for admin
    $body = "Contact Form Submission:\n\n";
    $body .= "Name: " . htmlspecialchars($name) . "\n";
    $body .= "Email: " . htmlspecialchars($email) . "\n\n";
    $body .= "Message:\n" . htmlspecialchars($message) . "\n";

    // Email headers
    $headers = "From: no-reply@nsc.et\r\n"; // Use a fixed sender email for reliability
    $headers .= "Reply-To: " . htmlspecialchars($email) . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email to yourself
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";

        // Send a "Thank You" email to the sender
        $thankYouSubject = "Thank You for Contacting Nahom Habtamu";
        $thankYouBody = "Dear " . htmlspecialchars($name) . ",\n\n";
        $thankYouBody .= "Thank you for reaching out to me. I have received your message and will get back to you shortly.\n\n";
        $thankYouBody .= "Best regards,\nNahom Habtamu\nNahom Software Company";

        // Headers for thank you email
        $thankYouHeaders = "From: no-reply@nsc.et\r\n";
        $thankYouHeaders .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Send the thank you email to the user
        mail($email, $thankYouSubject, $thankYouBody, $thankYouHeaders);

    } else {
        echo "Failed to send the message. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
