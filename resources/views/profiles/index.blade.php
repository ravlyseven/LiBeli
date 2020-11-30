@extends('layouts/sidebar')

@section('title')
<title>Updates</title>
@endsection

@section('content')
    <div class="row ml-3 mr-3">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Profile Information</h5>
                    <form method="POST" action="{{ url('profile') }}">
                        @csrf                           
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="">Name</label>
                            <input name="name" id="name" value="{{ Auth::user()->name }}" type="text" class="form-control ">
                            @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="">Email</label>
                            <input name="email" id="email" value="{{ Auth::user()->email }}" type="email" class="form-control @error('email') is-invalid @enderror ">
                            @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                            <button class="mt-1 btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Password</h5>
                    <form method="POST" action="{{ url('profile_password') }}">
                        @csrf                           
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="">New Password</label>
                            <input name="password" id="password" value="" type="text" class="form-control ">
                            @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                            <button class="mt-1 btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection