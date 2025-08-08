<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\MultiImage;
use Illuminate\Http\Request;

class MultiImageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }//end mehtod

    public function store(Request $request){
        // dd($request->all());
        $images = $request->file('multi_image');

        foreach($images as $image){
            $t = time();
            $fileName = $image->getClientOriginalExtension();
            $img_name = "{$t}-{$fileName}";
            $img_url = 'uploads/multi/'.$img_name;

            $image->move(public_path('uploads/multi'), $img_name);

            MultiImage::create([
                'multi_image'=>$img_url,
                'created_at'=>Carbon::now()
            ]);
        }

        $data = ['status'=>'success','message'=>'Images uploaded successfully'];
        return redirect()->back()->with($data);
    }//end method
}
