<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Occasion;
use Session;

class OccasionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // guests can only see these pages..
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetch all the data from the model
        //$occasions = Occasion::orderBy('make', 'asc')->get();

        $occasions = Occasion::orderBy('make', 'asc')->Paginate(15);
        // controleren op post data en dan filteren
        // $occasions = Occasion::where('name', 'data uit post')->get();
        return view('occasions.index')->with('occasions', $occasions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // check for admin rights
        if(auth()->user()->id !== 1){
            // error message
            Session::flash('error', 'Onbevoegde toegang');
            return redirect('/home');
        }
        return view('occasions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the form data that we got via POST request
        $this->validate($request, [
            'make' => 'required',
            'model' => 'required',
            'color' => 'required',
            'year' => 'required',
            'mileage' => 'required',
            'fuel' => 'required',
            'doors' => 'required',
            'engineCapacity' => 'required',
            'weight' => 'required',
            'transmission' => 'required',
            'gears' => 'required',
            'plate' => 'required',
            'price' => 'required'
        ]);

        // Create Occasion
        $occasion = new Occasion;
        $occasion->make = $request->input('make');
        $occasion->model = $request->input('model');
        $occasion->color = $request->input('color');
        $occasion->year = $request->input('year');
        $occasion->mileage = $request->input('mileage');
        $occasion->fuel = $request->input('fuel');
        $occasion->doors = $request->input('doors');
        $occasion->engineCapacity = $request->input('engineCapacity');
        $occasion->weight = $request->input('weight');
        $occasion->transmission = $request->input('transmission');
        $occasion->gears = $request->input('gears');
        $occasion->plate = $request->input('plate');
        $occasion->price = $request->input('price');
        $occasion->save();

        // success message
        Session::flash('success', 'Auto Toegevoegd');

        //redirect
        return redirect('/occasions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $occasion = Occasion::find($id);
        return view('occasions.show')->with('occasion', $occasion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $occasion = Occasion::find($id);
        // check for admin rights
        if(auth()->user()->id !== 1){
            // error message
            Session::flash('error', 'Onbevoegde toegang');
            return redirect('/home');
        }
        return view('occasions.edit')->with('occasion', $occasion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate the form data that we got via POST request
        $this->validate($request, [
            'make' => 'required',
            'model' => 'required',
            'color' => 'required',
            'year' => 'required',
            'mileage' => 'required',
            'fuel' => 'required',
            'doors' => 'required',
            'engineCapacity' => 'required',
            'weight' => 'required',
            'transmission' => 'required',
            'gears' => 'required',
            'plate' => 'required',
            'price' => 'required'
        ]);

        // Create Occasion
        $occasion = Occasion::find($id);
        $occasion->make = $request->input('make');
        $occasion->model = $request->input('model');
        $occasion->color = $request->input('color');
        $occasion->year = $request->input('year');
        $occasion->mileage = $request->input('mileage');
        $occasion->fuel = $request->input('fuel');
        $occasion->doors = $request->input('doors');
        $occasion->engineCapacity = $request->input('engineCapacity');
        $occasion->weight = $request->input('weight');
        $occasion->transmission = $request->input('transmission');
        $occasion->gears = $request->input('gears');
        $occasion->plate = $request->input('plate');
        $occasion->price = $request->input('price');
        $occasion->save();

        // success message
        Session::flash('success', 'Data geüpdatet');

        //redirect
        return redirect('/occasions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $occasion = Occasion::find($id);
        $occasion->delete();
        
        // check for admin rights
        if(auth()->user()->id !== 1){
            // error message
            Session::flash('error', 'Onbevoegde toegang');
            return redirect('/home');
        }
        // success message
        Session::flash('success', 'Auto verwijderd');

        //redirect
        return redirect('/occasions');
    }
}
