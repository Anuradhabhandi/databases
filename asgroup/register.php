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
        $conn = mysqli_connect("127.0.0.1:3306", "root", "", "asgroup");

        // Check connection
        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Taking input values from the form
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $course = $_POST['course'];

        // Inserting data into the database
        $sql = "INSERT INTO register (name, phone, email, course) VALUES ('$name', '$phone', '$email', '$course')";

        if (mysqli_query($conn, $sql)) {
            echo "<h3>Data stored in the database successfully.</h3>";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
</html>
