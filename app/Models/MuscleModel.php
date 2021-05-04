<?php

namespace App\Models;

use CodeIgniter\Model;

class MuscleModel extends Model {
    protected $builder;
    protected $table = 'muscle';
    protected $primaryKey = 'MuscleID';
    protected $allowedFields = ['MuscleID','Name'];
    protected $useAutoIncrement = TRUE;

    //This method lists all the rows in the muscle table
    public function listAll(){
        $builder = $this->builder();
        $query = $builder->get();
        return $query;
    }

    public function getAllMuscleNames()
    {
        $builder = $this->builder();
        $query = $builder->select('Name')->get();
        return $query->getResultArray();
    }

    public function getMuscleFromName($muscleName)
    {
        $builder = $this->builder();
        $query = $builder->getWhere(['Name' => $muscleName]);
        return $query->getResultArray();
    }

}