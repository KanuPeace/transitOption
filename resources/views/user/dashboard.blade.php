@extends('web.layouts.app' , ['title' => "User Dashboard"])
@section('content')

	<!-- Main -->
	<main class="main auth_form" role="main">


		<div class="container">
			<div class="row mt-5">
				<div class="col-md-4">
					<div class="container card">
						<div class=" head-title mt-3 mb-4">
							<img src="{{ $logo_img }}" alt="Transfers" width="150"/>
						</div>
                            <a href="">
								<div class="card selected_reg p-3 m-3" >
									<div class="msg_area">
										Travel History
									</div>
								</div>
							</a>
							<div class="card p-3 m-3" >
                                <div class="msg_area">
                                    Payment Transactions
                                </div>
							</div>
							<div class="card p-3 m-3" >
                                <div class="msg_area">
                                    My Profile
                                </div>
                            </div>
					</div>
					
				</div>

				
				<div class=" col-md-8">
					<div class="container card">
						<div class="h3 mt-4 mb-2"><i></i></div>
						@include('web.includes.flash_message')
						<div class="">
							<table class="table-responsive">
								<thead>
									<tr>
										<th>Location</th>
										<th>Destination</th>
										<th>Terminal</th>
										<th>Service</th>
										<th>Payt Status</th>
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