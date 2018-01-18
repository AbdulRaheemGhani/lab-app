@extends('layouts.master')

@section('content')

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">

						

							

				<h1>Checkup</h1>
					

						
						

					<div class="row"> 

						

						{!! Form::open(['method' => 'PUT', 'route' => ['checkups.update', $checkup->id]]) !!}
						

						<div class="col-md-12"> 
							<!-- Column controlled child rows -->
									<div class="">
												<div class="form-group">
													{{ Form::label('name', 'Patient Name') }}
													{{ Form::text('name', $checkup->patient->name, ['class' => 'form-control']) }}
													{{ Form::hidden('patient_id', $checkup->patient->id, ['class' => 'form-control']) }}
												</div>
											
												<div class="form-group">
													{{ Form::label('age', 'Patient Age') }}
													{{ Form::text('age', $checkup->patient->age, ['class' => 'form-control']) }}
												</div>
											
												<div class="content-group-lg">
													{{ Form::label('gender', 'Select Gender') }}
													<select name="gender" class="select">											
														<option value="1" <?php if($checkup->patient->gender==1)  echo "selected"; ?>>Male</option>
														<option value="0" <?php if($checkup->patient->gender==0)  echo "selected"; ?>>Female</option>										
													</select>	
												</div>
				
												<div class="content-group-lg">
													{{ Form::label('patient_type', 'Select Patient Type') }}
														<select id="patient_type" name="patient_type" class="select" 
														onchange="
														if(this.value==2) document.getElementById('d').style.display='block'; 
														else {document.getElementById('d').style.display='none';
														var s = document.getElementById('d_id');
														s.selectedIndex=0;
														
														//alert(s.options[s.selectedIndex].text);

														}">

															@foreach(App\Patienttype::all() as $ptype)
																	<option <?php if($checkup->patient->patienttype->id==$ptype->id)  echo "selected"; ?> value="{{$ptype->id}}">{{ $ptype->name }}</option>
															@endforeach										
													</select>	
												</div>
												<?php 
													if($checkup->patient->patienttype->id==2) $x="block"; else $x="none";
												?>
												
													<div class="content-group-lg" id="d" style="display: <?php echo $x; ?>">
															{{ Form::label('doctor', 'Select Doctor') }}
															<select id="d_id" name="doctor_id" class="select" >
																	<option value="0">Select Doctor</option>
															@foreach(App\Doctor::all() as $doctor)
																<option <?php if((! is_null($checkup->doctor)) && $checkup->doctor->id==$doctor->id)  echo "selected"; ?>
																		value="{{ $doctor->id }}">
																		{{ $doctor->name }}
																</option>
															@endforeach										
															</select>
													</div>
												
												<div class="content-group-lg">
														{{ Form::label('technition_id', 'Select Technition') }}
														<select name="technition_id" class="select">
															@foreach(App\Technition::all() as $technition)
																<option <?php if($checkup->technition->id==$technition->id)  echo "selected"; ?> value="{{$technition->id}}">{{$technition->name}}</option>
															@endforeach
														</select>	
												</div>
				
												<div class="form-group">
													{{ Form::label('result', 'Result') }}
													{{ Form::text('result', $checkup->result, ['class' => 'form-control']) }}
												</div>
				
												{{ Form::label('tests', 'Tests Taken') }}
												<?php
													foreach($checkup->tests as $tst)
														$ts[] = $tst->id;
													
												?>
												@foreach(App\Test::all() as $test)
												
													<div class="checkbox checkbox-switchery">
															{{ Form::label('result', $test->name) }}
															<input name="test[]" value="{{ $test->id }}" type="checkbox" class="switchery-primary"
																<?php
																	
																	if(in_array($test->id, $ts))  echo "checked"; 
																?>
															>
													</div>
												
												@endforeach
				
												<div class="col-md-4 pull-right">
													<div class="well">
														<dl class="dl-horizontal">
															<dt>Created At:</dt>
															<dd>{{\Carbon\Carbon::parse($checkup->created_at)->diffForHumans()}}</dd>
														</dl>
														<dl class="dl-horizontal">
															<dt>Last Updated:</dt>
															<dd>{{\Carbon\Carbon::parse($checkup->updated_at)->diffForHumans()}}</dd>
														</dl>

														<div class="row">
															<div class="col-sm-6">
															
															<a href={{ route('checkups.show', $checkup->id) }} class = "btn btn-danger btn-block">
																<i class="fa fa-times"> Cancel</i>
																
															</a>
																
															
															</div>
															<div class="col-sm-6">
															{{Form::button('<i class="fa fa-save"> Save</i>', ['type' => 'submit', 'class' => 'btn btn-success btn-block'])}}
																
															</div>	
														</div>

													</div>
												</div>
										
							</div>
							<!-- /column controlled child rows -->
						

						{!! Form::close() !!}

					</div>
						
					

						





								


				</div>
			</div>
		</div>
	</div>



@endsection
