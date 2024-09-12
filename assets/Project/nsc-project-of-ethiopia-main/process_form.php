<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];
    
    // Create a string with the form data
    $data = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message\n\n";
    
    // Append the data to a text file (e.g., save.txt)
    file_put_contents("save.txt", $data, FILE_APPEND);
    
    // Respond with a success status
    http_response_code(200);
} else {
    // Respond with an error status
    http_response_code(400);
}
?>
