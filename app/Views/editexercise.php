<div class="container">
    <div class="row">
        <div class="col-12 col-sm8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper">
            <div class="container">
                <h3><?= $exercise->ExName ?></h3>
                <hr>
                <?php if (session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <form class="" action="<?php echo base_url();?>/updateExercise" method="post">

                <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="exid">Exercise ID</label>
                        <input type="text" class="form-control" name="exid" readonly id="exid" value="<?= set_value('exid',$exercise->ExerciseID) ?>")>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="exerciseName">Exercise Name</label>
                        <input type="text" class="form-control" name="exerciseName" id="exeerciseName" value="<?= set_value('exerciseName',$exercise->ExName) ?>">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" ><?=$exercise->ExDescription?></textarea>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="gifpath">GIF Path</label>
                        <input type="text" class="form-control" name="gifpath" id="gifpath" value="<?= set_value('gifpath',$exercise->ExGifPath) ?>">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="equipment">Needs Equipment</label>
                        <input type="text" class="form-control" name="equipment" id="equipment" value="<?= set_value('equipment',$exercise->ExNeedsEquipment) ?>">
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
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </div>
                    
                </div>
                </form>
                        <div class="col-12 col-sm-2 offset-10">
                            <a href="<?php echo base_url();?>/exercises"><button  class="btn btn-danger">Cancel</button></a>
                        </div>
            
            </div>
        </div>
    </div>
</div>
</div>