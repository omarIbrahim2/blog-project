<?php

namespace App\Repositories;

use App\Interfaces\RepoInterface;
use App\Models\Comment;

class CommentRepo implements RepoInterface {

    public function create($data)
  {
      return Comment::create($data);
  }

  public function find($postId){
      
      return Comment::findOrFail($postId);
  }

  public function update($comment, $data)
  {
    

     return $comment->update($data);
  }

  public function delete($comment)
  {

    

     return $comment->delete();
    
  }

 


 
}