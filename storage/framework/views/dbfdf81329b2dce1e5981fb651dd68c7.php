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
                    <a href="<?php echo e(route('Envios/Relatorios/Export')); ?>" class="btn bg-fr text-white">Exportar</a>
                </div>
            </div>
            <hr>
            <table class="table col-sm-12">
                <form action="<?php echo e(route('Envios/Relatorios/index')); ?>" method="GET" class="row d-flex justify-content-between">
                    <div class="col-sm-2">
                        <input type="search" class="form-control" name="pesquisa" placeholder="Pesquisa" value="<?php echo e($Pesquisa); ?>">
                    </div>
                </form>
                <br>
                <thead class="bg-fr text-white">
                    <tr>
                        <th>Remetente</th>
                        <th>Destinatário</th>
                        <th>Assunto</th>
                        <th>Mensagem</th>
                        <th>Anexos</th>
                        <th>Data de Envio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $Registros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($r->Remetente); ?></td>
                        <td><?php echo e($r->Destinatario); ?></td>
                        <td><?php echo e($r->Assunto); ?></td>
                        <td><?php echo e($r->Mensagem); ?></td>
                        <td>
                            <ul>
                                <?php $__currentLoopData = json_decode($r->Anexos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e($aj->Nome); ?>"><?php echo e($aj->Nome); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </td>
                        <td><?php echo e(date('d/m/Y',strtotime($r->DTEnvio))); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="<?php echo e($Anterior); ?>">Anterior</a></li>
                  <?php for($i=$primeiraPagina;$i<$ultimaPagina;$i++): ?>
                    <?php if($i<=$linksPaginaveis): ?>
                        <li class="page-item <?php echo e(($page==$i) ? 'active' : ''); ?>"><a class="page-link" href="<?php echo e($Atual.'?pesquisa='.$Pesquisa.'&page='.$i); ?>"><?php echo e($i); ?></a></li>
                    <?php endif; ?>
                  <?php endfor; ?>
                  <li class="page-item"><a class="page-link" href="<?php echo e($Proximo); ?>">Próximo</a></li>
                </ul>
            </nav>
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
<?php endif; ?><?php /**PATH C:\Projetos\FRMail\resources\views/Relatorios/index.blade.php ENDPATH**/ ?>