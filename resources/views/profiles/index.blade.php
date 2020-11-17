@extends('layouts/sidebar')

@section('title')
<title>Updates</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Profile Information</h5>
                    <form class="" method="POST" action="">
                        <input type="hidden" name="_token" value="">                            
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="">Name</label>
                            <input name="name" id="name" value="{{ Auth::user()->name }}" type="text" class="form-control ">
                        </div>
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="">Email</label>
                            <input name="email" id="email" value="{{ Auth::user()->email }}" type="email" class="form-control ">
                        </div>
                            <button class="mt-1 btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection