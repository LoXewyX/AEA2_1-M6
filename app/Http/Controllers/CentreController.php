<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centre;

class CentreController extends Controller
{
    /**
    * Create a new controller instance.
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $centres = Centre::paginate(10);
        
        return view("centre", compact("centres"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centre = new Centre;
        $title = __('Crear Centre');
        $textButton = __('Afegir');
        $route = route('centre.store');

        return view('centre.create', compact('centre', 'title', 'route', 'textButton'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['nom' => 'required|string|max:32']);
        Centre::create($request->all());

        return redirect()->route('centre.index')->with('success', 'Centre created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Centre $centre)
    {
        $update = true;
        $title = __('Editar Centre');
        $textButton = __('Actualizar Centre');
        $route = route('centre.update', $centre->id);

        return view('centre.edit', compact('centre', 'title', 'route', 'textButton', 'update'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Centre $centre)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        return redirect()->route('centre.index')->with('success', 'Centre updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Centre $centre)
    {
        $centre->delete();

        return redirect()->route('centre.index')->with('success', 'Centre deleted successfully.');
    }
}
