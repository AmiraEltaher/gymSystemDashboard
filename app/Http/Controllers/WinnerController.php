<?php

namespace App\Http\Controllers;

use App\Models\Champion;
use App\Models\Player;
use App\Models\Winner;
use Illuminate\Http\Request;

class WinnerController extends Controller
{
    private $column=[
    'championship_id',
    'player_id',
        ];






    public function index()
    {

         $players = player::with( 'champions')->get();
        // dd($winners);
         return view('admin.Winners.viewWinner', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $players = Player::select('id','namePlayer')->get();
        $champions = Champion::select('id','championName')->get();
        return view('admin.Winners.addWinner',compact('players','champions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only($this->column);
        Winner::create($data);

        return redirect('winners');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $player = Player::findOrFail($id);
        $champions = Champion::select('id','championName')->get();

        return view('admin.Winners.showWinner', compact('player','champions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $player = Player::findOrFail($id);
        $champions = Champion::select('id','championName')->get();

        return view('admin.Winners.editWinner', compact('player','champions'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $winner = Player::findOrFail($id);
        //dd($winner);
        $winner->delete();
        return redirect('winners');
    }
}