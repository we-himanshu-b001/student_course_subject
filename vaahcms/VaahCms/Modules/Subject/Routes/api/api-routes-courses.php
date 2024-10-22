<?php
use VaahCms\Modules\Subject\Http\Controllers\Backend\CoursesController;
/*
 * API url will be: <base-url>/public/api/subject/courses
 */
Route::group(
    [
        'prefix' => 'subject/courses',
        'namespace' => 'Backend',
    ],
function () {

    /**
     * Get Assets
     */
    Route::get('/assets', [CoursesController::class, 'getAssets'])
        ->name('vh.backend.subject.api.courses.assets');
    /**
     * Get List
     */
    Route::get('/', [CoursesController::class, 'getList'])
        ->name('vh.backend.subject.api.courses.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', [CoursesController::class, 'updateList'])
        ->name('vh.backend.subject.api.courses.list.update');
    /**
     * Delete List
     */
    Route::delete('/', [CoursesController::class, 'deleteList'])
        ->name('vh.backend.subject.api.courses.list.delete');


    /**
     * Create Item
     */
    Route::post('/', [CoursesController::class, 'createItem'])
        ->name('vh.backend.subject.api.courses.create');
    /**
     * Get Item
     */
    Route::get('/{id}', [CoursesController::class, 'getItem'])
        ->name('vh.backend.subject.api.courses.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', [CoursesController::class, 'updateItem'])
        ->name('vh.backend.subject.api.courses.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', [CoursesController::class, 'deleteItem'])
        ->name('vh.backend.subject.api.courses.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', [CoursesController::class, 'listAction'])
        ->name('vh.backend.subject.api.courses.list.action');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', [CoursesController::class, 'itemAction'])
        ->name('vh.backend.subject.api.courses.item.action');



});
