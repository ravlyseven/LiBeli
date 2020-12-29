@extends('layouts/sidebar')

@section('title')
<title>Libeli - Dashboard</title>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      
      <!-- Tampilan Akun -->
      @foreach($users as $user)
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <!-- <div class="col-auto">
                  <img>
                </div> -->
                <div class="col mr-2">
                  <div class="h5 mb-1 text-s font-weight-bold text-primary">{{$user->name}}</div>
                  <div class="h5 mb-1 text-s font-weight-bold text-primary">{{$user->email}}</div>
                  <div class="h5 mb-1 text-s font-weight-bold text-primary">ID : {{$user->id}}</div>
                  <div class="h5 mb-1 text-s font-weight-bold text-primary">
                    @if($user->hasAnyRole('admin'))
                      <p class="btn btn-danger">Admin</p> @endif
                    @if($user->hasAnyRole('penjual'))
                      <p class="btn btn-warning">Penjual</p> @endif
                    @if($user->hasAnyRole('admin'))
                    @elseif($user->hasAnyRole('penjual'))
                    @else
                      <form action="{{ url('profile_role') }}/{{ $user->id }}" method="post">
                      @csrf
                        <p class="btn btn-dark">Customer</p>
                        <button class="mt-1 btn btn-primary" type="submit">Jadikan Penjual</button>
                      </form>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
