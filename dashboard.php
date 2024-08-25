<?php
session_start();

//checks if variable sets role as admin or not
if (!isset($_SESSION['role'])) {
	header("Location: login.php");
}

echo "<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		.dashboard {
			width: 80%;
			margin: 40px auto;
			background-color: #fff;
			padding: 20px;
			border: 1px solid #ddd;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
		.dashboard h1 {
			color: #333;
			margin-top: 0;
		}
		.dashboard a {
			text-decoration: none;
			color: #337ab7;
		}
		.dashboard a:hover {
			color: #23527c;
		}
	</style>
</head>
<body>
	<div class='dashboard'>
		<h1>Welcome, " . $_SESSION['role'] . "</h1>
		<p><a href='logout.php'>Logout</a></p>
		
		<ul>";
//if role is admin then displays create student and course options
if ($_SESSION['role'] == 'admin') {
	echo "<li><a href='create_student.php'>Create Student</a></li>";
	echo "<li><a href='create_course.php'>Create Course</a></li>";

	//if role is teacher then dispalys Enter grades option
} elseif ($_SESSION['role'] == 'teacher') {
	echo "<li><a href='enter_grade.php'>Enter Grades</a></li>";
	//if role is student then dispalys view grades option

} elseif ($_SESSION['role'] == 'student') {
	echo "<li><a href='view_grades.php'>View Grades</a></li>";
}

echo "</ul>
	</div>
</body>
</html>";
?>