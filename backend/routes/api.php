<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MeetingController;

Route::middleware('api')->group(function () {
    Route::apiResource('meetings', MeetingController::class);
});