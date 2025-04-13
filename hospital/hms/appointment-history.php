<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_GET['cancel'])) {
    mysqli_query($con, "update appointment set userStatus='0' where id = '" . $_GET['id'] . "'");
    $_SESSION['msg'] = "Your appointment canceled !!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>User | Appointment History</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="Hospital Management System (HMS)" name="description" />
    <meta content="Manoj Kumar" name="author" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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
    <style>
        body {
            font-family: 'Inter', sans-serif;
			background: #667db6;  /* fallback for old browsers */
background: -webkit-linear-gradient(to bottom, #667db6, #0082c8, #0082c8, #667db6);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #667db6, #0082c8, #0082c8, #667db6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            background-size: cover;
            background-attachment: fixed;
        }
        .table-responsive {
            overflow-x: auto;
            margin-bottom: 1rem;
            width: 100%;
        }
        .table-responsive > .table-bordered {
            border: 0;
        }
        #page-title h1 {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        #page-title ol.breadcrumb {
            background-color: #e9ecef;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            font-size: 0.875rem;
            margin-bottom: 0;
        }
        #page-title ol.breadcrumb li a {
            color: #3498db;
            text-decoration: none;
        }
        #page-title ol.breadcrumb li a:hover {
            color: #217dbb;
        }
        .container-fluid {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        .btn-transparent {
            background-color: transparent;
            border: none;
            padding: 0.25rem 0.5rem;
        }
        .btn-transparent:hover {
            background-color: rgba(0, 0, 0, 0.05);
            border-radius: 0.25rem;
        }
        .btn-xs {
            padding: 0.125rem 0.25rem;
            font-size: 0.75rem;
            border-radius: 0.2rem;
        }
        .bg-white{
            background-color: rgba(255, 255, 255, 0.8); /* Add some transparency to the white container */
            border-radius: 0.5rem; /* Add some rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow for depth */
        }
        .table-responsive {
            background-color: rgba(255, 255, 255, 0.5);
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .table-responsive > .table-bordered {
            border: 0;
        }
        .table thead th {
             background-color: rgba(255, 255, 255, 0.7);
             border-bottom: 1px solid rgba(255, 255, 255, 0.3);
             color: #2c3e50;
        }
        .table tbody tr {
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }
        .table tbody tr:last-child{
             border-bottom: none;
        }
        .table td, .table th{
            color: #2c3e50;
        }
        .container-fullw {
            background-color: rgba(255, 255, 255, 0.5); /* Increased transparency here */
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 1rem;
        }

    </style>
</head>
<body>
    <div id="app">
        <?php include('include/sidebar.php'); ?>
    
            <?php include('include/header.php'); ?>
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8" >
                                <h1 class="mainTitle" style="color: #fff; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">📄 Appointment History</h1>
                            </div>
                            
                        </div>
                    </section>
                    
                        <div class="row">
                            <div class="col-md-12">
                                <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
                                    <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="sample-table-1">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="center">#</th>
                                                <th class="hidden-xs">Doctor Name</th>
                                                <th>Specialization</th>
                                                <th>Consultancy Fee</th>
                                                <th>Appointment Date / Time</th>
                                                <th>Appointment Creation Date</th>
                                                <th>Current Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($con, "select doctors.doctorName as docname,appointment.* from appointment join doctors on doctors.id=appointment.doctorId where appointment.userId='" . $_SESSION['id'] . "'");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($sql)) {
                                            ?>
                                                <tr>
                                                    <td class="center"><?php echo $cnt; ?>.</td>
                                                    <td class="hidden-xs"><?php echo $row['docname']; ?></td>
                                                    <td><?php echo $row['doctorSpecialization']; ?></td>
                                                    <td><?php echo $row['consultancyFees']; ?></td>
                                                    <td><?php echo $row['appointmentDate']; ?> / <?php echo  $row['appointmentTime']; ?>
                                                    </td>
                                                    <td><?php echo $row['postingDate']; ?></td>
                                                    <td>
                                                        <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                                                            echo "<span class='badge badge-success'>Active</span>";
                                                        }
                                                        if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
                                                            echo "<span class='badge badge-warning'>Cancel by You</span>";
                                                        }
                                                        if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
                                                            echo "<span class='badge badge-danger'>Cancel by Doctor</span>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>
                                                            <a href="appointment-history.php?id=<?php echo $row['id'] ?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')" class="btn btn-transparent btn-xs tooltips text-danger" title="Cancel Appointment"><i class="fa fa-times"></i> Cancel</a>
                                                        <?php } else {
                                                            echo "<span class='text-muted'>Canceled</span>";
                                                        } ?>
                                                    </td>
                                                </tr>
                                            <?php
                                                $cnt = $cnt + 1;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
        <?php include('include/footer.php'); ?>
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
