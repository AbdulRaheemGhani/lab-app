<?php $__env->startSection('content'); ?>

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">


				<h1>User</h1>
					

				
						

					<div class="row"> 

					<?php echo $__env->make('partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

						<?php echo Form::open( ['method' => 'PUT', 'route' => ['users.passwordUpdate', $user->id]]); ?>

						

						<div class="col-md-8"> 
							<!-- Column controlled child rows -->
							<div class="panel panel-flat">
								
								<table class="table datatable-responsive-column-controlled ">
									<thead>
										<tr>
											<th>Current Password</th>
                                            <th>New Password</th>
                                            <th>Confirm New Password</th>
										</tr>
									</thead>
									<tbody>

										<tr class="tr">
										    <td><?php echo e(Form::password('current_password', ['class' => 'form-control'])); ?></td>
                                            <td><?php echo e(Form::password('password', ['class' => 'form-control'])); ?></td>
                                            <td><?php echo e(Form::password('password_confirmation', ['class' => 'form-control'])); ?></td>
										</tr>

									</tbody>
								</table>
							</div>
							<!-- /column controlled child rows -->
						</div>

						<div class="col-md-4">
							<div class="well">
								<dl class="dl-horizontal">
									<dt>Created At:</dt>
									<dd><?php echo e(\Carbon\Carbon::parse($user->created_at)->diffForHumans()); ?></dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>Last Updated:</dt>
									<dd><?php echo e(\Carbon\Carbon::parse($user->updated_at)->diffForHumans()); ?></dd>
								</dl>

								<div class="row">
									<div class="col-sm-6">
									<a href=<?php echo e(route('users.show', $user->id)); ?> class = "btn btn-danger btn-block">
										<i class="fa fa-times"> Cancel</i>
										
									</a>
										
									
									</div>
									<div class="col-sm-6">
									<?php echo e(Form::button('<i class="fa fa-save"> Save</i>', ['type' => 'submit', 'class' => 'btn btn-success btn-block'])); ?>

										
									</div>	
								</div>

							</div>
						</div>

						<?php echo Form::close(); ?>


					</div>
						
					

						





								


				</div>
			</div>
		</div>
	</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>