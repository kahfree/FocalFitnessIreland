<div class="container">
    <div class="row">
        <div class="col-12 col-sm8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper">
            <div class="container">
                <h3>Add A Workout</h3>
                <hr>
                <?php if (session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <form class="" action="<?php echo base_url();?>/addWorkout" method="post">

                <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="workoutName">Workout Name</label>
                        <input type="text" class="form-control" name="workoutName" id="workoutName">
                    </div>
                </div>
                
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="totalDuration">Total Duration</label>
                            <select name="totalDuration" id="totalDuration">
                                <option value="900">15 minutes</option>
                                <option value="1800">30 minutes</option>
                            </select>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="featured">Featured</label>
                            <select name="featured" id="featured">
                                <option value="1">True</option>
                                <option value="0">False</option>
                            </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <h4>Exercises In Workout</h4>
                        <?php
                        for($i = 1; $i <= 6; $i++){
                        echo '<h5>Exercise '.$i.'</h5>';
                        echo '<div class="row">';
                        echo '<div class="col-12 col-sm-6">';
                        echo '<label for="exercise'.$i.'ID">Exercise ID</label>';
                        echo '<input type="text" class="form-control" name="exercise'.$i.'ID" id="exercise'.$i.'ID">';
                        echo '</div>';
                        echo '<div class="col-12 col-sm-6">';
                        echo '<label for="exercise'.$i.'Duration">Exercise Duration</label>';
                        echo '<div class="row ml-3">';
                        echo '<select name="exercise'.$i.'Duration" id="exercise'.$i.'Duration">';
                        echo '<option value="15">15 seconds</option>';
                        echo '<option value="30">30 seconds</option>';
                        echo '<option value="45">45 seconds</option>';
                        echo '<option value="60">60 seconds</option>';
                        echo '<option value="75">75 seconds</option>';
                        echo '<option value="90">90 seconds</option>';
                        echo '</select>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        }
                        ?>
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
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                    
                </div>
                </form>
                        <div class="col-12 col-sm-2 offset-10">
                            <a href="<?php echo base_url();?>/workouts"><button  class="btn btn-danger">Cancel</button></a>
                        </div>
            
            </div>
        </div>
    </div>
</div>
</div>