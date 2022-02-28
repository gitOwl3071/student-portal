<?php
ob_start();
session_start();
if(isset($_SESSION['studentId'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['fname']);
    unset($_SESSION['emailId']);
    unset($_SESSION['mobile']);
    unset($_SESSION['rollNo']);
    unset($_SESSION['regNo']);
    unset($_SESSION['college']);
    unset($_SESSION['univ']);
    unset($_SESSION['course']);
    unset($_SESSION['sem']);
    unset($_SESSION['cgpa']);
    header("Location: studentLogin.php");
} else {
    header("Location: studentLogin.php");
}
?>