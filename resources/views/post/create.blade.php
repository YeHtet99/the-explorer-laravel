@extends('master')
@section('title')
    Create:Post The Explorer
@endsection
@section('content')


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Create Post</h4>

                        <i class="fas fa-calendar">{{ date("d M Y") }}</i>
                    </div>
                    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating rounded mb-4">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="postTitle" placeholder="no need" value="{{ old('title') }}">
                            <label for="postTitle">Post Title</label>
                            @error('title')
                                <div class="invalid-feedback ps-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <input type="file" name="cover" id="cover" class="d-none" accept="image/jpeg,image/png">
                            <img src="{{ asset('default-img.png') }}" alt="" id="cover-preview"  class="w-100 rounded cover-img @error('cover') is-invalid border border-danger @enderror">
                            @error('cover')
                            <div class="invalid-feedback ps-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 400px">{{ old('description') }}</textarea>
                            <label for="floatingTextarea2">Share Your Experience</label>
                            @error('description')
                            <div class="invalid-feedback ps-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class="btn btn-lg btn-primary ">
                                <i class="fas fa-message"></i>
                                Create Post</button>
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
