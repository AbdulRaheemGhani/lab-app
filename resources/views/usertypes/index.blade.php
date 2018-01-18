@extends('layouts.master')

@section('content')

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">

						<a href="{{route('usertypes.create')}}"><button class="btn btn-success btn-lg pull-right" style="margin-top: 22px;"><i class="fa fa-plus"></i></button></a>

				<h1>User Types</h1>

			@if(App\Usertype::count() > 0)
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

						@foreach($usertypes as $usertype)
								<tr class="tr">
								  
									<td>{{ $usertype->id }}</td>
									<td>{{$usertype->name}}</td>
									<td>{{\Carbon\Carbon::parse($usertype->created_at)->diffForHumans()}}</td>
									<td style="width:145px;padding:0px;"><a href="/laboratory/usertypes/{{ $usertype->id }}">
										
											<button class="btn btn-default" id="btnView" >View Record</button>
												
										</a>

										<a href="/laboratory/usertypes/{{ $usertype->id }}/edit">
										
											<button class="btn btn-primary" id="btnEdit" ><i class="fa fa-edit"></i></button>
										</a>
										
										
										

										
									</td>

									<td style="text-align: left;padding:0px;">
										{!! Form::open(['route' => ['usertypes.destroy', $usertype->id], 'method' => 'DELETE']) !!}
										
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
						{{ $usertypes->links() }}
					</div>
				@endif


					@include('partials.alerts')



								


				</div>
			</div>
		</div>
	</div>

	

@endsection

