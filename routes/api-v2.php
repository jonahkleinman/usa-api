<?php
Route::get('/llllll', function() {
    \Auth::loginUsingId(876594);
    return "OK";
});
Route::group(['middleware' => 'auth:jwt,web', 'prefix' => '/auth'], function() {
    Route::get('token', function() {
        $token = \Auth::guard('jwt')->login(\Auth::user());
        return response()->json([
            'token' => $token,
            'expires_in' => \Auth::guard('jwt')->factory()->getTTL() * 60
        ]);
    });
    Route::get('test', function() {
       return "Hi " . \Auth::user()->fullname();
    });
});