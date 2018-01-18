<?php $__env->startSection('content'); ?>

<h1>Create a new User</h1> 

<hr> <br />

<form class="form-horizontal" method="POST" action="/laboratory/register">

	<?php echo e(csrf_field()); ?>

	
	<div class="form-group">
		<label class="control-label col-lg-2">Username</label>
		<div class="col-lg-10">
			<input type="text" class="form-control" placeholder="Enter your username..." name="name" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-lg-2">Email</label>
		<div class="col-lg-10">
			<input type="text" class="form-control" placeholder="Enter your email..." name="email" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-lg-2">Select User Type</label>
		<div class="col-lg-10">
			<select name="usertype_id" class="form-control select" required>
				<?php $__currentLoopData = App\Usertype::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usertype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>											
					<option value="<?php echo e($usertype->id); ?>"><?php echo e($usertype->name); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>									
			</select>
		</div>	
	</div>



	<div class="form-group">
		<label class="control-label col-lg-2">Password</label>
		<div class="col-lg-10">
			<input type="password" class="form-control" name="password" required>
		</div>
	</div>


	<div class="form-group">
		<label class="control-label col-lg-2">Confirm Password</label>
		<div class="col-lg-10">
			<input type="password" class="form-control" name="password_confirmation" required>
		</div>
	</div>


	
	<div class="form-group">

		<div class="border-top-primary text-center">

			<button type="submit" class="btn btn-success">Save User</button>
		
		</div>

	</div>

		<?php echo $__env->make('layouts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	

	
</form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>