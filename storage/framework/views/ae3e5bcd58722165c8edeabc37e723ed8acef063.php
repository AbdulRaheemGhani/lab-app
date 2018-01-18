<?php $__env->startSection('content'); ?>

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">

						

							

				<h1>Checkup</h1>
					

						
						

					<div class="row"> 

						

						<?php echo Form::open(['method' => 'PUT', 'route' => ['checkups.update', $checkup->id]]); ?>

						

						<div class="col-md-12"> 
							<!-- Column controlled child rows -->
									<div class="">
												<div class="form-group">
													<?php echo e(Form::label('name', 'Patient Name')); ?>

													<?php echo e(Form::text('name', $checkup->patient->name, ['class' => 'form-control'])); ?>

													<?php echo e(Form::hidden('patient_id', $checkup->patient->id, ['class' => 'form-control'])); ?>

												</div>
											
												<div class="form-group">
													<?php echo e(Form::label('age', 'Patient Age')); ?>

													<?php echo e(Form::text('age', $checkup->patient->age, ['class' => 'form-control'])); ?>

												</div>
											
												<div class="content-group-lg">
													<?php echo e(Form::label('gender', 'Select Gender')); ?>

													<select name="gender" class="select">											
														<option value="1" <?php if($checkup->patient->gender==1)  echo "selected"; ?>>Male</option>
														<option value="0" <?php if($checkup->patient->gender==0)  echo "selected"; ?>>Female</option>										
													</select>	
												</div>
				
												<div class="content-group-lg">
													<?php echo e(Form::label('patient_type', 'Select Patient Type')); ?>

														<select id="patient_type" name="patient_type" class="select" 
														onchange="
														if(this.value==2) document.getElementById('d').style.display='block'; 
														else {document.getElementById('d').style.display='none';
														var s = document.getElementById('d_id');
														s.selectedIndex=0;
														
														//alert(s.options[s.selectedIndex].text);

														}">

															<?php $__currentLoopData = App\Patienttype::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ptype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<option <?php if($checkup->patient->patienttype->id==$ptype->id)  echo "selected"; ?> value="<?php echo e($ptype->id); ?>"><?php echo e($ptype->name); ?></option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>										
													</select>	
												</div>
												<?php 
													if($checkup->patient->patienttype->id==2) $x="block"; else $x="none";
												?>
												
													<div class="content-group-lg" id="d" style="display: <?php echo $x; ?>">
															<?php echo e(Form::label('doctor', 'Select Doctor')); ?>

															<select id="d_id" name="doctor_id" class="select" >
																	<option value="0">Select Doctor</option>
															<?php $__currentLoopData = App\Doctor::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<option <?php if((! is_null($checkup->doctor)) && $checkup->doctor->id==$doctor->id)  echo "selected"; ?>
																		value="<?php echo e($doctor->id); ?>">
																		<?php echo e($doctor->name); ?>

																</option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>										
															</select>
													</div>
												
												<div class="content-group-lg">
														<?php echo e(Form::label('technition_id', 'Select Technition')); ?>

														<select name="technition_id" class="select">
															<?php $__currentLoopData = App\Technition::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $technition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<option <?php if($checkup->technition->id==$technition->id)  echo "selected"; ?> value="<?php echo e($technition->id); ?>"><?php echo e($technition->name); ?></option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>	
												</div>
				
												<div class="form-group">
													<?php echo e(Form::label('result', 'Result')); ?>

													<?php echo e(Form::text('result', $checkup->result, ['class' => 'form-control'])); ?>

												</div>
				
												<?php echo e(Form::label('tests', 'Tests Taken')); ?>

												<?php
													foreach($checkup->tests as $tst)
														$ts[] = $tst->id;
													
												?>
												<?php $__currentLoopData = App\Test::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												
													<div class="checkbox checkbox-switchery">
															<?php echo e(Form::label('result', $test->name)); ?>

															<input name="test[]" value="<?php echo e($test->id); ?>" type="checkbox" class="switchery-primary"
																<?php
																	
																	if(in_array($test->id, $ts))  echo "checked"; 
																?>
															>
													</div>
												
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
												<div class="col-md-4 pull-right">
													<div class="well">
														<dl class="dl-horizontal">
															<dt>Created At:</dt>
															<dd><?php echo e(\Carbon\Carbon::parse($checkup->created_at)->diffForHumans()); ?></dd>
														</dl>
														<dl class="dl-horizontal">
															<dt>Last Updated:</dt>
															<dd><?php echo e(\Carbon\Carbon::parse($checkup->updated_at)->diffForHumans()); ?></dd>
														</dl>

														<div class="row">
															<div class="col-sm-6">
															
															<a href=<?php echo e(route('checkups.show', $checkup->id)); ?> class = "btn btn-danger btn-block">
																<i class="fa fa-times"> Cancel</i>
																
															</a>
																
															
															</div>
															<div class="col-sm-6">
															<?php echo e(Form::button('<i class="fa fa-save"> Save</i>', ['type' => 'submit', 'class' => 'btn btn-success btn-block'])); ?>

																
															</div>	
														</div>

													</div>
												</div>
										
							</div>
							<!-- /column controlled child rows -->
						

						<?php echo Form::close(); ?>


					</div>
						
					

						





								


				</div>
			</div>
		</div>
	</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>