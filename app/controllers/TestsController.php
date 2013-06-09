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
        $test->goal_view_id = Input::get('view_id');
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

        $firstImpression = new Datetime($test->impressions()->orderBy('created_at', 'asc')->first()->created_at);
        $lastImpression = new DateTime($test->impressions()->orderBy('created_at', 'desc')->first()->created_at);

        $chart_data = array();
        if ($firstImpression && $lastImpression && $firstImpression < $lastImpression) {
            $chart_data['labels'] = array();
            $data = array();
            $now = $firstImpression;
            do {
                $chart_data['labels'][] = $now->format('D M j');

                $tomorrow = clone $now;
                $tomorrow->add(new DateInterval('P1D'));

                $views = $test->impressions()->where('created_at', '>=', $now)->where('created_at', '<', $tomorrow)->where('is_goal', 0)->count();
                $goals = $test->impressions()->where('created_at', '>=', $now)->where('created_at', '<', $tomorrow)->where('is_goal', 1)->count();

                $data[] = (float)($goals / $views * 100.0);
                $now->add(new DateInterval('P1D'));
            } while ($now < $lastImpression);

            $chart_data['datasets'] = array(
                array(
                    'fillColor' => 'rgba(220,220,220,0.5)',
                    'strokeColor' => 'rgba(220,220,220,1)',
                    'pointColor' => 'rgba(220,220,220,1)',
                    'pointStrokeColor' => '#fff',
                    'data' => $data
                )
            );
        }

        /*
        {
        labels : ["January","February","March","April","May","June","July"],
        datasets : [
            {
                fillColor : "rgba(220,220,220,0.5)",
                strokeColor : "rgba(220,220,220,1)",
                pointColor : "rgba(220,220,220,1)",
                pointStrokeColor : "#fff",
                data : [65,59,90,81,56,55,40]
            },
            {
                fillColor : "rgba(151,187,205,0.5)",
                strokeColor : "rgba(151,187,205,1)",
                pointColor : "rgba(151,187,205,1)",
                pointStrokeColor : "#fff",
                data : [28,48,40,19,96,27,100]
            }
        ]
    }
    */

        return View::make('tests.show', compact('test', 'chart_data'));
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