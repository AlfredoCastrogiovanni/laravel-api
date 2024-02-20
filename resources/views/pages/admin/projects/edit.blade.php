@extends('pages.admin.projects.layouts.createOrEdit')

@section('title', 'Edit project')

@section('heading')
    Edit Project {{ $project->id }}
@endsection

@section('action')
    {{ route('admin.projects.update', $project) }}
@endsection

@section('method')
    @method('PUT')
@endsection

@section('buttonContent', 'Edit')