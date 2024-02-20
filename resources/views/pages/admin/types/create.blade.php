@extends('pages.admin.types.layouts.createOrEdit')

@section('title', 'Create type')

@section('heading', 'Create type')

@section('action')
    {{ route('admin.types.store') }}
@endsection

@section('buttonContent', 'Create')