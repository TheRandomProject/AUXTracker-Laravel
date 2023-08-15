<?php

namespace App\Http\Controllers;

use App\Models\AuxHistory;
use Illuminate\Http\Request;

class AuxHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aux_history = AuxHistory::addSelect(['users.name', 'aux_histories.*'])
        ->join('users', 'aux_histories.user_id', 'users.id')->get();

    return response()->json($aux_history);
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
        $request->validate([
            'aux_type'  => 'required|string|max:255',
            'user_id'   => 'required|integer'    
        ]);

        $aux_history = AuxHistory::create([
            'aux_type'  => $request->aux_type,
            'user_id'   => $request->user_id,
            'created_by'    => auth()->id() ?: '0',
            'modified_by'  => auth()->id() ?: '0',
        ]);

        return response()->json([
            'succes' => 'Success Fully Created' 
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(AuxHistory $auxHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuxHistory $auxHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AuxHistory $auxHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AuxHistory $auxHistory)
    {
        //
    }
}
