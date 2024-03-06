<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

use App\Traits\Common;

class PlayerController extends Controller
{
    use Common;

    private $column = [
        'photoPlayer',
        'namePlayer',
        'agePlayer',
        'addresPlayer',
        'phonePlayer',

    ];
    public function index()
    {
        $players = Player::get();
        return view('layouts.Viewplayer', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.Addplayer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([

            'photoPlayer' => 'required|mimes:png,jpg,jepg|max:2048',
            'namePlayer' => 'required|string',
            'agePlayer' => 'required|numeric',
            'addresPlayer' => 'required|string',
            'phonePlayer' => 'required|string',

        ],  $messages);
        //$data = $request->only($this->column);

        $data['photoPlayer']  = $this->uploadFile($request->photoPlayer, 'assets/img');

        Player::create($data);
        return redirect('Viewplayer');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $player = Player::findOrFail($id);
        return view('layouts.Showplayer', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $player = Player::findOrFail($id);
        return view('layouts.Editplayer', compact('player'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([

            'photoPlayer' => 'required|mimes:png,jpg,jepg|max:2048',
            'namePlayer' => 'required|string',
            'agePlayer' => 'required|numeric',
            'addresPlayer' => 'required|string',
            'phonePlayer' => 'required|string',

        ],  $messages);
        // $data = $request->only($this->column);

        // Check if a new file has been provided
        if ($request->hasFile('photoPlayer')) {
            // Upload the new file and update the 'photoPlayer' field
            $data['photoPlayer'] = $this->uploadFile($request->file('photoPlayer'), 'assets/img');
        }

        Player::where('id', $id)->update($data);
        return redirect('Viewplayer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $player = Player::findOrFail($id);

        // Delete the associated file
        $filePath = public_path('assets/img/' . $player->photoPlayer); // Modify the path as per your file structure
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
        $player->delete();
        return redirect('Viewplayer');
    }


    public function messages()
    {
        return [
            'photoPlayer.required' => 'Please insert your image',
            'namePlayer.required' => 'Please insert your name',

        ];
    }
}
