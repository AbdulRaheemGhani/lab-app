@extends('layouts.master')

@section('content')

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">

						<a href="{{route('users.create')}}"><button class="btn btn-success btn-lg pull-right" style="margin-top: 22px;"><i class="fa fa-plus"></i></button></a>

				<h1>Users</h1>

			@if(App\User::count() > 0)
				<!-- Column controlled child rows -->
					<div class="panel panel-flat">
						
						<table class="table datatable-responsive-column-controlled ">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>User Type</th>
									<th></th>
									
								</tr>
							</thead>
							<tbody>

						@foreach($users as $user)
								<tr class="tr">
								  
									<td>{{ $user->id }}</td>
									<td>{{$user->name}}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->usertype->name }}</td>
									<td style="width:145px;padding:0px;"><a href="/laboratory/users/{{ $user->id }}">
										
											<button class="btn btn-default" id="btnView" >View Record</button>
												
										</a>

										<a href="/laboratory/users/{{ $user->id }}/edit">
										
											<button class="btn btn-primary" id="btnEdit" ><i class="fa fa-edit"></i></button>
												
										</a>
										
										

										
									</td>

									<td style="text-align: left;padding:0px;">
										{!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
										
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
						{{ $users->links() }}
					</div>
				@endif


					@include('partials.alerts')



								


				</div>
			</div>
		</div>
	</div>

	

@endsection

