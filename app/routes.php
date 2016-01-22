<?php


\Core\Route\Route::get('/news/', 'NewsController@index');
\Core\Route\Route::get('/news/list/{page}', 'NewsController@index');
\Core\Route\Route::get('/news/{id}', 'NewsController@show');

\Core\Route\Route::get('/', 'IndexController@index');

\Core\Route\Route::get('/api/v1/news/{page}', 'ApiController@index');

