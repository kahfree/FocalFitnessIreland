<div class="container">
    <h1 class="text-center">All Featured Workouts</h1>
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
                foreach($featured_workouts->getResult() as $row)
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
                        echo '<input type="button" class="btn btn-primary" value="View">';
                        echo '</a>';
                    }
                    else{
                    echo '<a class ="workout-link" href="'.base_url().'/removeFromFeatured/'.$row->WorkoutID.'">';
                    echo '<input type="button" class="btn btn-danger" value="Remove">';
                    echo '</a></p>';
                    }
                    echo '</div>';
                    echo '</div>';
                    

                }
            ?>
        </div>
</div> 