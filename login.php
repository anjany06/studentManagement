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
<h1>LOGIN IN</h1>
<form method="POST" action="">
  Username: <input type="text" name="username" required><br>
  Password: <input type="password" name="password" required><br>
  <button type="submit">Login</button>
</form>
<style>
  h1 {
    text-align: center;
  }

  form {
    max-width: 300px;
    margin: 40px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  input[type="text"],
  input[type="password"] {
    width: 100%;
    height: 40px;
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  input[type="text"]:focus,
  input[type="password"]:focus {
    border-color: #aaa;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  button[type="submit"] {
    width: 100%;
    height: 40px;
    background-color: #2776ff;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  button[type="submit"]:hover {
    background-color: #2776ff89;
  }

  a {
    display: block;
    margin-top: 20px;
    text-align: center;
    color: #337ab7;
    text-decoration: none;
  }

  a:hover {
    color: #23527c;
  }

  @media only screen and(max-width: 768px) {
    form {
      max-width: 90%;
    }

    input[type="text"],
    input[type="password"] {
      font-size: 16px;
    }

    button[type="submit"] {
      font-size: 16px;
    }
  }

  @media only screen and(max-width: 480px) {
    form {
      max-width: 100%;
    }

    input[type="text"],
    input[type="password"] {
      font-size: 14px;
    }

    button[type="submit"] {
      font-size: 14px;
    }
  }
</style>