<?php
$host = "localhost";  // Change if MySQL is on another host
$user = "root";       // Your MySQL username
$pass = "";           // Your MySQL password
$dbname = "emaildb";  // Database name

// Create database connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get email from form
$email = $_POST['email'];

// Insert email into the database
$sql = "INSERT INTO emails (email) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
if ($stmt->execute()) {
    echo "<h3>Email saved successfully!</h3>";
} else {
    echo "<h3>Error: " . $stmt->error . "</h3>";
}

// Close connection
$stmt->close();
$conn->close();
?>
