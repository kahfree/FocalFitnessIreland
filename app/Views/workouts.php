<div class="container">
    <h1 class="text-center">Every workout in the database</h1>
    <?php if(session()->get('userType') == 'Client'): ?>
    <a href="<?=base_url()?>/generateWorkout"><input type="button" class="btn btn-success mb-3" value="Generate Custom Workout"></a>
    <?php endif; ?>

    <?php if(session()->get('userType') == 'Moderator'): ?>
    <a href="<?=base_url()?>/addWorkout"><input type="button" class="btn btn-success mb-3" value="Add Workout"></a>
    <?php endif; ?>
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
                foreach( $workout_data->getResult() as $row)
                {
                    echo "<div class='col-md-6 mb-2'>";
                    echo '<div class="border p-3 rounded">';
                    
                    echo "<h3><span class='font-weight-bold'>Name: </span> ".$row->Name."</h3>";
                    echo '<p class="d-inline"><span class="font-weight-bold">Total Duration: </span> '.($row->TotalDuration/60).' minutes. </p>';
                    echo '<p class="d-inline"><span class="font-weight-bold">User Made: </span> ';
                    if($row->UserMade)
                        echo 'Yes';
                    else
                        echo 'No';
                    echo '<p class="d-inline"><span class="font-weight-bold"> Featured: </span> ';
                    if($row->Featured)
                        echo 'Yes';
                    else
                        echo 'No';
                    echo '</p>';
                    echo '<p>';
                    if(session()->get('userType') === 'Client')
                    {
                        echo '<a href="'.base_url().'/saveWorkout/'.$row->WorkoutID.'"><input type="button" class="btn btn-success" value="Save"></a> ';
                        echo '<a class ="workout-link" href="'.base_url().'/workouts/'.$row->WorkoutID.'">';
                        echo '<input type="button" class="btn btn-primary m-1" value="View">';
                        echo '</a>';
                    }
                    else{
                    echo '<a class ="workout-link" href="'.base_url().'/editWorkout/'.$row->WorkoutID.'">';
                    echo '<input type="button" class="btn btn-warning m-1" value="Edit">';
                    echo '</a>';
                    echo '<a class ="workout-link" href="'.base_url().'/removeWorkout/'.$row->WorkoutID.'">';
                    echo '<input type="button" class="btn btn-danger m-1" value="Remove">';
                    echo '</a>';
                    if($row->Featured == 0){
                    echo '<a class ="workout-link" href="'.base_url().'/addToFeatured/'.$row->WorkoutID.'">';
                    echo '<input type="button" class="btn btn-link m-1" value="Add to Featured">';
                    echo '</a></p>';
                    }
                }
                    echo '</div>';
                    echo '</div>';
                    

                }
            ?>
            
        </div>
</div> 