@extends('master')
@section('content')


        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-8">
                    @auth()
                    <div class="d-flex justify-content-between align-items-center border p-4 rounded-3 mb-3">

                        <h4 class="">Welcome
                            <br>
                            <span class="fw-bold">{{ auth()->user()->name }}</span>
                        </h4>

                        <a href="{{ route('post.create') }}" class="btn btn-lg btn-primary">Create Post</a>
                    </div>
                    @endauth
                    <div class="posts">
                       @forelse($posts as $post)
                            <div class="post mb-4">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="{{ asset('storage/cover/'.$post->cover) }}" alt="" class="rounded w-100 h-350" style="object-fit: cover">
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="d-flex flex-lg-column justify-content-between h-350 py-4">
                                            <div class="">
                                                <h4 class="fw-bold">{{ $post->title }}</h4>
                                                <p class="text-black-50 mb-0">{{ $post->excerpt }}</p>
                                            </div>
                                            <div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <img src="{{ asset($post->user->photo) }}" alt="" class="rounded-circle shadow-sm user-img me-1">
                                                        <p class="mb-0">{{ $post->user->name }}
                                                            <br>
                                                            <i class="fas fa-calendar"></i>
                                                            {{ $post->created_at->format("d M Y") }}
                                                        </p>
                                                    </div>
                                                    <a href="{{ route('post.detail',$post->slug) }}" class="btn btn-outline-primary">See More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse

                    </div>
                </div>


            </div>

        </div>

    @endsection()

