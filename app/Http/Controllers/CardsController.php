<?php

namespace App\Http\Controllers;

use App\Models\cards;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = cards::all();
        return response()->json($cards);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $card = $request->validate(['title'=>'required', 'body'=> "required"]);
        cards::create($card);
        return response()->json("created");

    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $card = cards::find($id);
        return response()->json($card);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cards $cards)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $card = cards::find($id);
        $card->update($request->all());
        return response()->json("updated");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        cards::find($id)->delete();
        return response()->json("updated");
    }
}
