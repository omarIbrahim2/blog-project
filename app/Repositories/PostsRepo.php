<?php

namespace App\Repositories;

use App\Models\Post;
use App\Interfaces\RepoInterface;
use App\Models\User;

class PostsRepo implements RepoInterface{

  public function create($data)
  {
      return Post::create($data);
  }

  public function find($postId){
      
      return Post::findOrFail($postId);
  }

  public function update($post, $data)
  {
    

     return $post->update($data);
  }

  public function delete($post)
  {

    

     return $post->delete();
    
  }

  public function allPosts()
  {
    return  Post::with('user')->paginate(5);
  }


  public function postComments($post){
      
     return $post->comments;
  }

  

}