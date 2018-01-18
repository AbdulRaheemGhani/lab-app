<?php $__env->startSection('content'); ?>

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">

						
				<a href="<?php echo e(route('testings.index')); ?>"><button class="btn btn-success pull-right" style="width:100px;margin-top:22px;"><i class="fa fa-arrow-circle-left"></i></button></a>
				<h1>Test</h1>

				

					<div class="row"> 
					
						<div class="col-md-8"> 
							<!-- Column controlled child rows -->
							<div class="panel panel-flat">
								
								<table class="table datatable-responsive-column-controlled ">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Normal</th>
											<th>Remarks</th>
											<th>Category</th>
										</tr>
									</thead>
									<tbody>

										<tr class="tr">
										  
											<td><?php echo e($test->id); ?></td>
											<td><?php echo e($test->name); ?></td>
											<td><?php echo e($test->normal); ?></td>
											<td><?php echo e($test->remarks); ?></td>
											<td>
											<?php if(! is_null(App\Test::find($test->id)->testcat)): ?>
												<?php echo e(App\Test::find($test->id)->testcat->name); ?>

											<?php else: ?>
												<?php echo e("No Category"); ?>

											<?php endif; ?>
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
									<dd><?php echo e(\Carbon\Carbon::parse($test->created_at)->diffForHumans()); ?></dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>Last Updated:</dt>
									<dd><?php echo e(\Carbon\Carbon::parse($test->updated_at)->diffForHumans()); ?></dd>
								</dl>
										<hr>
								<div class="row">
									<div class="col-sm-6">
									<a href=<?php echo e(route('testings.edit', $test->id)); ?> class = "btn btn-primary btn-block">
										<i class="fa fa-edit"></i>
									</a>
										
									
									</div>
									<div class="col-sm-6">
									<?php echo Form::open(['route' => ['testings.destroy', $test->id], 'method' => 'DELETE']); ?>

										
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