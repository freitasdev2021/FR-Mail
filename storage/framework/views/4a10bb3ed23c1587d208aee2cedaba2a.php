<?php if (isset($component)) { $__componentOriginalc25e9b41b94c53f8551ad3badd408151 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc25e9b41b94c53f8551ad3badd408151 = $attributes; } ?>
<?php $component = App\View\Components\Frtecnologia::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('frtecnologia'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Frtecnologia::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="fr-card p-0 shadow col-sm-12">
        <div class="fr-card-header">
           <?php $__currentLoopData = $submodulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (isset($component)) { $__componentOriginalbc6776cef5f3df46955d545f683b78f1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbc6776cef5f3df46955d545f683b78f1 = $attributes; } ?>
<?php $component = App\View\Components\Submodulo::resolve(['nome' => ''.e($s['nome']).'','endereco' => ''.e($s['endereco']).'','rota' => ''.e(route($s['rota'])).'','icon' => 'bx bx-list-ul'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('Submodulo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Submodulo::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbc6776cef5f3df46955d545f683b78f1)): ?>
<?php $attributes = $__attributesOriginalbc6776cef5f3df46955d545f683b78f1; ?>
<?php unset($__attributesOriginalbc6776cef5f3df46955d545f683b78f1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbc6776cef5f3df46955d545f683b78f1)): ?>
<?php $component = $__componentOriginalbc6776cef5f3df46955d545f683b78f1; ?>
<?php unset($__componentOriginalbc6776cef5f3df46955d545f683b78f1); ?>
<?php endif; ?>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="fr-card-body">
            <div class="row">
                <div class="col-auto">
                    <a class="btn btn-success bg-fr text-white" href="<?php echo e(route('Contatos/Listas/Novo')); ?>">Adicionar</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <table class="table" id="escolas" data-rota="<?php echo e(route('Contatos/Listas/list')); ?>">
                    <thead class="bg-fr text-white">
                        <tr>
                            <th>Nome da Lista</th>
                            <th>Descrição</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc25e9b41b94c53f8551ad3badd408151)): ?>
<?php $attributes = $__attributesOriginalc25e9b41b94c53f8551ad3badd408151; ?>
<?php unset($__attributesOriginalc25e9b41b94c53f8551ad3badd408151); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc25e9b41b94c53f8551ad3badd408151)): ?>
<?php $component = $__componentOriginalc25e9b41b94c53f8551ad3badd408151; ?>
<?php unset($__componentOriginalc25e9b41b94c53f8551ad3badd408151); ?>
<?php endif; ?><?php /**PATH C:\Projetos\FRMail\resources\views/Emails/listas.blade.php ENDPATH**/ ?>