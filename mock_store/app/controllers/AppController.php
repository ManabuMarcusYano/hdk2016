<?php

class AppController extends BaseController{
	public function getAppInfo($id){
		// Modelの呼び出し
		$app = Application::find($id);
		return Response::json($app);
	    // return Response::eloquent($app);
	    // return Response::json(array('names' => 'my name'));
	}
}