<?php

namespace App\Http\Controllers;

use App\Models\Champion;
use Illuminate\Http\Request;

class ChampionController extends Controller
{
   private $column =[
    'championName',
   ];
    public function index()
    {
        $champions = Champion::get();
        return view("admin.Champion.ViewChampion", compact('champions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Champion.AddChampion');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only($this->column);
        Champion::create($data);
        return redirect('champions');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $champion = Champion::findOrFail($id);
        return view('admin.Champion.ShowChampion', compact('champion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $champion = Champion::findOrFail($id);
        return view('admin.Champion.EditChampion', compact('champion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only($this->column);
        Champion::where('id',$id)->update($data);
        return redirect('champions');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $champion = Champion::findOrFail($id);
        $champion ->delete();
        return redirect('champions');
    }
}
