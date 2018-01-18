<?php $__env->startSection('content'); ?>

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">


						<h1>User</h1>
				
						<?php echo $__env->make('partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

						<?php echo Form::open(['route' => ['users.store'], 'method' => 'POST']); ?>

						
					
							
						  <div class="form-group">
							  <?php echo e(Form::label('name', 'User Name')); ?>

						    <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Enter username here'])); ?>

						  </div>
						  <div class="form-group">
								<?php echo e(Form::label('email', 'User Email')); ?>

						    <?php echo e(Form::text('email', null, ['class' => 'form-control', 'placeholder'=>'Enter email here'])); ?>

						  </div>
							<div class="content-group-lg">
									<?php echo e(Form::label('usertype', 'Select User Type')); ?>

										<select name="usertype_id" class="select">											
												<?php $__currentLoopData = App\Usertype::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usertype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>											
												<option value="<?php echo e($usertype->id); ?>"><?php echo e($usertype->name); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>										
										</select>	
							</div>
							<div class="form-group">
								<?php echo e(Form::label('password', 'User Password')); ?>

						    <?php echo e(Form::password('password', ['class' => 'form-control', 'placeholder'=>'Enter password here'])); ?>

						  </div>
							<div class="form-group">
								<?php echo e(Form::label('confirmation', ' Confirm Password')); ?>

						    <?php echo e(Form::password('password_confirmation', ['class' => 'form-control', 'placeholder'=>'Enter password again'])); ?>

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