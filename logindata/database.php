<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Page</title>
</head>

<body>
    <center>
    <?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "logindatabase");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Taking input values from the form
$email = $_POST['email'];
$password = $_POST['password'];
$captcha = ""; // Initialize the captcha variable

if (isset($_POST['captcha'])) {
    $captcha = $_POST['captcha'];
} else {
    // Handle the error: captcha not set
    echo "Captcha is missing!";
   // exit; // Stop execution if captcha is missing
}

// Inserting data into the database
$sql = "INSERT INTO login (email, password, captcha) VALUES ('$email', '$password', '$captcha')";

if (mysqli_query($conn, $sql)) {
    echo "<h3>Data stored in the database successfully.</h3>";
    echo nl2br("\nEmail: $email\nPassword: $password\nCaptcha: $captcha\n");
} else {
    echo "ERROR: Hush! Sorry $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>

    </center>
</body>

</html>
