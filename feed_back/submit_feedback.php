<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "Harami12";
$dbname = "b_assign10"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $course_name = $_POST['course_name'];
    $instructor_name = $_POST['instructor_name'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];

    // Insert data into database
    $sql = "INSERT INTO feedback (course_name, instructor_name, rating, comments) VALUES ('$course_name', '$instructor_name', '$rating', '$comments')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
