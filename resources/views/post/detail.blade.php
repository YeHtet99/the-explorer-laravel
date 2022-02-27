@extends('master')
@section('content')


    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-8">
                        <div class="post mb-4">
                            <div class="row">
                                <h4 class="fw-bold mb-4">{{ $post->title }}</h4>
                                <img src="{{ asset('storage/cover/'.$post->cover) }}" alt="" class="rounded-3 w-100 h-350 mb-4" style="object-fit: cover">
                                <p class="text-black-50 mb-4 post-detail">{{ $post->description }}</p>
                                <div class="mb-5">
                                    @auth()
                                    <h4 class="text-center fw-bold">User Comments</h4>
                                        @forelse($post->comments as $comment)
                                            <div class="comments mb-3 border rounded-3 p-3">

                                        <div class="d-flex justify-content-between align-items-md-baseline mb-3">
                                            <div class="d-flex">
                                                <img src="{{ asset($comment->user->photo) }}" alt="" class="rounded-circle shadow-sm user-img me-1">
                                                <p class="mb-0">{{ $comment->user->name }}
                                                    <br>
                                                    <i class="fas fa-calendar"></i>
                                                    {{ $comment->created_at->diffforhumans() }}
                                                </p>
                                            </div>
                                            @can('delete',$comment)
                                            <form action="{{ route('comment.destroy',$comment->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-outline-danger">
                                                    <i class="fas fa-trash-alt rounded-circle"></i>
                                                </button>
                                            </form>
                                            @endcan
                                        </div>
                                        <div>
                                            <p class="mb-0">
                                                {{ $comment->message }}
                                            </p>
                                        </div>
                                    </div>
                                        @empty
                                            <p class="">There is no comment</p>
                                        @endforelse
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">

                                            <form action="{{ route('comment.store') }}" method="post" id="comment-create">
                                                @csrf
                                                <div class="form-floating mb-3">
                                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                    <input type="text" name="message" class="form-control @error('message') is-invalid @enderror"  id="floatingInput" placeholder="Noneed" style="height: 150px;">
                                                    <label for="floatingInput">Comments</label>
                                                </div>
                                                @error('message')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                               <div class="text-center">
                                                   <button class="btn btn-primary">Add Comment</button>
                                               </div>
                                            </form>
                                        </div>
                                    </div>
                                        @endauth
                                </div>
                                <div class="d-flex justify-content-between align-items-center rounded p-2 border">
                                    <div class="d-flex">
                                        <img src="{{ asset($post->user->photo) }}" alt="" class="rounded-circle shadow-sm user-img me-1">
                                        <p class="mb-0">{{ $post->user->name }}
                                            <br>
                                            <i class="fas fa-calendar"></i>
                                            {{ $post->created_at->format("d M Y") }}
                                        </p>
                                    </div>
                                    <div>
                                        @auth()
                                            @can('delete',$post)
                                        <form action="{{ route('post.destroy',$post->id) }}" method="post" class="d-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger">
                                                <i class="fas fa-trash-alt fa-fw"></i>
                                            </button>
                                        </form>
                                            @endcan
                                        @can('update',$post)
                                        <a href="{{ route('post.edit',$post->id) }}" class="btn btn-outline-warning">
                                            <i class="fas fa-pencil-alt fa-fw"></i>
                                        </a>
                                                @endcan
                                        @endauth
                                        <a href="{{ route('index') }}" class="btn btn-outline-primary">See All</a>
                                    </div>
                                </div>


                            </div>
                        </div>
            </div>



        </div>

    </div>

@endsection()

