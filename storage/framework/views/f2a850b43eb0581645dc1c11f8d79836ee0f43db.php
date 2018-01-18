<?php $__env->startSection('content'); ?>

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">


						<h1>User Type</h1>
				
						<?php echo $__env->make('partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

						<?php echo Form::open(['route' => ['usertypes.store'], 'method' => 'POST']); ?>

						
					
							
						  <div class="form-group">
							  <?php echo e(Form::label('name', 'User Type Name')); ?>

						    <?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

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