@extends('layouts.admin.app')

@section('title', 'All technologies')

@section('main-content')
    <div class="container">
        <div class="row">
            @if(session('message'))
                <div class="alert alert-success d-flex justify-content-between" role="alert" id="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" id="close"></button>
                </div>
            @endif
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Technologies {{ $technologies->id }}</h5>
                    <div class="card-body">
                        <h2 class="card-title my-2">{{ $technologies->name }}</h2>
                        <p class="card-text">
                            <span class="fw-bold">Image Url:</span>
                            <a href="{{ $technologies->img_url }}" target="_blank" class="link-underline link-underline-opacity-0 me-2">{{ $technologies->img_url }}</a>
                            <img src="{{ $technologies->img_url }}" style="width: 30px">
                        </p>
                        <a href="{{ route('admin.technologies.edit', $technologies) }}" class="btn btn-success">Edit</a>
                        <button technologies="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="{{ '#modal' . $technologies->id}}">Delete</button>

                        <!-- Modal -->
                        <div class="modal fade" id="{{ 'modal' . $technologies->id}}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalLabel">Delete</h1>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want delete the technologies {{ $technologies->name }}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('admin.technologies.destroy', $technologies) }}" method="POST">
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