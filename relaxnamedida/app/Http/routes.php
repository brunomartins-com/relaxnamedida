<?php

Route::group(
    [
        'prefix' => 'admin',
    ],
    function () {

        Route::group(['middleware' => 'admin'], function () {

            Route::get('/', 'Admin\IndexController@index');
            Route::get('/home', 'Admin\IndexController@toIndex');

            Route::get('/participantes', 'Admin\ParticipantsController@index');
            Route::get('/participantes/visualizar/{userId}', 'Admin\ParticipantsController@view');
            Route::delete('/participantes', 'Admin\ParticipantsController@delete');
            Route::put('/participantes/alterar-status', 'Admin\ParticipantsController@changeStatus');

            Route::get('/frases', 'Admin\PhrasesController@index');
            Route::get('/frases/visualizar/{phraseId}', 'Admin\PhrasesController@view');
            Route::delete('/frases', 'Admin\PhrasesController@delete');
            Route::put('/frases/alterar-status', 'Admin\PhrasesController@changeStatus');

            Route::get('/regulamento', 'Admin\RegulationController@index');
            Route::put('/regulamento', 'Admin\RegulationController@update');

            Route::get('/inscricoes-encerradas', 'Admin\SignUpEndedController@index');
            Route::put('/inscricoes-encerradas', 'Admin\SignUpEndedController@update');

            Route::get('/produtos', 'Admin\IndexController@index');

            Route::get('/ganhadores', 'Admin\IndexController@index');

            Route::get('/ganhadores-anterior', 'Admin\IndexController@index');

            Route::get('/dados-site', 'Admin\WebsiteSettingsController@index');
            Route::post('/dados-site', 'Admin\WebsiteSettingsController@update');

            Route::get('/meus-dados', 'Admin\ProfileController@index');
            Route::put('/meus-dados', 'Admin\ProfileController@update');

            Route::get('/usuarios', 'Admin\UsersController@index');
            Route::delete('/usuarios', 'Admin\UsersController@delete');

            Route::get('/usuarios/novo', 'Admin\UsersController@getNew');
            Route::post('/usuarios/novo', 'Admin\UsersController@create');

            Route::get('/usuarios/editar/{userId}', 'Admin\UsersController@getEdit');
            Route::put('/usuarios/editar', 'Admin\UsersController@update');
        });

        Route::controller('/', 'Auth\AdminAuthController');
        Route::controller('/password', 'Auth\AdminPasswordController');
    });

Route::get('/', 'Website\IndexController@index');
Route::get('/home', 'Website\IndexController@redirectIndex');

Route::put('/profile', 'Website\ProfileController@putUpdate');

Route::controller('/', 'Auth\AuthController');
Route::controller('/password', 'Auth\PasswordController');
