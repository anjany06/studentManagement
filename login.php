<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE username='$username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['role'] = $user['role'];
      header("Location: dashboard.php");
    } else {
      echo "Incorrect password!";
    }
  } else {
    echo "User not found!";
  }
}
?>

<form method="POST" action="">
  Username: <input type="text" name="username" required><br>
  Password: <input type="password" name="password" required><br>
  <button type="submit">Login</button>
</form>