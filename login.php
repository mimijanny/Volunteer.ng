<?php
session_start();

require('includes/db_connection.php');
include('includes/functions.php');


if (isset($_POST['login'])) {
    $email_unsafe = $_POST['email'];
    $pass_unsafe = $_POST['password'];

    $email = mysqli_real_escape_string($con, $email_unsafe);
    $password = mysqli_real_escape_string($con, $pass_unsafe);

    //Query DB for details
    $check_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '$password'") or die(mysqli_error($con));
    $count = mysqli_num_rows($check_query);

    if ($count == 0) {
        //Display Error here
        addAlert('error', 'Invalid Details Provided');
        echo "<script type='text/javascript'>document.location='login.php'</script>";
    } else {
        //process login here

        $user = mysqli_fetch_array($check_query);
        $isUserActive = $user['is_active'];
        $userId = $user['user_id'];
        $userFullName = $user['name'];

        $_SESSION['user_id'] = $userId;
        $_SESSION['name'] = $userFullName;

        addAlert('success', 'You Successfully Logged in');

        //Redirect to User Dashboard
        echo "<script type='text/javascript'>document.location='dashboard.php'</script>";
        exit(0);
    }
}

?>

<!-- 
    
Front End Magic Here

Guide:

Input field name for user email: `email`
Input field name for user password: `password`
Submit botton name for form: `login`

 -->

<!DOCTYPE html>
<html lang=en>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Volunteer NG | Login</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link href="./css/fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="./css/fontawesome/css/brands.css" rel="stylesheet" />
    <link href="./css/fontawesome/css/solid.css" rel="stylesheet" />
    <link rel="icon" href="images/favicon.ico" sizes="16x16" type="image/png" />

</head>

<body class="moving-volunteer">
    <div class="container">
        <form action="login.php" method="POST">
            <img src="images/volunteer.ng logo.svg" alt="">
            <br>
            <?php
            if(showAlert()) echo "<span style='color: green'> ".showAlert(). " </span>";
            ?>
            <h2>WELCOME BACK</h2>
            Email: <input type="text" type="email" name="email"><br>
            Password: <input type="password" name="password"><a>
                <!-- <a href="">Forgot password?</a><br> -->
                <br>
                <button type="submit" name="login">Login</button><br>
                <br>
                <p>Don't Have an account yet? <a href="signup.php">Sign Up</a></p>
        </form>
    </div>
    </div>

</html>