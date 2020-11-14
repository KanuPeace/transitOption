@extends('web.layouts.app' , ['title' => "User Dashboard"])
@section('content')

	<!-- Main -->
	<main class="main auth_form" role="main">


		<div class="container">
			<div class="row mt-5">
				<div class="col-md-3">
					@include("company.fragments.sidebar")
				</div>

				
				<div class=" col-md-9">
					<div class="container card">
						<div class="h3 mt-4 mb-2"><i></i></div>
						@include('web.includes.flash_message')
						<div class="">
							<table class="table-responsive">
								<thead>
									<tr>
										<th>Name</th>
										<th>Trv Date</th>
										<th>Trv From</th>
										<th>Destination</th>
										<th>Terminal</th>
										<th>Code</th>
										<th>Status</th>
										<th>Extra</th>
										<th>Date</th>
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