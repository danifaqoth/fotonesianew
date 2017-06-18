@extends('master')

@section('content')

	<!-- Carousel-->
	<section>
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox" style="position: relative;">
		    	<div class="item active">
		      		<img src="image/slide1.jpg" alt="...">
			    </div>
			    <div class="item">
			    	<img src="image/slide2.jpg" alt="...">		
			    </div>
			    <div class="item">
			    	<img src="image/slide3.jpg" alt="...">
			    </div>
	
				<div class="search-wrapper"> 			
				    <div class="container">		
				    	<form action="">
				    		<div class="heading ">
				    			<h3 class="text-center">SEARCH YOUR PHOTOGRAPHER</h3>
				    		</div>
				    		<div class="row">
				    			<div class="col-md-3 col-md-offset-1">
				    				<div class="form-group">
				    					<select class="form-control">
				    						<option>Semua Lokasi</option>
				    						<option>Surabaya</option>
				    						<option>Jakarta</option>
				    						<option>Bandung</option>
				    						<option>Yogyakarta</option>
				    					</select>
				    				</div>
				    			</div>
				    			<div class="col-md-3">
				    				<div class="form-group">
				    					<select class="form-control">
				    						<option>Kategori</option>
				    						<option>Wedding/Prewedding</option>
				    						<option>Produk/Iklan</option>
				    						<option>Company Profile</option>
				    						<option>Event</option>
				    					</select>
				    				</div>
				    			</div>
				    			<div class="col-md-3">
				    				<div class="form-group">
				    					<select class="form-control">
				    						<option>Kisaran Harga</option>
				    						<option>> 1.000.000</option>
				    						<option>> 5.000.000</option>
				    						<option>> 10.000.000</option>
				    						<option>> 25.000.000</option>
				    						<option>> 50.000.000</option>
				    					</select>
				    				</div>
				    			</div>	
				    			<div class="col-md-1">
				    				<button type="submit" class="btn btn-block btn-primary">Cari</button>
				    			</div>																
				    		</div>
				    	</form>
				    </div>
				</div>    
			</div>
		</div>
	</section>
	<!-- End Carousel -->

	<!-- Kategori Foto  -->
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
	<!-- End Kategori -->

	<!-- 	<div class="row">
				<div class="col-lg-4 col-sm-6">
					<a href="#" class="portfolio-box">
                        <img src="image/5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
				</div>
				<div class="col-lg-4 col-sm-6">
					<a href="#" class="portfolio-box">
                        <img src="image/6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
				</div>
				<div class="col-lg-4 col-sm-6">
					<a href="#" class="portfolio-box">
                        <img src="image/7.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
				</div>
			</div> -->


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

	<!-- Foto Favorit -->
	<section>
		<div class="container-fluid">
		<h3 class="text-center">Photo Popular</h3>
			<div class="row">
				<div class="col-md-3 col-fav"><img src="image/2.jpg" alt="" class="favorit"></div>
				<div class="col-md-3 col-fav"><img src="image/3.jpg" alt="" class="favorit"></div>
				<div class="col-md-3 col-fav"><img src="image/4.jpg" alt="" class="favorit"></div>
				<div class="col-md-3 col-fav"><img src="image/5.jpg" alt="" class="favorit"></div>
				<div class="col-md-3 col-fav"><img src="image/6.jpg" alt="" class="favorit"></div>
				<div class="col-md-3 col-fav"><img src="image/7.jpg" alt="" class="favorit"></div>
				<div class="col-md-3 col-fav"><img src="image/2.jpg" alt="" class="favorit"></div>
				<div class="col-md-3 col-fav"><img src="image/3.jpg" alt="" class="favorit"></div>
				<div class="col-md-3 col-fav"><img src="image/4.jpg" alt="" class="favorit"></div>
				<div class="col-md-3 col-fav"><img src="image/5.jpg" alt="" class="favorit"></div>
				<div class="col-md-3 col-fav"><img src="image/6.jpg" alt="" class="favorit"></div>
				<div class="col-md-3 col-fav"><img src="image/7.jpg" alt="" class="favorit"></div>
			</div>
		</div>	
	</section>
	<!-- End Foto Favorit -->
@endsection