<div class="container">
    <div class="row">
        <div class="col-12 col-sm8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper">
            <div class="container">
                <h3>Generate Custom Workout</h3>
                <hr>
                <?php if (session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->get('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->get('error') ?>
                    </div>
                <?php endif; ?>
                <form class="" action="<?php echo base_url();?>/generateWorkout" method="post">

                <div class="row">
                <div class="col-12 ">
                <div class="form-group">
                <h4>Select muscle groups to workout: </h4>
                <input type="checkbox" id="Chest" name="Chest" value="Chest">
                <label for="vehicle1"> Chest</label>
                <input type="checkbox" id="Back" name="Back" value="Back">
                <label for="vehicle1"> Back</label>
                <input type="checkbox" id="Triceps" name="Triceps" value="Triceps">
                <label for="vehicle1"> Triceps</label>
                <input type="checkbox" id="Biceps" name="Biceps" value="Biceps">
                <label for="vehicle1"> Biceps</label><br>
                <input type="checkbox" id="Forearms" name="Forearms" value="Forearms">
                <label for="vehicle1"> Forearms</label>
                <input type="checkbox" id="Calfs" name="Calfs" value="Calfs">
                <label for="vehicle1"> Calfs</label>
                <input type="checkbox" id="Quads" name="Quads" value="Quads">
                <label for="vehicle1"> Quads</label>
                <input type="checkbox" id="Hamstrings" name="Hamstrings" value="Hamstrings">
                <label for="vehicle1"> Hamstrings</label><br>
                <input type="checkbox" id="Glutes" name="Glutes" value="Glutes">
                <label for="vehicle1"> Glutes</label>
                <input type="checkbox" id="Abs" name="Abs" value="Abs">
                <label for="vehicle1"> Abs</label>
                <input type="checkbox" id="Shoulders" name="Shoulders" value="Shoulders">
                <label for="vehicle1"> Shoulders</label>
                    </div>
                </div>
                <div class="col-12">
                <div class="form-group">
                        <label for="duration"><h4>Select workout duration</h4></label>
                        <select name="duration" id="duration">
                                <option value="15">15 minutes</option>
                                <option value="30">30 minutes</option>
                            </select>
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
                    <?php if (session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-success">Generate</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container">
    <div class="row">
        <?php 
            
        ?>
    </div>
</div>