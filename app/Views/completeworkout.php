<div class="container">
    <div class="row">
        <div class="col-12 col-sm8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper">
            <div class="container">
                <h3>Post to profile</h3>
                <hr>
                <?php if (session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <form class="" action="<?php echo base_url();?>/post/<?= $workout_data['WorkoutID'] ?>" method="post">

                <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="workoutName">Workout Name</label>
                        <input type="text" class="form-control" name="workoutName" id="workoutName" value="<?= set_value('workoutName',$workout_data['Name']) ?>">
                    </div>
                </div>

                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="DateTime">Posted at</label>
                        <?php date_default_timezone_set('Europe/Dublin'); ?>
                        <input type="text" class="form-control" name="DateTime" readonly id="DateTime" value="<?= set_value('DateTime',date('Y/m/d H:i:s')) ?>")>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="text" class="form-control" name="email" readonly id="email" value="<?= set_value('email',session()->get('email')) ?>")>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="posttext">Post Body</label>
                        <textarea class="form-control" name="posttext" id="posttext" placeholder="Type something here..."></textarea>
                    </div>
                </div>
                
                    </div>
                
                    <?php if(isset($validation)): ?>
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-12 col-sm-2">
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                        
                    
                </div>
                </form>
                <div class="col-12 col-sm-2 offset-10">
                            <a href="<?php echo base_url();?>/savedWorkouts"><button  class="btn btn-danger">Cancel</button></a>
                        </div>
                        </div>
            
            </div>
        </div>
    </div>
</div>
</div>