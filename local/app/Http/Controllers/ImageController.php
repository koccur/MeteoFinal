<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Intervention\Image\Facades\Image as Img;
use App\Http\Controllers\Controller;


class ImageController extends Controller
{
    /* 1. This method relates to the "images list" view */
    public function index()
    {
        $images = Image::paginate(10);
        return view('images.list')->with('images', $images);
    }
    /* 2. This method relates to the "add new image" view */
    public function create()
    {
        return view('images.create');
    }
    /* 3. This method relates to the "image detail" view */
    public function show($id)
    {
        $image = Image::find($id);
        return view('image-detail')->with('image', $image);
    }
    /* 4. This method relates to the "edit image" view */
    public function edit($id)
    {
        $image = Image::find($id);
        return view('edit-image')->with('image', $image);
    }
    public function store(Request $request){
        $validation = Validator::make($request->all(), [
            'caption'     => 'required|regex:/^[A-Za-z ]+$/',
            'description' => 'required',
            'userfile'     => 'required|image|mimes:jpeg,png|min:1|max:250'
        ]);
        $image = new Image;
        // upload the image //
        $file = $request->file('userfile');
        $destination_path = 'img/obrazki/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $file->move($destination_path, $filename);
//        // save image data into database //
        $image->file = $destination_path . $filename;
        $image->destination_path=$destination_path;
        $image->filename=$filename;
        $image->caption = $request->input('caption');
        $image->description = $request->input('description');
        $image->save();
        $zm=Img::make($image->file);
        $zm->resize(320,240);
        $zm->save($destination_path.'thumbnails/'.$filename);
        return redirect('/')->with('message','You just uploaded an image!');
    }
    public function update(Request $request, $id)
    {
        // Validation //
        $validation = Validator::make($request->all(), [
            'caption'     => 'required|regex:/^[A-Za-z ]+$/',
            'description' => 'required',
            'userfile'    => 'sometimes|image|mimes:jpeg,png|min:1|max:250'
        ]);

        // Check if it fails //
        if( $validation->fails() ){
            return redirect()->back()->withInput()
                ->with('errors', $validation->errors() );
        }

        // Process valid data & go to success page //
        $image = Image::find($id);

        // if user choose a file, replace the old one //
        if( $request->hasFile('userfile') ){
            $file = $request->file('userfile');
            $destination_path = 'img/obrazki/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $file->move($destination_path, $filename);
            $image->file = $destination_path . $filename;
        }

        // replace old data with new data from the submitted form //
        $image->caption = $request->input('caption');
        $image->description = $request->input('description');
        $image->save();

        return redirect('/')->with('message','You just updated an image!');
    }
    public function destroy($id)
    {
        $image = Image::find($id);
        $image->delete();
        return redirect('/')->with('message','You just uploaded an image!');
    }
    public function resize($image,$size){
        try
        {
            $extension 		= 	$image->getClientOriginalExtension();
            $imageRealPath 	= 	$image->getRealPath();
            $thumbName 		= 	'thumb_'. $image->getClientOriginalName();

            //$imageManager = new ImageManager(); // use this if you don't want facade style code
            //$img = $imageManager->make($imageRealPath);

            $img = Img::make($imageRealPath); // use this if you want facade style code
            $img->resize(intval($size), null, function($constraint) {
                $constraint->aspectRatio();
            });
            return $img->save(public_path('images'). '/'. $thumbName);
        }
        catch(Exception $e)
        {
            return false;
        }
    }
}
