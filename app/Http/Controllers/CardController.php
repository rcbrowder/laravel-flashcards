<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = \DB::table('cards')->select('term', 'definition')->get();

        return view('home', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'term' => 'required',
            'definition' => 'required',
        ]);

        \DB::table('cards')->insert(
            ['term' => $request->input('term'), 'definition' => $request->input('definition')]
        );

        $request->session()->flash('status', 'Card created!');
        return redirect()->action('CardController@index');
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
        \DB::table('cards')->where('id', $id)->first();
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
        $validatedData = $request->validate([
            'term' => 'required',
            'definition' => 'required',
        ]);

        $card = \DB::table('cards')->where('id', $id)->first();

        $card->term = $request->input('term');
        $activity->definition = $request->input('definition');
        $activity->save();
        $request->session()->flash('status', 'Card updated!');
        return redirect()->action('CardController@index');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
