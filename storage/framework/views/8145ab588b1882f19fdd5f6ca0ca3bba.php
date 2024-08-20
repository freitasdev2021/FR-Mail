<div class="col-sm-12 p-2">
    <form action="<?php echo e($action); ?>" method="POST" enctype="<?php echo e($enctype); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field("POST"); ?>
        <?php if(session('success')): ?>
        <div class="col-sm-12 shadow p-2 bg-success text-white">
            <strong><?php echo e(session('success')); ?></strong>
        </div>
        <?php elseif(session('error')): ?>
        <div class="col-sm-12 shadow p-2 bg-danger text-white">
            <strong><?php echo e(session('error')); ?></strong>
        </div>
        <br>
        <?php endif; ?>
        <?php echo e($slot); ?>

    </form>  
</div>
<?php /**PATH C:\Projetos\FRMail\resources\views/components/Form.blade.php ENDPATH**/ ?>