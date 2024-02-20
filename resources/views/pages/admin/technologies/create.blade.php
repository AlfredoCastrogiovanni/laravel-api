@extends('pages.admin.technologies.layouts.createOrEdit')

@section('title', 'Create technology')

@section('heading', 'Create technology')

@section('action')
    {{ route('admin.technologies.store') }}
@endsection

@section('buttonContent', 'Create')