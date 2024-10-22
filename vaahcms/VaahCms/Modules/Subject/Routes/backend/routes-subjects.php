<?php

use VaahCms\Modules\Subject\Http\Controllers\Backend\SubjectsController;

Route::group(
    [
        'prefix' => 'backend/subject/subjects',
        
        'middleware' => ['web', 'has.backend.access'],
        
],
function () {
    /**
     * Get Assets
     */
    Route::get('/assets', [SubjectsController::class, 'getAssets'])
        ->name('vh.backend.subject.subjects.assets');
    /**
     * Get List
     */
    Route::get('/', [SubjectsController::class, 'getList'])
        ->name('vh.backend.subject.subjects.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', [SubjectsController::class, 'updateList'])
        ->name('vh.backend.subject.subjects.list.update');
    /**
     * Delete List
     */
    Route::delete('/', [SubjectsController::class, 'deleteList'])
        ->name('vh.backend.subject.subjects.list.delete');


    /**
     * Fill Form Inputs
     */
    Route::any('/fill', [SubjectsController::class, 'fillItem'])
        ->name('vh.backend.subject.subjects.fill');

    /**
     * Create Item
     */
    Route::post('/', [SubjectsController::class, 'createItem'])
        ->name('vh.backend.subject.subjects.create');
    /**
     * Get Item
     */
    Route::get('/{id}', [SubjectsController::class, 'getItem'])
        ->name('vh.backend.subject.subjects.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', [SubjectsController::class, 'updateItem'])
        ->name('vh.backend.subject.subjects.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', [SubjectsController::class, 'deleteItem'])
        ->name('vh.backend.subject.subjects.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', [SubjectsController::class, 'listAction'])
        ->name('vh.backend.subject.subjects.list.actions');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', [SubjectsController::class, 'itemAction'])
        ->name('vh.backend.subject.subjects.item.action');

    //---------------------------------------------------------

});
