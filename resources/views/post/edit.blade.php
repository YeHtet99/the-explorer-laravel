@extends('master')
@section('title')
    Edit Post : The Explorer
@endsection
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Update Post</h4>

                    <i class="fas fa-calendar">{{ date("d M Y") }}</i>
                </div>
                <form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-floating rounded mb-4">
                        <input type="text" class="form-control" value="{{ $post->title }}" name="title" id="postTitle" placeholder="no need">
                        <label for="postTitle">Post Title</label>
                    </div>
                    <div class="mb-4">
                        <input type="file" name="cover" id="cover" class="d-none">
                        <img src="{{ asset('storage/cover/'.$post->cover) }}" alt="" id="cover-preview" class="w-100 rounded cover-img">
                    </div>
                    <div class="form-floating mb-4">
                        <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 400px">{{ $post->description }}</textarea>
                        <label for="floatingTextarea2">Share Your Experience</label>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-lg btn-primary ">
                            <i class="fas fa-message"></i>
                            Update Post</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection()
@push('scripts')
    <script>
        let coverPreview=document.querySelector("#cover-preview");
        let cover=document.querySelector("#cover");
        coverPreview.addEventListener("click",function (){
            cover.click();
        });
        cover.addEventListener("change",function (){
            let file=cover.files[0];
            let reader=new FileReader();
            reader.onload=function (){
                coverPreview.src=reader.result;
            }
            reader.readAsDataURL(file);
        })
    </script>
@endpush
