<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php if($errors && count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if(Session::has('message_success')): ?>
                <div class="alert alert-success">
                    <?php echo e(Session::get('message_success')); ?>

                </div>
            <?php endif; ?>
            <form action="<?php echo e(route('messages.update',['id'=>$message->id])); ?>" method="post">
                
                <?php echo e(csrf_field()); ?>

                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value = '<?php echo e($message->title); ?>'/>
                <label for="content">Content</label>
                <textarea name="content" class="form-control"><?php echo e($message->content); ?></textarea><br />
                <input type="radio" name="important" value="1"> important<br>
                <input type="radio" name="important" value="0"> not important<br>
                <input type="submit" value="Create" class="btn btn-success"/>
                <input type="hidden" value="PUT" name = '_method' />
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>