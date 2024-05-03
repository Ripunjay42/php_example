<?php

$username = "";
$password = "";
$login_err = "";

session_start();
$servername = "localhost";
$username = "root";
$password = "Harami12";
$dbname = "b_assign10_insert"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Set username and password from POST data
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
  
    // Prepare a select statement with parameter binding
    $sql = "SELECT password FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
  
    // Execute the prepared statement
    $stmt->execute();
    $result = $stmt->get_result();
  
    // Check if username exists and fetch password
    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      $stored_password = $row["password"]; // Assuming password is stored in plain text (NOT RECOMMENDED)
    }
  
    // Close the prepared statement and result set
    $stmt->close();
    $result->close();
  
    // Validate credentials (using plain text password comparison - NOT SECURE)
    if (empty($username)) {
      $login_err = "Please enter username.";
    } else if (empty($password)) {
      $login_err = "Please enter password.";
    } else if ($password != $stored_password) { // Validate against plain text password (UNSAFE)
      $login_err = "Invalid username or password.";
    }
  
    // If credentials are valid, create session variables and redirect
    if (empty($login_err)) {
      $_SESSION["loggedin"] = true;
      $_SESSION["username"] = $username;
      header("location: admin_dashboard.php"); 
    }
  }
  
  // Close database connection
  $conn->close();
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>
    <?php if(isset($error)) { echo "<p>$error</p>"; } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
