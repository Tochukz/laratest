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

Route::get('/', function () {
    return view('relationship');
});

Route::get('relationship/parent-child', 'RelationShipController@parentChild')->name('parent-child');
Route::get('relationship/child-parent', 'RelationShipController@childParent')->name('child-parent');
Route::get('relationship/one-to-many', 'RelationShipController@oneToMany')->name('one-to-many');
Route::get('relationship/many-to-one', 'RelationShipController@manyToOne')->name('many-to-one');
Route::get('relationship/users-to-roles', 'RelationShipController@usersToRoles')->name('users-to-roles');
Route::get('relationship/roles-to-users', 'RelationShipController@rolesToUsers')->name('roles-to-users');