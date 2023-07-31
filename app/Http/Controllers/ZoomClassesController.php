<?php

namespace App\Http\Controllers;

use App\Models\zoom_classes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Traits\MeetingZoomTrait;
use MacsiDigital\Zoom\Facades\Zoom;
use App\Http\Controllers\Controller;

class ZoomClassesController extends Controller
{
    use MeetingZoomTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $liveclasses = zoom_classes::all();
        return view('tutor.liveclasses', compact('liveclasses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //     $meeting = new zoom_classes();

        //     $meeting->Grade_id = '1';
        //     $meeting->Classroom_id = '1';
        //     $meeting->section_id = '1';
        //     $meeting->user_id = '1';
        //     $meeting->meeting_id = '1';
        //     $meeting->topic = '1';
        //     $meeting->start_at = Carbon::now();
        //     $meeting->duration = '1';
        //     $meeting->password = '1';
        //     $meeting->start_url = '1';
        //     $meeting->join_url = '1';
        //     $res = $meeting->save();
        // if ($res) {
        //     return back()->with('success', 'Class scheduled successfully');
        // } else {
        //     return back()->with('fail', 'Something went wrong, please try again later');
        // }

        // try {

            $meeting = $this->createMeeting($request);
            zoom_classes::create([
                'Grade_id' => '1',
                'Classroom_id' => '1',
                'section_id' => '1',
                'user_id' => auth()->user()->id,
                'meeting_id' => $meeting->id,
                'topic' => '1',
                'start_at' => carbon::now(),
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);
            return back()->with('success', 'Class added successfully');
            // toastr()->success(trans('messages.success'));
            // return redirect()->route('online_classes.index');
        // } catch (\Exception $e) {
        //     return redirect()->back()->with(['error' => $e->getMessage()]);
        // }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        //
    }
}
