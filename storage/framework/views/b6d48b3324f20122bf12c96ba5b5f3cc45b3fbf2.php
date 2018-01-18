<?php if(Session::has('success')): ?>

  <div id="alertSuccess" class="alert alert-success alert-position" role="alert">
    <strong>Success:</strong> <?php echo e(Session::get('success')); ?>

  </div>

<?php endif; ?>