<?php
include_once('hms/include/config.php');
if (isset($_POST['submit'])) {
    $name = $_POST['fullname'];
    $email = $_POST['emailid'];
    $mobileno = $_POST['mobileno'];
    $dscrption = $_POST['description'];
    $query = mysqli_query($con, "INSERT INTO tblcontactus(fullname,email,contactno,message) VALUES('$name','$email','$mobileno','$dscrption')");
    echo "<script>alert('Your information successfully submitted');</script>";
    echo "<script>window.location.href ='contact.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact | HMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts + Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
       body {
    margin: 0;
    font-family: 'Outfit', sans-serif;
    background-image: linear-gradient(to right top, 
        #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, 
        #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, 
        #46eefa, #5ffbf1);
    background-size: 400% 400%;
    animation: gradientBG 20s ease infinite;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}


@keyframes gradientBG {
    0% {background-position: 0% 50%;}
    50% {background-position: 100% 50%;}
    100% {background-position: 0% 50%;}
}


        .contact-wrapper {
            max-width: 1000px;
            margin: 60px auto;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            padding: 40px;
        }

        h2 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 30px;
            color: #fff;
        }

        label {
            color: #fff;
            font-weight: 500;
        }

        .form-control {
            border-radius: 12px;
        }

        .contact-info {
            color: #fff;
        }

        .btn-primary {
            background-color: #6C63FF;
            border: none;
            padding: 10px 30px;
            font-weight: 500;
            border-radius: 12px;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #5a53d6;
        }

        .footer {
            background: rgba(0,0,0,0.2);
            text-align: center;
            color: #fff;
            padding: 20px 0;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .contact-wrapper {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="contact-wrapper container">
        <h2>Contact Us</h2>
        <div class="row g-4">
            <!-- Left Contact Info -->
            <div class="col-md-5 contact-info">
                <h5>Hospital Address</h5>
                <p>IIITDM Kancheepuram</p>
                <p>Melakottaiyur, Chennai - 600127</p>
                <p><strong>Phone:</strong> +91 44 2747 6300</p>
                <p><strong>Email:</strong> office@iiitdm.ac.in</p>
            </div>

            <!-- Right Form -->
            <div class="col-md-7">
                <form method="post">
                    <div class="mb-3">
                        <label>Your Name</label>
                        <input type="text" name="fullname" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="emailid" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Mobile Number</label>
                        <input type="text" name="mobileno" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" rows="4" class="form-control" required></textarea>
                    </div>
                    <div class="text-end">
                        <button type="submit" name="submit" class="btn btn-primary">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; <?php echo date('Y'); ?> <strong>The Boys</strong> | Hospital Management System
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
