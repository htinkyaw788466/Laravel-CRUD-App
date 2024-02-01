<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth')->except(['index']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persons=Person::all();
        return view('persons.index',['persons'=>$persons]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('persons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|max:70|unique:people',
            'city'=>'required'
        ]);

        $person=new Person();
        $person->firstName=$request->firstname;
        $person->lastName=$request->lastname;
        $person->email=$request->email;
        $person->city=$request->city;
        $person->save();
        return redirect()->route('mainhome')
                ->with('successMsg','person create successfully');
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
    public function edit(string $id)
    {
        $person=Person::findOrFail($id);
        return view('persons.edit',compact('person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $person=Person::findOrFail($id);
        $person->firstName=$request->firstname;
        $person->lastName=$request->lastname;
        $person->email=$request->email;
        $person->city=$request->city;
        $person->save();
        return redirect()->route('mainhome')
                ->with('warnMsg','person update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $person=Person::findOrFail($id);
        $person->delete();
        return redirect()->route('mainhome')
               ->with('alertMsg','person delete successfully');
    }
}
