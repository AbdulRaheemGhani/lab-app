<?php $__env->startSection('content'); ?>

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">


				<h1>Doctor</h1>
					

				
						

					<div class="row"> 

						

						<?php echo Form::model($test, ['method' => 'PUT', 'route' => ['testings.update', $test->id]]); ?>

						

						<div class="col-md-8"> 
							<!-- Column controlled child rows -->
							<div class="panel panel-flat">
								
								<table class="table datatable-responsive-column-controlled ">
									<thead>
										<tr>
											
											<th>Name</th>
											<th>Normal</th>
											<th>Remarks</th>
											<th>Category</th>
										</tr>
									</thead>
									<tbody>

										<tr class="tr">
										  
											
											<td><?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?></td>
											<td><?php echo e(Form::text('normal', null, ['class' => 'form-control'])); ?></td>
											<td><?php echo e(Form::text('remarks', null, ['class' => 'form-control'])); ?></td>
											<td>
												
												
														<select name="testcat_id" class="select" >
															<option value="<?php if(! is_null(App\Test::find($test->id)->testcat)): ?> <?php echo e(App\Test::find($test->id)->testcat->id); ?> <?php endif; ?>" selected>
																<?php if(! is_null( App\Test::find($test->id)->testcat)): ?> <?php echo e(App\Test::find($test->id)->testcat->name); ?> <?php endif; ?>
															</option>
															<?php $__currentLoopData = App\Testcat::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>	
												
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
									<dt>Created At:</dt>
									<dd><?php echo e(\Carbon\Carbon::parse($test->created_at)->diffForHumans()); ?></dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>Last Updated:</dt>
									<dd><?php echo e(\Carbon\Carbon::parse($test->updated_at)->diffForHumans()); ?></dd>
								</dl>

								<div class="row">
									<div class="col-sm-6">
									<a href=<?php echo e(route('testings.show', $test->id)); ?> class = "btn btn-danger btn-block">
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