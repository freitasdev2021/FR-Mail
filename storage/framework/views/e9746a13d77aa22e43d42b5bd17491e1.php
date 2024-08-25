<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FR Mail: Registro</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
    <link rel="icon" type="image/x-icon" href="img/fricon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>
<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="<?php echo e(asset('img/logo.png')); ?>"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <h3 align="center">Bem-vindo(a)! Inscreva-se na plataforma</h3>
                <hr>
                <div class="col-md-12 p-2 text-white bg-success d-flex justify-content-center">
                    <strong>crie uma senha com ao menos 8 caracteres.</strong>
                </div>
                <br>
                <form id="form_acesso" action="<?php echo e(route('register')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field("POST"); ?>
                <div class="form-outline mb-4">
                    <input type="name" name="name" value="<?php echo e(old('name')); ?>" class="form-control form-control-lg <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required placeholder="Nome" />
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control form-control-lg <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required placeholder="Email" />
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <input type="password" name="password" class="form-control form-control-lg <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required placeholder="Senha" />
                </div>

                <div class="form-outline mb-3">
                    <input type="password" name="password_confirmation" class="form-control form-control-lg <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required placeholder="Confirme sua Senha" />
                </div>

                <label>Dados da Instituição</label>

                <div class="form-outline mb-3">
                    <input type="name" name="Nome" class="form-control form-control-lg" required placeholder="Nome da Instituição" />
                </div>

                <div class="form-outline mb-3">
                    <input type="text" name="CNPJ" class="form-control form-control-lg" required placeholder="CNPJ" />
                </div>

                <div class="form-outline mb-3">
                    <input list="ramos" id="ramoEmpresa" name="Ramo" placeholder="Selecione um ramo..." class="form-control form-control-lg">
                    <datalist id="ramos">
                        <option value="Agropecuária">
                        <option value="Alimentação">
                        <option value="Automotivo">
                        <option value="Bancário">
                        <option value="Comércio Exterior">
                        <option value="Construção Civil">
                        <option value="Educação">
                        <option value="Energia">
                        <option value="Entretenimento">
                        <option value="Indústria">
                        <option value="Mineração">
                        <option value="Saúde">
                        <option value="Segurança">
                        <option value="Serviços">
                        <option value="Tecnologia da Informação">
                        <option value="Telecomunicações">
                        <option value="Transporte">
                        <option value="Turismo">
                        <option value="Finanças">
                        <option value="Seguros">
                        <option value="Meio Ambiente">
                        <option value="Imobiliário">
                        <option value="Agronegócio">
                        <option value="Logística">
                        <option value="Comunicação">
                        <option value="Varejo">
                        <option value="Consultoria">
                        <option value="Auditoria">
                        <option value="Publicidade e Marketing">
                        <option value="Recursos Humanos">
                        <option value="Pesquisa e Desenvolvimento">
                        <option value="Biotecnologia">
                        <option value="Farmacêutica">
                        <option value="Produção Audiovisual">
                        <option value="Moda e Vestuário">
                        <option value="Esportes e Lazer">
                        <option value="Petróleo e Gás">
                        <option value="Jurídico">
                        <option value="Inovação">
                        <option value="Economia Criativa">
                        <option value="Artes">
                        <option value="Engenharia">
                        <option value="Arquitetura e Urbanismo">
                        <option value="Produtos de Consumo">
                        <option value="Hotelaria">
                        <option value="Bebidas">
                        <option value="Distribuição e Atacado">
                        <option value="Fintech">
                        <option value="Agricultura Orgânica">
                        <option value="Produção Cinematográfica">
                        <option value="E-commerce">
                        <option value="Escolas e Universidades">
                        <option value="Microfinanças">
                        <option value="Mobilidade Urbana">
                        <option value="Desenvolvimento de Software">
                        <option value="Cibersegurança">
                        <option value="Infraestrutura">
                        <option value="Relações Públicas">
                        <option value="Indústria Química">
                        <option value="Tecnologia Verde">
                        <option value="Energias Renováveis">
                        <option value="Associações e Fundações">
                        <option value="Setor Público">
                        <option value="Negócios Sociais">
                        <option value="Atividades Imobiliárias">
                    </datalist>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <strong>
                        <a class="text-primary" href="<?php echo e(route("login")); ?>" class="text-body">Já Está Cadastrado?</a>
                    </strong>
                </div>

                <div class="text-center text-lg-start mt-4 pt-2">
                    <button type="submit" class="btn btn-lg col-sm-12 bt-login">Registrar</button>
                </div>
                <br>
                <span class="error"></span>
                <!-- <strong class="btcliente"><a href='#'>Quero ser cliente(31 Dias Grátis sem compromisso)</a></strong> -->
                </form>
            </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/inputmask.js')); ?>"></script>
    <script>
        $(document).ready(function(){
            $("input[name=CNPJ]").inputmask('99.999.999/9999-99')
        })
    </script>
</body>
</html><?php /**PATH C:\Projetos\FRMail\resources\views/auth/register.blade.php ENDPATH**/ ?>