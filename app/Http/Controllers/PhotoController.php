<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Hotel;
use App\Http\Requests;
use Mockery\CountValidator\Exception;
use Session;
use App\Http\Requests\PhotoRules;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use File;

class PhotoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @return Response
     */
    public function create($id)
    {
        $hotel = Hotel::find($id);

        return view('images.Add', ['hotel' => $hotel]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Imagerules|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoRules $request)
    {
        $hotel = Hotel::find($request->hotel_id);

        $image = $this->saveAndUploadImage($request, $hotel);

            if (isset($image->id)) {
                $message = "The gallery of the hotel '".$hotel->name."' has been updated successfully.";
                $class = "alert alert-success";
            } else {
                $message = "Error! please try again.";
                $class = "alert alert-danger";
            }

        return redirect('hotel')->with('message', $message)
            ->with('class', $class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Photo::find($id);

        return view('images.Edit', ['image' => $image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhotoRules $request, $id)
    {
        $image = Photo::where('id', '=', $id)->update($request->except(['_method', '_token']));
        $hotel = Hotel::find($request->hotel_id);

        if(isset($image)){
            $message = "The image '".$request->input('name')."' in the hotel '".$hotel->name."' has been edited successfully.";
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
        $image = Photo::find($id);
        $image->delete();

        File::delete(public_path().$image->src);

        if(isset($image)){
            $message = "The image '".$image->name."' has been deleted successfully";
            $class = "alert alert-success";
        }
        else{
            $message = "Error! Please try again";
            $class = "alert alert-danger";
        }

        return redirect('hotel')->with('message', $message)
            ->with('class', $class);
    }

    public function saveAndUploadImage($request, $hotel)
    {
        try {

            if (!file_exists("photos/".$hotel->name) && !is_dir("photos/".$hotel->name)) {
                mkdir("photos/".$hotel->name);
            }

            foreach($request->images as $key=>$value) {
                $ext = $request->file('images')[$key][0]->getClientOriginalExtension();
                $current_time = Carbon::now()->getTimestamp();

                Image::make($request->file('images')[$key][0]->getRealPath())->resize(300, 200)->save("photos/" . $hotel->name . '/' .
                    $current_time . "." . $ext);

                $image = Photo::create([
                    'src' => "/photos/" . $hotel->name . '/' . $current_time . "." . $ext,
                    'name' => $request->data[$key][0],
                    'description' => $request->data[$key][1],
                    'hotel_id' => $hotel->id
                ]);
            }

            return $image;
        } catch(Exception $e) {
            $message = "Error! ".$e;
            $class = "alert alert-danger";

            return redirect('hotel')->with('message', $message)
                ->with('class', $class);
        }
    }
}
