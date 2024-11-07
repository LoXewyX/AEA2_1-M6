<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumne;
use App\Models\Centre;
use App\Models\Ensenyament;

class AlumneController extends Controller
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
        $alumnes = Alumne::with('centre', 'ensenyament')->paginate(10);

        return view("alumne", compact("alumnes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centres = Centre::all();
        $ensenyaments = Ensenyament::all();

        return view("alumne.create", compact("centres", "ensenyaments"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "nom" => "required|string|max:32",
            "cognoms" => "required|string|max:32",
            "data_naixement" => "required|date",
            "centre_id" => "required|integer",
            "ensenyament_id" => "required|integer",
        ]);

        Alumne::create($request->all());

        return redirect(route("alumne.index"))->with("success", __("L'alumne " . $request->nom . " " . $request->cognoms . " s'ha afegit correctament!"));
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
    public function edit(Alumne $alumne)
    {
        $centres = Centre::all();
        $ensenyaments = Ensenyament::all();

        return view("alumne.edit", compact("alumne", "centres", "ensenyaments"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumne $alumne)
    {
        $this->validate($request, [
            "nom" => "required|string|max:32",
            "cognoms" => "required|string|max:32",
            "data_naixement" => "required|date",
            "centre_id" => "required|integer",
            "ensenyament_id" => "required|integer",
        ]);

        $alumne->update($request->all());

        return back()->with("success", __("L'alumne " . $request->nom . " " . $request->cognoms . " s'ha actualitzat correctament!"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumne $alumne)
    {
        $alumne->delete();

        return back()->with("success", __("L'alumne " . $alumne->nom . " " . $alumne->cognoms . " s'ha eliminat correctament"));
    }
}
