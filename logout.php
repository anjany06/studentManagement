<?php
session_start();
//unset session variables
session_destroy();
//then redirect to login page
header("Location: login.php");
?>