<?php

namespace App\Models;

use CodeIgniter\Model;

class ExerciseModel extends Model {
    protected $builder;
    protected $table = 'exercise';
    protected $primaryKey = 'ExerciseID';
    protected $allowedFields = ['ExerciseID','ExName','ExDescription','ExGifPath','ExNeedsEquipment'];
    protected $useAutoIncrement = TRUE;

    //This method gets every row in the exercise table
    public function listAll(){
        $builder = $this->builder();
        $query = $builder->get();
        return $query;
    }

    //This method gets an individual exercise by the exercise's ID
    public function getExercise($exerciseID)
    {
        $builder = $this->builder();
        $query = $builder->getWhere(['ExerciseID' => $exerciseID])->getFirstRow();
        return $query;
    }

    public function removeExercise($exerciseID)
    {
        $builder = $this->builder();
        $query = $builder->where('ExerciseID', $exerciseID)->delete();
    }

    public function ExercisesFromSet($ExerciseSet, $musclesWorked, $exerciseDuration)
    {
        
        $exercises = '<div class="row">';
        $builder = $this->builder();
        $counter = 0;
        $i = 0;
        foreach($ExerciseSet as $exercise)
        {
            $row = $this->getExercise($exercise);
            $exercises .= '<div class="col-md-4 mb-3">';

            $exercises .= '<div class="border p-3 rounded">';
            $exercises .= "<h3><span class='font-weight-bold'>Name:</span> ".$row->ExName."</h3>";
            if($row->ExGifPath)
                $exercises .= "<img src='".base_url().$row->ExGifPath."'>";
            else
                $exercises .="<img src='".base_url()."/assets/gifs/underConstruction.gif'>";
            $exercises .= '<button class="button btn-primary mt-2 rounded" type="button" data-toggle="collapse" data-target="#exerciseDescription'.$row->ExerciseID.'">View Description</button>';
            $exercises .= '<div class="collapse" id="exerciseDescription'.$row->ExerciseID.'"><p><span class="font-weight-bold " >Description:</span> '.$row->ExDescription.'</p></div>';

            $exercises .='<p><span class="font-weight-bold">Needs Equipment:</span> ';
                    
            if($row->ExNeedsEquipment)
                $exercises .= 'Yes</p>';
            else
                $exercises .='No</p>';
            $exercises .= '<p><span class="font-weight-bold">Muscles Targeted: </span>'.$musclesWorked[$counter].'</p>';

            $exercises .='<p id="exercise_duration"><span class="font-weight-bold">Duration: </span>'.$exerciseDuration[$i].' seconds</p>';
            $exercises .= '</div></div>';
            $counter += 1; $i += 1;
        }
        $exercises .= '</div>';
        return $exercises;
    }

    public function liveSearchExercise($term){
        $builder = $this->builder();
        if(!($term))
            $query = $builder->get();
        else
            $query = $builder->like('ExName',$term)->get();
        return $query->getResult();
    }
}
