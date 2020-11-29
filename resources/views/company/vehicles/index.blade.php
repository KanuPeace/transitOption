@extends('web.layouts.app' , ['title' => "User Dashboard" , "activePage" => "vehicles" , "pageType" => "auth"])
@section('content')

	<div class="">
		<div class="row mb-3">
			<div class="col-md-4">
				<span class="fl h4">Vehicles</span>
			</div>
			<div class="col-md-8">
				<a href="{{ route("company.vehicles.factory.steps.one") }}" class="btn btn-primary btn-xs fr">New Vehicle</a>
			</div>
		</div>
		<table class="table-responsive">
			<thead>
				<tr>
					<th>Name</th>
					<th>Code</th>
					<th>No. of Seats</th>
					<th>Type</th>
					<th>Color</th>
					<th>From</th>
					<th>To</th>
					<th>Status</th>
					<th>Created On</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($vehicles as $vehicle)
					<tr>
						<td>{{ $vehicle->name }}</td>
						<td>{{ $vehicle->code }}</td>
						<td>{{ $vehicle->no_of_seats }}</td>
						<td>{{ getVehicleTypes($vehicle->type) }}</td>
						<td>{{ getVehicleColors($vehicle->color) }}</td>
						<td>{{ $vehicle->route_from }}</td>
						<td>{{ $vehicle->route_to }}</td>
						<td>{{ $vehicle->getStatus() }}</td>
						<td>{{ $vehicle->created_at }}</td>
						<td>
							{{-- <form action="{{ route("company.vehicles.destroy" , $vehicle->id) }}" method="post">@csrf() @method("delete") --}}
								<a href="{{ route("company.vehicles.edit" , $vehicle->id) }}" class="btn btn-sm btn-info">Edit</a>
								<a href="{{ route("company.vehicles.edit" , $vehicle->id) }}" class="btn btn-sm btn-info">Edit</a>
								{{-- <button class="btn btn-sm btn-danger">Delete</button> --}}
							{{-- </form> --}}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
					
@endsection