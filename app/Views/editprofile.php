<div class="container">
    <div class="row">
        <div class="col-12 col-sm8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper">
            <div class="container">
                <h3><?= $client->FirstName.' '.$client->LastName ?></h3>
                <hr>
                <?php if (session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <form class="" action="<?php echo base_url();?>/editProfile" method="post">

                <div class="row">
                <div class="col-12 col-sm-6">
                <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" value="<?= set_value('firstname', $client->FirstName) ?>">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" value="<?= set_value('lastname', $client->LastName) ?>">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email',$client->Email) ?>")>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="pass_word">Password</label>
                        <input type="password" class="form-control" name="pass_word" id="pass_word" value="<?= set_value('pass_word') ?>">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="password_confirm">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="<?= set_value('password_confirm') ?>">
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
                            <button type="submit" class="btn btn-primary">Update</button>
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