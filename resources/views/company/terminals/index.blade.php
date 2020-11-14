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
                            <div class="row">
                                <div class="col-md-4">
                                    Terminals
                                </div>
                                <div class="col-md-8">
                                    <a href="{{ route("company.terminals.create") }}" class="btn btn-primary">New Terminal</a>
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
										<th>Geo</th>
										<th>Status</th>
										<th>Created On</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
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