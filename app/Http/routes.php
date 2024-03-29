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

Route::get('blade', function(){
    $var = "<input name='nama_variabel' value='2' />";

    return view('blade', compact('var'));
});

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('students', function(){
    $result = DB::table('students')->get();

    echo "<ul>";
    foreach ($result as $row) {
        echo "<li>" . $row->nama . "</li>";
    }
    echo "</ul>";
});

Route::get('students/add', function(){
    $data = [
        'nama' => 'Saya',
        'nrp' => '1234567891',
        'ipk' => 3.2,
        'tanggal_lahir' => '2015-04-13',
    ];

    DB::table('students')->insert($data);

    echo "Students added successfully.";
});

Route::resource('user', 'UserController', ['except' => ['destroy']]);
Route::get ('/user/{user}/delete', ['uses' => 'UserController@delete', 'as' => 'user.delete']);
Route::get ('/login', ['uses' => 'UserController@login', 'as' => 'user.login']);
Route::post('/login', ['uses' => 'UserController@login', 'as' => 'user.login']);

Route::resource('group', 'GroupController', ['except' => ['destroy']]);
Route::get ('/user/{group}/delete', ['uses' => 'GroupController@delete', 'as' => 'group.delete']);

Route::get ('/test', function(){
    $user = App\User::find(2);
    $user->groups()->attach(1);
});