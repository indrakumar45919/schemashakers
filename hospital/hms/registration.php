<?php
include_once('include/config.php');
if(isset($_POST['submit'])) {
    $fname = $_POST['full_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $query = mysqli_query($con,"INSERT INTO users(fullname,address,city,gender,email,password) 
                VALUES('$fname','$address','$city','$gender','$email','$password')");
    if($query) {
        echo "<script>alert('Successfully Registered. You can login now');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fc;
        }
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
    </style>
    <script>
        function valid() {
            if (document.registration.password.value !== document.registration.password_again.value) {
                alert("Password and Confirm Password do not match!");
                document.registration.password_again.focus();
                return false;
            }
            return true;
        }

        function userAvailability() {
            const email = document.getElementById("email").value;
            fetch("check_availability.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "email=" + encodeURIComponent(email)
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById("user-availability-status1").innerHTML = data;
            });
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h3 class="text-center mb-4">Patient Registration</h3>
            <form name="registration" method="POST" onsubmit="return valid();">
                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="full_name" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" name="city" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" onblur="userAvailability()" required>
                    <div id="user-availability-status1" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="password_again" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_again" required>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" value="agree" id="agree" checked readonly>
                    <label class="form-check-label" for="agree">I agree</label>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
                <p class="mt-3 text-center">Already have an account? <a href="user-login.php">Login here</a></p>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
