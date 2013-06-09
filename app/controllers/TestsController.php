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
        $test->original_value =(Input::get('test_type') == 'text') ? Input::get('original_text') : Input::get('original_textcolor');
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

        $chart_data = array();
        if ($test->impressions()->count() > 2) {
            $firstImpression = new Datetime($test->impressions()->orderBy('created_at', 'asc')->first()->created_at);
            $lastImpression = new DateTime($test->impressions()->orderBy('created_at', 'desc')->first()->created_at);

            $span = $lastImpression->getTimestamp() - $firstImpression->getTimestamp();
            $interval = new DateInterval('PT' . round($span / 4) . 'S');

            if ($firstImpression && $lastImpression && $firstImpression < $lastImpression) {
                $chart_data['labels'] = array();
                $data = array();
                $now = $firstImpression;
                do {
                    $chart_data['labels'][] = $now->format(($span > (3600 * 24)) ? 'D M j' : 'h:i A');

                    $afterNow = clone $now;
                    $afterNow->add($interval);

                    $views = $test->impressions()->where('created_at', '>=', $now)->where('created_at', '<=', $afterNow)->where('is_goal', 0)->where('group', 'A')->count();
                    $goals = $test->impressions()->where('created_at', '>=', $now)->where('created_at', '<=', $afterNow)->where('is_goal', 1)->where('group', 'A')->count();
                    $sum = (float)($views > 0) ? ($goals / $views * 100.0) : 0.0;
                    $dataa[] = $sum;

                    $views = $test->impressions()->where('created_at', '>=', $now)->where('created_at', '<=', $afterNow)->where('is_goal', 0)->where('group', 'B')->count();
                    $goals = $test->impressions()->where('created_at', '>=', $now)->where('created_at', '<=', $afterNow)->where('is_goal', 1)->where('group', 'B')->count();
                    $sum = (float)($views > 0) ? ($goals / $views * 100.0) : 0.0;
                    $datab[] = $sum;

                    $now->add($interval);
                } while ($now < $lastImpression);

                $chart_data['datasets'] = array(
                    array(
                        'fillColor' => 'rgba(31,119,180,0.5)', // #1f77b4
                        'strokeColor' => 'rgba(31,119,180,1)',
                        'pointColor' => 'rgba(31,119,180,1)',
                        'pointStrokeColor' => '#fff',
                        'data' => $dataa
                        ),
                    array(
                        'fillColor' => 'rgba(255,127,14,0.5)', // #ff7f0e
                        'strokeColor' => 'rgba(255,127,14,1)',
                        'pointColor' => 'rgba(255,127,14,1)',
                        'pointStrokeColor' => '#fff',
                        'data' => $datab
                        ),
                    );
            }
        }

        $agoals = $test->impressions()->where('is_goal', 1)->where('group', 'A')->count();
        $aviews = $test->impressions()->where('is_goal', 0)->where('group', 'A')->count();
        $arate = (float)($aviews > 0) ? ($agoals / $aviews * 100.0) : 0.0;

        $bgoals = $test->impressions()->where('is_goal', 1)->where('group', 'B')->count();
        $bviews = $test->impressions()->where('is_goal', 0)->where('group', 'B')->count();
        $brate = (float)($bviews > 0) ? ($bgoals / $bviews * 100.0) : 0.0;

        return View::make('tests.show', compact('test', 'chart_data', 'agoals', 'aviews', 'arate', 'bgoals', 'bviews', 'brate'));
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