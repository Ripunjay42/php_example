<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "Harami12";
$dbname = "b_assign10_insert";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if rollno parameter is set
if(isset($_GET['rollno'])) {
    $rollno = $_GET['rollno'];

    // Prepare SQL statement to delete user
    $sql = "DELETE FROM users WHERE rollno = '$rollno'";

    if ($conn->query($sql) === TRUE) {
        // Redirect to display page after successful deletion
        header("Location: display_data.php");
        exit(); // Ensure that script execution stops after redirection
    } else {
        echo "Error deleting user: " . $conn->error;
    }
} else {
    echo "Rollno parameter not set";
}

// Close connection
$conn->close();
?>
