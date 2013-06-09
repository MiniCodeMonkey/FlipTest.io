<?php

class APIController extends BaseController {

    public function storeController()
    {
        $json = Input::json()->all();

        $viewController = ViewController::where('app_id', 1)->where('name', $json['className'])->first();
        if ($viewController) {
            return Response::JSON(array('succcess' => true, 'duplicate' => true));
        }
        
        $viewController = new ViewController;
        $viewController->name = $json['className'];
        $viewController->app_id = 1;
        $viewController->view_data = json_encode($json);
        $viewController->save();

        return Response::JSON(array('succcess' => true, 'duplicate' => false));
    }

    public function storeScreenshot()
    {
        Input::file('screenshot')->move('uploads', Input::file('screenshot')->getClientOriginalName());
    }

    public function showTests()
    {
        if (!Input::has('user')) {
            return Response::json(array('success' => false));
        }

        $user = Input::get('user');

        $result = array();
        $tests = Test::where('expire', '>', new DateTime)->get();

        foreach ($tests as $test) {
            // Is the user registered for this test?
            $testuser = Testuser::where('test_id', $test->id)->where('user_identifier', $user)->first();
            if (!$testuser) {
                $lastUser = Testuser::where('test_id', $test->id)->orderBy('created_at', 'desc')->first();
                $group = ($lastUser && $lastUser->group == 'B') ? 'A' : 'B';

                $testuser = new Testuser;
                $testuser->user_identifier = $user;
                $testuser->test_id = $test->id;
                $testuser->group = $group;
                $testuser->save();
            }

            $result[] = array(
                'id' => $test->id,
                'controller' => $test->viewcontroller->name,
                'view_id' => $test->view_id,
                'goal_view_id' => $test->goal_view_id,
                'test_type' => $test->test_type,
                'test_value' => ($testuser->group == 'A') ? $test->original_value : $test->test_value
            );
        }

        return Response::json($result);
    }

    public function testView($id)
    {
        if (!Input::has('user')) {
            return Response::json(array('success' => false));
        }

        $user = Input::get('user');

        $test = Test::findOrFail($id);
        $testuser = Testuser::where('test_id', $test->id)->where('user_identifier', $user)->firstOrFail();

        $impression = new Impression;
        $impression->test_id = $test->id;
        $impression->is_goal = 0;
        $impression->group = $testuser->group;
        $impression->user_identifier = Input::get('user');
        $impression->save();
    }

    public function testGoal($id)
    {
        if (!Input::has('user')) {
            return Response::json(array('success' => false));
        }

        $user = Input::get('user');

        $test = Test::findOrFail($id);
        $testuser = Testuser::where('test_id', $test->id)->where('user_identifier', $user)->firstOrFail();

        $impression = new Impression;
        $impression->test_id = $test->id;
        $impression->is_goal = 1;
        $impression->group = $testuser->group;
        $impression->user_identifier = Input::get('user');
        $impression->save();
    }

}