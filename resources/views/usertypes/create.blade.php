@extends('layouts.master')

@section('content')

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">


						<h1>User Type</h1>
				
						@include('partials.errors')

						{!! Form::open(['route' => ['usertypes.store'], 'method' => 'POST']) !!}
						
					
							
						  <div class="form-group">
							  {{ Form::label('name', 'User Type Name') }}
						    {{ Form::text('name', null, ['class' => 'form-control']) }}
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
