<?php

namespace App\Http\Controllers;

use App\Models\Trail;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


const DEFAULT_VALIDATION = array(
    'trail_name' => 'required|string|max:255',
    'trail_start_date' => 'date|nullable',
    'trail_end_date' => 'date|nullable',
    'trail_about' => 'string|nullable',
    'instagram_url' => 'string|nullable',
    'instagram_map_img_url' => 'string|nullable',
    'fitbit_url' => 'string|nullable',
    'lighter_pack_url' => 'string|nullable',
    'garmin_map_url' => 'string|nullable');
class TrailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Auth::user()->load('trails');
        return view("trails.index",['user' => Auth::user()->load('trails')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('trails.create');
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
        $validated['trail_uuid'] = (string) Str::uuid();
        $path = $request->file('trail_about_img_url')->store('trail_about_img_url');
        // $filePath = 'Trails\'' . $request->user()->user_uuid . $request->user()->user_uuid . $validated["trail_uuid"];
        // $path = $request->file('trail_about_img_url')->store($filePath);
        $validated['trail_about_img_url'] = $path;
        
        $request->user()->trails()->create($validated);

        return redirect(route('trails.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function show($trailUUID)
    {

        
        $trail = DB::table('users')
        ->join('hikers','users.id','=','hikers.user_id')
        ->join('trails','users.id','=','trails.user_id')
        ->select('users.id as userID','users.name as userName','hikers.hiker_trail_name','hikers.hiker_about','hikers.profile_img_url','trails.*')
        ->where('trails.trail_uuid',$trailUUID)
        ->get();
        
        $trailList = DB::table('trails')
        ->select('trails.trail_name', 'trails.trail_end_date')
        ->where('trails.user_id',$trail[0]->userID)
        ->get();

        $trailNotes = DB::table('trail_notes')
        ->select('trail_notes.*')
        ->where('trail_notes.trails_id',$trail[0]->id)
        ->get();

        // $trail = DB::table('trails')
                        
        //                 ->select('trails.*')
        //                 ->where('id',$trailID)
        //                 ->get();

        // return $trail;

        return view('trails.show',['trail'=>$trail,'trailNotes' => $trailNotes, 'trailList' => $trailList]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function edit(Trail $trail)
    {
        return view('trails.edit',['trail'=>$trail]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trail $trail)
    {
        $this->authorize('update', $trail);
        $validated = $request->validate(DEFAULT_VALIDATION);
        if($request->hasFile('trail_about_img_url')){
            // Remove Old File
            $path1 = public_path('storage/'. $trail->trail_about_img_url);
            if(\File::exists($path1)) {
                unlink($path1);
            }
            
            $path = $request->file('trail_about_img_url')->store('trail_about_img_url');
            $validated['trail_about_img_url'] = $path;
        }


        $trail->update($validated);

        return redirect(route('trails.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trail $trail)
    {
        $this->authorize('delete', $trail);
 
        $trail->delete();
 
        return redirect(route('trails.index'));
    }
}
