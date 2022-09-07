<?php
?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<?php include 'header.php'; ?>
	<body class="no-trans">
		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>
		<header class="header fixed clearfix navbar navbar-fixed-top">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
					<div class="header-left clearfix">
							<div class="logo smooth-scroll">
								<a href="#banner"><img id="logo" src="images/logo.PNG" alt="LGT"></a></div>
							<div class="site-name-and-slogan smooth-scroll">
								<div class="site-name"><a href="#banner"><i style="font-family:Times New Roman,Times,serif">LGT</i></a></div>
								<div class="site-slogan">ላይ ጋይንት ጨርቃጨርቅ ፋብሪካ</div>
							</div></div></div>
					<div class="col-md-8">
						<div class="header-right clearfix">
							<div class="main-navigation animated">
								<nav class="navbar navbar-default" role="navigation">
									<div class="container-fluid">
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
												<span class="sr-only">Toggle navigation</span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											</button>
										</div>
										<div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
											<ul class="nav navbar-nav navbar-right">
												<li><a href="index.php">Home</a></li>
												<li><a href="about.php">About</a></li>
											   <li><a href="products.php">Products</a></li>
							      <li class="active"><a href="gallery.php">Gallary</a></li>
												<li><a href="clients.php">Clients</a></li>
												<li><a href="contact.php">Contact</a></li>
												<li><a href="login.php">Log In</a></li>
	</ul></div></div></nav></div></div></div></div></div></header>
		<div id="banner" class="banner">
			<div class="banner-image"></div>
			<div class="banner-caption">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 object-non-visible" data-animation-effect="fadeIn">
							<p class="lead text-center"> </p>
						</div></div></div></div></div>
						<div class="section">
			<div class="container">
				<h1 class="text-center title" id="portfolio">Gallery</h1>
				<div class="separator"></div>
				<p class="lead text-center">Images from our work place and our products</p>
				<div class="row object-non-visible" data-animation-effect="fadeIn">
					<div class="col-md-12">
						<div class="filters text-center">
							<ul class="nav nav-pills">
								<li class="active"><a href="#" data-filter="*">All</a></li>
								<li><a href="#" data-filter=".web-design">Work Place</a></li>
								<li><a href="#" data-filter=".app-development">Process</a></li>
								<li><a href="#" data-filter=".site-building">Products</a></li>
							</ul>
						</div>
						<div class="isotope-container row grid-space-20">
							<div class="col-sm-6 col-md-3 isotope-item web-design">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/wplace/wplc1a.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-1">
											<i class="fa fa-search-plus"></i>
											<span>Work Place</span>
										</a></div>
								<a class="btn btn-default btn-block" data-toggle="modal"
									data-target="#project-3">Belopener</a>
										</div>
							<div class="modal fade" id="project-1" tabindex="-1" role="dialog" aria-labelledby="project-1-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-6">
														<img src="images/wplace/wplc1.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div>
							<div class="col-sm-6 col-md-3 isotope-item app-development">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/process/pr1s.jpg">
										<a class="overlay" data-toggle="modal" data-target="#project-2">
											<i class="fa fa-search-plus"></i>
											<span>Process</span>
										</a>
									</div><a class="btn btn-default btn-block" data-toggle="modal"
									data-target="#project-3">Row Cotton</a></div>
								<div class="modal fade" id="project-2" tabindex="-1" role="dialog" aria-labelledby="project-2-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
												<h4 class="modal-title" id="project-2-label">Row Cotton</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-6">
														<img src="images/process/pr1.jpg" alt="">
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div>
							<div class="col-sm-6 col-md-3 isotope-item web-design">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/wplace/wplc4a.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-3">
											<i class="fa fa-search-plus"></i>
											<span>Work Place</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-3">Calder</a>
								</div>
								<div class="modal fade" id="project-3" tabindex="-1" role="dialog" aria-labelledby="project-3-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-6">
														<img src="images/wplace/wplc4.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
										     </div></div></div></div></div>
							<div class="col-sm-6 col-md-3 isotope-item site-building">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/product/thread2a.jpg">
										<a class="overlay" data-toggle="modal" data-target="#project-4">
											<i class="fa fa-search-plus"></i>
											<span>Products</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-4">Yarn</a>
								</div>
								<div class="modal fade" id="project-4" tabindex="-1" role="dialog" aria-labelledby="project-4-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-6">
														<img src="images/product/prd4.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div>
							<div class="col-sm-6 col-md-3 isotope-item app-development">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/process/pr2s.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-5">
											<i class="fa fa-search-plus"></i>
											<span>Process</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-5">Weaving The Cotton</a>
								</div>
								<div class="modal fade" id="project-5" tabindex="-1" role="dialog" aria-labelledby="project-5-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-6">
														<img src="images/process/pr2.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div>
							<div class="col-sm-6 col-md-3 isotope-item web-design">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/wplace/wplc5a.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-6">
											<i class="fa fa-search-plus"></i>
											<span>Work Place</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-6">Spinner</a>
								</div>
								<div class="modal fade" id="project-6" tabindex="-1" role="dialog" aria-labelledby="project-6-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-6">
														<img src="images/wplace/wplc5.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div>
							<div class="col-sm-6 col-md-3 isotope-item site-building">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/product/prd3n.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-7">
											<i class="fa fa-search-plus"></i>
											<span>Products</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-7">Processed Cotton</a>
								</div>
								<div class="modal fade" id="project-7" tabindex="-1" role="dialog" aria-labelledby="project-7-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-6">
													<img src="images/product/prd3n.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div>
							<div class="col-sm-6 col-md-3 isotope-item web-design">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/wplace/wplc6a.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-8">
											<i class="fa fa-search-plus"></i>
											<span>Work Place</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-8">Spinner</a>
								</div>
								<div class="modal fade" id="project-8" tabindex="-1" role="dialog" aria-labelledby="project-8-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<h3>Project Description</h3>
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-6">
													<img src="images/wplace/wplc6a.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div>
							<div class="col-sm-6 col-md-3 isotope-item web-design">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/wplace/wplc3.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-9">
											<i class="fa fa-search-plus"></i>
											<span>Work Place</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-9">Work Area</a>
								</div>
								<div class="modal fade" id="project-9" tabindex="-1" role="dialog" aria-labelledby="project-9-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<h3>Project Description</h3>
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-6">
													<img src="images/wplace/wplc3.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div>
							<div class="col-sm-6 col-md-3 isotope-item site-building">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/product/prd4.jpg">
										<a class="overlay" data-toggle="modal" data-target="#project-10">
											<i class="fa fa-search-plus"></i>
											<span>Products</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-10">Uncuted Bed sheet</a>
								</div>
								<div class="modal fade" id="project-10" tabindex="-1" role="dialog" aria-labelledby="project-10-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-6">
														<img src="images/product/prd4.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div>
							<div class="col-sm-6 col-md-3 isotope-item web-design">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/wplace/wplc2.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-11">
											<i class="fa fa-search-plus"></i>
											<span>Work Place</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-11">Garmenting Area</a>
	      </div><div class="modal fade" id="project-11" tabindex="-1" role="dialog" aria-labelledby="project-11-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-6">
													<img src="images/wplace/wplc2.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div>
							<div class="col-sm-6 col-md-3 isotope-item app-development">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/process/pr3s.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-12">
											<i class="fa fa-search-plus"></i>
											<span>Process</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-12">Spinning</a>
								</div>
								<div class="modal fade" id="project-12" tabindex="-1" role="dialog" aria-labelledby="project-12-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-6">
														<img src="images/process/pr3.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div></div>
					</div></div></div></div>

					<div class="subfooter">
				<div class="container">
					<div class="row">
						<?php include 'footer.php'; ?>
	</body>
</html>
