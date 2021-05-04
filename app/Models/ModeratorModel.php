<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeratorModel extends Model {
    protected $builder;
    protected $table = 'moderator';
    protected $primaryKey = 'Email';
    protected $allowedFields = ['Email','FirstName','LastName','ModeratorPassword'];
    protected $useAutoIncrement = FALSE;

    //This method gets the moderator from the table by email
    public function getModerator($email){
        $builder = $this->builder();
        $query = $builder->getWhere(['Email' => $email])->getFirstRow();
        return $query;
    }

    //This method checks if the user's credentials match any row in the table
    public function validateModeratorLogin($email,$password){
        $moderator = $this->getModerator($email);
        if($moderator){
        if($email === $moderator->Email && hash('ripemd160',$password) === $moderator->ModeratorPassword)
            return true;
        }
        return false;
    }

}