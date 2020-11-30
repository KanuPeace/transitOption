@extends('web.layouts.app' , ['title' => "Home"])
@section('content')
<style>
	.homepage_slider{
		width: 100%;
		height: 80vh;
		background-size: cover;
		background-position: center;
		
	}
</style>

	<!-- Main -->
	<main class="main" role="main">
		<!-- Intro -->
		<div class="carousel-inner">
		
		  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
			<ol class="carousel-indicators">
				@for ($i = 0; $i < $sliderImages->count(); $i++)
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="{{ $i++ == 1 ? "active" : '' }}"></li>
				@endfor
			</ol>
			@php
			$i = 0
		@endphp
			@foreach ($sliderImages as $image)
				<div class="carousel-item {{ $i++ == 1 ? "active" : '' }}">
					<div style="background-image:url({{ $image->getImage() }})" class="homepage_slider"></div>
					<div class="carousel-caption d-none d-md-block">
						<h5>{{ $image->vehicle->route_from }} - {{ $image->vehicle->route_to }}</h5>
						<p>...</p>
					</div>
				</div>
			@endforeach
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			  <span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			  <span class="carousel-control-next-icon" aria-hidden="true"></span>
			  <span class="sr-only">Next</span>
			</a>
		  </div>
		<!-- //Intro -->
		
		<!-- Search -->
		<div class="advanced-search color" id="booking">
			<div class="wrap">
				<form role="form" action="search-results.html" method="post">
					<!-- Row -->
					<div class="f-row">
						<div class="form-group datepicker one-third">
							<label for="dep-date">Departure date and time</label>
							<input type="text" id="dep-date" />
						</div>
						<div class="form-group select one-third">
							<label>Pick up location</label>
							<select>
								<option selected>&nbsp;</option>
								<optgroup label="Germany">
									<option value="Berlin Central Train Station">Berlin Central Train Station</option>
									<option value="Berlin Schonefeld Airport">Berlin Schonefeld Airport</option>
									<option value="Berlin Tegel Airport">Berlin Tegel Airport</option>
									<option value="Bremen Airport">Bremen Airport</option>
									<option value="Cologne Bonn Airport">Cologne Bonn Airport</option>
									<option value="Dortmund Airport">Dortmund Airport</option>
									<option value="Dresden Airport">Dresden Airport</option>
									<option value="Dusseldorf Airport">Dusseldorf Airport</option>
									<option value="Frankfurt Hahn Airport">Frankfurt Hahn Airport</option>
									<option value="Frankfurt International Airport">Frankfurt International Airport</option>
									<option value="Friedrichshafen Airport">Friedrichshafen Airport</option>
									<option value="Hamburg Finkenwerder Airport">Hamburg Finkenwerder Airport</option>
									<option value="Hamburg Port">Hamburg Port</option>
									<option value="Hamburg-Fuhlsbuttel Airport">Hamburg-Fuhlsbuttel Airport</option>
									<option value="Hanover Lengenhagen Airport">Hanover Lengenhagen Airport</option>
									<option value="Kiel Port">Kiel Port</option>
									<option value="Leipzig Halle Airport">Leipzig Halle Airport</option>
									<option value="Munich Airport">Munich Airport</option>
									<option value="Nuremberg Airport">Nuremberg Airport</option>
								</optgroup>
								<optgroup label="Italy">
									<option value="Alghero Airport">Alghero Airport</option>
									<option value="Bari Airport">Bari Airport</option>
									<option value="Bari Port">Bari Port</option>
									<option value="Bergamo Airport">Bergamo Airport</option>
									<option value="Bologna Airport">Bologna Airport</option>
									<option value="Brindisi Airport">Brindisi Airport</option>
									<option value="Cagliari Airport">Cagliari Airport</option>
									<option value="Florence Airport">Florence Airport</option>
									<option value="Florence Train Station">Florence Train Station</option>
									<option value="Genoa Airport">Genoa Airport</option>
									<option value="Genoa Port">Genoa Port</option>
									<option value="Milan Central Train Station">Milan Central Train Station</option>
									<option value="Milan City Centre">Milan City Centre</option>
									<option value="Naples Airport">Naples Airport</option>
								</optgroup>
								<optgroup label="Spain">
									<option value="Alicante Airport">Alicante Airport</option>
									<option value="Almeria Airport">Almeria Airport</option>
									<option value="Barcelona Airport">Barcelona Airport</option>
									<option value="Granada Airport">Granada Airport</option>
									<option value="Jerez de la Frontera">Jerez de la Frontera</option>
									<option value="Leon Airport">Leon Airport</option>
									<option value="Madrid Atocha Train Station">Madrid Atocha Train Station</option>
									<option value="Madrid Barajas Airport">Madrid Barajas Airport</option>
									<option value="Pamplona Airport">Pamplona Airport</option>
									<option value="Santander Airport">Santander Airport</option>
									<option value="Seville Airport">Seville Airport</option>
									<option value="Valencia Airport">Valencia Airport</option>
									<option value="Zaragoza Airport">Zaragoza Airport</option>
								</optgroup>
								<optgroup label="United Kingdom">
									<option value="Belfast City Airport">Belfast City Airport</option>
									<option value="Belfast International Airport">Belfast International Airport</option>
									<option value="Bristol Airport">Bristol Airport</option>
									<option value="Cardiff Airport">Cardiff Airport</option>
									<option value="Edinburgh Airport">Edinburgh Airport</option>
									<option value="Glasgow International Airport">Glasgow International Airport</option>
									<option value="London City Airport">London City Airport</option>
									<option value="London Gatwick Airport">London Gatwick Airport</option>
									<option value="London Heathrow Airport">London Heathrow Airport</option>
									<option value="London Stansted Airport">London Stansted Airport</option>
									<option value="Manchester Airport">Manchester Airport</option>
									<option value="Southampton Airport">Southampton Airport</option>
								</optgroup>
							</select>
						</div>
						<div class="form-group select one-third">
							<label>Drop off location</label>
							<select>
								<option selected>&nbsp;</option>
								<optgroup label="Germany">
									<option value="Berlin Central Train Station">Berlin Central Train Station</option>
									<option value="Berlin Schonefeld Airport">Berlin Schonefeld Airport</option>
									<option value="Berlin Tegel Airport">Berlin Tegel Airport</option>
									<option value="Bremen Airport">Bremen Airport</option>
									<option value="Cologne Bonn Airport">Cologne Bonn Airport</option>
									<option value="Dortmund Airport">Dortmund Airport</option>
									<option value="Dresden Airport">Dresden Airport</option>
									<option value="Dusseldorf Airport">Dusseldorf Airport</option>
									<option value="Frankfurt Hahn Airport">Frankfurt Hahn Airport</option>
									<option value="Frankfurt International Airport">Frankfurt International Airport</option>
									<option value="Friedrichshafen Airport">Friedrichshafen Airport</option>
									<option value="Hamburg Finkenwerder Airport">Hamburg Finkenwerder Airport</option>
									<option value="Hamburg Port">Hamburg Port</option>
									<option value="Hamburg-Fuhlsbuttel Airport">Hamburg-Fuhlsbuttel Airport</option>
									<option value="Hanover Lengenhagen Airport">Hanover Lengenhagen Airport</option>
									<option value="Kiel Port">Kiel Port</option>
									<option value="Leipzig Halle Airport">Leipzig Halle Airport</option>
									<option value="Munich Airport">Munich Airport</option>
									<option value="Nuremberg Airport">Nuremberg Airport</option>
								</optgroup>
								<optgroup label="Italy">
									<option value="Alghero Airport">Alghero Airport</option>
									<option value="Bari Airport">Bari Airport</option>
									<option value="Bari Port">Bari Port</option>
									<option value="Bergamo Airport">Bergamo Airport</option>
									<option value="Bologna Airport">Bologna Airport</option>
									<option value="Brindisi Airport">Brindisi Airport</option>
									<option value="Cagliari Airport">Cagliari Airport</option>
									<option value="Florence Airport">Florence Airport</option>
									<option value="Florence Train Station">Florence Train Station</option>
									<option value="Genoa Airport">Genoa Airport</option>
									<option value="Genoa Port">Genoa Port</option>
									<option value="Milan Central Train Station">Milan Central Train Station</option>
									<option value="Milan City Centre">Milan City Centre</option>
									<option value="Naples Airport">Naples Airport</option>
								</optgroup>
								<optgroup label="Spain">
									<option value="Alicante Airport">Alicante Airport</option>
									<option value="Almeria Airport">Almeria Airport</option>
									<option value="Barcelona Airport">Barcelona Airport</option>
									<option value="Granada Airport">Granada Airport</option>
									<option value="Jerez de la Frontera">Jerez de la Frontera</option>
									<option value="Leon Airport">Leon Airport</option>
									<option value="Madrid Atocha Train Station">Madrid Atocha Train Station</option>
									<option value="Madrid Barajas Airport">Madrid Barajas Airport</option>
									<option value="Pamplona Airport">Pamplona Airport</option>
									<option value="Santander Airport">Santander Airport</option>
									<option value="Seville Airport">Seville Airport</option>
									<option value="Valencia Airport">Valencia Airport</option>
									<option value="Zaragoza Airport">Zaragoza Airport</option>
								</optgroup>
								<optgroup label="United Kingdom">
									<option value="Belfast City Airport">Belfast City Airport</option>
									<option value="Belfast International Airport">Belfast International Airport</option>
									<option value="Bristol Airport">Bristol Airport</option>
									<option value="Cardiff Airport">Cardiff Airport</option>
									<option value="Edinburgh Airport">Edinburgh Airport</option>
									<option value="Glasgow International Airport">Glasgow International Airport</option>
									<option value="London City Airport">London City Airport</option>
									<option value="London Gatwick Airport">London Gatwick Airport</option>
									<option value="London Heathrow Airport">London Heathrow Airport</option>
									<option value="London Stansted Airport">London Stansted Airport</option>
									<option value="Manchester Airport">Manchester Airport</option>
									<option value="Southampton Airport">Southampton Airport</option>
								</optgroup>
							</select>
						</div>
					</div>
					<!-- //Row -->
					
					<!-- Row -->
					<div class="f-row">
						<div class="form-group datepicker one-third">
							<label for="ret-date">Return date and time</label>
							<input type="text" id="ret-date" />
						</div>
						<div class="form-group select one-third">
							<label>Pick up location</label>
							<select>
								<option selected>&nbsp;</option>
								<optgroup label="Germany">
									<option value="Berlin Central Train Station">Berlin Central Train Station</option>
									<option value="Berlin Schonefeld Airport">Berlin Schonefeld Airport</option>
									<option value="Berlin Tegel Airport">Berlin Tegel Airport</option>
									<option value="Bremen Airport">Bremen Airport</option>
									<option value="Cologne Bonn Airport">Cologne Bonn Airport</option>
									<option value="Dortmund Airport">Dortmund Airport</option>
									<option value="Dresden Airport">Dresden Airport</option>
									<option value="Dusseldorf Airport">Dusseldorf Airport</option>
									<option value="Frankfurt Hahn Airport">Frankfurt Hahn Airport</option>
									<option value="Frankfurt International Airport">Frankfurt International Airport</option>
									<option value="Friedrichshafen Airport">Friedrichshafen Airport</option>
									<option value="Hamburg Finkenwerder Airport">Hamburg Finkenwerder Airport</option>
									<option value="Hamburg Port">Hamburg Port</option>
									<option value="Hamburg-Fuhlsbuttel Airport">Hamburg-Fuhlsbuttel Airport</option>
									<option value="Hanover Lengenhagen Airport">Hanover Lengenhagen Airport</option>
									<option value="Kiel Port">Kiel Port</option>
									<option value="Leipzig Halle Airport">Leipzig Halle Airport</option>
									<option value="Munich Airport">Munich Airport</option>
									<option value="Nuremberg Airport">Nuremberg Airport</option>
								</optgroup>
								<optgroup label="Italy">
									<option value="Alghero Airport">Alghero Airport</option>
									<option value="Bari Airport">Bari Airport</option>
									<option value="Bari Port">Bari Port</option>
									<option value="Bergamo Airport">Bergamo Airport</option>
									<option value="Bologna Airport">Bologna Airport</option>
									<option value="Brindisi Airport">Brindisi Airport</option>
									<option value="Cagliari Airport">Cagliari Airport</option>
									<option value="Florence Airport">Florence Airport</option>
									<option value="Florence Train Station">Florence Train Station</option>
									<option value="Genoa Airport">Genoa Airport</option>
									<option value="Genoa Port">Genoa Port</option>
									<option value="Milan Central Train Station">Milan Central Train Station</option>
									<option value="Milan City Centre">Milan City Centre</option>
									<option value="Naples Airport">Naples Airport</option>
								</optgroup>
								<optgroup label="Spain">
									<option value="Alicante Airport">Alicante Airport</option>
									<option value="Almeria Airport">Almeria Airport</option>
									<option value="Barcelona Airport">Barcelona Airport</option>
									<option value="Granada Airport">Granada Airport</option>
									<option value="Jerez de la Frontera">Jerez de la Frontera</option>
									<option value="Leon Airport">Leon Airport</option>
									<option value="Madrid Atocha Train Station">Madrid Atocha Train Station</option>
									<option value="Madrid Barajas Airport">Madrid Barajas Airport</option>
									<option value="Pamplona Airport">Pamplona Airport</option>
									<option value="Santander Airport">Santander Airport</option>
									<option value="Seville Airport">Seville Airport</option>
									<option value="Valencia Airport">Valencia Airport</option>
									<option value="Zaragoza Airport">Zaragoza Airport</option>
								</optgroup>
								<optgroup label="United Kingdom">
									<option value="Belfast City Airport">Belfast City Airport</option>
									<option value="Belfast International Airport">Belfast International Airport</option>
									<option value="Bristol Airport">Bristol Airport</option>
									<option value="Cardiff Airport">Cardiff Airport</option>
									<option value="Edinburgh Airport">Edinburgh Airport</option>
									<option value="Glasgow International Airport">Glasgow International Airport</option>
									<option value="London City Airport">London City Airport</option>
									<option value="London Gatwick Airport">London Gatwick Airport</option>
									<option value="London Heathrow Airport">London Heathrow Airport</option>
									<option value="London Stansted Airport">London Stansted Airport</option>
									<option value="Manchester Airport">Manchester Airport</option>
									<option value="Southampton Airport">Southampton Airport</option>
								</optgroup>
							</select>
						</div>
						<div class="form-group select one-third">
							<label>Drop off location</label>
							<select>
								<option selected>&nbsp;</option>
								<optgroup label="Germany">
									<option value="Berlin Central Train Station">Berlin Central Train Station</option>
									<option value="Berlin Schonefeld Airport">Berlin Schonefeld Airport</option>
									<option value="Berlin Tegel Airport">Berlin Tegel Airport</option>
									<option value="Bremen Airport">Bremen Airport</option>
									<option value="Cologne Bonn Airport">Cologne Bonn Airport</option>
									<option value="Dortmund Airport">Dortmund Airport</option>
									<option value="Dresden Airport">Dresden Airport</option>
									<option value="Dusseldorf Airport">Dusseldorf Airport</option>
									<option value="Frankfurt Hahn Airport">Frankfurt Hahn Airport</option>
									<option value="Frankfurt International Airport">Frankfurt International Airport</option>
									<option value="Friedrichshafen Airport">Friedrichshafen Airport</option>
									<option value="Hamburg Finkenwerder Airport">Hamburg Finkenwerder Airport</option>
									<option value="Hamburg Port">Hamburg Port</option>
									<option value="Hamburg-Fuhlsbuttel Airport">Hamburg-Fuhlsbuttel Airport</option>
									<option value="Hanover Lengenhagen Airport">Hanover Lengenhagen Airport</option>
									<option value="Kiel Port">Kiel Port</option>
									<option value="Leipzig Halle Airport">Leipzig Halle Airport</option>
									<option value="Munich Airport">Munich Airport</option>
									<option value="Nuremberg Airport">Nuremberg Airport</option>
								</optgroup>
								<optgroup label="Italy">
									<option value="Alghero Airport">Alghero Airport</option>
									<option value="Bari Airport">Bari Airport</option>
									<option value="Bari Port">Bari Port</option>
									<option value="Bergamo Airport">Bergamo Airport</option>
									<option value="Bologna Airport">Bologna Airport</option>
									<option value="Brindisi Airport">Brindisi Airport</option>
									<option value="Cagliari Airport">Cagliari Airport</option>
									<option value="Florence Airport">Florence Airport</option>
									<option value="Florence Train Station">Florence Train Station</option>
									<option value="Genoa Airport">Genoa Airport</option>
									<option value="Genoa Port">Genoa Port</option>
									<option value="Milan Central Train Station">Milan Central Train Station</option>
									<option value="Milan City Centre">Milan City Centre</option>
									<option value="Naples Airport">Naples Airport</option>
								</optgroup>
								<optgroup label="Spain">
									<option value="Alicante Airport">Alicante Airport</option>
									<option value="Almeria Airport">Almeria Airport</option>
									<option value="Barcelona Airport">Barcelona Airport</option>
									<option value="Granada Airport">Granada Airport</option>
									<option value="Jerez de la Frontera">Jerez de la Frontera</option>
									<option value="Leon Airport">Leon Airport</option>
									<option value="Madrid Atocha Train Station">Madrid Atocha Train Station</option>
									<option value="Madrid Barajas Airport">Madrid Barajas Airport</option>
									<option value="Pamplona Airport">Pamplona Airport</option>
									<option value="Santander Airport">Santander Airport</option>
									<option value="Seville Airport">Seville Airport</option>
									<option value="Valencia Airport">Valencia Airport</option>
									<option value="Zaragoza Airport">Zaragoza Airport</option>
								</optgroup>
								<optgroup label="United Kingdom">
									<option value="Belfast City Airport">Belfast City Airport</option>
									<option value="Belfast International Airport">Belfast International Airport</option>
									<option value="Bristol Airport">Bristol Airport</option>
									<option value="Cardiff Airport">Cardiff Airport</option>
									<option value="Edinburgh Airport">Edinburgh Airport</option>
									<option value="Glasgow International Airport">Glasgow International Airport</option>
									<option value="London City Airport">London City Airport</option>
									<option value="London Gatwick Airport">London Gatwick Airport</option>
									<option value="London Heathrow Airport">London Heathrow Airport</option>
									<option value="London Stansted Airport">London Stansted Airport</option>
									<option value="Manchester Airport">Manchester Airport</option>
									<option value="Southampton Airport">Southampton Airport</option>
								</optgroup>
							</select>
						</div>
					</div>
					<!-- //Row -->
					
					<!-- Row -->
					<div class="f-row">
						<div class="form-group spinner">
							<label for="people">How many people <small>(including children)</small>?</label>
							<input type="number" id="people" min="1"  />
						</div>
						<div class="form-group radios">
							<div>
								<input type="radio" name="radio" id="return" value="return" />
								<label for="return">Return</label>
							</div>
							<div>
								<input type="radio" name="radio" id="oneway" value="oneway" checked />
								<label for="oneway">One way</label>
							</div>
						</div>
						<div class="form-group right">
							<button type="submit" class="btn large black">Find a transfer</button>
						</div>
					</div>
					<!--// Row -->
				</form>
			</div>
		</div>
		<!-- //Search -->
		
		<!-- Services iconic -->
		<div class="services iconic white">
			<div class="wrap">
				<div class="row">
					<!-- Item -->
					<div class="one-third wow fadeIn">
						<span class="circle"><span class="icon  icon-themeenergy_savings"></span></span>
						<h3>Fixed rates</h3>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy  tinc dolore magna.</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn" data-wow-delay=".2s">
						<span class="circle"><span class="icon icon-themeenergy_lockpad"></span></span>
						<h3>Reliable transfers</h3>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy  tinc dolore magna.</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn" data-wow-delay=".4s">
						<span class="circle"><span class="icon icon-themeenergy_open-wallet"></span></span>
						<h3>No booking fees</h3>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy  tinc dolore magna.</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn">
						<span class="circle"><span class="icon icon-themeenergy_heart"></span></span>
						<h3>Free cancellation</h3>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy  tinc dolore magna.</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn" data-wow-delay=".2s">
						<span class="circle"><span class="icon icon-themeenergy_magic-trick"></span></span>
						<h3>Booking flexibility</h3>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy  tinc dolore magna.</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn" data-wow-delay=".4s">
						<span class="circle"><span class="icon icon-themeenergy_call"></span></span>
						<h3>24h customer service</h3>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy  tinc dolore magna.</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn">
						<span class="circle"><span class="icon icon-themeenergy_cup"></span></span>
						<h3>Award winning service</h3>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy  tinc dolore magna.</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn" data-wow-delay=".2s">
						<span class="circle"><span class="icon icon-themeenergy_attach"></span></span>
						<h3>Benefits for partners</h3>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy  tinc dolore magna.</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-third wow fadeIn" data-wow-delay=".4s">
						<span class="circle"><span class="icon icon-themeenergy_stars"></span></span>
						<h3>Quality vehicles</h3>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy  tinc dolore magna.</p>
					</div>
					<!-- //Item -->
				</div>
			</div>
		</div>
		<!-- //Services iconic -->
		
		<!-- Call to action -->
		<div class="black cta">
			<div class="wrap">
				<p class="wow fadeInLeft">Like what you see? Are you ready to stand out? You know what to do.</p>
				<a href="http://themeforest.net/item/transfers-transport-and-car-hire-html-template/9366018?ref=themeenergy" class="btn huge color right wow fadeInRight">Purchase theme</a>
			</div>
		</div>
		<!-- //Call to action -->
		
		<!-- Services -->
		<div class="services boxed white" id="services">
			<!-- Item -->
			<article class="one-fourth wow fadeIn">
				<figure class="featured-image">
					<img src="images/uploads/img2.jpg" alt="" />
					<div class="overlay">
						<a href="services.html" class="expand">+</a>
					</div>
				</figure>
				<div class="details">
					<h4><a href="services.html">Private transfers</a></h4>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
					<a class="more" title="Read more" href="services.html">Read more</a>
				</div>
			</article>
			<!-- //Item -->
			
			<!-- Item -->
			<article class="one-fourth wow fadeIn" data-wow-delay=".2s">
				<figure class="featured-image">
					<img src="images/uploads/img2.jpg" alt="" />
					<div class="overlay">
						<a href="services.html" class="expand">+</a>
					</div>
				</figure>
				<div class="details">
					<h4><a href="services.html">Bus transfers</a></h4>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
					<a class="more" title="Read more" href="services.html">Read more</a>
				</div>
			</article>
			<!-- //Item -->
			
			<!-- Item -->
			<article class="one-fourth wow fadeIn" data-wow-delay=".4s">
				<figure class="featured-image">
					<img src="images/uploads/img2.jpg" alt="" />
					<div class="overlay">
						<a href="services.html" class="expand">+</a>
					</div>
				</figure>
				<div class="details">
					<h4><a href="services.html">Shuttle transfers</a></h4>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
					<a class="more" title="Read more" href="services.html">Read more</a>
				</div>
			</article>
			<!-- //Item -->
			
			<!-- Item -->
			<article class="one-fourth wow fadeIn" data-wow-delay=".6s">
				<figure class="featured-image">
					<img src="images/uploads/img2.jpg" alt="" />
					<div class="overlay">
						<a href="services.html" class="expand">+</a>
					</div>
				</figure>
				<div class="details">
					<h4><a href="services.html">Helicopter transfers</a></h4>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
					<a class="more" title="Read more" href="services.html">Read more</a>
				</div>
			</article>
			<!-- //Item -->			
		</div>
		<!-- //Services -->
		
		<!-- Testimonials -->
		<div class="testimonials center black">
			<div class="wrap">
				<h6 class="wow fadeInDown"><i class="fa fa-quote-left"></i>Wow, this theme is outstanding!</h6>
				<p class="wow fadeInUp">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
				<p class="meta wow fadeInUp">-John Doe, themeforest</p>
			</div>
		</div>
		<!-- //Testimonials -->
		
		<div class="partners white center">
			<div class="wrap">
				<h2 class="wow fadeIn">Our partners</h2>
				<div class="one-fifth wow fadeIn"><a href="#"><img src="images/uploads/logo1.jpg" alt="" /></a></div>
				<div class="one-fifth wow fadeIn" data-wow-delay=".2s"><a href="#"><img src="images/uploads/logo2.jpg" alt="" /></a></div>
				<div class="one-fifth wow fadeIn" data-wow-delay=".4s"><a href="#"><img src="images/uploads/logo3.jpg" alt="" /></a></div>
				<div class="one-fifth wow fadeIn" data-wow-delay=".6s"><a href="#"><img src="images/uploads/logo4.jpg" alt="" /></a></div>
				<div class="one-fifth" data-wow-delay=".8s"><a href="#"><img src="images/uploads/logo5.jpg" alt="" /></a></div>
			</div>
		</div>
		
		
		<!-- Call to action -->
		<div class="color cta">
			<div class="wrap">
				<p class="wow fadeInLeft">Like what you see? Are you ready to stand out? You know what to do.</p>
				<a href="http://themeforest.net/item/transfers-transport-and-car-hire-html-template/9366018?ref=themeenergy" class="btn huge black right wow fadeInRight">Purchase theme</a>
			</div>
		</div>
		<!-- //Call to action -->
	</main>
	<!-- //Main -->
	
@stop