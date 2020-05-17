<!DOCTYPE html>
<html>
<head>
 <title>聯絡我們 - DA-DING</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="assets/css/main.css" />

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
	integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
	crossorigin="anonymous">
<script
	src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
	integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
	crossorigin="anonymous"></script>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
</head>

<body class="no-sidebar is-preload">
	<div id="page-wrapper">
		<?php include_once 'menu.php';?>
		<section id="main">
			<div class="container">
				<div id="content">
					<section id="footer">
						<div class="container">
							<br>
							<header>
								<h2>Questions or comments? <strong>Get in touch:</strong></h2><br>
							</header>
							<div class="row">
								<div class="col-6 col-12-medium">
									<section>
										<form method="post" action="#">
											<div class="row gtr-50">
												<div class="col-6 col-12-small">
													<input name="name" placeholder="Name" type="text" required/>
												</div>
												<div class="col-6 col-12-small">
													<input name="email" placeholder="Email" type="text" required/>
												</div>
												<div class="col-12">
													<textarea name="message" placeholder="Message"></textarea>
												</div>
												<div class="col-12" align="center">
													<a href="#" class="form-button-submit button icon solid fa-envelope">Send Message</a>
												</div>
											</div>
										</form>
									</section>
								</div>
								<div class="col-6 col-12-medium">
									<section>
										<p>感謝您訪問 <strong>DA-DING </strong>網站。<br>若您有任何建議或問題，請填寫以下表格，我們會儘快與您聯繫，謝謝。</p>
										<div class="row">
											<div class="col-6 col-12-small">
												<ul class="icons">
													<li class="icon solid fa-home">
														1234 Somewhere Road<br />
														Nashville, TN 00000<br />
														USA
													</li>
													<li class="icon solid fa-phone">
														(000) 000-0000
													</li>
													<li class="icon solid fa-envelope">
														<a href="#">info@untitled.tld</a>
													</li>
												</ul>
											</div>
											<div class="col-6 col-12-small">
												<ul class="icons">
													<li class="icon brands fa-twitter">
														<a href="#">@untitled</a>
													</li>
													<li class="icon brands fa-instagram">
														<a href="#">instagram.com/untitled</a>
													</li>
													<li class="icon brands fa-dribbble">
														<a href="#">dribbble.com/untitled</a>
													</li>
													<li class="icon brands fa-facebook-f">
														<a href="#">facebook.com/untitled</a>
													</li>
												</ul>
											</div>
										</div>
									</section>
								</div>
							</div>
							<br>
						</div>						
					</section>
				</div>
			</div>
		</section>
		<?php include_once('footer.php');?>
	</div>
</body>
</html>