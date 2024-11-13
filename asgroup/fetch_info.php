<?php
// Database connection
$conn = mysqli_connect("127.0.0.1:3306", "u613173283_contactinfo", "Md@998960", "u613173283_asgroup");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Query to retrieve data
$sql = "SELECT name, email, subject, message FROM contactinfo";
$result = mysqli_query($conn, $sql);

// Fetch data and store in an array
$contactInfo = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $contactInfo[] = $row;
    }
}

// Close connection
mysqli_close($conn);

// Prepare the email content
$emailContent = "Contact Information:\n\n";
foreach ($contactInfo as $contact) {
    $emailContent .= "Name: " . $contact['name'] . "\n";
    $emailContent .= "Email: " . $contact['email'] . "\n";
    $emailContent .= "Subject: " . $contact['subject'] . "\n";
    $emailContent .= "Message: " . $contact['message'] . "\n";
    $emailContent .= "------------------------------------\n";
}

// Email details
$to = "asdigitalsolution365@gmail.com"; // Replace with the actual recipient's email address
$subject = "Contact Information from Database";
$headers = "asdigitalmarketingpvtltd@gmail.com"; // Replace with your domain's email

// Send the email
if (mail($to, $subject, $emailContent, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send the email.";
}

?>
