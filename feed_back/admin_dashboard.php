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

// Retrieve feedback data from the database
$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Admin Dashboard</h2>
    <h3>Feedback Data</h3>
    <table>
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Instructor Name</th>
                <th>Rating</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["course_name"] . "</td>";
                    echo "<td>" . $row["instructor_name"] . "</td>";
                    echo "<td>" . $row["rating"] . "</td>";
                    echo "<td>" . $row["comments"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No feedback data</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <button id="logout"><a href="admin_logout.php">logout</a></button>
</body>
</html>

<?php
$conn->close();
?>
