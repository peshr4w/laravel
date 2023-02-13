<?php

namespace App\Http\Controllers;

use App\Mail\helloMail;
use App\Models\User;
use App\Models\customers;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

use function GuzzleHttp\Promise\all;

class mainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $max_class = "";
        $id = $pagers = 0;
        $students = student::paginate(5);
        $students_all = student::all();
        return view('index', compact('students','students_all','max_class','id','pagers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate(['name' => 'required|min:3']);

        $student = new student;
        $student->name = $request->get('name');
        $student->save();

        return back()->with('success', 'new student added to the table');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skip = $id*5;
        $students = student::skip($skip)->take(5)->get();
        $students_all = student::all();
        $pagers = intval($students_all->count() /5);
        $min_class= $max_class = "";
        if ($id == 0){
            $min_class = 'disabled';
        }elseif($id == $pagers){
            $max_class  = 'disabled';
        }
        return view('index',compact('students','students_all','id','pagers','min_class','max_class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = student::find($id);
        return view('edit', compact('students'));
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
        $request->validate(['name' => 'required | min:3']);
        student::find($id)->update($request->all());
        return Redirect()->route('students.index')->with('updated', 'a student has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        student::where('id', $id)->delete();
        return back()->with('deleted', 'a student has been deleted');
    }
}
