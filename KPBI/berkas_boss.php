<?php

	error_reporting(0);
    session_start();
    if (!isset($_SESSION['user'])){
    header("Location:./login.php");
    }
    else{
        if ($_SESSION['user']=='dnc') {
        	$greet = "Selamat Datang ".$_SESSION['user']."!";
        }
        else{
        	header("Location:./berkas_boss.php");
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

	<title>Berangkas</title>

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

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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
					<li><a href="#berkas">Berkas</a></li>
					<li><a href='logout.php'>Logout</a></li>
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->



<div class="container">
	<div class="row">

		<section class="content" style="margin-top: 20px;">
			<h1 style="text-align: center;" class="black-text">List Berkas</h1>
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="pull-right">
							
						</div>
						<div class="pull-left">
							
						</div>

						<div class="table-container" style="margin-top: 50px">
							<table class="table table-filter" style="margin-top: 10px; margin-bottom: 10px;">
								<tbody>
							<?php
							include('connect.php');
							$sql = mysqli_query($con,"SELECT * FROM berkas ");
							if(mysqli_num_rows($sql) > 0){
								$no = 1;
								while($data = mysqli_fetch_assoc($sql)){
									echo '
									<tr data-status="'.$data['Status'].'">
									
										<td>
											<div class="media">
												<div class="media-body">';
									if ($data['Status']!='Menunggu') {
										echo '<span class="pull-right pagado">'.$data['Status'].'</span><h4 class="title">
													'.$data['nama'].'
													</h4>
													<p class="summary">'.$data['satker'].'</p>
													<p class="summary">'.$data['tanggal'].'</p>
													<a href="'.$data['location'].'">Download </a><a href="delete.php?id='.$data['id'].'">Hapus</a>
												</div>
											</div>
										</td>
									</tr>';
									}
									else{
										echo '<span class="pull-right pagado"><a href="setuju.php?id='.$data['id'].'"><button type="button" class="btn btn-success btn-filter" data-target="Setuju">Setuju</button></a><a href="tolak.php?id='.$data['id'].'"><button type="button" class="btn btn-danger btn-filter" data-target="Tidak Setuju">Tolak</button></a></span><h4 class="title">
													'.$data['nama'].'
													</h4>
													<p class="summary">'.$data['satker'].'</p>
													<p class="summary">'.$data['tanggal'].'</p>
													<a href="'.$data['location'].'">Download</a>
												</div>
											</div>
										</td>
									</tr>';
									}	
									$no++;
								}
							}else{
								echo '
								<tr bgcolor="#fff">
									<td align="center" colspan="4" align="center">Tidak ada data!</td>
								</tr>
								';
							}
							?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</section>
		
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
