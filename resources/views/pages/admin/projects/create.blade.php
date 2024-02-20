@extends('pages.admin.projects.layouts.createOrEdit')

@section('title', 'Create project')

@section('heading', 'Create Project')

@section('action')
    {{ route('admin.projects.store') }}
@endsection

@section('buttonContent', 'Create')