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
                <div class="col-md-6">
                    <label for="name" class="form-label">Project Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $project->name) }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="day_to_make" class="form-label">Day To Make</label>
                    <input type="number" class="form-control @error('day_to_make') is-invalid @enderror" id="day_to_make" name="day_to_make" value="{{ old('day_to_make', $project->day_to_make) }}">
                    @error('day_to_make')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="type_id" class="form-label">Type</label>
                    <select class="form-select @error('type_id') is-invalid @enderror" id="type_id" name="type_id">
                        <option>Choose one type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" @selected(old('type_id', $project->type_id) == $type->id )>{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="main_languages" class="form-label">Main languages</label>
                    <input type="text" class="form-control @error('main_languages') is-invalid @enderror" id="main_languages" name="main_languages" value="{{ old('main_languages', $project->main_languages) }}">
                    @error('main_languages')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="repo_url" class="form-label">Repository Url</label>
                    <input type="text" class="form-control @error('repo_url') is-invalid @enderror" id="repo_url" name="repo_url" value="{{ old('repo_url', $project->repo_url) }}">
                    @error('repo_url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12">
                    <div>
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $project->description) }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="" class="d-block">Technologies</label>
                    @foreach ($technologies as $technology)
                    <div class="form-check-inline">
                        <input class="form-check-input" type="checkbox" name="technologies[]" value="{{ $technology->id }}" id="check-{{ $technology->id }}"
                        @checked(in_array( $technology->id, old('technologies', $project->technologies->pluck('id')->toArray())))>
                        <label class="form-check-label" for="check-{{ $technology->id }}">
                            {{ $technology->name }}
                        </label>
                    </div>
                    @endforeach
                </div>
                <div class="col-12">
                <button type="submit" class="btn btn-primary">@yield('buttonContent')</button>  
                </div>
            </form>
        </div>
    </div>
@endsection