<?php

	error_reporting(0);
    session_start();
    if (!isset($_SESSION['user'])){
    header("Location:./login.php");
    }
    else{
        if ($_SESSION['user']=='dnc') {
        	header("Location:./index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Login</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />



	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Header -->

		<!-- Background Image -->

		<!-- /Background Image -->

		<!-- Nav -->
		<nav id="nav" class="navbar nav-transparent">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a href="index.html">
							<img class="logo" src="img/bi.png" alt="logo">
							<img class="logo-alt" src="img/bi.png" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="index.php">Home</a></li>
					<li><a href="info_berkas.php">Berkas</a></li>
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->

		<!-- home wrapper -->
		<div class="home-wrapper">
			<div class="container" style="margin-bottom: 20px;">
				<div class="row">

					<!-- home content -->
					<h2 class="black-text" style="margin: 0 auto; margin-top: 50px; margin-bottom: 20px; text-align: center;" >Upload Berkas</h2>
					<div class="wrap-contact100" style="margin: 0 auto;">
					<?php
						include('connect.php');
						if (isset($_POST['upload'])){
							$allowed_ext	= array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip','vsd');

							$file_name		= $_FILES['file']['name'];
							$file_ext		= pathinfo ($file_name, PATHINFO_EXTENSION);
							$file_size		= $_FILES['file']['size'];
							$file_tmp		= $_FILES['file']['tmp_name'];
							$nama			= $_POST['nama'];
							$satker			= $_POST['satker'];
							$tanggal			= date("Y-m-d");
							if(in_array($file_ext, $allowed_ext) === true){
								if($file_size < 2044070){
									$open = fopen ($_FILES['file']['tmp_name'], 'r');
			                        $read = fread ($open, $_FILES['file']['size']);
			                        $data = addslashes ($read);
			                        $location ='files/'.$nama.'.'.$file_ext;
			                        move_uploaded_file($file_tmp, $location);
			                        $in = mysqli_query($con, "INSERT INTO berkas VALUES(NULL,'$tanggal', '$nama','$satker', '$file_ext', '$file_size', '$location', default)");
									if($in){
										echo '<div class="ok">SUCCESS: File berhasil di Upload!</div>';
									}else{
										echo '<div class="error">ERROR: Gagal upload file!</div>';
									}
								}else{
									echo '<div class="error">ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>';
								}
							}else{
								echo '<div class="error">ERROR: Ekstensi file tidak di izinkan!</div>';
							}
						}
						?>

						<form class="contact100-form validate-form" action="" method="post" enctype="multipart/form-data">
							<div class="wrap-input100" data-validate="Name is required">
								<h4>Proses Enterprise</h4>
								<input class="input100" type="text" name="nama" required />
							</div>

							<div class="wrap-input100" data-validate="Name is required">
								<h4>Satuan Kerja Terkait</h4>
								<input class="input100" type="text" name="satker" required />
							</div>

						
							
							<div class="wrap-input100">
								<h4>Pilih File</h4>
								 <input  type="file" name="file" required />
							</div>

							<div class="container-contact100-form-btn">
								<div class="wrap-contact100-form-btn">
									<div class="contact100-form-bgbtn"></div>
									<button class="contact100-form-btn" name="upload">
										Submit
									</button>
								</div>
							</div>
						</form>
					</div>
					<!-- /home content -->
					
				</div>
			</div>
		</div>



	<!-- /Header -->
	<!-- Contact -->
	<div id="contact" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section-header -->
				<div class="section-header text-center">
					<h2 class="title">Get in touch</h2>
				</div>
				<!-- /Section-header -->

					<div class="footer-logo" >
						<a href="index.html"><img src="img/bi.png" alt="logo"></a>
					</div>
				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-phone"></i>
						<h3>Phone</h3>
						<p>131 (pulsa lokal), 1500131 (dari luar negeri)</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-envelope"></i>
						<h3>Email</h3>
						<p>bicara@bi.go.id</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-map-marker"></i>
						<h3>Address</h3>
						<p>Jl MH Thamrin No 2, Jakarta 10350</p>
					</div>
				</div>
				<!-- /contact -->


			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Contact -->


	<!-- Footer -->
	<footer id="footer" class="sm-padding bg-dark">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<div class="col-md-12">

					<!-- footer logo -->
					
					<!-- /footer logo -->

					<!-- footer follow -->
					<ul class="footer-follow">
						<li><a href="https://www.facebook.com/BankIndonesiaOfficial/"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://twitter.com/bank_indonesia"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://www.instagram.com/bank_indonesia/"><i class="fa fa-instagram"></i></a></li>
						<li><a href="https://www.youtube.com/user/BankIndonesiaChannel"><i class="fa fa-youtube"></i></a></li>
					</ul>
					<!-- /footer follow -->


				</div>

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</footer>
	<!-- /Footer -->

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Preloader -->

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

</body>

</html>
