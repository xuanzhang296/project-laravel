<?php $__env->startSection('content'); ?>
<div class="jumbotron">
      <h1><?php echo e($message->title); ?></h1>
      <p><?php echo e($message->content); ?></p>
      <p><a class="btn btn-success btn-lg" href="<?php echo e(route('messages.create')); ?>" role="button">Create new Message</a>
      <a class="btn btn-primary btn-lg" href="<?php echo e(route('messages.edit',['id'=>$message->id])); ?>" role="button">Edit Message</a>
      <form method='POST' action='<?php echo e(route("messages.destroy",["id"=>$message->id])); ?>'>
            <?php echo e(csrf_field()); ?>

            <input class='btn btn-danger btn-lg' type='submit' value='delete'>
            <input type='hidden' name='_method' value='DELETE' />
      </form></p>
      
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>