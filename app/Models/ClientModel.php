<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model {
    protected $builder;
    protected $table = 'client';
    protected $primaryKey = 'ClientID';
    protected $allowedFields = ['ClientID','Email','FirstName','LastName','ClientPassword'];
    

    protected $useAutoIncrement = TRUE;

    //This method gets the client from the table using their email

    public function getClients()
    {
        $builder = $this->builder();
        $query = $builder->get();
        return $query;
    }

    public function getClientByEmail($clientEmail){
        $builder = $this->builder();
        $query = $builder->getWhere(['Email' => $clientEmail])->getFirstRow();
            return $query;
    }

    //This method gets the client from the table using their ID
    public function getClientByID($clientID)
    {
        $builder = $this->builder();
        $query = $builder->getWhere(['ClientID' => $clientID])->getFirstRow();
            return $query;
    }

    //This method checks if the user's credentials matches any row in the client table
    public function validateClientLogin($email,$password){
        $client = $this->getClientByEmail($email);
        if($client){
            print_r($client);
            print_r(hash('ripemd160',$password));
        if($email === $client->Email && hash('ripemd160',$password) === $client->ClientPassword)
            return true;

        }
        return false;
        
    }
}