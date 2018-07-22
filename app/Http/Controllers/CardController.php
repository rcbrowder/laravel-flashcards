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
        $id = \Auth::id();
        $cards = \DB::table('cards')->where('creator_id', $id)->get();

        return view('cards.index', compact('cards'));
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
        $id = \Auth::id();
        $user = \Auth::user();
        $decks = $user->decks;
        $cards = $user->cards;

        $validatedData = $request->validate([
            'term' => 'required',
            'definition' => 'required',
        ]);

        \DB::table('cards')->insert(
            ['term' => $request->input('term'), 'definition' => $request->input('definition'), 'deck_id' => $id]
        );

        $request->session()->flash('status','Card created!');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = \Auth::id();
        $cards = \DB::table('cards')->where('creator_id', $id)->get();
        return view('cards.show', compact('cards'));

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
        $validatedData = $request->validate([
            'term' => 'required',
            'definition' => 'required',
        ]);

        \DB::table('cards')->where('id', $id)->update(['term' => $request->input('term')]);
        \DB::table('cards')->where('id', $id)->update(['definition' => $request->input('definition')]);

        $request->session()->flash('status', 'Card updated!');
        return redirect()->action('CardController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $deletedRows = \DB::table('cards')->where('id', $id)->delete();
        $request->session()->flash('status', 'Activity deleted!');
        return redirect()->action('CardController@index');
    }
}
