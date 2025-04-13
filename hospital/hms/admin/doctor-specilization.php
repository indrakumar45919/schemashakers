<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
$sql=mysqli_query($con,"insert into doctorSpecilization(specilization) values('".$_POST['doctorspecilization']."')");
$_SESSION['msg']="Doctor Specialization added successfully !!";
}

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from doctorSpecilization where id = '".$_GET['id']."'");
                  $_SESSION['msg']="data deleted !!";
		  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Doctor Specialization</title>
	
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
					
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin | Add Doctor Specialization</h1>
																	</div>
								
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<!-- start: Redesigned Spacious & Readable UI -->
<div class="container py-4">
	<div class="row justify-content-center">
		<div class="col-lg-10">

			<!-- Success Message -->
			<?php if ($_SESSION['msg']) { ?>
			<div class="alert alert-success alert-dismissible fade show fs-5" role="alert">
				<strong>✅ Success:</strong> <?php echo htmlentities($_SESSION['msg']); ?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php echo htmlentities($_SESSION['msg'] = ""); } ?>

			<!-- Add Doctor Specialization -->
			<div class="card shadow rounded-4 border-0 mb-4">
			<div style="margin: 5px 0; padding: 5px;">
  <!-- Put your form/table/buttons inside this -->
</div>
<hr style="border: none; /* Remove default border */
           height: 1px; /* Set line thickness */
           background-color: black; /* Set line color */
           margin: 20px 0; /* Add vertical margin for spacing */
           width: 100%; /* Ensure full width */
           opacity: 0.8;  /* make it little transparent */
          ">
				<div class="card-header bg-gradient-primary text-white rounded-top-4">
					<h4 class="mb-0 fw-bold">➕ Add Doctor Specialization</h4>
				</div>
				<div style="margin: 5px 0; padding: 5px;">
  <!-- Put your form/table/buttons inside this -->
</div>

				<div class="card-body fs-5">
					<form name="dcotorspcl" method="post">
						<div class="mb-4">
							<label for="doctorspecilization" class="form-label">Doctor Specialization</label>
							<div style="margin: 5px 0; padding: 5px;">
  <!-- Put your form/table/buttons inside this -->
</div>
							<input type="text" name="doctorspecilization" class="form-control form-control-lg rounded-3" placeholder="e.g. Cardiologist" required>
						</div>
						<div style="margin: 5px 0; padding: 5px;">
  <!-- Put your form/table/buttons inside this -->
</div>
						<button type="submit" name="submit" class="btn btn-success btn-lg px-5 rounded-pill">Submit</button>
						<div style="margin: 5px 0; padding: 5px;">
  <!-- Put your form/table/buttons inside this -->
</div>
					</form>
				</div>
			</div>

			<!-- Manage Doctor Specializations Table -->
			<div class="card shadow rounded-4 border-0">
				<div class="card-header bg-gradient-dark text-white rounded-top-4">
					<h4 class="mb-0 fw-bold">📋 Manage Doctor Specializations</h4>
					<div style="margin: 5px 0; padding: 5px;">
  <!-- Put your form/table/buttons inside this -->
</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover align-middle fs-5">
							<thead class="table-dark text-center">
								<tr>
									<th>#</th>
									<th>Specialization</th>
									<th>Created On</th>
									<th>Last Updated</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = mysqli_query($con, "SELECT * FROM doctorSpecilization");
								$cnt = 1;
								while ($row = mysqli_fetch_array($sql)) {
								?>
								<tr>
									<td class="text-center fw-bold"><?php echo $cnt; ?>.</td>
									<td><?php echo htmlentities($row['specilization']); ?></td>
									<td><?php echo htmlentities($row['creationDate']); ?></td>
									<td><?php echo htmlentities($row['updationDate']); ?></td>
									<td class="text-center">
									<a href="edit-doctor-specialization.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm rounded-pill" style="background: linear-gradient(135deg, #82b1ff, #b19cd9); /* Brighter gradient */
            border: none; /* Remove default border */
            color: black; /* Default text color */
            padding: 0.75rem 1.5rem;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15); /* Softer shadow */
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            font-weight: 500;
            border-radius: 1rem; /* More rounded corners */
            text-decoration: none; /* Remove underline */
            background-color: #f0f4c3; /* Brighter pre-hover */
            ">
        <span style="margin-right: 0.5rem;">✏️</span> Edit
    </a>
    <a href="doctor-specilization.php?id=<?php echo $row['id'] ?>&del=delete"
       onClick="return confirm('Are you sure you want to delete?')"
       class="btn btn-danger btn-sm rounded-pill" style="background: linear-gradient(135deg, #ff8a65, #f44336); /* Brighter gradient */
            border: none; /* Remove default border */
            color: black; /* Default text color */
            padding: 0.75rem 1.5rem;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15); /* Softer shadow */
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            font-weight: 500;
            border-radius: 1rem; /* More rounded corners */
            text-decoration: none; /* Remove underline */
            background-color: #ffe082; /* Brighter pre-hover */
            ">
        <span style="margin-right: 0.5rem;">🗑️</span> Delete
    </a>


</td>

								</tr>
								<?php $cnt++; } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- end: Redesigned Spacious & Readable UI -->





						<!-- end: BASIC EXAMPLE -->
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
