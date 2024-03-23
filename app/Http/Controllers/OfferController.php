<?php

namespace App\Http\Controllers;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    private $column = [
        'offerName',
        'offerCost',
        'offerDuration',
        'offerStart',
        'offerEnd',
        'offerFeatures',

    ];
    public function index()
    {
        $offers = Offer::get();
        return view('admin.Offer.viewOffer', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.Offer.addOffer");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only($this->column);
        Offer::create($data);
        return redirect('offers');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $offer = Offer::findOrFail($id);
        return view('admin.Offer.showOffer', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $offer = Offer::findOrFail($id);
        return view('admin.Offer.editOffer', compact('offer'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only($this->column);
        Offer::where('id', $id)->update($data);
        return redirect('offers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $offer= Offer::findOrFail($id);
       $offer ->delete();
        return redirect('offers');
    }
}