<?php

class TestsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tests = Test::orderBy('expire', 'desc')->get();

        return View::make('tests.home', compact('tests'));
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
        $test->expire = $expires;
        $test->app_id = Input::get('app_id');
        $test->controller_id = Input::get('controller_id');
        $test->view_id = Input::get('view_id');
        $test->test_type = Input::get('test_type');
        $test->test_value = (Input::get('test_type') == 'text') ? Input::get('view_text') : Input::get('view_textcolor');
        $test->save();

        return Redirect::route('tests.index');
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