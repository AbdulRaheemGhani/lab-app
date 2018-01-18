<?php $__env->startSection('content'); ?>

	
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php echo e($item); ?>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<h1>Hello</h1>








<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>