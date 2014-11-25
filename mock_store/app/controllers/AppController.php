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
	
	public function getAppReview($id){
		$review = Review::find($id);
		if(!empty($review)){
			return Response::json($review);
		}
	}
	
	public function postReview($id){
		Input::flash();
		if(Input::has('title') && Input::has('message') && Input::has('user_id')){
			// Modelへ書き込み
			$review = new Review;
			$review->application_id = $id;
			$review->reviewer_id = Input::get('user_id');
			$review->feedback_id = Input::get('feedback_id', '');;
			$review->completion = Input::get('completion', 0);
			// $review->interest = Input::get('interest', 0);
			// $review->potence = Input::get('potence', 0);
			$review->title = Input::get('title');
			$review->message = Input::get('message');
			$review->rate_valid = Input::get('rate_valid', 0);
			$review->save();
			
			$application = Application::find($id);
			$application->review_count = Review::whereRaw("application_id = $id AND rate_valid = 1")->count();
			$application->completion = Review::whereRaw("application_id = $id AND rate_valid = 1")->avg('completion');
			// $application->interest = Review::whereRaw("application_id = $id AND rate_valid = 1")->avg('interest');
			// $application->potence = Review::whereRaw("application_id = $id AND rate_valid = 1")->avg('potence');
			$application->save();
			
			return Redirect::back();
		}
		return Redirect::back()->withInput();
	}
	
	public function editReview($id){
		// Input::flash();
		if(Input::has('title') && Input::has('message')){
			// Modelへ書き込み
			$review = Review::find($id);
			$review->completion = Input::get('completion', 0);
			// $review->interest = Input::get('interest', 0);
			// $review->potence = Input::get('potence', 0);
			$review->title = Input::get('title');
			$review->message = Input::get('message');
			$review->save();
			
			$application_id = $review->application_id;
			
			// このへんクラスわける
			$application = Application::find($application_id);
			$application->review_count = Review::whereRaw("application_id = $application_id AND rate_valid = 1")->count();
			$application->completion = Review::whereRaw("application_id = $application_id AND rate_valid = 1")->avg('completion');
			// $application->interest = Review::whereRaw("application_id = $application_id AND rate_valid = 1")->avg('interest');
			// $application->potence = Review::whereRaw("application_id = $application_id AND rate_valid = 1")->avg('potence');
			$application->save();
			
			return Redirect::back();
		}
		return Redirect::back()->withInput();
	}
	
	public function deleteReview($id){
		// Model書き込み
		$review = Review::find($id);
		if(empty($review)){	
			return;
		}
		if($review->reviewer_id != Auth::user()->id){
			return;
		}
		
		$review->deleted = true;
		$review->save();
		
		return Redirect::back();
	}
}