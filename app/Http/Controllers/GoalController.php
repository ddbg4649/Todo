<?php

namespace App\Http\Controllers;

use App\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * ユーザーが作成したすべてのGoalを
     * 「JSON」(JavaScript Object Notation)という形式で送信
     * responseというヘルパーでアクションからレスポンスを返す。
     * 今回はユーザーが作成したすべてのGoalをJSON形式でレスポンスとして返す。
     */
    public function index()
    {
        $goals = Auth::user()->goals;
        
        return response()->json($goals);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 送られてきたリクエストの値を使い、新しくGoalを作成します。
     * indexアクション同様にJSON形式でレスポンスを返します。　　
     */
    public function store(Request $request)
    {
        $goal = new Goal();
        $goal->title = request('title');
        $goal->user_id = Auth::id();
        $goal->save();
        
        $goals = Auth::user()->goals;
        
        return response()->json($goals);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     * 送られてきたリクエストの値を使い、既存のGoalを更新します。
     */
    public function update(Request $request, Goal $goal)
    {
        $goal->title = request('title');
        $goal->user_id = Auth::id();
        $goal->save();
        
        $goals = Auth::user()->goals;
        
        return response()->json($goals);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Goal  $goal
     * @return \Illuminate\Http\Response
     * 送られてきたリクエストの値を使い、既存のGoalを削除します。
     */
    public function destroy(Goal $goal)
    {
        $goal->delete();
        
        $goals = Auth::user()->goals;
        
        return response()->json($goals);
    }
}
