@extends('pages.admin.technologies.layouts.createOrEdit')

@section('title', 'Edit technology')

@section('heading')
    Edit technology {{ $technology->id }}
@endsection

@section('action')
    {{ route('admin.technologies.update', $technology) }}
@endsection

@section('method')
    @method('PUT')
@endsection

@section('buttonContent', 'Edit')