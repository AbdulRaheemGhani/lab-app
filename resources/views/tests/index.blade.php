@extends('layouts.master')

@section('content')

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">

						<a href="{{route('testings.create')}}"><button class="btn btn-success btn-lg pull-right" style="margin-top: 22px;"><i class="fa fa-plus"></i></button></a>

				<h1>Tests</h1>

			@if(App\Test::count() > 0)
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
									<th></th>								
								</tr>
							</thead>

							<tbody>
							@foreach($tests as $test)
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
									
									<td style="width:145px;padding:0px;"><a href="/laboratory/testings/{{ $test->id }}">
										
											<button class="btn btn-default" id="btnView" >View Record</button>
												
										</a>

										<a href="/laboratory/testings/{{ $test->id }}/edit">
										
											<button class="btn btn-primary" id="btnEdit" ><i class="fa fa-edit"></i></button>
										</a>	
										
										
										

										
									</td>

									<td style="text-align: left;padding:0px;">
										{!! Form::open(['route' => ['testings.destroy', $test->id], 'method' => 'DELETE']) !!}
										
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
						{{ $tests->links() }}
					</div>
				@endif


					@include('partials.alerts')



								


				</div>
			</div>
		</div>
	</div>

	

@endsection

