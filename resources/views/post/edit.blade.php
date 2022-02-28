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
                <form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data" id="form-update">
                    @csrf
                    @method('put')
                    <div class="form-floating rounded mb-4">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title',$post->title) }}" name="title" id="postTitle" placeholder="no need">
                        <label for="postTitle">Post Title</label>
                        @error('title')
                        <div class="invalid-feedback ps-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input type="file" name="cover" id="cover" class="d-none" accept="image/jpeg,image/png">
                        <img src="{{ asset('storage/cover/'.$post->cover) }}" alt="" id="cover-preview" class="w-100 rounded cover-img  @error('cover') is-invalid border border-danger @enderror"">
                        @error('cover')
                        <div class="invalid-feedback ps-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 400px">{{ old('description',$post->description) }}</textarea>
                        <label for="floatingTextarea2">Share Your Experience</label>
                        @error('description')
                        <div class="invalid-feedback ps-2">{{ $message }}</div>
                        @enderror
                    </div>

                </form>
                <div class="border rounded p-4 mb-4" id="gallery">
                    <div class="d-flex align-items-stretch">
                        <div class="border rounded px-5 d-flex justify-content-center align-items-center me-2" style="height: 150px" id="inputUi">
                            <i class="fas fa-upload"></i>
                        </div>
                        <div class="d-flex overflow-scroll me-2" style="height:150px">
                            @forelse($post->galleries as $gallery)

                                <img src="{{ asset('storage/gallery/'.$gallery->photo) }}" class="rounded h-100">

                                <form action="{{ route('gallery.destroy',$gallery->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash-alt fa-fw"></i>
                                    </button>
                                </form>

                            @empty
                                <p class="mb-0">There is No Photo</p>
                            @endforelse
                        </div>
                    </div>
                    <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data" id="gallery-upload">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}" >
                        <div>
                            <input type="file" id="gallery-input" name="galleries[]" multiple class="d-none @error('galleries') is-invalid @enderror @error('galleries.*') is-invalid @enderror">
                            @error('galleries')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                            @error('galleries.*')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="text-center">
                    <button class="btn btn-lg btn-primary" form="form-update">
                        <i class="fas fa-message"></i>
                        Update Post</button>
                </div>

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

        let inputUi=document.getElementById('inputUi');
        let galleryInput=document.getElementById('gallery-input');
        let galleryUpload=document.getElementById('gallery-upload');
        inputUi.addEventListener('click',function (){
            galleryInput.click();
        })
        galleryInput.addEventListener('change',function (){
            galleryUpload.submit();
        })
    </script>
@endpush
