@extends('layouts.master')

@section('content')

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">

						
				<a href="{{route('testings.index')}}"><button class="btn btn-success pull-right" style="width:100px;margin-top:22px;"><i class="fa fa-arrow-circle-left"></i></button></a>
				<h1>Test</h1>

				

					<div class="row"> 
					
						<div class="col-md-8"> 
							<!-- Column controlled child rows -->
							<div class="panel panel-flat">
								
								<table class="table datatable-responsive-column-controlled ">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Normal</th>
											<th>Remarks</th>
											<th>Category</th>
										</tr>
									</thead>
									<tbody>

										<tr class="tr">
										  
											<td>{{ $test->id }}</td>
											<td>{{ $test->name }}</td>
											<td>{{ $test->normal }}</td>
											<td>{{ $test->remarks }}</td>
											<td>
											@if(! is_null(App\Test::find($test->id)->testcat))
												{{ App\Test::find($test->id)->testcat->name }}
											@else
												{{"No Category"}}
											@endif
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
									<dt>Created:</dt>
									<dd>{{\Carbon\Carbon::parse($test->created_at)->diffForHumans()}}</dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>Last Updated:</dt>
									<dd>{{ \Carbon\Carbon::parse($test->updated_at)->diffForHumans() }}</dd>
								</dl>
										<hr>
								<div class="row">
									<div class="col-sm-6">
									<a href={{ route('testings.edit', $test->id) }} class = "btn btn-primary btn-block">
										<i class="fa fa-edit"></i>
									</a>
										
									
									</div>
									<div class="col-sm-6">
									{!! Form::open(['route' => ['testings.destroy', $test->id], 'method' => 'DELETE']) !!}
										
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
