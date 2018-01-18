<?php $__env->startSection('content'); ?>

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">

						<a href="<?php echo e(route('users.create')); ?>"><button class="btn btn-success btn-lg pull-right" style="margin-top: 22px;"><i class="fa fa-plus"></i></button></a>

				<h1>Users</h1>

			<?php if(App\User::count() > 0): ?>
				<!-- Column controlled child rows -->
					<div class="panel panel-flat">
						
						<table class="table datatable-responsive-column-controlled ">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>User Type</th>
									<th></th>
									
								</tr>
							</thead>
							<tbody>

						<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr class="tr">
								  
									<td><?php echo e($user->id); ?></td>
									<td><?php echo e($user->name); ?></td>
									<td><?php echo e($user->email); ?></td>
									<td><?php echo e($user->usertype->name); ?></td>
									<td style="width:145px;padding:0px;"><a href="/laboratory/users/<?php echo e($user->id); ?>">
										
											<button class="btn btn-default" id="btnView" >View Record</button>
												
										</a>

										<a href="/laboratory/users/<?php echo e($user->id); ?>/edit">
										
											<button class="btn btn-primary" id="btnEdit" ><i class="fa fa-edit"></i></button>
												
										</a>
										
										

										
									</td>

									<td style="text-align: left;padding:0px;">
										<?php echo Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']); ?>

										
										<?php echo e(Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'])); ?>


										<?php echo Form::close(); ?>

									</td>
									

								</tr>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								
							</tbody>
						</table>

						

					</div>
					<!-- /column controlled child rows -->
					<div class="text-center">
						<?php echo e($users->links()); ?>

					</div>
				<?php endif; ?>


					<?php echo $__env->make('partials.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



								


				</div>
			</div>
		</div>
	</div>

	

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>