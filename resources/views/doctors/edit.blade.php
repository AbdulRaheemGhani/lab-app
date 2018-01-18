@extends('layouts.master')

@section('content')

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">


				<h1>Doctor</h1>
					

				
						

					<div class="row"> 

						

						{!! Form::model($doctor, ['method' => 'PUT', 'route' => ['doctors.update', $doctor->id]]) !!}
						

						<div class="col-md-8"> 
							<!-- Column controlled child rows -->
							<div class="panel panel-flat">
								
								<table class="table datatable-responsive-column-controlled ">
									<thead>
										<tr>
											
											<th>Name</th>
											<th>Percentage</th>
										</tr>
									</thead>
									<tbody>

										<tr class="tr">
										  
											
											<td>{{ Form::text('name', null, ['class' => 'form-control']) }}</td>
											<td>{{ Form::text('percentage', null, ['class' => 'form-control']) }}</td>
										</tr>

									</tbody>
								</table>
							</div>
							<!-- /column controlled child rows -->
						</div>

						<div class="col-md-4">
							<div class="well">
								<dl class="dl-horizontal">
									<dt>Created At:</dt>
									<dd>{{\Carbon\Carbon::parse($doctor->created_at)->diffForHumans()}}</dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>Last Updated:</dt>
									<dd>{{\Carbon\Carbon::parse($doctor->updated_at)->diffForHumans()}}</dd>
								</dl>

								<div class="row">
									<div class="col-sm-6">
									<a href={{ route('doctors.show', $doctor->id) }} class = "btn btn-danger btn-block">
										<i class="fa fa-times"> Cancel</i>
										
									</a>
										
									
									</div>
									<div class="col-sm-6">
									{{Form::button('<i class="fa fa-save"> Save</i>', ['type' => 'submit', 'class' => 'btn btn-success btn-block'])}}
										
									</div>	
								</div>

							</div>
						</div>

						{!! Form::close() !!}

					</div>
						
					

						





								


				</div>
			</div>
		</div>
	</div>



@endsection
