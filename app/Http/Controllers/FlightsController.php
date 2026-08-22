<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
// use Illuminate\Auth\Events\Validated;
use App\Http\Requests\CreateFlightRequest;
class FlightsController extends Controller
{
    public function index()
    {
        $data = Flight::paginate(2);
        return view('Flights', ['data' => $data]);
    }
    public function create()
    {
        return view('create_flight');
    }
    public function store(CreateFlightRequest $request)
    {

    // $Validated=$request->validate([
    //     'name'=>'required' 
    // ]); 

        // $dataToInsert=[
        //     'name'=>$request->name,
        //     'created_at'=>date('Y-m-d H:i:s')

        // ];
        // Flight::create($dataToInsert);

        // $dataToInsert['name']=$request->name; 
        // $dataToInsert['created_at']=$request->created_at; 
        //  Flight::create($dataToInsert);

        $flight = new Flight();
        $flight->name=$request->name;
        $flight->save();
        return redirect()->route('flights');
    }

    public function edit ($id){
    $data =Flight::find($id);
    return view('edit_flights',['data'=>$data]) ;
    }
    
    public function update_flights($id,Request $request){
    $dataToUpdate =Flight::find($id);
    $dataToUpdate->name=$request->name;
    $dataToUpdate->save();
    return redirect()->route('flights');

    }

    public function delete($id){
    $flight =Flight::find($id);
    $flight ->delete();
    return redirect()->route('flights');
    }
}
