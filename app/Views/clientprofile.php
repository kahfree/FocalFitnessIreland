<?php
    echo '<div class="container">';
    echo '<h1>'.$client->FirstName."'s Profile</h1>";
    echo '<div class="row">';
    echo '<div class="col-md-6">';
    echo '<div class="border p-2 rounded">';
    echo '<h3>'.$client->FirstName.' '.$client->LastName.'</h3>';
    echo '<h4>'.$client->Email.'</h4>';
    echo '<a href="'.base_url().'/editProfile">Edit Profile</a>';
    echo '</div>';
    echo '</div>';
    foreach($client_posts as $post)
    {
        
        echo "<div class='col-md-6 mb-2 '>";
                    echo '<div class="card">';
                    
                    echo '<div class="card-header">';
                    echo "<h5 class='card-title'><span class='font-weight-bold'>".$post->Title." </span> </h5>";
                    echo '<h6 class="card-subtitle mb-2 text-muted">Posted @ '.($post->DateTime).'  </h6>';
                    echo '</div>';
                    echo '<div class="card-body">';
                   
                    echo '<p class="card-text"><span class="font-weight-bold"></span> '.($post->PostText).'  </p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
        
    }
    echo '</div>';
echo '</div>';
echo '</div>';
?>