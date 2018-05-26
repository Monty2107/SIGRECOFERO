<?php $__env->startSection('content'); ?>

<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body">
      <div class="login-logo">
          <img src="<?php echo asset('img/gano4.png'); ?>" height="200px">
      </div>
    <p class="login-box-msg">Ingrese Credenciales Para Iniciar</p>

    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
      <?php echo e(csrf_field()); ?>


      <div class="form-group has-feedback<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
          <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>" required autofocus>
        <?php if($errors->has('email')): ?>
        <span class="help-block">
          <strong><?php echo e($errors->first('email')); ?></strong>
        </span>
        <?php endif; ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
          <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
          <?php if($errors->has('password')): ?>
          <span class="help-block">
            <strong><?php echo e($errors->first('password')); ?></strong>
          </span>
          <?php endif; ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <center>
          <div class="checkbox icheck">
            <label>
                <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Recordarme
            </label>
          </div>
          </center>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  
    <!-- /.social-auth-links -->
    <center>
    <a href="<?php echo e(url('/password/reset')); ?>">He Olvidado Mi Contraseña</a><br>
    </center>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('global.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>