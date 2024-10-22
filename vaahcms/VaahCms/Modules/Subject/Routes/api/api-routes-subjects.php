<?php
use VaahCms\Modules\Subject\Http\Controllers\Backend\SubjectsController;
/*
 * API url will be: <base-url>/public/api/subject/subjects
 */
Route::group(
    [
        'prefix' => 'subject/subjects',
        'namespace' => 'Backend',
    ],
function () {

    /**
     * Get Assets
     */
    Route::get('/assets', [SubjectsController::class, 'getAssets'])
        ->name('vh.backend.subject.api.subjects.assets');
    /**
     * Get List
     */
    Route::get('/', [SubjectsController::class, 'getList'])
        ->name('vh.backend.subject.api.subjects.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', [SubjectsController::class, 'updateList'])
        ->name('vh.backend.subject.api.subjects.list.update');
    /**
     * Delete List
     */
    Route::delete('/', [SubjectsController::class, 'deleteList'])
        ->name('vh.backend.subject.api.subjects.list.delete');


    /**
     * Create Item
     */
    Route::post('/', [SubjectsController::class, 'createItem'])
        ->name('vh.backend.subject.api.subjects.create');
    /**
     * Get Item
     */
    Route::get('/{id}', [SubjectsController::class, 'getItem'])
        ->name('vh.backend.subject.api.subjects.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', [SubjectsController::class, 'updateItem'])
        ->name('vh.backend.subject.api.subjects.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', [SubjectsController::class, 'deleteItem'])
        ->name('vh.backend.subject.api.subjects.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', [SubjectsController::class, 'listAction'])
        ->name('vh.backend.subject.api.subjects.list.action');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', [SubjectsController::class, 'itemAction'])
        ->name('vh.backend.subject.api.subjects.item.action');



});
