<?php
session_start();
error_reporting(0);
include("include/config.php");

if (isset($_POST['submit'])) {
    $ret = mysqli_query($con, "SELECT * FROM users WHERE email='" . $_POST['username'] . "' and password='" . md5($_POST['password']) . "'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {
        $extra = "dashboard.php";
        $_SESSION['login'] = $_POST['username'];
        $_SESSION['id'] = $num['id'];
        $host = $_SERVER['HTTP_HOST'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;
        mysqli_query($con, "insert into userlog(uid,username,userip,status) values('" . $_SESSION['id'] . "','" . $_SESSION['login'] . "','$uip','$status')");
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    } else {
        $_SESSION['login'] = $_POST['username'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 0;
        mysqli_query($con, "insert into userlog(username,userip,status) values('" . $_SESSION['login'] . "','$uip','$status')");
        $_SESSION['errmsg'] = "Invalid username or password";
        $extra = "user-login.php";
        $host  = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login | HMS</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #f9e9f3, #ffe3ec);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: white;
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
        }

        .login-container h2 {
            color: #e91e63;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .form-control:focus {
            border-color: #e91e63;
            box-shadow: 0 0 0 0.2rem rgba(233, 30, 99, 0.25);
        }

        .login-btn {
            background-color: #e91e63;
            border: none;
            font-weight: 600;
        }

        .login-btn:hover {
            background-color: #c2185b;
        }

        .text-link {
            color: #e91e63;
            text-decoration: none;
        }

        .text-link:hover {
            text-decoration: underline;
            color: #ad1457;
        }

        .error-msg {
            color: #dc143c;
            background-color: #fdecea;
            padding: 0.8rem;
            border-radius: 0.5rem;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2 class="text-center">Patient Login</h2>

        <?php if ($_SESSION['errmsg']) { ?>
            <div class="error-msg text-center">
                <?php echo $_SESSION['errmsg'];
                $_SESSION['errmsg'] = ""; ?>
            </div>
        <?php } ?>

        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Email Address</label>
                <input type="text" name="username" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                <div class="text-end mt-1">
                    <a href="forgot-password.php" class="text-link">Forgot Password?</a>
                </div>
            </div>

            <button type="submit" name="submit" class="btn login-btn w-100">Login</button>

            <div class="text-center mt-4">
                Don't have an account?
                <a href="registration.php" class="text-link">Register</a>
            </div>
        </form>

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
