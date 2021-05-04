<?php

namespace App\Models;

use CodeIgniter\Model;

class MusclesExercisedModel extends Model {
    protected $builder;
    protected $table = 'muscles_exercised';
    protected $primaryKey = 'MuscleID';
    protected $allowedFields = ['MuscleID','ExerciseID'];
    protected $useAutoIncrement = FALSE;

    public function getNumRows(){
        $builder = $this->builder();
        $query = $builder->countAllResults();
        return $query;
    }

    //This method lists every row in the muscles_exercised table
    public function listAll(){
        $builder = $this->builder();
        $query = $builder->get();
        return $query;
    }

    //This method gets each muscle group used in each exercise
    //It returns each muscle worked as a string element in an array, separating each muscle by a comma
    //Example element in array would be "back, biceps"
    public function MusclesInExercise($exerciseID)
    {
        $muscleList = '';
        $builder = $this->builder();
        $query = $builder->join('muscle', 'muscle.MuscleID = muscles_exercised.MuscleID');
        foreach ($query->getWhere(['muscles_exercised.ExerciseID' => $exerciseID])->getResult() as $row)
        {
           $muscleList .= $row->Name.', ';
        }
        return $muscleList;
    }

    public function validateMuscleSelection($muscles)
    {
        $builder = $this->builder();
        $total = 0;
        foreach($muscles as $muscle)
        {
            $query = $builder->where('MuscleID', $muscle[0]['MuscleID'])->countAllResults();
            $total += $query;
        }
        //echo $total;
        if($total >= 3)
            return true;
        else
            return false;
    }

    //Returns an array of objects, each object represents an exercise and the muscle worked with it.
    public function getExercisesByMuscle($muscleID)
    {
        $builder = $this->builder();
        $query = $builder->getWhere(['MuscleID' => $muscleID]);
        return $query->getResult();
    }

}