@extends('master')
@section('title') Edit Profile @endsection
@section('content')
    <div class="container">
        <div class="row min-vh-100">
            <div class="d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <div class="text-center mb-3">
                    <h4>Edit Profile</h4>
                    <img src="{{ auth()->user()->photo }}" alt="" class="profile-img">
                    <p class="mb-0">{{ auth()->user()->name }}</p>
                    <p class="mb-0">{{ auth()->user()->email }}</p>
                </div>
                <form action="{{ route('update-Profile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="photo" accept="image/jpeg,image/png" class="d-none">
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="@error('name') is-invalid @enderror form-control" id="YourName" value="{{ auth()->user()->name }}" placeholder="name@example.com">
                        <label for="YourName">Your Name</label>
                    </div>
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-floating mb-3">
                        <input type="text" disabled class="form-control" id="floatingPassword"value="{{ auth()->user()->email }}" placeholder="Password">
                        <label for="floatingPassword">Your Email</label>
                    </div>
                   <div class="text-center">
                       <button class="btn btn-primary">Update</button>
                   </div>
                </form>
            </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let profileImage=document.querySelector('.profile-img');
        let profileInput=document.querySelector("[name='photo']");
        profileImage.addEventListener('click',function (){
            profileInput.click()
        })
        profileInput.addEventListener('change',function (){
            let file=profileInput.files[0];
            let reader=new FileReader();
            reader.onload=function (){
                profileImage.src=reader.result;
            }
            reader.readAsDataURL(file);
        })

    </script>
@endpush
