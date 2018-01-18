@extends('layouts.master')

@section('content')

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">

						<a href="{{route('cats.create')}}"><button class="btn btn-success btn-lg pull-right" style="margin-top: 22px;"><i class="fa fa-plus"></i></button></a>

				<h1>Test Categories</h1>

			@if(App\Testcat::count() > 0)
				<!-- Column controlled child rows -->
					<div class="panel panel-flat">
						
						<table class="table datatable-responsive-column-controlled ">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Created</th>
									<th></th>
									
								</tr>
							</thead>
							<tbody>

						@foreach($cats as $cat)
								<tr class="tr">
								  
									<td>{{ $cat->id }}</td>
									<td>{{$cat->name}}</td>
									<td>{{ \Carbon\Carbon::parse($cat->created_at)->diffForHumans() }}</td>
									<td style="width:145px;padding:0px;"><a href="/laboratory/cats/{{ $cat->id }}">
										
											<button class="btn btn-default" id="btnView" >View Record</button>
												
										</a>

										<a href="/laboratory/cats/{{ $cat->id }}/edit">
										
											<button class="btn btn-primary" id="btnEdit" ><i class="fa fa-edit"></i></button>
										</a>
									</td>

									<td style="text-align: left;padding:0px;">
										{!! Form::open(['route' => ['cats.destroy', $cat->id], 'method' => 'DELETE']) !!}
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
						{{ $cats->links() }}
					</div>
				@endif


					@include('partials.alerts')



								


				</div>
			</div>
		</div>
	</div>

	

@endsection

