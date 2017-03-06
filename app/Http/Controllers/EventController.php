<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\EventStoreRequest;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\FormBuilder;
use Session;

class EventController extends Controller
{
    protected $event;
    public function __construct(Event $event){
        $this->event = $event;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Auth::user()->events;
        return view('event.index',compact('events'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\EventForm', [
            'method' => 'POST',
            'url' => route('event.store')
        ]);

        return view('event.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStoreRequest $request)
    {
        $event = Auth::user()->events()->create($request->input());
        Session::flash('flash_message', '<b>Success!</b> Event created.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, FormBuilder $formBuilder)
    {
        $event = Auth::user()->events()->findOrFail($id);
        $form = $formBuilder->create('App\Forms\EventForm', [
            'method' => 'PATCH',
            'model' => $event,
            'url' => route('event.update',$id)
        ]);

        return view('event.edit', compact('form'));
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
        //$request['is_active'] = $request->has('is_active')?1:0;
        $event = Auth::user()->events()->findOrFail($id)->update($request->input());

        Session::flash('flash_message', '<b>Success!</b> Event Saved.');
        Session::flash('flash_type', 'alert-success');

        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Auth::user()->events()->findOrFail($id)->delete();

        Session::flash('flash_message', '<b>Success!</b> Event Deleted.');
        Session::flash('flash_type', 'alert-success');

        return redirect()->route('event.index');
    }
}
