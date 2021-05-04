<div class="container">
    <h1 class="text-center">Your Saved Workouts</h1>
    <div class="row">
                <?php if (session()->get('success')): ?>
                    <div class="alert alert-success col-md-6 offset-3 text-center" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->get('Postsuccess')): ?>
                    <div class="alert alert-success col-md-6 offset-3 text-center" role="alert">
                        <?= session()->get('Postsuccess') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->get('unsuccessful')): ?>
                    <div class="alert alert-danger col-md-6 offset-3 text-center" role="alert">
                        <?= session()->get('unsuccessful') ?>
                    </div>
                <?php endif; ?>
                
            <?php
                $counter = 0;
                foreach( $workout_data as $row)
                {
                    echo "<div class='col-md-6 mb-2'>";
                    echo '<div class="border p-3 rounded">';
                    
                    echo "<h3><span class='font-weight-bold'>Name: </span> ".$row['Name']."</h3>";
                    echo '<p class="d-inline"><span class="font-weight-bold">Total Duration: </span> '.($row['TotalDuration']/60).' minutes. </p>';
                    echo '<p class="d-inline"><span class="font-weight-bold">User Made: </span> ';
                    if($row['UserMade'])
                        echo 'Yes';
                    else
                        echo 'No';
                    echo '<p class="d-inline"><span class="font-weight-bold"> Featured: </span> ';
                    if($row['Featured'])
                        echo 'Yes';
                    else
                        echo 'No';
                    echo '</p>';
                    echo '<p>';
                    echo '<a class ="workout-link" href="'.base_url().'/removeFromSaved/'.$row['WorkoutID'].'">';
                    echo '<input type="button" class="btn btn-danger mr-1" value="Remove">';
                    echo '</a>';
                    echo '<a class ="workout-link mr-1" href="'.base_url().'/workouts/'.$row['WorkoutID'].'">';
                    echo '<input type="button" class="btn btn-primary" value="View">';
                    echo '</a>';
                    echo '<a class ="workout-link" href="'.base_url().'/completeWorkout/'.$row['WorkoutID'].'">';
                    echo '<input type="button" class="btn btn-success" value="Complete">';
                    echo '</a></p>';
                    echo '</div>';
                    echo '</div>';
                    
                    
                    $counter += 1;
                }

                if($counter === 0)
                {
                    echo '<h1 class="col-md-8 mt-12 offset-3" style="color:gray;font-size:4em;">Nothing to see here!</h1>';
                }

            ?>
        </div>
</div> 