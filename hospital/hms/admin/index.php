<?php
session_start();
error_reporting(0);
include("include/config.php");

if (isset($_POST['submit'])) {
    $ret = mysqli_query($con, "SELECT * FROM admin WHERE username='" . $_POST['username'] . "' AND password='" . $_POST['password'] . "'");
    $num = mysqli_fetch_array($ret);
    
    if ($num > 0) {
        $_SESSION['login'] = $_POST['username'];
        $_SESSION['id'] = $num['id'];
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['errmsg'] = "Invalid username or password";
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login | HMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f7fa;
        }
        .login-box {
            max-width: 400px;
            margin: 80px auto;
            background: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }
        .login-title {
            font-weight: bold;
            text-align: center;
            margin-bottom: 25px;
        }
        .form-label {
            font-weight: 500;
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
    <div class="login-box">
        <h4 class="login-title">Admin Login</h4>

        <?php if (!empty($_SESSION['errmsg'])): ?>
            <div class="alert alert-danger text-center">
                <?php echo $_SESSION['errmsg']; unset($_SESSION['errmsg']); ?>
            </div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
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
