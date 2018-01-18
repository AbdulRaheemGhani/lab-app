<!DOCTYPE html>
<html>
<head>

<?php echo $__env->make('layouts.assets', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

</head>
<body>

<?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="container">

	<?php echo $__env->yieldContent('content'); ?>
	
</div>



<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>