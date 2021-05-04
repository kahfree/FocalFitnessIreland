<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model {
    protected $builder;
    protected $table = 'post';
    protected $primaryKey = 'PostID';
    protected $allowedFields = ['PostID','ClientID','DateTime','Title','PostText','WorkoutID'];
    protected $useAutoIncrement = TRUE;

    public function getNumRows(){
        $builder = $this->builder();
        $query = $builder->countAllResults();
        return $query;
    }

    //This method gets all rows from the post table
    public function listAll(){
        $builder = $this->builder();
        $query = $builder->get();
        return $query;
    }

    //This method gets every post made by a client
    public function getAllPosts($ClientID)
    {
        $builder = $this->builder();
        $query = $builder->getWhere(['ClientID' => $ClientID])->getResult();
        return $query;
    }

    public function removePost($postID)
    {
        $builder = $this->builder();
        $query = $builder->where('PostID', $postID)->delete();
    }

    


}