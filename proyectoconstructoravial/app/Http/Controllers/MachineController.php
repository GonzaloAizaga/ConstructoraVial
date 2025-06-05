<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Machines_type;
use Illuminate\Http\Request;

class MachineController
{
    /**
     * Display a listing of the resource.
     */
    public function viewInfo($id){
        $machine = Machine::with('machines_type')->findOrFail($id);

        return view('machines.info', compact('machine'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Machines_type::all();
        return view('machines.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'serial_number' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'kilometers' => 'required|integer|min:0',
            'id_machines_type' => 'required|exists:machines_types,id',
        ]);

        Machine::create($validated);

        return redirect()->route('machines.create')->with('success', 'Máquina creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
   public function show(){
        $machines = Machine::with('machines_type','assignments.construction.province')->get();
        return view('machines.show', compact('machines'));

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Machine $machine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Machine $machine)
    {
        $validatedData = $request->validate([
            'model' => 'required|string|max:255',
            'kilometers' => 'required|numeric',
            'id_machines_type' => 'required|exists:machine_types,id',
        ]);


        $machine->update($validatedData);

        return redirect()->route('machines.show')->with('success', 'Máquina actualizada con éxito.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Machine $machine)
    {
        $machine->delete();
      
        return redirect()->route('machines.show')->with('success', 'Maquina elimina con exito.');
    }
}
