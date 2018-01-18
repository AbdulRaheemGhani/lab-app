@extends('layouts.master')

@section('content')

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">


						<h1>User</h1>
				
						@include('partials.errors')

						{!! Form::open(['route' => ['users.store'], 'method' => 'POST']) !!}
						
					
							
						  <div class="form-group">
							  {{ Form::label('name', 'User Name') }}
						    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Enter username here']) }}
						  </div>
						  <div class="form-group">
								{{ Form::label('email', 'User Email') }}
						    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder'=>'Enter email here']) }}
						  </div>
							<div class="content-group-lg">
									{{ Form::label('usertype', 'Select User Type') }}
										<select name="usertype_id" class="select">											
												@foreach(App\Usertype::all() as $usertype)											
												<option value="{{$usertype->id}}">{{$usertype->name}}</option>
												@endforeach										
										</select>	
							</div>
							<div class="form-group">
								{{ Form::label('password', 'User Password') }}
						    {{ Form::password('password', ['class' => 'form-control', 'placeholder'=>'Enter password here']) }}
						  </div>
							<div class="form-group">
								{{ Form::label('confirmation', ' Confirm Password') }}
						    {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder'=>'Enter password again']) }}
						  </div>
						  <div class="form-group">
							{{Form::button('<i class="fa fa-save"> Save</i>', ['type' => 'submit', 'class' => 'btn btn-success'])}}
						  	
						  </div>

						{!! Form::close() !!}

						
				</div>
			</div>
		</div>
	</div>



@endsection
