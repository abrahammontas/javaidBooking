<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\City;
use App\State;
use App\Http\Requests;
use Session;
use App\Http\Requests\Hotelrules;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();

        return view('hotels.List', ['hotels' => $hotels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $cities = City::all();

        $states = State::where('city_id', '=', $cities[0]->id)->get();

        return view('hotels.Add', ['cities' => $cities, 'states' => $states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Hotelrules $request)
    {
        $hotel = Hotel::create($request->all());

        if(isset($hotel->id)){
            $message = "The hotel '".$request->input('name')."' has been created successfully.";
            $class = "alert alert-success";
        }
        else{
            $message = "Error! please try again.";
            $class = "alert alert-danger";
        }

        return redirect('hotel')->with('message', $message)
            ->with('class', $class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::all();

        $states = State::where('city_id', '=', $cities[0]->id)->get();

        return view('hotels.Edit', ['hotel' => Hotel::find($id), 'cities' => $cities, 'states' => $states]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Hotelrules $request, $id)
    {
        $hotel = Hotel::where('id', '=', $id)->update($request->all());

        if(isset($hotel)){
            $message = "The hotel '".$request->input('name')."' has been edited successfully.";
            $class   = "alert alert-success";
        }
        else{
            $message = "Error! please try again.";
            $class = "alert alert-danger";
        }

        return redirect('hotel')->with('message', $message)
            ->with('class', $class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();

        if(isset($hotel)){
            $message = "The room '".$hotel->name."' has been deleted successfully";
            $class = "alert alert-success";
        }
        else{
            $message = "Error! Please try again";
            $class = "alert alert-danger";
        }

        return redirect('hotel')->with('message', $message)
            ->with('class', $class);
    }
}
