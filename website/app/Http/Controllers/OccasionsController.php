<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Occasion;
use Session;
use Illuminate\Support\Facades\Storage;

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
     * Display the occasions and filter the data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // valide the filter form data
        $this->validate($request, [
            'searchBar' => 'nullable|string',
            'make' => 'nullable|string',
            'color' => 'nullable|string',
            'year' => 'nullable|numeric|gte:1900|lte:2100',
            'transmission' => 'nullable',
            'priceMin' => 'nullable|numeric|gte:0',
            'priceMax' => 'nullable|numeric'
        ]);
        
        //return $searchData;
        // Check for the filter post data and filter if needed
        $occasions = (new Occasion)->newQuery();

        // If the searchbar is filled in check every column in database
        if($request->input('searchBar')){
            // Get all column names
            $columns = ['make', 'model', 'color', 'year', 'mileage', 'fuel', 'doors', 'engineCapacity', 'weight', 'transmission', 'gears', 'plate', 'price'];
            // Search in columns for matching data
            foreach($columns as $column){
                $occasions->orWhere($column, 'LIKE', '%' . $request->input('searchBar') . '%');
            }
        }
        // If a make is provided
        if($request->input('make')){
            $occasions->where('make', $request->input('make'));
        }
        // If a color is provided
        if($request->input('color')){
            $occasions->where('color', $request->input('color'));
        }
        // If a year is provided
        if($request->input('year')){
            $occasions->where('year', $request->input('year'));
        }
        // If a transmissiontype is provided
        if($request->input('transmission')){
            $occasions->where('transmission', 'Automaat');
        }
        // If a min price is provided
        if($request->input('priceMin')){
            $occasions->where('price', '>=', $request->input('priceMin'));
        }
        // If a max price is provided
        if($request->input('priceMax')){
            $occasions->where('price', '<=', $request->input('priceMax'));
        }
        
        // Order results by make ascending and paginate to 15 per page
        $occasions->orderBy('make', 'asc')->Paginate(15);
        // Get the results
        $occasions = $occasions->get();
        // pass old input data to session
        $request->flash();
        // Pass the results to the view
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
            'year' => 'required|numeric',
            'mileage' => 'required|numeric',
            'fuel' => 'required',
            'doors' => 'required|numeric',
            'engineCapacity' => 'required|numeric',
            'weight' => 'required|numeric',
            'transmission' => 'required',
            'gears' => 'required|numeric',
            'plate' => 'required',
            'price' => 'required|numeric',
            'images[]' => 'image|mimes:jpeg,jpg,png,svg|nullable|max:100000'
        ]);
        // Handle file uploads
        if($request->hasFile('images'))
        {
            // Put the images from the POST data inside an array
            $files = $request->file('images');
            foreach($files as $image)
            {
                // Get filename with the extension
                $filenameWithExt = $image->getClientOriginalName();
                // Get just the filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just the extension
                $extension = $image->getClientOriginalExtension();
                // Filename to store
                $filenameToStore = $filename.'.'.time().'.'.$extension;
                // Upload Image
                $path = $image->storeAs('public/car_images', $filenameToStore);
                $data[] = $filenameToStore;
            }
        }
        // If no images where uploaded add default image
        else {
            $data = ["noimage.png"];
        }
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
        // save image name as json
        $occasion->image_name = json_encode($data);
        $occasion->old_price = $request->input('price');
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
        // check for admin rights
        if(auth()->user()->id !== 1){
            // error message
            Session::flash('error', 'Onbevoegde toegang');
            return redirect('/home');
        }

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
        // check for admin rights
        if(auth()->user()->id !== 1){
            // error message
            Session::flash('error', 'Onbevoegde toegang');
            return redirect('/home');
        }
        // Get current occasion info
        $occasion = Occasion::find($id);
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
            'price' => 'required',
            'images[]' => 'image|mimes:jpeg,jpg,png,svg|nullable|max:100000'
        ]);
        // Handle file uploads
        if($request->hasFile('images'))
        {
            // First delete the old images
            // If the occasion does not have the default image
            if($occasion->image_name !== '["noImage.png"]'){
                //convert from json
                $convertedImages = json_decode($occasion->image_name);
                // Delete all images
                foreach($convertedImages as $image)
                {
                    // Delete image
                    Storage::delete('public/car_images/'.$image);
                }
            }

            // Add the new images
            // Put the images from the POST data inside an array
            $files = $request->file('images');

            foreach($files as $image)
            {
                // Get filename with the extension
                $filenameWithExt = $image->getClientOriginalName();
                // Get just the filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just the extension
                $extension = $image->getClientOriginalExtension();
                // Filename to store
                $filenameToStore = $filename.'.'.time().'.'.$extension;
                // Upload Image
                $path = $image->storeAs('public/car_images', $filenameToStore);
                $data[] = $filenameToStore;
            }
        }
        // Update the info
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
        if($request->hasFile('images'))
        {
            // save image name as json
            $occasion->image_name = json_encode($data);
        }
        $occasion->old_price = $request->input('price');
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
        // check for admin rights
        if(auth()->user()->id !== 1){
            // error message
            Session::flash('error', 'Onbevoegde toegang');
            return redirect('/home');
        }
        // Get the occasion with the right id
        $occasion = Occasion::find($id);
        // If the occasion does not have the default image
        if($occasion->image_name !== '["noImage.png"]'){
            //convert from json
            $convertedImages = json_decode($occasion->image_name);
            // Delete all images
            foreach($convertedImages as $image)
            {
                // Delete image
                Storage::delete('public/car_images/'.$image);
            }
        }

        $occasion->delete();
        // success message
        Session::flash('success', 'Auto verwijderd');

        //redirect
        return redirect('/occasions');
    }

    /**
     * Toggle occasion status as admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        // check for admin rights
        if(auth()->user()->id !== 1){
            // error message
            Session::flash('error', 'Onbevoegde toegang');
            return redirect('/home');
        }
        // validate the form data that we got via POST request
        $this->validate($request, [
            'status' => 'nullable|string',
            'id' => 'required|numeric'
        ]);
        // Get id  of current car we are changing
        $id = $request->input('id');
        // Get current occasion info
        $occasion = Occasion::find($id);
        
        // if the car is sold 
        if($request->input('status') == ''){
            //set old price
            $occasion->old_price = $occasion->price;
            // change to sold
            $occasion->price = 'Verkocht';
        } 
        // if the car is available
        else if($request->input('status') == 'on'){
            //set to old price
            $occasion->price = $occasion->old_price;
        }

        // Save changes to database
        $occasion->save();

        // success message
        Session::flash('success', 'Status geüpdatet');

        //redirect
        return $this->show($id);
        
    }
}
