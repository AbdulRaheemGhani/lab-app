<?php $__env->startSection('content'); ?>

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">

						<a href="<?php echo e(route('cats.create')); ?>"><button class="btn btn-success btn-lg pull-right" style="margin-top: 22px;"><i class="fa fa-plus"></i></button></a>

				<h1>Test Categories</h1>

			<?php if(App\Testcat::count() > 0): ?>
				<!-- Column controlled child rows -->
					<div class="panel panel-flat">
						
						<table class="table datatable-responsive-column-controlled ">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Created</th>
									<th></th>
									
								</tr>
							</thead>
							<tbody>

						<?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr class="tr">
								  
									<td><?php echo e($cat->id); ?></td>
									<td><?php echo e($cat->name); ?></td>
									<td><?php echo e(\Carbon\Carbon::parse($cat->created_at)->diffForHumans()); ?></td>
									<td style="width:145px;padding:0px;"><a href="/laboratory/cats/<?php echo e($cat->id); ?>">
										
											<button class="btn btn-default" id="btnView" >View Record</button>
												
										</a>

										<a href="/laboratory/cats/<?php echo e($cat->id); ?>/edit">
										
											<button class="btn btn-primary" id="btnEdit" ><i class="fa fa-edit"></i></button>
										</a>
									</td>

									<td style="text-align: left;padding:0px;">
										<?php echo Form::open(['route' => ['cats.destroy', $cat->id], 'method' => 'DELETE']); ?>

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
						<?php echo e($cats->links()); ?>

					</div>
				<?php endif; ?>


					<?php echo $__env->make('partials.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



								


				</div>
			</div>
		</div>
	</div>

	

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>