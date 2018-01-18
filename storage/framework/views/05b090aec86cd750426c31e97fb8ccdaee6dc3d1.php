<?php $__env->startSection('content'); ?>

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">

						<a href="<?php echo e(route('checkups.create')); ?>"><button class="btn btn-success btn-lg pull-right" style="margin-top: 22px;"><i class="fa fa-plus"></i></button></a>

				<h1>Checkups</h1>

			<?php if(App\Checkup::count() > 0): ?>
				<!-- Column controlled child rows -->
					<div class="panel panel-flat col-md-12">
						
						<table class="table datatable-responsive-column-controlled ">
							<thead>
								<tr>
									<th>ID</th>
									<th>Patient</th>
									<th>Reference</th>
									<th>Doctor</th>
									<th>Age</th>
									<th>Gender</th>
									<th>Technition</th>
									<th>Tests</th>
									<th>Result</th>
									<th></th>									
								</tr>
							</thead>
							<tbody>
						
						<?php $__currentLoopData = $checkups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checkup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr class="tr">
								  
									<td><?php echo e($checkup->id); ?></td>
									<td><?php echo e(! is_null($p = App\Checkup::find($checkup->id)->patient) ? $p->name : "No Patient"); ?></td>
									<td><?php echo e(! is_null($p->patienttype) ? $p->patienttype->name : "No Patient Type"); ?></td>
									<td><?php echo e(! is_null($doctor = App\Checkup::find($checkup->id)->doctor) ? $doctor->name : "No Doctor"); ?></td>
									<td><?php echo e(! is_null($p) ? $p->age : "No Age"); ?></td>
									<td><?php echo e(! is_null($p) ? ( $p->gender == 1 ? "Male" : "Female" ) : "No Gender"); ?></td>

									<td><?php echo e(! is_null($t = App\Checkup::find($checkup->id)->technition) ? $t->name : "No Technition"); ?></td>
										<?php $i=0; ?>
									<td>
											<?php if(! is_null($tests = App\Checkup::find($checkup->id)->tests)): ?>
												<?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php echo e($test->name); ?>

														<?php if(! ($i == count($tests) - 1)): ?>
															<?php echo e(","); ?>	
														<?php endif; ?>
														<?php $i++; ?>												
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php else: ?>
												<?php echo e("No Test"); ?>

											<?php endif; ?>
									</td>

									<td> <?php echo e($checkup->result); ?> </td>

									
									<td style="width:145px;padding:0px;"><a href="/laboratory/checkups/<?php echo e($checkup->id); ?>">
										
											<button class="btn btn-default" id="btnView" >View Record</button>
												
										</a>

										<a href="/laboratory/checkups/<?php echo e($checkup->id); ?>/edit">
										
											<button class="btn btn-primary" id="btnEdit" ><i class="fa fa-edit"></i></button>
										</a>		
										
										
										

										
									</td>

									<td style="text-align: left;padding:0px;">
										<?php echo Form::open(['route' => ['checkups.destroy', $checkup->id], 'method' => 'DELETE']); ?>

										
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
						<?php echo e($checkups->links()); ?>

					</div>
				<?php endif; ?>


					<?php echo $__env->make('partials.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



								


				</div>
			</div>
		</div>
	</div>

	

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>