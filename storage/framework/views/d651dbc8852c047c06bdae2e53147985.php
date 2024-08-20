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
            <?php if (isset($component)) { $__componentOriginal18ad2e0d264f9740dc73fff715357c28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18ad2e0d264f9740dc73fff715357c28 = $attributes; } ?>
<?php $component = App\View\Components\Form::resolve(['action' => ''.e(route('Contatos/Save')).'','enctype' => 'multipart/form-data'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Form::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="row">
                    <div class="col-sm-1">
                        <label>Tipo</label>
                        <select name="Acao" class="form-control">
                            <option value="Adicionar">Adicionar</option>
                            <option value="Exportar">Importar</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label>Lista</label>
                        <select name="IDLista" class="form-control">
                            <option value="0">Nenhuma</option>
                            <?php $__currentLoopData = $Listas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($l->id); ?>"><?php echo e($l->Nome); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-4 escrever">
                        <label>Titulo</label>
                        <input type="text" name="Nome" class="form-control">
                    </div>
                    <div class="col-sm-3 escrever">
                        <label>Email</label>
                        <input type="email" name="Email" class="form-control">
                    </div>
                    <div class="col-sm-7 importar">
                        <label>Arquivo</label>
                        <input type="file" name="Arquivo" class="form-control">
                    </div>
                    <div class="col-sm-1">
                        <label style="visibility: hidden">a</label>
                        <input type="submit" class="form-control btn bg-fr text-white" value="Enviar">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <table class="table" id="escolas" data-rota="<?php echo e(route('Contatos/lista')); ?>">
                        <thead class="bg-fr text-white">
                            <tr>
                                <th>Título</th>
                                <th>Email</th>
                                <th>Lista</th>
                                <th>Adicionado em</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $attributes = $__attributesOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__attributesOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18ad2e0d264f9740dc73fff715357c28)): ?>
<?php $component = $__componentOriginal18ad2e0d264f9740dc73fff715357c28; ?>
<?php unset($__componentOriginal18ad2e0d264f9740dc73fff715357c28); ?>
<?php endif; ?>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".importar").hide()

            $("select[name=Acao]").on("change",function(){
                if($(this).val() == "Adicionar"){
                    $(".importar").hide()
                    $(".escrever").show()
                }else{
                    $(".importar").show()
                    $(".escrever").hide()
                }
            })
        })
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc25e9b41b94c53f8551ad3badd408151)): ?>
<?php $attributes = $__attributesOriginalc25e9b41b94c53f8551ad3badd408151; ?>
<?php unset($__attributesOriginalc25e9b41b94c53f8551ad3badd408151); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc25e9b41b94c53f8551ad3badd408151)): ?>
<?php $component = $__componentOriginalc25e9b41b94c53f8551ad3badd408151; ?>
<?php unset($__componentOriginalc25e9b41b94c53f8551ad3badd408151); ?>
<?php endif; ?><?php /**PATH C:\Projetos\FRMail\resources\views/Emails/index.blade.php ENDPATH**/ ?>