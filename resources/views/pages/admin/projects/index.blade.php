@extends('layouts.admin.app')

@section('title', 'All Projects')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">All Projects</h1>
            </div>
            <div class="col-12 mb-3 text-end">
                <a href="{{ route('admin.projects.create') }}" class="btn btn-info text-white">Create New Project</a>
                <a class="btn btn-secondary text-white" href="{{ route('admin.projects.deleted') }}">Bin</a>
            </div>
            @if(session('message'))
                <div class="alert alert-success d-flex justify-content-between" role="alert" id="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" id="close"></button>
                </div>
            @endif
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Project Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Day To Make</th>
                            <th scope="col">Technologies</th>
                            <th scope="col">Main Languages</th>
                            <th scope="col">Repository Url</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->id }}</th>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->type->name }}</td>
                                <td>{{ $project->day_to_make }} days</td>
                                <td>
                                    @foreach ($project->technologies as $technology)
                                        <span class="badge text-bg-secondary py-1 px-2">{{ $technology->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $project->main_languages }}</td>
                                <td><a href="{{ $project->repo_url }}" target="_blank" class="link-underline link-underline-opacity-0">{{ $project->repo_url }}</a></td>
                                <td>
                                    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary">Show</a>
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
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center fs-5">No projects Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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