<?php
session_start();
error_reporting(0);
include("include/config.php");

// Handle form submission
if (isset($_POST['submit'])) {
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];
    $query = mysqli_query($con, "SELECT id FROM doctors WHERE contactno='$contactno' AND docEmail='$email'");
    $row = mysqli_num_rows($query);
    
    if ($row > 0) {
        $_SESSION['cnumber'] = $contactno;
        $_SESSION['email'] = $email;
        header('location:reset-password.php');
    } else {
        $_SESSION['error'] = "Invalid details. Please try again.";
        header('location:forgot-password.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Recovery | HMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .login-container {
            max-width: 420px;
            margin: 80px auto;
            background: #fff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .login-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: 500;
        }
        .new-account {
            text-align: center;
            margin-top: 20px;
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
    <div class="login-container">
        <h4 class="login-title">Doctor Password Recovery</h4>

        <?php if (!empty($_SESSION['error'])): ?>
            <div class="alert alert-danger text-center">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label for="contactno" class="form-label">Registered Contact Number</label>
                <input type="text" class="form-control" name="contactno" id="contactno" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Registered Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-primary">Reset</button>
            </div>
        </form>

        <div class="new-account">
            Already have an account? <a href="index.php">Log in</a>
        </div>
    </div>

    <div class="copyright">
        &copy; <span class="current-year"></span> <strong>The Boys</strong>. All rights reserved.
    </div>
</div>

<script>
    document.querySelector(".current-year").textContent = new Date().getFullYear();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
