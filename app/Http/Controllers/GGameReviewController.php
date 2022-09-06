<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GGameReviewController extends Controller
{
    //
    public function index(){
        $gamereview = DB::table('game_reviews')
        ->orderBy('created_at','desc')
        ->get();
        // dd($gamereview);
        return response()->json(['reviews'=>$gamereview], 200);
    }

    public function store(Request $request){
        DB::table('game_reviews')
        ->insert([
            'title'=> $request['title'],
            'body'=> $request['body'],
            'rating'=> $request['rating'],
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);
        dd('Success');
    }
}
