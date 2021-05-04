<div class="container">
    <h1 class="text-center">All Posts for <?php echo $client->FirstName.' '.$client->LastName?></h1>
    <div class="row">
                <?php if (session()->get('success')): ?>
                    <div class="alert alert-success col-md-6 offset-3 text-center" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->get('unsuccessful')): ?>
                    <div class="alert alert-danger col-md-6 offset-3 text-center" role="alert">
                        <?= session()->get('unsuccessful') ?>
                    </div>
                <?php endif; ?>
            <?php
                foreach($posts as $post)
                {
                    
                    echo "<div class='col-md-6 mb-2 '>";
                                echo '<div class="card">';
                                
                                echo '<div class="card-header">';
                                echo "<h5 class='card-title'><span class='font-weight-bold'>".$post->Title." </span> </h5>";
                                echo '<h6 class="card-subtitle mb-2 text-muted">Posted @ '.($post->DateTime).'  </h6>';
                                echo '</div>';
                                echo '<div class="card-body">';
                               
                                echo '<p class="card-text"><span class="font-weight-bold"></span> '.($post->PostText).'  </p>';
                                echo '<a class ="workout-link" href="'.base_url().'/removePost/'.$post->PostID.'/'.$client->ClientID.'">';
                                echo '<input type="button" class="btn btn-danger" value="Remove">';
                                echo '</a></p>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                    
                }
            ?>
        </div>
</div> 