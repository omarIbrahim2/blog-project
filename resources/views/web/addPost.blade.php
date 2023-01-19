@extends('web.layout')

@section('title')
    Add Post
@endsection


@section('main')
<div  class="row">
    <div class="col-lg-12">
 <div class="container mt-5">
    <h3>Add Post</h3>
    
    <form action="{{route('add-post')}}"  method="POST" enctype="multipart/form-data">
      @csrf
       @if (session()->has('success'))
           <div class="alert alert-success">
               <p>{{session('success')}}</p>
           </div>
       @endif
        <div class="mb-3">
          <label for="exampleInputEmail1">Title</label>
          <input value="{{old('title')}}" type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp" placeholder="Enter Title">
        </div>
          @error('title')
           <p class="text-danger">{{$message}}</p>
          @enderror
        
      
            
            <input value="{{$userId}}" type="hidden" class="form-control" id="exampleInputEmail1" name="author" aria-describedby="emailHelp" placeholder="Author">
          

          <div class="mb-3">
            <label for="exampleInputEmail1">Content</label>
            <textarea  type="text" class="form-control" id="exampleInputEmail1" name="content" aria-describedby="emailHelp" placeholder="Enter Content">{{old('content')}}</textarea>
          </div>
          @error('content')
           <p class="text-danger">{{$message}}</p>
          @enderror 
          
          <div class="input-group mb-3">
            <input value="{{old('image')}}" name="image" type="file" class="form-control" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
          </div>
          @error('image')
            <p class="text-danger">{{$message}}</p>
          @enderror
        
       
        <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>
</div>
</div>
</div>
    @endsection