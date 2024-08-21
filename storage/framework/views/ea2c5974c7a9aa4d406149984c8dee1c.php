<?php $__env->startSection('content'); ?>
<body className='snippet-body'>
    <body classname="snippet-body" id="body-pd" class="body-pd" cz-shortcut-listen="true">
       <header class="header bg-fr" id="header">
      
       </header>
       <div class="l-navbar show" id="nav-bar">
          <nav class="nav" >
             <div>
                <a href="<?php echo e(route('dashboard')); ?>" class="nav_logo"><i class='bx bx-envelope text-white'></i></i><span class="nav_logo-name">FR Mail</span> </a>
                <div class="nav_list">
                    <?php if (isset($component)) { $__componentOriginalb387443d4cc379b18e2c6b424d52cd7f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb387443d4cc379b18e2c6b424d52cd7f = $attributes; } ?>
<?php $component = App\View\Components\Modulo::resolve(['nome' => 'Remetentes','icon' => 'bx bx-mail-send','rota' => 'Remetentes/index','endereco' => 'Remetentes'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('Modulo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Modulo::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb387443d4cc379b18e2c6b424d52cd7f)): ?>
<?php $attributes = $__attributesOriginalb387443d4cc379b18e2c6b424d52cd7f; ?>
<?php unset($__attributesOriginalb387443d4cc379b18e2c6b424d52cd7f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb387443d4cc379b18e2c6b424d52cd7f)): ?>
<?php $component = $__componentOriginalb387443d4cc379b18e2c6b424d52cd7f; ?>
<?php unset($__componentOriginalb387443d4cc379b18e2c6b424d52cd7f); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalb387443d4cc379b18e2c6b424d52cd7f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb387443d4cc379b18e2c6b424d52cd7f = $attributes; } ?>
<?php $component = App\View\Components\Modulo::resolve(['nome' => 'Contatos','icon' => 'bx bxs-contact','rota' => 'Contatos/index','endereco' => 'Contatos'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('Modulo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Modulo::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb387443d4cc379b18e2c6b424d52cd7f)): ?>
<?php $attributes = $__attributesOriginalb387443d4cc379b18e2c6b424d52cd7f; ?>
<?php unset($__attributesOriginalb387443d4cc379b18e2c6b424d52cd7f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb387443d4cc379b18e2c6b424d52cd7f)): ?>
<?php $component = $__componentOriginalb387443d4cc379b18e2c6b424d52cd7f; ?>
<?php unset($__componentOriginalb387443d4cc379b18e2c6b424d52cd7f); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalb387443d4cc379b18e2c6b424d52cd7f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb387443d4cc379b18e2c6b424d52cd7f = $attributes; } ?>
<?php $component = App\View\Components\Modulo::resolve(['nome' => 'Envios','icon' => 'bx bx-right-arrow-alt','rota' => 'Envios/index','endereco' => 'Envios'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('Modulo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Modulo::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb387443d4cc379b18e2c6b424d52cd7f)): ?>
<?php $attributes = $__attributesOriginalb387443d4cc379b18e2c6b424d52cd7f; ?>
<?php unset($__attributesOriginalb387443d4cc379b18e2c6b424d52cd7f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb387443d4cc379b18e2c6b424d52cd7f)): ?>
<?php $component = $__componentOriginalb387443d4cc379b18e2c6b424d52cd7f; ?>
<?php unset($__componentOriginalb387443d4cc379b18e2c6b424d52cd7f); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalb387443d4cc379b18e2c6b424d52cd7f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb387443d4cc379b18e2c6b424d52cd7f = $attributes; } ?>
<?php $component = App\View\Components\Modulo::resolve(['nome' => 'API e SMTP','icon' => 'bx bx-code-alt','rota' => 'Developer/index','endereco' => 'Developer'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('Modulo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Modulo::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb387443d4cc379b18e2c6b424d52cd7f)): ?>
<?php $attributes = $__attributesOriginalb387443d4cc379b18e2c6b424d52cd7f; ?>
<?php unset($__attributesOriginalb387443d4cc379b18e2c6b424d52cd7f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb387443d4cc379b18e2c6b424d52cd7f)): ?>
<?php $component = $__componentOriginalb387443d4cc379b18e2c6b424d52cd7f; ?>
<?php unset($__componentOriginalb387443d4cc379b18e2c6b424d52cd7f); ?>
<?php endif; ?>
                </div>
             </div>
             <form action="<?php echo e(route('logout')); ?>" method="POST">
               <?php echo csrf_field(); ?>
               <button class="nav_link sair" type="submit"><i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span> </button>
             </form>
          </nav>
       </div>
       <!--Container Main start-->
       <div class="bari" style="margin-top:100px; margin-right:15px;">
          <?php echo e($slot); ?>

       </div>
       <!--Container Main end-->
       <script>
         // windowHeight = $(window).height()
         // $(".bari").css("height",windowHeight)
       </script>
 </body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\FRMail\resources\views/components/frtecnologia.blade.php ENDPATH**/ ?>