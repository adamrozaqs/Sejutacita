<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/interests', function (Request $request) {
    $tableName = "interests";
    $result = DB::select("select * from $tableName");

    return response()->json([
        'message' => 'Data interest berhasil dipanggil',
        'status' => true,
        'code' => 200,
        'data' => $result
    ], 200);
});

Route::get('/articles', function (Request $request) {
    $tableArticles = "articles";
    $result = DB::select("select * from $tableArticles");

    return response()->json([
        'message' => 'Data articles berhasil dipanggil',
        'status' => true,
        'code' => 200,
        'data' => $result
    ], 200);
});

Route::get('/quotes', function (Request $request) {
    $tableQuotes = "quotes";
    $result = DB::select("select * from $tableQuotes");

    return response()->json([
        'message' => 'Data Quote berhasil dipanggil',
        'status' => true,
        'code' => 200,
        'data' => $result
    ], 200);
});

Route::get('/assessments', 'AssessmentController@get_all');
Route::post('/assessments/predict/{id}', 'AssessmentController@predict');

Route::get('/articles/{keyword?}', function (Request $request) {
    $keyword = $request->keyword;
    if (!isset($keyword)) {
        $keyword = "";
    }

    $result = DB::select("select * from articles where headline like '%$keyword%'");

    return response()->json([
        'message' => 'Data articles berhasil dipanggil',
        'status' => true,
        'code' => 200,
        'data' => $result
    ], 200);
});

Route::get('/users', function (Request $request) {
    $tableUser = "users";
    $result = DB::select("select * from $tableUser");
    return $result;
});

Route::get('/user/{id}', function (Request $request) {
    $tableUser = "users";
    $result = DB::select("select * from $tableUser where id='$request->id'");
    if (empty($result)) {
        return response()->json([
            'message' => 'User tidak ditemukan!',
            'status' => true,
            'code' => 404,
            'data' => $result
        ], 404);
    }
    return $result;
});

Route::get('/reminder', function () {
    $tableReminder = "reminders";
    $result = DB::select("select * from $tableReminder");

    return response()->json([
        'message' => 'Data Reminder berhasil dipanggil',
        'status' => true,
        'code' => 200,
        'data' => $result
    ], 200);
});


Route::post('/user/store', 'UserController@api_store');
Route::patch('/user/update/{uuid}', 'UserController@api_update');

Route::get('/targets/{created_at}/{uuid}', function (Request $request) {
    $tableTarget = "targets";
    $result = DB::select("select * from $tableTarget where user_id = '$request->uuid' AND deleted_at IS NULL AND created_at LIKE '$request->created_at%' ");

    return response()->json([
        'message' => 'Data Targets berhasil dipanggil',
        'status' => true,
        'code' => 200,
        'data' => $result
    ], 200);
});

Route::get('/targets/{created_at}/{uuid}/{status}', function (Request $request) {
    $tableTarget = "targets";
    $result = DB::select("select * from $tableTarget where user_id = '$request->uuid' AND deleted_at IS NULL AND status = '$request->status' AND created_at LIKE '$request->created_at%' ");

    return response()->json([
        'message' => 'Data Targets berhasil dipanggil',
        'status' => true,
        'code' => 200,
        'data' => $result
    ], 200);
});

Route::get('/target/{id}', function (Request $request) {
    $tableTarget = "targets";
    $result = DB::select("select * from $tableTarget where id = '$request->id' AND deleted_at IS NULL");

    if (empty($result)) {
        return response()->json([
            'message' => 'Data Kosong',
            'status' => true,
            'code' => 204,
            'data' => $result
        ], 204);
    }
    return response()->json([
        'message' => 'Data Targets berhasil dipanggil',
        'status' => true,
        'code' => 200,
        'data' => $result
    ], 200);
});
Route::post('/target/store/{uuid}', 'TargetController@api_store');
Route::patch('/target/update/{id}', 'TargetController@api_update');
Route::delete('/target/delete/{id}', 'TargetController@api_delete');
Route::get('/daily-performance/{uuid}', function (Request $request) {
    $tableTarget = "targets";
    $count_complete = DB::select("select count(*) as jumlah from $tableTarget where user_id = '$request->uuid' AND deleted_at IS NULL AND status = 1")[0]->jumlah;
    $count_uncomplete = DB::select("select count(*) as jumlah from $tableTarget where user_id = '$request->uuid' AND deleted_at IS NULL AND status = 0")[0]->jumlah;
    $total = $count_complete + $count_uncomplete;
    $result['complete_percentage'] = ($count_complete / $total) * 100;
    $result['uncomplete_percentage'] = ($count_uncomplete / $total) * 100;

    return response()->json([
        'message' => 'Data Daily Performance berhasil dipanggil',
        'status' => true,
        'code' => 200,
        'data' => $result
    ], 200);
});
Route::get('/stats/monthly_performance/{uuid}', 'StatsController@monthly_complete');
Route::get('/stats/monthly_summary/{uuid}', 'StatsController@monthly_summary');
