@extends('layouts.admin.app')

@section('title', 'All Projects')

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center">All Types</h1>
            </div>
            <div class="col-12 mb-3 text-end">
                <a href="{{ route('admin.types.create') }}" class="btn btn-info text-white">Create New Type</a>
                <a class="btn btn-secondary text-white" href="{{ route('admin.types.deleted') }}">Bin</a>
            </div>
            @if(session('message'))
                <div class="alert alert-success d-flex justify-content-between" role="alert" id="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" id="close"></button>
                </div>
            @endif
            <div class="col-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Type Name</th>
                            <th scope="col" class="text-end pe-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($types as $type)
                            <tr>
                                <th scope="row">{{ $type->id }}</th>
                                <td>{{ $type->name }}</td>
                                <td class="d-flex justify-content-end">
                                    <a href="{{ route('admin.types.show', $type) }}" class="btn btn-primary">Show</a>
                                    <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-success mx-2">Edit</a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="{{ '#modal' . $type->id}}">Delete</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{ 'modal' . $type->id}}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="modalLabel">Delete</h1>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want delete the type {{ $type->name }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
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
                                <td colspan="6" class="text-center fs-5">No Types Found</td>
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