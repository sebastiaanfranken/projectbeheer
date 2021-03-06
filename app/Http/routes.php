<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    if(Auth::check())
    {
        $subdata = [
            'projects' => Auth::user()->projects,
            'tasks' => Auth::user()->tasks
        ];

        $data = [
            'subtitle' => 'Dashboard',
            'content' => view('pages/dashboard', $subdata)
        ];

        return view('partials/layout', $data);
    }
    else
    {
        return Redirect::to('/over');
    }
});

Route::get('/home', function() {
    return redirect('/');
});

/*
 * Main about route for uses that aren't logged in - yet
 */
Route::get('over', function() {
    return view('pages/over');
});

Route::post('over', function() {
    return redirect('over')->with('message', 'Het is helaas nog niet mogelijk om in te loggen.');
});

/*
 * Login and logout routes
 */
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', 'Auth\AuthController@getLogout');

/*
 * First run (setup)
 */
Route::get('setup', function() {
    $users = App\User::count();

    if($users == 0)
    {
        $demo = new App\User;
        $user->name = "Demo Account";
        $user->email = "demo@local.host";
        $user->password = Hash::make("@welkom_demo_01");
        $user->save();
    }

    return redirect('/');
});

/*
 * Project route group
 */
Route::group(['middleware' => 'auth', 'prefix' => 'project'], function() {

    /*
     * HTTP GET request for project index
     */
    Route::get('/', [
        'uses' => 'ProjectController@getIndex'
    ]);

    /*
     * HTTP GET request for project creation
     */
    Route::get('create', [
        'uses' => 'ProjectController@getCreate'
    ]);

    /*
     * HTTP POST request for project creation
     */
    Route::post('create', [
        'uses' => 'ProjectController@postCreate'
    ]);

    /*
     * HTTP GET request for project updating
     */
    Route::get('update/{id}', [
        'uses' => 'ProjectController@getUpdate'
    ])->where('id', '[0-9]+');

    /*
     * HTTP POST request for project updating
     */
    Route::post('update', [
        'uses' => 'ProjectController@postUpdate'
    ]);

    /*
     * HTTP GET request for project deletion
     */
    Route::get('delete/{id}', [
        'uses' => 'ProjectController@getDelete'
    ])->where('id', '[0-9]+');

    /*
     * HTTP POST request for project deletion
     */
    Route::post('delete', [
        'uses' => 'ProjectController@postDelete'
    ]);

    /*
     * HTTP GET request for project details
     */
    Route::get('details/{id}', [
        'uses' => 'ProjectController@getDetails'
    ])->where('id', '[0-9]+');

});

/*
 * Task route group
 */
Route::group(['middleware' => 'auth', 'prefix' => 'tasks'], function() {

    /*
     * HTTP GET request for task listing
     */
    Route::get('/', [
        'uses' => 'TaskController@getIndex'
    ]);

    /*
     * HTTP GET request for task create
     */
    Route::get('create/{id?}', [
        'uses' => 'TaskController@getCreate'
    ])->where('id', '[0-9]+');

    /*
     * HTTP POST request for task create
     */
    Route::post('create', [
        'uses' => 'TaskController@postCreate'
    ]);

    /*
     * HTTP GET request for task update
     */
    Route::get('update/{id}', [
        'uses' => 'TaskController@getUpdate'
    ])->where('id', '[0-9]+');

    /*
     * HTTP POST request for task update
     */
    Route::post('update', [
        'uses' => 'TaskController@postUpdate'
    ]);

    /*
     * HTTP GET request for task delete
     */
    Route::get('delete/{id}', [
        'uses' => 'TaskController@getDelete'
    ])->where('id', '[0-9]+');

    /*
     * HTTP POST request for task delete
     */
    Route::get('delete', [
        'uses' => 'TaskController@postDelete'
    ]);

    /*
     * HTTP GET request for task details
     */
    Route::get('details/{id}', [
        'uses' => 'TaskController@getDetails'
    ])->where('id', '[0-9]+');

    /*
     * HTTP GET request for tasks belonging to project
     */
    Route::get('for-project/{id}', [
        'uses' => 'TaskController@getTasksForProject'
    ])->where('id', '[0-9]+');

});
