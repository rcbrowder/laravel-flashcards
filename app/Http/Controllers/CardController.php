<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = \Auth::user();
        // $deck = $user
        //
        // return redirect()->action('DeckController@show', compact('cards'));
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
            ['term' => $request->input('term'), 'definition' => $request->input('definition'), 'deck_id' => $request->input('deck_id')]
        );

        $request->session()->flash('status','Card created!');
        return redirect()->action('DeckController@show', $request->input('deck_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $card = \App\Card::where('id', $id)->get();

        return view('cards.show', compact('card'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card = \DB::table('cards')->where('id', $id)->first();
        return view('cards.edit', compact('card'));
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
        $card = \App\Card::where('id', $id)->first();
        $deck_id = $card->deck_id;

        $validatedData = $request->validate([
            'term' => 'required',
            'definition' => 'required',
        ]);

        \DB::table('cards')->where('id', $id)->update(['term' => $request->input('term')]);
        \DB::table('cards')->where('id', $id)->update(['definition' => $request->input('definition')]);

        $request->session()->flash('status', 'Card updated!');
        return redirect()->action('DeckController@show', compact('deck_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $card = \App\Card::where('id', $id)->first();
        $deck_id = $card->deck_id;

        $card->delete();
        $request->session()->flash('status', 'Activity deleted!');
        return redirect()->action('DeckController@show', compact('deck_id'));
    }
}
