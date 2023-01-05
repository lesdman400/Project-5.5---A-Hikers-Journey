<?php

namespace App\Http\Controllers;

use App\Models\Hiker;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SebastianBergmann\Environment\Console;

class HikerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hikers.index',['user' => Auth::user()->load('hiker')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       $validated = $request->validate([
           'hiker_trail_name' => 'required|string|max:255',
           'hiker_about' => 'nullable|string',
        ]);
        $validated['hiker_uuid'] = (string) Str::uuid();
        $path = $request->file('profile_img_url')->store(storage_path('app/public').'profile_img_url');
        $validated['profile_img_url'] = $path;
        $request->user()->hiker()->firstOrCreate($validated);
        return redirect(route('hiker.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hiker  $hiker
     * @return \Illuminate\Http\Response
     */
    public function show(Hiker $hiker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hiker  $hiker
     * @return \Illuminate\Http\Response
     */
    public function edit(Hiker $hiker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hiker  $hiker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hiker $hiker)
    {
        $validated = $request->validate([
            'hiker_trail_name' => 'required|string|max:255',
            'hiker_about' => 'string',
         ]);
         $path = $request->file('profile_img_url')->store('profile_img_url');
         $validated['profile_img_url'] = $path;
         $request->user()->hiker()->update($validated);
         return redirect(route('hiker.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hiker  $hiker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hiker $hiker)
    {
        //
    }
}
