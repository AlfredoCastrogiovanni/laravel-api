@extends('layouts.admin.app')

@section('title', 'All Technologies')

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center">All Technologies</h1>
            </div>
            <div class="col-12 mb-3 text-end">
                <a href="{{ route('admin.technologies.create') }}" class="btn btn-info text-white">Create New Technology</a>
                <a class="btn btn-secondary text-white" href="{{ route('admin.technologies.deleted') }}">Bin</a>
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
                            <th scope="col">Technology Name</th>
                            <th scope="col">Image Url</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($technologies as $technology)
                            <tr>
                                <th scope="row">{{ $technology->id }}</th>
                                <td>{{ $technology->name }}</td>
                                <td><a href="{{ $technology->img_url }}" target="_blank" class="link-underline link-underline-opacity-0">{{ $technology->img_url }}</a></td>
                                <td>
                                    <a href="{{ route('admin.technologies.restore', $technology) }}" class="btn btn-primary me-2">Restore</a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="{{ '#modal' . $technology->id}}">Delete</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{ 'modal' . $technology->id}}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="modalLabel">Delete</h1>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want delete the technology {{ $technology->name }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <form action="{{ route('admin.technologies.permanentDestroy', $technology) }}" method="POST">
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
                                <td colspan="6" class="text-center fs-5">No technologies Found</td>
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