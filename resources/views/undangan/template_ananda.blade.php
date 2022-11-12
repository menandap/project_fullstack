<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Review Undangan Anda</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />
	<link href="{{ asset('dashboard/images/logo-black.png') }}" rel="icon">

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('undangan/template-1/css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('undangan/template-1/css/icomoon.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('undangan/template-1/css/bootstrap.css') }}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ asset('undangan/template-1/css/magnific-popup.css') }}">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{ asset('undangan/template-1/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('undangan/template-1/css/owl.theme.default.min.css') }}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('undangan/template-1/css/style.css')}}">

	<!-- Modernizr JS -->
	<script src="{{ asset('undangan/template-1/js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="{{ asset('undangan/template-1/js/respond.min.js') }}"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-xs-4" style="display:flex; flex-direction:row;">
					<div id="fh5co-logo">Created by <strong>.</strong></a></div>
					<img src="/dashboard/images/logo-white.png" style="height:45px; weidth:45px; padding-left:10px;">
				</div>
				<!-- <div class="col-xs-4">
					
				</div> -->
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li class="active"><a href="#fh5co-couple">Home</a></li>
						<li><a href="#fh5co-event">Event</a></li>
						<li><a href="#fh5co-couple-story">Story</a></li>
						<li><a href="#fh5co-gallery">Gallery</a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover" style="background-image: url('{{ url('/db/'.$undangan->featured_image)}}');" role="banner" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>{{$undangan->person_1_name}} &amp; {{$undangan->person_2_name}}</h1>
							<h2>Acara {{$undangan->title}}</h2>
							<div class="simply-countdown simply-countdown-one"></div>
							<p><a href="#" class="btn btn-default btn-sm">Simpan Tanggal</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-couple">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<h2>Kami Mengundang Anda</h2>
					@php

					$value = strtotime($undangan->wedding_date);

					$date = date('d M Y', $value);

					@endphp
					<h3>{{$date}}, {{$undangan->wedding_location}}</h3>
					<p>{{$undangan->desc_wedding}}</p>
				</div>
			</div>
			<div class="couple-wrap animate-box">
				<div class="couple-half">
					<div class="groom">
						<img src="{{ url('/db/'.$undangan->person_1_image) }}" alt="groom" class="img-responsive">
					</div>
					<div class="desc-groom">
						<h3>{{$undangan->person_1_name}}</h3>
						<p>{{$undangan->desc_person_1}}</p>
					</div>
				</div>
				<p class="heart text-center"><i class="icon-heart2"></i></p>
				<div class="couple-half">
					<div class="bride">
						<img src="{{ url('/db/'.$undangan->person_2_image) }}" alt="groom" class="img-responsive">
					</div>
					<div class="desc-bride">
						<h3>{{$undangan->person_2_name}}</h3>
						<p>{{$undangan->desc_person_2}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-event" class="fh5co-bg" style="background-image:url(images/img_bg_3.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<span>Acara Spesial Kami</span>
					<h2>Rundown Acara</h2>
				</div>
			</div>

			@php

			$cek = App\Models\Event::where('id_undangan', '=', $undangan->id)->count();								

			@endphp

			<div class="row">
				<div class="display-t">
					<div class="display-tc">
						<div class="col-md-10 col-md-offset-1" style="display:flex; flex-direction:row; justify-content:center;">
							@if($cek != 0)
							@foreach($event as $events)
							<div class="col-md-6 col-sm-6 text-center">
								<div class="event-wrap animate-box">
									<h3>{{ $events->title }}</h3>
									<div class="event-col">
										<i class="icon-clock"></i>
										@php

										$value1 = strtotime($events->date_start);
										$time1 = date('H:i', $value1);

										$value2 = strtotime($events->date_end);
										$time2 = date('H:i', $value2);

										@endphp
										<span>{{ $time1 }}</span>
										<span>{{ $time2 }}</span>
									</div>
									<div class="event-col">
										<i class="icon-calendar"></i>
										@php

										$value = strtotime($events->date);

										$date1 = date('Y', $value);
										$date2 = date('d M', $value);

										@endphp
										<span>{{ $date1 }}</span>
										<span>{{ $date2 }}</span>
									</div>
									<p>{{ $events->desc }}</p>
								</div>
							</div>
							@endforeach
							@else
							<div class="col-md-6 col-sm-6 text-center">
								<div class="event-wrap animate-box">
									<h3>N/A</h3>
									<div class="event-col">
										<i class="icon-clock"></i>
										<span>N/A</span>
										<span>N/A</span>
									</div>
									<div class="event-col">
										<i class="icon-calendar"></i>
										<span>N/A</span>
										<span>N/A</span>
									</div>
									<p>Event Belum Dibuat</p>
								</div>
							</div>								
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@php

		$tes = App\Models\Story::where('id_undangan', '=', $undangan->id)->count();	
		
	@endphp

	<div id="fh5co-couple-story">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<span>Kami Mencintai Satu Sama Lain</span>
					<h2>Cerita Kami</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-md-offset-0">
					<ul class="timeline animate-box">
						@if($tes != 0)
						@php
							$index_story = 0;
						@endphp
						@foreach($story as $storys)
						@php
							$tgl = strtotime($storys->date);
							$tgl_story = date('d M Y', $tgl);
						@endphp
						@if($index_story%2==0)
							<li class="animate-box">
								<div class="timeline-badge" style="background-image: url('{{ url('/db/'.$storys->images)}}');"></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h3 class="timeline-title">{{ $storys->title }}</h3>
										<span class="date">{{ $tgl_story }}</span>
									</div>
									<div class="timeline-body">
										<p>{{ $storys->desc }}</p>
									</div>
								</div>
							</li>
						@else
							<li class="timeline-inverted animate-box">
								<div class="timeline-badge" style="background-image: url('{{ url('/db/'.$storys->images)}}');"></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h3 class="timeline-title">{{ $storys->title }}</h3>
										<span class="date">{{ $tgl_story }}</span>
									</div>
									<div class="timeline-body">
										<p>{{ $storys->desc }}</p>
									</div>
								</div>
							</li>
						@endif
						@php
						$index_story++;
						@endphp
						@endforeach
						@else
							<li class="timeline-inverted animate-box">
								<div class="timeline-badge" style="background-image:url(images/couple-2.jpg);"></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h3 class="timeline-title">N/A</h3>
										<span class="date">N/A</span>
									</div>
									<div class="timeline-body">
										<p>Belum ada cerita yang ditambahkan</p>
									</div>
								</div>
							</li>
						@endif
			    	</ul>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-gallery" class="fh5co-section-gray">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<span>Memori Yang Kami Habiskan</span>
					<h2>Galeri Foto Kami</h2>
				</div>
			</div>
			<div class="row row-bottom-padded-md">
				<div class="col-md-12">
					<ul id="fh5co-gallery-list">	
						<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-1.jpg); "> 
							<a href="images/gallery-1.jpg">
								<div class="case-studies-summary">
									<span>Foto</span>
									<h2>Lorem Ipsum</h2>
								</div>
							</a>
						</li>
						<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-2.jpg); ">
							<a href="#" class="color-2">
								<div class="case-studies-summary">
									<span>Foto</span>
									<h2>Lorem Ipsum</h2>
								</div>
							</a>
						</li>

						<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-3.jpg); ">
							<a href="#" class="color-3">
								<div class="case-studies-summary">
									<span>Foto</span>
									<h2>Lorem Ipsum</h2>
								</div>
							</a>
						</li>
						<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-1.jpg); "> 
							<a href="images/gallery-1.jpg">
								<div class="case-studies-summary">
									<span>Foto</span>
									<h2>Lorem Ipsum</h2>
								</div>
							</a>
						</li>
						<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-2.jpg); ">
							<a href="#" class="color-2">
								<div class="case-studies-summary">
									<span>Foto</span>
									<h2>Lorem Ipsum</h2>
								</div>
							</a>
						</li>

						<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(images/gallery-3.jpg); ">
							<a href="#" class="color-3">
								<div class="case-studies-summary">
									<span>Foto</span>
									<h2>Lorem Ipsum</h2>
								</div>
							</a>
						</li>					
					</ul>		
				</div>
			</div>
		</div>
	</div>

	<!-- <div id="fh5co-event" class="fh5co-bg" style="background-image:url(images/img_bg_3.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<span>Our Great Guest</span>
					<h2>Wedding Events Guest</h2>
				</div>
			</div>
				<div class="display-t">
					<div class="display-tc">
						<div class="col-sm" style="background-color:black; z-index:999">
							<div class="col-md-3 col-sm-3 text-center">
								<div class="event-wrap animate-box">
									<h3>Mr. Gede Ananda Prema Putra</h3>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 text-center">
								<div class="event-wrap animate-box">
									<h3>Mr. Gede Ananda Prema Putra</h3>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 text-center">
								<div class="event-wrap animate-box">
									<h3>Mr. Gede Ananda Prema Putra</h3>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 text-center">
								<div class="event-wrap animate-box">
									<h3>Mr. Gede Ananda Prema Putra</h3>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 text-center">
								<div class="event-wrap animate-box">
									<h3>Mr. Gede Ananda Prema Putra</h3>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 text-center">
								<div class="event-wrap animate-box">
									<h3>Mr. Gede Ananda Prema Putra</h3>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 text-center">
								<div class="event-wrap animate-box">
									<h3>Mr. Gede Ananda Prema Putra</h3>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 text-center">
								<div class="event-wrap animate-box">
									<h3>Mr. Gede Ananda Prema Putra</h3>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 text-center">
								<div class="event-wrap animate-box">
									<h3>Mr. Gede Ananda Prema Putra</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<!-- <div id="fh5co-testimonial">
		<div class="container">
			<div class="row">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<span>Best Wishes</span>
						<h2>Friends Wishes</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="wrap-testimony">
							<div class="owl-carousel-fullwidth">
								<div class="item">
									<div class="testimony-slide active text-center">
										<figure>
											<img src="../undangan/template-1/images/couple-1.jpg" alt="user">
										</figure>
										<span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
										<blockquote>
											<p>"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics"</p>
										</blockquote>
									</div>
								</div>
								<div class="item">
									<div class="testimony-slide active text-center">
										<figure>
											<img src="../undangan/template-1/images/couple-2.jpg" alt="user">
										</figure>
										<span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
										<blockquote>
											<p>"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, at the coast of the Semantics, a large language ocean."</p>
										</blockquote>
									</div>
								</div>
								<div class="item">
									<div class="testimony-slide active text-center">
										<figure>
											<img src="../undangan/template-1/images/couple-3.jpg" alt="user">
										</figure>
										<span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
										<blockquote>
											<p>"Far far away, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean."</p>
										</blockquote>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<!-- <div id="fh5co-services" class="fh5co-section-gray">
		<div class="container">
			
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>We Offer Services</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span class="icon">
							<i class="icon-calendar"></i>
						</span>
						<div class="feature-copy">
							<h3>We Organized Events</h3>
							<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
						</div>
					</div>

					<div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span class="icon">
							<i class="icon-image"></i>
						</span>
						<div class="feature-copy">
							<h3>Photoshoot</h3>
							<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
						</div>
					</div>

					<div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span class="icon">
							<i class="icon-video"></i>
						</span>
						<div class="feature-copy">
							<h3>Video Editing</h3>
							<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
						</div>
					</div>

				</div>

				<div class="col-md-6 animate-box">
					<div class="fh5co-video fh5co-bg" style="background-image: url(../undangan/template-1/images/img_bg_3.jpg); ">
						<a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-video2"></i></a>
						<div class="overlay"></div>
					</div>
				</div>
			</div>
		</div>
	</div> -->


	<!-- <div id="fh5co-started" class="fh5co-bg" style="background-image:url(../undangan/template-1/images/img_bg_4.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Are You Attending?</h2>
					<p>Please Fill-up the form to notify you that you're attending. Thanks.</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-10 col-md-offset-1">
					<form class="form-inline">
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label for="name" class="sr-only">Name</label>
								<input type="name" class="form-control" id="name" placeholder="Name">
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Email">
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<button type="submit" class="btn btn-default btn-block">I am Attending</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> -->

	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">

			<div class="row">
				<div class="col-md-12 text-center">
					<h3>Invite.In</h3>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
					<p>
						<small class="block">&copy; 2022 Copyright Invite.In. All Rights Reserved</small> 
						<small class="block">Designed by Invite.In</small>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="{{ asset('undangan/template-1/js/jquery.min.js') }}"></script>
	<!-- jQuery Easing -->
	<script src="{{ asset('undangan/template-1/js/jquery.easing.1.3.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('undangan/template-1/js/bootstrap.min.js') }}"></script>
	<!-- Waypoints -->
	<script src="{{ asset('undangan/template-1/js/jquery.waypoints.min.js') }}"></script>
	<!-- Carousel -->
	<script src="{{ asset('undangan/template-1/js/owl.carousel.min.js') }}"></script>
	<!-- countTo -->
	<script src="{{ asset('undangan/template-1/js/jquery.countTo.js') }}"></script>

	<!-- Stellar -->
	<script src="{{ asset('undangan/template-1/js/jquery.stellar.min.js') }}"></script>
	<!-- Magnific Popup -->
	<script src="{{ asset('undangan/template-1/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('undangan/template-1/js/magnific-popup-options.js') }}"></script>

	<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js') }}"></script> -->
	<script src="{{ asset('undangan/template-1/js/simplyCountdown.js') }}"></script>
	<!-- Main -->
	<script src="{{ asset('undangan/template-1/js/main.js') }}"></script>

	<script>
    var d = new Date(new Date().getTime() + 200 * 120 * 120 * 2000);

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
</script>

	</body>
</html>

