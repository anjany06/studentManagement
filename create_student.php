<?php
include 'db.php';
session_start();

//checks if role sets as admin or not
if ($_SESSION['role'] != 'admin') {
  header("Location: dashboard.php");
}

//checks if form is submitted or not
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $age = $_POST['age'];
  $address = $_POST['address'];
  $contact = $_POST['contact'];
  $photo = $_POST['photo'];
  $parent_name = $_POST['parent_name'];
  $parent_contact = $_POST['parent_contact'];

  $sql = "INSERT INTO students (name, age, address, contact, photo, parent_name, parent_contact) 
            VALUES ('$name', $age, '$address', '$contact', '$photo', '$parent_name', '$parent_contact')";


  //inserts student into the databse if successful else error
  if ($conn->query($sql) === TRUE) {
    echo "New student created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<form method="POST" action="">
  Name: <input type="text" name="name" required><br>
  Age: <input type="number" name="age" required><br>
  Address: <textarea name="address" required></textarea><br>
  Contact: <input type="text" name="contact" required><br>
  Photo: <input type="text" name="photo"><br>
  Parent Name: <input type="text" name="parent_name" required><br>
  Parent Contact: <input type="text" name="parent_contact" required><br>
  <button type="submit">Create Student</button>
</form>

<style>
  body {
    font-family: sans-serif;
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
  input[type="number"],
  textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  input[type="text"]:focus,
  input[type="number"]:focus,
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