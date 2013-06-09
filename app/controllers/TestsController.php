<?php

class TestsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('tests.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
        return View::make('tests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        /*
        Array
        (
            [test_type] => text
            [view_text] => Suggest a New Store
            [view_textcolor] => #000000
            [test_name] => 
            [duration_length] => 1
            [duration_unit] => day(s)
            [controller_id] => 2
            [view_id] => 0.0.2
            [app_id] => 1
        )

        $table->increments('id');
            $table->string('name');
            $table->datetime('expire');
            $table->integer('app_id');
            $table->string('controller_id');
            $table->string('view_id');
            $table->string('test_type');
            $table->string('test_value');
            $table->timestamps();
        */

        if (Input::get('duration_unit') == 'W') {
            $duration_length = 7;
            $duration_unit = 'D';
        } else {
            $duration_length = Input::get('duration_length');
            $duration_unit = Input::get('duration_unit');
        }

        $expires = new DateTime;
        $interval = new DateInterval('P'. $duration_length . $duration_unit);
        $expires->add($interval);

        $test = new Test;
        $test->name = Input::get('test_name');
        $test->expire = new DateTime;
        $test->app_id = Input::get('app_id');
        $test->controller_id = Input::get('controller_id');
        $test->view_id = Input::get('view_id');
        $test->test_type = Input::get('test_type');
        $test->test_value = (Input::get('test_type') == 'text') ? Input::get('view_text') : Input::get('view_textcolor');
        $test->save();

        return Redirect::route('tests.show', array($test->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $test = Test::findOrFail($id);

        return View::make('tests.show', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}