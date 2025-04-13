<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Doctor  | Dashboard</title>
        
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
        <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
        <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
        <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
        <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
        <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
        <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/plugins.css">
        <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />


    </head>
    <body>
        <div id="app">      
<?php include('include/sidebar.php');?>
            <div class="app-content">
                
                        <?php include('include/header.php');?>
                        
                <div class="main-content" >
                    <div class="wrap-content container" id="container">
                        <section id="page-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h1 class="mainTitle">Doctor | Dashboard</h1>
                                                                    </div>
                                <ol class="breadcrumb">
                                    <li>
                                        <span>User</span>
                                    </li>
                                    <li class="active">
                                        <span>Dashboard</span>
                                    </li>
                                </ol>
                            </div>
                        </section>
                        <div class="container-fluid container-fullw bg-white">
                            <div class="row" style="display: flex; flex-wrap: wrap; justify-content: space-around;">
                                <div class="col-sm-4" style="flex: 1; min-width: 250px; margin-bottom: 20px;">
                                    <div class="panel panel-white no-radius text-center" style="
                                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                                        border-radius: 10px;
                                        padding: 20px;
                                        box-shadow: 0 4px 20px rgba(52, 152, 219, 0.3),
                                                    0 0 30px rgba(52, 152, 219, 0.2),
                                                    0 0 50px rgba(52, 152, 219, 0.1);
                                        display: flex;
                                        flex-direction: column;
                                        justify-content: space-between;
                                        height: 280px;
                                        margin: 10px;
                                    ">
                                        <div class="panel-body">
                                            <span class="fa-stack fa-2x">  &#x1F464;  </span>
                                            <h2 class="StepTitle">My Profile</h2>
                                            
                                            <p class="links cl-effect-1">
                                                <a href="edit-profile.php" style="
                                                    display: inline-flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                    padding: 0.5rem 1rem;
                                                    border-radius: 0.375rem;
                                                    background-color: #3b82f6;
                                                    color: #fff;
                                                    font-size: 0.875rem;
                                                    font-weight: 500;
                                                    box-shadow: 0 0 10px rgba(59, 130, 246, 0.7);
                                                    transition: background-color 0.3s ease, box-shadow 0.3s ease;
                                                    overflow: hidden;
                                                ">
                                                    <span style="position: relative; z-index: 1;">Update Profile</span>
                                                    <span style="
                                                        position: absolute;
                                                        top: 0;
                                                        left: 0;
                                                        width: 100%;
                                                        height: 100%;
                                                        background-image: linear-gradient(
                                                            to right,
                                                            rgba(255, 255, 255, 0) 0%,
                                                            rgba(255, 255, 255, 0.3) 50%,
                                                            rgba(255, 255, 255, 0) 100%
                                                        );
                                                        transform: translateX(-100%);
                                                        transition: transform 0.3s ease;
                                                "></span>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4" style="flex: 1; min-width: 250px; margin-bottom: 20px;">
                                    <div class="panel panel-white no-radius text-center" style="
                                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                                        border-radius: 10px;
                                        padding: 20px;
                                        box-shadow: 0 4px 20px rgba(52, 152, 219, 0.3),
                                                    0 0 30px rgba(52, 152, 219, 0.2),
                                                    0 0 50px rgba(52, 152, 219, 0.1);
                                        display: flex;
                                        flex-direction: column;
                                        justify-content: space-between;
                                        height: 280px;
                                         margin: 10px;
                                    ">
                                        <div class="panel-body">
                                            <span class="fa-stack fa-2x">  &#x1F4C5; </span>
                                            <h2 class="StepTitle">My Appointments</h2>
                                        
                                            <p class="links cl-effect-1">
                                                <a  href="appointment-history.php" style="
                                                    display: inline-flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                    padding: 0.5rem 1rem;
                                                    border-radius: 0.375rem;
                                                    background-color: #3b82f6;
                                                    color: #fff;
                                                    font-size: 0.875rem;
                                                    font-weight: 500;
                                                    box-shadow: 0 0 10px rgba(59, 130, 246, 0.7);
                                                    transition: background-color 0.3s ease, box-shadow 0.3s ease;
                                                    overflow: hidden;
                                                ">
                                                    <span style="position: relative; z-index: 1;">View Appointment History</span>
                                                    <span style="
                                                        position: absolute;
                                                        top: 0;
                                                        left: 0;
                                                        width: 100%;
                                                        height: 100%;
                                                        background-image: linear-gradient(
                                                            to right,
                                                            rgba(255, 255, 255, 0) 0%,
                                                            rgba(255, 255, 255, 0.3) 50%,
                                                            rgba(255, 255, 255, 0) 100%
                                                        );
                                                        transform: translateX(-100%);
                                                        transition: transform 0.3s ease;
                                                    "></span>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
            
                    
                    
                        
                        
                    
                        </div>
                </div>
            </div>
            <?php include('include/footer.php');?>
            <?php include('include/setting.php');?>
            
            </div>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/modernizr/modernizr.js"></script>
        <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="vendor/switchery/switchery.min.js"></script>
        <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
        <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="vendor/autosize/autosize.min.js"></script>
        <script src="vendor/selectFx/classie.js"></script>
        <script src="vendor/selectFx/selectFx.js"></script>
        <script src="vendor/select2/select2.min.js"></script>
        <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/form-elements.js"></script>
        <script>
            jQuery(document).ready(function() {
                Main.init();
                FormElements.init();
            });
        </script>
        </body>
</html>
