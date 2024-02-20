@extends('layouts.admin.app')

@section('title', 'All Projects')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(session('message'))
                    <div class="alert alert-success d-flex justify-content-between" role="alert" id="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" id="close"></button>
                    </div>
                @endif
            </div>
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Project {{ $project->id }}</h5>
                    <div class="card-body">
                        <h2 class="card-title">{{ $project->name }}</h2>
                        <p class="card-text">{{ $project->description }}</p>
                        <p class="card-text">
                            <div class="fw-bold mb-1">Technologies:</div> 
                            @foreach ($project->technologies as $technology)
                                <span class="me-2"> <img src="{{ $technology->img_url }}" style="width: 30px"> {{ $technology->name }}</span>
                            @endforeach
                        </p>
                        <p class="card-text"><span class="fw-bold">Type:</span> {{ $project->type->name }}</p>
                        <p class="card-text"><span class="fw-bold">Day To Make:</span> {{ $project->day_to_make }}</p>
                        <p class="card-text"><span class="fw-bold">Main Languages:</span> {{ $project->main_languages }}</p>
                        <p class="card-text">
                            <span class="fw-bold">Repository Url:</span> 
                            <a href="{{ $project->repo_url }}" target="_blank" class="link-underline link-underline-opacity-0">{{ $project->repo_url }}</a>
                        </p>
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-success">Edit</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="{{ '#modal' . $project->id}}">Delete</button>

                        <!-- Modal -->
                        <div class="modal fade" id="{{ 'modal' . $project->id}}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalLabel">Delete</h1>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want delete the project {{ $project->name }}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Script JS --}}
    <script>
        let closebutton = document.getElementById('close');
        let alertElement = document.getElementById('alert');
        closebutton.addEventListener('click', () => {
            alertElement.classList.add('d-none');
        });
    </script>
@endsection