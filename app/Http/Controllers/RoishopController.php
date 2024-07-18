<?php

namespace App\Http\Controllers;

use App\Models\Roishop;
use Illuminate\Http\Request;

class RoishopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'test index';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Roishop $roishop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Roishop $roishop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roishop $roishop)
    {
        //
    }
}
