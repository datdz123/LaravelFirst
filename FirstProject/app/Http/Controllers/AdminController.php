<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // tat ca phuong thuc logic , xu ly du lieu se viet o day
  public function hello(){
      User::all(); // lay tat ca user
      $user = User::find(1); // lay user co id = 1
      // sau khi laay dc user xong , thi minh
      // dang nhap
      // hacker ko truy cap dc
      return compact('user');
  }


}
