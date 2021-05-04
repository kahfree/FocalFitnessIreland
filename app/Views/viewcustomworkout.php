<div class="container">
    <h1 class="text-center col-md-12">Custom Workout</h1>
    <div class="row">
            <?php
            $setLength =$secondsExercised/60;
            $numberOfSets = floor($total_workout_duration/$setLength);
            $totalrestLength = ($total_workout_duration*60) % $secondsExercised;
            if($totalrestLength == 0){
                $numberOfSets -= 1;
                $totalrestLength = $secondsExercised;
                $restLength = floor($totalrestLength/ $numberOfSets-1);
            }
            else{
                $restLength = floor($totalrestLength / $numberOfSets-1);
            }
            
            //was in 'restLengh calculation previouslty:
            //(floor($workout_data[0]['TotalDuration'] / $secondsExercised)-1)
                echo '<div class="col-md-8 offset-2 rounded">';
                echo '<h3 class="text-center"><span class="font-weight-bold">Total Duration: </span> '.$total_workout_duration.' minutes. </h3>';
                echo '<h3 class="text-center"><span class="font-weight-bold">Set Length: </span> '.$setLength.' minutes. </h3>';
                echo '<h3 class="text-center"><span class="font-weight-bold">Rest Length (per set): </span> '.$restLength.' seconds. </h3>';
                echo '<h3 class="text-center"><span class="font-weight-bold">Number of Sets : </span> '.$numberOfSets.'</h3>';
                echo '<h3 class="text-center"><span class="font-weight-bold">User Made: </span> ';
               
                echo '<h3 class="text-center"><span class="font-weight-bold"> Muscles Targeted: </span> ';
                foreach($musclesForWorkout as $muscle)
                {
                        echo $muscle.', ';
                }
                echo '</h3>';
                echo '</div>';

                

                
                
                echo '</div>';
                echo '<div class="col-md-12">';
                echo '<h2> Exercises in Custom Workout</h2>';
                echo '</div>';
                   echo $exercise_data;
                   echo '<p>';
                echo '<a class ="workout-link" href="'.base_url().'/saveCustomWorkout/'.implode(",",$ExerciseList).'/'.$total_workout_duration.'/'.implode(",",$exerciseDuration).'">';
                echo '<input type="button" class="btn btn-warning" value="Save">';
                echo '</a></p>';
                echo '<p class="mb-6">Note: by saving this working you will be adding it to the database as a usermade workout for all to see</p>';
            ?>
        </div>
</div> 