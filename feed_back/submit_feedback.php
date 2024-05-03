<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "Harami12";
$dbname = "b_assign10_insert"; 

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

<!DOCTYPE html>
<html>
<head>
    <title>Course Feedback Form</title>
</head>
<body>
    <h2>Course Feedback Form</h2>
    <form action="submit_feedback.php" method="post">
        <label for="course_name">Course Name:</label><br>
        <input type="text" id="course_name" name="course_name" required><br><br>
        
        <label for="instructor_name">Instructor Name:</label><br>
        <input type="text" id="instructor_name" name="instructor_name" required><br><br>
        
        <label for="rating">Rating:</label><br>
        <input type="number" id="rating" name="rating" min="1" max="5" required><br><br>
        
        <label for="comments">Comments:</label><br>
        <textarea id="comments" name="comments" rows="4" cols="50" required></textarea><br><br>
        
        <input type="submit" value="Submit Feedback">
    </form>
    <button id="logout"><a href="logout.php">logout</a></button>
</body>
</html>

