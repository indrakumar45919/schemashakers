<?php
session_start();
include("include/config.php");

if (isset($_POST['change'])) {
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $newpassword = md5($_POST['password']);

    $query = mysqli_query($con, "UPDATE users SET password='$newpassword' WHERE fullName='$name' AND email='$email'");
    if ($query) {
        echo "<script>alert('Password successfully updated.');</script>";
        echo "<script>window.location.href='user-login.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password | HMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .reset-box {
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
    <script>
        function validatePasswords() {
            const pass = document.getElementById("password").value;
            const confirm = document.getElementById("password_again").value;
            if (pass !== confirm) {
                alert("Passwords do not match!");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>

<div class="container">
    <div class="reset-box">
        <h4 class="form-title">Patient Reset Password</h4>
        <p class="text-center">Please set your new password.</p>

        <form method="POST" onsubmit="return validatePasswords();">
            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="mb-3">
                <label for="password_again" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_again" id="password_again" required>
            </div>
            <div class="d-grid">
                <button type="submit" name="change" class="btn btn-primary">Change Password</button>
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
