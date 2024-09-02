<?php
// Database connection parameters
require_once('connection.php');

// Retrieve user input from the form
$title = $_POST["title"];
$category = $_POST["category"];
$date = $_POST["date"];
$entry = $_POST["entry"];

// SQL query to insert data into a table
$sql = "INSERT INTO `diaryentry` (`title`, `category`, `date`, `entry`) VALUES ('$title', '$category', '$date', '$entry')";

if ($conn->query($sql) === TRUE) {
    header('Location: diaryentry.html');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
