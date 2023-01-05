<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome',['hiker'=> collect()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hiker  $hiker
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        // $users = DB::table('hikers')->get();
        // $trails = DB::table('trails')->whereColumn();
        $hikerData = DB::table('users')
                        ->join('hikers','users.id','=','hikers.user_id')
                        ->join('trails','users.id','=','trails.user_id')
                        ->select('users.name as userName','hikers.*','trails.*')
                        ->where('trail_name',$request->trailName)
                        ->get();

        // return $request;
        // return $hikerData;
        return view('welcome',['hiker'=> $hikerData]);
    }

    
}
