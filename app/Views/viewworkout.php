<div class="container">
    <h1 class="text-center col-md-12">Workout</h1>
    <div class="row">
            <?php
                $setLength =$secondsExercised/60;
                $numberOfSets = floor(($workout_data[0]['TotalDuration']/60)/$setLength);
                $totalrestLength = $workout_data[0]['TotalDuration'] % $secondsExercised;
                $restLength = floor($totalrestLength / $numberOfSets-1);
                //was in 'restLengh calculation previouslty:
                //(floor($workout_data[0]['TotalDuration'] / $secondsExercised)-1)
                    echo '<div class="col-md-8 offset-2 rounded">';
                    echo '<h3 class="text-center"><span class="font-weight-bold">Total Duration: </span> '.($workout_data[0]['TotalDuration']/60).' minutes. </h3>';
                    echo '<h3 class="text-center"><span class="font-weight-bold">Set Length: </span> '.$setLength.' minutes. </h3>';
                    echo '<h3 class="text-center"><span class="font-weight-bold">Rest Length (per set): </span> '.$restLength.' seconds. </h3>';
                    echo '<h3 class="text-center"><span class="font-weight-bold">Number of Sets : </span> '.$numberOfSets.'</h3>';
                    echo '<h3 class="text-center"><span class="font-weight-bold">User Made: </span> ';
                    if($workout_data[0]['UserMade'])
                        echo 'Yes</h3>';
                    else
                        echo 'No</h3>';
                    echo '<h3 class="text-center"><span class="font-weight-bold"> Featured: </span> ';
                    if($workout_data[0]['Featured'])
                        echo 'Yes</h3>';
                    else
                        echo 'No</h3>';
                    echo '<h3 class="text-center"><span class="font-weight-bold"> Muscles Targeted: </span> ';
                    foreach($musclesForWorkout as $muscle)
                    {
                            echo $muscle.', ';
                    }
                    echo '</h3>';
                    echo '</div>';

                    

                    
                    
                    echo '</div>';
                    echo '<div class="col-md-12">';
                    echo '<h2> Exercises in '.$workout_data[0]['Name'].'</h2>';
                    echo '</div>';
                   echo $exercise_data;
            ?>
        </div>
</div> 