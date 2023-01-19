@extends('web.layout')


@section('title')
    Post Page
@endsection


@section('main')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">{{$post->title}}</h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">{{$post->dateFormat()}}</div>
                    <!-- Post categories-->
                    <div class="text-muted fst-italic mb-2">{{$author->name}}</div>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="{{asset('image_for_web/'.$post->image)}}" alt="..." /></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4">{{$post->content}}</p>
                     </section>
            </article>
            <!-- Comments section-->
            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <!-- Comment form-->
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif

                        @if (session()->has('delete'))
                        <div class="alert alert-danger">
                            {{session('delete')}}
                        </div>
                    @endif

                        @if (session()->has('fail'))
                        <div class="alert alert-danger">
                            {{session('fail')}}
                        </div>
                    @endif
                        <form action="{{route('add-comment')}}" method="POST" class="mb-4">
                             @csrf
                            <textarea name="comment"  class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                              <input name="post_id" type="hidden" value="{{$post->id}}">
                              <input type="hidden" name="user_id" value="{{$author->id}}"> 
                              @error('comment')
                                  <p class="text-danger">{{$message}}</p>
                              @enderror

                              @error('user_id')
                                <p class="text-danger">{{$message}}</p>
                              @enderror
                            <button class="btn btn-primary" type="submit">comment</button>
            
                        </form>
                        @if (count($comments) ==0)
                        <div class="d-flex">
                            
                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                            <div class="ms-3">
                                <div class="fw-bold">No comments yet ..!!</div>
                                
                            </div>
                        </div>      


                        @endif

                        @foreach ($comments as $comment)
                            
                        
                        <div  class="d-flex">
                            
                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                            <div class="ms-3 allC">
                                <div class="fw-bold">{{$author->name}}</div>
                                {{$comment->comment}}
                                @can("delete-comment")
                                <a style="color: red" href="{{route('delete-comment' , ['commentId' => $comment->id])}}">
                                    <i class="fa-solid fa-trash "></i>
                                  </a>
                                 @endcan 

                                   @can("update-comment")
                                   <span data-AA="{{$comment->id}}" data-comment="{{$comment->comment}}" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: green" class ="editC">
                                    <i  class="fa-solid fa-user-pen "></i>
                                  </span>
                                   @endcan
                                   
                                
                            </div>
                           
                        </div>

                        @endforeach
                        
                    </div>
                </div>
            </section>
        </div>
       
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Comment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="formEdit" action="{{route('comment-update')}}" method="POST" class="mb-4">
            @csrf
           <textarea id="commentTar" name="comment"  class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
             <input name="post_id" type="hidden" value="{{$post->id}}">
             <input type="hidden" name="user_id" value="{{$author->id}}"> 
             <input type="hidden" name="id">
             @error('comment')
                 <p class="text-danger">{{$message}}</p>
             @enderror

             @error('user_id')
               <p class="text-danger">{{$message}}</p>
             @enderror
    

       
          
          <button type="submit" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </form>
         
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
    <script>

        $(".editC").on('click' , function(){

            var comment =  $(this).data('comment');
            $("#commentTar").val(comment);
             var commid =  $(this).data('aa');
            
            $("#formEdit input[name=id]").val(commid);

        })
        
        
       

      

    </script>
@endsection
