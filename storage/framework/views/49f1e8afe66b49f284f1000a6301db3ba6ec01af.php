<?php $__env->startSection('content'); ?>

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">

						<a href="<?php echo e(route('testings.create')); ?>"><button class="btn btn-success btn-lg pull-right" style="margin-top: 22px;"><i class="fa fa-plus"></i></button></a>

				<h1>Tests</h1>

			<?php if(App\Test::count() > 0): ?>
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
									<th></th>								
								</tr>
							</thead>

							<tbody>
							<?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
									
									<td style="width:145px;padding:0px;"><a href="/laboratory/testings/<?php echo e($test->id); ?>">
										
											<button class="btn btn-default" id="btnView" >View Record</button>
												
										</a>

										<a href="/laboratory/testings/<?php echo e($test->id); ?>/edit">
										
											<button class="btn btn-primary" id="btnEdit" ><i class="fa fa-edit"></i></button>
										</a>	
										
										
										

										
									</td>

									<td style="text-align: left;padding:0px;">
										<?php echo Form::open(['route' => ['testings.destroy', $test->id], 'method' => 'DELETE']); ?>

										
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
						<?php echo e($tests->links()); ?>

					</div>
				<?php endif; ?>


					<?php echo $__env->make('partials.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



								


				</div>
			</div>
		</div>
	</div>

	

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>