<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


route::get('/',[todo::class ,'index']);

route::post('/store',[todo::class ,'store'])->name('store');

route::get('/showdata',[todo::class ,'showdata'])->name('show_data');

route::get('/delete/{id}',[todo::class ,'delete'])->name('del');

route::get('/edit/{id}',[todo::class ,'edit'])->name('edit');

route::post('/update',[todo::class ,'update'])->name('update');
