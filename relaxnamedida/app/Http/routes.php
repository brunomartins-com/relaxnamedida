<?php

Route::group(
    [
        'prefix' => '/admin',
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

            Route::get('/baner-inicial', 'Admin\StartBannerController@index');
            Route::put('/baner-inicial', 'Admin\StartBannerController@update');

            Route::get('/regulamento', 'Admin\RegulationController@index');
            Route::put('/regulamento', 'Admin\RegulationController@update');

            Route::get('/inscricoes-encerradas', 'Admin\SignUpEndedController@index');
            Route::put('/inscricoes-encerradas', 'Admin\SignUpEndedController@update');

            Route::get('/produtos', 'Admin\ProductsController@getIndex');
            Route::delete('/produtos', 'Admin\ProductsController@delete');
            Route::get('/produtos/editar/{productsId}', 'Admin\ProductsController@getEdit');
            Route::put('/produtos/editar', 'Admin\ProductsController@putEdit');
            Route::get('/produtos/novo', 'Admin\ProductsController@getAdd');
            Route::post('/produtos/novo', 'Admin\ProductsController@postAdd');
            Route::get('/produtos/ordem', 'Admin\ProductsController@getOrder');

            Route::get('/ganhadores', 'Admin\WinnersController@getIndex');
            Route::get('/ganhadores/editar/{winnersId}', 'Admin\WinnersController@getEdit');
            Route::put('/ganhadores/editar', 'Admin\WinnersController@putEdit');

            Route::get('/ganhadores-anterior', 'Admin\LastWinnersController@getIndex');
            Route::get('/ganhadores-anterior/editar/{winnersId}', 'Admin\LastWinnersController@getEdit');
            Route::put('/ganhadores-anterior/editar', 'Admin\LastWinnersController@putEdit');

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

        #UPDATE ORDER
        Route::post('/update-order', 'Admin\UpdateOrderController@postOrder');

        Route::controller('/auth', 'Auth\AdminAuthController');
        Route::controller('/password', 'Auth\AdminPasswordController');
    }
);

Route::post('/frases', 'Website\PhrasesController@create');

Route::post('/contact', 'Website\ContactController@post');

Route::get('/confirmation', 'Website\RegistrationController@getConfirmation');
Route::post('/register', 'Website\RegistrationController@postRegister');

Route::post('/cities', 'Website\CitiesController@post');

Route::put('/profile', 'Website\ProfileController@putUpdate');

Route::get('/', 'Website\IndexController@index');
Route::get('/home', 'Website\IndexController@redirectIndex');

Route::controller('/auth', 'Auth\AuthController');
Route::controller('/password', 'Auth\PasswordController');
