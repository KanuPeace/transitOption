@extends('web.layouts.app' , ['title' => "User Dashboard" , "activePage" => "vehicles" , "pageType" => "auth"])
@section('content')

	<div class="">
		<div class="row mb-3">
			<div class="col-md-8">
				<span class="fl h4">{{ $vehicle->name }} #{{ $vehicle->code }} Images</span>
			</div>
			<div class="col-md-4">
				<a href="" data-toggle="modal" data-target="#newImageModal" class="btn btn-primary btn-xs fr">New Image</a>
			</div>
		</div>

		<div class="row">
			@foreach ($images as $image)
				<div class="col-md-4">
					<div class="form-row mb-2">
						<div class="col-12 mb-2">
							<img src="{{ $image->getImage() }}" alt="Image" title="Click to VIew Image">
						</div>
						
						<div class="col-6">
							<button class="btn btn-primary btn-sm btn-block mb-2" data-toggle="modal" data-target="#editImageModal_{{ $image->id }}">Edit</button>
						</div>
						<div class="col-6">
							<button class="btn btn-danger btn-sm btn-block mb-2">Delete</button>
						</div>
					</div>
				</div>
				<div class="modal fade" id="editImageModal_{{ $image->id }}" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="defaultModalLabel">Edit Vehicle Image</h4>
							</div>
								<form action="{{ route("company.vehicles.images.update" , $image->id) }}" method="post" enctype="multipart/form-data">@csrf @method("put")
									<div class="modal-body">
										<label for="">Select Image</label>
										<input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}" id="" required>
										<input type="file" name="image" class="form-control" id="" required>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
										<button type="submit" class="btn btn-success">Proceed</button>
									</div>
							</form>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		
	</div>


	<div class="modal fade" id="newImageModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="defaultModalLabel">New Vehicle Image</h4>
				</div>
					<form action="{{ route("company.vehicles.images.store") }}" method="post" enctype="multipart/form-data">@csrf
						<div class="modal-body">
							<label for="">Select Image</label>
							<input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}" id="" required>
							<input type="file" name="image" class="form-control" id="" required>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
							<button type="submit" class="btn btn-success">Proceed</button>
						</div>
				</form>
			</div>
		</div>
	</div>

					
@endsection