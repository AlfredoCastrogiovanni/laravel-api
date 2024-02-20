<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('pages.admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technology = new Technology();
        return view('pages.admin.technologies.create', compact('technology'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newTechnology = Technology::create($request->all());
        return to_route('admin.technologies.show', $newTechnology)->with('message', 'Record Created with success!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        $technologies = $technology;
        return view('pages/admin/technologies/show', compact('technologies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('pages.admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $technology->update($request->all());
        return to_route('admin.technologies.show', $technology)->with('message', 'Record edited with success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return to_route('admin.technologies.index')->with('message', 'Record deleted with success!');
    }

    /**
     * Display the deleted resource.
     */
    public function deleted() 
    {
        $technologies = Technology::onlyTrashed()->get();
        return view('pages.admin.technologies.deleted', compact('technologies'));
    }

    /**
     * Restore the deleted resource.
     */
    public function restore(String $id)
    {
        $technology = Technology::withTrashed()->where('id', $id)->first();
        $technology->restore();
        return to_route('admin.technologies.deleted')->with('message', 'Record restored with success!');
    }

    /**
     * Permanent delete the deleted resource.
     */
    public function permanentDestroy(String $id)
    {
        $technology = Technology::withTrashed()->where('id', $id)->first();
        $technology->forceDelete();
        return to_route('admin.technologies.deleted')->with('message', 'Record permanent deleted!');
    }
}
