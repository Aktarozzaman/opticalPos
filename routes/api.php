<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

  Route::get('/subscribe/subscribelog', [Modules\Superadmin\Http\Controllers\SubscriptionController::class,'getSubscribeLog'])->name('subscribelog');
  
   Route::post('/subscribe/clientsubscribelog', [Modules\Superadmin\Http\Controllers\SubscriptionController::class,'getClientSubscribeLog'])->name('clientsubscribelog');
   
    Route::post('/subscribe/subscribecreate', [Modules\Superadmin\Http\Controllers\SubscriptionController::class,'subscriptionCreate'])->name('subscribecreate');
   
   
    Route::post('/subscribe/packageApproval', [Modules\Superadmin\Http\Controllers\SubscriptionController::class,'clientPackageApproval'])->name('packageApproval');
    
    
      Route::post('/message/subscribeactive', [App\Http\Controllers\MessageController::class,'subscribeactive'])->name('subscribeactive');
    
    


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
