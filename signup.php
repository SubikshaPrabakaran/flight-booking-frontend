<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];
  // Check if email is valid
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<p>Invalid email address</p>";
  }
  // Check if passwords match
  if ($password != $confirm_password) {
    echo "<p>Passwords do not match</p>";
  }
  // If all validations pass, create the account
  else {
    // Create a new user in the database
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
    mysqli_query($conn, $sql);
    // Redirect to the login page
    header("Location: login.php");
  }
}
?>