<?php

use VaahCms\Modules\Subject\Http\Controllers\Backend\CoursesController;

Route::group(
    [
        'prefix' => 'backend/subject/courses',
        
        'middleware' => ['web', 'has.backend.access'],
        
],
function () {
    /**
     * Get Assets
     */
    Route::get('/assets', [CoursesController::class, 'getAssets'])
        ->name('vh.backend.subject.courses.assets');
    /**
     * Get List
     */
    Route::get('/', [CoursesController::class, 'getList'])
        ->name('vh.backend.subject.courses.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', [CoursesController::class, 'updateList'])
        ->name('vh.backend.subject.courses.list.update');
    /**
     * Delete List
     */
    Route::delete('/', [CoursesController::class, 'deleteList'])
        ->name('vh.backend.subject.courses.list.delete');


    /**
     * Fill Form Inputs
     */
    Route::any('/fill', [CoursesController::class, 'fillItem'])
        ->name('vh.backend.subject.courses.fill');

    /**
     * Create Item
     */
    Route::post('/', [CoursesController::class, 'createItem'])
        ->name('vh.backend.subject.courses.create');
    /**
     * Get Item
     */
    Route::get('/{id}', [CoursesController::class, 'getItem'])
        ->name('vh.backend.subject.courses.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', [CoursesController::class, 'updateItem'])
        ->name('vh.backend.subject.courses.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', [CoursesController::class, 'deleteItem'])
        ->name('vh.backend.subject.courses.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', [CoursesController::class, 'listAction'])
        ->name('vh.backend.subject.courses.list.actions');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', [CoursesController::class, 'itemAction'])
        ->name('vh.backend.subject.courses.item.action');

    //---------------------------------------------------------

});
