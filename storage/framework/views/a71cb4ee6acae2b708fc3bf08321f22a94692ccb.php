<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div >
            <form action="<?php echo e(route('profile.update',['id'=>$user->id])); ?>" method="post">
            
            <?php echo e(csrf_field()); ?>


                    <div>
                      <label >Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Enter Name" value = "<?php echo e($user->name); ?>">
                    </div>

                    <div>
                      <label >Email address</label>
                      <input type="email" class="form-control" id="email" placeholder="Enter Email" value="<?php echo e($user->email); ?>">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div>
                      <label >location</label>
                      <input type="text" class="form-control" id="location" placeholder="Enter Location" value = "<?php echo e($user->location); ?>">
                    </div>

                    <div>
                      <label >phone</label>
                      <input type="text" class="form-control" id="phone" placeholder="Enter Phone Num" value="<?php echo e($user->phone); ?>"> 
                    </div>

                    <br/>

                    <input type="submit" value="Update" class="btn btn-success" />


                      
            </form>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>