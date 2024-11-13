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
        $conn = mysqli_connect("127.0.0.1:3306", "u613173283_contactinfo", "Md@998960", "u613173283_asgroup");
        // Check connection
        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Taking input values from the form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // Inserting data into the database
        $sql = "INSERT INTO contactinfo (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

        if (mysqli_query($conn, $sql)) {
            echo "<h3>Data stored in the database successfully.</h3>";
            echo nl2br("\nName: $name\nEmail: $email\nSubject: $subject\nMessage: $message\n");
        } else {
            echo "ERROR: Hush! Sorry $sql. " . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>

</html>
