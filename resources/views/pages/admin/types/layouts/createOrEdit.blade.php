@extends('layouts.admin.app')

@section('title')
    @yield('title')
@endsection

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">@yield('heading')</h1>
            </div>
            <form class="row g-3" action=" @yield('action') " method="POST">
                @csrf
                @yield('method')
                <div class="col-md-8">
                    <label for="name" class="form-label">Type Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $type->name) }}">
                </div>
                <div class="col-12">
                <button type="submit" class="btn btn-primary">@yield('buttonContent')</button>  
                </div>
            </form>
        </div>
    </div>
@endsection