<div class="container">
    <div class="row">
        <div class="col-12 col-sm8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper">
            <div class="container">
                <h3>Add An Exercise</h3>
                <hr>
                <?php if (session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <form class="" action="<?php echo base_url();?>/addExercise" method="post">

                <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="exerciseName">Exercise Name</label>
                        <input type="text" class="form-control" name="exerciseName" id="exeerciseName">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="equipment">Needs Equipment</label>
                        <div class="row">
                            <select name="equipment" id="equipment">
                                <option value="1">True</option>
                                <option value="0">False</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description"></textarea>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="gifpath">GIF Path</label>
                        <input type="text" class="form-control" name="gifpath" id="gifpath">
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
                            <a href="<?php echo base_url();?>/exercises"><button  class="btn btn-danger">Cancel</button></a>
                        </div>
            
            </div>
        </div>
    </div>
</div>
</div>