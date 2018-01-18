<?php $__env->startSection('content'); ?>
    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">


						<h1>Checkup</h1>
				
						<?php echo $__env->make('partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

						<?php echo Form::open(['route' => ['checkups.store'], 'method' => 'POST']); ?>

						
					
						
						  <div class="form-group">
							  <?php echo e(Form::label('name', 'Patient Name')); ?>

						    <?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

							</div>
							
							<div class="form-group">
							  <?php echo e(Form::label('age', 'Patient Age')); ?>

						    <?php echo e(Form::text('age', null, ['class' => 'form-control'])); ?>

							</div>
							
							<div class="content-group-lg">
									<?php echo e(Form::label('gender', 'Select Gender')); ?>

										<select name="gender" class="select">											
												<option value="1">Male</option>
												<option value="0">Female</option>										
										</select>	
							</div>

							<div class="content-group-lg">
									<?php echo e(Form::label('patient_type', 'Select Patient Type')); ?>

										<select id="patient_type" name="patient_type" class="select" 
										onchange="if(this.value==2) document.getElementById('doctor').style.display='block'; else document.getElementById('doctor').style.display='none'">
										<?php $__currentLoopData = App\Patienttype::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ptype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($ptype->id); ?>"><?php echo e($ptype->name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>										
										</select>	
							</div>

							<div id="doctor" class="content-group-lg" style="display:none">
									<?php echo e(Form::label('doctor', 'Select Doctor')); ?>

										<select name="doctor_id" class="select" >
												<option value="0">Select Doctor</option>
										<?php $__currentLoopData = App\Doctor::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($doctor->id); ?>"><?php echo e($doctor->name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>										
										</select>	
							</div>

							<div class="content-group-lg">
									<?php echo e(Form::label('technition_id', 'Select Technition')); ?>

										<select name="technition_id" class="select">
											<?php $__currentLoopData = App\Technition::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $technition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($technition->id); ?>"><?php echo e($technition->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>	
							</div>

						  <div class="form-group">
								<?php echo e(Form::label('result', 'Result')); ?>

						    <?php echo e(Form::text('result', null, ['class' => 'form-control'])); ?>

						  </div>

							<?php echo e(Form::label('tests', 'Tests Taken')); ?>


							<?php $__currentLoopData = App\Test::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							
								<div class="checkbox checkbox-switchery">
										<?php echo e(Form::label('result', $test->name)); ?>

										<input name="test[]" value="<?php echo e($test->id); ?>" type="checkbox" class="switchery-primary">
								</div>
							
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						  <div class="form-group">
						  <?php echo e(Form::button('<i class="fa fa-save"> Save</i>', ['type' => 'submit', 'class' => 'btn btn-success'])); ?>

						  	
						  </div>

						<?php echo Form::close(); ?>


						
				</div>
			</div>
		</div>
	</div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>