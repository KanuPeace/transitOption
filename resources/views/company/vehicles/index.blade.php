@extends("layouts.app" , ['title' => "User Dashboard" , "activePage" => "vehicles" , "pageType" => "auth"])
@section('content')

    @include("layouts.breadcrumb", ["title" => "Vehicles" ])

    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <h4 class="card-title"></h4>
                        <a href="{{ route('company.vehicles.factory.steps.one') }}" class="btn btn-primary btn-xs fr">New
                            Vehicle</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
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
                                            {{-- <form
                                                action="{{ route('company.vehicles.destroy', $vehicle->id) }}"
                                                method="post">@csrf()
                                                @method("delete") --}}
                                                <a href="{{ route('company.vehicles.images.index', $vehicle->id) }}"
                                                    class="btn btn-sm btn-info mb-2">Images</a>
                                                <a href="{{ route('company.vehicles.edit', $vehicle->id) }}"
                                                    class="btn btn-sm btn-info">Edit</a>
                                                {{-- <button
                                                    class="btn btn-sm btn-danger">Delete</button>
                                                --}}
                                                {{--
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
