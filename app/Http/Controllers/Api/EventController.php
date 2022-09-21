<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::get();
        return response()->json($events,200);
    }


    public function event_status()
    {

        $events = Event::where('start_at', '<=', Carbon::now('UTC')->toDateTimeString())
                    ->where('end_at', '>=', Carbon::now('UTC')->toDateTimeString())
                    ->get();

        return response()->json($events,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $events = new Event();
        $events->name = $request->name;
        $events->slug = $request->slug;
        $events->save();
        return response()->json($events,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $events = Event::findOrFail($id);
        return response()->json($events,200);
    }

    /**
     * Update the specified resource in storage or create new.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateorcreate(Request $request, $id)
    {


        if (Event::find($id)) {
            return response()->json('Already in system.');
        }else{
            $events = new Event();
            $events->name = $request->name;
            $events->slug = $request->slug;
            $events->save();
            return response()->json($events,200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $events = Event::find($id);
        $events->update($request->all());
        return response()->json($events,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $events = Event::where('id',$id)->delete();
        return response()->json('Event Deleted',200);
    }
}
