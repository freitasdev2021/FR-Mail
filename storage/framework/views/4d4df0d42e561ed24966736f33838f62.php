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
    <!----SMTP---->
    <div class="card">
        <div class="card-header bg-fr text-white">
            <strong>SMTP</strong>
        </div>
        <div class="card-body">
          <ul>
            <li>SMTP: mail.freventosdigitais.com.br</li>
            <li>Porta: 587</li>
          </ul>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header bg-fr text-white">
            <strong>API - Todas as Respostas são em JSON</strong>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>Seu Token de API:</strong> <?php echo e($APIToken); ?></p>
            <p class="card-text"><strong>Seu ID de Instituicao:</strong> <?php echo e($IDInstituicao); ?></p>
            <p class="card-text"><strong>Seu ID de Usuario:</strong> <?php echo e($IDUser); ?></p>
            <dl>
                <dt>Consultar Relatórios</dt>
                <dd>
                    <ul>
                        <li>
                            Headers: Authorization: Bearer {SEU TOKEN}
                        </li>
                        <li>
                            Endpoint: www.frmail.com/api/Relatorio
                        </li>
                        <li>
                            Metodo: GET
                        </li>
                    </ul>
                </dd>
                <hr>
                <dt>Enviar Email</dt>
                <dd>
                    <ul>
                        <li>
                            Headers: Authorization: Bearer {SEU TOKEN}
                        </li>
                        <li>
                            Endpoint: www.frmail.com/api/Relatorio
                        </li>
                        <li>
                            Metodo: POST
                        </li>
                    </ul>
                    <p class="card-text"><strong>Body</strong></p>
                    <ul>
                        <li>
                            Remetente: 'Email do Remetente'
                        </li>
                        <li>
                            Destinatario: ['email1@exemplo.com','email2@exemplo.com']
                        </li>
                        <li>
                            Assunto : 'seu assunto'
                        </li>
                        <li>
                            Mensagem : 'sua mensagem'
                        </li>
                        <li>
                            IDUser: 'Seu ID de Usuario'
                        </li>
                        <li>
                            IDInstituicao: 'Seu ID de Instituicao'
                        </li>
                    </ul>
                </dd>
            </dl>
        </div>
    </div>
    <!---TESTE-->
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc25e9b41b94c53f8551ad3badd408151)): ?>
<?php $attributes = $__attributesOriginalc25e9b41b94c53f8551ad3badd408151; ?>
<?php unset($__attributesOriginalc25e9b41b94c53f8551ad3badd408151); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc25e9b41b94c53f8551ad3badd408151)): ?>
<?php $component = $__componentOriginalc25e9b41b94c53f8551ad3badd408151; ?>
<?php unset($__componentOriginalc25e9b41b94c53f8551ad3badd408151); ?>
<?php endif; ?><?php /**PATH C:\Projetos\FRMail\resources\views/developer/index.blade.php ENDPATH**/ ?>