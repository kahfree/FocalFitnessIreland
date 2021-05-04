<?php

namespace App\Models;

use CodeIgniter\Model;

class SavedWorkoutModel extends Model {
    protected $builder;
    protected $table = 'savedWorkout';
    protected $allowedFields = ['ClientID','WorkoutID'];
    protected $useAutoIncrement = FALSE;
    protected $primaryKey = 'WorkoutID';


    public function getNumRows(){
        $builder = $this->builder();
        $query = $builder->countAllResults();
        return $query;
    }

    //This method returns all rows of the saved workout table
    public function listAll(){
        $builder = $this->builder();
        $query = $builder->get();
        return $query;
    }

    //This method adds a workout to a clients saved workout list
    public function addToSaved($workoutID, $clientID)
    {
        echo 'WorkoutID: '.$workoutID.' ClientID '.$clientID;
        $session = session();
        $newData = [
            'ClientID' => $clientID,
            'WorkoutID' => $workoutID,
        ];
        //If the client already has this workout in their library
        if(!$this->validateInsert($workoutID,$clientID))
        {
            echo 'it was unsuccessful';
            $session->setFlashData('unsuccessful','Workout is already in your library');

        }
        //Otherwise, add it to the client's library
        else{
            echo 'it was successful';
            $this->insert($newData);
            $session->setFlashData('success','Workout has been successfully added to your library');
        }
    }

    //This method checks if a workout is in a client's saved workout list
    public function validateInsert($workoutID, $clientID)
    {
        $builder = $this->builder();
        if($builder->where('WorkoutID' ,$workoutID)->where('ClientID',$clientID)->countAllResults())
        {
            return false;
        }
        return true;
    }

    //This method gets the ID of every workout in a client's saved workout library
    public function allWorkoutsPerClient($clientID)
    {
        $builder = $this->builder();
        $query = $builder->select('WorkoutID')->where('ClientID',$clientID)->get()->getResult('array');
        if(count($query) > 0)
            return $query;
        return $query;
    }

    //This method removes the workout from the client's saved workout library
    public function removeFromSaved($workoutID, $clientID)
    {
        $builder = $this->builder();
        $query = $builder->where('WorkoutID' ,$workoutID)->where('ClientID',$clientID)->delete();
       
        return $query;
    }
        

}