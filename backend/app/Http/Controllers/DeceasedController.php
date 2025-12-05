<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeceasedRequest;
use App\Http\Requests\UpdateDeceasedRequest;
use App\Models\Deceased;

class DeceasedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreDeceasedRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Deceased $deceased)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deceased $deceased)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeceasedRequest $request, Deceased $deceased)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deceased $deceased)
    {
        //
    }
}
