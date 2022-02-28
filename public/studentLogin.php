<?php
session_start();
require_once "../config.php";
if(isset($_SESSION['studentId'])!="") {
    header("Location: profile.php");
}
if(isset($_POST['studentLogin'])) {
    $rollNo = mysqli_real_escape_string($conn,$_POST['rollNo']);
    $psw = mysqli_real_escape_string($conn,$_POST['psw']);
    if(!strlen($rollNo) == 9) {
        $rollNo_error = "University roll number should be of 10 digits";
    }
    if(!strlen($psw) >= 8) {
        $psw_error = "Password length should be of minimum 8 characters";
    }
    $res = mysqli_query($conn,"SELECT * FROM studentTab WHERE rollNo = '" . $rollNo. "' and psw = '" . md5($psw). "'");
    if(!empty($res)) {
        if($row = mysqli_fetch_array($res)) {
            $_SESSION['studentId'] = $row['studentId'];
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['emailId'] = $row['emailId'];
            $_SESSION['mobile'] = $row['mobile'];
            $_SESSION['rollNo'] = $row['rollNo'];
            $_SESSION['regNo'] = $row['regNo'];
            $_SESSION['college'] = $row['college'];
            $_SESSION['univ'] = $row['univ'];
            $_SESSION['course'] = $row['course'];
            $_SESSION['sem'] = $row['sem'];
            $_SESSION['cgpa'] = $row['cgpa'];
            $_SESSION['psw'] = $row['psw'];
            header("Location: profile.php");
        }
    } else {
        $error_msg = "Invalid Email ID or Password";
    }
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
    <style>
        form {
            background-color: #000000;
            position: absolute;
            top: 25%;
            left: 25%;
        }
        fieldset {
            background-color: #000000;
            color: #ADFF2F;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color:#ADFF2F; font-weight: bold;">Student Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> 
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color:#9370DB; font-weight: bold;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color:#9370DB; font-weight: bold;">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color:#9370DB; font-weight: bold;">Contacts</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <form class="w-50 p-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
        <fieldset class="w-100">
            <legend>Enter login credentials</legend><hr>
            <div class="form-group mb-3 px-2">
                <label class="form-label">University Roll No</label>
                <input type="number" name="rollNo" class="form-control py-3" maxlength="9" placeholder="Enter University Roll No" required="">
                <span class="text-danger"><?php if(isset($rollNo_error)) echo $rollNo_error; ?></span>
            </div>
            <div class="form-group mb-3 px-2">
                <label class="form-label">Password</label>
                <input type="password" name="psw" class="form-control py-3" maxlength="20" placeholder="Enter Password" required="">
                <span type="text-danger"><?php if(isset($psw_error)) echo $psw_error; ?></span>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" name="studentLogin" class="btn btn-success rounded-pill">Login</button>                
            </div><br>
            <h6>Haven't registered yet?&nbsp&nbsp&nbsp&nbsp<a href="studentRegister.php">Click Here</a></h6>
        </fieldset>
    </form>
</body>
</html>