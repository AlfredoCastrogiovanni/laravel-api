@extends('layouts.admin.app')

@section('title', 'Your Profile')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Your Profile</h5>
                    <div class="card-body">
                        <h2 class="card-title">{{ $user->name }}</h2>
                        <p class="card-text"><span class="fw-bold">Bio:</span> {{ $user->UserDetail->bio }}</p>
                        <p class="card-text"><span class="fw-bold">Email:</span> {{ $user->email }}</p>
                        <p class="card-text"><span class="fw-bold">Address:</span> {{ $user->UserDetail->address }}</p>
                        <p class="card-text"><span class="fw-bold">Phone:</span> {{ $user->UserDetail->phone_number }}</p>
                        <p class="card-text">
                            <span class="fw-bold">Website:</span> 
                            <a href="{{ $user->UserDetail->website }}" target="_blank" class="link-underline link-underline-opacity-0">{{ $user->UserDetail->website }}</a>
                        </p>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection