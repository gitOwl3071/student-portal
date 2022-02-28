<?php 
require_once "../config.php";
if(isset($_SESSION['studentId'])!="") {
    header("Location: studentLogin.php");
}
if(isset($_POST['studentRegister'])) {
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $emailId = mysqli_real_escape_string($conn,$_POST['emailId']);
    $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
    $rollNo = mysqli_real_escape_string($conn,$_POST['rollNo']);
    $regNo = mysqli_real_escape_string($conn,$_POST['regNo']);
    $college = mysqli_real_escape_string($conn,$_POST['college']);
    $univ = mysqli_real_escape_string($conn,$_POST['univ']);
    $course = mysqli_real_escape_string($conn,$_POST['course']);
    $sem = mysqli_real_escape_string($conn,$_POST['sem']);
    $cgpa = mysqli_real_escape_string($conn,$_POST['cgpa']);
    $psw = mysqli_real_escape_string($conn,$_POST['psw']);
    if(!preg_match("/^[a-zA-Z ]+$/",$fname)) {
        $fname_error = "Full name should contain only alphabets and space";
    }
    if(!filter_var($emailId,FILTER_SANITIZE_EMAIL)) {
        $emailId_error = "Enter valid email Id";
    }
    if(!preg_match("/^[6-9][0-9]{9}+$/",$mobile)) {
        $mobile_error = "Mobile number should be of 10 digits and start either by 6,7,8 or 9";
    }
    if(!strlen($rollNo) == 9) {
        $rollNo_error = "University roll number should be of 10 digits";
    }
    if(!strlen($regNo) == 19) {
        $regNo_error = "Registration number should be of 20 digits";
    }
    if(!empty($course) && course != "BCA" && course != "BBA" && course != "MCA" && course != "MSc(CS)") {
        $course_error = "Field cannot be empty";
    }
    if(!empty($sem) && sem != "First" && sem != "Second" && sem != "Third" && sem != "Fourth" && sem != "Fifth" && sem != "Sixth") {
        $sem_error = "Field cannot be empty";
    }
    if(!strlen($psw) >= 8) {
        $psw_error = "Password length should be of minimum 8 characters";
    }
    if(!$error) {
        if(mysqli_query($conn,"INSERT INTO studentTab(fname,emailId,mobile,rollNo,regNo,college,univ,course,sem,cgpa,psw) VALUES ('" . $fname . "','" . $emailId . "','" . $mobile . "','" . $rollNo . "','" . $regNo . "','" . $college . "','" . $univ . "','" . $course . "','" . $sem . "','" . $cgpa . "','" . md5($psw) . "')")) {
            header("location: studentLogin.php");
            exit();
        } else {
            echo "Error:" .  $sql . "" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
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
    <form class="w-100" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
        <fieldset class="w-100">
            <legend>Register yourself</legend>
            <div class="form-group mb-3 px-5">
                <label class="form-label">Full Name</label>
                <input type="text" name="fname" class="form-control" placeholder="Enter Full Name" required="">
                <span class="text-danger"><?php if (isset($fname_error)) echo $fname_error; ?></span>
            </div>
            <div class="form-group mb-3 px-5">
                <label class="form-label">Email ID</label>
                <input type="email" name="emailId" class="form-control" placeholder="Enter Email ID" required="">
                <span class="text-danger"><?php if (isset($emailId_error)) echo $emailId_error; ?></span>
            </div>
            <div class="form-group mb-3 px-5">
                <label class="form-label">Mobile No</label>
                <input type="number" name="mobile" class="form-control" maxlength="10" placeholder="Enter Mobile No" required="">
                <span class="text-danger"><?php if(isset($mobile_error)) echo $mobile_error; ?></span>
            </div>
            <div class="form-group mb-3 px-5">
                <label class="form-label">University Roll No</label>
                <input type="number" name="rollNo" class="form-control" maxlength="10" placeholder="Enter University Roll No" required="">
                <span class="text-danger"><?php if(isset($rollNo_error)) echo $rollNo_error; ?></span>
            </div>
            <div class="form-group mb-3 px-5">
                <label class="form-label">Registration No</label>
                <input type="number" name="regNo" class="form-control" maxlength="20" placeholder="Enter Registration No" required="">
                <span class="text-danger"><?php if(isset($regNo_error)) echo $regNo_error; ?></span>
            </div>  
            <div class="form-group mb-3 px-5">
                <label class="form-label">College Name</label>
                <input type="text" name="college" class="form-control" value="Techno College Hooghly" readonly="readonly">
            </div>
            <div class="form-group mb-3 px-5">
                <label class="form-label">University Name</label>
                <input type="text" name="univ" class="form-control" value="MAKAUT" readonly="readonly">    
            </div>
            <div class="form-group mb-3 px-5">
                <label class="form-label">Course</label>
                <select name="course" class="form-select" required="">
                    <option selected>Choose your course</option>
                    <option value="BCA">BCA</option>
                    <option value="BBA">BBA</option>
                    <option value="MCA">MCA</option>
                    <option value="MSc(CS)">MSc(CS)</option>
                </select>
                <span type="text-danger"><?php if(isset($course_error)) echo $course_error; ?></span>
            </div>
            <div class="form-group mb-3 px-5">
                <label class="form-label">Semester</label>
                <select name="sem" class="form-select" required="">
                    <option selected>Choose your semester</option>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Third">Third</option>
                    <option value="Fourth">Fourth</option>
                    <option value="Fifth">Fifth</option>
                    <option value="Sixth">Sixth</option>
                </select>
                <span type="text-danger"><?php if(isset($sem_error)) echo $sem_error; ?></span>
            </div>
            <div class="form-group mb-3 px-5">
                <label class="form-label">Current CGPA</label>
                <input type="text" name="cgpa" class="form-control" placeholder="Enter Current CGPA" required="">
            </div> 
            <div class="form-group mb-3 px-5">
                <label class="form-label">Create Password</label>
                <input type="password" name="psw" class="form-control" maxlength="20" placeholder="Create Password" required="">
                <span type="text-danger"><?php if(isset($psw_error)) echo $psw_error; ?></span>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" name="studentRegister" class="btn btn-info rounded-pill">Register</button>
            </div>
        </fieldset>
    </form>
</body>
</html>