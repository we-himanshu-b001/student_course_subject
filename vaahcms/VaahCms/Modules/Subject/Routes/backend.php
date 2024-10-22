<?php
use VaahCms\Modules\Subject\Http\Controllers\Backend\BackendController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix'     => 'backend/subject',
        'middleware' => ['web', 'has.backend.access']
    ],
    function () {
        //------------------------------------------------
        Route::get( '/', [BackendController::class, 'index'] )
            ->name( 'vh.backend.subject' );
        //------------------------------------------------
        //------------------------------------------------
        Route::get( '/assets', [BackendController::class, 'getAssets'] )
            ->name( 'vh.backend.subject.assets' );
        //------------------------------------------------
    });


/*
 * Include CRUD Routes
 */
include("backend/routes-subjects.php");
include("backend/routes-courses.php");
include("backend/routes-taxonomies.php");
