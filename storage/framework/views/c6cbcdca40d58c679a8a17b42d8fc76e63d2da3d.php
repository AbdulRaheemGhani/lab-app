<?php $__env->startSection('content'); ?>

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">


						<h1>Test</h1>
				
						<?php echo $__env->make('partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

						<?php echo Form::open(['route' => ['testings.store'], 'method' => 'POST']); ?>

						
					
							
						  <div class="form-group">
							  <?php echo e(Form::label('name', 'Test Name')); ?>

						    <?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

						  </div>
						  <div class="form-group">
								<?php echo e(Form::label('normal', 'Test Normal Form')); ?>

						    <?php echo e(Form::text('normal', null, ['class' => 'form-control'])); ?>

						  </div>
							<div class="form-group">
								<?php echo e(Form::label('remarks', 'Remarks')); ?>

						    <?php echo e(Form::text('remarks', null, ['class' => 'form-control'])); ?>

						  </div>
							
							
							<div class="content-group-lg">
									<?php echo e(Form::label('testcat_id', 'Select Category')); ?>

										<select name="testcat_id" class="select">
											<?php $__currentLoopData = App\Testcat::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>	
							</div>

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