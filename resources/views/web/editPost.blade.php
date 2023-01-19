@extends('web.layout')

@section('title')
    Edit Post
@endsection


@section('main')
<div  class="row">
    <div class="col-lg-12">
 <div class="container mt-5">
    <h3>Edit Post</h3>
    
    <form action="{{route('update-post')}}"  method="POST" enctype="multipart/form-data">
      @csrf
       @if (session()->has('success'))
           <div class="alert alert-success">
               <p>{{session('success')}}</p>
           </div>
       @endif
        <div class="mb-3">
          <label for="exampleInputEmail1">Title</label>
          <input value="{{$post->title}}" type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp" placeholder="Enter Title">
        </div>
          @error('title')
           <p class="text-danger">{{$message}}</p>
          @enderror
        
      
            
            <input value="{{$userId}}" type="hidden" class="form-control" id="exampleInputEmail1" name="author" aria-describedby="emailHelp" placeholder="Author">

            <input value="{{$post->id}}" type="hidden" class="form-control" id="exampleInputEmail1" name="id" aria-describedby="emailHelp" placeholder="Author">
          
          
          <div class="mb-3">
            <label for="exampleInputEmail1">Content</label>
            <textarea  type="text" class="form-control" id="exampleInputEmail1" name="content" aria-describedby="emailHelp" placeholder="Enter Content">{{$post->content}}</textarea>
          </div>
          @error('content')
           <p class="text-danger">{{$message}}</p>
          @enderror 
          
          <div class="input-group mb-3">
            <input  name="image" type="file" class="form-control" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
          </div>
          <div class="mb-4">
            <img style="width: 100px" src="{{asset('image_for_web/' . $post->image)}}" alt="">
          </div>
         
          @error('image')
            <p class="text-danger">{{$message}}</p>
          @enderror
        
       
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>
    </div>
</div>
</div>
</div>
    @endsection