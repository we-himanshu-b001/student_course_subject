<?php


Route::group(
    [
        'prefix' => 'subject/taxonomies',
        'middleware' => ['auth:api'],
        'namespace' => 'Backend',
    ],
    function () {
        //---------------------------------------------------------
        Route::get('/assets', 'TaxonomiesController@getAssets')
        ->name('vh.backend.subject.api.taxonomies.assets');
        //---------------------------------------------------------
        Route::get('/', 'TaxonomiesController@getList')
        ->name('vh.backend.subject.api.taxonomies.list');
        //---------------------------------------------------------
        Route::match(['put', 'patch'], '/', 'TaxonomiesController@updateList')
        ->name('vh.backend.subject.api.taxonomies.list.updates');
        //---------------------------------------------------------
        Route::delete('/', 'TaxonomiesController@deleteList')
        ->name('vh.backend.subject.api.taxonomies.list.delete');
        //---------------------------------------------------------
        Route::post('/', 'TaxonomiesController@createItem')
        ->name('vh.backend.subject.api.taxonomies.create');
        //---------------------------------------------------------
        Route::get('/{id}', 'TaxonomiesController@getItem')
        ->name('vh.backend.subject.api.taxonomies.read');
        //---------------------------------------------------------
        Route::match(['put', 'patch'], '/{id}', 'TaxonomiesController@updateItem')
        ->name('vh.backend.subject.api.taxonomies.update');
        //---------------------------------------------------------
        Route::delete('/{id}', 'TaxonomiesController@deleteItem')
        ->name('vh.backend.subject.api.taxonomies.delete');
        //---------------------------------------------------------
    });
