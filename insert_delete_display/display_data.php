<!DOCTYPE html>
<html>
<head>
    <title>Display Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
            max-width: 800px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        #displaybutton {
            display: block;
            margin: 20px auto;
            text-align: center;
        }
        #displaybutton a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
        }
        #displaybutton a:hover {
            background-color: #0056b3;
        }
        button {
            border: none;
            background: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
        }
    </style>
</head>
<body>
    <h1>Users</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Rollno</th>
                <th>Name</th>
                <th>Course</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
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

            $sql = "SELECT rollno, name, course, email FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["rollno"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["course"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td><button onclick=\"deleteUser('" . $row["rollno"] . "')\" style=\"color: red;\">Delete</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No data found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    <br>
    <br>
    <button id="displaybutton"><a href="insert_data.php">Back to Insert Data</a></button>


    <script>
        function deleteUser(rollno) {
            if (confirm("Are you sure you want to delete this user?")) {
                window.location.href = "delete_user.php?rollno=" + rollno;
            }
        }
    </script>

</body>
</html>
