<?php $__env->startSection('container'); ?>

 <div id="resetear">
  <h2>Resetear contraseña</h2>
</div>
 <?php if(Session::has('status')): ?>
  <div class="alert alert-success">
   <?php echo e(Session::get('status')); ?>

  </div>
 <?php endif; ?>
 <?php if(count($errors) > 0): ?>
  <div class="alert alert-danger">
   Los datos introducidos en el formulario son incorrectos.
  </div>
 <?php endif; ?>
 <hr />
 <form method="POST" action="email">
  <?php echo e(csrf_field()); ?>

  <div class="form-group">
   <label for="email" id="resetear">Email</label>
   <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" />
   <div class="text-danger"><?php echo e($errors->first('email')); ?></div>
  </div>
  <button type="submit" class="btn btn-primary">Obtener un enlace para resetear mi contraseña</button>
 </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('MisVistas.layout2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>