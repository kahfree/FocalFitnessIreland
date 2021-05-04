<?php

namespace App\Models;

use CodeIgniter\Model;

class ExercisesInWorkoutModel extends Model {
    protected $builder;
    protected $table = 'exercises_in_workout';
    protected $primaryKey = 'WorkoutID';
    protected $allowedFields = ['WorkoutID','ExerciseID','ExerciseDuration'];
    protected $useAutoIncrement = FALSE;


    //This method gets each exercise in a workout
    //An inner join between 'exercise' and 'exercises_in_workout' tables to get the muscles worked for each exercise
    //The method returns HTML to display on the 'viewworkout' page
    public function WorkoutExercises($workoutID, $musclesWorked)
    {
        $exercises = '<div class="row">';
        $builder = $this->builder();
        $query = $builder->join('exercise', 'exercise.ExerciseID = exercises_in_workout.ExerciseID');
        $counter = 0;
        foreach($query->getWhere(['exercises_in_workout.WorkoutID' => $workoutID])->getResult() as $row)
        {
            $exercises .= '<div class="col-md-4 mb-3">';

            $exercises .= '<div class="border p-3 rounded">';
            $exercises .= "<h3><span class='font-weight-bold'>Name:</span> ".$row->ExName."</h3>";
            if($row->ExGifPath)
                $exercises .= "<img src='".base_url().$row->ExGifPath."'>";
            else
                $exercises .="<img src='".base_url()."/assets/gifs/underConstruction.gif'>";
            $exercises .= '<button class="button btn-primary rounded mt-2" type="button" data-toggle="collapse" data-target="#exerciseDescription'.$row->ExerciseID.'">View Description</button>';
            $exercises .= '<div class="collapse" id="exerciseDescription'.$row->ExerciseID.'"><p><span class="font-weight-bold " >Description:</span> '.$row->ExDescription.'</p></div>';

            $exercises .='<p><span class="font-weight-bold">Needs Equipment:</span> ';
                    
            if($row->ExNeedsEquipment)
                $exercises .= 'Yes</p>';
            else
                $exercises .='No</p>';
            $exercises .= '<p><span class="font-weight-bold">Muscles Targeted: </span>'.$musclesWorked[$counter].'</p>';

            $exercises .='<p><span class="font-weight-bold">Duration: </span>'.$row->ExerciseDuration.' seconds</p>';
            $exercises .= '</div></div>';
            $counter += 1;
        }
        $exercises .= '</div>';
        return $exercises;
    }


    //This method gets the total duration of a workout in seconds
    public function totalSecondsExercising($workoutID)
    {
        $builder = $this->builder();
        $query = $builder->where('WorkoutID',$workoutID)->selectSum('ExerciseDuration')->get()->getResultArray();
        return $query[0]['ExerciseDuration'];
    }

    //This method gets each exercise in the workout
    public function exercisesInWorkoutStrArr($workoutID)
    {
        
        $exercises = [];
        $builder = $this->builder();
        $query = $builder->join('exercise', 'exercise.ExerciseID = exercises_in_workout.ExerciseID');
        foreach($query->getWhere(['exercises_in_workout.WorkoutID' => $workoutID])->getResult() as $row)
        {
            array_push($exercises,$row->ExerciseID);
        }

        return $exercises;
    }

    public function deleteWorkout($workoutID){
        $builder = $this->builder();
        $query = $builder->where('WorkoutID', $workoutID)->delete();
    }

    public function getExercisesByWorkout($workoutID){
        $builder = $this->builder();
        $query = $builder->where('WorkoutID',$workoutID)->select('ExerciseID, ExerciseDuration')->get();
        return $query;
    }

}