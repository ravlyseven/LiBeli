@extends('layouts/sidebar')

@section('title')
<title>Libeli - Profile</title>
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
                        </div>
                        
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="">Email</label>
                            <input name="email" id="email" value="{{ Auth::user()->email }}" type="email" class="form-control @error('email') is-invalid @enderror ">
                        </div>

                        <div class="position-relative form-group">
                            <label class="">Phone Number</label>
                            <input name="phone" id="phone" value="{{ Auth::user()->phone }}" type="number" class="form-control">
                        </div>
                        
                        <div class="position-relative form-group">
                            <label class="">Kecamatan</label>
                            <input name="kecamatan" id="kecamatan" value="{{ Auth::user()->kecamatan }}" type="text" class="form-control">
                        </div>

                        <div class="position-relative form-group">
                            <label class="">Address</label>
                            <input name="address" id="address" value="{{ Auth::user()->address }}" type="text" class="form-control">
                        </div>

                        <div class="position-relative form-group">
                            <label class="">Gender</label>
                            <input name="gender" id="gender" value="{{ Auth::user()->gender }}" type="text" class="form-control">
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
            
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Bisa Kirim?</h5>
                    <form method="POST" action="{{ url('profile_cod') }}">
                        @csrf                           
                            @if(\Auth::user()->hasAnyRole('penjual'))
                                @if(Auth::user()->cod == 0)
                                    <button class="mt-1 btn btn-primary" type="submit">Ya</button>
                                @else
                                    <button class="mt-1 btn btn-primary" type="submit">Tidak</button>
                                @endif
                            @endif
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection