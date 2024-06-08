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
<<<<<<< HEAD
        // Retrieve the player ID from the request data
        $playerId = $request->input('player_id');

        // Retrieve an array of champion IDs from the request data
        $championIds = $request->input('championship_id');

        // Find the player by ID
        $player = Player::findOrFail($playerId);

        // Iterate through each champion ID and associate it with the player
        foreach ($championIds as $championId) {
            // Attach the champion to the player
            $player->champions()->attach($championId);
        }
=======
        $data = $request->only($this->column);
        Winner::create($data);
>>>>>>> f03a76832a558df044e79c3b3ae826137e7270ea

        return redirect('winners');
    }

<<<<<<< HEAD

=======
>>>>>>> f03a76832a558df044e79c3b3ae826137e7270ea
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

<<<<<<< HEAD
        $player = player::with( 'champions')->findOrFail($id);

        return view('admin.Winners.showWinner', compact('player'));
=======
        $player = Player::findOrFail($id);
        $champions = Champion::select('id','championName')->get();

        return view('admin.Winners.showWinner', compact('player','champions'));
>>>>>>> f03a76832a558df044e79c3b3ae826137e7270ea
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
<<<<<<< HEAD
        $player = player::findOrFail($id);
        $champions = Champion::select('id','championName')->get();
=======
        $player = Player::findOrFail($id);
        $champions = Champion::select('id','championName')->get();

>>>>>>> f03a76832a558df044e79c3b3ae826137e7270ea
        return view('admin.Winners.editWinner', compact('player','champions'));

    }

    /**
     * Update the specified resource in storage.
     */
<<<<<<< HEAD
    public function update(Request $request, $id)
    {
        // Retrieve the player by ID
        $player = Player::findOrFail($id);

        // Retrieve an array of updated champion IDs from the request
        $updatedChampionIds = $request->input('championship_id');

        // Synchronize the updated champion IDs with the player's existing champions
        $player->champions()->sync($updatedChampionIds);

        return redirect('winners');
    }



=======
    public function update(Request $request, string $id)
    {
        //
    }

>>>>>>> f03a76832a558df044e79c3b3ae826137e7270ea
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