<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;

class FlightsController extends Controller
{
    public function index()
    {
        $data = Flight::all();
        return view('Flights', ['data' => $data]);
    }
    public function create()
    {
        return view('create_flight');
    }
    public function store(Request $request)
    {
        $dataToInsert=[
            'name'=>$request->name,
            'created_at'=>date('Y-m-d H:i:s')

        ];
        Flight::create($dataToInsert);
        return redirect()->route('flights');
    }

}
