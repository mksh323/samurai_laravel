<?php

namespace App\Http\Controllers;

use App\Events;
use \Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('events.create_event');
        $items=DB::select('select * from Events');
        return view('components.index', ['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        try{
        $event = new Events();
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');
        $event->start_time = $request->input('start_time');
        $event->end_time = $request->input('end_time');
        $event->title = $request->input('title');
        $event->content = $request->input('content');
        $event->group_id = "0";
        $event->user_id = "name";
        $event->alert_flg = 1;
        $event->start_datetime = $request->input('start_datetime');
        $event->end_datetime = $request->input('end_datetime');

        $event->save();
        }catch (\Exception $ex){
            $status = array("status"=>"error", "code"=>"900", "message"=>$ex);
            return $status;
        }
        $items=DB::select('select * from Events');
        $status = array("status"=>"success", "code"=>"200", "message"=>"sucess", "data"=>$items);
            return $status;
        $validate_rule = [
                'title' => 'required',
                'start_date' => 'required',
                'start_time' => 'required',
        ];
    }
//exception エラー表示
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
        //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    // public function show(Event $event)
    // {
        
    // }
    public function show()
    {
        $items=DB::select('select * from Events');
        $status = array("status"=>"success", "code"=>"200", "message"=>"sucess", "data"=>$items);
            return $status;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        try{
            $events=Events::find($request->id);
            $status = array("status"=>"success", "code"=>"200", "message"=>"sucess", "data"=>$events);
            return $status;
        }catch(\Exception $ex){
            return response()->json([
                'status'=> false,
                'message'=>'error01',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // try{
            $events=Events::find($request->id);
            $form=$request->all();
            $events->fill($form)->save();
        // }catch(\Exception $ex){
        //     return response()->json([
        //         'status'=> false,
        //         'message'=>$ex,
        //     ]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            Events::find($request->id)->delete();
        }catch(\Exception $ex){
            return response()->json([
                'status'=> false,
                'message'=>'error03',
            ]);
        }
            return response()->json([
                'status'=> true,
                'message'=>'success03',
        ]);
    }
}