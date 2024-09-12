<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Sanitize user input
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

  // Replace with your actual email address
  $to = "nahomhabtamu.nsc.eth@gmail.com";

  $subject = "New Contact Form Message from $name";

  // Create a more informative and structured email body
  $body = "**Contact Form Submission**\n\n"
         . "Name: $name\n"
         . "Email: $email\n\n"
         . "Message:\n"
         . "$message\n";

  // Set custom From header (verification recommended)
  $headers = "From: info@nsc.et <nahomhabtamu.nsc.eth@gmail.com>\n"
           . "Reply-To: $email\n"
           . "Content-Type: text/plain; charset=UTF-8\n";

  // **IMPORTANT: Verification Step (Optional but Recommended)**
  // Add a verification step to ensure the submitted email is valid and belongs to the sender.
  // You can implement this using a verification link sent to the submitted email address or a CAPTCHA.
  // Here's an example with a verification link:

  // if (verifyEmail($email)) {
    // Use the `mail()` function or a more robust library (see approach 2)
    if (mail($to, $subject, $body, $headers)) {
      echo "Message sent successfully!";
    } else {
      echo "Failed to send message. Please try again later.";
    }
  // } else {
  //   echo "Email address could not be verified.";
  // }

  // Function to implement email verification (replace with your implementation)
  function verifyEmail($email) {
    // Your code to send a verification link and check for successful verification
    // Return true if verified, false otherwise
    return true; // Replace with actual verification logic
  }
}
?>