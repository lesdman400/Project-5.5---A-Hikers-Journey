<?php

namespace App\Http\Controllers;

use App\Models\Trail;
use App\Models\TrailNotes;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Session;

const DEFAULT_VALIDATION = array(
    'trails_id' => 'required',
    'hike_date' => 'date',
    'direction_type' => 'in:nobo,sobo,flipflop',
    'start_mile_marker' => 'integer|nullable',
    'start_location' => 'string|nullable',
    'start_elevation' => 'integer|nullable',
    'end_location' => 'string|nullable',
    'end_mile_marker' => 'integer|nullable',
    'end_elevation' => 'integer|nullable',
    'camp_type' => 'in:tent,shelter,building,hammock,cowboy',
    'slackpacked' => 'nullable',
    'bed' => 'nullable',
    'shower' => 'nullable',
    'mood_scale' => 'integer|nullable',
    'blaze_type' => 'in:pink,yellow,blue,white,aqua',
    'trail_notes' => 'string'
);
class TrailNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('trail_notes.index',['user' => Auth::user()->load('trailnotes')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trail_notes.create',['user' => Auth::user()->load('trails')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(DEFAULT_VALIDATION);

        $request->user()->trailnotes()->create($validated);

        return redirect(route('trail_notes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrailNotes  $trailNotes
     * @return \Illuminate\Http\Response
     */
    public function show(TrailNotes $trailNotes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrailNotes  $trailNotes
     * @return \Illuminate\Http\Response
     */
    public function edit(TrailNotes $trailNotes, Trail $trail, User $user)
    {
        return view('trail_notes.edit', ['trailNotes' => $trailNotes, 'trail' => $trail, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrailNotes  $trailNotes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrailNotes $trailNotes)
    {
        $this->authorize('update', $trailNotes);
        $validated = $request->validate(DEFAULT_VALIDATION);
        $trailNotes->update($validated);

        Session::flash('message', 'Trail Added Successfully!'); 
        Session::flash('alert-class', 'green');

        return redirect(route('trail_notes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrailNotes  $trailNotes
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrailNotes $trailNotes)
    {
        //
    }
}
