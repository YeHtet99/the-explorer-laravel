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

