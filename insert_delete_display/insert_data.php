<?php
    $servername = "localhost";
    $username = "root";
    $password = "Harami12";
    $dbname = "b_assign10_insert";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
            $rollno=$_POST['rollno'];
            $name = $_POST['name'];
            $course = $_POST['course'];
            $email = $_POST['email'];

            $sql = "INSERT INTO users (rollno, name, course, email) VALUES ('$rollno', '$name', '$course', '$email')";

            if ($conn->query($sql) === TRUE) 
            {
                echo '<p id="successMessage">New record created successfully</p>';
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Insert, Display, and Delete Data</title>
    <style>
        h1{
            text-align: center;
        }
        #userTable {
            display: none;
        }
        #insertForm {
            width: 30%;
            margin: 0 auto;
        }
        #insertForm label {
            display: block;
            margin-bottom: -2px;
        }
        #insertForm input[type="text"],
        #insertForm input[type="email"],
        #insertForm input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 5px;
        }
        #insertForm input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        #insertForm input[type="submit"]:hover {
            background-color: #45a049;
        }
        #displayButton {
            display: block;
            width: 10%;
            margin: 20px auto;
            text-align: center;
        }
        #displayButton a {
            text-decoration: none;
            color: white;
        }
        #displayButton a:hover {
            text-decoration: underline;
        }
        button {
            background-color: #008CBA;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        #successMessage {
            text-align: center;
            color: green;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Insert Data</h1>
    <form id="insertForm" method="post">

        <label for="rollno">Rollno:</label><br>
        <input type="text" id="rollno" name="rollno" required><br><br>    

        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="course">Course:</label><br>
        <input type="text" id="course" name="course" required><br><br>
    
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
    
        <input type="submit" value="Submit">
    </form>
    <br> <br>
    <button id="displayButton"><a href="display_data.php">Display Data</a></button>

    
</body>
</html>