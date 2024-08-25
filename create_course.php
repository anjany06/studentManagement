<?php
include 'db.php';
session_start();

if ($_SESSION['role'] != 'admin') {
  header("Location: dashboard.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $course_name = $_POST['course_name'];
  $syllabus = $_POST['syllabus'];

  $sql = "INSERT INTO courses (course_name, syllabus) VALUES ('$course_name', '$syllabus')";

  if ($conn->query($sql) === TRUE) {
    echo "New course created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<form method="POST" action="">
  Course Name: <input type="text" name="course_name" required><br>
  Syllabus: <textarea name="syllabus" required></textarea><br>
  <button type="submit">Create Course</button>
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

  input[type="text"],
  textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  input[type="text"]:focus,
  textarea:focus {
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