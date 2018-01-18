<?php $__env->startSection('content'); ?>

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">

						
				<a href="<?php echo e(route('users.index')); ?>"><button class="btn btn-success pull-right" style="width:100px;margin-top:22px;"><i class="fa fa-arrow-circle-left"></i></button></a>
				<h1>User</h1>

				

					<div class="row"> 
					
						<div class="col-md-8"> 
							<!-- Column controlled child rows -->
							<div class="panel panel-flat">
								
								<table class="table datatable-responsive-column-controlled ">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Email</th>
											<td></td>
										</tr>
									</thead>
									<tbody>

										<tr class="tr">
										  
											<td><?php echo e($user->id); ?></td>
											<td><?php echo e($user->name); ?></td>
											<td><?php echo e($user->email); ?></td>
											<td>
											<a href=<?php echo e(route('users.changePassword', $user->id)); ?> class = "btn btn-primary btn-block">
												<i class="fa fa-edit"> Change Password</i>
											</a>
											</td>
										</tr>

									</tbody>
								</table>

							</div>
							<!-- /column controlled child rows -->
						</div>
						

						<div class="col-md-4">
							<div class="well">
								<dl class="dl-horizontal">
									<dt>Created:</dt>
									<dd><?php echo e(\Carbon\Carbon::parse($user->created_at)->diffForHumans()); ?></dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>Last Updated:</dt>
									<dd><?php echo e(\Carbon\Carbon::parse($user->updated_at)->diffForHumans()); ?></dd>
								</dl>
										<hr>
								<div class="row">
									<div class="col-sm-6">
									<a href=<?php echo e(route('users.edit', $user->id)); ?> class = "btn btn-primary btn-block">
										<i class="fa fa-edit"></i>
									</a>
										
									
									</div>
									<div class="col-sm-6">
									<?php echo Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']); ?>

										
									<?php echo e(Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-block'])); ?>


									<?php echo Form::close(); ?>

									</div>	
								</div>

							</div>
						</div>

					</div>




								


				</div>
			</div>
		</div>
	</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>