<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingController;

Route::middleware('auth:sanctum')->group(function () {
Route::apiResource('meetings', MeetingController::class);
});