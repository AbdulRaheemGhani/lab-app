@extends('layouts.master')

@section('content')

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">


						<h1>Test</h1>
				
						@include('partials.errors')

						{!! Form::open(['route' => ['testings.store'], 'method' => 'POST']) !!}
						
					
							
						  <div class="form-group">
							  {{ Form::label('name', 'Test Name') }}
						    {{ Form::text('name', null, ['class' => 'form-control']) }}
						  </div>
						  <div class="form-group">
								{{ Form::label('normal', 'Test Normal Form') }}
						    {{ Form::text('normal', null, ['class' => 'form-control']) }}
						  </div>
							<div class="form-group">
								{{ Form::label('remarks', 'Remarks') }}
						    {{ Form::text('remarks', null, ['class' => 'form-control']) }}
						  </div>
							
							
							<div class="content-group-lg">
									{{ Form::label('testcat_id', 'Select Category') }}
										<select name="testcat_id" class="select">
											@foreach(App\Testcat::all() as $cat)
												<option value="{{$cat->id}}">{{$cat->name}}</option>
											@endforeach
										</select>	
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
