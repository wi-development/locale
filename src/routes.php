<?php
#Route::get('/backStages', 'DashboardController@index');
Route::get('/locales',            ['as' => 'locale.index'               ,'uses' => 'LocaleController@index']);
Route::get('/locale/create',      ['as' => 'locale.create'              ,'uses' => 'LocaleController@index']);

#

/*Route::get('/', ['as' => 'backStage', 'uses' => 'DashboardController@index'
    , function () {
        // Route named "admin::dashboard"
        //$url = route('admin::dashboard');
        //return "dashboard: ".$url."";
        $user = Auth::user();

        //return view('admin.dashboard',$user);
    }]);
*/



