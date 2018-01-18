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

						

						{!! Form::model($test, ['method' => 'PUT', 'route' => ['testings.update', $test->id]]) !!}
						

						<div class="col-md-8"> 
							<!-- Column controlled child rows -->
							<div class="panel panel-flat">
								
								<table class="table datatable-responsive-column-controlled ">
									<thead>
										<tr>
											
											<th>Name</th>
											<th>Normal</th>
											<th>Remarks</th>
											<th>Category</th>
										</tr>
									</thead>
									<tbody>

										<tr class="tr">
										  
											
											<td>{{ Form::text('name', null, ['class' => 'form-control']) }}</td>
											<td>{{ Form::text('normal', null, ['class' => 'form-control']) }}</td>
											<td>{{ Form::text('remarks', null, ['class' => 'form-control']) }}</td>
											<td>
												
												
														<select name="testcat_id" class="select" >
															<option value="@if(! is_null(App\Test::find($test->id)->testcat)) {{App\Test::find($test->id)->testcat->id}} @endif" selected>
																@if(! is_null( App\Test::find($test->id)->testcat)) {{App\Test::find($test->id)->testcat->name}} @endif
															</option>
															@foreach(App\Testcat::all() as $cat)
																<option value="{{$cat->id}}">{{$cat->name}}</option>
															@endforeach
														</select>	
												
											</td>
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
									<dd>{{\Carbon\Carbon::parse($test->created_at)->diffForHumans()}}</dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>Last Updated:</dt>
									<dd>{{\Carbon\Carbon::parse($test->updated_at)->diffForHumans()}}</dd>
								</dl>

								<div class="row">
									<div class="col-sm-6">
									<a href={{ route('testings.show', $test->id) }} class = "btn btn-danger btn-block">
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
