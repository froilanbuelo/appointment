<?php

namespace App\Http\Controllers;

use App\Availability;
use App\Http\Requests\AvailabilityRequest;
use Auth;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Session;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        $availability = Availability::findOrFail($id);
        $form = $formBuilder->create('App\Forms\AvailabilityForm', [
            'method' => 'PATCH',
            'model' => $availability,
            'url' => route('availability.update',$id)
        ]);
        // dd($form->getModel()->event_id);
        return view('availability.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AvailabilityRequest $request, $id)
    {
        $availability = Availability::findOrFail($id);
        if ($request->get('availability_type') == 'D'){
            $request['date_range_start'] = null;
            $request['date_range_end'] = null;
        }else if ($request->get('availability_type') == 'R'){
            $request['rolling_days'] = null;
        }else{
            $request['rolling_days'] = null;
            $request['date_range_start'] = null;
            $request['date_range_end'] = null;
        }
        $availability->update($request->input());
        Session::flash('flash_message', '<b>Success!</b> Event Availability Saved.');
        Session::flash('flash_type', 'alert-success');
        return redirect()->route('availability.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
