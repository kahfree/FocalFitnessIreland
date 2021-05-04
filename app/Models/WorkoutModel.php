<?php

namespace App\Models;

use CodeIgniter\Model;

class WorkoutModel extends Model {
    protected $builder;
    protected $table = 'workout';
    protected $primaryKey = 'WorkoutID';
    protected $allowedFields = ['WorkoutID','Name','TotalDuration','UserMade','Featured'];
    protected $useAutoIncrement = TRUE;

    public function getNumRows(){
        $builder = $this->builder();
        $query = $builder->countAllResults();
        return $query;
    }

    public function listAll(){
        $builder = $this->builder();
        $query = $builder->get();
        return $query;
    }

    //This method gets a workout from the workout table by the workout's ID
    public function getWorkout($workoutID)
    {
        $builder = $this->builder();
        $query = $builder->getWhere(['WorkoutId' => $workoutID])->getResultArray();
        return $query;
    }

    //This method gets every workout in the table that has the featured column set to true
    public function getFeatured()
    {
        $builder = $this->builder();
        $query = $builder->getWhere(['Featured' => 1]);
        return $query;
    }

    public function getUserMadeWorkout()
    {
        $builder = $this->builder();
        $query = $builder->select('WorkoutID')->orderBy('WorkoutID','DESC')->get();
        return $query->getResult()[0]->WorkoutID;
    }

    public function removeWorkout($workoutID)
    {
        $builder = $this->builder();
        $query = $builder->where('WorkoutID', $workoutID)->delete();
    }


}