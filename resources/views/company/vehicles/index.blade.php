@extends('web.layouts.app' , ['title' => "User Dashboard"])
@section('content')

	<!-- Main -->
	<main class="main auth_form" role="main">


		<div class="container">
			<div class="row mt-5">
				<div class="col-md-3">
					@include("company.fragments.sidebar" , ["activePage" => "terminal"])    
				</div>

				
				<div class=" col-md-9">
					<div class="container card">
						<div class="h3 mt-4 mb-2"><i></i></div>
						@include('web.includes.flash_message')
						<div class="">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <span class="fl h4">Terminals</span>
                                </div>
                                <div class="col-md-8">
                                    <a href="{{ route("company.terminals.create") }}" class="btn btn-primary btn-xs fr">New Terminal</a>
                                </div>
                            </div>
							<table class="table-responsive">
								<thead>
									<tr>
										<th>Name</th>
										<th>Code</th>
										<th>Email</th>
										<th>Phones</th>
										<th>Address</th>
										<th>L.G.A</th>
										<th>Status</th>
										<th>Created On</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($terminals as $terminal)
										<tr>
											<td>{{ $terminal->name }}</td>
											<td>{{ $terminal->code }}</td>
											<td>{{ $terminal->email ?? 'N/A' }}</td>
											<td>{{ $terminal->phones }}</td>
											<td>{{ $terminal->address }}</td>
											<td>{{ $terminal->lga_id }}</td>
											<td>{{ $terminal->getStatus() }}</td>
											<td>{{ $terminal->created_at }}</td>
											<td>
												<form action="{{ route("company.terminals.destroy" , $terminal->id) }}" method="post">@csrf() @method("delete")
													<a href="{{ route("company.terminals.edit" , $terminal->id) }}" class="btn btn-sm btn-info">Edit</a>
													<button class="btn btn-sm btn-danger">Delete</button>
												</form>
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
		
	
	</main>
	<!-- //Main -->
@endsection