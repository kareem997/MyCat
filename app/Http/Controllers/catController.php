<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;

const CATS = './';

class catController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cats = Cat::all();
      
      return view('cats.index', compact('cats'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cats.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $age = "2";
      $request->validate([
        'name' => 'required',
        'date_of_birth' => 'required'
        ]);
        $cats = new Cat([
        'name' => $request->get('name'),
        'date_of_birth' => $request->get('date_of_birth'),
        'age' => $age,
        ]);
        $cats->save();
        return redirect(CATS)->with('success', 'Cat Details Saved!');
    }
    
    public function show(Cat $cat_id){


        $cats = Cat::find($cat_id);
        return view('cats.index', compact('cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cat_id)
    {
      $cats = Cat::find($cat_id);
      return view('cats.edit', compact('cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cat_id)
    {
      $request->validate([
        'name' => 'required',
        'date_of_birth' => 'required'
        ]);
        $cats = Cat::find($cat_id);
        $cats->name = $request->get('name');
        $cats->date_of_birth = $request->get('date_of_birth');
        $cats->age = $cats->age::length($request->get("name"));
        $cats->save();
        return redirect(CATS)->with('success', 'Cat Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cat_id)
    {
      $cats = Cat::find($cat_id);
      $cats->delete();
      return redirect(CATS)->with('success', 'Cat Deleted!');
    }
}
