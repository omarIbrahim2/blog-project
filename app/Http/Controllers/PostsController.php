<?php

namespace App\Http\Controllers;

use App\helpers\ImageUpload;
use Illuminate\Http\Request;
use App\Repositories\PostsRepo;
use App\Http\Requests\AddPostReq;
use App\Http\Requests\EditPostReq;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    private $postRepo;

    public function __construct(PostSRepo $postRepo)
    {
        $this->postRepo = $postRepo;
    }



    public function create(){
       $authUserId =  Auth::user()->id;
        return view('web.addPost')->with([
            "userId" => $authUserId,  
        ]);
    }


    public function edit($postId){

        $post = $this->postRepo->find($postId);
        if (! Gate::allows("update-post" , $post)) {
            return back()->with("unAuth" , "unAuthorized to update post");
        }
        $userId = Auth::user()->id;
        return view('web.editPost')->with([
            'post' => $post,
            'userId' => $userId
        ]);
    }

    public function update(EditPostReq $request){

       $request->validated();

        $post = $this->postRepo->find($request->id);
        if (! Gate::allows("update-post" , $post)) {
            return back()->with("unAuth" , "unAuthorized to update post");
        }
        $imagePath = $post->image;
    
    
        if($request->has('image')){
           
            Storage::delete($post->image);

          $imagePath = ImageUpload::upload($request->file('image') , 'Posts');


        }

 
     $action = $this->postRepo->update($post , [
            'title' => $request->title,
            'content'=> $request->content,
            'author' => $request->author,
            'image' => $imagePath
        ] );


        if ($action) {
         
            return back()->with('success' , "post Updated Successfully");
        }else{
            return back()->with('fail' , "problem in updating post");
        }



    }


    public function save(AddPostReq $request){

        $request->validated();

        if ($request->has('image')) {
            
            $imagePath = ImageUpload::upload($request->file('image') , 'Posts');
        }



       $post = $this->postRepo->create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'image' => $imagePath,
        ]);


        if ($post) {
            return back()->with('success' , 'post added successfully');
        }

        return back()->with('fail' , 'problem in adding post');
    }


    public function delete($postId){

        $post = $this->postRepo->find($postId);

        if (! Gate::allows("delete-post" , $post)) {
            return back()->with("unAuth" , "unAuthorized to delete post");
        }
       $action = $this->postRepo->delete($post);

       if ($action) {
          return back()->with('success' , "post deleted successfully");
       }

       return back()->with('fail' , 'problem in deletion');
    }


    public function show($postId){

        $post = $this->postRepo->find($postId);

        $author = $post->user;

        $comments = $this->postRepo->postComments($post);

        return view('web.post')->with([
           'post' => $post,
           "author" => $author,
           'comments' => $comments
        ]);
    }

    


}
