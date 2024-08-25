<?php
include 'db.php';
session_start();

//checks if role sets as student
if ($_SESSION['role'] != 'student') {
  header("Location: dashboard.php");
}

//sets id of student
$user_id = $_SESSION['user_id'];

$sql = "SELECT courses.course_name, grades.grade FROM grades 
        JOIN enrollments ON grades.enrollment_id = enrollments.id 
        JOIN courses ON enrollments.course_id = courses.id 
        JOIN students ON enrollments.student_id = students.id 
        WHERE students.user_id = $user_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "Course: " . $row['course_name'] . " - Grade: " . $row['grade'] . "<br>";
  }
} else {
  echo "No grades found.";
}
?>
<style>
  body {
    text-align: center;
    font-size: 3rem;
    padding: 30px;
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
  }
</style>