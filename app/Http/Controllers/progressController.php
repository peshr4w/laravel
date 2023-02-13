<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class progressController extends Controller
{
    public function index(){
        $images = Form::all();
        return view('fileUpload',compact('images'));
    }

    public function uploadToServer(Request $request){
    $request->validate(['path'=>'required']);
    $filaname = time().".".$request->file('path')->getClientOriginalName();
    $request->file('path')->move('images',$filaname);

    $form = new Form;
    $form->path =  $filaname;
    $form->save();
    return response()->json(['success','file upladed successfuy']);
    }
}
