<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "index(Note)";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "create(Note)";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "store(Note)";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "show(Note)";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "edit(Note)";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "update(Note)";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "destroy(Note)";
    }
}
