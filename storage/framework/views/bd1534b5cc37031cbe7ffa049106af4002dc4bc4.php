<?php $__env->startSection('content'); ?>

<script>

	function selectById()
    {
	   var id = $("#ids").val();
	   window.location.href="http://localhost/laboratory/doctors/"+id;
	   
	}

	function percentage()
    {
	   var percentage = $("#percentage option:selected").text();
	   window.location.href="http://localhost/laboratory/doctors/"+percentage+"/search";	   
	}

	function selectByName()
    {
	   var name = $("#names option:selected").text();
	   window.location.href="http://localhost/laboratory/doctors/"+name+"/search";	   
	}

</script>

    <!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<div class="content-wrapper">

				<div class="content">
				
				<h3>Search Doctor</h3>
					<?php $arr = ['0' => 'id', '1' => 'name', '2' => 'percentage'];  ?>
				<div class="row">
					<div class="col-md-12">

						<div class="row">
							<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-md-4">
									<label> <strong> <?php echo strtoupper($a); ?> </strong></label>
									<div class="content-group-lg">
										<select class="select-minimum"
											 <?php 
												 switch($a)
												 {
													case "id":
														echo "id='ids'" . " " . "onchange='selectById()'"; 
													break;

													case "name":
														echo "id='names'" . " " . "onchange='selectByName()'"; 
													break;
													
													case "percentage":
														echo "id='percentage'" . " " . "onchange='percentage()'"; 
													break;
													
												 }
												  
											 ?>>
											<option value="0">Select Doctor</option>
											<?php if(App\Doctor::count() > 0): ?>
												<?php $__currentLoopData = App\Doctor::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($d->id); ?>"><?php echo e($d->$a); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
											
										</select>
									</div>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</div>

					</div>
				</div>
				
				



			<a href="<?php echo e(route('doctors.create')); ?>"><button class="btn btn-success btn-lg pull-right" style="margin-top: 22px;"><i class="fa fa-plus"></i></button></a>

				<h1>Doctors</h1>

			<?php if(App\Doctor::count() > 0): ?>
				<!-- Column controlled child rows -->
					<div class="panel panel-flat">
						
						<table class="table datatable-responsive-column-controlled " id="doctors-table">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Percentage</th>
									<th></th>
									
								</tr>
							</thead>
							<tbody>

						<?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr class="tr">
								  
									<td><?php echo e($doctor->id); ?></td>
									<td><?php echo e($doctor->name); ?></td>
									<td><?php echo e($doctor->percentage); ?></td>
									<td style="width:145px;padding:0px;"><a href="/laboratory/doctors/<?php echo e($doctor->id); ?>">
										
											<button class="btn btn-default" id="btnView" >View Record</button>
												
										</a>

										<a href="/laboratory/doctors/<?php echo e($doctor->id); ?>/edit">
										
											<button class="btn btn-primary" id="btnEdit" ><i class="fa fa-edit"></i></button>
										</a>
												
									</td>

									<td style="text-align: left;padding:0px;">
										<?php echo Form::open(['route' => ['doctors.destroy', $doctor->id], 'method' => 'DELETE']); ?>

										
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
						<?php echo e($doctors->links()); ?>

					</div>
				<?php endif; ?>


					<?php echo $__env->make('partials.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



								


				</div>
			</div>
		</div>
	</div>

	

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>