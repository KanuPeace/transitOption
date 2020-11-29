@extends('web.layouts.app' , ['title' => "User Dashboard" , "activePage" => "vehicles" , "pageType" => "auth"])
@section('content')

<div class="">
	<form method="POST" action="{{ route("company.terminals.update" , $terminal->id) }}"> @csrf @method("put")
			<div class="form-row p-3">
				<div class="col-md-12 form-group">
					<div class="">
						<label for="password_confirmation">Terminal Name</label>
						<input class="form-control" type="text" name="name" value="{{ $terminal->name }}" required/>
					</div>
				</div>
				<div class="col-md-4 form-group">
					<div class="">
						<label for="name">Country</label>
						<select type="tel" class="video-form loadLocationOptions" url="{{ route('api.general.country.states') }}" data-target="#statesInput" name="country_id"  required>	
							<option value="" disabled selected> Select Country</option>
							@foreach ($countries as $country)
								<option value="{{ $country->id }}" {{ $terminal->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
							@endforeach
						</select>										
					</div>
				</div>
				<div class="col-md-4 form-group">
					<div class="">
						<label for="name">State</label>
						<select type="tel" class="video-form loadLocationOptions" url="{{ route('api.general.state.cities') }}" data-target="#citiesInput" id="statesInput" name="state_id"  required>
							<option value="" disabled selected> Select State</option>
							@foreach ($states as $state)
								<option value="{{ $state->id }}" {{ $terminal->state_id == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
							@endforeach
						</select>											
					</div>
				</div>

				<div class="col-md-4 form-group">
					<div class="">
						<label for="email">City</label>
						<select type="tel" class="video-form" id="citiesInput" name="city_id" >
							<option value="" disabled selected> Select City</option>
							@foreach ($cities as $city)
								<option value="{{ $city->id }}" {{ $terminal->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
							@endforeach
						</select>											
					</div>
				</div>

				<div class="col-md-4 form-group">
					<div class="">
						<label for="password_confirmation">L.G.A</label>
						<input class="form-control" type="text" name="lga_id" value="{{ $terminal->lga_id }}" required placeholder="Local government area"/>
					</div>
				</div>
				
				<div class="col-md-8 form-group">
					<div class="">
						<label for="password_confirmation">Full Address</label>
						<input class="form-control" type="text" name="address" value="{{ $terminal->address }}" required/>
					</div>
				</div>
			
				<div class="col-md-6 form-group">
					<div class="">
						<label for="password">Status</label>
						<select class="form-control" type="text" name="gender" required >
							<option value="" disabled selected >Select Status</option>
							<option value="{{ $activeStatus }}" {{ $terminal->status == $activeStatus ? 'selected' : '' }}>Active</option>
							<option value="{{ $inactiveStatus }}" {{ $terminal->status == $inactiveStatus ? 'selected' : '' }}>Inactive</option>
						</select>
					</div>
				</div>
				
				<div class="col-md-6 form-group">
					<div class="">
						<label for="password">Phone Number</label>
						<input class="form-control" type="tel" name="phones" placeholder="E.g 0700000000, 09000000000 , ....."  value="{{ $terminal->phones }}" required/>
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

@endsection