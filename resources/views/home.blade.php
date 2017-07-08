@extends('master')

@section('content')

	<!-- Carousel-->
	<section>
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox" style="position: relative;">
		    	<div class="item ">
		      		<img src="image/newslide1.jpg" alt="...">
			    </div>
			    <div class="item ">
		      		<img src="image/newslide6.jpg" alt="...">
			    </div>
			    <div class="item active">
		      		<img src="image/newslide3.jpg" alt="...">
			    </div>
			    <div class="item ">
		      		<img src="image/newslide4.jpg" alt="...">
			    </div>
			    <div class="item ">
		      		<img src="image/newslide5.jpg" alt="...">
			    </div>
			    <div class="item ">
		      		<img src="image/newslide2.jpg" alt="...">
			    </div>
	
				<div class="search-wrapper"> 			
				    <div class="container">		
				    	<form method="GET" action="{{ route('vendor.search') }}">
				    		<div class="heading ">	
				    			<h3 class="text-center">SEARCH YOUR PHOTOGRAPHER</h3>
				    		</div>
				    		<div class="row">
				    			<div class="col-md-3 col-xs-6 col-md-offset-1">
				    				<div class="form-group">
				    					<select class="form-control" name="lokasi">
				    						<option value="">Semua Lokasi</option>
				    						<option value="surabaya">Surabaya</option>
				    						<option value="jakarta">Jakarta</option>
				    						<option value="bandung">Bandung</option>
				    						<option value="yogyakarta">Yogyakarta</option>
				    					</select>
				    				</div>
				    			</div>
				    			<div class="col-md-3 col-xs-6 ">
				    				<div class="form-group">
				    					<select class="form-control" name="category">
				    						<option value="">Kategori Foto</option>
				    						<option value="wedding">Wedding/Prewedding</option>
				    						<option value="produk">Produk/Iklan</option>
				    						<option value="company-profile">Company Profile</option>
				    						<option value="event">Event</option>
				    					</select>
				    				</div>
				    			</div>
				    			<div class="col-md-3 col-xs-6">
				    				<div class="form-group">
				    					<select class="form-control" name="harga">
				    						<option value="">Kisaran Harga</option>
				    						<option value=">1000000">> 1.000.000</option>
				    						<option value=">5000000">> 5.000.000</option>
				    						<option value=">10000000">> 10.000.000</option>
				    						<option value=">25000000">> 25.000.000</option>
				    						<option value=">50000000">> 50.000.000</option>
				    					</select>
				    				</div>
				    			</div>	
				    			<div class="col-md-1 col-xs-3">
				    				<button type="submit" class="btn btn-cari btn-block">Cari</button>
				    			</div>																
				    		</div>
				    	</form>
				    </div>
				</div>    
			</div>
		</div>
	</section>
	<!-- End Carousel -->

	{{-- <!-- Kategori Foto  -->
	<section>
		<div class="container">
			<h3 class="text-center">Category Photography</h3>
			<div class="row">
				<ul class="thumbnails" id="hover-cap-4col">
					<li class="col-lg-6 col-sm-12 ">
						<div class="thumbnail">
							<div class="caption">
								<br><br><br><br><br><br><br><br>
								<h2 class="text-center">Wedding/Prewedding</h2>
								<p></p>

							</div>
							<img src="image/7.jpg" alt="ALT NAME">
						</div>
					</li>
					<li class="col-lg-6 col-sm-12 ">
						<div class="thumbnail">
							<div class="caption">
								<div class="caption-inner">
									<br><br><br><br><br><br><br><br>
									<h2 class="text-center">Produk/Iklan</h2>
									<p></p>
								</div>
							</div>
							<img src="image/fotopro3.jpeg">
						</div>
					</li>
					<li class="col-lg-6 col-sm-12 ">
						<div class="thumbnail">
							<div class="caption">
								<div class="caption-inner">
									<br><br><br><br><br><br><br><br>
									<h2 class="text-center">Company Profile</h2>
									<p></p>
								</div>
							</div>
							<img src="image/fotocp.jpg">
						</div>
					</li>
					<li class="col-lg-6 col-sm-12 ">
						<div class="thumbnail">
							<div class="caption">
								<div class="caption-inner">
									<br><br><br><br><br><br><br><br>
									<h2 class="text-center">Event</h2>
									<p></p>
								</div>
							</div>
							<img src="image/fotodok.jpg">
						</div>
					</li>	
			</div>
	</section>
	<!-- End Kategori --> --}}

	<div style="margin: 50px 0"></div>

	<div class="form-group">
		<div class="row">
		<div class="col-lg-3 col-sm-6">
				<a href="#" class="portfolio-box">
					<img src="image/7.jpg" class="img-responsive" alt="">
					<div class="portfolio-box-caption">
						<div class="portfolio-box-caption-content">
							<div class="project-category text-faded">

							</div>
							<div class="project-name">
								Wedding/Prewedding
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-3 col-sm-6">
				<a href="#" class="portfolio-box">
					<img src="image/fotopro3.jpeg" class="img-responsive" alt="">
					<div class="portfolio-box-caption">
						<div class="portfolio-box-caption-content">
							<div class="project-category text-faded">

							</div>
							<div class="project-name">
								Produk/iklan
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-3 col-sm-6">
				<a href="#" class="portfolio-box">
					<img src="image/fotocp.jpg" class="img-responsive" alt="">
					<div class="portfolio-box-caption">
						<div class="portfolio-box-caption-content">
							<div class="project-category text-faded">

							</div>
							<div class="project-name">
								Company Profile
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-3 col-sm-6">
				<a href="#" class="portfolio-box">
					<img src="image/fotodok.jpg" class="img-responsive" alt="">
					<div class="portfolio-box-caption">
						<div class="portfolio-box-caption-content">
							<div class="project-category text-faded">

							</div>
							<div class="project-name">
								Event
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>

	<div style="margin: 50px 0"></div>

	<!-- Testomoni -->
	<section>
		<div class="container-fluid testimonial">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
	                <div class="quote"><i class="fa fa-quote-left fa-4x"></i></div>
					<div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">
					 
	                  <ol class="carousel-indicators">
					    <li data-target="#fade-quote-carousel" data-slide-to="0"></li>
					    <li data-target="#fade-quote-carousel" data-slide-to="1"></li>
					    <li data-target="#fade-quote-carousel" data-slide-to="2" class="active"></li>
	                    <li data-target="#fade-quote-carousel" data-slide-to="3"></li>
	                    <li data-target="#fade-quote-carousel" data-slide-to="4"></li>
	                    <li data-target="#fade-quote-carousel" data-slide-to="5"></li>
					  </ol>
					 
					  <div class="carousel-inner">
					    <div class="item">
	                        <div class="profile-circle" style="background-image: url('image/2.jpg');"></div>
					    	<blockquote class="block">
					    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
					    		<br>
					    		<h5 style="margin: 0"><em>"Alhamdani & Eva Angraini"</em></h5>
					    	</blockquote>	
					    </div>
					    <div class="item">
	                        <div class="profile-circle" style="background-image: url('image/3.jpg');"></div>
					    	<blockquote class="block">
					    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
					    		<br>
					    		<h5 style="margin: 0"><em>"Alhamdani & Eva Angraini"</em></h5>
					    	</blockquote>
					    </div>
					    <div class="active item">
	                        <div class="profile-circle" style="background-image: url('image/4.jpg');"></div>
					    	<blockquote class="block">
					    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
					    		<br>
					    		<h5 style="margin: 0"><em>"Alhamdani & Eva Angraini"</em></h5>
					    	</blockquote>
					    </div>
	                    <div class="item">
	                        <div class="profile-circle" style="background-image: url('image/5.jpg');"></div>
	    			    	<blockquote class="block">
					    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
					    		<br>
					    		<h5 style="margin: 0"><em>"Alhamdani & Eva Angraini"</em></h5>
					    	</blockquote>
					    </div>
	                    <div class="item">
	                        <div class="profile-circle" style="background-image: url('image/6.jpg');"></div>
	    			    	<blockquote class="block">
					    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
					    		<br>
					    		<h5 style="margin: 0"><em>"Alhamdani & Eva Angraini"</em></h5>
					    	</blockquote>
					    </div>
	                    <div class="item">
	                        <div class="profile-circle" style="background-image: url('image/7.jpg');"></div>
	    			    	<blockquote class="block">
					    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
					    		<br>
					    		<h5 style="margin: 0"><em>"Alhamdani & Eva Angraini"</em></h5>
					    	</blockquote>
					    </div>
					  </div>
					</div>
				</div>							
			</div>
		</div>
	</section>
	<!-- End Testimoni -->

	<div style="margin: 50px 0"></div>

	{{-- <!-- Foto Favorit -->
	<section>
		<div class="container-fluid">
		<h3 class="text-center">Photo Popular</h3>
			<div class="row bawah-bottom">
				<div class="col-md-3 col-fav"><img src="image/2.jpg" alt="" class="favorit"></div>
				<div class="col-md-3 col-fav"><img src="image/3.jpg" alt="" class="favorit"></div>
				<div class="col-md-3 col-fav"><img src="image/4.jpg" alt="" class="favorit"></div>
				<div class="col-md-3 col-fav"><img src="image/5.jpg" alt="" class="favorit"></div>
				<div class="col-md-3 col-fav"><img src="image/6.jpg" alt="" class="favorit"></div>
				<div class="col-md-3 col-fav"><img src="image/7.jpg" alt="" class="favorit"></div>
				<div class="col-md-3 col-fav"><img src="image/2.jpg" alt="" class="favorit"></div>
				<div class="col-md-3 col-fav"><img src="image/3.jpg" alt="" class="favorit"></div>
			</div>
		</div>	
	</section>
	<!-- End Foto Favorit --> --}}

	<div class="container-fluid">
		<div class="col-md-4">
			<div class="thumbnail-fav">
				<a href="image/5.jpg" target="_blank">
					<div style="background-image: url('image/slide1.jpg')" class="photo-fav"></div>
					<div class="caption-fav">
						<p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="thumbnail-fav">
				<a href="image/5.jpg" target="_blank">
					<div style="background-image: url('image/slide2.jpg')" class="photo-fav"></div>
					<div class="caption-fav">
						<p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="thumbnail-fav">
				<a href="image/5.jpg" target="_blank">
					<div style="background-image: url('image/slide1.jpg')" class="photo-fav"></div>
					<div class="caption-fav">
						<p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="thumbnail-fav">
				<a href="image/5.jpg" target="_blank">
					<div style="background-image: url('image/slide1.jpg')" class="photo-fav"></div>
					<div class="caption-fav">
						<p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="thumbnail-fav">
				<a href="image/5.jpg" target="_blank">
					<div style="background-image: url('image/slide1.jpg')" class="photo-fav"></div>
					<div class="caption-fav">
						<p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="thumbnail-fav">
				<a href="image/5.jpg" target="_blank">
					<div style="background-image: url('image/slide1.jpg')" class="photo-fav"></div>
					<div class="caption-fav">
						<p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
					</div>
				</a>
			</div>
		</div>
	</div>

@endsection