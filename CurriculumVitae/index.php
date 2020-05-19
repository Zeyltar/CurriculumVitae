<?php include('inc/header.inc.php');?>

<body id="page-top">
	
	<?php 
		include('inc/data.inc.php');
		include('inc/navbar.inc.php');
	?>

	<div class="container-fluid p-0">
		<section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
			<div class="w-100">
				<h1 class="mb-0"><?php echo $person->firstname ;?>
					<span class="text-primary"><?php echo $person->lastname ;?></span>
				</h1>
				<div class="subheading mb-5"><?php echo str_replace(", ", " · ", $person->address) . " · " . "(+33)" . preg_replace("/^1?(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})$/", " $1$2 $3 $4 $5", $person->telephone) . " · ";?>
					<a href="mailto:<?php echo $person->email ;?>"><?php echo $person->email ;?></a>
				</div>
				<p class="lead mb-5"><?php echo $person->about_text ;?></p>
				<div class="social-icons">
					<a href="#">
					<i class="fab fa-linkedin-in"></i>
					</a>
					<a href="#">
						<i class="fab fa-github"></i>
					</a>
					<a href="#">
						<i class="fab fa-twitter"></i>
					</a>
					<a href="#">
						<i class="fab fa-facebook-f"></i>
					</a>
				</div>
			</div>
		</section>
	</div>
	<?php include('inc/experience.inc.php');?>
	<?php include('inc/cursus.inc.php');?>	
	
	<?php include('inc/footer.inc.php');?>