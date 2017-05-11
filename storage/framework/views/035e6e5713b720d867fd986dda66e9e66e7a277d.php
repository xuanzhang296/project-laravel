<?php $__env->startSection('content'); ?>

<div class="jumbotron">
  
  <p><a class="btn btn-primary btn-lg" href="<?php echo e(route('messages.create')); ?>" role="button">Create new Message</a></p>
</div>

<?php if(Session::has('message_success')): ?>
                <div class="alert alert-success">
                    <?php echo e(Session::get('message_success')); ?>

                </div>
<?php endif; ?>

<div class ="row">
   <div class="col-md-1"></div>
   <div class="col-md-10">
   <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="panel panel-default">
  <div class="panel-heading"><?php echo e($message->title); ?></div>
  <div class="panel-body">
    <?php echo e($message->content); ?>

    <p>Create @ : <?php echo e(date('M D Y',strtotime($message->created_at))); ?>,
       Edit   @ : <?php echo e(date('M D Y',strtotime($message->updated_at))); ?>

    </p><br />

    <div>
      <a class="btn btn-success btn-sm" href="<?php echo e(route('messages.show',['id'=>$message->id])); ?>">View Message</a>
      <a class="btn btn-primary btn-sm" href="<?php echo e(route('messages.edit',['id'=>$message->id])); ?>">Edit Message</a>
      <a class="btn btn-danger btn-sm" href="<?php echo e(route('messages.send',['id'=>$message->id])); ?>">send Message</a>

      <?php if($message->important !== 0): ?>
      <h3><span class="label label-default">Important!!!</span></h3>
      <?php endif; ?>
    </div>
  </div>
</div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php echo e($messages->links()); ?>

   </div>
  <div class="col-md-1"></div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>