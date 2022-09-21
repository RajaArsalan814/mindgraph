<?php

namespace App\Http\Controllers;

use App\Mail\EventMail;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redis;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->paginate(5);
        return view('event.index',compact('events'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_data($id)
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
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
            'name' => 'required|min:3',
            'slug' => 'required|unique:events',
        ]);
        try {
            DB::beginTransaction();
            $event = Event::create([
                'name' => $request->name,
                'slug' => $request->slug,
            ]);
            $email = Auth::user()->email;
            Mail::to($email)->send(new EventMail(url('events/'.$event->id)));
            DB::commit();
            return redirect(url('events'))->with('success','Event created successfully');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->back()->with('error','Error occured' . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $event = Event::find($id);
        return view('event.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('event.edit',compact('event'));
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
        $validated = $request->validate([
            'name' => 'required|min:3',
            'slug' => 'required|unique:events,id',
        ]);
        try {
            DB::beginTransaction();
            $event = Event::find($id);
            $event->name = $request->name;
            $event->slug = $request->slug;
            $event->save();
            DB::commit();
            return redirect(url('events'))->with('success','Event updated successfully');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->back()->with('error','Error occured' . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            $event = Event::find($id);
            $event = $event->delete();
            DB::commit();
            return redirect(url('events'))->with('success','Event deleted successfully');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->back()->with('error','Error occured' . $ex->getMessage());
        }
    }

    public function api_event()
    {
        return view('event.index_api');
    }
}
