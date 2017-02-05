<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests;
use Session;
use App\Http\Requests\CityRules;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();

        return view('cities.List', ['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('cities.Add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRules $request)
    {
        $city = City::create($request->all());

        if(isset($city->id)){
            $message = "The city '".$request->input('name')."' has been created successfully.";
            $class = "alert alert-success";
        }
        else{
            $message = "Error! please try again.";
            $class = "alert alert-danger";
        }

        return redirect('city')->with('message', $message)
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
        return view('cities.Edit', ['city' => City::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRules $request, $id)
    {
        $city = City::where('id', '=', $id)->update($request->except(['_method', '_token']));

        if(isset($city)){
            $message = "The city '".$request->input('name')."' has been edited successfully.";
            $class   = "alert alert-success";
        }
        else{
            $message = "Error! please try again.";
            $class = "alert alert-danger";
        }

        return redirect('city')->with('message', $message)
            ->with('class', $class);
    }
}
