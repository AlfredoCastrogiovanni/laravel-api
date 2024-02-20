@extends('pages.admin.types.layouts.createOrEdit')

@section('title', 'Edit type')

@section('heading')
    Edit type {{ $type->id }}
@endsection

@section('action')
    {{ route('admin.types.update', $type) }}
@endsection

@section('method')
    @method('PUT')
@endsection

@section('buttonContent', 'Edit')