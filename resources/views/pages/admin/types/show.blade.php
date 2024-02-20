@extends('layouts.admin.app')

@section('title', 'All Types')

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
                    <h5 class="card-header">Type {{ $type->id }}</h5>
                    <div class="card-body">
                        <h2 class="card-title my-2">{{ $type->name }}</h2>
                        <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-success">Edit</a>
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