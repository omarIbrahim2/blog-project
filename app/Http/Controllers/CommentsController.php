<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CommentRepo;
use App\Http\Requests\AddCommentReq;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    private $commentRepo;
    public function __construct(CommentRepo $commentRepo)
    {
       $this->commentRepo = $commentRepo;        
    }



    public function save(AddCommentReq $request){
      
        $request->validated();
    
           
       $author = Auth::user()->id;
    

        $comment = $this->commentRepo->create([
            'comment' => $request->comment,
            "post_id" => $request->post_id,
            "user_id" => $author,
        ]);


        return $comment ? 
            back()->with('success' , "comment added successfully"):
            back()->with('fail' , "problem in adding comment");


    }


    public function update(AddCommentReq $request){

        $request->validated();

    

        $comment = $this->commentRepo->find($request->id);

        if(! $comment){
           return back()->with('fail' , "comment failed to update");
        }


       $action =  $this->commentRepo->update($comment , [
            'comment' => $request->comment,
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
        ]);


        return $action ? 
            back()->with('success' , "comment updated successfully"):
            back()->with('fail' , "problem in updating comment");

    }

    public function delete($commentId){

        $comment = $this->commentRepo->find($commentId);

        // if (! Gate::allows("delete-post" , $post)) {
        //     return back()->with("unAuth" , "unAuthorized to delete post");
        // }
       $action = $this->commentRepo->delete($comment);

       if ($action) {
          return back()->with('delete' , "comment deleted successfully");
       }

       return back()->with('fail' , 'problem in deletion');
    }
}
