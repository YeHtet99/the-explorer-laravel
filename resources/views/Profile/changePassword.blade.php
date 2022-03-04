@extends('master')
@section('title') Change Password @endsection
@section('content')
    <div class="container">
        <div class="row min-vh-100">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6 col-xl-5">
                    <div class="text-center mb-3">
                        <h4 class="fw-bold">Update Password</h4>
                        <img src="{{ auth()->user()->photo }}" alt="" class="profile-img mb-3">
                        <p class="">{{ auth()->user()->name }}</p>
                        <p class="">{{ auth()->user()->email }}</p>
                    </div>
                    <form action="{{ route('update-Password') }}" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="password" class="@error('old_password') is-invalid @enderror form-control" id="currentPassword" name="old_password" placeholder="name@example.com">
                            <label for="currentPassword">Current Password</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">New Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" name="confirmPassword" placeholder="Password">
                            <label for="floatingPassword">Confirm Password</label>
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
