<?php
session_start();
if(isset($_SESSION['studentId'])=="") {
    header("Location: studentLogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
    <h3 class="text-center"><b class="text-danger">Student Name</b> : <b class="text-success"><?php echo $_SESSION['fname']?></b></h3>
    <div>
        <p class="p-3 mb-2 bg-success text-white text-center"><b>Email ID</b> : <?php echo $_SESSION['emailId']?></p>
        <p class="p-3 mb-2 bg-success text-white text-center"><b>Mobile No</b> : <?php echo $_SESSION['mobile']?></p>
        <p class="p-3 mb-2 bg-success text-white text-center"><b>University Roll No</b> : <?php echo $_SESSION['rollNo']?></p>
        <p class="p-3 mb-2 bg-success text-white text-center"><b>Registration No</b> : <?php echo $_SESSION['regNo']?></p>
        <p class="p-3 mb-2 bg-success text-white text-center"><b>College Name</b> : <?php echo $_SESSION['college']?></p>
        <p class="p-3 mb-2 bg-success text-white text-center"><b>University Name</b> : <?php echo $_SESSION['univ']?></p>
        <p class="p-3 mb-2 bg-success text-white text-center"><b>Course Name</b> : <?php echo $_SESSION['course']?></p>
        <p class="p-3 mb-2 bg-success text-white text-center"><b>Semester</b> : <?php echo $_SESSION['sem']?></p>
        <p class="p-3 mb-2 bg-success text-white text-center"><b>Current CGPA</b> : <?php echo $_SESSION['cgpa']?></p>
    </div>
    <div class="text-center">
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>   
</body>
</html>