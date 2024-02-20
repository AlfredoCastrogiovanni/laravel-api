<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('pages/admin/types/index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = new Type();
        return view('pages.admin.types.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newType = Type::create($request->all());
        return to_route('admin.types.show', $newType)->with('message', 'Record Created with success!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('pages/admin/types/show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('pages.admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $type->update($request->all());
        return to_route('admin.types.show', $type)->with('message', 'Record edited with success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return to_route('admin.types.index')->with('message', 'Record deleted with success!');
    }

    /**
     * Display the deleted resource.
     */
    public function deleted() 
    {
        $types = Type::onlyTrashed()->get();
        return view('pages.admin.types.deleted', compact('types'));
    }

    /**
     * Restore the deleted resource.
     */
    public function restore(String $id)
    {
        $type = Type::withTrashed()->where('id', $id)->first();
        $type->restore();
        return to_route('admin.types.deleted')->with('message', 'Record restored with success!');
    }

    /**
     * Permanent delete the deleted resource.
     */
    public function permanentDestroy(String $id)
    {
        $type = Type::withTrashed()->where('id', $id)->first();
        $type->forceDelete();
        return to_route('admin.types.deleted')->with('message', 'Record permanent deleted!');
    }
}
