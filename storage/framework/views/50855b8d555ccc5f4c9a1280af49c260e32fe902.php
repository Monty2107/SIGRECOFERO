<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Resetiar Password</div>
                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/password/email')); ?>">

                        <?php echo e(csrf_field()); ?>

                        <div class="login-logo">
                            <img src="<?php echo asset('img/gano4.png'); ?>" height="200px">
                        </div>
                        <div class="form-group">
                            <label class="label label-warning">Ingrese Con la Contraseña del Programador y Asi
                                Recuperar Su Contraseña, o Crear un Nuevo Usuario. Informacion Dada A Administracion.
                            </label>
                        </div>

                        <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a type="submit" class="btn btn-primary" href="<?php echo e(asset('/login')); ?>">
                                        REGRESAR PARA INICIAR
                                    </a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('global.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>