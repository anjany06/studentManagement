<?php
include 'db.php';
session_start();

//checks if role sets as teacher
if ($_SESSION['role'] != 'teacher') {
  header("Location: dashboard.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $enrollment_id = $_POST['enrollment_id'];
  $grade = $_POST['grade'];

  $sql = "INSERT INTO grades (enrollment_id, grade) VALUES ($enrollment_id, '$grade')";

  if ($conn->query($sql) === TRUE) {
    echo "Grade entered successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<form method="POST" action="">
  Enrollment ID: <input type="number" name="enrollment_id" required><br>
  Grade: <input type="text" name="grade" required><br>
  <button type="submit">Enter Grade</button>
</form>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
  }

  form {
    width: 50%;
    margin: 40px auto;
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  label {
    display: block;
    margin-bottom: 10px;
  }

  input[type="number"],
  input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  input[type="number"]:focus,
  input[type="text"]:focus {
    border-color: #aaa;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  button[type="submit"] {
    background-color: #337ab7;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  button[type="submit"]:hover {
    background-color: #23527c;
  }
</style>