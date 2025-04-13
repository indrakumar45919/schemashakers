<?php
session_start();
error_reporting(0);
include("include/config.php");

if (isset($_POST['submit'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];

    $query = mysqli_query($con, "SELECT id FROM users WHERE fullName='$name' AND email='$email'");
    $row = mysqli_num_rows($query);

    if ($row > 0) {
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        header('location:reset-password.php');
    } else {
        echo "<script>alert('Invalid details. Please try with valid details');</script>";
        echo "<script>window.location.href ='forgot-password.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Password Recovery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .recovery-box {
            max-width: 450px;
            margin: 80px auto;
            padding: 30px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .form-title {
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        .copyright {
            text-align: center;
            margin-top: 30px;
            color: #888;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="recovery-box">
        <h4 class="form-title">Patient Password Recovery</h4>
        <p class="text-center">Please enter your registered full name and email to reset your password.</p>

        <form method="POST">
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="fullname" id="fullname" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Registered Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-primary">
                    Reset Password
                </button>
            </div>
            <div class="text-center mt-3">
                Already have an account? <a href="user-login.php">Login here</a>
            </div>
        </form>
    </div>

    
</div>

<script>
    document.querySelector(".current-year").textContent = new Date().getFullYear();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
