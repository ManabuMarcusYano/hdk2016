<?php

class LogController extends BaseController{
	public function setDownloadLog($id, $device){
		if($device != "iOS" &&  $device != "Android"){
			return;
		}
		
		$app = Application::find($id);
		$user_id = Auth::user()->id;
		// $user = User::find($user_id);
		$application_id = $app->id;
		$version = $app->version;
		
		$log = new Download_log();
		
		$log->user_id = $user_id;
		$log->application_id = $application_id;
		$log->version = $version;
		$log->device = $device;
		
		$log->save();
	}
}