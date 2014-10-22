<?php

class AppController extends BaseController{
	public function getAppInfo($id){
		// Modelの呼び出し
		$app = Application::find($id);
		return Response::json($app);
	}
	public function getAppFeedbacks($id){
		// Modelの呼び出し
		$reviews = Review::with('reviewer')->whereRaw("feedback_id = $id")->get();
		return Response::json($reviews);
	}
}