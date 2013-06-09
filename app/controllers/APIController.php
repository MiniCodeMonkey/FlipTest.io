<?php

class APIController extends BaseController {

    public function storeController()
    {
        $json = Input::json()->all();

        $viewController = ViewController::where('app_id', 1)->where('name', $json['className'])->first();
        if (!$viewController)
            $viewController = new ViewController;
        
        $viewController->name = $json['className'];
        $viewController->app_id = 1;
        $viewController->view_data = json_encode($json['views']);
        $viewController->save();

        return Response::JSON(array('succcess' => true));
    }

    public function storeScreenshot()
    {
        Input::file('screenshot')->move('uploads', Input::file('screenshot')->getClientOriginalName());
    }

    public function showTests()
    {
        $result = array();
        $tests = Test::where('expire', '>', new DateTime)->get();

        foreach ($tests as $test) {
            $result[] = array(
                'id' => $test->id,
                'controller' => $test->viewcontroller->name,
                'view_id' => $test->view_id,
                'test_type' => $test->test_type,
                'test_value' => $test->test_value
            );
        }

        return Response::json($result);
    }

    public function testView($id)
    {
        $test = Test::findOrFail($id);

        $impression = new Impression;
        $impression->test_id = $test->id;
        $impression->is_goal = 0;
        $impression->user_identifier = Input::get('user');
        $impression->save();
    }

    public function testGoal($id)
    {
        $test = Test::findOrFail($id);

        $impression = new Impression;
        $impression->test_id = $test->id;
        $impression->is_goal = 1;
        $impression->user_identifier = Input::get('user');
        $impression->save();
    }

}