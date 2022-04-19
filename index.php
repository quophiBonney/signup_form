<?php

$conn = mysqli_connect("localhost", "root", "", "test");
if(isset($_POST['signup'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
   if($password == $confirmPassword){
    $isUsernameTaken = "SELECT * FROM members WHERE password = '$password'";
    $query = mysqli_query($conn, $isUsernameTaken);
    $num = mysqli_num_rows($query);
       if($num > 0){
           echo '<script>alert("Username/Email already exist")</script>';
       }else {
           $result = "INSERT INTO members(username, email, password)
           VALUES('$username', '$email', '$password')";
           $query = mysqli_query($conn, $result);
           if($query){
               echo '<script>alert("Signup successful")</script>';
           }else {
               echo '<script>alert("Something went wrong")</script>';
           }
       }
   }else {
       echo '<script>alert("Password do not match")</script>';
   } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form Using Html, CSS, Bootstrap and PHP/MySQL</title>

    <!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!--Custom CSS-->
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5 shadow bg-primary">
                <form action="index.php" method="POST">
                    <h4 class="text-center text-light">SIGNUP FORM</h4>
                    <p class="text-center text-light">join the largest community today</p>
                        <hr class="bg-light">
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Username" class="form-control" required>
</div>
<div class="form-group">
                        <input type="text" name="email" placeholder="Email" class="form-control" required>
</div>
<div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control" required>
</div>
<div class="form-group">
                        <input type="password" name="confirmPassword" placeholder="Confirm Password" class="form-control" required>
</div>
<div class="form-group">
                        <input type="submit" name="signup" value="SIGNUP" class="form-control bg-light text-primary">
</div>
<div class="form-group text-center">
                        <a class="text-light" href="login.php">Already a member?</a>
</div>
                </form>
            </div>
    </div>
</body>
</html>