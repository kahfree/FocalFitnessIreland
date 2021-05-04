<div class="container">
    <h1 class="text-center">All the exercises in the database</h1>
    <form class="d-flex input-group w-50 offset-3" action="<?php echo base_url();?>/search" method="post">
        <input
          type="search"
          class="form-control"
          placeholder="Exercise name"
          aria-label="Search"
          name="key"
        />
        <button
          class="btn btn-outline-primary"
          type="submit"
          data-mdb-ripple-color="dark"
        >
          Search
        </button>
      </form>
    <a href="<?=base_url()?>/addExercise"><input type="button" class="btn btn-success mb-3" value="Add exercise"></a>
    <div class="row">
            <?php
                foreach( $exercise_data->getResult() as $row)
                {

                    echo "<div class='col-md-4 mb-2'>";
                    echo '<div class="border p-3">';
                    echo "<h3><span class='font-weight-bold'>Name:</span> ".$row->ExName."</h3>";
                    if($row->ExGifPath)
                        echo "<img src='".base_url().$row->ExGifPath."'>";
                    else
                        echo "<img src='assets\gifs\underConstruction.gif'>";
                        echo '<button class="button btn-primary rounded mt-2" type="button" data-toggle="collapse" data-target="#exerciseDescription'.$row->ExerciseID.'">View Description</button>';
                    echo '<div class="collapse" id="exerciseDescription'.$row->ExerciseID.'"><p><span class="font-weight-bold " >Description:</span> '.$row->ExDescription.'</p></div>';
                    echo '<p><span class="font-weight-bold">Muscles Targeted: </span>'.rtrim($musclesExercised[$row->ExName],', ').'</p>';

                    echo '<p><span class="font-weight-bold">Needs Equipment:</span> ';
                            
                    if($row->ExNeedsEquipment)
                        echo 'Yes';
                    else
                        echo 'No';
                    echo '</p>';
                    echo '<p>';
                    echo '<a class ="workout-link" href="'.base_url().'/editExercise/'.$row->ExerciseID.'">';
                    echo '<input type="button" class="btn btn-success m-1" value="Edit">';
                    echo '</a>';
                    echo '<a class ="workout-link" href="'.base_url().'/removeExercise/'.$row->ExerciseID.'">';
                    echo '<input type="button" class="btn btn-danger m-1" value="Remove">';
                    echo '</a></p>';
                    echo '</div>';
                    echo '</div>';

                }
            ?>
        </div>
</div> 