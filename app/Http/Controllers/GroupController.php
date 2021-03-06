<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $tags = $user->tags;
        return response()->json($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
    public function store(Request $request)
    {
        $tag = new Tag();
        $tag->title = request('title');
        $tag->user_id = Auth::id();
        $tag->save();

        $user = Auth::user();

        $tags = $user->tags;
        return response()->json($tags);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
//    public function show(Group $group)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  \App\Group  $group
//     * @return \Illuminate\Http\Response
//     */
//    public function edit(Group $group)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \App\Group  $group
//     * @return \Illuminate\Http\Response
//     */
    public function update(Request $request, Group $group)
    {
        $tag->title = request('title');
        $tag->user_id = Auth::id();
        $tag->save();

        $user = Auth::user();

        $tags = $user->tags;
        return response()->json($tags);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $tag->delete();

        $user = Auth::user();

        $tags = $user->tags;
        return response()->json($tags);
    }
}
