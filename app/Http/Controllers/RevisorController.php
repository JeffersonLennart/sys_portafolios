<?php

namespace App\Http\Controllers;

use App\Models\Revisor;
use App\Http\Requests\StoreRevisorRequest;
use App\Http\Requests\UpdateRevisorRequest;

class RevisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('revisores.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRevisorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Revisor $revisor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Revisor $revisor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRevisorRequest $request, Revisor $revisor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Revisor $revisor)
    {
        //
    }
}
