<section class="footer pt-120">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mr-auto col-sm-6 col-md-6">
				<div class="widget footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">À Propos</h5>
					<p class="mt-3">
						{{ $settings->about }}
					</p>
					<ul class="list-inline footer-socials">
						<li class="list-inline-item"><a href="{{ $settings->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
						<li class="list-inline-item"> <a href="{{ $settings->twitter }}"><i class="fab fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="{{ $settings->linkedin }}"><i class="fab fa-linkedin"></i></a></li>
						<li class="list-inline-item"><a href="{{ $settings->pinterest }}"><i class="fab fa-pinterest"></i></a></li>
					</ul>
				</div>
			</div>
			
			<div class="col-lg-2 col-sm-6 col-md-6">
				<div class="footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">Company</h5>
					<ul class="list-unstyled footer-links">
						<li><a href="#">About us</a></li>
						<li><a href="#">Contact us</a></li>
						<li><a href="#">Projects</a></li>
						<li><a href="#">Terms & Condition</a></li>
						<li><a href="#">Privacy policy</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-2 col-sm-6 col-md-6">
				<div class="footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">Courses</h5>
					<ul class="list-unstyled footer-links">
						<li><a href="#">SEO Business</a></li>
						<li><a href="#">Digital Marketing</a></li>
						<li><a href="#">Graphic Design</a></li>
						<li><a href="#">Site Development</a></li>
						<li><a href="#">Social Marketing</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-md-6">
				<div class="footer-widget footer-contact mb-5 mb-lg-0">
					<h5 class="widget-title">Contacte </h5>
					
					<ul class="list-unstyled">
						<li><i class="bi bi-headphone"></i>
							<div>
								<strong>Telephone</strong>
								{{ $settings->phone }}
							</div>
							
						</li>
						<li> <i class="bi bi-envelop"></i>
							<div>
								<strong>Adresse Mail</strong>
								{{ $settings->email }}
							</div>
						</li>
						<li><i class="bi bi-location-pointer"></i>
							<div>
								<strong>Office Address</strong>
								{{ $settings->address }}
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-btm">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-6">
					<div class="footer-logo">
						<img src="{{ asset('assets/images/logo-dark.png') }}" alt="greencitycentre" class="img-fluid" width="300">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="copyright text-lg-center">
						<p>Developed with love by <a href="#">DevWas</a> </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="fixed-btm-top">
	<a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
</div>