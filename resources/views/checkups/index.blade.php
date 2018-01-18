@extends('layouts.master')

@section('content')

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">

						<a href="{{route('checkups.create')}}"><button class="btn btn-success btn-lg pull-right" style="margin-top: 22px;"><i class="fa fa-plus"></i></button></a>

				<h1>Checkups</h1>

			@if(App\Checkup::count() > 0)
				<!-- Column controlled child rows -->
					<div class="panel panel-flat col-md-12">
						
						<table class="table datatable-responsive-column-controlled ">
							<thead>
								<tr>
									<th>ID</th>
									<th>Patient</th>
									<th>Reference</th>
									<th>Doctor</th>
									<th>Age</th>
									<th>Gender</th>
									<th>Technition</th>
									<th>Tests</th>
									<th>Result</th>
									<th></th>									
								</tr>
							</thead>
							<tbody>
						
						@foreach($checkups as $checkup)
								<tr class="tr">
								  
									<td>{{ $checkup->id }}</td>
									<td>{{ ! is_null($p = App\Checkup::find($checkup->id)->patient) ? $p->name : "No Patient" }}</td>
									<td>{{ ! is_null($p->patienttype) ? $p->patienttype->name : "No Patient Type" }}</td>
									<td>{{ ! is_null($doctor = App\Checkup::find($checkup->id)->doctor) ? $doctor->name : "No Doctor" }}</td>
									<td>{{ ! is_null($p) ? $p->age : "No Age" }}</td>
									<td>{{ ! is_null($p) ? ( $p->gender == 1 ? "Male" : "Female" ) : "No Gender" }}</td>

									<td>{{ ! is_null($t = App\Checkup::find($checkup->id)->technition) ? $t->name : "No Technition" }}</td>
										<?php $i=0; ?>
									<td>
											@if(! is_null($tests = App\Checkup::find($checkup->id)->tests))
												@foreach($tests as $test)
													{{ $test->name }}
														@if(! ($i == count($tests) - 1))
															{{ "," }}	
														@endif
														<?php $i++; ?>												
												@endforeach
											@else
												{{"No Test"}}
											@endif
									</td>

									<td> {{ $checkup->result }} </td>

									
									<td style="width:145px;padding:0px;"><a href="/laboratory/checkups/{{ $checkup->id }}">
										
											<button class="btn btn-default" id="btnView" >View Record</button>
												
										</a>

										<a href="/laboratory/checkups/{{ $checkup->id }}/edit">
										
											<button class="btn btn-primary" id="btnEdit" ><i class="fa fa-edit"></i></button>
										</a>		
										
										
										

										
									</td>

									<td style="text-align: left;padding:0px;">
										{!! Form::open(['route' => ['checkups.destroy', $checkup->id], 'method' => 'DELETE']) !!}
										
										{{Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'])}}

										{!! Form::close() !!}
									</td>
									

								</tr>

							@endforeach
								
							</tbody>
						</table>

						

					</div>
					<!-- /column controlled child rows -->
					<div class="text-center">
						{{ $checkups->links() }}
					</div>
				@endif


					@include('partials.alerts')



								


				</div>
			</div>
		</div>
	</div>

	

@endsection

