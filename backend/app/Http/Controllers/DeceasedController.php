<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeceasedResource;
use App\Models\Deceased;
use Illuminate\Http\Request;

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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return new DeceasedResource(Deceased::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Deceased $deceased)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deceased $deceased)
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
