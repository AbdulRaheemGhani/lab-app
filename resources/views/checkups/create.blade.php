@extends('layouts.master')

@section('content')
    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">


						<h1>Checkup</h1>
				
						@include('partials.errors')

						{!! Form::open(['route' => ['checkups.store'], 'method' => 'POST']) !!}
						
					
						
						  <div class="form-group">
							  {{ Form::label('name', 'Patient Name') }}
						    {{ Form::text('name', null, ['class' => 'form-control']) }}
							</div>
							
							<div class="form-group">
							  {{ Form::label('age', 'Patient Age') }}
						    {{ Form::text('age', null, ['class' => 'form-control']) }}
							</div>
							
							<div class="content-group-lg">
									{{ Form::label('gender', 'Select Gender') }}
										<select name="gender" class="select">											
												<option value="1">Male</option>
												<option value="0">Female</option>										
										</select>	
							</div>

							<div class="content-group-lg">
									{{ Form::label('patient_type', 'Select Patient Type') }}
										<select id="patient_type" name="patient_type" class="select" 
										onchange="if(this.value==2) document.getElementById('doctor').style.display='block'; else document.getElementById('doctor').style.display='none'">
										@foreach(App\Patienttype::all() as $ptype)
												<option value="{{$ptype->id}}">{{ $ptype->name }}</option>
										@endforeach										
										</select>	
							</div>

							<div id="doctor" class="content-group-lg" style="display:none">
									{{ Form::label('doctor', 'Select Doctor') }}
										<select name="doctor_id" class="select" >
												<option value="0">Select Doctor</option>
										@foreach(App\Doctor::all() as $doctor)
												<option value="{{$doctor->id}}">{{ $doctor->name }}</option>
										@endforeach										
										</select>	
							</div>

							<div class="content-group-lg">
									{{ Form::label('technition_id', 'Select Technition') }}
										<select name="technition_id" class="select">
											@foreach(App\Technition::all() as $technition)
												<option value="{{$technition->id}}">{{$technition->name}}</option>
											@endforeach
										</select>	
							</div>

						  <div class="form-group">
								{{ Form::label('result', 'Result') }}
						    {{ Form::text('result', null, ['class' => 'form-control']) }}
						  </div>

							{{ Form::label('tests', 'Tests Taken') }}

							@foreach(App\Test::all() as $test)
							
								<div class="checkbox checkbox-switchery">
										{{ Form::label('result', $test->name) }}
										<input name="test[]" value="{{ $test->id }}" type="checkbox" class="switchery-primary">
								</div>
							
							@endforeach

						  <div class="form-group">
						  {{Form::button('<i class="fa fa-save"> Save</i>', ['type' => 'submit', 'class' => 'btn btn-success'])}}
						  	
						  </div>

						{!! Form::close() !!}

						
				</div>
			</div>
		</div>
	</div>



@endsection

