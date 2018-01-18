@extends('layouts.master')

@section('content')

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">

						
				<a href="{{route('checkups.index')}}"><button class="btn btn-success pull-right" style="width:100px;margin-top:22px;"><i class="fa fa-arrow-circle-left"></i></button></a>
				<h1>Checkup</h1>

				

					<div class="row"> 
					
						<div class="col-md-8"> 
							<!-- Column controlled child rows -->
							<div class="panel panel-flat">
								
								<table class="table datatable-responsive-column-controlled ">
									<thead>
										<tr>
											
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

										<tr class="tr">
										  
											
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
										</tr>

									</tbody>
								</table>

							</div>
							<!-- /column controlled child rows -->
						</div>
						

						<div class="col-md-4">
							<div class="well">
								<dl class="dl-horizontal">
									<dt>Created:</dt>
									<dd>{{\Carbon\Carbon::parse($checkup->created_at)->diffForHumans()}}</dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>Last Updated:</dt>
									<dd>{{ \Carbon\Carbon::parse($checkup->updated_at)->diffForHumans() }}</dd>
								</dl>
										<hr>
								<div class="row">
									<div class="col-sm-6">
									<a href={{ route('checkups.edit', $checkup->id) }} class = "btn btn-primary btn-block">
										<i class="fa fa-edit"></i>
									</a>
										
									
									</div>
									<div class="col-sm-6">
									{!! Form::open(['route' => ['checkups.destroy', $checkup->id], 'method' => 'DELETE']) !!}
										
									{{Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-block'])}}

									{!! Form::close() !!}
									</div>	
								</div>

							</div>
						</div>

					</div>




								


				</div>
			</div>
		</div>
	</div>



@endsection
