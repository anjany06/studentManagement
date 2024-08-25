<!DOCTYPE html>
<html>

<head>
  <title>Student Management System</title>
  <style>
    body {
      background-color: #f2f2f2;
      font-family: sans-serif;
    }

    .container {
      width: 80%;
      margin: 40px auto;
      background-color: #fff;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-btn {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .login-btn:hover {
      background-color: #3e8e41;
    }
  </style>
</head>

<body>
  <div class='container'>
    <h1>Welcome to Student Management System</h1>
    <p>Please select your role to login:</p>
    <div class='login-options'>
      <a href='login.php'><button class='login-btn'>Admin Login</button></a>
      <a href='login.php'><button class='login-btn'>Teacher Login</button></a>
      <a href='login.php'><button class='login-btn'>Student Login</button></a>
    </div>
  </div>
</body>

</html>