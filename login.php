<?php
session_start();
if (isset($_SESSION['user_id'])) {
  header('Location: index.php');
}
if (isset($_POST['email']) && isset($_POST['password'])) {
  $username = $_POST['email'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 1) {
    // User found
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $row['id'];
    header('Location: index.php');
  } else {
    // User not found
    echo "Invalid email or password";
  }
}
?>