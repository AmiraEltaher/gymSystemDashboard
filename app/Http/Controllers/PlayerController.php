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
        return view('admin.Player.Viewplayer', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< HEAD
        $players = Player::get();
        return view('admin.Player.add', compact('players'));
=======
        return view('admin.Player.Addplayer');
>>>>>>> f03a76832a558df044e79c3b3ae826137e7270ea
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
        return redirect('players');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $player = Player::findOrFail($id);
<<<<<<< HEAD
        return view('admin.Player.Showplayer', compact('player'));
=======
        return view('layouts.Showplayer', compact('player'));
>>>>>>> f03a76832a558df044e79c3b3ae826137e7270ea
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $player = Player::findOrFail($id);
<<<<<<< HEAD
        return view('admin.Player.Editplayer', compact('player'));
=======
        return view('layouts.Editplayer', compact('player'));
>>>>>>> f03a76832a558df044e79c3b3ae826137e7270ea
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $messages = $this->messages();
        $data = $request->validate([

            'photoPlayer' => 'nullable|mimes:png,jpg,jepg|max:2048',
            'namePlayer' => 'required|string',
            'agePlayer' => 'required|numeric',
            'addresPlayer' => 'required|string',
            'phonePlayer' => 'required|string',

        ],  $messages);

        $data = $request->only($this->column);

        // Check if a new file has been provided
        if ($request->hasFile('photoPlayer')) {
            // Upload the new file and update the 'photoPlayer' field
            $data['photoPlayer'] = $this->uploadFile($request->file('photoPlayer'), 'assets/img');
        }

        Player::where('id', $id)->update($data);
        return redirect('players');
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
        return redirect('players');
    }


    public function messages()
    {
        return [
            'photoPlayer.required' => 'من فضلك ادخل الصورة',
            'namePlayer.required' => 'من فضلك ادخل الاسم',
            'agePlayer.required' => 'من فضلك ادخل السن',
            'addresPlayer.required' => 'من فضلك ادخل العنوان',
            'phonePlayer.required' => 'من فضلك ادخل رقم التليفون',

        ];
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> f03a76832a558df044e79c3b3ae826137e7270ea
