<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Set recipient email address
  $to = "adrian.ferrufino97@gmail.com";

  // Get form data
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $subject = test_input($_POST["subject"]);
  $message = test_input($_POST["message"]);

  // Create email headers
  $headers = "From: $email\r\nReply-To: $email\r\n";

  // Compose email message
  $email_message = "Nombre: $name\n\n";
  $email_message .= "Correo: $email\n\n";
  $email_message .= "Sujeto: $subject\n\n";
  $email_message .= "Mensaje:\n$message\n";

  // Send email
  if (mail($to, $subject, $email_message, $headers)) {
    echo "sent";
  } else {
    echo "error";
  }

}

// Function to test and sanitize input data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
