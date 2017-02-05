<?php

namespace App\Http\Controllers;

use App\State;
use App\City;
use App\Http\Requests;
use Session;
use App\Http\Requests\Staterules;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();

        return view('states.List', ['states' => $states]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $cities = City::all();

        return view('states.Add', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Staterules $request)
    {
        $state = State::create($request->all());

        if(isset($state->id)){
            $message = "The state '".$request->input('name')."' has been created successfully.";
            $class = "alert alert-success";
        }
        else{
            $message = "Error! please try again.";
            $class = "alert alert-danger";
        }

        return redirect('state')->with('message', $message)
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

        return view('states.Edit', ['state' => State::find($id), 'cities' => $cities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Staterules $request, $id)
    {
        $state = State::where('id', '=', $id)->update($request->except(['_method', '_token']));

        if(isset($state)){
            $message = "The state '".$request->input('name')."' has been edited successfully.";
            $class   = "alert alert-success";
        }
        else{
            $message = "Error! please try again.";
            $class = "alert alert-danger";
        }

        return redirect('state')->with('message', $message)
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
        $state = State::find($id);
        $state->delete();

        if(isset($state)){
            $message = "The state '".$state->name."' has been deleted successfully";
            $class = "alert alert-success";
        }
        else{
            $message = "Error! Please try again";
            $class = "alert alert-danger";
        }

        return redirect('hotel')->with('message', $message)
            ->with('class', $class);
    }

    public function getStates($city) {
        $states = State::where('city_id', '=', $city)->get();

        return response()->json($states);
    }
}
