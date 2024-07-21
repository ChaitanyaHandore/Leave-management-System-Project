<?php
session_start();
include('includes/config.php');
if(isset($_POST['signin']))
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);

	$sql ="SELECT * FROM tblemployees where EmailId ='$username' AND Password ='$password'";
	$query= mysqli_query($conn, $sql);
	$count = mysqli_num_rows($query);
	if($count > 0)
	{
		while ($row = mysqli_fetch_assoc($query)) {
		    if ($row['role'] == 'Admin') {
		    	$_SESSION['alogin']=$row['emp_id'];
		    	$_SESSION['arole']=$row['Department'];
			 	echo "<script type='text/javascript'> document.location = 'admin/admin_dashboard.php'; </script>";
		    }
		    elseif ($row['role'] == 'Staff') {
		    	$_SESSION['alogin']=$row['emp_id'];
		    	$_SESSION['arole']=$row['Department'];
			 	echo "<script type='text/javascript'> document.location = 'staff/index.php'; </script>";
		    }
		    else {
		    	$_SESSION['alogin']=$row['emp_id'];
		    	$_SESSION['arole']=$row['Department'];
			 	echo "<script type='text/javascript'> document.location = 'heads/index.php'; </script>";
		    }
		}

	} 
	else{
	  
	  echo "<script>alert('Invalid Details');</script>";

	}

}
// $_SESSION['alogin']=$_POST['username'];
// 	echo "<script type='text/javascript'> document.location = 'changepassword.php'; </script>";
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Leave Manager</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/Apple.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/icon32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/icon16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<img src="vendors/images/desktop.png" alt=" Image not available">
					<h5>K.K.Wagh College(LEAVE MANAGEMENT SYSTEM)  </h5> </a>
				</a>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Welcome To Leave Portal</h2>
						</div>
						<form name="signin" method="post">
						
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Email ID" name="username" id="username">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy fa fa-envelope-o" aria-hidden="true"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="**********"name="password" id="password">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
									   <input class="btn btn-primary btn-lg btn-block" name="signin" id="signin" type="submit" value="Sign In">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>