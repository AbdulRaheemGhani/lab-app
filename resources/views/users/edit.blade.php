@extends('layouts.master')

@section('content')

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">


				<h1>User</h1>
					

				
						

					<div class="row"> 

					@include('partials.errors')

						{!! Form::open( ['method' => 'PUT', 'route' => ['users.update', $user->id]]) !!}
						

						<div class="col-md-8"> 
							<!-- Column controlled child rows -->
							<div class="panel panel-flat">
								
								<table class="table datatable-responsive-column-controlled ">
									<thead>
										<tr>
											
											<th>Name</th>
											<th>Email</th>
											<th>User Type</th>
											
										</tr>
									</thead>
									<tbody>

										<tr class="tr">
										  
											
											<td>{{ Form::text('name', $user->name, ['class' => 'form-control']) }}</td>
											<td>{{ Form::text('email', $user->email, ['class' => 'form-control']) }}</td>
											<td>
												<select name="usertype_id" class="select">											
														@foreach(App\Usertype::all() as $usertype)											
														<option value="{{$usertype->id}}">{{$usertype->name}}</option>
														@endforeach										
												</select>	
											</div>
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
									<dd>{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>Last Updated:</dt>
									<dd>{{\Carbon\Carbon::parse($user->updated_at)->diffForHumans()}}</dd>
								</dl>

								<div class="row">
									<div class="col-sm-6">
									<a href={{ route('users.show', $user->id) }} class = "btn btn-danger btn-block">
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
