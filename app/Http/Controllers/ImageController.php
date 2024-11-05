<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Validator;

class ImageController extends Controller
{

    public function index(){

        $images=Image::select('filepath')->orderBy('filepath','asc')->get();

        return view('upload',compact('images'));

    }

    public function upload(Request $request){
        
        $validator = Validator::make($request->all(), 
            [
                'image' => 'required||mimes:jpg,png|max:2048'            
            ],
            [
                'image.required'=> 'Image is required', 
                'image.mimes'=> 'Please upload jpg or png type image',   
                'image.max'=> 'Image size can not be more than 2MB',     
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file=$request->file('image');
        $fileName=$file->getClientOriginalName();  

        $dataExists=Image::where('filepath',$fileName)->exists();
        $fileExists=file_exists(public_path().'/images/'.$fileName);        
        if($dataExists || $fileExists){
            return redirect()->back()->with('error', 'Image name already exists');
        }     

        $upload=$file->move(public_path('images'), $fileName);
        if(!$upload){
            return redirect()->back()->with('error', 'Image not uploaded');
        }
        
        $image=Image::create([
            'filepath' => $fileName
        ]);   
        if(!$image){
            return redirect()->back()->with('error', 'Image not uploaded');
        }

        return redirect()->back()->with('success', 'Image successfully uploaded.'); 
    

    }
}
