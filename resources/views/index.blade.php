@extends('master')
@section('content')

    @auth()
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="d-flex justify-content-between align-items-center border p-4 rounded-3">

                        <h4 class="">Welcome
                            <br>
                            <span class="fw-bold">{{ auth()->user()->name }}</span>
                        </h4>

                        <a href="{{ route('post.create') }}" class="btn btn-lg btn-primary">Create Post</a>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    @endsection()
