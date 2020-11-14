@extends('web.layouts.app' , ['title' => "Complete Profile"])
@section('content')

	<!-- Main -->
	<main class="main auth_form" role="main">


		<div class="container">
			<div class="row mt-5">
				<div class="col-md-4">
					<div class="container card">
						<div class=" head-title mt-3 mb-4"><i>Getting Started</i></div>
                            @foreach ($statuses as $status)
                            <div class="card {{ $status["key"] == $currentStatus["key"] ? 'selected_reg' : '' }} p-3 m-3" >
                                <div class="msg_area">
                                    {{ $status["title"] }}
                                </div>
                            </div>
                        @endforeach
					</div>
					
				</div>

				
				<div class=" col-md-8">
					<div class="container card">
						<div class="h3 mt-4 mb-2"><i> {{ $currentStatus["title"] }} Information</i></div>
						@include('web.includes.flash_message')
						@if ($currentStatus["key"] == "complete_profile")
							<!--Complete Profile-->
							<div class="">
								<form method="POST" action="{{ route("user.profile.complete") }}"> @csrf
									<input type="hidden" name="status_key" id="" required value="{{ $currentStatus["key"] }}">
										<div class="form-row p-3">
											<div class="col-md-4 form-group">
												<div class="">
													<label for="name">Country of Residence</label>
													<select type="tel" class="video-form loadLocationOptions" url="{{ route('api.general.country.states') }}" data-target="#statesInput" name="country_id"  required>	
														<option value="" disabled selected> Select Country</option>
														@foreach ($countries as $country)
															<option value="{{ $country->id }}" {{ $user->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
														@endforeach
													</select>										
												</div>
											</div>
											<div class="col-md-4 form-group">
												<div class="">
													<label for="name">State of Residence</label>
													<select type="tel" class="video-form loadLocationOptions" url="{{ route('api.general.state.cities') }}" data-target="#citiesInput" id="statesInput" name="state_id"  required>
														<option value="" disabled selected> Select State</option>
														@foreach ($states as $state)
															<option value="{{ $state->id }}" {{ $user->state_id == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
														@endforeach
													</select>											
												</div>
											</div>
		
											<div class="col-md-4 form-group">
												<div class="">
													<label for="email">City of Residence</label>
													<select type="tel" class="video-form" id="citiesInput" name="city_id" >
														<option value="" disabled selected> Select City</option>
														@foreach ($cities as $city)
															<option value="{{ $city->id }}" {{ $user->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
														@endforeach
													</select>											
												</div>
											</div>
											
											<div class="col-md-12 form-group">
												<div class="">
													<label for="password_confirmation">Address</label>
													<input class="form-control" type="text" name="address" value="{{ $user->address }}" required/>
												</div>
											</div>
										
											<div class="col-md-6 form-group">
												<div class="">
													<label for="password">Gender</label>
													<select class="form-control" type="text" name="gender" required >
														<option value="" disabled selected >Select Gender</option>
														<option value="Male" {{ $user->gender == "Male" ? 'selected' : '' }}>Male</option>
														<option value="Female" {{ $user->gender == "Female" ? 'selected' : '' }}>Female</option>
													</select>
												</div>
											</div>
											
											<div class="col-md-6 form-group">
												<div class="">
													<label for="password">Phone Number</label>
													<input class="form-control" type="tel" name="phone"  value="{{ $user->phone }}" required/>
												</div>
											</div>
		
										</div>
										
										<div class="col-md-12 form-group" >
											<div class="mt-2 mb-3">
												<input type="submit" value="Next" class="btn color medium full" />
											</div>
										</div>
										
								</form>
							</div>
							<!--//Complete Profile-->
						@elseif($currentStatus["key"] == "next_kin")
						<!--Next of Kin-->
						<div class="">
							<form method="POST" action="{{ route("user.profile.next_of_kin") }}"> @csrf
								<input type="hidden" name="status_key" id="" required value="{{ $currentStatus["key"] }}">
									<div class="form-row p-3">

										<div class="col-md-12 form-group">
											<div class="">
												<label for="password_confirmation">Full Name</label>
												<input class="form-control" type="text" name="name" value="{{ optional($user->kin)->name }}" required/>
											</div>
										</div>

										<div class="col-md-4 form-group">
											<div class="">
												<label for="password">Email Address</label>
												<input class="form-control" type="tel" name="email"  value="{{ optional($user->kin)->email }}" />
											</div>
										</div>

									
										<div class="col-md-4 form-group">
											<div class="">
												<label for="password">Phone Number</label>
												<input class="form-control" type="tel" name="phone"  value="{{ optional($user->kin)->phone }}" required/>
											</div>
										</div>
									
										<div class="col-md-4 form-group">
											<div class="">
												<label for="password">Gender</label>
												<select class="form-control" type="text" name="gender" required >
													<option value="" disabled selected >Select Gender</option>
													<option value="Male" {{ optional($user->kin)->gender == "Male" ? 'selected' : '' }}>Male</option>
													<option value="Female" {{ optional($user->kin)->gender == "Female" ? 'selected' : '' }}>Female</option>
												</select>
											</div>
										</div>

										<div class="col-md-12 form-group">
											<div class="">
												<label for="password_confirmation">Address</label>
												<input class="form-control" type="text" name="address" value="{{ optional($user->kin)->address }}" required/>
											</div>
										</div>


									</div>
									
									<div class="col-md-12 form-group" >
										<div class="mt-2 mb-3">
											<input type="submit" value="Next" class="btn color medium full" />
										</div>
									</div>
									
							</form>
						</div>
						<!--/Next of kin-->
						@elseif($currentStatus["key"] == "company_profile")
						<!--Next of Kin-->
						<div class="">
							<form method="POST" action="{{ route("user.profile.company_profile") }}"> @csrf
								<input type="hidden" name="status_key" id="" required value="{{ $currentStatus["key"] }}">
									<div class="form-row p-3">

										<div class="col-md-7 form-group">
											<div class="">
												<label for="password_confirmation">Company Name</label>
												<input class="form-control" type="text" name="name" placeholder="Company or firm name" value="{{ optional($user->company)->name }}" required/>
											</div>
										</div>

										<div class="col-md-5 form-group">
											<div class="">
												<label for="password">CAC Number</label>
												<input class="form-control" type="tel" name="text" placeholder="Company registration no"  value="{{ optional($user->company)->reg_no }}" />
											</div>
										</div>

										<div class="col-md-4 form-group">
											<div class="">
												<label for="password">Email Address</label>
												<input class="form-control" type="tel" name="email"  value="{{ optional($user->company)->email }}" />
											</div>
										</div>

									
										<div class="col-md-4 form-group">
											<div class="">
												<label for="password">Phone Number</label>
												<input class="form-control" type="tel" name="phone"  value="{{ optional($user->company)->phone }}" required/>
											</div>
										</div>
									
										<div class="col-md-4 form-group">
											<div class="">
												<label for="password">Company Logo</label>
												<input class="form-control" type="file" name="logo"  >
											</div>
										</div>

										<div class="col-md-12 form-group">
											<div class="">
												<label for="password_confirmation">Address</label>
												<input class="form-control" type="text" name="address" value="{{ optional($user->company)->address }}" required/>
											</div>
										</div>


									</div>
									
									<div class="col-md-12 form-group" >
										<div class="mt-2 mb-3">
											<input type="submit" value="Next" class="btn color medium full" />
										</div>
									</div>
									
							</form>
						</div>
						<!--/Next of kin-->
						@endif
					</div>
				</div>
			</div>
		</div>
		
	
	</main>
	<!-- //Main -->
@endsection