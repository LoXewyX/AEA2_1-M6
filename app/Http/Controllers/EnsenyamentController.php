<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ensenyament;

class EnsenyamentController extends Controller
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
        $ensenyaments = Ensenyament::paginate(10);

        return view('ensenyament', compact('ensenyaments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ensenyament = new Ensenyament;
        $title = __('Crear Ensenyament');
        $textButton = __('Afegir');
        $route = route('ensenyament.store');

        return view('ensenyament.create', compact('ensenyament', 'title', 'route', 'textButton'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:ensenyaments',
            'descripcio' => 'string',
        ]);

        Ensenyament::create($request->all());
        return redirect()->route('ensenyament.index')->with('success', 'Ensenyament creat correctament.');
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
    public function edit(Ensenyament $ensenyament)
    {
        $update = true;
        $title = __('Editar Ensenyament');
        $textButton = __('Actualizar Ensenyament');
        $route = route('ensenyament.update', $ensenyament->id);

        return view('ensenyament.edit', compact('ensenyament', 'title', 'route', 'textButton', 'update'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ensenyament $ensenyament)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:ensenyaments,nom,' . $ensenyament->id,
            'descripcio' => 'nullable|string',
        ]);

        $ensenyament->update($request->all());
        return redirect()->route('ensenyament.index')->with('success', 'Ensenyament actualitzat correctament.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ensenyament $ensenyament)
    {
        $ensenyament->delete();
        return redirect()->route('ensenyament.index')->with('success', 'Ensenyament eliminat correctament.');
    }
}
