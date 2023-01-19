@extends('web.layout')


@section('title')
    Blog Home
@endsection


@section('main')
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Welcome </h1>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container">
    <div class="row">
        
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @if (session()->has('success'))
                    <div class="alert alert-danger">
                        <p>{{session('success')}}</p>
                    </div>
                @endif
                @if (session()->has('unAuth'))
                <div class="alert alert-danger">
                    <p>{{session('unAuth')}}</p>
                </div>
            @endif
             
                @if (count($posts) == 0)
                    <p>no posts yet .. !!</p>
                @endif
                @foreach ($posts as $post)
                <div class="col-lg-6">
                    <!-- Blog post-->
                    <div class="card mb-4">
                        <a href="{{route('single-post' , ['postId' => $post->id])}}"><img class="card-img-top" src="{{asset('image_for_web/'. $post->image)}}" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">{{$post->dateFormat()}}</div>
                            <h2 class="card-title h4">{{$post->title}}</h2>
                            <p class="card-text">Author : {{$post->user->name}}</p>
                            <p class="card-text">{{Str::limit($post->content , 12)}}</p>
                            <a class="btn btn-primary" href="{{route('single-post' , ['postId' => $post->id])}}">Read more →</a>
                            <div class="mt-3">
                              
                                  <a style="color: red" href="{{route('delete-post', ['postId' => $post->id])}}">
                                    <i class="fa-solid fa-trash fa-xl"></i>
                                  </a>
                               
                                  
                                
                              
                                  <a style="color: green" href="{{route('edit-post' , ['postId' => $post->id])}}">
                                    <i class="fa-solid fa-user-pen fa-xl"></i>
                                   </a>
                        
                                 
                               
                         
                               
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            
            </div>
            <!-- Pagination-->
            <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                   {{$posts->links()}}
                </ul>
            </nav>
        </div>
        <!-- Side widgets-->
       
    </div>
</div>
@endsection