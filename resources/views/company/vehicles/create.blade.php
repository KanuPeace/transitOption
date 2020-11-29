@extends('web.layouts.app' , ['title' => "User Dashboard" , "activePage" => "vehicles" , "pageType" => "auth"])
@section('content')

<div class="">
	@if ($step == 0)
		<form method="POST" action="{{ route("company.vehicles.factory.steps.one") }}"> @csrf
			<input type="hidden" name="step" value="1" required>
			<input type="hidden" name="id" value="{{ $vehicle->id }}" required>
			<input type="hidden" name="data" value="{{ $requestData }}" required>
			<div class="form-row p-3">
				<div class="col-md-12 form-group">
					<div class="">
						<label for="password_confirmation">Vehicle Name</label>
						<input class="form-control" type="text" name="name" value="{{ $requestData["name"] ?? $vehicle->name }}" required/>
					</div>
				</div>
				

				<div class="col-md-3 form-group">
					<div class="">
						<label for="password_confirmation">Color</label>
						<select class="form-control" type="text" name="color" required >
							<option value="" disabled selected>Select Color</option>
							@foreach (getVehicleColors() as $key => $value)
								<option value="{{ $key }}" {{ $vehicle->color == $key  ? "selected" : "" }}> {{ $value }}</option>
							@endforeach
						</select>
					</div>
				</div>
				
				<div class="col-md-3 form-group">
					<div class="">
						<label for="password_confirmation">Condition</label>
						<select class="form-control" type="text" name="condition" required >
							<option value="" disabled selected>Select Type</option>
							@foreach (getVehicleConditions() as $key => $value)
								<option value="{{ $key }}" {{ $vehicle->condition == $key  ? "selected" : "" }}> {{ $value }}</option>
							@endforeach
						</select>					
					</div>
				</div>

				<div class="col-md-3 form-group">
					<div class="">
						<label for="password_confirmation">Type</label>
						<select class="form-control" type="text" name="type" required >
							<option value="" disabled selected>Select Type</option>
							@foreach (getVehicleTypes() as $key => $value)
								<option value="{{ $key }}" {{ $vehicle->type == $key  ? "selected" : "" }}> {{ $value }}</option>
							@endforeach
						</select>					
					</div>
				</div>

				<div class="col-md-3 form-group">
					<div class="">
						<label for="password_confirmation">Cost Price</label>
						<input class="form-control" type="number" name="price" value="{{ $requestData["price"] ?? $vehicle->price }}" required/>
					</div>
				</div>

				<div class="col-md-7 form-group">
					<div class="">
						<label for="password_confirmation">Terminal</label>
						<select class="form-control" type="text" name="terminal_id" required >
							<option value="" disabled selected>Select Terminal</option>
							@foreach ($terminals as $terminal)
								<option value="{{ $terminal->id }}" {{ $vehicle->terminal_id == $terminal->id  ? "selected" : "" }}> {{ $terminal->name }} </option>
							@endforeach
						</select>					
					</div>
				</div>

				<div class="col-md-5 form-group">
					<div class="">
						<label for="">Plate Number</label>
						<input class="form-control" type="text" name="plate_no" placeholder=""  value="{{ $vehicle->plate_no }}" required/>
					</div>
				</div>


				<div class="col-md-6 form-group">
					<div class="">
						<label for="">Route From</label>
						<input class="form-control" type="text" name="route_from" placeholder="Beginning of journey. e.g Lagos"  value="{{ $vehicle->route_from }}" required/>
					</div>
				</div>
				<div class="col-md-6 form-group">
					<div class="">
						<label for="">Route To</label>
						<input class="form-control" type="text" name="route_to" placeholder="End of journey. e.g Abuja"  value="{{ $vehicle->route_to }}" required/>
					</div>
				</div>

				
				<div class="col-md-7 form-group">
					<div class="">
						<label for="">Driver`s Name</label>
						<input class="form-control" type="text" name="driver_name" placeholder=""  value="{{ $vehicle->driver_name }}" required/>
					</div>
				</div>


				<div class="col-md-5 form-group">
					<div class="">
						<label for="password">Driver`s Phone Numbers</label>
						<input class="form-control" type="tel" name="driver_phones" placeholder="E.g 0700000000, 09000000000 , ....."  value="{{ $vehicle->driver_phones }}" required/>
					</div>
				</div>

				<div class="col-md-12 form-group">
					<div class="">
						<label for="">Vehicle Description</label>
						<textarea rows="3" class="form-control" type="text" name="description" placeholder=""   required>{{ $vehicle->driver_name }}</textarea>
					</div>
				</div>

				<div class="col-md-4 form-group">
					<div class="">
						<label for="password">Would Transload?</label>
						<select class="form-control" type="text" name="is_transload" required >
							<option value="" disabled selected >Select Status</option>
							<option value="1" {{ $vehicle->status == 1 ? 'selected' : '' }}>Yes</option>
							<option value="0" {{ $vehicle->status == 0 ? 'selected' : '' }}>No</option>
						</select>
					</div>
				</div>
				
				
			
				<div class="col-md-4 form-group">
					<div class="">
						<label for="password">Has A/C?</label>
						<select class="form-control" type="text" name="has_ac" required >
							<option value="" disabled selected >Select Status</option>
							<option value="1" {{ $vehicle->status == 1 ? 'selected' : '' }}>Yes</option>
							<option value="0" {{ $vehicle->status == 0 ? 'sel"ected' : '' }}>No</option>
						</select>
					</div>
				</div>
				

				

				<div class="col-md-4 form-group">
					<div class="">
						<label for="password">Status</label>
						<select class="form-control" type="text" name="status" required >
							<option value="" disabled selected >Select Status</option>
							<option value="{{ $activeStatus }}" {{ $vehicle->status == $activeStatus ? 'selected' : '' }}>Active</option>
							<option value="{{ $inactiveStatus }}" {{ $vehicle->status == $inactiveStatus ? 'selected' : '' }}>Inactive</option>
						</select>
					</div>
				</div>
				
				
			</div>
			
			<div class="col-md-12 form-group" >
				<div class="mt-2 mb-3">
					<input type="submit" value="Next" class="btn color medium full" />
				</div>
			</div>
			
		</form>
	@else

		<form method="POST" id="step_2_form" action="{{ empty($vehicle->id) ? route("company.vehicles.store") : route("company.vehicles.update" , $vehicle->id) }}" >
			@method(empty($vehicle->id) ? "post" : "put") @csrf
			<input type="hidden" name="step" value="{{ $step }}" required>
			<input type="hidden" name="data" value="{{ $requestData }}" required>
			<input type="hidden" name="empty_seats" value="{{ optional($vehicle->seatStyle)->empty_seats }}" id="emptySeatsInput">
			<h3>Vehicle Seats Style</h3>
			<div class="row">
				<div class="col-md-6 form-group">
					<div class="">
						<label for="password">Width of Seats</label>
						<select class="form-control" type="text" name="width" id="seat_width" required>
							@for($i = 3; $i < 6;$i++)
								<option value="{{ $i }}" {{ optional($vehicle->seatStyle)->width == $i  ? "selected" : "" }}>{{ $i }} Seats</option>
							@endfor
						</select>
					</div>
				</div>
				<div class="col-md-6 form-group">
					<div class="">
						<label for="password">Length of Seats</label>
						<select class="form-control" type="text" name="length" id="seat_length" required>
							@for($i = 2; $i < 11;$i++)
								<option value="{{ $i }}" {{ optional($vehicle->seatStyle)->length == $i  ? "selected" : "" }}>{{ $i }} Seats</option>
							@endfor
						</select>
					</div>
				</div>
			</div>
			<div class="row m-1" id="seatList"></div>
			<div class="" >
				<div class="m-1 mt-2 mb-3">
					<input type="submit" value="Done" class="btn color medium full" onclick=" return $('#step_2_form').trigger('submit'); "/>
				</div>
			</div>
		</form>
	@endif
</div>

@endsection

@section('script')
<script>
	let globalSeats = [];
	let emptySeats = [$("#emptySeatsInput").val()];
	$(document).ready(function(){
		generateSeats();
		$(".seat_item").each( function(){
			let seat = $(this);
			for(let i = 0;i < emptySeats.length; i++){
				if(emptySeats[i] == seat.attr("id")){
					$(this).find(".label").addClass("d-none");
					$(this).find(".blank").removeClass("d-none");
				}
			}
		});
	});
	
	$("#seat_width, #seat_length").on("change" , function(){
		generateSeats();
	});


	function generateSeats(){
		let width = parseInt($("#seat_width").val());
		let length = parseInt($("#seat_length").val());
		let seats = [];
		seats[1] = "Driver";
		let count = width * length;
		for(let i = 1; i < count; i++){
			seats.push("Seat");
		}
		globalSeats = seats;
		generateSeatsHtml();
	}

	function generateSeatsHtml(){
		let width = parseInt($("#seat_width").val());
		let length = parseInt($("#seat_length").val());
		let seatsList = $("#seatList");
		seatsList.empty()
		for(let i = 1; i < globalSeats.length; i++){
			seatsList.append(
				'<div class="seat_item" id="'+ i +'" style="width: '+ (100 / width) +'%">'+
					'<div class="card m-1 pt-2 pb-2  mb-3">'+
						'<i class="fa fa-user"></i>'+
						 '<span class="label">'+ globalSeats[i] +'</span>'+
						 '<span class="blank d-none">Blank</span>'+
					'</div>'+
				'</div>'
			);
		}
	}

	$(document).on("click",".seat_item" , function(){
		$(this).toggleClass("empty_seat");
		markSeatAsEmpty($(this).attr("id"));
	});


	function markSeatAsEmpty(index){
		emptySeats = [];
		$(".seat_item").each( function(){
			if($(this).hasClass("empty_seat")){
				$(this).find(".label").addClass("d-none");
				$(this).find(".blank").removeClass("d-none");
				emptySeats.push($(this).attr("id"));
			}
			else{
				$(this).find(".blank").addClass("d-none");
				$(this).find(".label").removeClass("d-none");
			}
		});
		$("#emptySeatsInput").val(emptySeats);
	}
</script>
@endsection