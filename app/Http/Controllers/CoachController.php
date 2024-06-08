<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Week;
use App\Traits\Common;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
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
<<<<<<< HEAD
        return view('admin.Coach.Viewcoach', compact('coaches'));
=======
        return view('layouts.Viewcoach', compact('coaches'));
>>>>>>> f03a76832a558df044e79c3b3ae826137e7270ea
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< HEAD
        return view('admin.Coach.Addcoach');
=======
        return view('layouts.Addcoach');
>>>>>>> f03a76832a558df044e79c3b3ae826137e7270ea
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $messages = $this->messages();
        $data = $request->validate([
            'photoCoach' => 'required|mimes:png,jpg,jepg',
            'nameCoach' => 'required|string',
            'ageCoach' => 'required|numeric',
            'addresCoach' => 'required|string',
            'phoneCoach' => 'required|string',
            'timeCoach' => 'required|string',
            'shipCoach' => 'required|string',
            'salaryCoach' => 'required|numeric',
            'freeCoach' => 'required|string',
        ],  $messages);

        //$data = $request->only($this->columns);



        // Start a database transaction
        DB::beginTransaction();
        try {
            $fileName = $this->uploadFile($request->photoCoach, 'assets/img');
            $data['photoCoach'] =  $fileName;
            $data['QRCodeCoach'] = "code";
            // Perform your database operations within the transaction
<<<<<<< HEAD

=======
>>>>>>> f03a76832a558df044e79c3b3ae826137e7270ea
            Coach::create($data);

            // Commit the transaction if all operations succeed
            DB::commit();

            // Redirect the user or return a success response
<<<<<<< HEAD
            return redirect('coaches');
=======
            return redirect('Viewcoach');
>>>>>>> f03a76832a558df044e79c3b3ae826137e7270ea
        } catch (\Exception $e) {
            // Rollback the transaction if any operation fails
            DB::rollback();

            // Handle the exception (e.g., log the error, display a message)
            // Redirect the user or return an error response
            return back()->withError('An error occurred while creating the player.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $coach = Coach::findOrFail($id);
<<<<<<< HEAD
        return view('admin.Coach.Showcoach', compact('coach'));
=======
        return view('layouts.Showcoach', compact('coach'));
>>>>>>> f03a76832a558df044e79c3b3ae826137e7270ea
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coach = Coach::findOrFail($id);

<<<<<<< HEAD
        return view('admin.Coach.Editcoach', compact('coach'));
=======
        return view('layouts.Editcoach', compact('coach'));
>>>>>>> f03a76832a558df044e79c3b3ae826137e7270ea
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $messages = $this->messages();
        $data = $request->validate([
            'photoCoach' => 'required|mimes:png,jpg,jepg',
            'nameCoach' => 'required|string',
            'ageCoach' => 'required|numeric',
            'addresCoach' => 'required|string',
            'phoneCoach' => 'required|string',
            'timeCoach' => 'required|string',
            'shipCoach' => 'required|string',
            'salaryCoach' => 'required|numeric',
            'freeCoach' => 'required|string',
        ],  $messages);

        //$data = $request->only($this->columns);



        // Start a database transaction
        DB::beginTransaction();
        try {
            if ($request->hasFile('photoCoach')) {
                // Upload the new file and update the 'photoPlayer' field
                $data['photoCoach'] = $this->uploadFile($request->file('photoCoach'), 'assets/img');
            }



            $data['QRCodeCoach'] = "code";
            // Perform your database operations within the transaction
            Coach::where('id',$id)->update($data);

            // Commit the transaction if all operations succeed
            DB::commit();

            // Redirect the user or return a success response
            return redirect('Viewcoach');
        } catch (\Exception $e) {
            // Rollback the transaction if any operation fails
            DB::rollback();

            // Handle the exception (e.g., log the error, display a message)
            // Redirect the user or return an error response
            return back()->withError('An error occurred while creating the player.');
        }
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
<<<<<<< HEAD
        return redirect('admin.Coach.Viewcoach');
=======
        return redirect('Viewcoach');
>>>>>>> f03a76832a558df044e79c3b3ae826137e7270ea
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