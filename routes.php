<?php

use RainLab\User\Models\Settings as UserSettings;
use Mohsin\MediScan\Models\Prop;
use Mohsin\MediScan\Models\Patient;
use Mohsin\MediScan\Models\Scan;

Route::get('/authtest', array('before' => 'auth.basic', function()
{
      return Response::json(array('result' => 'success', 'reason' => 'Logged In' ), 200);
}));

Route::get('/authtest', array('before' => 'auth.basic', function()
{
      return Response::json(array('result' => 'success', 'reason' => 'Logged In' ), 200);
}));

Route::get('/api', array('before' => 'auth.basic', function()
{
      return Auth::getUser();
}));

Route::get('/prop', array('before' => 'auth.basic', function()
{
  if(!isset($_GET['id']))
    return Response::json(array('result' => 'error', 'reason' => 'Id not specified' ), 200);
  try {
    $data = Prop::where('id','=',$_GET['id'])->get(['type','prop_id'])[0];
  } catch (Exception $ex) {
    return Response::json(array('result' => 'error', 'reason' => 'Invalid Prop' ), 200);
  }
  if($data != null)
    return json_encode($data);
}));

Route::get('/patient', array('before' => 'auth.basic', function()
{
  if(!isset($_GET['id']))
    return Response::json(array('result' => 'error', 'reason' => 'Id not specified' ), 200);
  try {
    $data = Patient::where('id','=',$_GET['id'])->get()[0];
  } catch (Exception $ex) {
    return Response::json(array('result' => 'error', 'reason' => 'Invalid Prop' ), 200);
  }
  if($data != null)
    return json_encode($data);
}));

Route::get('/scan', array('before' => 'auth.basic', function()
{
  if(!isset($_GET['id']))
    return Response::json(array('result' => 'error', 'reason' => 'Id not specified' ), 200);
  try {
    $data = Scan::where('id','=',$_GET['id'])->get()[0];
    $data['patient'] = Patient::where('id','=',$data -> original['patient_id'])->get()[0]['name'];
  } catch (Exception $ex) {
    return Response::json(array('result' => 'error', 'reason' => 'Invalid Prop' ), 200);
  }
  if($data != null)
    return json_encode($data);
}));

Route::filter('auth.basic', function()
{
    try {
    if (!Auth::check())
      {
    Auth::authenticate([
            'login' => $_GET['PHP_AUTH_USER'],
            'password' => $_GET['PHP_AUTH_PW']
        ], true);
      }
  } catch(Exception $ex) {
    return Response::json(array('result' => 'error', 'reason' => $ex->getMessage() ), 200);
  }
});