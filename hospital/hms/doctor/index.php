<?php
session_start();
include("include/config.php");
error_reporting(0);

if (isset($_POST['submit'])) {
    $ret = mysqli_query($con, "SELECT * FROM doctors WHERE docEmail='" . $_POST['username'] . "' and password='" . md5($_POST['password']) . "'");
    $num = mysqli_fetch_array($ret);
    
    if ($num > 0) {
        $_SESSION['dlogin'] = $_POST['username'];
        $_SESSION['id'] = $num['id'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;
        mysqli_query($con, "INSERT INTO doctorslog(uid, username, userip, status) VALUES('" . $_SESSION['id'] . "','" . $_SESSION['dlogin'] . "','$uip','$status')");
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['dlogin'] = $_POST['username'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 0;
        mysqli_query($con, "INSERT INTO doctorslog(username, userip, status) VALUES('" . $_SESSION['dlogin'] . "','$uip','$status')");
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
    <title>Doctor Login | HMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f6f9;
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
        <h4 class="login-title">Doctor Login</h4>

        <?php if (!empty($_SESSION['errmsg'])): ?>
            <div class="alert alert-danger text-center">
                <?php echo $_SESSION['errmsg']; unset($_SESSION['errmsg']); ?>
            </div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Email/Username</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label d-flex justify-content-between">
                    Password
                    <a href="forgot-password.php" style="font-size: 0.875em;">Forgot Password?</a>
                </label>
                <input type="password" class="form-control" name="password" id="password" required>
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
