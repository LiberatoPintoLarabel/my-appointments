<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;

class SpecialtyController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	$specialties = Specialty::all();
    	return view('specialties.index', compact('specialties'));
    }

    public function create()
    {
    	return view('specialties.create');
    }

    private function performValidation(Request $request)
    {
        $rules = [
            'name' => 'required|min:3'
        ];
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre.',
            'name.min' => 'Como minimo el nombre debe tener 3 caracteres.',
        ];
        $this->validate($request, $rules, $messages);  
    }

    public function store(Request $request)
    {
    	//dd($request->all());
        $this->performValidation($request);
        
    	$specialty = new Specialty();
    	$specialty->name = $request->input('name');
    	$specialty->description = $request->input('description');
    	$specialty->save(); // INSERT

        $notification = 'La especialidad se ha registrado correctmente.';
    	return redirect('/specialties')->with(compact('notification'));
    }

    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }

     public function update(Request $request, Specialty $specialty)
    {
        $this->performValidation($request);

        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save(); // UPDATE

        $notification = 'La especialidad se ha actualizo correctmente.';
        return redirect('/specialties')->with(compact('notification'));
    }

    public function destroy(Specialty $specialty)
    {
        $deletedSpecialty = $specialty->name;
        $specialty->delete();

        $notification = 'La especialidad '. $deletedSpecialty .' se ha eliminado correctmente.';
        return redirect('/specialties')->with(compact('notification'));
    }
}
