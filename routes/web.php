<?php

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

Route::get('logout', function () {
    Auth::logout();
    return redirect('index');
});
Route::any('/home', function () {
    return redirect('index');
});
Route::any('/', function () {
    return redirect('index');
});
Auth::routes();
Route::any('index',['uses'=>'ShowInfoController@index']);
Route::any('changeInfo',['uses'=>'ShowInfoController@changeStudent']);
Route::any('show',['uses'=>'ShowInfoController@showStudentInfo']);
Route::any('deleteInfo',['uses'=>'ShowInfoController@deleteInfo']);
Route::any('changeAction',['uses'=>'ShowInfoController@changeAction']);
Route::any('searchStuInfo',['uses'=>'ShowInfoController@searchStuInfo']);
Route::any('showClassInfo',['uses'=>'ShowInfoController@showClassInfo']);
Route::any('changeClassAction',['uses'=>'ShowInfoController@changeClassAction']);
Route::any('changeClass',['uses'=>'ShowInfoController@changeClass']);
Route::any('searchClassInfo',['uses'=>'ShowInfoController@searchClassInfo']);
Route::any('deleteClass',['uses'=>'ShowInfoController@deleteClass']);
Route::any('showChoseInfo',['uses'=>'ShowInfoController@showChoseInfo']);
Route::any('changeChose',['uses'=>'ShowInfoController@changeChose']);
Route::any('showScoreSpreadDeail',['uses'=>'ShowInfoController@showScoreSpreadDeail']);
Route::any('changeChoseAction',['uses'=>'ShowInfoController@changeChoseAction']);
Route::any('searchChoseInfo',['uses'=>'ShowInfoController@searchChoseInfo']);
Route::any('deleteChose',['uses'=>'ShowInfoController@deleteChose']);
Route::any('gpa',['uses'=>'ScoreController@gpaSum']);
Route::any('classGpa',['uses'=>'ScoreController@classGpa']);
Route::any('classSpread',['uses'=>'ScoreController@classSpread']);
Route::any('classAve',['uses'=>'ScoreController@classAve']);
Route::any('showAll',['uses'=>'ScoreController@showAll']);
Route::any('addStudent',['uses'=>'AddController@addStudent']);
Route::any('addClass',['uses'=>'AddController@addClass']);
Route::any('doAddAction',['uses'=>'AddController@doAddAction']);
Route::any('doAddChose',['uses'=>'AddController@doAddChose']);
Route::any('doAddClass',['uses'=>'AddController@doAddClass']);
Route::any('choseClass',['uses'=>'AddController@choseClass']);
Route::any('dataInsert',['uses'=>'TestController@dataInsert']);
Route::any('stuInfo',['uses'=>'TestController@stuInfo']);
Route::any('classInfo',['uses'=>'TestController@classInfo']);
Route::any('testChart',['uses'=>'TestController@testChart']);