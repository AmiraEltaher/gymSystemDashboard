<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Week;
use App\Traits\Common;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    use Common;
    private $columns = [
        'photoCoach',
        'nameCoach',
        'ageCoach',
        'addresCoach',
        'phoneCoach',
        'timeCoach',
        'shipCoach',
        'salaryCoach',
        'QRCodeCoach',
        'freeCoach',
    ];
    public function index()
    {
        $coaches = Coach::get();
        return view('layouts.Viewcoach', compact('coaches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $days = Week::select('id', 'day')->get();
        return view('layouts.Addcoach');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $messages = $this->messages();
        $data = $request->validate([

            'photoCoach' => 'required|mimes:png,jpg,jepg|max:2048',
            'nameCoach' => 'required|string',
            'ageCoach' => 'required|numeric',
            'addresCoach' => 'required|string',
            'phoneCoach' => 'required|string',
            'timeCoach' => 'required|string',
            'shipCoach' => 'required|string',
            'salaryCoach' => 'required|numeric',
            'QRCodeCoach' => 'required|string',
            'freeCoach' => 'required|string',
        ],  $messages);
        //$data = $request->only($this->columns);
        $fileName = $this->uploadFile($request->photoCoach, 'assets/img');
        $data['photoCoach'] =  $fileName;

        $data['QRCodeCoach'] = "code";

        Coach::create($data);

        return redirect("Viewcoach");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $coach = Coach::findOrFail($id);
        return view('layouts.Showcoach', compact('coach'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coach = Coach::findOrFail($id);

        return view('layouts.Editcoach', compact('coach'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([

            'photoCoach' => 'required|mimes:png,jpg,jepg|max:2048',
            'nameCoach' => 'required|string',
            'ageCoach' => 'required|numeric',
            'addresCoach' => 'required|string',
            'phoneCoach' => 'required|string',
            'timeCoach' => 'required|string',
            'shipCoach' => 'required|string',
            'salaryCoach' => 'required|numeric',
            'QRCodeCoach' => 'required|string',
            'freeCoach' => 'required|string',
        ],  $messages);
        //$data = $request->only($this->columns);
        if ($request->hasFile('photoCoach')) {
            $fileName = $this->uploadFile($request->photoCoach, 'assets/img');
            $data['photoCoach'] =  $fileName;
        }
        $data['QRCodeCoach'] = "code";
        Coach::where('id', $id)->update($data);
        return redirect("Viewcoach");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Coach::where('id', $id)->forceDelete();
        $coach = Coach::findOrFail($id);

        // Delete the associated file
        $filePath = public_path('assets/img/' . $coach->photoCoach); // Modify the path as per your file structure
        if (File::exists($filePath)) {
            File::delete($filePath);
        }


        $coach->delete();
        return redirect('Viewcoach');
    }

    public function messages()
    {
        return [
            'photoCoach.required' => 'من فضلك ادخل الصورة',
            'nameCoach.required' => 'من فضلك ادخل الاسم',
            'ageCoach.required' => 'من فضلك ادخل السن',
            'addresCoach.required' => 'من فضلك ادخل العنوان',
            'phoneCoach.required' => 'من فضلك ادخل رقم التليفون',
            'timeCoach.required' => 'من فضلك ادخل مواعيد العمل',
            'shipCoach.required' => 'من فضلك ادخل الوظيفة التدريبية',


            'salaryCoach.required' => 'من فضلك ادخل الراتب الشهرى',
            'freeCoach.required' => 'من فضلك ادخل الاجازة  ',

        ];
    }
}
