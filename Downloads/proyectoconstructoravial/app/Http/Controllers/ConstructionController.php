<?php

namespace App\Http\Controllers;

use App\Models\Construction;
use App\Models\Province;
use Illuminate\Http\Request;

class ConstructionController
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $constructions = Construction::with('province')->get();
        return view('constructions.show', compact('constructions'));
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
    public function viewInfo($id)
    {
        $constructions = Construction::with('province')->findOrFail($id);

        return view('constructions.info', compact('constructions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Construction $construction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Construction $construction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Construction $construction)
    {
        $construction->delete();
        return redirect()->route('constructions.show')->with('success', 'Obra elimina con exito.');
    }
}
