<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
// use Illuminate\Auth\Events\Validated;
use App\Http\Requests\CreateFlightRequest;
use Illuminate\Support\facades\DB;
class FlightsController extends Controller
{
    public function index()
    {
        $data = Flight::all();
        // $data = Flight::paginate(2);
        // $data = Flight::where('id','>',1)->get();
        //  $data = Flight::orderby('id','DESC')->get();
         $data = Flight::withTrashed()->orderby('id','DESC')->get();
        // $data = Flight::orderby('id','ASC')->get();
        // $data=DB::table('flights')->get();
        // $data=DB::table('flights')->orderBy('id','DESC')->get();
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

    public function edit (String $id){
    $data =Flight::find($id);
    return view('edit_flights',['data'=>$data]) ;
    }
    
    public function update_flights(String $id,Request $request){
    $dataToUpdate =Flight::find($id);
    $dataToUpdate->name=$request->name;
    $dataToUpdate->save();
    return redirect()->route('flights');

    }

     public function delete($id)
{
    Flight::where('id', $id)->forceDelete();
    return redirect()->route('flights');
}


    public function delete_soft( $id){
    $flight =Flight::find($id);
    $flight ->delete();
    return redirect()->route('flights');
    }


    public function restore($id)
{
    Flight::where('id', $id)->restore();
    return redirect()->route('flights');
}

   
    }
    