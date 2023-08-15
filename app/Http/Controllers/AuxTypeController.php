<?php

namespace App\Http\Controllers;

use App\Models\AuxType;
use Illuminate\Http\Request;

class AuxTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aux_type = AuxType::all();

        return response()->json($aux_type);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AuxType $auxType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuxType $auxType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AuxType $auxType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AuxType $auxType)
    {
        //
    }
}
