<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TimetableCreateRequest;
use App\Model\Timetable;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $timetables = Timetable::all();
        return view('timetable/index')->with('timetables', $timetables);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo '<p> create </p>';
        return view('Timetable/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //request will contain name value pairs
        Timetable::create(['tutor_id' => $request->tutor_id, 
                            'subject' => $request->subject,
                            'date' => $request->date,
                            'time' => $request->time]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        echo "show". $id;
        $timetable = Timetable::findOrFail($id);
        return view('timetable/show')->with('timetable', $timetable);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edits the form
        $timetable=Timetable::findOrFail($id);
        return view('Timetable/edit')->with('timetable', $timetable);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TimetableCreateRequest $request, $id)
    {
        //update records
        $timetable = Timetable::find($id);
        $timetable->tutor_id = $request->tutor_id;
        $timetable->subject = $request->subject;
        $timetable->date = $request->date;
        $timetable->time = $request->time;

        $timetable->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $timetable = Timetable::findOrFail($id);
        $timetable->delete();

        return redirect()->back();
    }
}
