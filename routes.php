<?php

use RainLab\User\Models\Settings as UserSettings;

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