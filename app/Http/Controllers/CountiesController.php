<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCountry;
use App\Models\CountrieModel;
use Illuminate\Http\Request;

class CountiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CountrieModel::all();
        return view('CountriesView',['data'=>$data]); 
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('countryfolder.create_country'); 

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCountry $request )
    {
    
        $contry = new CountrieModel();
        $contry->name=$request->name;
        $contry->save();
        return redirect()->route('country.index');
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
    $data = CountrieModel::find($id);
    return view('countryfolder.edit_country',['data'=>$data]); 
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataToUpdate =CountrieModel::find($id);
    $dataToUpdate->name=$request->name;
    $dataToUpdate->save();
    return redirect()->route('country.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $flight =CountrieModel::find($id);
    $flight ->delete();
    return redirect()->route('country.index');
    }
}
