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
	
	public function postReview($id){
		Input::flash();
		if(Input::has('title') && Input::has('message') && Input::has('user_id')){
			// Modelへ書き込み
			$review = new Review;
			$review->application_id = $id;
			$review->reviewer_id = Input::get('user_id');
			$review->feedback_id = Input::get('feedback_id', '');;
			$review->completion = Input::get('completion');
			$review->interest = Input::get('interest');
			$review->potence = Input::get('potence');
			$review->title = Input::get('title');
			$review->message = Input::get('message');
			$review->save();
			return Redirect::back();
		}
		return Redirect::back()->withInput();
	}
}