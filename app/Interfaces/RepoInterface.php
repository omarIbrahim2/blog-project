<?php

namespace App\Interfaces;

use App\Models\Post;

interface RepoInterface{
    
    public function create($data);


    public function find($id);


    public function update($post  , $data);


    
    public function delete($id);
    
  



}